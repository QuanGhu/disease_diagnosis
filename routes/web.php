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
            Route::post('/list','DiseaseController@list')->name('list');
            Route::post('/save','DiseaseController@save')->name('save');
            Route::put('/update','DiseaseController@update')->name('update');
            Route::delete('/delete','DiseaseController@delete')->name('delete');
        });
    });

    Route::name('cause.')->group( function() {
        Route::group(['namespace' => 'Cause','prefix' => 'gejala'], function () {
            Route::get('/','CauseController@index')->name('index');
            Route::post('/list','CauseController@list')->name('list');
            Route::post('/save','CauseController@save')->name('save');
            Route::put('/update','CauseController@update')->name('update');
            Route::delete('/delete','CauseController@delete')->name('delete');

        });
    });

    Route::name('rule.')->group( function() {
        Route::group(['namespace' => 'Rule','prefix' => 'ketentuan'], function () {
            Route::get('/','RuleController@index')->name('index');
            Route::get('/new','RuleController@new')->name('new');
            Route::get('/edit/{id}','RuleController@edit')->name('edit');
            Route::get('/view/{id}','RuleController@view')->name('view');
            Route::post('/list','RuleController@list')->name('list');
            Route::post('/save','RuleController@save')->name('save');
            Route::put('/update','RuleController@update')->name('update');
            Route::delete('/delete','RuleController@delete')->name('delete');

        });
    });

    Route::name('solution.')->group( function() {
        Route::group(['namespace' => 'Solution','prefix' => 'solusi'], function () {
            Route::get('/','SolutionController@index')->name('index');
            Route::post('/list','SolutionController@list')->name('list');
            Route::post('/save','SolutionController@save')->name('save');
            Route::put('/update','SolutionController@update')->name('update');
            Route::delete('/delete','SolutionController@delete')->name('delete');

        });
    });

    Route::name('diagnose.')->group( function() {
        Route::group(['namespace' => 'Diagnose','prefix' => 'diagnosa'], function () {
            Route::get('/','DiagnoseController@index')->name('index');

        });
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
