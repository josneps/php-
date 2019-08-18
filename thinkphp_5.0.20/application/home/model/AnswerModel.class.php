<?php

namespace Home\Model;

use Think\Model;
use think\Db;

/**
 * Class ClassName
 * @package Home\Model
 */
class AnswerModel extends Model
{
    protected $tableName = 'designer_answer';

    /**
     * @todo: 设计师对业主的问题的解答
     * @author： friker
     * User: Administrator
     * Date: 2019/8/13
     * Time: 9:24
     * @param array $data
     * @return bool
     */
    public function creates($data = array())
    {
        Db::startTrans();
        try {
            $this->add($data);
            // 获得一定的积分
            $integral_data = array(
                'a_mid' => $data['a_mid'],
                'a_questions_id' => $data['a_questions_id'],
                'status' => 1
            );
            // 检查是否解答过这道题
            if(!M('designer_integral')->where($integral_data)->find()){
                $integral_data['number'] = 2;
                $integral_data['created_at'] = date('Y-m-d H:i:s', time());
                M('designer_integral')->add($integral_data);
            }
            Db::commit();
            return true;
        } catch(\Exception $e) {
            Db::rollback();
            return false;
        }
    }

    /**
     * @todo: 更新是否被采纳的状态
     * @author： friker
     * User: Administrator
     * Date: 2019/8/13
     * Time: 15:07
     * @param $data
     * @param $where
     * @return bool
     */
    public function statusUpdate($data, $where)
    {
        Db::startTrans();
        try {
            $this->where($where)->save($data);
            $res = $this->where($where)->find();
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
            }
            Db::commit();
            return true;
        } catch(\Exception $e) {
            Db::rollback();
            return false;
        }
    }
}