<?php 

namespace app\admin\controller;

use think\Controller;
use think\view;
use app\admin\service\Loginservice;
use think\Session;
use think\Db;
use app\admin\lib\common\Uploads;
use app\admin\lib\common\Commonality;
use app\admin\controller\Excel;

use app\admin\controller\Email;
use app\admin\controller\Emailqq;



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
                return error('10404',$varift);
            }
            //将数据传送到Service
            $login_service= new Loginservice();
            $list=$login_service->login($logins);
            // print_r($list);
            switch ($list){
                case 1:return error('10500','账号不存在，请先注册！');break;                
                case 3:return error('10500','密码不正确');break;                
                default:
                    //存session
                    Session::set('user_info',$list);
                    return success("登录成功",['code' => $list['user_code']]);
                    break;

            }
        }else{
            return view('/404');
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
                return error('10404', $result);
            }
            // return success('恭喜你成功了……',$data);
            //传输数据到service里进行处理
            $login_service = new Loginservice();
            $list = $login_service->register($data);
            switch ($list) {
                case 1: return success('注册成功'); break;
                case 2: return error('10500','注册失败'); break;
                case 3: return error('10500','该手机号已注册'); break;
                case 4: return error('10500','该昵称已存在'); break;
            }
        } else {
            return $this->fetch();
        }
    }

    /**文件上传
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        //接收数据
        $data = $this->request->only(['name']);
        //接收文件
        $files = request()->file('file');

        $data['file_url'] = Uploads::upload($files);

        print_r($data);
    }

    /**
     * 404错误
     * [err description]
     * @return [type] [description]
     */
    public function err()
    {
        return view('/404');
    }


    /**上传七牛方法
     * [lotUploadQiniu description]
     * @param  [type] $files [description]
     * @return [type]        [description]
     */
     public function lotUploadQiniu($files)
    {
        $exts = array('bmp','jpg', 'tif','tiff','gif', 'png', 'jpeg','xls','xlsx','dwg','dxf','hom','zip','txt','max','3ds','obj','fbx');
        if (!empty($files)) {
            //图片上传设置
            $config = array(
                'maxSize'    =>    30*1024*1024, //设置附件上传大小  30MB = 31457280;
                'savePath'   =>    '',
                'saveName'   =>    array('uniqid',''),//
                'exts'       =>    $exts,
                'autoSub'    =>    false,
                'subName'    =>    '',//保存后缀,
            );
            $driverConfig = array (
                'accessKey' => C('PIC_AK'),
                'secretKey' => C('PIC_SK'),
                'domain' => C('PIC_DOMAIN'),
                'bucket' => C('PIC_BUCKET'),
            );
            $Upload = new \Think\Upload($config,'Qiniu',$driverConfig);
            $return_img = $Upload->upload($files);
            //判断是否有图
            if($return_img){
                return $return_img;
            }else{
                exit(json_encode(array('state'=>1200,'message'=>$Upload->getError())));
            }
        }
    }

    //Excel导出
    public function Excels()
    {

        //设置表头：
        $head = ['编号', '昵称', '年龄', '性别', '手机号', '状态'];

        //数据中对应的字段，用于读取相应数据：
        $keys = ['id', 'name', 'age', 'sex', 'phone', 'status'];

        //从数据库获取的数据
        $orders = DB::table('userinfo')->select();

        Excel::outdata('订单表', $orders, $head, $keys);

    }

    //发送邮件
    public function Email()
    {
        $email = '3120107266@qq.com';
//        $email = '1759052772@qq.com';
        $title = '你好，初次见面请多多关照！';
        $content = '真的很高心认识你，咱以后好好的合作，认识你是一种缘分！！';
        Email::email($email,$title,$content);
    }

    public function test(){
        $bool = Emailqq::sendMail('13121998667@163.com','哈喽','我来啦我来啦');
        if($bool){
            echo 'ok';
        }else{
            echo 'no';
        }
    }


}







