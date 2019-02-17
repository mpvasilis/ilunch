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
        return json_encode(array("test" => "true"));
    }

    public function getStudentMatches($searchString){
        $matches = Student::where('firstname', 'LIKE', '%'.$searchString.'%')->orWhere('lastname', 'LIKE', '%'.$searchString.'%')->orWhere('aem', 'LIKE', '%'.$searchString.'%')->get();

        $result = array();
        foreach ($matches as $item){
            array_push($result, [
               'aem' => $item->aem,
               'firstname' => $item->firstname,
               'lastname' => $item->lastname
            ]);
        }
        return response()->json($result);
    }

    public function getMealStatistics(){
       
        return response()->json($result);
    }

    public function submitFeedback(Request $request){
       $data = $request->all();
       foreach($data["data"] as $row)
       {
        $success = Rating::create(['menu_id' => $row["menu_id"],
                                   'rating'  => $row["rating"],
                                   'date'    => $row["date"]          
       ]);
        if ( is_null($success) ) {
            return response()->json("There was an error, pls try again");
        } 
       }
        return response()->json("Success, we did'it!");
    }
    public function getLatestAnnouncement(){

        $matches = Announcement::orderBy('created_at', 'desc')->first();
        return response()->json($matches);

    }
    public function validateAnonymousCustomer($r){
        
        return response()->json($result);
    }
    public function validateCustomer($id){
        $usermembership = Membership_assign::where('student_id',$id)->orderBy('created_at','DESC')->first();
        $today = Carbon::today()->format('Y-m-d');
        $now = Carbon::now()->format('H:i:s');
        foreach (Menu_type::all() as $type){
            if ($now > $type->time_start && $now < $type->time_end)
            {
                $mealtype= $type->id;
            }
        }
        
        switch ($mealtype) {
            case 1:
                {
                    $typename= $usermembership->membership->breakfast;
                }
            case 2:
                {
                    $typename= $usermembership->membership->lunch;
                } 
            case 3:
                {
                    $typename= $usermembership->membership->dinner;
                }
            } 
        $scheduleid=Schedule_item::where('date', $today)->first()->id;       
        $allreadyeatten = Statistic::whereStudent_id($usermembership->student_id)->whereType_id($mealtype)->whereSchedule_id($scheduleid)->get();
        
        if($allreadyeatten->isEmpty()){
            $remaining=$usermembership->remaining;
            if ($remaining > 0 && $remaining != 'EXPIRED' && $typename==1){
                //return response()->json($usermembership);
                
                $art = new Statistic;
                $art->student_id = $usermembership->student_id;
                $art->schedule_id = $scheduleid;
                $art->membership_id = $usermembership->membership_id;
                $art->type_id = $mealtype;
                $art->save();

                return response()->json($id);
            }else if($typename==0){
                return response()->json('Η συνδρομή σας δεν περιελαμβάνει αυτό τον τύπο γεύματος!');
            }
            else{
                return response()->json('Λυπούμαστε, η συνδρομή σας έχει λήξει, επικοινωνήστε με τον υπεύθυνο της λέσχης για ανανέωση της συνδρομής σας.');
            }
        }else{
            return response()->json('Λυπούμαστε αλλά όπως φαίνεται έχετε φάει!');
        }
        
        
        
        
      
    }
    public function getMealsByDate(){
        
        return response()->json($result);
    }
    // public function getMealCalendar(){
        
    //     return response()->json($result);
    // }

 
  

}
