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

Route::get('index/index','admin/Index/index');
Route::post('index/index','admin/Index/index');

Route::get('upload','index/Recursion/upload');
Route::post('upload','index/Recursion/upload');

Route::get('index/lists','admin/Index/datas');
Route::post('index/lists','admin/Index/datas');


//2019-08-29
Route::get('admin/edit','admin/Problem/edit');
Route::post('admin/edit','admin/Problem/edit');

Route::get('admin/lists','admin/Problem/lists');

Route::get('admin/fileupload/uploads','admin/FileUpload/uploads');
Route::post('admin/fileupload/uploads','admin/FileUpload/uploads');

Route::get('admin/excel','admin/LoginController/excels');//导出
Route::post('admin/excel','admin/LoginController/excels');

Route::get('admin/export','admin/Office/export');

Route::get('admin/email','admin/LoginController/email');//邮件
Route::post('admin/email','admin/LoginController/email');

Route::get('admin/emailqq','admin/LoginController/test');//邮件


//测试路由
//Route::get('admin/test/index','admin/Test/index');
//Route::get('admin/test/qrcode','admin/Test/create_qrcode');
//Route::get('admin/test/excel','admin/Test/exportExcel');
//Route::get('admin/test/email','admin/Test/sendEmail');
//Route::get('admin/test/emailqq','admin/Test/sendEmailQq');
//Route::get('admin/test/uploads','admin/Test/uploads');
//Route::post('admin/test/uploads','admin/Test/uploads');


//接口路由
Route::post('personal/betaversion/excels','personal/Betaversion/excels'); //导出
Route::get('personal/betaversion/excels','personal/Betaversion/excels');  //导出

Route::post('personal/betaversion/emails','personal/Betaversion/emails'); //163邮件
Route::get('personal/betaversion/emails','personal/Betaversion/emails');  //163邮件

Route::post('personal/betaversion/mails','personal/Betaversion/mails'); //QQ邮件
Route::get('personal/betaversion/mails','personal/Betaversion/mails');  //QQ邮件

Route::post('personal/betaversion/uploads','personal/Betaversion/uploads'); //七牛云
Route::get('personal/betaversion/uploads','personal/Betaversion/uploads');  //七牛云

Route::post('personal/betaversion/qrcode','personal/Betaversion/qrcode'); //二维码
Route::get('personal/betaversion/qrcode','personal/Betaversion/qrcode');  //二维码
