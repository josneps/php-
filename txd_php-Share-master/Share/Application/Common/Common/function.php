<?php
/**
 * Created by PhpStorm.
 * User: 木公子
 * Date: 2018/7/13
 * Time: 19:11
 */

/**
 * 生成随机字符串
 * User: 木
 * Date: 2018/7/30 16:52
 * @param int $length
 * @return string
 */
function NoticeStr($length=6) {
    $NoticeStr = '';
    $str = 'qwertyuiopasdfghjklzxcvbnm0123456789QWERTYUIOPASDFGHJKLZXCVBNM';
    for($i=1; $i<=$length; $i++) {
        $RandNum = mt_rand(0, strlen($str) - 1);
        $NoticeStr .= $str[$RandNum];
    }
    return $NoticeStr;

}

/**
 * 生成密码
 * 说明：$salt为空则生成一个随机字符串，并返回一个数组
 * User: 木
 * Date: 2018/7/30 16:52
 * @param string $initValue
 * @param string $salt
 * @return array|string
 */
function CreatePassword($initValue='', $salt='') {
    // 生成密码还是验证密码
    $R = empty($salt) ? true : false;
    $salt = empty($salt) ? NoticeStr(6) : $salt;
    $pwd = md5(sha1(md5($initValue) . md5($salt)));
    return $R ? array('password'=>$pwd, 'salt'=>$salt) : $pwd;
}
/**
 * 验证密码
 * @param string $password 验证的密码
 * @param int $id 用户ID
 * @return boolean
 * User: zjj
 * Date:2018/08/17
 */
function checkPassword($password,$salt,$old_password) {
    if(CreatePassword($password, $salt) !== $old_password){
        return 1;
    }else{
        return 2;
    }
}

/**
 * 无限级分类 - 递归
 * Date: 2018/8/6 11:16
 * @param array $list
 * @param string $pk 主键名
 * @param string $p_key 上级键名
 * @param int $p_val 一级列表上级键值
 * @param int $level
 * @return array
 */
function sunTree($list, $pk='id', $p_key='p_id', $p_val=0, $level=1) {
    $data = array();
    foreach($list as $key=>$item) {
        if($item[$p_key] == $p_val) {
            $temp = $item;
            unset($list[$key]);
            $temp['level'] = $level;
            $temp['sub_list'] = sunTree($list, $pk, $p_key, $temp[$pk], $level + 1);
            $data[] = $temp;
        }
    }
    return $data;
}

/**
 * 导出数据为excel表格
 *param $data    一个二维数组,结构如同从数据库查出来的数组
 *param $title   excel的第一行标题,一个数组,如果为空则没有标题
 *param $filename 下载的文件名
 *examlpe
 * $stu = M ('User');
 *$arr = $stu -> select();
 *exportexcel($arr,array('id','账户','密码','昵称'),'文件名!');
 */


function exportexcel($data=array(),$title=array(),$filename='report'){
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=".$filename.".xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=iconv("UTF-8", "GB2312",$v);
        }
        $title= implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=iconv("UTF-8", "GBK//ignore", $cv);
            }
            $data[$key]=implode("\t", $data[$key]);

        }
        echo implode("\n",$data);
    }


}


/**
 * 验证身份证号
 * User: 木
 * Date: 2018/8/15 9:32
 * @param $id
 * @return bool
 */
function isIdcard($id) {
    $id = strtoupper($id);
    $regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/";
    $arr_split = array();
    if(!preg_match($regx, $id)) {
        return false;
    }
    // 检查15位
    if(15==strlen($id)) {
        $regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/";
        @preg_match($regx, $id, $arr_split);
        // 检查生日日期是否正确
        $dtm_birth = "19".$arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4];
        if(!strtotime($dtm_birth)) {
            return false;
        } else {
            return true;
        }
    } else { // 检查18位
        $regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/";
        @preg_match($regx, $id, $arr_split);
        $dtm_birth = $arr_split[2] . '/' . $arr_split[3]. '/' .$arr_split[4];
        if(!strtotime($dtm_birth)) { // 检查生日日期是否正确
            return false;
        } else {
            //检验18位身份证的校验码是否正确。
            //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
            $arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
            $arr_ch = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
            $sign = 0;
            for ( $i = 0; $i < 17; $i++ ) {
                $b = (int) $id{$i};
                $w = $arr_int[$i];
                $sign += $b * $w;
            }
            $n = $sign % 11;
            $val_num = $arr_ch[$n];
            if ($val_num != substr($id,17, 1)) {
                return false;
            }else {
                return true;
            }
        }
    }
}



/**
 * 方法释义
 * @param $id 所查图片ID
 * @param string $type 图片类型  默认缩略图
 * @return string
 * User: jinrui.wang wangjinrui2010@163.com
 * Date: 2018/8/7
 */
function getPic($id,$type=''){
    if ($id == '' || $id == 0) {
        return '';
    }
    if ($type == 'th') {
        $field = 'th_savepath';
    } else {
        $field = 'path';
    }
    return C('API_URL').D('File')->where(array('id'=>$id))->getField($field);
}


/**
 * 图片上传
 * @param file $file 文件
 * @param string $path 子目录 可空
 * @param string $thum_width 缩略图
 * @param string $thum_hight 缩略图
 * @return array
 * User: yihui.qu 849097526@qq.com
 * Date:2018/05/22 上午11:26
 */
