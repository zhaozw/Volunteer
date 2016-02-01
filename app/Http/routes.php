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
//Route::controller('/debug', 'DebugController');

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
    Route::get('/information', 'VolunteerController@information');
    Route::get('/beans', 'VolunteerController@beans');

    Route::get('edit-self', 'VolunteerController@editSelf');
    Route::get('show-self', 'VolunteerController@showSelf');
    Route::post('update-self', 'VolunteerController@updateSelf');
});
Route::resource('volunteer', 'VolunteerController');

/*
 * xsm, add, 20151124.
 * for activity route.
 * */
Route::group(['prefix' => 'activity'], function () {
    // 活动列表主页
    Route::get('/index', 'ActivityController@index');

    Route::get('/qykj/index', 'QYKJController@index'); //千院科教
    Route::get('/yszs/index', 'YSZSController@index');//医师助手
    Route::get('/jzxsy/index', 'JZXSYController@index');//甲状腺书院
    Route::get('/emy/index', 'EMYController@index');//E名医

    // 黄埔学堂
    Route::get('/hpxt/index', 'HPXTController@index');
    Route::get('/hpxt/introduction', 'HPXTController@introduction');
    Route::get('/hpxt/procedure', 'HPXTController@procedure');
    Route::get('/hpxt/document', 'HPXTController@document');
    Route::get('/hpxt/document-ppt', 'HPXTController@documentPpt');
    Route::get('/hpxt/document-agreement', 'HPXTController@documentAgreement');
    Route::get('/hpxt/class-manage', 'HPXTController@classManage');
    Route::get('/hpxt/class-application', 'HPXTController@classApplication');
    Route::get('/hpxt/class-application-add-doctor', 'HPXTController@classApplicationAddDoctor');
    Route::get('/hpxt/class-application-add-assistant', 'HPXTController@classApplicationAddAssistant');
    Route::get('/hpxt/class-store', 'HPXTController@classStore');

    // 空中课堂
    Route::get('/kzkt/index', 'KZKTController@index');
    Route::get('/kzkt/province', 'KZKTController@getProvince');
    Route::get('/kzkt/city', 'KZKTController@getCity');
    Route::get('/kzkt/country', 'KZKTController@getCountry');
    Route::get('/kzkt/hospital', 'KZKTController@getHospital');
    Route::get('/kzkt/department', 'KZKTController@getDepartment');
    Route::post('/kzkt/addClassroom', 'KZKTController@addClassroom');
    Route::post('/kzkt/updateClassroom', 'KZKTController@updateClassroom');
    Route::post('/kzkt/checkIn', 'KZKTController@checkIn');
    Route::get('/kzkt/findPreRegister', 'KZKTController@findPreRegister');
    Route::get('/kzkt/findSingleRegister', 'KZKTController@findSingleRegister');
    Route::any('/kzkt/findAllRegister', 'KZKTController@findAllRegister');
    Route::get('/kzkt/signup', 'KZKTController@signup');
    Route::get('/kzkt/editClassroom', 'KZKTController@editClassroom');
    Route::get('/kzkt/viewCard', 'KZKTController@viewCard');
});
