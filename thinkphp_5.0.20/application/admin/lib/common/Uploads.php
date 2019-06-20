<?php 

namespace app\admin\lib\common;


class Uploads
{
    //静态属性
    public static $a = 1;


    public static function upload($image)
    {
        //检测文件是否为空
        if (empty($image)) {
            return error('500','请选择要上传的文件');
        }

        //拼接要上传的路径
        $url = ROOT_PATH.'public'.DS.'uploads';

        //判断是否存在该目录，不存在就创建
        if (!is_dir($url)) mkdir($url,0777);

        $info = $image->validate(['size'=>1024*1024*3,'ext'=>'pug,jpg,jpeg'])->move($url);

        //判断是否成功
        if ($info) {
            //返回路径
            return $url.DS.$info->getSaveName();
        }

    }
}



