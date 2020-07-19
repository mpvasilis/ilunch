<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 1/29/19
 * Time: 9:17 PM
 */

namespace App\Http\Middleware;

use App\Menu;
use App\Schedule_item;
use App\Setting;
use Carbon\Carbon;
use Closure;


class MaintainSchedule
{
    public function handle($request, Closure $next, $guard = null)
    {
        $recurseWeeks = Setting::where('setting','schedule_recurse_weeks')->first()->value;
        $today = Carbon::create();
        
        $lastDate = Schedule_item::orderBy('date','DESC')->first();
        
        if($lastDate !=null){
            $lastDate = $lastDate->date;
        }else{
            $lastDate = $today->format('Y-m-d');
            
        }
        $lastScheduleDate = Carbon::createFromFormat('Y-m-d', $lastDate);
        
        $thisDay = Carbon::create();
        $today->addDays($recurseWeeks*7);
        
        while($today->format('Y-m-d') >= $lastScheduleDate->format('Y-m-d')){
            $lastScheduleDate->addDays(1);
           
            $startWeekDate =  Setting::where('setting','schedule_recurse_start')->first();
            
            if($startWeekDate == null){
                $startWeekDate = $thisDay->format('Y-m-d');
                $setting = new Setting();
                $setting->setting = 'schedule_recurse_start';
                $setting->value = $startWeekDate;
                $setting->save();
            }else{
                $startWeekDate = $startWeekDate->value;
                
            }
            $startWeekDate = Carbon::createFromFormat('Y-m-d',$startWeekDate);
            $thisWeek = $startWeekDate->diffInWeeks($thisDay) < $recurseWeeks ? $startWeekDate->diffInWeeks($thisDay) +1 : ($startWeekDate->diffInWeeks($thisDay) % $recurseWeeks)+1;
            
            $itemMenus = Menu::where(function($q) use ($lastScheduleDate) {
                return $q->where('day', $lastScheduleDate->format('N'))->orWhere('day', 0);
            })->where(function($q) use ($thisWeek){
                return $q->where('week',0)->orWhere('week',$thisWeek);
            })->get();
            // dd($itemMenus);
            foreach($itemMenus as $menu) {
                $schedule_item = new  Schedule_item();
                $schedule_item->date = $lastScheduleDate->format('Y-m-d');
                $schedule_item->menu_id = $menu->id;
                
                $schedule_item->save();
            }
        }
        return $next($request);
    }
}