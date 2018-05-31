<?php

	require_once(app_path() . '\Statistics\getStatistics.php');

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

Route::get('/statistics', function () {
	$statistics = new GetStatistics();
	$statistics->PrintTime();
});
Route::post('sent', 'HomeController@SentData2'); 
