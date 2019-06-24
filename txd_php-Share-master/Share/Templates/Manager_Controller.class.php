<?php
/**
 * object_cn_name类
 * Created by PhpStorm.
 * User: 权限控制自动生成 By AUTHOR
 * Date: TIME
 */
namespace module_name_c\Controller;

class object_nameController extends BaseController
{

    /**
     * object_cn_name
     * User: AUTHOR
     * Date: TIME
     */
    public function selectobject_name() {
        //删选条件准备
        $where = array();
        if ($_REQUEST['name']){
            $where['name'] = array('LIKE','%'.$_REQUEST['name'].'%');
        }
        if ($_REQUEST['id']){
            $where['id'] = $_REQUEST['id'];
        }

        if (isset($_REQUEST['status'])){
            $where['status'] = $_REQUEST['status'];
        }else{
            $where['status'] = array('lt',9);
        }
        $param['order'] = 'sort desc , id  desc';
        $param['page_size'] = 15;
        //查询
        $data = D('object_name')->queryList($where, '*',$param);
        //处理查询结果
        foreach ($data['list'] as $k=>$v){
            //处理图片
            $data['list'][$k]['icon_path'] = D('File')->where(array('id'=>$v['icon'],'status'=>1))->getField('savepath');
            //处理时间
            $data['list'][$k]['add_time'] = format_time($v['add_time']);
        }
        //分配数据处理结果并返回
        $this->assign('list',$data['list']);
        $this->assign('page',$data['page']);
        //渲染前端模板
        $this->display('selectobject_name');
    }

    /**
     * 添加/编辑object_cn_name
     * User: AUTHOR
     * Date: TIME
     */
    public function editobject_name(){
        //添加和编辑页面合并
        if(IS_POST){
            //检查参数
            $rule = array(
                array('name', 'notnull'),
                array('sort', 'notnull'),
            );
            $data = $this->checkParam($rule);
            if($_REQUEST['id']){
                //编辑object_cn_name
                $res = D('object_name')->where(array('id'=>$_REQUEST['id']))->data($data)->save();
                $res ? $this->apiResponse(1, '编辑成功') : $this->apiResponse(0, '编辑失败');
            }else{
                //添加object_cn_name
                //整理数据
                $data['add_time'] = time();
                $data['status'] = 1;
                $res = D('object_name')->data($data)->add();
                $res ? $this->apiResponse(1, '添加成功') : $this->apiResponse(0, '添加失败');
            }
        }else{
            if($_GET['id']){
                $info = D('object_name')->where(array('id'=>$_GET['id']))->find();
                $this->assign('row',$info);
            }
            $this->assign('title','添加/编辑object_cn_name');
            $this->display('editobject_name');
        }
    }

}