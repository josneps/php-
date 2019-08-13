<?php

namespace Home\Controller;

use think\Db;


/**
 * Class IntegralController
 * @package Home\Controller
 * User: Administrator
 * Date: 2019/8/13
 * Time: 16:26
 */
class IntegralController extends BaseController
{
    /**
     * @todo: 设计师积分列表
     * @author： friker
     * User: Administrator
     * Date: 2019/8/13
     * Time: 16:26
     */
    public function index()
    {
        //当前页和每页显示的个数
        $nowPage = I('page',1,'int');
        $pageSize = 2;
        $where = '';
        if ($userInfo = session('userInfo')){
            $where .= "a_mid = '".$userInfo['mid']."'";
        }
        $count = M('designer_integral')->where($where)->count();

        $data = M('designer_integral')->where($where)->order('created_at desc')->limit(($nowPage-1)*$pageSize,$pageSize)->select();

        $Page = new \Org\Util\PageNewThd($count,I('get.'),$pageSize,$nowPage);// 实例化分页类 传入总记录数和每页显示的记录数
        // 分页显示输出
        $show = $Page->shownew();

        $this->assign('total', $count);
        $this->assign('page', $show);
        $this->assign('list', $data);

    }
}