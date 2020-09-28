<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Announcement;
use App\Menu;
use App\Statistic;
use App\Rating;
use App\Membership_assign;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use App\Menu_type;
use App\Schedule_item;
class ApiController extends Controller

{
    public function getMealCalendar()
    {
        //todo find whole callendar for next 2 weeks and create json for the front page
        return json_encode(array(
            "test" => "true"
        ));
    }

    public function getStudentMatches($searchString)
    {
        $matches = Student::where('firstname', 'LIKE', '%' . $searchString . '%')->orWhere('lastname', 'LIKE', '%' . $searchString . '%')->orWhere('aem', 'LIKE', '%' . $searchString . '%')->get();

        $result = array();
        foreach ($matches as $item)
        {
            array_push($result, ['aem' => $item->aem, 'firstname' => $item->firstname, 'lastname' => $item->lastname]);
        }
        return response()
            ->json($result);
    }

    public function getMealStatistics()
    {

        return response()->json($result);
    }

    public function submitFeedback(Request $request)
    {
        $data = $request->all();
        //var_dump($data);
        $cnt = 0;

        $pattern = '#^(0*)|([^\da-z])#i';
        $replacement = '';

        foreach (json_decode($data["data"], true) as $row)
        {
             
            $success = Rating::create(['rating' => $row["rating"], 'created_at' => preg_replace($pattern, $replacement, $row["date"]), 'station_id' => 1]);
            if (is_null($success) || $success===false)
            {
                return response()->json("There was an error, pls try again");
            }
            $cnt = $cnt + 1;
        }
        return response()
            ->json($cnt." feedback data successfully uploaded to ilunch server!");
    }
    public function getLatestAnnouncement()
    {

        $matches = Announcement::orderBy('created_at', 'desc')->first();
        return response()
            ->json($matches);

    }
    public function validateAnonymousCustomer($r)
    {

        return response()->json($result);
    }
    public function validateCustomer($id)
    {
        $id = Crypt::decryptString($id);
        $usermembership = Membership_assign::where('id', $id)->orderBy('created_at', 'DESC')
            ->first();
        $today = Carbon::today()->format('Y-m-d');
        $now = Carbon::now()->format('H:i:s');
        foreach (Menu_type::all() as $type)
        {
            if ($now > $type->time_start && $now < $type->time_end)
            {
                $mealtype = $type->id;
            }
        }

        switch ($mealtype)
        {
            case 1:
                {
                        $typename = $usermembership
                            ->membership->breakfast;
                }
            case 2:
                {
                    $typename = $usermembership
                        ->membership->lunch;
                }
            case 3:
                {
                    $typename = $usermembership
                        ->membership->dinner;
                }
            }
            $scheduleid = Schedule_item::where('date', $today)->first()->id;
            $allreadyeatten = Statistic::whereStudent_id($usermembership->student_id)
                ->whereType_id($mealtype)->whereSchedule_id($scheduleid)->get();

            if ($allreadyeatten->isEmpty())
            {
                $remaining = $usermembership->remaining;
                if ($remaining > 0 && $remaining != 'EXPIRED' && $typename == 1)
                {
                    //return response()->json($usermembership);
                    $art = new Statistic;
                    $art->student_id = $usermembership->student_id;
                    $art->schedule_id = $scheduleid;
                    $art->membership_id = $usermembership->membership_id;
                    $art->type_id = $mealtype;
                    $art->save();

                    return response("0,". $usermembership->student->firstname." ".$usermembership->student->lastname.",".$usermembership->membership->title);
                }
                else if ($typename == 0)
                {
                    return response("1,". $usermembership->student->firstname." ".$usermembership->student->lastname.",".$usermembership->membership->title); //'Η συνδρομή σας δεν περιελαμβάνει αυτό τον τύπο γεύματος!
                    
                }
                else
                {
                    return response("2,". $usermembership->student->firstname." ".$usermembership->student->lastname.",".$usermembership->membership->title); //'Λυπούμαστε, η συνδρομή σας έχει λήξει, επικοινωνήστε με τον υπεύθυνο της λέσχης για ανανέωση της συνδρομής σας.
                    
                }
            }
            else
            {
                return response("3,". $usermembership->student->firstname." ".$usermembership->student->lastname.",".$usermembership->membership->title); //'Λυπούμαστε αλλά όπως φαίνεται έχετε φάει!'
                
            }

        }
        public function ckeckFreeSitisi($id)
        {
            $student = Student::where('paso', $id)->first();
            $free_sitisi= $student->free_sitisi;
            $today = Carbon::today()->format('Y-m-d');
            $now = Carbon::now()->format('H:i:s');
            foreach (Menu_type::all() as $type)
            {
                if ($now > $type->time_start && $now < $type->time_end)
                {
                    $mealtype = $type->id;
                }
            }
            $typename = 1;
                $scheduleid = Schedule_item::where('date', $today)->first()->id;
                $allreadyeatten = Statistic::whereStudent_id($student->id)
                    ->whereType_id($mealtype)->whereSchedule_id($scheduleid)->get();
    
                if ($allreadyeatten->isEmpty())
                {
                    if ($free_sitisi == 1)
                    {
                        //return response()->json($usermembership);
                        $art = new Statistic;
                        $art->student_id = $student->id;
                        $art->schedule_id = $scheduleid;
                        $art->membership_id = 0;
                        $art->type_id = $mealtype;
                        $art->save();
    
                        return response("0,". $student->firstname." ".$student->lastname.","."Δωρεάν Σίτιση");
                    }
                  
                    else
                    {
                        return response("2,". $student->firstname." ".$student->lastname.","."Δωρεάν Σίτιση"); //'Λυπούμαστε, η συνδρομή σας έχει λήξει, επικοινωνήστε με τον υπεύθυνο της λέσχης για ανανέωση της συνδρομής σας.
                        
                    }
                }
                else
                {
                    return response("3,". $student->firstname." ".$student->lastname.","."Δωρεάν Σίτιση"); //'Λυπούμαστε αλλά όπως φαίνεται έχετε φάει!'
                    
                }
            
    
            }
        public function getMealsByDate()
        {

            return response()->json($result);
        }

        
    }
    
