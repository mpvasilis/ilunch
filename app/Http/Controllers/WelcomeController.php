<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Menu;

class WelcomeController extends Controller
{
    public function index(Announcement $announcement, Menu $menus)
    {
        $announcement = $announcement->orderBy('id','DESC')-> first();
        $menuprwino = $menus->join('menu_assigns','menu_assigns.menu_id','=','menus.id')->join('menu_meals','menu_meals.id','=','menu_assigns.meal_id')->Breakfast()->get();
        $menumeshmeriano = $menus->join('menu_assigns','menu_assigns.menu_id','=','menus.id')->join('menu_meals','menu_meals.id','=','menu_assigns.meal_id')->Lunch()->get();
        $menuvradino = $menus->join('menu_assigns','menu_assigns.menu_id','=','menus.id')->join('menu_meals','menu_meals.id','=','menu_assigns.meal_id')->Dinner()->get();
        return view('welcome')->with('announcement', $announcement)->with('menuprwino',$menuprwino)->with('menumeshmeriano',$menumeshmeriano)->with('menuvradino',$menuvradino);
    }
}
