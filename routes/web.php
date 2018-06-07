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

    return view('Home');
});

Route::post('sent', 'HomeController@SentData'); 
<<<<<<< HEAD
Route::get('sent', 'HomeController@create');

=======
>>>>>>> e189f6d54a359b851982b27e3e96a1f22b3d42fd

