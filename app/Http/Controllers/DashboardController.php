<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
      return view('admin.dashboard');
    }
    public function meals(){
      return view('admin.meals');
    }
    public function announcments(){
      return view('admin.announcments');
    }
    public function statistics(){
      return view('admin.statistics');
    }
    public function feedback(){
      return view('admin.feedback');
    }
}
