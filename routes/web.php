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
    return view('/home');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
});

Route::get('/assets', 'AssetController@index');
Route::get('/assets/create', 'AssetController@create');
Route::post('/assets/store', 'AssetController@store');
Route::get('/assets/show/{asset}', 'AssetController@show');

Route::get('/jobs', 'JobController@index');
Route::get('/jobs/create/{asset}', 'JobController@create');
Route::post('/jobs/store', 'JobController@store');
Route::get('/jobs/show/{job}', 'JobController@show');
Route::get('/jobs/edit/{job}', 'JobController@edit');
Route::put('/jobs/update/{job}', 'JobController@update');

Route::get('/reports', 'ReportController@index');
Route::post('/reports/store', 'ReportController@store');
Route::get('/reports/show/{report}', 'ReportController@show');
