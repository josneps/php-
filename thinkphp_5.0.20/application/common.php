<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Config;
use PhpOffice\PhpSpreadsheet\Spreadsheet; //导出
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;//导出
use PHPMailer\PHPMailer\PHPMailer;//发送邮件
use PHPMailer\PHPMailer\Exception;//发送邮件
use Qiniu\Auth;//七牛云
use Qiniu\Storage\UploadManager;//七牛云



/**
 * 成功时调用
 * [success description]
 * @return [type] [description]
 */
function success($msg, $arr = [])
{
	$data = ['code' => '10200', 'msg' => $msg];
	if (!empty($arr)) {
		$data['data'] = $arr;
	}

	return json($data);
}


/**
 * Notes:失败调用
 * User: 张丽坤
 * Date: 2019/9/17
 * Time: 22:42
 * @param $code 状态码
 * @param $msg 提示语
 * @param array $arr 数据
 * @return \think\response\Json
 */
function error($code, $msg, $arr = [])
{
	$data = ['code' => $code, 'msg' => $msg];
	if (!empty($arr)) {
		$data['data'] = $arr;
	}

	return json($data);
}


/**
 * 获取当天的日期：20190617
 * [getTime description]
 * @return [type] [description]
 */
//function getTime()
//{
//	return date('Ymd',time());
//}

function getTime()
{
    return date('Y-m-d H:i:s',time());
}


/**
 * 导出excel表
 * $data：要导出excel表的数据，接受一个二维数组
 * $name：excel表的表名
 * $head：excel表的表头，接受一个一维数组
 * $key：$data中对应表头的键的数组，接受一个一维数组
 * 备注：此函数缺点是，表头（对应列数）不能超过26；
 *循环不够灵活，一个单元格中不方便存放两个数据库字段的值
 */
function outdata($name, $data=[], $head=[], $keys=[])
{
    $count = count($head);  //计算表头数量

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    for ($i = 65; $i < $count + 65; $i++) {     //数字转字母从65开始，循环设置表头：
        $sheet->setCellValue(strtoupper(chr($i)) . '1', $head[$i - 65]);
    }

    /*--------------开始从数据库提取信息插入Excel表中------------------*/


    foreach ($data as $key => $item) {             //循环设置单元格：
        //$key+2,因为第一行是表头，所以写到表格时   从第二行开始写

        for ($i = 65; $i < $count + 65; $i++) {     //数字转字母从65开始：
            $sheet->setCellValue(strtoupper(chr($i)) . ($key + 2), $item[$keys[$i - 65]]);
            $spreadsheet->getActiveSheet()->getColumnDimension(strtoupper(chr($i)))->setWidth(20); //固定列宽
        }

    }
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="' . $name . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');

    //删除清空：
    $spreadsheet->disconnectWorksheets();
    unset($spreadsheet);
    exit;
}

/**
 * Notes:163邮箱
 * User: 张丽坤
 * Date: 2019/9/8
 * Time: 18:40
 * @param $toEmail 发给谁
 * @param $emailTitle 标题
 * @param $emailContent 内容
 */
