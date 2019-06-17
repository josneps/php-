<?php
namespace app\admin\lib\common;

use think\Db;


class Commonality
{
    /**
     * 上传单个图片
     * [uploads description]
     * @param  [type] $files [description]
     * @return [type]        [description]
     */
    public static function uploads($files)
    {
        //检测是否有文件
        if(empty($files)){
            return error('10500','图片不能为空');
        }
        //拼接路径
        $url = ROOT_PATH.'public'.DS.'uploads';
        // 使用最大权限0777创建文件
        if (!is_dir($url)) mkdir($url, 0777); 
        //移动文件
        $info = $files->validate(['size'=>2*1024*1024,'ext'=>'jpg,png,gif'])->move($url);
        //判断是否上传成功
        if($info){
            // 成功上传后 获取上传信息
            $file_path = $info->getSaveName();
            return $url.$info->getSaveName();
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }
    }
}






