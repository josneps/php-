<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/8/31
 * Time: 19:39
 */

namespace app\admin\Controller;

use think\Controller;
use think\Config;
use think\Db;
//use think\Request;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
//use app\admin\Config;

class FileUpload extends Controller
{
    public function uploads()
    {
//        $data=$this->request->only(['name', 'age', 'sex']);
//        print_r($data);
//        die;

        //获取图片的信息
        $file = $_FILES;
        //获取临时路径
        $tmp_name = $file['file']['tmp_name'];

        $path = $this->uploadQiniu($tmp_name);

        print_r($path);
    }

    public function uploadQiniu($files)
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
        $filePath = $files;
        // 上传到七牛后保存的文件名
        $ext = explode('.',$_FILES['file']['name'])[1];  //后缀
        // 上传到七牛后保存的文件名
        $key =substr(md5($_FILES['file']['tmp_name']) , 0, 5). date('YmdHis') . rand(0, 9999) . '.' . $ext;
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

//        print_r($info);

    }
}