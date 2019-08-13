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

        $title = trim(I('title'));
        //当前页和每页显示的个数
        $nowPage = I('page',1,'int');
        $pageSize = 20;
        $where = '';
        if (!empty($title)){
            $where .= "u.q_title like '%$title%' OR u.q_title_content like '%$title%'";
        }
        $count = M('user_questions as u')->where($where)->count();

        $subQuery = M('user_questions as u')
            ->join('designer_answer as d on u.q_id = d.a_questions_id', 'left')
            ->field('u.*, d.a_id, d.a_questions_id, d.a_mid, d.a_nickname, d.a_pic, d.a_answer')
            ->order('d.created_at desc')
            ->buildSql();

        $data = M('user_questions as u')->table($subQuery.'u')->where($where)->group('u.q_mid')->order("created_at desc")->limit(($nowPage-1)*$pageSize,$pageSize)->select();

        foreach ($data as $key => $v) {
            $data[$key]['q_title'] = str_replace($title,"<font color='red'>".$title."</font>",$v['q_title']);
            $data[$key]['q_title_content'] = str_replace($title,"<font color='red'>".$title."</font>",$v['q_title_content']);
        }

        $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数
        // 分页显示输出
        $show = $Page->shownew();
echo '<pre/>';
        print_r($data);die;

        $this->assign('title', $title);
        $this->assign('total', $count);
        $this->assign('page', $show);
        $this->assign('list', $data);

        $this->view('askdesigner/index', 2);
    }


    /********************** 业主部分 ***********************/

    /**
     * @todo: 业主提的问题
     * @author： friker
     * User: Administrator
     * Date: 2019/8/12
     * Time: 17:55
     */
    public function addQuestions()
    {

        $title = trim(I('title'));
        $content = trim(I('content'));
        $data = array(
            'q_mid' => $this->userInfo['mid'],
            'q_nickname' => $this->userInfo['nickname'],
            'q_pic' => $this->userInfo['pic'],
            'q_title' => $title,
            'q_title_content' => $content,
            'q_access_device' => 1,
            'q_status' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        );

        $res = $this->questions->creates($data);

        dump($res);die;
    }

    /**
     * @todo: 更新业主的问题的状态
     * @author： friker
     * User: Administrator
     * Date: 2019/8/12
     * Time: 17:55
     */
    public function userStatusUpdate()
    {
        // 判断是否是ajax请求
        if (!IS_AJAX) {
            $this->ajaxReturn(array('state' => 1102, 'message' => '非法请求！'));
        }

        $id = trim(I('id'));
        $where = array('q_id' => $id);
        $data = array(
            'q_status' => 2,
            'updated_at' => date('Y-m-d H:i:s', time())
        );
        $res = $this->questions->statusUpdate($data, $where);

        $this->ajaxReturn($res, '更新成功');

    }

    public function details()
    {
        $id = trim(I('id'));
        $where = "u.q_id = $id";
        $detail_data = M('user_questions as u')
            ->join('designer_answer as d on u.q_id = d.a_questions_id', 'left')
            ->field('u.*, d.a_id, d.a_questions_id, d.a_mid, d.a_nickname, d.a_pic, d.a_answer')
            ->where($where)
            ->order('d.created_at desc')
            ->find();

        //统计浏览次数
        if(empty($this->userInfo)){
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

        $detail_data['look_num'] = M('look_number')->where("a_questions_id = $id")->count();


        print_r($detail_data);die;
    }



    /********************** 设计师部分 ***********************/

    /**
     * @todo: 设计师的回答 & 解答问题可以获得积分
     * @author： friker
     * User: Administrator
     * Date: 2019/8/13
     * Time: 9:01
     */
    public function addAnswer()
    {
//        $questions_id = trim(I('questions_id'));
//        $content = trim(I('content'));
        $questions_id = 2;
        $content = '巴拉巴拉巴贝拉拉不拉了波兰';
        $data = array(
            'a_questions_id' => $questions_id,
            'a_mid' => $this->userInfo['mid'],
            'a_nickname' => $this->userInfo['nickname'],
            'a_pic' => $this->userInfo['pic'],
            'a_answer' => $content,
            'a_access_device' => 1,
            'a_status' => 1,
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time())
        );

        $res = $this->answer->creates($data);

        dump($res);die;
    }


    public function designerStatusUpdate()
    {
        // 判断是否是ajax请求
        if (!IS_AJAX) {
            $this->ajaxReturn(array('state' => 1102, 'message' => '非法请求！'));
        }

        $id = trim(I('id'));
        $a_questions_id = 2;
        $where = array('a_id' => $id, 'a_questions_id' => $a_questions_id);
        $data = array(
            'a_status' => 2,
            'updated_at' => date('Y-m-d H:i:s', time())
        );
        $res = $this->answer->statusUpdate($data, $where);

        $this->ajaxReturn($res, '更新成功');
    }

}