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


Route::get('admin/login','admin/LoginController/login');
Route::get('admin/register','admin/LoginController/register');
Route::post('admin/register','admin/LoginController/register');

Route::get('/404','admin/LoginController/err');

