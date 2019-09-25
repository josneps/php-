<?php
namespace app\index\service;

use app\index\model\RecursionModel;
/**
 * 
 */
class recursionService
{
    public function getList($num)
    {
        // echo "123张立丑";
        $models = new RecursionModel();
        $datas=$models->getDatas();

        // $rec=$this->recursion($datas);
        
        
        return $datas;
    }

    //递归
    public function recursion($data,$path=0,$f=1){
        static $arr=array();
        foreach($data as $key=>$val){
            if($val['pid']==$path){
                $val['f']=$f;
                $arr[]=$val;
                $this->recursion($data,$val['id'],$f+1);
            }
        }
        return $arr;
    }
}


