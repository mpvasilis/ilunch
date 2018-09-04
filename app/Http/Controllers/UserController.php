<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use Carbon\Carbon;
use Auth;
use App\User;

class UserController extends Controller
{
    public function show()
    {
        $users = User::get();

        return view('admin.users.show', compact('users'));
    }

    public function editShow($id)
    {
        $user = User::find($id)->get();

        return view('admin.users.showEdit', compact('user'));
    }
}
