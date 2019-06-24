<?php
/**
 * Created by PhpStorm.
 * User: 木
 * Date: 2018/7/30
 * Time: 14:46
 */

namespace Manager\Controller;


class DebugController extends BaseController
{
    public function _initialize() {
        parent::_initialize();
        if(!APP_DEBUG) die;
    }

    /**
     * 生成模板
     * User: 木
     * Date: 2018/8/6 17:09
     */
    public function index() {
        if(IS_POST) {
            $data = $this->checkParam(array(
                array('type', 'int=1'),
                array('router', 'string>0')
            ));
            $path = APP_PATH.$this->currentModule.'/View/';
            // 判断目录是否存在
            $dir = dirname($path.$data['router'].'.html');
            if(!is_dir($dir) && !mkdir($dir, 0777, true)) {
                $this->apiResponse(0, '创建目录失败');
            }
            // 判断是否存在模板
            if(file_exists($path.$data['router'].'.html')) {
                $this->apiResponse(0, '模板已存在, 不可覆盖');
            }
            $res = file_put_contents($path.$data['router'].'.html', file_get_contents($path.'Debug/'.($data['type'] == 1 ? 'list.html' : 'form.html')));
            $res ? $this->apiResponse(1, '生成模板成功') : $this->apiResponse(0, '写入模板失败');
        }else {
            $this->display();
        }
    }

