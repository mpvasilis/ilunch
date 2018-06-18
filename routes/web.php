<?php
//todo middlewares for logged in users
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
//auth
Auth::routes();
//index
Route::get('language/{lang}', 'HomeController@language')->where('lang', '[A-Za-z_-]+');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/contact', 'ContactController@create')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact_store');
Route::get('/menu', 'HomeController@menu')->name('menu');
Route::get('/news', 'HomeController@news')->name('news');
Route::post('/feedback', 'FeedbackController@store')->name('feedback_store');


//students profile
//todo create controller and view index
Route::group(['prefix' => 'student', 'middleware' => 'can_view_student'], function () {
    Route::get('{studentId}/profile', 'StudentsController@profile')->name('profile')->middleware('student_exists');
//    Route::get('{studentId}/reviews', 'StudentsController@reviews')->name('reviews')->middleware('student_exists');
});

//dashboard
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('about', 'DashboardController@about')->name('about');
    Route::get('calendar', 'DashboardController@calendar')->name('calendar');
});

//admin

Route::get('admin', 'DashboardController@admin')->name('admin');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('meals', 'MealsController@index')->name('admin_meals');
    Route::post('meals', 'MealsController@post')->name('admin_meals');
    Route::post('meals/update', 'MealsController@update')->name('admin_meals_update');
    Route::post('meals/delete', 'MealsController@delete')->name('admin_meals_delete');


    Route::get('memberships/show', 'MembershipsController@index')->name('admin_memberships_show');
    Route::get('memberships/create', 'MembershipsController@create')->name('admin_memberships_create');

    Route::get('announcements', 'AnnouncementsController@index')->name('admin_announcements');
    Route::post('announcements', 'AnnouncementsController@post')->name('admin_announcements');
    Route::post('announcements/update', 'AnnouncementsController@update')->name('admin_announcements_update');
    Route::post('announcements/delete', 'AnnouncementsController@delete')->name('admin_announcements_delete');

    Route::get('statistics', 'StatsController@index')->name('admin_statistics');
    Route::post('statistics', 'StatsController@search')->name('admin_statistics');
    Route::get('feedback', 'feedbackController@index')->name('admin_feedback');

    Route::get('students', 'StudentsController@index')->name('admin_students');
});