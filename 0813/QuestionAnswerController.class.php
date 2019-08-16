<?php

namespace Home\Controller;

use think\Db;
//use Org\Util\PageThd;

header("content-type:text/html;charset=utf8");

/**
 * 设计师 & 业主 个人中心-问答模块
 * Class ClassName
 * @package Home\Controller
 * User: Administrator
 * Date: 2019/8/15
 * Time: 11:13
 */
class QuestionAnswerController extends BaseController
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

    /********************************** 设计师部分 **************************************/

    /**
     * @todo: 设计师列表
     * @author： friker
     * User: Administrator
     * Date: 2019/8/15
     * Time: 11:18
     */
	public function index()
    {
        //根据解答的id获取问题
        //设计师mid
        $user_where = "a.a_mid = '".$this->userInfo['mid']."'";
        //接收状态
        $status = trim(I('status', '', int));

        //解答的提的个数
        $answer_num = M('designer_answer as a')
            ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
            ->join("designer_integral i on a.a_questions_id = i.a_questions_id", 'left')
            ->where($user_where)
            ->order("a.created_at desc")
            ->count();

//        echo $answer_num;die;

        //被采纳的个数
        $integral_num = M('designer_answer as a')
            ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
            ->join("designer_integral i on a.a_questions_id = i.a_questions_id", 'left')
            ->where($user_where)
            ->where("i.status = 2")
            ->order("a.created_at desc")
            ->count();

        //判断是否获取被采纳的
        if($status == '') {
            //没有被采纳的
            $answer_data = M('designer_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->join("designer_integral i on a.a_questions_id = i.a_questions_id", 'left')
                ->where($user_where)
                ->order("a.created_at desc")
                ->select();

        } else {
            //已被采纳的
            $answer_data = M('designer_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->join("designer_integral i on a.a_questions_id = i.a_questions_id", 'left')
                ->where($user_where)
                ->where("i.status = 2")
                ->order("a.created_at desc")
                ->select();

        }

        $this->assign('integral_num', $integral_num);
        $this->assign("answer_num", $answer_num);
        $this->assign("answer_data", $answer_data);
        $this->assign("status", $status);
        $this->assign('userinfo', $this->userInfo);


        $this->view('QuestionAnswer/index', 2);
    }


    /**
     * @todo: 设计师的回答 & 解答问题可以获得积分
     * @author： friker
     * User: Administrator
     * Date: 2019/8/13
     * Time: 9:01
     */
    public function addAnswer()
    {
        $id = $this->userInfo['mid'];
        if (IS_POST) {
            $questions_id = trim(I('questions_id'));
            $content = trim(I('content'));
            $id = trim(I('id'));
            $data = array(
                'a_questions_id' => $questions_id,
                'a_mid' => $id,
                'a_nickname' => $this->userInfo['nickname'],
                'a_pic' => $this->userInfo['pic'],
                'a_answer' => $content,
                'a_access_device' => 1,
                'a_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            );

            $res = $this->answer->creates($data);

            if($res) {
                $this->ajaxReturn(array('state' => 1100, 'message' => '添加成功'));
            } else {
                $this->ajaxReturn(array('state' => 1102, 'message' => '添加失败'));
            }
        } else {
            $this->assign("id", $id);
            $this->view('QuestionAnswer/addAnswer', 2);
        }

    }


    /**
     * @todo: 更新设计师的解答的状态
     * @author： friker
     * User: Administrator
     * Date: 2019/8/15
     * Time: 13:53
     */
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
        $this->answer->statusUpdate($data, $where);

        $this->ajaxReturn(array('state' => 1100, 'message' => '更新成功'));
    }

    /**
     * @todo: 满意
     * @author： friker
     * User: Administrator
     * Date: 2019/8/15
     * Time: 18:30
     */
    public function satisfied()
    {

    }

    /**
     * @todo: 不满意
     * @author： friker
     * User: Administrator
     * Date: 2019/8/15
     * Time: 18:31
     */
    public function noSatisfied()
    {

    }


    /********************************** 业主部分 **************************************/

    /**
     * @todo: 业主列表
     * @author： friker
     * User: Administrator
     * Date: 2019/8/15
     * Time: 11:34
     */
    public function lists()
    {
        //根据问题获取答案
        //接收状态
        $status = trim(I('status', 0, int));
        //当前页和每页显示的个数
        $nowPage = I('page',1,'int');
        $pageSize = 40;

        $user_where = "q_mid = '".$this->userInfo['mid']."'";


        if($status == 0) {
            //搜索全部
            $data = $this->questions->where($user_where)->order('created_at desc')->limit(($nowPage-1)*$pageSize,$pageSize)->select();
            $count = $this->questions->where($user_where)->order('created_at desc')->select();
        } else {
            //按照不同的状态进行搜索
            switch ($status){
                case 1 :
                    //待解答
                    $where = "q_status = 1 or q_status = 2";
                    break;
                case 2:
                    //已解答
                    $where = "q_status = 3";
                    break;
                case 3:
                    //已采纳
                    $where = "q_status = 4";
                    break;
            }
            //获取数据
            $data = $this->questions->where($user_where)->where($where)->order('created_at desc')->limit(($nowPage-1)*$pageSize,$pageSize)->select();
            $count = $this->questions->where($user_where)->where($where)->order('created_at desc')->select();

        }

        //分页
        $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数

        // 分页显示输出
        $show = $Page->shownew();

        $this->assign('status',$status);
        $this->assign('data', $data);
        $this->assign('page', $show);


        $this->view('QuestionAnswer/lists', 2);
    }


    /**
     * @todo: 业主提的问题
     * @author： friker
     * User: Administrator
     * Date: 2019/8/12
     * Time: 17:55
     */
    public function addQuestions()
    {
        $id = trim(I('id', '', int));
        if (IS_POST) {
            $title = trim(I('title'));
            $content = trim(I('content'));
            $mid = $this->userInfo['mid'];
//            $file = I('file[]');
//            $this->ajaxReturn($file);die;
            $data = array(
                'q_mid' => $mid,
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

            if($res) {
                $this->ajaxReturn(array('state' => 1100, 'message' => '添加成功'));
            } else {
                $this->ajaxReturn(array('state' => 1102, 'message' => '添加失败'));
            }
        } else {
            $this->assign("id", $id);
            $this->view('QuestionAnswer/addQuestions', 2);
        }

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
        $this->questions->statusUpdate($data, $where);

        $this->ajaxReturn(array('state' => 1100, 'message' => '更新成功'));

    }



}