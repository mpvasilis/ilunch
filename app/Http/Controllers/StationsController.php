<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Station;
use App\Facillity;

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

        $facillit= Facillity::all();
        foreach($facillit as $fac) {
            $facillities[$fac->id] = $fac->title;
        }

        $stations= Station::get();
        return view('admin.stations', compact('stations','facillities'));
    }


    public function post(Request $request)
    {
        $facillity = new Station();
        $facillity->name = $request['title'];
        $facillity->info = $request['info'];
        $facillity->is_active = $request['is_active'];
        $facillity->save();
        $facillities = DB::table('stations')->get();
        return view('admin.stations', compact('stations'));
    }

    public function update(Request $request)
    {
        Menu_meal::where('id', $request['id'])->update(['title' => $request['title'], 'info' => $request['info'], 'is_active' => $request['is_active']]);

        $facillities = DB::table('Menu_meals')->get();

        return view('admin.meals', compact('meals'));
    }

    public function delete(Request $request)
    {

        Menu_meal::where('id', $request['id'])->delete();

        $facillities = DB::table('Menu_meals')->get();

        return view('admin.meals', compact('meals'));
    }
}
