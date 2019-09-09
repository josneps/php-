<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/9/7
 * Time: 12:54
 */

namespace app\admin\Controller;

use think\Controller;
use think\Db;


/**测试控制器
 * Class Test
 * @package app\admin\Controller
 */
class Test extends Controller
{

    public function index()
    {
        echo '天下第一帅儿';die;
    }

    //文件上传
    public function uploads()
    {

    }

    //二维码
    public function create_qrcode()
    {
        $qrcode = create_qrcode('天下第一帅儿');
        echo $qrcode;
    }

    //导出Excel
    public function exportExcel()
    {
        //设置表头：
        $head = ['编号', '昵称', '年龄', '性别', '手机号', '状态'];

        //数据中对应的字段，用于读取相应数据：
        $keys = ['id', 'name', 'age', 'sex', 'phone', 'status'];

        //从数据库获取的数据
        $orders = DB::table('userinfo')->select();

        exportExcel('订单表', $orders, $head, $keys);
    }

    //163邮箱
    public function sendEmail()
    {
        $email = '3120107266@qq.com';
//        $email = '1759052772@qq.com';
        $title = '你好，初次见面请多多关照！';
        $content = '真的很高心认识你，咱以后好好的合作，认识你是一种缘分！！';
        sendEmail($email,$title,$content);
    }

    //QQ邮箱
    public function sendEmailQq()
    {
        sendEmailQq('13121998667@163.com','哈喽','我来啦我来啦');
    }

    public function login()
    {

    }

    public function registered()
    {

    }

}