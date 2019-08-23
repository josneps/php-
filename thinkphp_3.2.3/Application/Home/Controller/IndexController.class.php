<?php

namespace Home\Controller;

use Think\Controller;
use Think\Db;
use Think\sessions;

header("content-type:text/html;charset=utf8");

class IndexController extends Controller {    

    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function lists()
    {
        $title = trim(I('title', ''));
        //当前页和每页显示的个数
        // $nowPage = I('page',1,'int');
        // $pageSize = 20;
        //搜索条件
        $where = '';
        if (!empty($title)){
            $where .= "u.q_title like '%$title%' OR u.q_title_content like '%$title%'";
        }
        //统计总条数
        $count = M('user_questions as u')->where($where)->count();

        //获取数据
        $subQuery = M('user_questions as u')
            ->join('designer_answer as d on u.q_id = d.a_questions_id', 'left')
            ->field('u.*, d.a_id, d.a_questions_id, d.a_mid, d.a_nickname, d.a_pic, d.a_answer, d.a_status')
            ->order('d.created_at desc')
            ->buildSql();

        $data = M('user_questions as u')->table($subQuery.'u')->where($where)->group('u.q_mid')->order("created_at desc")->select();

        //循环取出id存入数组
        foreach ($data as $v) {
            $ids[] = $v['q_id'];
        }
        //将数组分割成字符串
        $ids = implode(",", $ids);
        //统计解答人数
        $num = M('designer_answer')->field('count(a_id) as num, a_questions_id')->where('a_questions_id in ('.$ids.')')->group('a_questions_id')->order('created_at desc')->select();

        //搜索内容标红&数据组合
        foreach ($data as $key => $value) {
            $data[$key]['look_num'] = 0;
            foreach ($num as $k => $v) {
                if($value['q_id'] == $v['a_questions_id']) {
                    $data[$key]['look_num'] = $v['num'];
                }
            }
            $data[$key]['created_at'] = $this->time_trans($value['created_at']);
            $data[$key]['q_title'] = str_replace($title,"<font color='red'>".$title."</font>",$value['q_title']);
            $data[$key]['q_title_content'] = str_replace($title,"<font color='red'>".$title."</font>",$value['q_title_content']);
        }

        print_r($data);die;
    }

    public function time_trans($dateOrTimeStamp){
        $time = strtotime($dateOrTimeStamp);
        if($time==false){
            $time = $dateOrTimeStamp;
        }
        $t=time()-$time;
        $f=array(
            '86400'=>'天',
            '3600'=>'小时',
            '60'=>'分钟',
            '1'=>'秒'
        );
        foreach ($f as $k=>$v)    {
            if (0 != $c=floor($t/(int)$k)) {
                if($c > 30) {
                    return $dateOrTimeStamp;
                } else {
                    return $c.$v.'前';
                }
            }
        }
    }

     /**
     * @todo: 问题&解答  详情 & 记录浏览人数
     * @author： friker
     * User: Administrator
     * Date: 2019/8/15
     * Time: 13:46
     */
    public function details()
    {
        //接收id
        $id = trim(I('id'));
        $where = "q_id = $id";
        //获取问题
        $detail_data = M('user_questions')->where($where)->find();

        //获取答案
        if(M('designer_answer')->where("a_questions_id = $id AND a_status = 3")->count()) {
            //判断是否有采纳的使用count统计
            $data[] = M('designer_answer')->where("a_questions_id = $id AND a_status = 3")->order("created_at desc")->find();
            $res = M('designer_answer')->where("a_questions_id = $id AND a_id != ".$data[0]['a_id'])->order("created_at desc")->select();

            //循环取出设计师mid存入数组
            foreach ($data as $v) {
                $ids[] = $v['a_mid'];
            }
            //将数组分割成字符串
            $mids = "'";
            //将数组分割成字符串
            $mids .= implode("','", $ids);
            $mids .= "'";

            $designer = M('user_designer')->field('agencies_name')->where("mid in (".$mids.")")->select();

            foreach ($res as $key => $val) {
                $data[$key+1] = $val;
            }

            foreach ($data as $key => $val) {
                foreach ($designer as $k => $v) {
                    if($val['a_mid'] == $v['mid']) {
                        $data[$key]['agencies_name'] = $v['agencies_name'];
                    }
                }
            }
        } else {
            //没有采纳的
            $data = M('designer_answer')->where("a_questions_id = $id ")->order("created_at desc")->select();

            //循环取出设计师mid存入数组
            foreach ($data as $v) {
                $ids[] = $v['a_mid'];
            }

            $mids = "'";
            //将数组分割成字符串
            $mids .= implode("','", $ids);
            $mids .= "'";

            $designer = M('user_designer')->field('mid, agencies_name')->where("mid in (".$mids.")")->select();

            foreach ($data as $key => $val) {
                foreach ($designer as $k => $v) {
                    if($val['a_mid'] == $v['mid']) {
                        $data[$key]['agencies_name'] = $v['agencies_name'];
                    }
                }
            }
        }

        $is_show = count($data);

        //统计浏览次数
        if(!empty($this->userInfo)){
            // 登录记录mid
            $where = array(
                'a_questions_id' => $id,
                'user_id' => $this->userInfo['mid']
            );
        } else {
            // 未登录记录ip
            $ip = get_client_ip();
            $where = array(
                'a_questions_id' => $id,
                'user_ip' => $ip
            );
        }

        if(!M('look_number')->where($where)->find()){
            $where['created_at'] = date('Y-m-d H:i:s', time());
            M('look_number')->add($where);
        }

        //统计多少人看过
        $detail_data['look_num'] = M('look_number')->where("a_questions_id = $id")->count();

        $this->assign("details_data", $detail_data);
        $this->assign("userinfo", $this->userInfo);
        $this->assign("data", $data);
        $this->assign("is_show", $is_show);

        print_r($details_data);die;


        $this->view('askdesigner/details', 2);
    }



    public function setsession()
    {
        $userInfo = Array(
            'id' => '3024',
            'mid' => '0a050cd6c513b864fbd4c611d06472a4',
            'username' => '18667172093',
            'type' => '0',
            'register_type' => '0',
            'phone_token' => '33f262a175101fa7c298b5bd5c3d21f7',
            'nickname' => '陈达解决计',
            'pic' => '5add85477318e.JPG',
            'tel' => '18667172093',
            'provice' => '320000',
            'city' => '320400',
            'change_city_status' => '3',
            'change_city' => '0',
            'change_area' => '0',
            'city_update_time' => '0000-00-00 00:00:00',
            'phone' => '',
            'qq' => '',
            'wx' => '',
            'email' => '',
            'email_status' => '0',
            'status' => '1',
            'haveim' => '1',
            'login_time' => '2019-08-14 17:45:01',
            'create_time' => '2019-08-01 14:27:23',
            'update_time' => '2019-08-01 11:33:19',
            'guide_status' => '2',
            'guider_time' => '2019-07-11 16:30:44',
            'truename' => '',
            'is_agreement' => '0',
            'is_authpay' => '0',
            'change_agreement' => '0',
            'is_way' => '0',
            'step' => '0'
        );
        
        session('userInfo',$userInfo);
    }

    public function arr()
    {
        $a = array('abc', '123');

        foreach ($a as $key => $value) {
            
            print_r($value);
            echo '<br/>';
        }

        
        die;

        print_r($a);die;
    }
}