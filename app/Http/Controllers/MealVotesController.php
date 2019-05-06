<?php

namespace App\Http\Controllers;

use App\Meal_vote;
use App\Menu_meal;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;

class MealVotesController extends Controller
{
    /**
     * StatsController constructor.
     */
    // public function __construct()
    // {
    //     $this->middleware('access_staff');
    // }
    public function indexfront()
    {

      $meals = Menu_meal::get();
      $now = Carbon::now();
      $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
      $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');


      $votes = Meal_vote::whereBetween('created_at', [$weekStartDate,$weekEndDate])->get();
      $votes_bymeal = $votes->groupby('meal_id');

      foreach ($votes_bymeal as $key=>$votes){
        $points=0;

        foreach ($votes as $vote) {
          $points += $vote->stars;
          $meal_id = $vote->meal_id;
        }
        $mo[] = [$points / count($votes),$meal_id,$vote->meal->title];
      }
      $mo=collect($mo)->sort()->reverse();
      $mo = $mo->slice(0,10);
      $best_foods = $mo->slice(0, 3);
      $best_foods = $best_foods->values()->all();;
      $rest_foods = $mo->slice(3);
      $rest_foods = $rest_foods->values()->all();
      return view('front.mealsvote',compact('meals','best_foods','rest_foods'));

    }

    public function index()
    {

      $meals = Menu_meal::get();
      $now = Carbon::now();
      $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
      $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');


      $votes = Meal_vote::whereBetween('created_at', [$weekStartDate,$weekEndDate])->get();
      $votes_bymeal = $votes->groupby('meal_id');
      foreach ($votes_bymeal as $key=>$votes){
        $points=0;

        foreach ($votes as $vote) {
          $points += $vote->stars;
          $meal_id = $vote->meal_id;
        }
        $mo[] = [$points / count($votes),$meal_id,$vote->meal->title];
      }
      $meal_votes=collect($mo)->sort()->reverse();
      return view('admin.meal_votes',compact('meal_votes'));

    }

    public function storevote(Request $request)
    {

$now = Carbon::now();
      $mealid = $request->schedule;
      $stars = $request->stars;


      $newFeedback = new Meal_vote();
      $newFeedback->meal_id = $mealid;
      $newFeedback->stars = $stars;
      $newFeedback->date = $now ;
      $newFeedback->save();

      $meals = Menu_meal::get();

      $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
      $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');


      $votes = Meal_vote::whereBetween('created_at', [$weekStartDate,$weekEndDate])->get();
      $votes_bymeal = $votes->groupby('meal_id');
      foreach ($votes_bymeal as $key=>$votes){
        $points=0;

        foreach ($votes as $vote) {
          $points += $vote->stars;
          $meal_id = $vote->meal_id;
        }
        $mo[] = [$points / count($votes),$meal_id,$vote->meal->title];
      }
      $mo=collect($mo)->sort()->reverse();
      $mo = $mo->slice(0,10);
      $best_foods = $mo->slice(0, 3);
      $best_foods = $best_foods->values()->all();;
      $rest_foods = $mo->slice(3);
      $rest_foods = $rest_foods->values()->all();

      return view('front.mealsvote',compact('meals','best_foods','rest_foods'));
    }

}
