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

    $pass = password_hash('bbbb',PASSWORD_BCRYPT);
    $rs = password_verify('bbbb2','$2y$10$r0fz27.UYHR7vsgyCTMy6.SLUzBbA/N714uV1.8sB9WYoxz9cDP8e');
    var_dump($rs);
    //return view('welcome');
});

Route::get('/info',function(){
    phpinfo();
});

Route::get('/adduser','User\UserController@add');

//路由跳转
Route::redirect('/hello1','/world1',301);
Route::get('/world','Test\TestController@world1');

Route::get('hello2','Test\TestController@hello2');
Route::get('world2','Test\TestController@world2');


//路由参数
Route::get('/user/test','User\UserController@test');
//Route::get('/user/{uid}','User\UserController@user');
Route::get('/month/{m}/date/{d}','Test\TestController@md');
Route::get('/name/{str?}','Test\TestController@showName');



// View视图路由
Route::view('/mvc','mvc');
Route::view('/error','error',['code'=>40300]);


// Query Builder
Route::get('/query/get','Test\TestController@query1');
Route::get('/query/where','Test\TestController@query2');


//Route::match(['get','post'],'/test/abc','Test\TestController@abc');
Route::any('/test/abc','Test\TestController@abc');


Route::get('/view/test1','Test\TestController@viewTest1');
Route::get('/view/test2','Test\TestController@viewTest2');




//用户注册
Route::get('/user/reg','User\UserController@reg');
Route::post('/user/reg','User\UserController@doReg');

Route::get('/user/login','User\UserController@login');           //用户登录
Route::post('/user/login','User\UserController@doLogin');        //用户登录
Route::get('/user/center','User\UserController@center');        //个人中心


//模板引入静态文件
Route::get('/mvc/test1','Mvc\MvcController@test1');

Route::get('/mvc/bst','Mvc\MvcController@bst');


//Cookie
Route::get('/test/cookie','Test\TestController@cookieTest');



