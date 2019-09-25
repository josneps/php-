<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/9/8
 * Time: 11:47
 */
namespace app\personal\controller;

use think\Controller;
use app\personal\service\BetaversionService;
use think\Request;

class Betaversion extends Controller
{
    public $BetaversionService;
    //构造方法
    public function __construct()
    {
        parent::__construct();
        $this->BetaversionService = new BetaversionService();
    }

    /**
     * Notes:导出
     * User: 张丽坤
     * Date: 2019/9/8
     * Time: 12:08
     */
    public function excels()
    {
        //接收条件值
        $search = $this->request->post();
//        print_r($search);die;
        //获取导出的数据
            $data = $this->BetaversionService->excels($search);
        if (!count($data)){
            echo "未找到您想要的数据";die;
        }
        //表名
        $name = 'userinfo';
        //标题
        $head = ['序号','名字','年龄','性别','手机号','状态'];
        //数组的下标
        $key = ['id','name','age','sex','phone','status'];
        //调用导出的方法
        outdata($name,$data,$head,$key);
    }

    /**
     * Notes:163发邮件
     * User: 张丽坤
     * Date: 2019/9/8
     * Time: 18:35
     */
    public function emails()
    {
        //开始接值
        $data = $this->request->only(['toemail','emailtitle','emailcontent']);
//        print_r($data);die;
        //验证数据
        $result = $this->Validate($data,'BetaversionValidate.email');
        if(true !== $result){
            return error('10404', $result);
        }
        //调用发送163邮箱的方法
        sendEmail($data['toemail'],$data['emailtitle'],$data['emailcontent']);

    }

    /**
     * Notes:QQ发邮件
     * User: 张丽坤
     * Date: 2019/9/8
     * Time: 18:35
     */
    public function mails()
    {
        //开始接值
        $data = $this->request->only(['toemail','emailtitle','emailcontent','nickname']);
        print_r($data);die;
        //验证数据
        $result = $this->Validate($data,'BetaversionValidate.email');
        if(true !== $result){
            return error('10404', $result);
        }
        //调用发送QQ邮箱的方法
        sendMail($data['toemail'],$data['emailtitle'],$data['emailcontent'],$data['nickname']);

    }

    /**
     * Notes:七牛云
     * User: 张丽坤
     * Date: 2019/9/8
     * Time: 20:09
     */
    public function uploads()
    {
        //接收数
        $dateimg = $_FILES;
        //临时路径
        $tmp_name = $dateimg['file']['tmp_name'];
        //调用七牛云的方法
        $img = postShareupload($tmp_name);
        $resuli = $this->BetaversionService->imgs($img);

        print_r($resuli);
    }

    /**
     * Notes:二维码
     * User: 张丽坤
     * Date: 2019/9/9
     * Time: 22:40
     */
    public function qrcode()
    {
//        $a = 100*100;
//        $b = (bool)$a;
//        var_dump($b);die;

//        $a = array(
//            'name' => '张三',
//            'age' => 18,
//        );
//        $d = json_encode($a);
//        $f = json_decode($d,true);
//        echo '<pre>';
//        var_dump($d);
//        echo '<hr/>';
//        var_dump($f);
//        die;
        echo create_qrcode('https://baijiahao.baidu.com/s?id=1620074125490055484&wfr=spider&for=pc');
    }

    public function bat()
    {
         $this->BetaversionService->bate();
    }


}