<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/**
 * 成功时调用
 * [success description]
 * @return [type] [description]
 */
function success($msg, $arr = [])
{
	$data = ['code' => 200, 'msg' => $msg];
	if (!empty($arr)) {
		$data['data'] = $arr;
	}

	return json($data);
}

/**
 * 失败时调用
 * [error description]
 * @return [type] [description]
 */
function error($code, $msg, $arr = [])
{
	$data = ['code' => $code, 'msg' => $msg];
	if (!empty($arr)) {
		$data['data'] = $arr;
	}

	return json($data);
}


/**
 * 获取当天的日期：20190617
 * [getTime description]
 * @return [type] [description]
 */
function getTime()
{
	return date('Ymd',time());
}