<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function index(){

        $settings=Setting::all();
        return view('admin.settings', compact('settings'));
    }
    public function edit(Request $request){
        try{
            Setting::where('setting','=','DATABASE_REVISION')
            ->update(['value' => $request->DATABASE_REVISION]);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
        try{
            Setting::where('setting','=','schedule_recurse_weeks')
            ->update(['value' => $request->schedule_recurse_weeks]);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
        try{
            Setting::where('setting','=','schedule_recurse_start')
            ->update(['value' => $request->schedule_recurse_start]);  
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
          $settings=Setting::all();
          return view('admin.settings', compact('settings'));
    }
}
