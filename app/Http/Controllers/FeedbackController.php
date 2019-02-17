<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Auth;
use App\Statistic;
use App\User;
class FeedbackController extends Controller
{
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

    public function store(Request $request )
    {

        $scheduleid = $request->schedule;
        if ($scheduleid=='0'){
            $scheduleid = NULL;
        }
        $id = $request->userid;
        $user = User::where('id',$id)->get();

        $id = $user[0]->student->id;
      
        $anon = $request->anon;
        $facilityonly = $request->facilityonly;
        if ($facilityonly =='True'){
          $scheduleid = NULL;
        }
        if ($anon == 'True'){
          $id=NULL;
        }


        $comment = $request->comment;
        $stars = $request->stars;


         $newFeedback = new Rating();
         $newFeedback->comment = $comment;
         $newFeedback->student_id = $id;
         $newFeedback->schedule_id = $scheduleid;
         $newFeedback->rating = $stars;
         $newFeedback->save();

         $stats = collect([]);
         $user = Auth::user();
         // dd($user->student->aem);
         if (Auth::user() && $user->role == 'STUDENT'){
             $statistics = Statistic::where('student_id',$user->student->id)->get();
             foreach ($statistics as $stat){
                 $stat->schedule_item;
                 $stats[$stat->schedule_item->id] =[ 'date' => $stat->schedule_item->date, 'meal_id' => $stat->type_id];
             }
         }

        return redirect()->back();
    }

    public function index()
    {

        $ratings = Rating::get();
        $feeds = collect([]);
        $facilities= collect([]);
        foreach ($ratings as $rating) {

            if($rating->schedule_id==NULL){
                if ($rating->student_id == NULL) {
                    $name = "Anonymous";
                } else {
                    $name = $rating->student->firstname . " " . $rating->student->lastname;
                    // $name ="alex";
                }
                $facility = collect(['id' => $rating->id, 'name' => $name, 'comment' => $rating->comment, 'created_at' => $rating->created_at, 'rating' => $rating->rating]);
                $facilities->push($facility);
            }
            else{
                if ($rating->student_id == NULL) {
                    $name = "Anonymous";
                } else {
                    $name = $rating->student->firstname . " " . $rating->student->lastname;
                    // $name ="alex";
                }
                $feed = collect(['id' => $rating->id, 'name' => $name, 'comment' => $rating->comment, 'created_at' => $rating->created_at, 'rating' => $rating->rating, 'menu' => $rating->menu]);
                $feeds->push($feed);
            }

        }
        // dd($feeds);


        return view('admin.feedback', compact('feeds','facilities'));
    }
}
