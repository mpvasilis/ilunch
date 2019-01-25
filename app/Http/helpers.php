<?php
function humanTiming($datetime, $full = false)
{
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function getDays($time)
{
    $time = strtotime($time);
    $time = time() - $time; // to get the time since that moment
    $time = ($time < 1) ? 1 : $time;
    return floor($time / 86400);
}

function printMealsFromMenuAssigns($assigns)
{
    $meals = array();
    foreach ($assigns as $assign) {
        array_push($meals, $assign->meal->title);
    }
    return implode(',', $meals);
}

function addOrdinalNumberSuffix($num)
{
    if (!in_array(($num % 100), array(11, 12, 13))) {
        switch ($num % 10) {
            // Handle 1st, 2nd, 3rd etc
            case 1:
                return $num . 'st';
            case 2:
                return $num . 'nd';
            case 3:
                return $num . 'rd';
        }
    }
    return $num . 'th';
}

function printMeals($breakfast, $lunch, $dinner)
{
    $result = array();
    if ($breakfast == 1)
        array_push($result, 'Πρωινό');
    if ($lunch == 1)
        array_push($result, 'Μεσημεριανό');
    if ($dinner == 1)
        array_push($result, 'Βραδινό');
    return implode(',', $result);
}

function getIntBoolString($int)
{
    if ($int == 1) {
        return 'Yes';
    }
    return 'No';
}

function getTimestampPart($timestamp, $part)
{
    $sub = explode(' ', $timestamp);
    return $sub[$part];
}

function transformUserRole($role)
{
    switch ($role) {
        case 'ADMINISTRATOR':
            {
                return 'Διαχειριστής Συστήματος';
            }
        case 'STUDENT':
            {
                return 'Φοιτητής';
            }
        case 'STUDENT_CARE':
            {
                return 'Φοιτητική Μέριμνα';
            }
        case 'STAFF':
            {
                return 'Προσωπικό Λέσχης';
            }
        default:
            {
                return 'Unknown Role';
            }
    }
}

function hasStaffRole($user){
    if ($user != null && in_array($user->role, ["ADMINISTRATOR", "STAFF"])) {
        return true;
    }
    return false;
}
function isStudent($user){
    if ($user != null && in_array($user->role, ["STUDENT"])) {
        return true;
    }
    return false;
}

function hasAdminRole($user){
    if ($user != null && in_array($user->role, ["ADMINISTRATOR"])) {
        return true;
    }
    return false;
}
