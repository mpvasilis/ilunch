<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use Carbon\Carbon;
use Auth;


class AnnouncementsController extends Controller
{


    /**
     * AnnouncementsController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff');
    }

    public function index()
    {

        $announcements = Announcement::all();
       
        return view('admin.announcements', compact('announcements'));
    }

    public function post(Request $request)
    {

        $announcement = new Announcement();
        $announcement->title = $request['title'];
        $announcement->content = $request['content'];
        $announcement->type = $request['type'];
        $announcement->created_by = Auth::user()->id;


        $announcement->show_until = Carbon::parse($request['show_until'])->format('Y-m-d H:i:s');
        $announcement->save();
        $announcements = Announcement::get();


        return view('admin.announcements', compact('announcements'));
    }

    public function update(Request $request)
    {

        Announcement::where('id', $request['id'])->update(['title' => $request['title'], 'content' => $request['content'], 'show_until' => $request['show_until'], 'type' => $request['type']]);

        $announcements = Announcement::get();

        return view('admin.announcements', compact('announcements'));
    }

    public function delete(Request $request)
    {


        Announcement::where('id', $request['id'])->delete();

        $announcements = Announcement::get();

        return view('admin.announcements', compact('announcements'));
    }
}
