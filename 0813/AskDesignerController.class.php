<?php

namespace Home\Controller;

use think\Db;
use Org\Util\PageThd;

header("content-type:text/html;charset=utf8");

/**
 * Class AskDesignerController
 * @package Home\Controller
 */
class AskDesignerController extends BaseController
{
    public $questions;
    public $answer;
    public $userInfo;

    public function __construct()
    {
        parent::__construct();
        $this->questions = D('Questions');
        $this->answer = D('Answer');
        $this->userInfo = session('userInfo');
    }

    /**
     * @todo: 问答列表 & 搜索+分页
     * @author： friker
     * User: Administrator
     * Date: 2019/8/12
     * Time: 9:42
     */
    public function index()
    {
        $title = trim(I('title', ''));
        //当前页和每页显示的个数
        $nowPage = I('page',1,'int');
        $pageSize = 20;
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
        $data = M('user_questions as u')->table($subQuery.'u')->where($where)->group('u.q_mid')->order("created_at desc")->limit(($nowPage-1)*$pageSize,$pageSize)->select();
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
        //是否登录
        if(!empty($this->userInfo)){
            $userInfo['pic'] = $this->userInfo['pic'];
            $userInfo['nickname'] = $this->userInfo['nickname'];
            $userInfo['type'] = $this->userInfo['type'];
            if($this->userInfo['type'] == 0) {
                //业主
                $userInfo['questions_num'] = M('user_questions')->where("q_mid = '".$this->userInfo['mid']."'")->count();  // 提问个数
                $userInfo['adopt_num'] = M('user_questions as u')->join('designer_answer d on u.q_id = d.a_questions_id')->where("d.a_status = 2 AND u.q_mid = '".$this->userInfo['mid']."'")->count();   // 采纳个数
            } elseif ($this->userInfo['type'] == 1) {
                //设计师
                $userInfo['agencies_name'] = M('user_designer')->field('agencies_name')->where("mid = '".$this->userInfo['mid']."'")->find();
                $userInfo['questions_num'] = M('designer_answer')->where("a_mid = '".$this->userInfo['mid']."'")->count();  // 解答个数
                $userInfo['adopt_num'] = M('user_questions as u')->join('designer_answer d on u.q_id = d.a_questions_id')->where("d.a_status = 2 AND d.a_mid ='".$this->userInfo['mid']."'")->count();   // 采纳个数
            }
        }

        //分页
        $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数
        // 分页显示输出
        $show = $Page->shownew();

        $this->assign('title', $title);
        $this->assign('total', $count);
        $this->assign('page', $show);
        $this->assign('list', $data);
        $this->assign('count', $count);
        $this->assign('userinfo', $userInfo);

        if(empty($title)) {
            //列表页
            $this->view('askdesigner/index', 2);
        } else {
            //搜索后的列表页
            $this->view('askdesigner/searchDesigner', 2);

        }

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
        $detail_data = $this->questions->where($where)->find();

        //获取答案
        if($this->answer->where("a_questions_id = $id AND a_status = 3")->count()) {
            //判断是否有采纳的使用count统计
            $data[] = $this->answer->where("a_questions_id = $id AND a_status = 3")->order("created_at desc")->find();
            $res = $this->answer->where("a_questions_id = $id AND a_id != ".$data[0]['a_id'])->order("created_at desc")->select();

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
            $data = $this->answer->where("a_questions_id = $id ")->order("created_at desc")->select();

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


        $this->view('askdesigner/details', 2);
    }





}