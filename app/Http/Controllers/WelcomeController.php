<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Menu;
use App\setting;

class WelcomeController extends Controller
{
    public function index(Announcement $announcement, Menu $menus, setting $setting)
    {
        $settings = $setting->where('setting','=','time_counter')->first();
        $day = 1;
        $announcement = $announcement->orderBy('id','DESC')-> first();
        $menuprwino = $menus->Food()->Breakfast()->Day($day)->get();
        $menumeshmeriano = $menus->Food()->Lunch()->Day($day)->get();
        $menuvradino = $menus->Food()->Dinner()->Day($day)->get();

        return view('welcome')->with('announcement', $announcement)->with('menuprwino',$menuprwino)->with('menumeshmeriano',$menumeshmeriano)->with('menuvradino',$menuvradino);
    }
}
