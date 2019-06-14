<?php 

namespace app\admin\controller;

use think\Controller;
use think\view;
use app\admin\service\Loginservice;


class LoginController extends Controller
{
	/**
	 * 登录
	 */
	public function login()
	{

	}

	/**
	 * 注册
	 */
	public function register()
	{
		//判断是否是post请求
		if ($this->request->isPost()) {
			//接值
			$data = $this->request->only(['phone','password']);
			//验证
			$result = $this->validate($data, 'Login.register');
			if(true !== $result){
				return error('404', $result);
			}
			//传输数据到service里进行处理
			$login_service = new Loginservice();
			$list = $login_service->register($data);
			print_r($list);
		} else {
			return $this->fetch();
		}
	}

	public function err()
	{
		return view('/404');
	}
}







