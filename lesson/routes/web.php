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
    return view('welcome');
});

Route::get('/test', 'TestController@index');

Route::prefix('admin')->group(function (){
    Route::get('/', function (){
        return view('admin')->with('tasks', 'Test task');
    });
    Route::get('blog', function (){
        echo 'Main admin blog';
    });

    Route::get('tasks', 'TaskController@index');
    Route::get('task/create', 'TaskController@create');
    Route::post('task/store', 'TaskController@store');
    Route::get('task/api', 'TaskController@api');
    Route::get('task/{id}', 'TaskController@show');
    Route::get('task/{id}/edit', 'TaskController@edit');
    Route::post('task/{id}/update', 'TaskController@update');
    Route::post('task/{id}/destroy', 'TaskController@destroy');
});

/*
Route::prefix('api')->group(function (){
    Route::get('/', 'ApiController@index');
    Route::get('casino', 'CasinoController@index');
    Route::get('casino/{id}', 'CasinoController@show');
    Route::get('blog', 'BlogController@index');
    Route::get('blog/{id}', 'BlogController@show');
});
*/
Route::get('support', 'SupportController@index');
