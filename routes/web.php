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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/schedule', function () {
    return view('calendar');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/home', 'HomeController@index');

//students profile
Route::group(['prefix' => 'student','middleware' => 'can_view_student'], function () {
    Route::get('{studentId}/profile', 'StudentsController@profile')->name('profile')->middleware('student_exists');
    Route::get('{studentId}/statistics', 'StudentsController@stats')->name('stats')->middleware('student_exists');
    Route::get('{studentId}/reviews', 'StudentsController@reviews')->name('reviews')->middleware('student_exists');
});

//admin
//Route::get('/admin', 'DashboardController@index')->name('admin');//->middleware('is_admin')
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');
Route::get('/admin/meals', function () {
    return view('admin.meals');
})->name('admin_meals');
