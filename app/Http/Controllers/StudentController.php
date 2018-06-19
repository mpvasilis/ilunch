<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller
{
    public function adminIndex($departmentId)
    {
        //todo add index filters with department id (department->students())
        if ($departmentId != null)
            $students = Student::byDepartment($departmentId)->get();
        else
            $students = Student::get();
        return view('admin.students', compact('students'));
    }

    public function profile($studentAem)
    {
        $student = Student::aem($studentAem)->first();
        if ($student == null) {
            if ($studentAem == Auth::user()->student_id) {
                $student = Student::create([
                    'aem' => $studentAem,
                ]);
                return view('dashboard.student.editProfile', compact('student'));
            } else {
                abort(404, 'studentProfileNotFoundException');
            }
        }
        return view('dashboard.student.profile', compact('student'));
    }

    public function profileEdit($studentAem)
    {
        $student = Student::aem($studentAem)->first();
        return view('dashboard.student.editProfile', compact('student'));
    }

    public function profileUpdate(Request $request)
    {
        //todo store new data to profile info and upload photo with student_id in storage
    }

    public function create(Request $request)
    {

    }
}
