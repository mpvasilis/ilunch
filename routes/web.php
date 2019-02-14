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

Route::get('/login/cas', 'CasAuthController@login')->name('cas_login');
Route::get('/logout/cas', 'CasAuthController@logout');
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
Route::group(['prefix' => 'student', 'middleware' => 'can_view_student'], function () {
    Route::get('{studentId}/profile', 'StudentController@profile')->name('profile');
    Route::post('{studentId}/profile', 'StudentController@profileUpdate')->name('profile');
    Route::get('{studentId}/profile/edit', 'StudentController@profileEdit')->name('edit_profile');
});

//dashboard
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('about', 'DashboardController@about')->name('about');
    Route::get('calendar', 'DashboardController@calendar')->name('calendar');
});

//admin
Route::get('admin', 'DashboardController@admin')->name('admin')->middleware('admin_panel');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('schedule', 'ScheduleController@index')->name('admin_schedule');
    Route::post('schedule', 'ScheduleController@store')->name('admin_schedule_store');
    Route::get('meals', 'MealsController@index')->name('admin_meals');
    Route::post('meals', 'MealsController@post')->name('admin_meals');
    Route::post('meals/update', 'MealsController@update')->name('admin_meals_update');
    Route::post('meals/delete', 'MealsController@delete')->name('admin_meals_delete');

    Route::group(['prefix' => 'memberships', 'middleware' => 'auth'], function () {
        Route::get('show', 'MembershipsController@index')->name('admin_memberships_show');
        Route::get('create', 'MembershipsController@create')->name('admin_memberships_create');
        Route::post('create', 'MembershipsController@createStore')->name('admin_memberships_create');
        Route::get('{membershipId}/flipStatus', 'MembershipsController@flipStatus')->name('admin_membership_flipStatus');

        Route::get('assign/show', 'MembershipsController@indexAssigns')->name('admin_memberships_showAssign');
        Route::get('assign', 'MembershipsController@assign')->name('admin_memberships_assign');
        Route::post('assign', 'MembershipsController@assignStore')->name('admin_memberships_assign');
        Route::get('assign/{assignId}/delete', 'MembershipsController@deleteAssign')->name('admin_membership_assign_delete');
        Route::get('assign/{assignId}/view', 'MembershipsController@viewAssignCard')->name('admin_membership_assign_view');
        Route::get('assign/{assignId}/print', 'MembershipsController@printAssign')->name('admin_membership_assign_print');

        Route::get('type/create', 'MembershipsController@createType')->name('admin_memberships_createType');
        Route::post('type/create', 'MembershipsController@createTypeStore')->name('admin_memberships_createType');
        Route::get('settings', 'SettingsController@index')->name('admin_settings');
        Route::post('settings', 'SettingsController@edit')->name('admin_settings_edit');


    });

    Route::group(['prefix' => 'users', 'middleware' => ['auth', 'access_administrator']], function () {
        Route::get('show', 'UserController@show')->name('admin_users_show');
        Route::get('{userId}/edit', 'UserController@showEdit')->name('admin_user_edit');
        Route::post('{userId}/edit', 'UserController@edit')->name('admin_user_edit_store');

    });

    Route::get('announcements', 'AnnouncementsController@index')->name('admin_announcements');
    Route::post('announcements', 'AnnouncementsController@post')->name('admin_announcements');
    Route::post('announcements/update', 'AnnouncementsController@update')->name('admin_announcements_update');
    Route::post('announcements/delete', 'AnnouncementsController@delete')->name('admin_announcements_delete');

    Route::get('statistics', 'StatsController@index')->name('admin_statistics');
    Route::post('statistics', 'StatsController@search')->name('admin_statistics');
    Route::get('feedback', 'feedbackController@index')->name('admin_feedback');

    Route::get('students/show', 'StudentController@adminIndex')->name('admin_students');
    Route::get('students/create', 'StudentController@create')->name('admin_students_create');
    Route::post('students/create', 'StudentController@createStore')->name('admin_students_create');

});

//securedApi
Route::get('secured/getStudentMatches/{searchString}', 'ApiController@getStudentMatches')->middleware('admin_panel');
