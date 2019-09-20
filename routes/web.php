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

Route::get('/','CommunitylinksController@index');

// Route::get('community','CommunitylinksController@index');
Route::post('community','CommunitylinksController@store');
Route::get('/channel/{channel}','CommunitylinksController@get_channel_related_links')->name('get_channel_related_links');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
