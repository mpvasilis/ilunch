<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Announcement;


class NewsController extends Controller
{
    public function index(Announcement $announcement)
    {
        $announcements = $announcement->orderBy('created_at','desc')->get();

        $announcements= DB::table('announcements')->paginate(15);
        return view('news')->with('announcements', $announcements);
    }
}
