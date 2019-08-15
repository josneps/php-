<?php

namespace app\index\model;

use think\Model;

use think\Db;

/**
 * 
 */
class RecursionModel extends Model
{

     // protection $tablename='ab';
    public function getDatas()
    {
        // $data=Db::name('ab')->paginate(5)->toArray();
$data=Db::name('ab')->select();

print_r($data);
die;
        return $data;
    }
    
}


?>