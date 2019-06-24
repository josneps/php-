<?php
/**
 * Created by PhpStorm.
 * User: ľ
 * Date: 2018/8/13
 * Time: 9:20
 */
namespace Api\Controller;

use Common\Service\ControllerService;

class BaseController extends ControllerService
{

    public function _initialize() {
        parent::_initialize();
    }

    /**
     * 检查Token
     * @return int
     * User: hongwei.bai baihongweiaaa@163.com
     * Date: 2018/8/13 9:56
     */
    final protected function checkToken() {
         $token = $_REQUEST['token'];
         if (empty($token)) {
             return 0;
         }
         $w['token'] = $token;
         $w['expired_time'] = array('egt', time());
         $w['status'] = array('neq', 0);
         $m_id = D('Member')->queryField($w,'id'); //var_dump($m_id);die;
         if($m_id){
             $this->userId = $m_id;
             return $m_id;
         }else{
             $this->apiResponse('-1','登录失效，请重新登录');
         }
     }
    /**
     * 生成token
     */
    public function createToken(){
        $arr['token'] = md5(time().rand(10000,99999));
        $arr['expired_time'] = time()+86400*7;
        return $arr;
    }

    /**
     * 检查推荐码方案
     * invite_code 邀请码
     * User: hongwei.bai baihongweiaaa@163.com
     * Date: 2018/8/13 9:56
     */
    public function checkShareCodeBefore($invite_code) {
        $m_info = D('Member')->queryField(array('invite_code'=>$invite_code),'id');
        if (!$m_info) {
            $this->apiResponse('0','推荐码不存在');
        }
        return $m_info;
    }
    /**
     * 推广码绑定
     * invite_code 邀请码 h_id 填写邀请码的用户ID
     * User: hongwei.bai baihongweiaaa@163.com
     * Date: 2018/8/13 9:56
     */
    public function checkShareCode($invite_code='',$h_id = 0){

        $m_info = D('Member')->queryRow(array('invite_code'=>$invite_code),'p_id,id');
        if($m_info['p_id'] != 0) {
            $this->apiResponse(0,'您已经绑定过推荐人了，请不要填写推荐码');
        }
        if($m_info['id']==$h_id){
            $this->apiResponse(0,'您不能推荐您自己');
        }
        $data = array(
            'p_id'=>$h_id
        );
        D('Member')->querySave(array('id'=>$m_info['id']),$data);

    }
    /**
     * 编辑器内图片补全路径
     * @param $content
     * @return mixed|string
     * User: hongwei.bai baihongweiaaa@163.com
     * Date: 2018/9/4 13:48
     */
    public function setAbsoluteUrl($content){
        $content = htmlspecialchars_decode($content);
        $content=  str_replace('img src="','img src = "'.C('API_URL'),$content);
        return $content ?: '';
    }

}