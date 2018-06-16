<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\feedback;
use App\Student;
use DB;

class FeedbackController extends Controller
{
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\feedback_guest_form::class, [
            'method' => 'POST',
            'url' => route('feedback')
        ]);

        return view('feedback', compact('form'));
    }

    public function store(Request $request,FormBuilder $formBuilder,feedback $feedback)
    {
        $name = $request->get('name');
        $comment = $request->get('comment');
        $form = $formBuilder->create(\App\Forms\feedback_guest_form::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $newFeedback= new feedback;
        $newFeedback->comment=$comment;
        $newFeedback->student_id=$name;
        $newFeedback->save();

        return view('feedback',compact('form'));
    }
    public function index(){
        $feedbacks = DB::table('feedbacks')->get();
        $feeds= collect([]);
        foreach($feedbacks as $feedback){
            
            $user = DB::table('students')->where('id',$feedback->student_id)->first();
            if ($user == NULL){
                $name = "Anonymous";
            }else{
                $name = $user->fistname . " " . $user->lastname;
            }
            $feed = collect(['id' => $feedback->id, 'name' => $name, 'comment'=> $feedback->comment, 'created_at'=> $feedback->created_at]);
            $feeds -> push($feed);
        }
        

        
        return view('admin.feedback',compact('feeds'));
    }
}
