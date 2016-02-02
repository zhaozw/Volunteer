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
Route::any('/menu', 'WechatController@menu');

Route::group(['prefix' => 'home'], function () {
    Route::get('/error', 'HomeController@error');
    Route::get('/unavailable', 'HomeController@unavailable');
});

/* menu wdf */
Route::get('/wdf', 'WDFController@index');
/* menu activity */
Route::get('/activity', 'ActivityController@index');
/* menu personal */
Route::group(['prefix' => 'volunteer'], function () {
    Route::get('create-self', 'VolunteerController@createSelf');
    Route::post('store-self', 'VolunteerController@storeSelf');
    Route::get('show-self', 'VolunteerController@showSelf');
    Route::get('edit-self', 'VolunteerController@editSelf');
});

/*
 * xsm, add, 20151123.
 * for volunteer register, volunteer info.
 * */
Route::group(['prefix' => 'volunteer'], function () {
    Route::get('/information', 'VolunteerController@information'); //个人中心 - 我的消息
    Route::get('/beans', 'VolunteerController@beans'); //个人中心 - 迈豆积分

    Route::get('edit-self', 'VolunteerController@editSelf');//个人中心 - 编辑信息。区别于资源管理。使用该路由只能管理自己的信息。
    Route::get('show-self', 'VolunteerController@showSelf');//个人中心 - 个人信息。区别于资源管理。使用该路由只能查看自己的信息。
    Route::post('update-self', 'VolunteerController@updateSelf');

    Route::get('beans', 'VolunteerController@beans');
});


Route::group(['prefix' => 'kzkt'], function () {
    Route::get('/index', 'KZKTController@index');
    Route::get('/province', 'KZKTController@getProvince');
    Route::get('/city', 'KZKTController@getCity');
    Route::get('/country', 'KZKTController@getCountry');
    Route::get('/hospital', 'KZKTController@getHospital');
    Route::get('/department', 'KZKTController@getDepartment');
    Route::post('/addClassroom', 'KZKTController@addClassroom');
    Route::post('/updateClassroom', 'KZKTController@updateClassroom');
    Route::post('/checkIn', 'KZKTController@checkIn');
    Route::get('/findPreRegister', 'KZKTController@findPreRegister');
    Route::get('/findSingleRegister', 'KZKTController@findSingleRegister');
    Route::get('/findAllRegister', 'KZKTController@findAllRegister');
    Route::get('/signup', 'KZKTController@signup');
    Route::get('/editClassroom', 'KZKTController@editClassroom');
    Route::get('/viewCard', 'KZKTController@viewCard');
});

Route::group(['prefix' => 'hpxt'], function () {
    Route::get('/index', 'HPXTController@index');
    Route::get('/introduction', 'HPXTController@introduction');
    Route::get('/procedure', 'HPXTController@procedure');
    Route::get('/document', 'HPXTController@document');
    Route::get('/document-ppt', 'HPXTController@documentPpt');
    Route::get('/document-agreement', 'HPXTController@documentAgreement');
    Route::get('/class-manage', 'HPXTController@classManage');
    Route::get('/class-application', 'HPXTController@classApplication');
    Route::get('/class-application-add-doctor', 'HPXTController@classApplicationAddDoctor');
    Route::get('/class-application-add-assistant', 'HPXTController@classApplicationAddAssistant');
    Route::get('/class-store', 'HPXTController@classStore');
});

Route::group(['prefix' => 'emy'], function () {
    Route::get('/emy/index', 'EMYController@index');
});