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
        //判断是否用的是POST请求
        if ($this->request->isPost()) {
            //接值
            $logins=$this->request->only(['phone','password']);
            //验证
            $varift=$this->validate($logins,'Login.login');
            // var_dump($varift);
            if ($varift !== true){
                return error('500',$varift);
            }
            //将数据传送到Service
            $login_service= new Loginservice();
            $list=$login_service->login($logins);
            // print_r($list);
            switch ($list){
                case 1:return error('500','账号不存在，请先注册！');break;                
                case 3:return error('500','密码不正确');break;                
                default:return success("登录成功");break;
            }
        }else{
            echo "123";
        }
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
            // $data = $this->request->param();
            // print_r($data);die;
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







