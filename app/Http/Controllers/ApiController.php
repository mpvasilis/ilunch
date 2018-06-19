<?php

namespace App\Http\Controllers;

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

}
