<?php
namespace app\admin\validate;
use think\validate;

class Admin extends validate
{
    protected $rule=[
        'uname'=>'require|unique:admin',
        'password'=>'require|min:6',
    ];

    protected $message=[
        'uname.require'=>'管理员名称不得为空',
        'uname.unique'=>'管理员名称不得重复',
        'password.require'=>'密码不得为空',
        'password.min'=>'密码长度不得小于六位'

    ];
    protected $scene = [
        'add'   =>  ['uname','password'],
        'edit'  =>  ['uname','password'=>'min:6'],

    ];
}