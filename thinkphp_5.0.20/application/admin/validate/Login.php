<?php
namespace app\admin\validate;

use think\Validate;

/**
 * 
 */
class Login extends Validate
{
	protected $rule = [
	    ['phone', 'require', '请输入手机号'],
	    ['password','require', '请输入密码'],
	];

	protected $scene = [
		'register' => ['phone','password'],
	];
}