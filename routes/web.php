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

Route::get('/sms/send', 'HomeController@sendSMS')->name('sms-send');

//Route::get('/inbox-messages/retrieve', 'HomeController@retrieveSMS')->name('inbox-retrieve');

Route::get('/incoming', 'HomeController@retrieveSMS')->name('incoming-retrieve');