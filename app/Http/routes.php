<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
 * xsm, add, 20151124
 * for wdf index page.
 * */
Route::get('wdf', 'WDFController@index');

/*
 * xsm, add, 20151123.
 * for volunteer register, volunteer info.
 * */

//TODO heqilai
Route::resource('volunteer', 'VolunteerController', ['only' => ['show', 'create', 'store', 'edit', 'update']]);


Route::group([
    'prefix' => 'personal',
//    'middleware' => 'auth.personal'
], function () {
    /* 个人中心 - 迈豆积分 */
    Route::get('/beans/{id}', 'PersonalController@beans');

    /* 个人中心 - 医师列表 */
    Route::get('/doctors', 'PersonalController@doctors');

    //TODO 个人信息，显示／编辑 个人头像(不能改)，电话，邮箱
    Route::get('/show', 'PersonalController@show');
});

/*
 * xsm, add, 20151124.
 * for activity route.
 * */
Route::group(['prefix' => 'activity', 'middleware' => 'auth.access'], function () {
    /* 活动列表主页 */
    Route::get('/index', 'ActivityController@index');

    /* 空中课堂 */
    Route::get('/kzkt/index', 'KZKTController@index');

    /* 千院科教 */
    Route::get('/qykj/index', 'QYKJController@index');

    /* 黄埔学堂 */
    Route::get('/hpxt/index', 'HPXTController@index');

    /* 医师助手 */
    Route::get('/yszs/index', 'YSZSController@index');

    /* 甲状腺书院 */
    Route::get('/jzxsy/index', 'JZXSYController@index');

    /* E名医 */
    Route::get('/emy/index', 'EMYController@index');
});
