<?php

namespace app\admin\model;

use think\Model;
use think\Db;


class AdminUser extends Model
{
	/**
	 * 保存数据
	 * [saves description]
	 * @param  [type] $data  [description]
	 * @param  [type] $where [description]
	 * @param  [type] $id    [description]
	 * @return [type]        [description]
	 */
	public function saves($data = [], $where = [], $id = '')
	{
		//检测是否有id，如果有就是修改，没有就是添加
		if(empty($id)){
			//添加数据入库
			Db::startTrans();
			try{
				//检测手机号是否存在
				$phone = db('admin_user')->where('user_phone',$data['user_phone'])->find();
				if(!empty($phone)){
					return 3;
				}
				//检测昵称是否存在
				$name = db('admin_user')->where('user_name',$data['user_name'])->find();
				if(!empty($name)){
					return 4;
				}
				//写入数据库
				db('admin_user')->insert($data);
				//提交事务
				Db::commit();
				return 1;
			} catch(\Exception $e) {
				//回滚事务
				Db::rollback();
				return 2;
			}
		} else {
			//更新数据入库
			echo 456;
		}
	}
}																			

