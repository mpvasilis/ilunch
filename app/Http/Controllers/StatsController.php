<?php

namespace App\Http\Controllers;

use App\Statistic;
use App\Student;
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

    public function index()
    {
        $statistics = Statistic::get();
        $stats = collect([]);
        $types = collect([]);
        foreach ($statistics as $statistic) {

            $name = $statistic->student->firstname . " " . $statistic->student->lastname;
            $his = collect(['id' => $statistic->id, 'name' => $name, 'date' => $statistic->created_at, 'meal_type' => $statistic->menu->type->title]);
            $stats->push($his);
        }
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
        $title = "Τελευταία Εβδομάδα";


        return view('admin.statistics', compact('stats', 'range', 'CountsPerDay', 'Type', 'title'));
    }

    public function search(Request $request)
    {
        $start = Carbon::parse($request['start']);
        $stop = Carbon::parse($request['stop']);
        $title = $start->format('d/m/Y D') . " - " . $stop->format('d/m/Y D');
        $length = $stop->diffInDays($start);

        $statistics = Statistic::whereBetween('created_at', [$start, $stop])->get();
        $stats = collect([]);
        $types = collect([]);
        foreach ($statistics as $statistic) {

            $name = $statistic->student->firstname . " " . $statistic->student->lastname;
            $his = collect(['id' => $statistic->id, 'name' => $name, 'date' => $statistic->created_at, 'meal_type' => $statistic->menu->type->title]);
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

        return view('admin.statistics', compact('stats', 'range', 'CountsPerDay', 'Type', 'title'));
    }
}
    
