<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = DB::table('announcements')->get();

        return view('admin.announcements', compact('announcements'));
    }
}
