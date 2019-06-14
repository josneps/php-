<?php 

namespace app\admin\controller;

use think\Controller;
use think\view;


class LoginController extends Controller
{
	/**
	 * 登录
	 */
	public function login()
	{

	}

	public function register()
	{
		//判断是否是post请求
		if ($this->request->isPost()) {
			//接值
			$data = $this->request->only(['phone','password']);
			//验证
			$result = $this->validate($data, 'Loginservice.login');
			if(true !== $result){
				return error('400', $result);
			}
			print_r($data);
			die;
		} else {
			return $this->fetch();
		}
	}

	public function err()
	{
		return view('/404');
	}
}







