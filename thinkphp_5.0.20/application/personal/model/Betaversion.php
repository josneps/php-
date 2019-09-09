<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/9/8
 * Time: 12:53
 */
namespace app\personal\model;

use think\Model;
use think\Db;

class Betaversion extends Model
{
    //将Model设置为这个表名
    //protected $tableName = 'userinfo';

    public function lists($where)
    {

       $datas = Db::name('userinfo')->where($where)->select();

       return $datas;
    }

    public function uploads($data)
    {
        $result = Db::name('userinfo')->insert($data);

        return $result;
    }

}