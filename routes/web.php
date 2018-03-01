<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//home
//Route::get('/', 'WelcomeController@index')->name('home');
Route::get('/about', function () {
    return view('about');
});

Route::get('/', function () {
    return view('front.index');
});

Route::get('/schedule', function () {
    return view('calendar');
});
Route::get('/contact', 'ContactController@create')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact_store');
Route::get('/news', function () {
    return view('news');
});
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/feedback', 'feedbackController@create')->name('feedback');
Route::post('/feedback', 'feedbackController@store')->name('feedback_store ');
Route::get('/home', 'HomeController@index');

//students profile
Route::group(['prefix' => 'student','middleware' => 'can_view_student'], function () {
    Route::get('{studentId}/profile', 'StudentsController@profile')->name('profile')->middleware('student_exists');
    Route::get('{studentId}/statistics', 'StudentsController@stats')->name('stats')->middleware('student_exists');
    Route::get('{studentId}/reviews', 'StudentsController@reviews')->name('reviews')->middleware('student_exists');
});

//admin
Route::get('/admin', 'DashboardController@home')->name('admin');
Route::get('/admin/meals', 'DashboardController@meals')->name('admin_meals');
Route::get('/admin/announcments', 'DashboardController@announcments')->name('admin_announcments');
Route::get('/admin/statistics', 'StatsController@statistics')->name('admin_statistics');
Route::get('/admin/feedback', 'DashboardController@feedback')->name('admin_feedback');
//Route::get('/admin', 'DashboardController@index')->name('admin');//->middleware('is_admin')
