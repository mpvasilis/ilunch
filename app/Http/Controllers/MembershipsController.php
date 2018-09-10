<?php

namespace App\Http\Controllers;

use App\Membership_assign;
use App\Membership_type;
use Illuminate\Http\Request;
use App\Membership;
use App\Student;
use Mockery\Exception;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Knp\Snappy\Pdf;

class MembershipsController extends Controller
{
    public function index()
    {
        $memberships = Membership::orderBy('is_active', 1)->get();
        return view('admin.memberships.show', compact('memberships'));
    }

    public function indexAssigns()
    {
        $memberships = Membership_assign::get();
        return view('admin.memberships.showAssigns', compact('memberships'));
    }

    public function assign()
    {
        $students = Student::get();
        $memberships = Membership::active()->get();
        return view('admin.memberships.assign', ['students' => $students, 'memberships' => $memberships]);
    }

    public function create()
    {
        $membershipTypes = Membership_type::get();
        return view('admin.memberships.create', compact('membershipTypes'));
    }

    public function createType()
    {
        return view('admin.memberships.createType', compact('membershipTypes'));
    }

    public function createTypeStore(Request $request)
    {
        $membershipType = new Membership_type();
        $membershipType->type = $request['type'];
        $membershipType->value = $request['value'];
        $membershipType->save();
        return Redirect::route('admin_memberships_create');
    }

    public function createStore(Request $request)
    {
        $membership = new Membership();
        $membership->title = $request['title'];
        $membership->breakfast = ($request['breakfast'] == 1 ? 1 : 0);
        $membership->lunch = ($request['lunch'] == 1 ? 1 : 0);
        $membership->dinner = ($request['dinner'] == 1 ? 1 : 0);
        $membership->type_id = $request['membershipType'];
        $membership->created_by = Auth::user()->id;
        $membership->save();
        return Redirect::route('admin_memberships_show');
    }

    public function assignStore(Request $request)
    {
        $assignment = new Membership_assign();
        $assignment->student_id = $request["student"];
        $assignment->membership_id = $request["membership"];
        $assignment->created_by = Auth::user()->id;
        $assignment->save();
        return Redirect::route('admin_memberships_showAssign');
    }

    public function deactivate($membershipId)
    {
        $membership = Membership::find($membershipId);
        if ($membership != null) {
            $membership->is_active = 0;
            $membership->save();
            return Redirect::route('admin_memberships_show');
        } else {
            return abort(404, 'deactivationMembershipNotFound');
        }
    }

    public function deleteAssign($assignId)
    {
        try {
            Membership_assign::find($assignId)->delete();
        } catch (\Exception $e) {
            return abort(500, $e . getMessage());
        }
        return Redirect::route('admin_memberships_showAssign');
    }

    public function printAssign($assignId){
        $myProjectDirectory = 'C:\Users\Christos Sarantis\Desktop';
        $snappy = new Pdf($myProjectDirectory . '/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="file.pdf"');
        echo $snappy->getOutput(url("admin/memberships/assign/$assignId/view"));
    }

    public function viewAssignCard($assignId)
    {   
 
        $assign = Membership_assign::find($assignId);
        if ($assign != null) {
            return view('admin.memberships.printAssign', ['assign' => $assign, 'id' => Crypt::encrypt($assignId)]);
        } else {
            return abort(404, 'printAssignMembershipNotFound');
        }

    }
}
