<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;


/**
 * 文章控制器
 */
class ArticleController extends Controller
{
	public function lists()
	{
		$data['list'] = db('article')->select();

		if (empty($data)) {
			return error('10500','未找到相关内容');
		} else {
			return success($data);
		}
	}

	public function index()
	{
		return view('/Article/index');
	}
}








