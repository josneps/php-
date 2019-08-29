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
        $this->initPowerCheckView();

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
        //设置路由:普通模式
        $this->initSearchTop(7);

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

        //获取数据  查问题
//        $subQuery = M('user_questions as u')
//            ->join('designer_answer as d on u.q_id = d.a_questions_id', 'left')
//            ->field('u.*, d.a_id, d.a_questions_id, d.a_mid, d.a_nickname, d.a_pic, d.a_answer, d.a_status, d.satisfied ')
//            ->order('d.created_at desc')
//            ->buildSql();
        $data = M('user_questions as u')->where($where)->order("created_at desc")->limit(($nowPage-1)*$pageSize,$pageSize)->select();

        if($data){
            //循环取出问题id存入数组
            foreach ($data as $v) {
                if($v['q_status'] == 4) {
                    //已采纳的id
                    $adopted_id[] = $v['q_id'];
                } else {
                    //未采纳的id
                    $no_adopted_id[] = $v['q_id'];
                }
                $ids[] = $v['q_id'];
            }

            //将数组分割成字符串
            $adopted_ids = implode(",", $adopted_id);
            $no_adopted_ids = implode(",", $no_adopted_id);
            $ids = implode(",", $ids);

            //已采纳的解答信息
            $adopted_data = M('designer_answer')->where('a_questions_id in ('.$adopted_ids.') ANd a_status = 3')->select();

            //未采纳的解答信息
            $no_adopted_data = M('designer_answer')->where('a_questions_id in ('.$no_adopted_ids.')')->order('created_at desc')->select();

            foreach ($adopted_data as $key => $val) {
                $mid[] = $val['a_mid'];
            }

            foreach ($no_adopted_data as $key => $val) {
                $mid[] = $val['a_mid'];
            }

            $mids = $this->strImplode($mid);

            //设计师属于哪个公司机构
            $designer = M('user_designer')->field('mid, agencies_name')->where("mid in (".$mids.")")->select();

            //获取设计师编号
            $designer_data = M('user_designer')->where("mid in (".$mids.")")->getField('mid, designer_no');

            //统计解答人数
            $num = M('designer_answer')->field('count(a_id) as num, a_questions_id')->where('a_questions_id in ('.$ids.')')->group('a_questions_id')->order('created_at desc')->select();

            //搜索内容标红&数据组合
            foreach ($data as $key => $value) {
                //初始化浏览次数0
                $data[$key]['look_num'] = 0;
                //浏览数量
                foreach ($num as $k => $v) {
                    if($value['q_id'] == $v['a_questions_id']) {
                        $data[$key]['look_num'] = $v['num'];
                    }
                }

                //已采纳的信息组合
                if ($adopted_data){
                    foreach ($adopted_data as $k => $v) {
                        if($value['q_id'] == $v['a_questions_id']) {
                            $data[$key]['a_id'] = $v['a_id'];
                            $data[$key]['a_questions_id'] = $v['a_questions_id'];
                            $data[$key]['a_mid'] = $v['a_mid'];
                            $data[$key]['a_nickname'] = $v['a_nickname'];
                            $data[$key]['a_pic'] = $v['a_pic'] ? C('PIC_URl').'/'.$v['a_pic'] : '__PUBLIC__/img/avatar.png' ;
                            $data[$key]['a_answer'] = $v['a_answer'];
                            $data[$key]['a_img'] = $v['a_img'];
                            $data[$key]['a_access_device'] = $v['a_access_device'];
                            $data[$key]['a_status'] = $v['a_status'];
                            $data[$key]['satisfied'] = $v['satisfied'];
                            $data[$key]['no_satisfied'] = $v['no_satisfied'];
                            $data[$key]['designer_no'] = $designer_data[$v['a_mid']];
                            $data[$key]['a_del'] = $v['a_del'];
                            $data[$key]['created_at'] = $v['created_at'];
                            $data[$key]['updated_at'] = $v['updated_at'];
                        }
                    }
                }

                //未采纳的信息组合
                if ($no_adopted_data){
                    foreach ($no_adopted_data as $k => $v) {
                        if($value['q_id'] == $v['a_questions_id']) {
                            $data[$key]['a_id'] = $v['a_id'];
                            $data[$key]['a_questions_id'] = $v['a_questions_id'];
                            $data[$key]['a_mid'] = $v['a_mid'];
                            $data[$key]['a_nickname'] = $v['a_nickname'];
                            $data[$key]['a_pic'] = $v['a_pic'] ? C('PIC_URl').'/'.$v['a_pic'] : '__PUBLIC__/img/avatar.png' ;
                            $data[$key]['a_answer'] = $v['a_answer'];
                            $data[$key]['a_img'] = $v['a_img'];
                            $data[$key]['a_access_device'] = $v['a_access_device'];
                            $data[$key]['a_status'] = $v['a_status'];
                            $data[$key]['satisfied'] = $v['satisfied'];
                            $data[$key]['no_satisfied'] = $v['no_satisfied'];
                            $data[$key]['designer_no'] = $designer_data[$v['a_mid']];
                            $data[$key]['a_del'] = $v['a_del'];
                            $data[$key]['created_at'] = $v['created_at'];
                            $data[$key]['updated_at'] = $v['updated_at'];
                        }
                    }
                }

                $data[$key]['created_at'] = $this->time_trans($value['created_at']);
                $data[$key]['q_title'] = str_replace($title,"<font color='red'>".$title."</font>",$value['q_title']);
                $data[$key]['q_title_content'] = str_replace($title,"<font color='red'>".$title."</font>",$value['q_title_content']);
            }

            $type = 3;
            //是否登录
            if(!empty($this->userInfo)){
                $userInfo['pic'] = $this->userInfo['pic'];
                $userInfo['nickname'] = $this->userInfo['nickname'];
                $userInfo['type'] = $this->userInfo['type'];
                if($this->userInfo['type'] == 0) {
                    //业主
                    $type = 2;
                    $userInfo['questions_num'] = M('user_questions')->where("q_mid = '".$this->userInfo['mid']."'")->count();  // 提问个数
                    $userInfo['adopt_num'] = M('user_questions as u')->join('designer_answer d on u.q_id = d.a_questions_id')->where("d.a_status = 3 AND u.q_mid = '".$this->userInfo['mid']."'")->count();   // 采纳个数
                } elseif ($this->userInfo['type'] == 1) {
                    //设计师
                    $type = 1;
                    $userInfo['agencies_name'] = M('user_designer')->field('agencies_name')->where("mid = '".$this->userInfo['mid']."'")->find();
                    //设计师的解答 & 被采纳个数
//                    $answerAdopt = M('answer_adopt_num')->field('a_mid mid, answer, adopt')->where("a_mid in (".$mids.")")->select();
                    $userInfo['questions_num'] = M('answer_adopt_num')->where("a_mid = '".$this->userInfo['mid']."'")->getField('answer');  // 解答个数
                    $userInfo['adopt_num'] = M('answer_adopt_num')->where("a_mid ='".$this->userInfo['mid']."'")->getField('adopt');   // 采纳个数
                }
            }

            foreach ($data as $key => $val) {
                //设计师所属机构
                foreach ($designer as $k => $v) {
                    if($val['a_mid'] == $v['mid']) {
                        $data[$key]['agencies_name'] = $v['agencies_name'];
                    }
                }
            }

            //分页
            $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数
            // 分页显示输出
            $show = $Page->shownew();

            $this->assign('page', $show);
            $this->assign('list', $data);

        }

        $this->assign('title', $title);
        $this->assign('total', $count);
        $this->assign('count', $count);
        $this->assign('userinfo', $userInfo);
        $this->assign('type', $type);               //判断是否登录

        if (IS_AJAX) {
            $this->ajaxReturn(array('state' => 1100, 'message' => $data, 'count' => $count));
        }elseif (empty($title)) {
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
        //设置路由:普通模式
        $this->initSearchTop(7);

        //是否有过采纳
        $caina = true;
        //接收id
        $id = trim(I('id'));
        $where = "q_id = $id";
        //获取问题
        $detail_data = $this->questions->where($where)->find();

        //是否要显示随机设计师
        $is_wen = false;
        if($detail_data['q_status'] == 1 || $detail_data['q_status'] == 2) {
            $is_wen = true;
        }
        $this->assign('is_wen', $is_wen);

        //当前页和每页显示的个数
        $nowPage = I('page',1,'int');
        $pageSize = 5;

        /********************************** 业主提问img素材 **************************************/

        $img = json_decode(base64_decode($detail_data['q_img']),true);

        foreach ($img as $k => $val) {
            $val = explode('?',$val);
            $img[$k] = C('PIC_URL').'/'.$val[0].'@dbw800';
        }
        $this->assign('img', $img);

        /********************************** 随机获取设计师 **************************************/
        
        //过滤已经邀请过的
        $mid_data = M('invitation_answer')->field('a_mid')->where("a_questions_id = $id")->select();

        foreach ($mid_data as $key => $val) {
            $ids[] = $val['a_mid'];
        }

        $mids = $this->strImplode($ids);

        $designer_data = M('user as u')
            ->field('d.nickname, u.mid, u.pic, u.login_time, d.nickname_type, d.real_name, d.designer_no')
            ->join("user_designer as d on u.mid = d.mid", 'right')
            ->where("u.type = 1 AND u.mid not in (".$mids.") AND d.type = 1 AND d.status = 2 AND d.account_type != 3")
            ->order("u.login_time desc")
            ->limit(6)
            ->select();

        //循环取出设计师mid存入数组
        foreach ($designer_data as $v) {
            $ids[] = $v['mid'];
        }
        $mids = $this->strImplode($ids);

        //设计师属于哪个公司机构
        $designer = M('user_designer')->where("mid in (".$mids.")")->getField('mid, agencies_name');

        //设计师的解答 & 被采纳个数
        $answerAdopt = M('answer_adopt_num')->where("a_mid in (".$mids.")")->getField('a_mid, answer, adopt');

        //组合设计师数据
        foreach ($designer_data as $key => $val) {
            $designer_data[$key]['nickname'] = $val['nickname_type'] ? $val['nickname'] : $val['real_name'];
            $designer_data[$key]['agencies_name'] = $designer[$val['mid']];
            $designer_data[$key]['pic'] = $val['pic'] ? C('PIC_URl').'/'.$val['pic'] : '__PUBLIC__/img/avatar.png' ;
            $designer_data[$key]['answer'] = $answerAdopt[$val['mid']]['answer'] ? $answerAdopt[$val['mid']]['answer'] : 0;
            $designer_data[$key]['adopt'] = $answerAdopt[$val['mid']]['adopt'] ? $answerAdopt[$val['mid']]['adopt'] : 0;
        }

        $this->assign("designer_data", $designer_data);

        /********************************** 获取解答 **************************************/

        // 获取一条已采纳的解答数据
        $answer_one = $this->answer->where("a_questions_id = $id AND a_status = 3")->order("created_at desc")->find();
        //当有采纳的时候才获取 解答 & 设计师信息
        if($answer_one) {
            //设计师属于哪个公司机构
            $designer_one = M('user_designer')->field('mid, agencies_name')->where("mid = '".$answer_one['a_mid']."'")->find();
            $answer_one['agencies_name'] = $designer_one['agencies_name'];

            //获取设计师编号
            $answer_one['designer_no'] = M('user_designer')->where("mid = '".$answer_one['a_mid']."'")->getField('designer_no');

            //获取已经收藏的设计师庭好编号
            $attention_designer_nos = $this->collection([$answer_one['designer_no']]);

            $answer_one['collect'] = in_array($answer_one['designer_no'], $attention_designer_nos) ? 1 : 0;

            //设计师的解答 & 被采纳个数
            $answerAdopt_one = M('answer_adopt_num')->field('a_mid mid, answer, adopt')->where("a_mid = '".$answer_one['a_mid']."'")->find();

            $answer_one['answer'] = $answerAdopt_one['answer'] ? $answerAdopt_one['answer'] : 0;
            $answer_one['adopt'] = $answerAdopt_one['adopt'] ? $answerAdopt_one['adopt'] : 0;
            $answer_one['a_pic'] = $answer_one['a_pic'] = $answer_one['a_pic'] ? C('PIC_URl').'/'.$answer_one['a_pic'] : '__PUBLIC__/img/avatar.png' ;

            $this->assign('answer_one', $answer_one);

            $caina = false;
        }

        if(IS_POST) {
            // 获取多条未采纳的解答数据

            $data = $this->answer->where("a_questions_id = $id AND a_status != 3")->order("created_at desc")->limit(($nowPage-1)*$pageSize,$pageSize)->select();

            $count = $this->answer->where("a_questions_id = $id AND a_status != 3")->order("created_at desc")->count();
            $this->assign('count', $count);

            //循环取出设计师mid存入数组
            foreach ($data as $v) {
                $ids[] = $v['a_mid'];
            }

            $mids = $this->strImplode($ids);

            //设计师属于哪个公司机构
            $designer = M('user_designer')->field('mid, agencies_name')->where("mid in (".$mids.")")->select();

            //获取设计师编号
            $designer_data = M('user_designer')->where("mid in (".$mids.")")->getField('mid, designer_no');

            //获取已经收藏的设计师庭好编号
            $attention_designer_nos = $this->collection($designer_data);

            //设计师的解答 & 被采纳个数
            $answerAdopt = M('answer_adopt_num')->field('a_mid mid, answer, adopt')->where("a_mid in (".$mids.")")->select();

            foreach ($data as $key => $val) {

                foreach ($designer as $k => $v) {
                    if($val['a_mid'] == $v['mid']) {
                        $data[$key]['agencies_name'] = $v['agencies_name'];
                        $data[$key]['designer_no'] = $designer_data[$v['mid']];
                    }
                }
                //初始化为0次
                $data[$key]['answer'] = 0;
                $data[$key]['adopt'] = 0;
                foreach ($answerAdopt as $k => $v) {
                    if($val['a_mid'] == $v['mid']) {
                        $data[$key]['answer'] = $v['answer'];
                        $data[$key]['adopt'] = $v['adopt'];
                    }
                }

                $data[$key]['collect'] = in_array($data[$key]['designer_no'], $attention_designer_nos) ? 1 : 0;
                $data[$key]['a_pic'] = $val['a_pic'] ? C('PIC_URl').'/'.$val['a_pic'] : '__PUBLIC__/img/avatar.png' ;
            }

            $this->assign("data", $data);
            $this->assign("caina", $caina);
            $this->assign("details_data", $detail_data);
            $this->assign("userinfo", $this->userInfo);

            $result['content'] = $this->fetch('askdesigner/details_list_content');
            die(json_encode($result));
        }

        /********************************** 统计浏览次数 **************************************/

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

        /********************************** 查看浏览日志表 **************************************/

        if(!M('look_number')->where($where)->find()){

            $where['created_at'] = date('Y-m-d H:i:s', time());
            M('look_number')->add($where);

            //记录多少人看过
            $detail_data['q_look_num'] += 1;
            M('user_questions')->where("q_id = $id")->save($detail_data);
        }

        /********************************** 其他回答条数 **************************************/

        $count = $this->answer->where("a_questions_id = $id AND a_status != 3")->order("created_at desc")->count();
        $this->assign('count', $count);

        $this->assign("details_data", $detail_data);
        $this->assign("userinfo", $this->userInfo);

        $this->view('askdesigner/details', 2);

    }

    /**
     * @todo: 获取收藏的设计师编号
     * @author： friker
     * User: Administrator
     * Date: 2019/8/28
     * Time: 9:32
     * @param $designer_data
     * @return array|mixed
     */
    public function collection($designer_data)
    {
        $designer_nos = array();
        foreach($designer_data as $val) {
            $designer_nos[] = $val;
        }

        //查询是否收藏
        $attention_designer_nos = array();
        if($this->mid) {
            $attention_designer_nos = M('attention_user')->where(array('mid' => $this->mid, 'status' => 1, 'professional_no' => array('in', $designer_nos)))->getField('professional_no', true);
        }

        return $attention_designer_nos;
    }

    /**
     * @todo: 获取答案回显
     * @author： friker
     * User: Administrator
     * Date: 2019/8/23
     * Time: 9:50
     */
    public function updAnswer()
    {
        //接收答案id
        $a_id = I('a_id');
        //获取答案
        $answer = M('designer_answer')->where("a_id = $a_id")->getField('a_answer');

        $this->ajaxReturn(array('state' => 1100, 'message' => $answer));
    }

    /**
     * @todo: 数组分割成字符串
     * @author： friker
     * User: Administrator
     * Date: 2019/8/26
     * Time: 18:31
     * @param $ids
     * @return string
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