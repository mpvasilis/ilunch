<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_administrator');
    }

    public function show()
    {

        $users = User::get();

        return view('admin.users.show', compact('users'));
    }

    public function showEdit($id)
    {

        $user = User::find($id);

        return view('admin.users.showEdit', compact('user'));
    }

    public function edit($id, Request $request)
    {

        $user = User::find($id);
        $user->role = $request['role'];
        $user->name = $request['name'];
        $user->student_id = $request['student_id'];
        $user->save();
        return redirect(route('admin_users_show'));
    }
}
