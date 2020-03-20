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

Route::get('/form', 'SettingController@create')->name('setting.form');
Route::post('/store', 'SettingController@store')->name('setting.store');
Route::post('setting/setwebhook', 'SettingController@setWebhook')->name('setting.setwebhook');
Route::post('setting/getwebhookinfo', 'SettingController@getWebhook')->name('setting.getwebhook');
