<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use app\Menu_meal;
use App\Http\Requests\StoreMealsRequest;
class MealsController extends Controller
{
    public function index()
    {
        $meals = DB::table('menu_meals')->get();

        return view('admin.meals', compact('meals'));
    }

   

    public function store(StoreMealsRequest $request)
    {
       
        DB::table('menu_meals')->insert([
            ['title' =>  $request->get('title'), 
            'info' => $request->get('info'),
            'is_active' => $request->get('is_active'), 
            'type_id'=> $request->get('type_id')]      
        ]);

        return redirect()->route('admin.meals');
    }
}
