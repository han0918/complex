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
Route::group(['namespace' => 'home'],function() {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('categroy/{categroy}', 'HomeController@categroy')->name('categroy.home');
    Route::get('subclass/{categroy}', 'HomeController@subclass')->name('subclass.home');
    Route::get('article/{article}', 'HomeController@article')->name('article.home');
});

Route::post('/uploadpic','UploadController@uploadpic');

Route::group(['middleware' => ['auth:admin'],'prefix' => 'admin','namespace' => 'admin'],function(){

    //管理员--管理员--管理员
    Route::post('/put/{admin?}','AdminController@put')->name('admin.put');
    Route::post('/del','AdminController@del')->name('admin.del');
    Route::get('/cat/{admin?}','AdminController@create')->name('admin.create');
    Route::get('/list','AdminController@index')->name('admin.index');

    //文章----文章----文章
    Route::post('article/setstate','ArticleController@setstate')->name('article.setstate');
    Route::post('article/settype','ArticleController@settype')->name('article.settype');
    Route::post('article/del','ArticleController@del')->name('article.del');
    Route::post('article/subclass','ArticleController@subclass')->name('article.subclass');
    Route::post('article/put/{article?}','ArticleController@put')->name('article.put');
    Route::resource('article','ArticleController',['except'=>['show']]);

    //大分类----大分类----大分类
    Route::post('categroy/add/{categroy?}','CategroyController@categroy_add')->name('categroy.add');
    Route::post('categroy/del','CategroyController@categroy_del')->name('categroy.del');
    Route::resource('categroy','CategroyController',['except'=>['update','destroy']]);

    //属性----属性----属性
    Route::post('attribute/add/{attribute?}','AttributeController@attribute_add')->name('attribute.add');
    Route::post('attribute/del','AttributeController@attribute_del')->name('attribute.del');
    Route::resource('attribute','AttributeController',['except'=>['update','destroy']]);

    //子分类----子分类----子分类
    Route::post('subclass/setstate','SubclassController@setstate')->name('subclass.setstate');
    Route::post('subclass/put/{subclass?}','SubclassController@put')->name('subclass.put');
    Route::post('subclass/del','SubclassController@del')->name('subclass.del');
    Route::resource('subclass','SubclassController',['except'=>['update','destroy']]);

    //设置----设置----设置
    Route::get('setting','SettingController@index')->name('setting.index');
    Route::post('setting/put/{setting}','SettingController@put')->name('setting.put');

});

Route::delete('admin/logout','Auth\LoginController@destroy')->middleware('auth:admin')->name('admin.logout');

Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){

    Route::group(['middleware'=>['guest:admin']],function(){
        Route::get('login','LoginController@create')->name('admin.login');
        Route::post('login','LoginController@store');
    });


});





