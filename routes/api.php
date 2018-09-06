<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function () {
    return json_encode(['status' => 'online', 'error' => 'null']);
});
Route::get('getMealCalendar', 'ApiController@getMealCalendar')->name('menuApi');//todo response with json array for meals.
Route::get('getMealsByDate/{date}', 'ApiController@getMealsByDate');//todo response with json array for meals. (available ->'today')
Route::get('validateCustomer/{id}', 'ApiController@validateCustomer'); //todo response with current subscription data
Route::get('validateAnonymousCustomer', 'ApiController@validateAnonymousCustomer');//todo response with status code
Route::get('getLatestAnnouncement', 'ApiController@getLatestAnnouncement');//todo response with lastAnnounce
Route::post('submitFeedback', 'ApiController@submitFeedback');//todo response status code can get array as input ( mass input)
Route::get('getMealStatistics', 'ApiController@getMealStatistics');//todo find all endpoints for statistic creation (group + middleware)
Route::get('secured/getStudentMatches', 'ApiController@getStudentMatches')->middlware('admin_panel');
