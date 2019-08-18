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

// Route::get('/','wechat/Wechat/code');

Route::get('a','wechat/Wechat/add');


/** 登录注册部分 */
Route::get('admin/register','admin/LoginController/register');
Route::post('admin/register','admin/LoginController/register'); /** 注册 */
Route::get('admin/login','admin/LoginController/login');
Route::post('admin/login','admin/LoginController/login'); /** 登录 */

Route::post('admin/index','admin/LoginController/index'); /** 文件上传 */
Route::post('admin/curl','admin/LoginController/curl'); /** 测试 */

Route::post('admin/article/list', 'admin/ArticleController/lists'); /** 文章列表 */

Route::get('actr/index', 'admin/ArticleController/index'); /** 文章列表 */

Route::get('/404','admin/LoginController/err');

Route::get('index/recursion','index/Recursion/index');

Route::get('upload','index/Recursion/upload');
Route::post('upload','index/Recursion/upload');