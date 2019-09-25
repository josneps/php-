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

     protected $type = [
        'status'    =>  'integer',
        'score'     =>  'float',
        'birthday'  =>  'datetime',
        'info'      =>  'array',
    ];

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

    public function beta()
    {

       $bat = new Betaversion();
       $bat->status = '1';
       $bat->score = '90.50';
       $bat->birthday = '2015/5/1';
       $bat->info = ['a'=>1,'b'=>2];

       var_dump($bat->status); // int 1
       var_dump($bat->score); // float 90.5;
       var_dump($bat->birthday); // string '2015-05-01 00:00:00'
       var_dump($bat->info);// array (size=2) 'a' => int 1  'b' => int 2

        // $a = time();
        // $aa = timestamp($a,Y-m-d H:i:s);
        // $aa = date('Y-m-d H:i:s', $a);
        // $asa = strtotime($aa);
        // var_dump($asa);
    }

}