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
    return view('auth.login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function(){

    Route::get('/chat', function(){
        return view('chat');
    });

    Route::post('generate-channel', 'MessageChannelController@generateChannel');

    Route::post('/sendmessage', 'MessageController@send');
    Route::get('/getchannelmessages/{id}', 'MessageChannelController@getChannelMessages');

});



