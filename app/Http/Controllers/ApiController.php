<?php

namespace App\Http\Controllers;

use App\Membership_assign;
use App\Student;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use App\Announcement;
use App\Menu;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;

class ApiController extends Controller
{
    public function getMealCalendar()
    {
        //todo find whole callendar for next 2 weeks and create json for the front page
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);
    }

    public function getMealsByDate($date)
    {

    }

    public function validateMembership($cypherMembershipId)
    {
        try {
            $membershipId = Crypt::decrypt($cypherMembershipId);
        } catch (DecryptException  $e) {
            return response()->json(['status' => 'fail', 'error' => 'ENCRYPTION_ERROR']);
        }
        $membership = Membership_assign::find($membershipId);
        if ($membership != null) {
            if ($membership->remaining != 'EXPIRED') {
                return response()->json(['status' => 'success', 'info' => $membership]);
            }
            return response()->json(['status' => 'fail', 'error' => 'EXPIRED']);
        }
        return response()->json(['status' => 'fail', 'error' => 'NOT_FOUND']);
    }

    public function validateStudent($studentId)
    {
        //todo check all available memberships for the student
        $student = Student::aem($studentId)->first();
        if ($student != null) {
            $memberships = $student->memberships;
            foreach ($memberships as $assign) {
                if ($assign->remaining != 'EXPIRED') {
                    return response()->json(['status' => 'success', 'info' => $assign]);
                }
            }
            return response()->json(['status' => 'fail', 'error' => 'NO_MEMBERSHIP']);
        } else {
            return response()->json(['status' => 'fail', 'error' => 'NOT_FOUND']);
        }
    }

}
