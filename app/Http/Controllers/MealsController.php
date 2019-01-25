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
        $prwino = ($request['prwino'] != null ? $request['prwino'] : 'null' );
        $meshmeriano = ($request['meshmeriano']!= null ? $request['meshmeriano'] : 'null' );
        $vradyno = ($request['vradyno']!= null ? $request['vradyno'] : 'null' );
        $meal->menu_types= $prwino."-".$meshmeriano."-".$vradyno;
        $meal->save();
        $meals = DB::table('Menu_meals')->get();





        return view('admin.meals', compact('meals'));
    }

    public function update(Request $request)
    {
      $prwino = ($request['prwino'] != null ? $request['prwino'] : 'null' );
      $meshmeriano = ($request['meshmeriano']!= null ? $request['meshmeriano'] : 'null' );
      $vradyno = ($request['vradyno']!= null ? $request['vradyno'] : 'null' );
      $menu_types= $prwino."-".$meshmeriano."-".$vradyno;
        Menu_meal::where('id', $request['id'])->update(['title' => $request['title'], 'info' => $request['info'], 'is_active' => $request['is_active'], 'menu_types' => $menu_types ]);

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
