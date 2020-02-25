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
    if (auth()->user()) {
        return view('/home');
    }

    return view('/auth/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/assets', 'AssetController@index');
    Route::get('/assets/create', 'AssetController@create');
    Route::post('/assets/store', 'AssetController@store');
    Route::post('/assets/upload', 'AssetController@upload');
    Route::get('/assets/show/{asset}', 'AssetController@show');
    Route::get('/assets/edit/{asset}', 'AssetController@edit');
    Route::put('/assets/update/{asset}', 'AssetController@update');

    Route::get('/jobs', 'JobController@index');
    Route::get('/jobs/create', 'JobController@create');
    Route::get('/jobs/create/{asset}', 'JobController@create');
    Route::post('/jobs/store', 'JobController@store');
    Route::get('/jobs/show/{job}', 'JobController@show');
    Route::get('/jobs/edit/{job}', 'JobController@edit');
    Route::put('/jobs/update/{job}', 'JobController@update');

    Route::get('/movements', 'MovementController@index');
    Route::get('/movements/create/{type}/{asset}', 'MovementController@create');
    Route::post('/movements/store', 'MovementController@store');

    Route::get('/reports/{type}', 'ReportController@index');
    Route::post('/reports/store', 'ReportController@store');
    Route::get('/reports/show/{report}', 'ReportController@show');
});
