<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use DB;

class StatsController extends Controller
{

public function index(){

	  $history= DB::table('history')->get();
	  $historys= collect([]);
        foreach($history as $h){
            
            $user = DB::table('students')->where('id',$h ->student_id)->first();
			$name = $user->fistname . " " . $user->lastname;
			if ($h->type== 1){
				$meal_type = "Πρωινό";
			}elseif($h->type == 1){
				$meal_type = "Μεσημεριανό";
			}else{
				$meal_type = "Βραδυνό";
			}
			
            
            $his = collect(['id' => $h->id, 'name' => $name, 'date'=> $h->date, 'meal_type' => $meal_type]);
            $historys -> push($his);
        }
        
		
      return view('admin.statistics',compact('historys'));
    }
    
}
