<?php
/**
 * Created by PhpStorm.
 * User: 张丽坤
 * Date: 2019/9/11
 * Time: 23:24
 */

namespace app\personal\controller;

use think\Controller;

class Notepad extends Controller
{
    public function index()
    {
//        $a = '个人总结';
//        'http://101.132.107.94/personal/%E4%B8%AA%E4%BA%BA%E6%80%BB%E7%BB%93.html';
//
//        '%E4%B8%AA%E4%BA%BA%E6%80%BB%E7%BB%93';
//
//        '%E4%B8%AA%E4%BA%BA%E6%80%BB%E7%BB%93';
//        '个人总结';
//        echo $b = urlencode($a);
//echo '<br/>';
//        echo $c = urldecode($b);


//        $a = 'http://101.132.107.94/personal/%E4%B8%AA%E4%BA%BA%E6%80%BB%E7%BB%93.html';
//        $strs = strrpos($a,'/')+1;
//        $pp = strrpos($a,'.')-$strs;
//        $subs = substr($a,$strs,$pp);
//        $ss = urldecode($subs);
//        print_r($ss);die;

        $a = 'abcdefghrjklmn8524612846lkhbv';
//        $a = 'a b c d e f g h r j k  l  m  n  8  5  2  4  6  1  2  8  4  6  l  k  h  b  v';
//             '0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28';
        $c = strpos($a,'l');
        $str = substr($a, 24, 3);
        print_r($c);
        print_r($str);

        $dd = 'regch123?8520';
        $ff =strrpos($dd,'?');
        print_r($ff);
        $jj = substr($dd,-3, 2);
        print_r($jj);
    }
}