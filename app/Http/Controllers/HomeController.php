<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;
use Auth;
use App\Statistic;

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
        
        if (Auth::user() && $user->role == 'STUDENT'){
           
            $statistics = Statistic::where('student_id',$user->student->id)->get();
            foreach ($statistics as $stat){
                $stat->schedule_item;
                $stats[$stat->schedule_item->id] =[ 'date' => $stat->schedule_item->date, 'meal_id' => $stat->type_id];
            }
        }

        return view('front.index',compact('stats'));
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
