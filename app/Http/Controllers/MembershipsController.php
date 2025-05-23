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
use DB;
use Illuminate\Support\Facades\Crypt;
use Knp\Snappy\Pdf;

class MembershipsController extends Controller
{


    /**
     * MembershipsController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff', ['only' => ['deleteAssign', 'index', 'create', 'createType', 'deleteAssign', 'printStatus', 'createTypeStore', 'createStore']]);
    }

    public function index()
    {
        $memberships = Membership::orderBy('is_active', 1)->get();
        return view('admin.memberships.show', compact('memberships'));
    }

    public function indexAssigns()
    {
        $memberships = null;
        if (Auth::user()->role == 'STUDENT_CARE') {
            $modelMemberships = Membership::whereHas('type', function ($q) {
                $q->free();
            })->active()->first();
            $memberships = $modelMemberships->instances;
        } else {
            $memberships = Membership_assign::get();
        }
        return view('admin.memberships.showAssigns', compact('memberships'));
    }

    public function assign()
    {
        $students = Student::get();
        if (Auth::user()->role == 'STUDENT_CARE') {
            $memberships = Membership::whereHas('type', function ($q) {
                $q->free();
            })->active()->get();
        } else {
            $memberships = Membership::active()->get();
        }

        return view('admin.memberships.assign', ['students' => $students, 'memberships' => $memberships]);
    }

    public function create()
    {

        $membershipTypes = Membership_type::get();
        return view('admin.memberships.create', compact('membershipTypes'));
    }

    public function createType()
    {
          $membershipTypes = Membership_type::get();
        return view('admin.memberships.createType', compact('membershipTypes'));
    }

    public function createTypeStore(Request $request)
    {

        $membershipType = new Membership_type();
        $membershipType->type = $request['type'];
        $membershipType->value = $request['value'];
        $status = $membershipType->save();
                        
        if(!$status){
            report("Σφάλμα κατα την εγγραφή.");
        }
        return Redirect::route('admin_memberships_show');
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
        $status = $membership->save();
                        
        if(!$status){
            report("Σφάλμα κατα την εγγραφή.");
        }
        return Redirect::route('admin_memberships_show');
    }

    public function assignStore(Request $request)
    {
        if (Auth::user()->role == 'STUDENT_CARE') {
            $membership = Membership::find($request["membership"]);
            if ($membership->type->type != 'FREE') {
                abort(403, 'canOnlyCreateFreeMemberships');
            }
        }
        $assignment = new Membership_assign();
        $assignment->student_id = $request["student"];
        $assignment->membership_id = $request["membership"];
        $assignment->created_by = Auth::user()->id;
        $status = $assignment->save();
                        
        if(!$status){
            report("Σφάλμα κατα την εγγραφή.");
        }
        return Redirect::route('admin_memberships_showAssign');
    }

    public function flipStatus($membershipId)
    {

        $membership = Membership::find($membershipId);
        if ($membership != null) {
            $membership->is_active = $membership->is_active == 1 ? 0 : 1;
            $status = $membership->save();
                        
            if(!$status){
                report("Σφάλμα κατα την εγγραφή.");
            }
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

    public function printAssign($assignId)
    {
        $snappy = new Pdf('./vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="print.pdf"');
        echo $snappy->getOutput(url("admin/memberships/assign/$assignId/view"));
    }

    public function viewAssignCard($assignId)
    {
        $assign = Membership_assign::find($assignId);

        if ($assign->membership->type->type != 'FREE' && Auth::user()->role == 'STUDENT_CARE') {
            abort(403, 'exceptionNoAccess');
        }
        if ($assign != null) {
            return view('admin.memberships.printAssign', ['assign' => $assign, 'id' => Crypt::encryptString($assignId)]);
        } else {
            return abort(404, 'printAssignMembershipNotFound');
        }

    }

    public function update(Request $request)
    {
        try{
            Membership::where('id', $request['id'])->update(['title' => $request['title'], 'breakfast' => $request['breakfast'],'lunch' => $request['lunch'],'dinner' => $request['dinner']]);
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        $Memberships = DB::table('memberships')->get();

        return Redirect::route('admin_memberships_show');
    }

    public function delete(Request $request)
    {

        try{
            Membership::where('id', $request['id'])->delete();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        $Memberships = DB::table('memberships')->get();

        return Redirect::route('admin_memberships_show');
    }

}
