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
        //当前页和每页显示的个数
        $nowPage = I('page',1,'int');
        $pageSize = 40;

        //积分
        $sum = M('answer_adopt_num as a')->field('integral')->where($user_where)->find();

        //解答的题的个数
        $answer_num = M('designer_answer as a')
            ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
            ->where($user_where)
            ->order("a.created_at desc")
            ->count();
        //被采纳的个数
        $integral_num = M('designer_answer as a')
            ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
            ->where("a.a_mid = '".$this->userInfo['mid']."' AND a.a_status = 3")
            ->order("a.created_at desc")
            ->count();

        //判断是否获取被采纳的
        if($status == '') {
            //没有被采纳的
            $answer_data = M('designer_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->where($user_where)
                ->group("a.a_questions_id")
                ->order("a.created_at desc")
                ->limit(($nowPage-1)*$pageSize,$pageSize)
                ->select();

            $count = M('designer_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->where($user_where)
                ->order("a.created_at desc")
                ->count();

        } elseif ($status == 3) {
            //已被采纳的
            $answer_data = M('designer_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->where("a.a_mid = '".$this->userInfo['mid']."' AND a.a_status = 3")
                ->group("a.a_questions_id")
                ->order("a.created_at desc")
                ->limit(($nowPage-1)*$pageSize,$pageSize)
                ->select();

            $count = M('designer_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->where("a.a_mid = '".$this->userInfo['mid']."' AND a.a_status = 3")
                ->order("a.created_at desc")
                ->count();

        } else {
            $user_where .= ' AND a.status != 1';
            //邀请设计师回答信息
            $answer_data = M('invitation_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->where($user_where)
                ->order("a.created_at desc")
                ->limit(($nowPage-1)*$pageSize,$pageSize)
                ->select();

            $count = M('invitation_answer as a')
                ->join("user_questions u on a.a_questions_id = u.q_id", 'left')
                ->where($user_where)
                ->order("a.created_at desc")
                ->count();
            $answer_num = $count;
        }

        //分页
        $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数
        // 分页显示输出
        $show = $Page->shownew();

        $this->assign('integral_num', $integral_num);
        $this->assign("answer_num", $answer_num);
        $this->assign("answer_data", $answer_data);
        $this->assign("status", $status);
        $this->assign('userinfo', $this->userInfo);
        $this->assign('page', $show);
        $this->assign('sun', $sum);

        $this->view('QuestionAnswer/index', 3);
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
            Db::startTrans();
            try {
                $questions_id = I('questions_id');
                $content = I('content');
                $ids = I('ids', '');

                //判断当前回答是否有邀请
                if(M('invitation_answer')->where("a_questions_id = $questions_id AND a_mid = '".$this->userInfo['mid']."'")->find()) {
                    M('invitation_answer')->where("a_questions_id = $questions_id AND a_mid = '".$this->userInfo['mid']."'")->save(['status' => 1]);
                }

                //设计师修改解答
                if($ids != ''){
                    $data = [
                        'a_answer' => $content,
                        'upd_num' => 1,
                        'updated_at' => date('Y-m-d H:i:s', time())
                    ];
                    M('designer_answer')->where("a_id = $ids")->save($data);
                    Db::commit();
                    $this->ajaxReturn(array('state' => 1100, 'message' => '解答成功'));
                }

                //组合解答表的数据
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

                //检查是否解答过这道题
                $is = M('designer_answer')->where("a_questions_id = $questions_id AND a_mid = '".$this->userInfo['mid']."'")->find();

                //添加解答表
                M('designer_answer')->add($data);

                //获取解答个数
                $q_answer_num = M('user_questions')->where("q_id = $questions_id")->find();
                $q_num = $q_answer_num['q_answer_num'] + 1;

                //修改业主提问的状态（已解答）
                M('user_questions')->where("q_id = $questions_id")->save(['q_status' => 3]);
                M('user_questions')->where("q_id = $questions_id")->save(['q_answer_num' => $q_num]);

                //不是第一次解答这道题，可以解答，但是没积分
                if($is) {
                    $integral_data = array(
                        'a_mid' => $data['a_mid'],
                        'a_questions_id' => $data['a_questions_id'],
                        'status' => 1
                    );
                    $num_data = M('answer_adopt_num')->where("a_mid = '$id'")->find();
                    $arr = array(
                        'answer' => $num_data['answer'] + 1,
                        'updated_at' => date('Y-m-d H:i:s', time())
                    );
                    M('answer_adopt_num')->where("a_mid = '$id'")->save($arr);
                    Db::commit();
                    $this->ajaxReturn(array('state' => 1100, 'message' => '解答成功'));
                }

                // 获得一定的积分
                $integral_data = array(
                    'a_mid' => $data['a_mid'],
                    'a_questions_id' => $data['a_questions_id'],
                    'status' => 1
                );
                // 检查是否解答过这道题
                if(!M('designer_integral')->where($integral_data)->find()){
                    $integral_data['number'] = 3;
                    $integral_data['created_at'] = date('Y-m-d H:i:s', time());
                    M('designer_integral')->add($integral_data);

                    //同步更新解答记录表 & 积分
                    $num_data = M('answer_adopt_num')->where("a_mid = '$id'")->find();
                    if($num_data){
                        //有过解答记录
                        $arr = array(
                            'answer' => $num_data['answer'] + 1,
                            'integral' => $num_data['integral'] + 3,
                            'updated_at' => date('Y-m-d H:i:s', time())
                        );
                        M('answer_adopt_num')->where("a_mid = '$id'")->save($arr);
                    } else {
                        //第一次解答
                        $arr = array(
                            'a_mid' => $id,
                            'answer' => 1,
                            'integral' => 3,
                            'created_at' => date('Y-m-d H:i:s', time()),
                            'updated_at' => date('Y-m-d H:i:s', time())
                        );
                        M('answer_adopt_num')->add($arr);

                    }

                    //获取问题信息
                    $questions_data = M('user_questions')->where("q_id = $questions_id")->find();
                    //同步到消息表
                    $evaluate_data                    = array();
                    $evaluate_data['receive_mid']     = $questions_data['q_mid'];    //业主mid
                    $evaluate_data['receive_type']    = 0;                           //0
                    $evaluate_data['evaluate_mid']    = $this->userInfo['mid'];      //设计师mid
                    $evaluate_data['evaluate_type']   = 1;                           //1
                    $evaluate_data['evaluation_type'] = 3;                           //解答状态为3
                    $evaluate_data['type']            = 4;                           //设计师解答
                    $evaluate_data['designer_no']     = '';                          //
                    $evaluate_data['evaluate_no']     = $questions_data['q_id'];     //问题唯一标识
                    $evaluate_data['title']           = $questions_data['q_title'];  //问题标题
                    $evaluate_data['content']         = $content;                    //解答的内容
                    $evaluate_data['reply_comment']   = '';
                    $evaluate_data['create_time']     = date('Y-m-d H:i:s');
                    $evaluate_data['update_time']     = date('Y-m-d H:i:s');
                    //入库
                    M('evaluate_msg')->add($evaluate_data);
                }

                Db::commit();
                $this->ajaxReturn(array('state' => 1100, 'message' => '解答成功'));
            } catch(\Exception $e) {
                Db::rollback();
                $this->ajaxReturn(array('state' => 1102, 'message' => '解答失败'));
            }


        } else {
            $this->assign("id", $id);
            $this->view('QuestionAnswer/addAnswer', 2);
        }

    }


    /**
     * @todo: 更新设计师的解答的状态 & 业主采纳了设计师的解答
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

        Db::startTrans();
        try {
            //接id
            $id = trim(I('a_id'));
            $status = 3;
            $where = array('a_id' => $id);
            $data = array(
                'a_status' => $status,
                'updated_at' => date('Y-m-d H:i:s', time())
            );

            //更改解答表状态
            M('designer_answer')->where($where)->save($data);

            //获取问题id
            $q_id = M('designer_answer')->where($where)->field('a_questions_id')->find();
            $data = array(
                'q_status' => 4,
                'updated_at' => date('Y-m-d H:i:s', time())
            );

            //更改问题表状态
            M('user_questions')->where("q_id = ".$q_id['a_questions_id'])->save($data);

            $res = M('designer_answer')->where($where)->find();

            // 获得一定的积分
            $integral_data = array(
                'a_mid' => $res['a_mid'],
                'a_questions_id' => $res['a_questions_id'],
                'status' => 2
            );

            // 检查是否解答过这道题
            if(!M('designer_integral')->where($integral_data)->find()){
                $integral_data['number'] = 10;
                $integral_data['created_at'] = date('Y-m-d H:i:s', time());
                M('designer_integral')->add($integral_data);

                //同步更新解答记录表 & 积分
                $num_data = M('answer_adopt_num')->where("a_mid = '".$res['a_mid']."'")->find();
                if($num_data){
                    //有过记录
                    $arr = array(
                        'answer' => $num_data['answer'] + 1,
                        'integral' => $num_data['integral'] + 10,
                        'updated_at' => date('Y-m-d H:i:s', time())
                    );
                    M('answer_adopt_num')->where("a_mid = '".$res['a_mid']."'")->save($arr);
                } else {
                    //第一次记录
                    $arr = array(
                        'a_mid' => $res['a_mid'],
                        'answer' => 1,
                        'integral' => 10,
                        'created_at' => date('Y-m-d H:i:s', time()),
                        'updated_at' => date('Y-m-d H:i:s', time())
                    );
                    M('answer_adopt_num')->add($arr);
                }
            }

            //获取问题信息
            $questions_data = M('user_questions')->where("q_id = ".$q_id['a_questions_id'])->find();

            //同步到消息表
            $evaluate_data                    = array();
            $evaluate_data['receive_mid']     = $res['a_mid'];               //设计师mid
            $evaluate_data['receive_type']    = 1;                           //1
            $evaluate_data['evaluate_mid']    = $questions_data['q_mid'];    //业主mid
            $evaluate_data['evaluate_type']   = 0;                           //0
            $evaluate_data['evaluation_type'] = 4;                           //解答状态为4
            $evaluate_data['type']            = 5;                           //业主采纳了解答
            $evaluate_data['designer_no']     = '';                          //
            $evaluate_data['evaluate_no']     = $questions_data['q_id'];     //问题唯一标识
            $evaluate_data['title']           = $questions_data['q_title'];  //
            $evaluate_data['content']         = $res['a_answer'];            //
            $evaluate_data['reply_comment']   = '';                          //
            $evaluate_data['create_time']     = date('Y-m-d H:i:s');
            $evaluate_data['update_time']     = date('Y-m-d H:i:s');
            M('evaluate_msg')->add($evaluate_data);

            Db::commit();
            $this->ajaxReturn(array('state' => 1100, 'message' => '采纳成功'));
        } catch(\Exception $e) {
            Db::rollback();
            $this->ajaxReturn(array('state' => 1102, 'message' => '采纳失败'));
        }
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
        // 判断是否是ajax请求
        if (!IS_AJAX) {
            $this->ajaxReturn(array('state' => 1102, 'message' => '非法请求！'));
        }

        //判断是否登录
        if(!$this->userInfo['mid']) {
            $this->ajaxReturn(array('state' => 1102, 'message' => '亲，要先登录哦…'));
        }

        //接值
        $a_id = trim(I('id'));    //解答自增id

        //获取一条解答的数据
        $answer_data = M("designer_answer")->where("a_id = $a_id")->find();

        //获取问题的标题内容
        $questions_data = M('user_questions')->where("q_id = ".$answer_data['a_questions_id'])->find();

        //条件
        $where['answer_id'] = $a_id;
        $where['user_ip'] = getIP();
        $where['a_questions_id'] = $answer_data['a_questions_id'];
        $where['a_mid'] = $answer_data['a_mid'];
        $num = $answer_data['satisfied'] + 1;

        //查询日志表有没有记录
        $data = M('satisfied')->where($where)->find();
        if(!$data) {
            //没有过记录
            $where['status'] = 1;
            $where['created_at'] = date('Y-m-d H:i:s', time());

            M("satisfied")->add($where);
            //修改解答表中的记录数
            M("designer_answer")->where("a_id = $a_id")->save(["satisfied" => $num]);

            $data                 = [];
            $ip                   = get_client_ip();
            $data['mid']          = $this->userInfo['mid'];                 //当前登录者的mid
            $data['user_no']      = '';
            $data['user_type']    = 0;
            $data['creat_time']   = date("Y-m-d H:i:s", time());
            $data['uptype']       = 5;
            $data['ip']           = $ip;
            $data['praiseid_no']  = $answer_data['a_questions_id'];
            $data['title']        = $questions_data['q_title'];
            $data['receive_mid']  = $answer_data['a_mid'];                  //设计师mid
            $data['receive_type'] = 1;  //方案的被点赞人类型只能是设计师
            $res                  = M('thumbs_up_log')->data($data)->add();

            //返回提示
            $this->ajaxReturn(array('state' => 1100, 'message' => '满意+1'));
        } else {
            //已经点击过了
            $this->ajaxReturn(array('state' => 1102, 'message' => '点一次就好了，不可贪心哦'));
        }

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
        // 判断是否是ajax请求
        if (!IS_AJAX) {
            $this->ajaxReturn(array('state' => 1102, 'message' => '非法请求！'));
        }

        //判断是否登录
        if(!$this->userInfo['mid']) {
            $this->ajaxReturn(array('state' => 1102, 'message' => '亲，要先登录哦…'));
        }

        //接值
        $a_id = trim(I('id'));    //解答自增id

        //获取一条解答的数据
        $answer_data = M("designer_answer")->where("a_id = $a_id")->find();

        //条件
        $where['answer_id'] = $a_id;
        $where['user_ip'] = getIP();
        $where['a_questions_id'] = $answer_data['a_questions_id'];
        $where['a_mid'] = $answer_data['a_mid'];
        $num = $answer_data['no_satisfied'] + 1;

        //查询日志表有没有记录
        $data = M('satisfied')->where($where)->find();
        if(!$data) {
            //没有过记录
            $where['status'] = 2;
            $where['created_at'] = date('Y-m-d H:i:s', time());
            M("satisfied")->add($where);
            //修改解答表中的记录数
            M("designer_answer")->where("a_id = $a_id")->save(["no_satisfied" => $num]);

            //返回提示
            $this->ajaxReturn(array('state' => 1100, 'message' => '不满意+1'));
        } else {
            //已经点击过了
            $this->ajaxReturn(array('state' => 1102, 'message' => '点一次就好了，不可贪心哦'));
        }

    }

    /**
     * @todo: 设计师积分列表
     * @author： friker
     * User: Administrator
     * Date: 2019/8/20
     * Time: 18:38
     */
    public function integral()
    {
        // 设计师mid
        $mid = $this->userInfo['mid'];

        //当前页和每页显示的个数
        $nowPage = I('page',1,'int');
        $pageSize = 50;

        //总条数
        $count = M('designer_integral')->where("a_mid = '$mid'")->count();

        //获取积分
        $data = M('designer_integral d')->join("user_questions as u on d.a_questions_id = u.q_id", 'left')->field("d.*, u.q_title")->where("d.a_mid = '$mid'")->order("created_at desc")->limit(($nowPage-1)*$pageSize,$pageSize)->select();
        $sum = M('answer_adopt_num')->field('integral, consumption_integral')->where("a_mid = '$mid'")->find();

        //分页
        $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数

        // 分页显示输出
        $show = $Page->shownew();

        $this->assign('sum', $sum);
        $this->assign('data', $data);
        $this->assign('page', $show);

        $this->view('QuestionAnswer/integral', 3);
    }


    /**
     * @todo: 积分兑换
     * @author： friker
     * User: Administrator
     * Date: 2019/8/21
     * Time: 10:46
     */
    public function integralExchange()
    {
        $arr = array(
            ['dian' => 10, 'fen' => 200],
            ['dian' => 20, 'fen' => 350],
            ['dian' => 30, 'fen' => 480],
        );

        if(IS_AJAX){
            $key = I('key');
            $fen_data = $arr[$key];

            Db::startTrans();
            try {

                // 获取积分总数
                $jifen = M('answer_adopt_num')->where("a_mid = '".$this->userInfo['mid']."'")->getField('integral');
                $consumption_integral = M('answer_adopt_num')->where("a_mid = '".$this->userInfo['mid']."'")->getField('consumption_integral');

                if($fen_data['fen'] > $jifen){
                    $this->ajaxReturn(array('state' => 1102, 'message' => '积分还差那么一丢丢…'));
                }
                // 计算积分并修改入库
                $integral = $jifen - $fen_data['fen'];
                $consumption_integral += $fen_data['fen'];
                M('answer_adopt_num')->where("a_mid = '".$this->userInfo['mid']."'")->save(['integral' => $integral, 'consumption_integral' => $consumption_integral]);

                //积分消费记录 入库
                $arr = array(
                    'a_mid' => $this->userInfo['mid'],
                    'status' => 3,
                    'details' => "兑换".$fen_data['dian']."渲染点扣除".$fen_data['fen']."积分",
                    'number' => $fen_data['fen'],
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time())
                );

                M('designer_integral')->add($arr);


                //获取设计师编号
                $designer_no = M('user_designer')->where("mid = '".$this->userInfo['mid']."'")->getField('designer_no');

                //获取渲染卡信息
                $card_info = $this->getFarmcard($fen_data['dian'], $type = 4);

                //生成新的渲染小卡
                $str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
                str_shuffle($str);
                $create_time = date('Y-m-d H:i:s');
                $card_no = substr(date('Ymd'),2).($card_info['discern']).(10000+$card_info['already_create']);
                $password=substr(str_shuffle($str),26,12);

                //组合数据 & 入库
                $setData = array();
                $setData['farmcard_id'] = $card_info['id'];                     //渲染卡id
                $setData['card_no'] = $card_no;
                $setData['password'] = Encrypt($password);
                $setData['password_md5'] = md5($card_info['id'].$password);
                $setData['card_num'] =  $card_info['card_num'] ;
                $setData['surplus_num'] = $card_info['card_num'] ;
                $setData['create_time'] = $create_time;
                //渲染卡关联设计师信息
                $setData['status'] = 1;
                $setData['activate'] = $create_time;
                $setData['designer_no'] = $designer_no;
                $setData['validity'] = date("Y-m-d",strtotime($create_time ."  +".$card_info['validity_days']."   day"));
                $setData['activate_type'] = 0;
                $setData['activate_uid'] = 0;
                $setData['activate_remark'] = '';
                $setData['audit_time'] = $create_time;

                M('win_farmcard_info')->add($setData);

                //兑换成功后积分卡减一
                $card_info['already_create'] = $card_info['already_create'] + 1;
                M('win_farmcard')->where("card_num = ".$fen_data['dian']." AND card_type = 4")->save($card_info);

                Db::commit();
                $this->ajaxReturn(array('state' => 1100, 'message' => '兑换成功'));
            } catch(\Exception $e) {
                Db::rollback();
                $this->ajaxReturn(array('state' => 1102, 'message' => '兑换失败'));
            }
        }
        $sum = M('answer_adopt_num')->field('integral, consumption_integral')->where("a_mid = '".$this->userInfo['mid']."'")->find();

        $this->assign('sum', $sum);
        $this->assign('arr', $arr);

        $this->view('QuestionAnswer/integralExchange', 3);
    }

    public function invitation () {
        // 判断是否是ajax请求
        if (!IS_AJAX) {
            $this->ajaxReturn(array('state' => 1102, 'message' => '非法请求！'));
        }

        //接收设计师mid & 问题id
        $mid = I('mid');
        $a_questions_id = I('a_questions_id');

        //组合条件
        $where = array(
            'a_mid' => $mid,
            'a_questions_id' => $a_questions_id
        );

        //检查是否存在
        if(!M('invitation_answer')->where($where)->count()) {
            $where['status'] = 0;
            $where['created_at'] = date('Y-m-d H:i:s', time());
            $where['updated_at'] = date('Y-m-d H:i:s', time());
            M('invitation_answer')->add($where);
            $this->ajaxReturn(array('state' => 1100, 'message' => '邀请成功'));
        }

        $this->ajaxReturn(array('state' => 1102, 'message' => '邀请失败'));
    }

    public function getFarmcard($num, $type)
    {
        $id = M('win_farmcard')->where("card_num = $num AND card_type = $type")->find();

        return $id;
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
            $count = $this->questions->where($user_where)->order('created_at desc')->count();
        } else {
            //按照不同的状态进行搜索
            switch ($status){
                case 1 :
                    //待解答
                    $user_where .= " AND q_status != 3 AND q_status != 4";
                    break;
                case 2:
                    //已解答
                    $user_where .= "AND q_status = 3";
                    break;
                case 3:
                    //已采纳
                    $user_where .= "AND q_status = 4";
                    break;
            }
            //获取数据
            $data = $this->questions->where($user_where)->order('created_at desc')->limit(($nowPage-1)*$pageSize,$pageSize)->select();
            $count = $this->questions->where($user_where)->order('created_at desc')->count();

        }

        //分页
        $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数

        // 分页显示输出
        $show = $Page->shownew();
        $is_show = false;
        if ($count == 0){
            $is_show = true;
        }

        $this->assign('status',$status);
        $this->assign('data', $data);
        $this->assign('page', $show);
        $this->assign('is_show', $is_show);


        $this->view('QuestionAnswer/lists', 3);
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
        //设置路由:普通模式
        C('URL_MODEL','0');

        $id = trim(I('id', '', int));
        if (IS_POST) {
            $pic = array();
            //原图片处理
            $last_src = $_POST['last_src'];
            $last_src = json_decode($last_src,true);
            if(!empty($last_src)){
                foreach ($last_src as $k =>$v){
                    array_push($pic,str_replace(C('PIC_URL').'/','',$v));
                }
            }
            //图片
            $upPics = $this->lotUploadQiniu($_FILES);

            //新图片
            foreach ($upPics as $k =>$v){
                array_push($pic,$v['name']);
            }

            $pic = base64_encode(json_encode($pic));
            $title = I('title');
            $content = I('content');
            $village = I('building_no');
            $mid = $this->userInfo['mid'];

            $data = array(
                'q_mid' => $mid,
                'q_nickname' => $this->userInfo['nickname'],
                'q_pic' => $this->userInfo['pic'],
                'q_title' => $title,
                'q_title_content' => $content,
                'q_img' => $pic,
                'village' => $village,
                'q_access_device' => 1,
                'q_status' => 1,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            );

            if($id == ''){
                //添加
                $res = $this->questions->creates($data);
                if($res) {
                    $this->ajaxReturn(array('state' => 1100, 'message' => '发布成功'));
                } else {
                    $this->ajaxReturn(array('state' => 1102, 'message' => '发布失败'));
                }
            } else {
                //修改
                $res = $this->questions->where("q_id = $id")->save($data);
                if($res) {
                    $this->ajaxReturn(array('state' => 1100, 'message' => '修改成功'));
                } else {
                    $this->ajaxReturn(array('state' => 1102, 'message' => '修改失败'));
                }
            }

        } else {
            if($id != ''){
                //获取数据
                $questions_data = $this->questions->where("q_id = $id")->find();

                $img = json_decode(base64_decode($questions_data['q_img']),true);

                foreach ($img as $k => $val) {
                    $val = explode('?',$val);
                    $img[$k] = C('PIC_URL').'/'.$val[0].'@dbw800';
                }

                $this->assign('questions_data', $questions_data);
                $this->assign("id", $id);
                $this->assign("img", $img);
            }

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

    /**
     * @todo: 上传图片到七牛云
     * @author： friker
     * User: Administrator
     * Date: 2019/8/20
     * Time: 16:49
     * @param $files
     * @return array|bool
     */

    public function lotUploadQiniu($files)
    {
        $exts = array('bmp','jpg', 'tif','tiff','gif', 'png', 'jpeg','xls','xlsx','dwg','dxf','hom','zip','txt','max','3ds','obj','fbx');
        if (!empty($files)) {
            //图片上传设置
            $config = array(
                'maxSize'    =>    30*1024*1024, //设置附件上传大小  30MB = 31457280;
                'savePath'   =>    '',
                'saveName'   =>    array('uniqid',''),//
                'exts'       =>    $exts,
                'autoSub'    =>    false,
                'subName'    =>    '',//保存后缀,
            );
            $driverConfig = array (
                'accessKey' => C('PIC_AK'),
                'secretKey' => C('PIC_SK'),
                'domain' => C('PIC_DOMAIN'),
                'bucket' => C('PIC_BUCKET'),
            );
            $Upload = new \Think\Upload($config,'Qiniu',$driverConfig);
            $return_img = $Upload->upload($files);
            //判断是否有图
            if($return_img){
                return $return_img;
            }else{
                exit(json_encode(array('state'=>1200,'message'=>$Upload->getError())));
            }
        }
    }

}