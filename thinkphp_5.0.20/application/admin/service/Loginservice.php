<?php

namespace app\admin\service;

use app\admin\model\AdminUser;

class Loginservice
{
	/**
	 * 注册
	 * [register description]
	 * @return [type] [description]
	 */
	public function register($data)
	{
		//生成随机数作为用户的code码
		$code = rand(10000, 99999);
		//组装数据
		$user_info = array(
			'user_phone' => $data['phone'],
			'user_pwd' => md5(md5($data['password']).$code),
			'user_code' => $code,
			'user_name' => $data['name'],
			'user_sex' => $data['sex'],
			'user_age' => $data['age'],
			'user_email' => $data['email'],
		);
		//实例化model
		$admin_user = new AdminUser();
		//调用model进行入库并将结果返回
		return $admin_user->saves($user_info);
	}
}