function sendEmail($toEmail,$emailTitle,$emailContent)
{
    $mail = new PHPMailer(true);
    try {
// 服务器设置
        $mail->SMTPDebug = 2; // 开启Debug
        $mail->isSMTP(); // 使用SMTP
        $mail->Host = 'smtp.163.com'; // 服务器地址
        $mail->SMTPAuth = true; // 开启SMTP验证
        $mail->Username = '13121998667@163.com'; // SMTP 用户名（你要使用的邮件发送账号）
        $mail->Password = 'zlk114'; // SMTP 密码
        $mail->SMTPSecure = 'ssl'; // 开启TLS 可选
        $mail->Port = 465; // 端口

// 收件人
        $mail->setFrom('13121998667@163.com'); // 来自
//$mail->addAddress('395696661@qq.com'); // 添加一个收件人
        $mail->addAddress($toEmail); // 可以只传邮箱地址


// 内容
        $mail->isHTML(true); // 设置邮件格式为HTML
        $mail->Subject = $emailTitle; //邮件主题
        $mail->Body = $emailContent; //邮件内容

        $mail->send();
        echo '邮件发送成功。<br>';
    } catch (Exception $e) {
        echo '邮件发送失败。<br>';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}


/**
 * Notes:发送QQ邮件
 * User: 张丽坤
 * Date: 2019/9/8
 * Time: 19:40
 * @param string $to：接收者邮箱地址
 * @param string $title：邮件的标题
 * @param string $content：邮件内容
 * @return boolean  true:发送成功 false:发送失败
 * @throws Exception
 */
    function sendMail($to,$title,$content,$nickname)
    {

        //实例化PHPMailer核心类
        $mail = new PHPMailer();
        //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $mail->SMTPDebug = 1;
        //使用smtp鉴权方式发送邮件
        $mail->isSMTP();
        //smtp需要鉴权 这个必须是true
        $mail->SMTPAuth=true;
        //链接qq域名邮箱的服务器地址
        $mail->Host = 'smtp.qq.com';
        //设置使用ssl加密方式登录鉴权
        $mail->SMTPSecure = 'ssl';
        //设置ssl连接smtp服务器的远程服务器端口号，以前的默认是25，但是现在新的好像已经不可用了 可选465或587
        $mail->Port = 465;
        //设置smtp的helo消息头 这个可有可无 内容任意
        $mail->Helo = 'Hello smtp.qq.com Server';
        //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
        $mail->Hostname = 'localhost';
        //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
        $mail->CharSet = 'UTF-8';
        //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
        $mail->FromName = $nickname;
        //smtp登录的账号 这里填入字符串格式的qq号即可
        $mail->Username ='3120107266@qq.com';
        //smtp登录的密码 使用生成的授权码 你的最新的授权码
        $mail->Password = 'doujtgiwjsibdddb';
        //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
        $mail->From = '3120107266@qq.com';
        //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
        $mail->isHTML(true);
        //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
        $mail->addAddress($to);
        //添加多个收件人 则多次调用方法即可
        // $mail->addAddress('xxx@qq.com','lsgo在线通知');
        //添加该邮件的主题
        $mail->Subject = $title;
        //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
        $mail->Body = $content;

        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
        //$mail->addAttachment('./static/home/image/2.jpg','mm.jpg');
        //同样该方法可以多次调用 上传多个附件
        // $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');

        $status = $mail->send();

        //简单的判断与提示信息
        if($status) {
            return true;
        }else{
            return false;
        }
    }

function postShareupload($tmp_name)
{
    $config = Config::get('UPLOAD_Qiniu_CONFIG');
    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = $config['accessKey'];
    $secretKey = $config['secretKey'];
    // 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);
    // 要上传的空间
    $bucket = $config['bucket'];
    //图片域名
    $domain = $config['domain'];
    // 生成上传 Token
    $token = $auth->uploadToken($bucket);
    // 要上传文件的本地路径
    $filePath = $tmp_name;
    // 上传到七牛后保存的文件名
    $ext = explode('.',$_FILES['file']['name'])[1];  //后缀
    // 上传到七牛后保存的文件名
    $key =substr(md5($tmp_name) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
    // 初始化 UploadManager 对象并进行文件的上传。
    $uploadMgr = new UploadManager();
    // 调用 UploadManager 的 putFile 方法进行文件的上传。
    list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
    if ($err !== null) {
        return json_encode(['ResultData'=>'失败','info'=>'失败']);
    } else {
        if ($ext == 'gif') {
            $info = [
                'data'=>$domain.'/'.$ret['key'].'?imageView2/0/h/300/q/60',
                'status'=>'1'
            ];
        }else{
            $info = [
                'data'=>$domain.'/'.$ret['key'].'?imageView2/0/h/800/format/jpg/q/75',
                'status'=>'1'
            ];
        }
    }

    return $info;
}


/**
 * Notes:生成二维码  使用  :  根目录下放张logo，调用的时候传二维码内容
 * User: 张丽坤
 * Date: 2019/9/8
 * Time: 21:13
 * @param string $url       //二维码的内容
 * @param string $level     //
 * @param int $size         //
 * @return string
 */
function create_qrcode($url = 'http://101.132.107.94/personal/个人总结.html', $level = 'L', $size = 6)
{
    Vendor('phpqrcode.phpqrcode');
    $object = new \QRcode();

    //容错级别
    $errorCorrectionLevel = $level;
    //生成图片大小
    $matrixPointSize = $size;
    //生成一个二维码图片
    $object->png($url, 'img_w.png', $errorCorrectionLevel, $matrixPointSize, 2);

    //准备好的logo图片,本人放在了根目录下
    $logo = 'logo.png';
    //已经生成的原始二维码图,也在根目录下
    $qrcode = 'img_w.png';
    //logo图片存在
    if ($logo !== FALSE) {
        $qrcode = imagecreatefromstring(file_get_contents($qrcode));
        $logo = imagecreatefromstring(file_get_contents($logo));
        $qrcode_width = imagesx($qrcode);   //二维码图片宽度
        $qrcode_height = imagesy($qrcode);  //二维码图片高度
        $logo_width = imagesx($logo);       //logo图片宽度
        $logo_height = imagesy($logo);      //logo图片高度
        $logo_qr_width = $qrcode_width / 5;
        $scale = $logo_width / $logo_qr_width;
        $logo_qr_height = $logo_height / $scale;
        $from_width = ($qrcode_width - $logo_qr_width) / 2;
        //重新组合图片并调整大小
        imagecopyresampled($qrcode, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
            $logo_qr_height, $logo_width, $logo_height);
    }
    //输出图片
    imagepng($qrcode, 'img_w_logo.png');
    return '<img src="/img_w_logo.png">';
}

