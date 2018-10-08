<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class FeedbackController extends Controller
{
    //todo testing
    /**
     * FeedbackController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff', ['only' => ['index']]);
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(\App\Forms\feedback_guest_form::class, [
            'method' => 'POST',
            'url' => route('feedback')
        ]);

        return view('feedback', compact('form'));
    }

    public function store(Request $request, FormBuilder $formBuilder, feedback $feedback)
    {
        $name = $request->get('name');
        $comment = $request->get('comment');
        $form = $formBuilder->create(\App\Forms\feedback_guest_form::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $newFeedback = new Rating();
        $newFeedback->comment = $comment;
        $newFeedback->student_id = $name;
        $newFeedback->save();

        return view('front.index')->with('feedbackStatus', 'Success!');
    }

    public function index()
    {

        $ratings = Rating::get();
        $feeds = collect([]);
        foreach ($ratings as $rating) {
            if ($rating->student() == NULL) {
                $name = "Anonymous";
            } else {
                $name = $rating->student->firstname . " " . $rating->student->lastname;
            }
            $feed = collect(['id' => $rating->id, 'name' => $name, 'comment' => $rating->comment, 'created_at' => $rating->created_at, 'rating' => $rating->rating]);
            $feeds->push($feed);
        }


        return view('admin.feedback', compact('feeds'));
    }
}
