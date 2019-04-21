<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use Auth;
use App\Statistic;
use App\Schedule_item;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = collect([]);
        $user = Auth::user();
        // dd($user->student->id);
        if (Auth::user() && $user->role == 'STUDENT'){
            
            $statistics = Statistic::where('student_id',$user->student->id)->get();
            foreach ($statistics as $stat){
                $stat->schedule_item;
                $stats[$stat->schedule_item->id] =[ 'date' => $stat->schedule_item->date, 'meal_id' => $stat->type_id];
            }
        }

        $food=[];
        $today = Carbon::today();
        $date1 = $today->addDays(-3)->toDateString();
        $today = Carbon::today();
        $date2 = $today->addDays(3)->toDateString();

        $scheduleitems = Schedule_item::whereBetween('date', [$date1, $date2])->orderby('date','ASC')->get();

      
        foreach ($scheduleitems as $item){
            foreach($item->mealAssigns->groupby('type_id') as $mealassigns){
                // dd($mealassigns);
                $food=[];
                $facility ='';
                foreach ($mealassigns as $mealassign){
                    $meals=$mealassign->meal;
                    $facility= $mealassign->menu->facillity[0]->id;
                    array_push($food, [  'name'=> $meals->title,'meal_id'=>$mealassign->meal_id, 'menu_id' => $item->menu_id]);
                    $type_id=$mealassign->type_id;
                }
                $days[$facility][$item->date][$type_id]=$food;
            }
        }

        $facillities=[1,2];
    //   dd($days);

        return view('front.index',compact('stats','days','facillities'));
    }

    public function menu()
    {
        return view('front.menu');
    }

    public function news()
    {
        $announcements = Announcement::active()->orderBy('created_at', 'DESC')->paginate(5);
        return view('front.news')->with('announcements', $announcements);
    }

    public function language($lang)
    {
        $lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
