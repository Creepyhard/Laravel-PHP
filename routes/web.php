<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/{provider}', ['as' => 'authenticate', 'uses' => 'App\Http\Controllers\AuthController@postAuthenticate']);
