<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;

class CasAuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::check()) {
            if (!cas()->checkAuthentication()) {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                }
                cas()->authenticate();
            }
            $info = cas()->getAttributes();
            $user = User::where('student_id', $info["GUStudentID"])->first();
            if (!is_null($user)) {
                Auth::login($user, true);
                return Redirect::route('index');
            } else {
                try {
                    $user = new User();
                    $user->student_id = $info["GUStudentID"];
                    $user->name = $info["cn"];
                    $user->email = $info["mail"];
                    $user->password = 'toBeReset';
                    $user->role = 'STUDENT';
                    $user->save();

                    $profile = new Student();
                    $profile->aem = $info["GUStudentID"];
                    $profile->firstname = $info["givenName"];
                    $profile->lastname = $info["sn"];
                    $profile->semester = $info["GUStudentSemester"];
                    $profile->save();

                    Auth::login($user, true);
                    return Redirect::route('index');
                } catch (\Exception $e) {
                    return abort(500, $e->getMessage());
                }
            }
        } else {
            return Redirect::route('index');
        }
    }

    public function logout()
    {
        if (cas()->checkAuthentication()) {
            cas()->logout();
        }
        return Redirect::route('index');
    }
}

