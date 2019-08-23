<?php 

namespace app\Wechat\controller;

use think\Controller;

use think\Loader;


Loader::import('phpqrcode.phpqrcode',EXTEND_PATH,'.php');

header('content-type:text/html;charset=utf8');

/**
 * 
 */
class Wechat extends Controller
{
	
	//ajax访问

    //通过链接生成二维码

    public function code()
    {
        
$url = "如果有一天，你要离开我，
我不会留你，我知道你有你的理由；
如果有一天，你说还爱我，
我会告诉你，其实我一直在等你；
如果有一天，我们擦肩而过，
我会停住脚步，凝视你远去的背影，
告诉自己 那个人我曾经爱过。
或许人一生可以爱很多次，
然而总有一个人可以让我们笑得最灿烂，
哭得最透彻，想得最深切。";

    	// $url = " ";

        $qrcode = new \QRcode();

        // $qrimage = new \QRimage();

        $value = $url;                    //二维码内容  

        $errorCorrectionLevel = 'H';    //容错级别  

        $matrixPointSize = 6;           //生成图片大小  

        ob_start();

        $qrcode::png($value,false , $errorCorrectionLevel, $matrixPointSize, 2);  

        // $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2); //这里就是把生成的图片流从缓冲区保存到内存对象上，使用base64_encode变成编码字符串，通过json返回给页面。

        $imageString = base64_encode(ob_get_contents()); //关闭缓冲区
        print_r($imageString);die;

        ob_end_clean(); //把生成的base64字符串返回给前端 

        $data = array( 'code'=>200, 'data'=>$imageString ); 

        print_r($data);die;

        return json($data);
    }

    public function add()
    {
        $test = $this->request->only('msg');
        $url = "http://api.qingyunke.com/api.php?key=free&appid=0&msg=".$test['msg'];
        $data = file_get_contents($url);
        $result = json_decode($data,true);
        echo json_encode($result['content']);die;
        print_r($result['content']);
    }

}
