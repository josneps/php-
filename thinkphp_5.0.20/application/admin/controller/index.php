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
//         $myext = substr($filename, strrpos($filename, '.'));
//         echo str_replace('.','',$myext); die;
//         $data = array(
//
//            'name'=>'张三',
//             'age'=>'12',
//             'sex'=>'男',
//             'cont'=>'京东方工商局发生过时空网',
//         );
//
//         $signStr = "";
//
//         foreach ($data as $k => $v) {
//
//              $signStr .= "{$k}={$v}&";
//
//              echo $signStr,'<hr/>';
//
//         }
//
//         print_r($signStr);

//        //URL获取ID
//         $t_id = $this->request->get('id');
//         // print_r($t_id);die;
//
//         // $data = Db::name('title')->where('id',$t_id )->select();
//         // 根据问题ID获取答案
//         $data = Db::name('content')->where(array('t_id'=>$t_id))->select();
//         // $a = $data[0]['name'];
//         // $res = "http://www.thinkphp5.cn.com/index/index?id=1&name=$a";
//         // print_r($res);die();
//         foreach ($data as $key => $val){
//             $mid[] = $val['mid'];
//             // echo $mid,'<hr>';
//         }
//          print_r($mid);

//         $mids = implode(',', $mid);
//         // print_r($mids);
//         $res = Db::name('num')->where("mid in($mids)")->select();
         // print_r($res);
        
//         foreach ($data as $key => $val){
//             foreach ($res as $k => $v) {
//
//                 if ($val['mid']==$v['mid']) {
//                     $val['jieda_num']=$v['jieda_num'];
//                     $datas[$key] = $val;
//                 }
//             }
//         }
//         print_r($datas);


    }

    public function datas()
    {
        // $res = Db::name('prop')->alias('pp')->join('tp_pvalue d','pp.prop_id = d.prop_id')->select();
        //     // ->join('tp_pvalue as pe on pp.prop_id = pe.prop_id')->buildSql();

        // // print_r($res);die;

         //定义一个空数组
//         $arr = array();
//
//         foreach ($res as $key => $val){
//             $arr[$val['prop_name']]['prop_name'] = $val['prop_name'];
//             $arr[$val['prop_name']]['prop_id'] = $val['prop_id'];
//             $arr[$val['prop_name']]['prop_value'][$val['value_id']]['value_name'] = $val['value_name'];
//             $arr[$val['prop_name']]['prop_value'][$val['value_id']]['value_id'] = $val['value_id'];
//         }

        // print_r($arr);


        // $b = array();
        // foreach ($res as $key => $val){
        
        //     $b[$val['prop_name']]['prop_id'] = $val['prop_id'];
        //     $b[$val['prop_name']]['prop_name'] = $val['prop_name'];
        //     $b[$val['prop_name']]['prop_value'][$val['value_id']]['value_id'] = $val['value_id'];
        //     $b[$val['prop_name']]['prop_value'][$val['value_id']]['value_name'] = $val['value_name'];
        
        // }

        // print_r($b);die;
        // 
        
        //搜索的条件 
        //模糊搜索【'%'(匹配0-多个字符),'_'(只占一个字符)】，whereOr,两表联查【左联查，右联查】，volist[name,id],foreach[name,item]【切记都不要加$】,
        $sou = "富";

        $res = Db::name('user_questions')
            ->alias('qq')
            // ->where('qq.q_title|qq.q_title_content','like',"%$sou%")
            ->where("qq.q_title",'like',"%$sou%")
            ->whereor("q_status",'1')
            ->join('tp_designer_answer aa','qq.q_id = aa.a_questions_id','left')
            ->select();
        print_r($res);
        
    }




// Array
// (
//     [prop_id] => 1
//     [prop_name] => 尺寸
//     [value_id] => 1
//     [value_name] => 5.5寸
// )
// Array
// (
//     [prop_id] => 1
//     [prop_name] => 尺寸
//     [value_id] => 2
//     [value_name] => 6.0寸
// )

// $arr = [
//     1 = [
//         'p_id' => 1,
//         'p_name' => 颜色,
//         'p_value' => [
//             0 => [
//                 v_id = ,
//                 v_name = ,
//             ]
//             1 => [
//                 v_id = ,
//                 v_name = ,
//             ]
//         ]
//     ]
// ]

//     $b[$val['prop_id']]['prop_name'] = $val['prop_name'];
//     $b[$val['prop_id']]['prop_value'][]['value_id'] = $val['value_id'];


}
