<?php

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/chat', 'ChatController');
Route::get('/chat/{id}', 'ChatController@show');
Route::get('/chat/historic/{id}', 'ChatController@historic');
Route::post('/chat/{id}/send-message', 'ChatController@store');
