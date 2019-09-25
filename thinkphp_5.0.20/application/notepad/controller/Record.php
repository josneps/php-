<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/9/16
 * Time: 23:06
 */
namespace app\notepad\controller;
use think\Controller;
use think\config;

class Record extends Controller
{
    public function wirteNote()
    {
        //惯例配置
        dump(config());die;//打印出来的是public/convention.php
        //获取记事本类型
//        $a = config::get("classfily");
//        print_r($a);

    }
}