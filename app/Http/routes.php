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

Route::any('/wechat', 'WechatController@serve');
Route::controller('/debug', 'DebugController');


/*
 * xsm, add, 20151124
 * for wdf index page.
 * */
Route::get('wdf', 'WDFController@index');

/*
 * xsm, add, 20151123.
 * for volunteer register, volunteer info.
 * */


Route::group(['prefix' => 'volunteer'], function () {
    Route::get('/beans', 'VolunteerController@beans');//个人中心 - 迈豆积分
    Route::get('/doctors', 'VolunteerController@doctors'); //个人中心 - 医师列表

    Route::get('edit-self', 'VolunteerController@editSelf');//个人中心 - 编辑信息。区别于资源管理。使用该路由只能管理自己的信息。
    Route::get('show-self', 'VolunteerController@showSelf');//个人中心 - 个人信息。区别于资源管理。使用该路由只能查看自己的信息。
    Route::post('update-self', 'VolunteerController@updateSelf');
});

Route::resource('volunteer', 'VolunteerController');

/*
 * xsm, add, 20151124.
 * for activity route.
 * */
Route::group(['prefix' => 'activity'], function () {
    Route::get('/index', 'ActivityController@index');//活动列表主页
    Route::get('/kzkt/index', 'KZKTController@index');//空中课堂
    Route::get('/qykj/index', 'QYKJController@index');//千院科教

    Route::get('/hpxt/index', 'HPXTController@index');//黄埔学堂
    Route::get('/hpxt/introduction', 'HPXTController@introduction');
    Route::get('/hpxt/procedure', 'HPXTController@procedure');
    Route::get('/hpxt/document', 'HPXTController@document');
    Route::get('/hpxt/document-ppt', 'HPXTController@documentPpt');
    Route::get('/hpxt/document-agreement', 'HPXTController@documentAgreement');
    Route::get('/hpxt/class-manage', 'HPXTController@classManage');
    Route::get('/hpxt/class-application', 'HPXTController@classApplication');

    Route::get('/yszs/index', 'YSZSController@index');//医师助手
    Route::get('/jzxsy/index', 'JZXSYController@index');//甲状腺书院
    Route::get('/emy/index', 'EMYController@index');//E名医
});
