<?php
function humanTiming($time)
{
    $time = strtotime($time);
    $time = time() - $time; // to get the time since that moment
    $time = ($time < 1) ? 1 : $time;
    $tokens = array(
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );
    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
    }
    return 'unknown';
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