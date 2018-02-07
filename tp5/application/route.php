<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [

//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
use think\Route;

Route::rule('index','index/Index/index','GET',['ext'=>'html']);
Route::rule('page/:cid','index/Page/index','GET',['ext'=>'html'],['cid'=>'\d{1,4}']);
Route::rule('cate/:cid','index/Cate/index','GET',['ext'=>'html'],['cid'=>'\d{1,4}']);