function uploadimg($file,$path='',$thum_width = 150,$thum_hight = 150){
    if (!empty($file)) {
        $root="./Uploads/";
        $path=$path."/";
        $new_file=$root.$path;
        if (!file_exists($new_file)) {
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($new_file, 0700);
        }
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = $root; // 设置附件上传根目录
        $upload->savePath =$path; // 设置附件上传（子）目录 // 上传文件
        $upload->saveName= array('uniqid','');
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            return $upload->getError();
        }else{// 上传成功
            foreach($info as $file){
                $savepath = $root.$file['savepath'].$file['savename'];//原图
                $th_savepath = $root.$file['savepath']."th_".$file['savename'];//缩略图
                $size=$file['size'];//文件大小
                $name=$file['name'];//文件原名
                $ext=$file['ext'];//文件类型
            }
        }
        if(!empty($savepath)){//上传文件名不为空
            $image = new \Think\Image();
            $image->open($savepath);
            // 按照原图的比例生成一个最大为150*150的缩略图并保存
            $image->thumb($thum_width, $thum_hight)->save($th_savepath);//thumb(图片宽，图片高)
            $add['savepath']=substr($savepath,1);
            $add['th_savepath']=substr($th_savepath,1);
            $add['path']=substr($savepath,1);
            $add['abs_url']=$_SERVER['HTTP_HOST'].substr($savepath,1);
            $add['size']=$size;
            $add['name']=$name;
            $add['ext']=$ext;
            $add['create_time']=time();
            $save=D('file')->add($add);
            $info['savepath']=$savepath;
            $info['th_savepath']=$th_savepath;
            $info['save_id']=$save;
            $info['size']=$size;
            return $info;
        }else{
            return "上传失败";
        }
    }else{
        return "没有文件";
    }
}

/**
 * 发送验证码
 * @param $account  账号
 * @param $type  类型
 * @param $sender 发送者ID 默认系统0
 * @return boolean
 * User: jinrui.wang wangjinrui2010@163.com
 * Date: 2018/8/15 9:48
 */
function getVerification($account,$type,$sender = 0){
    $sms=C('SMS');
    $username = $sms['sms_key'];  //环信账号
    $password = $sms['sms_secret'];      //环信密码
    $comp=C('WEBSITE');
    $company =$comp['website_name'];// ;      //公司名称
    vendor('Txunda.Txunda#Verification');

    $verifivation = new \Verification();
    $result = $verifivation->sendVerification($account,$username,$password,$company,$type,$sender);
    if ($result['success']) {
        return '发送成功';
    } else {
        return $result['error'];
    }
}
function get_vc($num = 0, $flag = 0) {
    /**获取验证标识**/
    $arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',1,2,3,4,5,6,7,8,9,0);
    $vc  = '';
    switch($flag) {
        case 0 : $s = 0;  $e = 61; break;
        case 1 : $s = 0;  $e = 51; break;
        case 2 : $s = 52; $e = 61; break;
    }

    for($i = 0; $i < $num; $i++) {
        $index = rand($s, $e);
        $vc   .= $arr[$index];
    }
    return $vc;
}
/**
 * 生成token
 */
function createToken(){
    $arr['token'] = md5(time().rand(10000,99999));
    $arr['expired_time'] = time()+86400*7;
    return $arr;
}

/**
 * 调用系统的API接口方法（静态方法）
 * api('User/getName','id=5'); 调用公共模块的User接口的getName方法
 * api('Admin/User/getName','id=5');  调用Admin模块的User接口
 * @param  string  $name 格式 [模块名]/接口名/方法名
 * @param  array|string  $vars 参数
 * @return mixed
 */
function api($name,$vars = array()) {
    $array     = explode('/',$name);
    $method    = array_pop($array);
    $class_name = array_pop($array);
    $module    = $array? array_pop($array) : 'Common';
    $callback  = $module.'\\Api\\'.$class_name.'Api::'.$method;
    if(is_string($vars)) {
        parse_str($vars,$vars);
    }
    return call_user_func_array($callback,$vars);
}

/**
 * 格式化时间显示方法
 * @param $time
 * @param $format
 * @return false|string
 * User: yongjin.xiong 98383028@qq.com
 * Date: 2019-02-06 00:53
 */
function format_time($time,$format){
    if(empty($time)){
        $str = '/';
    }else{
        //当前时间
        $now = time();
        //计算传递时间与当前时间相差的秒数
        $diff = $now - $time;
        switch ($time) {
            case $diff < 60:
                $str = '刚刚';
                break;
            case $diff < 3600:
                $str = floor($diff / 60) .'分钟前';
                break;
            case $diff < (3600 * 24):
                $str = floor($diff / 3600) .'小时前';
                break;
            case $diff < (3600 * 24 * 3):
                $str = floor(($now - $time) / 86400).'天前';
                if($str == '1天前'){
                    $str = '昨天';
                }
                break;
            default:
                if(strtotime(date('Y',$now)) == strtotime(date('Y',$time))){
                    $str = date('m-d',$time);
                }else{
                    $str = date($format,$time);
                }
                break;
        }
    }
    return $str;
}

/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param int $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param boolean $suffix 截断显示字符
 * @return string
 */
function m_substr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    } else {
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'...' : $slice;
}