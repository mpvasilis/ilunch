<?php

namespace App\Http\Controllers;

use App\Department;
use App\Student;
use Illuminate\Http\Request;
use Auth;
use Redirect;

class StudentController extends Controller
{
    public function adminIndex()
    {
        $students = Student::get();
        return view('admin.students.show', compact('students'));
    }

    public function profile($studentAem)
    {
        $student = Student::aem($studentAem)->first();
        if ($student == null) {
            if ($studentAem == Auth::user()->student_id) {
                $student = (new \App\Student)->create([
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

    public function create()
    {
        $departments = Department::get();
        return view('admin.students.create', compact('departments'));
    }

    public function createStore(Request $request)
    {
        $student = new Student();
        $student->firstname = $request["firstName"];
        $student->lastname = $request["lastName"];
        $student->father_name = $request["fatherName"];
        $student->semester = $request["semester"];
        $student->department_id = $request["department"];
        $student->aem = $request["aem"];
        $student->save();

        return Redirect::route('admin_students');

    }
}
