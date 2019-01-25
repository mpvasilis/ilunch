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

      
        $data=json_decode($request->data);
        
        $studentid=2;
        $menuid=1;
        $membid=4;
        $art = new Statistic;
		$art->student_id = $studentid;
		$art->menu_id = $menuid;
		$art->membership_id = $membid;
		$art->save();

        return response()->json($id);
    }
    public function getMealsByDate(){
        
        return response()->json($result);
    }
    // public function getMealCalendar(){
        
    //     return response()->json($result);
    // }

 
  

}
