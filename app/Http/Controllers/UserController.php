<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{

    public function show()
    {
        $this->middleware('access_administrator');

        $users = User::get();

        return view('admin.users.show', compact('users'));
    }

    public function showEdit($id)
    {
        $this->middleware('access_administrator');

        $user = User::find($id);

        return view('admin.users.showEdit', compact('user'));
    }

    public function edit($id, Request $request)
    {
        $this->middleware('access_administrator');

        $user = User::find($id);
        $user->role = $request['role'];
        $user->name = $request['name'];
        $user->student_id = $request['student_id'];
        $user->save();
        return redirect(route('admin_users_show'));
    }
}
