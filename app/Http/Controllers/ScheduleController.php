<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Schedule_item;
use App\Setting;
use App\Menu_meal;
use App\Menu_assign;
use Carbon\Carbon;
use Closure;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $recurseWeeks = Setting::where('setting','schedule_recurse_weeks')->first()->value;
        $days = 7 * $recurseWeeks;
        $menus = Menu::all();
        $days= [];
        $zeroday= collect([]);
        $gooday= [];
        $dayfood=[];
        for ($i=1;$i<=7*$recurseWeeks;$i++){
            for($j=1;$j<=3;$j++){
                $days[$i][$j] =['0'=>[ 'name'=> '','meal_id'=>''],'1' => [ 'name'=> '','meal_id'=>''], '2' => [ 'name'=> '','meal_id'=>'']];
            }
                
                
                
        }
        
        foreach ($menus as $menu){
            //dd($menu);
            $day= $menu->day;
            $week = $menu->week;
            if($week==1){
                $day=$day;
            }else{
                $day=$day+($week-1)*7 ;
            }
          
            $food=[];
          
          // dd($menu->mealAssigns);
            foreach($menu->mealAssigns->groupBy('type_id') as $mealassigns){
                $food=[];
                foreach ($mealassigns as $mealassign){
                    $meals=$mealassign->meal;
                    array_push($food, [ 'name'=> $meals->title,'meal_id'=>$mealassign->meal_id]);
                    $type_id=$mealassign->type_id;
                }
              //  print_r('day:'.$day.'-type'.$type_id);
                $days[$day][$type_id]=$food;
            }
          
        //    dd($days);
            
            
             
           
        };
        
        $meals= Menu_meal::pluck('title', 'id');
        // dd($meals);
        // foreach ($days as $key=>$day){
        //   array_push($gooday, $key);
        // }
        //print_r($gooday);
        
        
         
        
 

        return view('admin.schedule.showlist', compact('days','meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // dd($request->day%7);
        if($request->day<=7){
            $day = $request->day;
            $week = 1;
        }else{
            $day = $request->day % 7;
            $week = (($request->day - $day)/7)+1;
        }
        $menu = Menu::where('day',$day)->where('week', $week)->get();
        
        if(count($menu) == 0){
            $men = new Menu;

            $men->day = $day;
            $men->week = $week;
            $men->save();
            $menu = Menu::where('day',$day)->where('week', $week)->get();
        }
        $meals = $request->meals;
        foreach($meals as $meala){
            $meal = new Menu_assign;

            $meal->meal_id = $meala;
            $meal->menu_id = $menu[0]->id;
            $meal->type_id = $request->type_id;
    
            $meal->save();
            
        }
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
