<?php

namespace app\admin\Controller;

use think\Controller;
use think\Db;
use think\Request;


header("content-type:text/html;charset=utf8");

/**
 * Class AskDesignerController
 * @package Home\Controller
 */
class Index extends Controller
{

    public function index()
     {
        // $data = array(

        //     ['name'=>'张三',
        //     'age'=>'12',
        //     'sex'=>'男',
        //     'cont'=>'京东方工商局发生过时空网',]
        // );

        // $signStr = array();

        // foreach ($data as $k => $v) {

        //     // $signStr .= "{$k}={$v}&";

        //     // echo $signStr,'<hr/>';

        // }

        // print_r($v);


        //URL获取ID
        $t_id = $this->request->get('id');
        // print_r($t_id);die;

        // $data = Db::name('title')->where('id',$t_id )->select();
        // 根据问题ID获取答案
        $data = Db::name('content')->where(array('t_id'=>$t_id))->select();
        // print_r($data);
        foreach ($data as $key => $val){
            $mid[] = $val['mid'];
            // echo $mid,'<hr>';
        }
        // print_r($mid);
        $mids = implode(',', $mid);
        // print_r($mids);
        $res = Db::name('num')->where("mid in($mids)")->select();
        // print_r($res); 
        
        foreach ($data as $key => $val){
            foreach ($res as $k => $v) {

                if ($val['mid']==$v['mid']) {
                    $val['jieda_num']=$v['jieda_num'];
                    $datas[$key] = $val;
                }
            }
        }
        print_r($datas);




    }



}
