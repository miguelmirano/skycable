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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin_profile', 'ProfileController@admin_profile')->name('admin_profile');
Route::get('/user_profile', 'ProfileController@user_profile')->name('user_profile');

Route::get('/my_calendar', 'CalendarController@my_calendar')->name('my_calendar');
Route::get('/team_calendar', 'CalendarController@team_calendar')->name('team_calendar');
Route::get('/company_calendar', 'CalendarController@company_calendar')->name('company_calendar');

Route::post('/notice', 'NoticeController@notice')->name('notice');
Route::post('/company_notice', 'NoticeController@company_notice')->name('company_notice');

Route::post('/leave', 'ApplyController@leave')->name('leave');
Route::post('/overtime', 'ApplyController@overtime')->name('overtime');
Route::post('/scheduleadjustment', 'ApplyController@scheduleadjustment')->name('scheduleadjustment');
Route::post('/officialbusiness', 'ApplyController@officialbusiness')->name('officialbusiness');
