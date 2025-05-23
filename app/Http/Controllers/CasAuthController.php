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
            
            
            $tmp=explode(':',$info['schacPersonalPosition']);
            $depid=$tmp[9];
            $occupation=$tmp[7];
    
            $uid=$info['uid'];
            $aem=preg_replace('/[^0-9]/', '', $uid);
                
            $user = User::where('student_id', $aem)->first();
            if (!is_null($user)) {
                Auth::login($user, true);
                return Redirect::route('index');
            } else {
                try {

                    $tmp=explode(':',$info['schGrAcEmployment']);
                    $yearin=$tmp[8];
                    try {
                    $tmp=explode(':',$info['schGrAcEnrollment']);
                    $semester=$tmp[7];
                } catch (\Exception $e) {
                   // return abort(500, $e->getMessage());
                }
            

                    if($info["eduPersonAffiliation"]!="faculty"){

                        $user = new User();
                        $user->student_id = $aem;
                        $user->name = $info["cn"][1];
                        $user->email = $info["mail"];
                        $user->password = 'STUDENT_PASS_TO_RESET';
                        $user->role = "STUDENT";
                        //dd($user);
                        $status = $user->save();
                        if(!$status){
                            report("Σφάλμα κατα την εγγραφή.");
                        }    
                        $profile = new Student();
                        $profile->aem = $aem;
                        $profile->firstname = $info["givenName"][0];
                        $profile->lastname = $info["sn"][0];
                        $profile->semester = $semester;
                        $status = $profile->save();
                        
                        if(!$status){
                            report("Σφάλμα κατα την εγγραφή.");
                        }

                }
                else{
                        $user = new User();
                        $user->student_id = "99".rand(10,9000);
                        $user->name = $info["cn"][1];
                        $user->email = $info["mail"];
                        $user->password = 'FACULITY_PASS_TO_RESET';
                        $user->role = "STUDENT";
                        //dd($user);
                        $status = $user->save();
                        if(!$status){
                            report("Σφάλμα κατα την εγγραφή.");
                        }
                        $profile = new Student();
                        $profile->aem =  "99".rand(10,9000);
                        $profile->firstname = $info["givenName"][0];
                        $profile->lastname = $info["sn"][0];
                        $profile->semester = "0";
                        $status = $profile->save();
                        
                        if(!$status){
                            report("Σφάλμα κατα την εγγραφή.");
                        }
                }
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

