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
        //PHP的isset()函数 一般用来检测变量是否设置 
        //PHP的empty()函数 判断值为否为空
        // $res = '123';
        // dump(empty($res));die;

        //判断是否是post请求
        if ($this->request->isPost()) {
            //接值
            $data = $this->request->only(['phone','password','name','sex','age','email']);
            //验证
            $result = $this->validate($data, 'Login.register');
            //判断是否验证成功，如果不成功则进if
            if(true !== $result){
                return error('404', $result);
            }
            // return success('恭喜你成功了……',$data);
            //传输数据到service里进行处理
            $login_service = new Loginservice();
            $list = $login_service->register($data);
            switch ($list) {
                case 1: return success('注册成功'); break;
                case 2: return error('500','注册失败'); break;
                case 3: return error('500','该手机号已注册'); break;
                case 4: return error('500','该昵称已存在'); break;
            }
        } else {
            return $this->fetch();
        }
    }

    public function err()
    {
        return view('/404');
    }
}







