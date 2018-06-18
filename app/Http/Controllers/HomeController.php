<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\FormBuilder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('front.index');
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
