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
//登陆注册页面
Route::any('/logins', function () {
    return view('Login/Login');
});
//注册
Route::any('/register','Loginscontroller\Loginscontroller@logins');
//登陆
Route::any('/land','Loginscontroller\Loginscontroller@land');


//范志超
Route::any('/Admin_show','C\ViewController@show');
Route::any('/setup','C\ViewController@setup');//返回模块设置视图
Route::any('/css_setup','C\ViewController@css_setup');//返回样式模块设置视图
Route::any('/user_manager','C\ViewController@user_manager');//用户管理
Route::any('/adpicture','C\ViewController@adpicture');//轮播图管理
Route::any('/link','C\ViewController@link');//友情链接
Route::any('/updatepwd','C\ViewController@updatepwd');//帮助个人中心

Route::any('/userdel','C\UserController@userdel');////用户删除
Route::any('/useradd','C\UserController@useradd');//用户添加
Route::any('/userupdate','C\UserController@userupdate');//修改页面
Route::any('/userupdatee','C\UserController@userupdatee');//修改数据

Route::any('/fileadd','C\UserController@fileadd');//轮播图
Route::any('/filedel','C\UserController@filedel');//轮播图删除
Route::any('/fileupdate','C\UserController@fileupdate');//用户批量删除
Route::any('/fileupdatee','C\UserController@fileupdatee');//用户批量删除

Route::any('/countdel','C\UserController@countdel');//用户批量删除
//------
Route::any('/wxjadd','C\ViewController@helpaddym');//无限极分类添加页面
Route::any('/wxjaddd','C\ViewController@helpadd');//无限极分类添加
Route::any('/wxjupdate','C\ViewController@helpupdateym');//无限极分类添加
Route::any('/wxjupdatee','C\ViewController@helpupdate');//无限极分类添加
