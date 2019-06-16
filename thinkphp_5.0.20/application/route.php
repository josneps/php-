<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::get('/','wechat/Wechat/code');

Route::get('a','wechat/Wechat/add');


/** 登录注册部分 */
Route::get('admin/register','admin/LoginController/register');
Route::post('admin/register','admin/LoginController/register'); /** 注册 */
Route::get('admin/login','admin/LoginController/login');
Route::post('admin/login','admin/LoginController/login');

Route::post('admin/index','admin/LoginController/index');

Route::get('/404','admin/LoginController/err');
