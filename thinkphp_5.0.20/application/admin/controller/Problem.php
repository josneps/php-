<?php

namespace app\admin\Controller;

use think\Controller;
use think\Db;
use think\Request;

/**
 * 
 */
class Problem extends Controller
{
    
    /**
     * 列表页
     * [index description]
     * @return [type] [description]
     */
    public function lists() 
    {

        //接收问题的ID  (暂时四种接值方式：param,only,get,post,request)
        // $request = Request::instance();
        // $q_id = $this->request->only(['q_id']);
        // $q_id = $this->request->param();
        $q_id = $this->request->get('q_id');
        //条件
        // $rdata = Db::table('user_questions')->where(array('q_id'=>$q_id))->find();
        // $rdata = Db::table('user_questions')->where("q_id=$q_id")->find();【条件细节提示：’双引号“解析变量”‘】
        $where = 'q_id='.$q_id;
        $rdata = Db::table('user_questions')->field('q_id,q_mid,q_nickname,q_title,q_title_content,q_look_num,q_answer_num,created_at,q_status')->where($where)->find();
        //判断问题的状态
        if ($rdata['q_status'] ==4){
            $answes_one = Db::table('designer_answer')->where("a_questions_id=$q_id")->where('a_status=3')->find();
            print_r($answes_one);
        }
        //where 后的顺序："group by,order by,limit"
        $answes_data = Db::table('designer_answer')->where("a_questions_id=$q_id")->where('a_status !=3')->order('created_at desc')->select();

        //回答采纳
        foreach ($answes_data as $key => $val){
            $ids[] = $val['a_mid'];
        }
        $a_mid = $this->strImplode($ids);
        $cn = Db::table('answer_adopt_num')->where("a_mid in($a_mid)")->select();
        print_r($cn);


    }

    /**
     * 编辑页
     * [edit description]
     * @return [type] [description]
     */
    public function edit()
    {
        echo 'edit';
    }

    /**将数组分割成字符串
     * [strImplode description]
     * @param  [type] $ids [description]
     * @return [type]      [description]
     */
     public function strImplode($ids)
    {
        //将数组分割成字符串
        $mids = "'";
        //将数组分割成字符串
        $mids .= implode("','", $ids);
        $mids .= "'";

        return $mids;
    }


}


