<?php
namespace app\admin\validate;

use think\Validate;

/**
 * 
 */
class Login extends Validate
{
	protected $rule = [
	    ['phone', 'require|/^[1][3,4,5,7,8][0-9]{9}$/', '请输入手机号|请输入正确的手机号'],
	    ['password','require', '请输入密码'],
	    ['name','require|chs', '请输入昵称|昵称只能为汉字'],
	    ['sex','require|in:1,2', '请输入性别|性别只能是1:男、2:女'],
	    ['age','require|number|between:1,120', '请输入年龄|年龄只能是数字|年龄只能是1~120'],
	    ['email','require|email', '请输入邮箱|邮箱格式不正确'],
	];

	protected $scene = [
		'register' => ['phone','password','name','sex','age','email'],
		'login'=>['phone','password'],
		
	];
}