    /**
     * 生成对象
     * User: yongjin.xiong 98383028@qq.com
     * Date: 2019-02-07 21:40
     */
    public function createObject(){
        if(IS_POST){
            //检查数据
            $rule = array(
                array('object_name', 'notnull'),
                array('object_name_cn','notnull')
            );
            $data = $this->checkParam($rule);
            $msg = '';//记录生成信息
            $is_create_menu = 0;//是否创建菜单记录，如果Controller没创建就不创建菜单

            if($_REQUEST['radio_c']){
                //生成Controller
                $path = APP_PATH.$_REQUEST['module_name_c'].'/Controller/';
                // 判断目录是否存在
                $dir = dirname($path.$_REQUEST['object_name'].'Controller'.'.class.php');
                if(!is_dir($dir) && !mkdir($dir, 0777, true)) {
                    $msg .= '<span style="color: red">'.$path.$_REQUEST['object_name'].'Controller'.'.class.php'.'创建目录失败，请检查文件夹权限'.'</span><br>';
                    //$this->apiResponse(0, '创建目录失败，请检查文件夹权限');
                }elseif(file_exists($path.$_REQUEST['object_name'].'Controller'.'.class.php')){
                    // 判断是否存在模板
                    $msg .= '<span style="color: red">'.$path.$_REQUEST['object_name'].'Controller'.'.class.php'.'已存在, 不可覆盖,请检查'.'</span><br>';
                }else{
                    //读取模板文件并批量替换
                    if(!is_file('./Templates/'.$_REQUEST['module_name_c'].'_Controller.class.php')){
                        $msg .= '<span style="color: red">'.'创建'.$path.$_REQUEST['object_name'].'Controller'.'.class.php'.'失败，未找到'.'./Templates/'.$_REQUEST['module_name_c'].'_Controller.class.php'.'模板</span><br>';
                    }else{
                        $new_controller = file_get_contents('./Templates/'.$_REQUEST['module_name_c'].'_Controller.class.php');
                        $str = str_replace(array('AUTHOR','TIME','module_name_c','object_name','object_cn_name'),array('庆英',date("Y-m-d H:i:s",time()),$_REQUEST['module_name_c'],$_REQUEST['object_name'],$_REQUEST['object_name_cn']),$new_controller);
                        //创建新的Controller
                        $res_c = file_put_contents($path.$_REQUEST['object_name'].'Controller'.'.class.php', $str);
                        if(!$res_c){
                            $msg .= '<span style="color: red">'.'创建'.$path.$_REQUEST['object_name'].'Controller'.'.class.php'.'失败，未知原因'.'</span><br>';
                        }else{
                            $is_create_menu = 1;
                            $msg .= '创建'.$path.$_REQUEST['object_name'].'Controller'.'.class.php'.'成功'.'<br>';
                        }
                    }

                }
            }


            if($_REQUEST['radio_m']){
                //生成Model
                $path = APP_PATH.$_REQUEST['module_name_m'].'/Model/';
                // 判断目录是否存在
                $dir = dirname($path.$_REQUEST['object_name'].'Model'.'.class.php');
                if(!is_dir($dir) && !mkdir($dir, 0777, true)) {
                    $msg .= '<span style="color: red">'.$path.$_REQUEST['object_name'].'Model'.'.class.php'.'创建目录失败，目录已存在或文件夹权限不够'.'</span><br>';
                    //$this->apiResponse(0, '创建目录失败，请检查文件夹权限');
                }elseif(file_exists($path.$_REQUEST['object_name'].'Model'.'.class.php')){
                    // 判断是否存在模板
                    $msg .= '<span style="color: red">'.$path.$_REQUEST['object_name'].'Model'.'.class.php'.'已存在, 不可覆盖,请检查'.'</span><br>';
                }else{
                    if(!is_file('./Templates/'.$_REQUEST['module_name_m'].'_Model.class.php')){
                        $msg .= '<span style="color: red">'.'创建'.$path.$_REQUEST['object_name'].'Model'.'.class.php'.'失败，未找到'.'./Templates/'.$_REQUEST['module_name_m'].'_Model.class.php'.'模板</span><br>';
                    }else{
                        //读取模板文件并批量替换
                        $new_model = file_get_contents('./Templates/'.$_REQUEST['module_name_m'].'_Model.class.php');
                        $str = str_replace(array('AUTHOR','TIME','module_name_m','object_name','object_cn_name'),array('庆英',date("Y-m-d H:i:s",time()),$_REQUEST['module_name_m'],$_REQUEST['object_name'],$_REQUEST['object_name_cn']),$new_model);
                        //创建新的Model
                        $res_m = file_put_contents($path.$_REQUEST['object_name'].'Model'.'.class.php', $str);
                        if(!$res_m){
                            $msg .= '<span style="color: red">'.'创建'.$path.$_REQUEST['object_name'].'Model'.'.class.php'.'失败，未知原因'.'</span><br>';
                        }else{
                            $msg .= '创建'.$path.$_REQUEST['object_name'].'Model'.'.class.php'.'成功'.'<br>';
                        }
                    }
                }
            }

            if($_REQUEST['radio_v']){
                //生成View
                $path = APP_PATH.$_REQUEST['module_name_v'].'/View/'.$_REQUEST['object_name'];
                if(!mkdir($path, 0777, true)) {
                    $msg .= '<span style="color: red">'.$path.'目录，创建目录失败，请检查文件夹权限'.'</span><br>';
                    //$this->apiResponse(0, '创建目录失败，请检查文件夹权限');
                }elseif(file_exists($path.'/select'.$_REQUEST['object_name'].'.html')){
                    // 判断是否存在select
                    $msg .= '<span style="color: red">'.$_REQUEST['object_name'].'/select'.$_REQUEST['object_name'].'.html'.'已存在, 不可覆盖,请检查'.'</span><br>';
                }elseif(file_exists($path.'/edit'.$_REQUEST['object_name'].'.html')){
                    // 判断是否存在edit
                    $msg .= '<span style="color: red">'.$_REQUEST['object_name'].'/edit'.$_REQUEST['object_name'].'.html'.'已存在, 不可覆盖,请检查'.'</span><br>';
                }else{
                    if(!is_file('./Templates/'.$_REQUEST['module_name_v'].'_Select.html')){
                        $msg .= '<span style="color: red">'.'创建'.$path.'/select'.$_REQUEST['object_name'].'.html'.'失败，未找到'.'./Templates/'.$_REQUEST['module_name_v'].'_Select.html'.'模板</span><br>';
                    }else{
                        //读取模板文件并批量替换
                        $new_select = file_get_contents('./Templates/'.$_REQUEST['module_name_v'].'_Select.html');
                        $str = str_replace(array('AUTHOR','TIME','module_name_m','object_name'),array('庆英',date("Y-m-d H:i:s",time()),$_REQUEST['module_name_m'],$_REQUEST['object_name']),$new_select);
                        //创建新的select.html
                        $res_v_s = file_put_contents($path.'/select'.$_REQUEST['object_name'].'.html', $str);
                        if(!$res_v_s){
                            $msg .= '<span style="color: red">'.'创建'.$path.'/select'.$_REQUEST['object_name'].'.html'.'失败，未知原因'.'</span><br>';
                        }else{
                            $msg .= '创建'.$path.'/select'.$_REQUEST['object_name'].'.html'.'成功'.'<br>';
                        }
                    }
                    if(!is_file('./Templates/'.$_REQUEST['module_name_v'].'_Edit.html')){
                        $msg .= '<span style="color: red">'.'创建'.$path.'/select'.$_REQUEST['object_name'].'.html'.'失败，未找到'.'./Templates/'.$_REQUEST['module_name_v'].'_Edit.html'.'模板</span><br>';
                    }else{
                        $new_select = file_get_contents('./Templates/'.$_REQUEST['module_name_v'].'_Edit.html');
                        $str = str_replace(array('AUTHOR','TIME','module_name_m','object_name'),array('庆英',date("Y-m-d H:i:s",time()),$_REQUEST['module_name_m'],$_REQUEST['object_name']),$new_select);
                        //创建新的select.html
                        $res_v_e = file_put_contents($path.'/edit'.$_REQUEST['object_name'].'.html', $str);
                        if(!$res_v_e){
                            $msg .= '<span style="color: red">'.'创建'.$path.'/edit'.$_REQUEST['object_name'].'.html'.'失败，未知原因'.'</span><br>';
                        }else{
                            $msg .= '创建'.$path.'/edit'.$_REQUEST['object_name'].'.html'.'成功'.'<br>';
                        }
                    }
                }
            }

            if($_REQUEST['radio_menu']){
                //创建菜单-母级，如果Controller没创建就不创建菜单
                if($is_create_menu){
                    $data_m = array(
                        'p_id' => 0,
                        'name' => $_REQUEST['menu_name'],
                        'module' => $_REQUEST['module_name_c'],
                        'controller' => $_REQUEST['object_name'],
                        'action' => '',
                        'router' => '',
                        'status' => 1,
                        'type' => 1,
                        'system' => $_REQUEST['radio_menu_p'],//0是左侧，1是顶部
                    );
                    //未传母级菜单图标，系统随机选择图标
                    $data_m['icon'] = $_REQUEST['menu_icon'] ? $_REQUEST['menu_icon'] :  C('MENU_ICON')[rand(1,count(C('MENU_ICON')))];
                    $p_id = D('AdminMenu')->addRow($data_m);
                    //创建子级菜单
                    $data_m['p_id'] = $p_id;
                    $data_m['name'] = $_REQUEST['object_name_cn'].'列表';//二级菜单名称
                    $data_m['action'] = 'select'.$_REQUEST['object_name'];
                    $data_m['router'] = $_REQUEST['module_name_c'].'/'.$_REQUEST['object_name'].'/select'.$_REQUEST['object_name'];
                    $data_m['icon'] = '';
                    $res_menu = D('AdminMenu')->addRow($data_m);
                    if(!$res_menu){
                        $msg .= '<span style="color: red">'.'创建'.$_REQUEST['menu_name'].'菜单失败，未知原因'.'</span><br>';
                    }else{
                        $msg .= '创建'.$_REQUEST['menu_name'].'菜单成功'.'<br>';
                    }
                    //创建添加和编辑按钮  编辑顺序和删除按钮是公共方法，无法控制权限了，如果实际开发中需要控制权限请重写排序和删除方法
                    $data_m['name'] = '添加/编辑'.$_REQUEST['object_name_cn'];
                    $data_m['action'] = 'edit'.$_REQUEST['object_name'];
                    $data_m['router'] = $_REQUEST['module_name_c'].'/'.$_REQUEST['object_name'].'/'.$data_m['action'];
                    $data_m['type'] = 2;//1代表按钮，2代表菜单
                    $res_btn = D('AdminMenu')->addRow($data_m);
                    if(!$res_btn){
                        $msg .= '<span style="color: red">'.'创建'.$_REQUEST['menu_name'].'添加/编辑按钮功能失败，未知原因'.'</span><br>';
                    }else{
                        $msg .= '创建'.$_REQUEST['menu_name'].'添加/编辑按钮功能成功'.'<br>';
                    }
                    //清除缓存--重新缓存菜单权限
                    D('AdminGroup')->getMenu($this->userId, $this->userInfo['group_id']);
                }
            }

            if($_REQUEST['radio_table']){
                //读取并替换模板sql文件
                $new_sql = file_get_contents('./Templates/DB_PREFIX_Table_Name.sql');
                //处理数据表名字
                $table_name = C('DB_PREFIX').$this->handle_str($_REQUEST['object_name']);
                $str = str_replace(array('TIME','DBNAME','TABLENAME','TABLECOMMENT'),array(date("Y-m-d H:i:s",time()),C('DB_NAME'),$table_name,$_REQUEST['object_name_cn'].'表'),$new_sql);
                $code = $this->insert($str,C('DB_NAME'),C('DB_HOST'),C('DB_USER'),C('DB_PWD'),$table_name);
                if($code == '0'){
                    $msg .= '<span style="color: red">'.'创建'.$table_name.'数据表失败，连接数据库失败，请检查项目数据库文件配置信息'.'</span><br>';
                }elseif($code == '2'){
                    $msg .= '<span style="color: red">'.'创建'.$table_name.'数据表失败，数据库中已存在该表，不可覆盖'.'</span><br>';
                }else{
                    $msg .= '创建'.$table_name.'数据表成功'.'<br>';
                }
            }

            //生成结果返回到前台
            $this->apiResponse(1, $msg);
        }else{
            $this->assign('module_list',array_merge(C('MODULE_ALLOW_LIST'),C('MODULE_DENY_LIST')));
            $this->assign('title','生成对象');
            $this->display();
        }
    }

