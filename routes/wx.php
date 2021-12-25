<?php


use Illuminate\Support\Facades\Route;

Route::post('auth/login','AuthController@login');


Route::middleware('auth:api')
    ->group(function () {
//        Route::get('redis','AuthController@testRedis');
//        Route::get('mysql','AuthController@testMysql');
    });
