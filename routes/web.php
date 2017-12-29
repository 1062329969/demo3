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

Route::any('userlogin', 'LoginController@index');
Route::any('outlogin', 'LoginController@outlogin');
Route::group(['middleware'=>['web','CheckLogin']],function (){
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/home', 'HomeController@index');
    Route::get('home/add', 'HomeController@add')->name('home/add');
    Route::post('home/doadd', 'HomeController@doadd')->name('home/doadd');
    Route::get('home/delete', 'HomeController@delete')->name('home/delete');
    Route::any('home/edit/{id}', 'HomeController@edit');
    Route::any('home/session1', 'HomeController@session1');
    Route::any('home/session2', 'HomeController@session2');
    Route::any('home/excelexport', 'HomeController@excelexport');
    Route::any('/order/setorder', 'OrderController@set_order');
    Route::any('/pay/return_url', 'PayController@return_url');
    Route::any('/pay/return_url', 'PayController@return_url');
    Route::any('/pay/notify_url', 'PayController@notify_url');
    Route::get('/echarts/map', 'EchartsController@map');
    Route::any('/wechat/wxoauth', 'WeChatController@wxoauth');
    Route::any('/wechat/wxgetuser', 'WeChatController@getuser');
    Route::any('/wechat/getuser', 'WeChatController@getwxuser');
    Route::any('/wechat/remark', 'WeChatController@remark');
    Route::any('/wechat/jssdk', 'WeChatController@jssdk');
});
Route::any('/wechat', 'WeChatController@serve');

//Route::resource('home', 'HomeController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
