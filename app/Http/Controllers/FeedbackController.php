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
       
        if ($user->isEmpty()){
            $id = 0;
            $scheduleid = 0;
        }else{
            $id = $user[0]->id;
        }
      
    

        $anon = $request->anon;
        $facilityonly = $request->facilityonly;
        if ($facilityonly =='True'){
          $scheduleid = NULL;
        }
        if ($anon == 'True'){
          $id=NULL;
        }

        $data = [];

        if($request->hasfile('filename'))
         {

            foreach($request->file('filename') as $image)
            {
                $this->validate($request, [
                    'filename' => 'required',
                    'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
                ]);

                $name = md5(microtime()).'_'.$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $hash = md5($name);
                array_push($data, $name);
            }
         }

         
        

        $comment = $request->comment;
        $stars = $request->stars;


         $newFeedback = new Rating();
         $newFeedback->comment = $comment;
         $newFeedback->student_id = $id;
         $newFeedback->schedule_id = $scheduleid;
         $newFeedback->rating = $stars;
         $newFeedback->filename = json_encode($data);
       
         
        try{
           $status = $newFeedback->save();
        } catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
        if(!$status){
            report("Σφάλμα κατα την εγγραφή.");
        }

      

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

        return redirect()->back()->with('success', 'Feedback sent!');;
    }


    public function index()
    {

        $ratings = Rating::get();
        $feeds = collect([]);
        $facilities= collect([]);
        foreach ($ratings as $rating) {
       
            if($rating->schedule_id==NULL){
                if (!is_int($rating->student_id) || $rating->student_id < 1 || $rating->student_id==NULL) {
                    $name = "Anonymous";
                } else {
                    try {
                        $name = $rating->student->firstname . " " . $rating->student->lastname;
                    }
                    catch (ErrorException $e) {
                        $name = "Anonymous";
                    }
                    
                   
                }
                $facility = collect(['id' => $rating->id, 'name' => $name, 'comment' => $rating->comment, 'created_at' => $rating->created_at, 'rating' => $rating->rating,'images' => $rating->filename]);
                $facilities->push($facility);
            }
            else{
                if ($rating->student_id == NULL) {
                    $name = "Anonymous";
                } else {
                    try {
                        $name = $rating->student->firstname . " " . $rating->student->lastname;
                    }
                    catch (ErrorException $e) {
                        $name = "Anonymous";
                    }
                }

                $feed = collect(['id' => $rating->id, 'name' => $name, 'comment' => $rating->comment, 'created_at' => $rating->created_at, 'rating' => $rating->rating, 'menu' => $rating->menu, 'images' => $rating->filename]);
                $feeds->push($feed);
            }

        }
        // dd($facilities);


        return view('admin.feedback', compact('feeds','facilities'));
    }
}
