<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Announcement;
use Carbon\Carbon;
class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = DB::table('announcements')->get();

        return view('admin.announcements', compact('announcements'));
    }

    public function post(Request $request)
    {   
      
        $announcement= new Announcement();
        $announcement->title= $request['title'];
        $announcement->content= $request['content'];
        $announcement->type= $request['type'];
        
        
        $announcement->show_until = Carbon::parse($request['show_until'])->format('Y-d-m');
        $announcement->save();
        $announcements = DB::table('announcements')->get();

        
        return view('admin.announcements', compact('announcements'));
    }
}
