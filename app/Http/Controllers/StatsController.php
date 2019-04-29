<?php

namespace App\Http\Controllers;

use App\Statistic;
use App\Student;
use App\Facillity;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Carbon\Carbon;

class StatsController extends Controller
{
    /**
     * StatsController constructor.
     */
    public function __construct()
    {
        $this->middleware('access_staff');
    }

    public function index(Request $request)
    {

      
        $facid = $request->input('id', '0');
        if ($facid == '0'){
            $statistics = Statistic::get();
        }else{
            $statistics = Statistic::where('facillity_id',$facid)->get();
        }

        $stats = collect([]);
        $types = collect([]);
        //  dd($statistics);
        foreach ($statistics as $statistic) {

            $name = $statistic->student->firstname . " " . $statistic->student->lastname;
        //   dd($statistic->schedule_item->schedule_item);
            $his = collect(['id' => $statistic->id, 'name' => $name, 'date' => $statistic->created_at, 'meal_type' => $statistic->type_id, 'facillity_id' => $statistic->facillity_id]);
            $stats->push($his);
        }
        // dd($stats->groupBy('facillity_id'));
        for ($i = 7; $i >= 0; $i--) {
            $breakfast = $lunch = $dinner = 0;
            $range[] = Carbon::now()->subDays($i)->format('d/m/Y D');
            $day = Statistic::whereDate('created_at', '=', Carbon::today()->subDays($i)->toDateString())->get();
            $PerDay[] = $day;
            $CountsPerDay[] = count($day);
            foreach ($day as $d) {

                switch ($d->type_id) {
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
        $facillities=[];
        $title = "Τελευταία Εβδομάδα - Συνολικά Στατιστικά Πανεπιστημίου";
        $facillit= Facillity::all();
        $facillities[0] = 'Συνολικά Στατιστικά Πανεπιστημίου';
        foreach($facillit as $fac) {
            $facillities[$fac->id] = $fac->title;
        }
        return view('admin.statistics', compact('stats', 'range', 'CountsPerDay', 'Type', 'title','facillities'));
    }

    public function search(Request $request)
    {

        $facillities=[];
        $facid = $request->input('facillities', '0');

        $start = Carbon::parse($request['start']);

        $stop = Carbon::parse($request['stop']);
        $facillit= Facillity::all();
        $title = $start->format('d/m/Y D') . " - " . $stop->format('d/m/Y D') ." - ". $facillit[$facid-1]->title;
        $length = $stop->diffInDays($start);

        if ($facid == '0'){
            $statistics = Statistic::whereBetween('created_at', [$start, $stop])->get();
        }else{
            $statistics = Statistic::where('facillity_id',$facid)->whereBetween('created_at', [$start, $stop])->get();
        }
        // dd($statistics);

        $stats = collect([]);
        $types = collect([]);
        foreach ($statistics as $statistic) {

            $name = $statistic->student->firstname . " " . $statistic->student->lastname;
            $his = collect(['id' => $statistic->id, 'name' => $name, 'date' => $statistic->created_at, 'meal_type' => $statistic->type_id]);
            $stats->push($his);
        }

        for ($i = 0; $i <= $length; $i++) {
            $breakfast = $lunch = $dinner = 0;
            $range[] = Carbon::parse($request['start'])->addDay($i)->format('d/m/Y D');

            $day = Statistic::whereDate('created_at', '=', Carbon::parse($request['start'])->addDays($i)->toDateString())->get();
            $PerDay[] = $day;
            $CountsPerDay[] = count($day);
            foreach ($day as $d) {

                switch ($d->type_id) {
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

        $facillities[0] = 'Συνολικά Στατιστικά Πανεπιστημίου';
        foreach($facillit as $fac) {
            $facillities[$fac->id] = $fac->title;
        }

        return view('admin.statistics', compact('stats', 'range', 'CountsPerDay', 'Type', 'title','facillities'));
    }
}
