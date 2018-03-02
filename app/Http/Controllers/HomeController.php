<?php

namespace App\Http\Controllers;

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
        return view('front');
    }

    public function language($lang)
    {
        $lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
