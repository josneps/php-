<?php

namespace Home\Controller;

use think\Controller;
use think\Db;
// use Org\Util\PageThd;

/**
 * 设计师 & 业主 个人中心-问答模块
 * Class ClassName
 * @package Home\Controller
 * User: Administrator
 * Date: 2019/8/15
 * Time: 11:13
 */
class QuestionAnswerController extends Controller
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
        $res = $this->answer->statusUpdate($data, $where);

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
        $status = trim(I('status', 0, 'int'));

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
        $id = $this->userInfo['mid'];
        if (IS_POST) {
            $title = trim(I('title'));
            $content = trim(I('content'));
            $mid = trim(I('id'));
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
        $res = $this->questions->statusUpdate($data, $where);

        $this->ajaxReturn(array('state' => 1100, 'message' => '更新成功'));

    }



}