<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Menu_meal as Menu_meal;
use App\Http\Requests\StoreMealsRequest;

class MealsController extends Controller
{


    /**
     * MealsController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff');
    }

    public function index()
    {
        $meals = Menu_meal::get();
        return view('admin.meals', compact('meals'));
    }


    public function post(Request $request)
    {
        $meal = new Menu_meal();
        $meal->title = $request['title'];
        $meal->info = $request['info'];
        $meal->is_active = $request['is_active'];
        $meal->save();
        $meals = DB::table('menu_meals')->get();
        return view('admin.meals', compact('meals'));
    }

    public function update(Request $request)
    {
        Menu_meal::where('id', $request['id'])->update(['title' => $request['title'], 'info' => $request['info'], 'is_active' => $request['is_active']]);

        $meals = DB::table('menu_meals')->get();

        return view('admin.meals', compact('meals'));
    }

    public function delete(Request $request)
    {

        Menu_meal::where('id', $request['id'])->delete();

        $meals = DB::table('menu_meals')->get();

        return view('admin.meals', compact('meals'));
    }
}
