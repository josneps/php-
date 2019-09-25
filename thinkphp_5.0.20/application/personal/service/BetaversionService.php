<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/9/8
 * Time: 12:10
 */
namespace app\personal\service;

use app\personal\model\Betaversion;
class BetaversionService
{
    public $Betaversionmodel;
    //构造函数
    public function __construct()
    {
           $this->Betaversionmodel = new Betaversion();
    }
    //导出
    public function excels($search)
    {
        $where = '';
        if (count($search)){
            $where = $search;
        }
        $datas = $this->Betaversionmodel->lists($where);

        return $datas;
    }
    //图片入库
    public function imgs($img)
    {
        $data['pic'] = $img['data'];
        $resuli = $this->Betaversionmodel->uploads($data);

        return $resuli;
    }

    public function bate()
    {
        $this->Betaversionmodel->beta();
    }
}