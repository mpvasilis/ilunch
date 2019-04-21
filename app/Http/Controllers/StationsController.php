<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Station;
use App\Http\Requests\StoreMealsRequest;

class StationsController extends Controller
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
        $stations= Station::get();
        return view('admin.stations', compact('stations'));
    }


    public function post(Request $request)
    {
        $meal = new Menu_meal();
        $meal->title = $request['title'];
        $meal->info = $request['info'];
        $meal->is_active = $request['is_active'];
        $meal->save();
        $meals = DB::table('Menu_meals')->get();
        return view('admin.meals', compact('meals'));
    }

    public function update(Request $request)
    {
        Menu_meal::where('id', $request['id'])->update(['title' => $request['title'], 'info' => $request['info'], 'is_active' => $request['is_active']]);

        $meals = DB::table('Menu_meals')->get();

        return view('admin.meals', compact('meals'));
    }

    public function delete(Request $request)
    {

        Menu_meal::where('id', $request['id'])->delete();

        $meals = DB::table('Menu_meals')->get();

        return view('admin.meals', compact('meals'));
    }
}
