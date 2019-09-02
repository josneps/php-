<?php

namespace Home\Model;

use think\Model;
use think\Db;

/**
 * Class ClassName
 * @package Home\Model
 */
class QuestionsModel extends Model
{
    protected $tableName = 'user_questions';

    /**
     * @todo: 添加业主的问题
     * @author： friker
     * User: Administrator
     * Date: 2019/8/12
     * Time: 17:19
     * @param array $data
     * @return bool
     */
    public function creates($data = array())
    {
        Db::startTrans();
        try {
            $this->add($data);
            Db::commit();
            return true;
        } catch(\Exception $e) {
            Db::rollback();
            return false;
        }
    }

    /**
     * @todo: 更新业主问题的状态
     * @author： friker
     * User: Administrator
     * Date: 2019/8/12
     * Time: 17:22
     * @param $data
     * @param $where
     * @return bool
     */
    public function statusUpdate($data, $where)
    {
        Db::startTrans();
        try {
            $this->where($where)->save($data);
            Db::commit();
            return true;
        } catch(\Exception $e) {
            Db::rollback();
            return false;
        }
    }

}