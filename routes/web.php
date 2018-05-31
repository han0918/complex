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

Route::post('/uploadpic','UploadController@uploadpic');

Route::group(['middleware' => ['auth:admin'],'prefix' => 'admin','namespace' => 'admin'],function(){
    Route::resource('article','ArticleController',['except'=>['show']]);
    Route::resource('categroy','CategroyController',['except'=>['show']]);
});

Route::delete('admin/logout','Auth\LoginController@destroy')->middleware('auth:admin')->name('admin.logout');

Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){

    Route::group(['middleware'=>['guest:admin']],function(){
        Route::get('login','LoginController@create')->name('admin.login');
        Route::post('login','LoginController@store');
    });


});





