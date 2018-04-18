<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Membership;
use App\Student;
class MembershipsController extends Controller
{
    public function index(){
        $memberships = DB::table('memberships')->get();
        return view('admin.memberships.show',compact('memberships'));
    }

    public function create(){
        $students = DB::table('students')->get();
       
        $memberships = DB::table('memberships')->get();
        return view('admin.memberships.create',compact('students'));
    }
}
