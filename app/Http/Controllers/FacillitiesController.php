<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Facillity;
use App\Http\Requests\StoreFacillitiesRequest;

class FacillitiesController  extends Controller
{


    /**
     * FacillitiesController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff');
    }

    public function index()
    {
        $facillities= Facillity::get();
        return view('admin.facillities', compact('facillities'));
    }


    public function post(Request $request)
    {
        $facillity = new Facillity();
        $facillity->title = $request['title'];
        $facillity->info = $request['info'];
        $facillity->is_active = $request['is_active'];
        
        $status = $facillity->save();
                    
        if(!$status){
            report("Σφάλμα κατα την εγγραφή.");
        }
        $facillities = DB::table('facillities')->get();
        return view('admin.facillities', compact('facillities'));
    }

    public function update(Request $request)
    {
        try{
            Facillity::where('id', $request['id'])->update(['title' => $request['title'], 'info' => $request['info'], 'is_active' => $request['is_active']]);
        } catch (\Exception $e) {
             return abort(500, $e->getMessage());
         }

        $facillities = DB::table('facillities')->get();

        return view('admin.facillities', compact('facillities'));
    }

    public function delete(Request $request)
    {

        try{
            Facillity::where('id', $request['id'])->delete();
        } catch (\Exception $e) {
             return abort(500, $e->getMessage());
         }
    

        $facillities = DB::table('facillities')->get();

        return view('admin.facillities', compact('facillities'));
    }
}