    public function insert($file,$database,$name,$root,$pwd,$table_name){
        //将表导入数据库
        header("Content-type: text/html; charset=utf-8");
        //$_sql = file_get_contents($file);//写自己的.sql文件
        $_sql = $file;//写自己的.sql文件
        $_arr = explode(';', $_sql);
        $_mysqli = new \mysqli($name,$root,$pwd,$database);//第一个参数为域名，第二个为用户名，第三个为密码，第四个为数据库名字
        if (mysqli_connect_errno()) {
            $code = 0 ;
        }else{
            //检查数据表是否已经存在
            $obj = $_mysqli->query('show tables;'); //设置编码方式
            $tables = array();
            while($arr = $obj->fetch_assoc()){
                $tables[] = $arr;//遍历查询结果
            }
            $tables_arr = array();
            foreach ($tables as $k=>$v){
                $tables_arr[$k] = $v['Tables_in_'.C('DB_NAME')];
            }
            if(in_array($table_name,$tables_arr)){
                //已经存在该表
                $code = 2;
            }else{
                //执行sql语句
                $_mysqli->query('set names utf8;'); //设置编码方式
                foreach ($_arr as $_value) {
                    $_mysqli->query($_value.';');
                }
                $code = 1;
            }
        }
        $_mysqli->close();
        $_mysqli = null;
        return $code;
    }

    /**
     * 字符串处理，例如将ArticleCate处理成article_cate
     * @param $str
     * @return string
     * User: yongjin.xiong 98383028@qq.com
     * Date: 2019-02-09 10:01
     */
    public function handle_str($str){
        $table_name = $str;
        $arr = preg_split("/(?=[A-Z])/", $table_name);
        $table_name_new = '';
        foreach ($arr as $k=>$v){
            $table_name_new .= strtolower($v).'_';
        }
        return trim($table_name_new,'_');
    }




}