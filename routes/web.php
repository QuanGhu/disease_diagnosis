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


Route::get('/','Web\Dashboard\DashboardController@index')->name('home');

Route::group(['namespace' => 'Web'], function () {

    Route::name('disease.')->group( function () {
        Route::group(['namespace' => 'Disease','prefix' => 'penyakit'], function () {
            Route::get('/','DiseaseController@index')->name('index');

        });
    });

    Route::name('cause.')->group( function() {
        Route::group(['namespace' => 'Cause','prefix' => 'gejala'], function () {
            Route::get('/','CauseController@index')->name('index');

        });
    });
});
