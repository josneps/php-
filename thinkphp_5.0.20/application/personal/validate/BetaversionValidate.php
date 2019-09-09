<?php

namespace app\personal\validate;
use think\Validate;

class BetaversionValidate extends Validate
{
    protected $rule = [
        ['emailtitle', 'require', '请输入邮件标题'],
        ['emailcontent', 'require', '请输入邮件内容'],
        ['toemail','require|email', '请输入邮箱|邮箱格式不正确'],
        ['name','require|chs', '请输入昵称|昵称只能为汉字'],
        ['sex','require|in:1,2', '请输入性别|性别只能是1:男、2:女'],
        ['age','require|number|between:1,120', '请输入年龄|年龄只能是数字|年龄只能是1~120'],
    ];

    protected $scene = [
        'email' => ['toemail','emailtitle','emailcontent'],
    ];
}