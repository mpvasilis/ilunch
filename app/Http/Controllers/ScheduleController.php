<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Schedule_item;
use App\Setting;
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
        $days = collect([['1' => 'Δευτέρα'],['2' => 'Τρίτη']]);
        $menus = Menu::all();
        $days= collect([]);
       $zeroday= collect([]);
       $gooday= [];
 
        foreach ($menus as $menu){
            
            $day= $menu->day;
            $week = $menu->week;
            if($week==1){
                $day=$day;
            }else{
                $day=$day+($week-1)*7 ;
            }
            $food=[];
            foreach($menu->mealAssigns as $mealassign){
              $meals=$mealassign->meal;
             
                    array_push($food, $meals->title);
                
            }
            $his = collect(['day' => $day, 'type' => $menu->type_id, 'meals' => $food ]);
            $days->push($his);
        };
        $days=$days->groupBy('day');
        
        foreach ($days as $key=>$day){
           
        for ($i=1;$i<=7*$recurseWeeks;$i++){
            if(in_array($i, $gooday)){

            }else
               {
                    for($j=1;$j<=3;$j++){
                        $her = collect(['day' => $i, 'type' => $j, 'meals' => '0' ]); 
                    }
               
                    $zeroday->push($her);
                };
            }
        }
        
      $zeroday=$zeroday->groupBy('day');
       $days=$days->merge($zeroday);
       $days =collect($days)->sortBy('day')->toArray();
        // dd($days);
        return view('admin.schedule.showlist', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
