<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\Menu;

class ApiController extends Controller
{
    public function getMealCalendar()
    {
        return json_encode(array("test" => "true"));
    }
}
