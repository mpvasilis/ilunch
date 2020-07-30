<?php

namespace App\Http\Controllers;

use App\Department;
use App\Student;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{


    /**
     * StudentController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff', ['only' => ['create', 'createStore']]);
        // $this->middleware('can_view_profile', ['only' => ['profileUpdate']]);
    }

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
                $student = new Student();
                $student->aem = $studentAem;
               

                $status = $student->save();
                    
                if(!$status){
                    report("Σφάλμα κατα την εγγραφή.");
                }
                return $this->profile($studentAem);
            } else {
                abort(404, 'studentProfileNotFoundException');
            }
        }
        return view('admin.student.profile', compact('student'));
    }

    public function profileEdit($studentAem)
    {
        $student = Student::aem($studentAem)->first();
        $departments = Department::get();
        if ($student == null) {
            return Redirect::route('profile', ['studentId' => $studentAem]);
        }
        return view('admin.student.editProfile', ['student' => $student, 'departments' => $departments]);
    }

    public function profileUpdate($studentAem, Request $request)
    {

        $student = Student::aem($studentAem)->first();
        if ($student == null)
            abort('404', 'studentProfileUpdateNotFoundException');
        $student->firstname = $request["firstname"];
        $student->lastname = $request["lastname"];
        $student->father_name = $request["father_name"];
        $student->semester = $request["semester"];
        $student->department_id = $request["department"];
        if ($request->file('photo') != null && $request->file('photo')->isValid()) {
            $extension = $request->photo->extension();
            if (in_array($extension, array('jpg', 'jpeg', 'png'))) {
                $student->photo = md5($student->id) . '.' . $extension;
                $request->photo->storeAs('public/studentProfiles', md5($student->id) . '.' . $extension);
                $status = $student->save();
                    
                if(!$status){
                    report("Σφάλμα κατα την εγγραφή.");
                }
                return view('admin.student.profile', compact('student'));
            } else {
                return abort('403', 'studentProfileUpdateIllegalFileExtension');
            }
        } else {
            $status = $student->save();
                    
            if(!$status){
                report("Σφάλμα κατα την εγγραφή.");
            }
            return view('admin.student.profile', compact('student'));
        }
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
        $status = $student->save();
                    
        if(!$status){
            report("Σφάλμα κατα την εγγραφή.");
        }

        return Redirect::route('admin_students');

    }
}
