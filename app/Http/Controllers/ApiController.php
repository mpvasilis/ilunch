<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Announcement;
use App\Menu;

class ApiController extends Controller
{
    public function getMealCalendar()
    {
        //todo find whole callendar for next 2 weeks and create json for the front page
        return json_encode(array("test" => "true"));
    }

    public function getStudentMatches($searchString){
        $matches = Student::where('firstname', 'like', '%'.$searchString.'%')->orWhere('lastname', 'like', '%'.$searchString.'%')->orWhere('aem', 'like', '%'.$searchString.'%');

        $result = array();
        foreach ($matches as $item){
            array_push($result, [
               'aem' => $item->aem,
               'firstname' => $item->firstname,
               'lastname' => $item->lastname
            ]);
        }
        return response()->json($result);
    }
}
