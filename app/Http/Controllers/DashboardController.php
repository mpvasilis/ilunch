<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement as Announcement;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //admin routes
    public function admin()
    {
        return view('admin.dashboard');
    }

    //dashboard routes
    public function about()
    {
        return view('dashboard.about');
    }

    public function dashboard()
    {
        //TODO get gevmata imeras
        $announcement = Announcement::active()->first();
        return view('dashboard.welcome')->with(['announcement' => $announcement, 'menuprwino' => [], 'menumeshmeriano' => [], 'menuvradino' => []]);
    }

    public function calendar()
    {
        //todo get array for calendar
        return view('dashboard.calendar');
    }

}
