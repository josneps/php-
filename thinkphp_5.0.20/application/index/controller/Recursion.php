<?php

namespace app\index\controller;

use think\Controller;

use app\index\service\recursionService;

/**
 * 
 */
class Recursion extends Controller
{

    public function index()
    {

        $recursionService = new recursionService();

        $data = $recursionService->getList();
        // $page = $data->render();
        // print_r($data);die;

        // print_r($data);
        // 
        $this->assign('data', $data);
        // $this->assign('page', $page);

        return $this->fetch();

    }

    public function upload()
    {
        
        //如果是文件就上传文件
        if($file = request()->file('file')){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                echo $info->getFilename(); 
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
            die;
        }

        return view();
    }

}

