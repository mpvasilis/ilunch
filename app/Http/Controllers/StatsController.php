<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use DB;
use Carbon\Carbon;

class StatsController extends Controller
{

//todo refactor to get info from statistics table.
    /**
     * StatsController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff');
    }

    public function index()
    {
        $history = DB::table('history')->get();
        $historys = collect([]);
        $types = collect([]);
        foreach ($history as $h) {

            $user = DB::table('students')->where('id', $h->student_id)->first();
            $name = $user->firstname . " " . $user->lastname;
            if ($h->type == 1) {
                $meal_type = "Πρωινό";
            } elseif ($h->type == 1) {
                $meal_type = "Μεσημεριανό";
            } else {
                $meal_type = "Βραδυνό";
            }


            $his = collect(['id' => $h->id, 'name' => $name, 'date' => $h->date, 'meal_type' => $meal_type]);
            $historys->push($his);
        }
        for ($i = 7; $i >= 0; $i--) {
            $breakfast = $lunch = $dinner = 0;
            $range[] = Carbon::now()->subDays($i)->format('d/m/Y D');
            $day = DB::table('history')->whereDate('date', '=', Carbon::today()->subDays($i)->toDateString())->get();
            $PerDay[] = $day;
            $CountsPerDay[] = count($day);
            foreach ($day as $d) {

                switch ($d->type) {
                    case 1:
                        $breakfast++;
                        break;
                    case 2:
                        $lunch++;
                        break;
                    case 3:
                        $dinner++;
                        break;
                }
            }
            $Type[] = collect(['breakfast' => $breakfast, 'lunch' => $lunch, 'dinner' => $dinner]);

        }
        $title = "Τελευταία Εβδομάδα";


        return view('admin.statistics', compact('historys', 'range', 'CountsPerDay', 'Type', 'title'));
    }

    public function search(Request $request)
    {
        $start = Carbon::parse($request['start']);
        $stop = Carbon::parse($request['stop']);
        $title = $start->format('d/m/Y D') . " - " . $stop->format('d/m/Y D');
        $length = $stop->diffInDays($start);

        $history = DB::table('history')->whereBetween('date', [$start, $stop])->get();
        $historys = collect([]);
        $types = collect([]);
        foreach ($history as $h) {
            $user = DB::table('students')->where('id', $h->student_id)->first();
            $name = $user->firstname . " " . $user->lastname;
            if ($h->type == 1) {
                $meal_type = "Πρωινό";
            } elseif ($h->type == 1) {
                $meal_type = "Μεσημεριανό";
            } else {
                $meal_type = "Βραδυνό";
            }


            $his = collect(['id' => $h->id, 'name' => $name, 'date' => $h->date, 'meal_type' => $meal_type]);
            $historys->push($his);
        }
        for ($i = 0; $i <= $length; $i++) {

            $breakfast = $lunch = $dinner = 0;
            $range[] = Carbon::parse($request['start'])->addDay($i)->format('d/m/Y D');

            $day = DB::table('history')->whereDate('date', '=', Carbon::parse($request['start'])->addDays($i)->toDateString())->get();
            $PerDay[] = $day;
            $CountsPerDay[] = count($day);
            foreach ($day as $d) {

                switch ($d->type) {
                    case 1:
                        $breakfast++;
                        break;
                    case 2:
                        $lunch++;
                        break;
                    case 3:
                        $dinner++;
                        break;
                }
            }
            $Type[] = collect(['breakfast' => $breakfast, 'lunch' => $lunch, 'dinner' => $dinner]);

        }


        return view('admin.statistics', compact('historys', 'range', 'CountsPerDay', 'Type', 'title'));
    }
}
    
