<?php

namespace app\admin\model;

user think\Model;


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
	public function saves($data, $where, $id)
	{
		//检测是否有id，如果有就是修改，没有就是添加
		if(empty($id)){
			//添加数据入库
			$this->save();
		} else {
			//更新数据入库
		}
	}
}																			

