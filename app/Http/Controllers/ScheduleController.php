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
        $facmenus = $menus->groupBy('facility_id') ;
        $dayss= [];
        $zeroday= collect([]);
        $gooday= [];
        $dayfood=[];
        foreach ($facmenus as $key=>$menus){
            for ($i=0;$i<=7*$recurseWeeks;$i++){
                for($j=1;$j<=3;$j++){
                    $dayss[$key][$i][$j] =['0'=>[ 'name'=> '','meal_id'=>'','menu_id' =>''],'1' => [ 'name'=> '','meal_id'=>'','menu_id' =>''], '2' => [ 'name'=> '','meal_id'=>'','menu_id' =>'']];
                }      
            }
        }
        foreach ($facmenus as $key=>$menus){
            foreach ($menus as $menu){
                $day= $menu->day;
                $week = $menu->week;
                if($week==1){
                    $day=$day;
                }else{
                    $day=$day+($week-1)*7 ;
                }
                $food=[];
                foreach($menu->mealAssigns->groupBy('type_id') as $mealassigns){
                    $food=[];
                    foreach ($mealassigns as $mealassign){
                        $meals=$mealassign->meal;
                        array_push($food, [ 'name'=> $meals->title,'meal_id'=>$mealassign->meal_id, 'menu_id' => $menu->id]);
                        $type_id=$mealassign->type_id;
                    }
                    $dayss[$key][$day][$type_id]=$food;
                }  
            };
            $meals= Menu_meal::pluck('title', 'id');
        }

        
        return view('admin.schedule.showlist', compact('dayss','meals'));
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

        
        if($request->day<=7){
            $day = $request->day;
            $week = 1;
        }else{
            $day = $request->day % 7;
            $week = (($request->day - $day)/7)+1;
        }
        $menu = Menu::where('day',$day)->where('week', $week)->where('facility_id', $request->facillity)->get();
        
        if(count($menu) == 0){
            $men = new Menu;

            $men->day = $day;
            $men->week = $week;
            $men->facility_id = $request->facillity;
            $men->save();
            $menu = Menu::where('day',$day)->where('week', $week)->where('facility_id', $request->facillity)->get();
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
    public function delete(Request $request)
    {   
     
        Menu_assign::where('meal_id', $request['meal'])->Where('menu_id',$request['menu'])->Where('type_id',$request['type'])->delete();

        

        return $this->index();
      
    }
}
