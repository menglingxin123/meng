<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use auth\Auth;
class Common extends Controller
{

    public $config;

    public function _initialize(){
        if(!session('uname')||!session('id')){
            $this->error('请登录','Login/index');
        }
    	$request = Request::instance();
      $module=$request->module();
    	$con=$request->controller();
      $action=$request->action();
      $name=$module.'/'.$con.'/'.$action;//组合规则name
       $this->assign([
      'con'=>$con,
      'name'=>$name,
      ]);
        $this->config=$this->getConf();
        $auth=new Auth();
        //菜单
         $group=$auth->getGroups(session('id'));//获取到拥有的权限的id
         $rules=explode(',', $group[0]['rules']);
         $map['pid']=['=',0];
         $map['show']=['=',1];
         $map['id']=['in',$rules];
         $_map['id']=['in',$rules];
         $menu=array();
         $menu=db('authRule')->where($map)->select();
         foreach ($menu as $k => $v) {
           $menu[$k]['children']=db('authRule')->where($_map)->where(array('pid'=>$v['id'],'show'=>1))->select();
           foreach ($menu[$k]['children'] as $k1 => $v1) {
            $menu[$k]['children'][$k1]['children']=db('authRule')->where(array('pid'=>$v1['id'],'show'=>1))->select();
           }
         }
           $this->assign([
      'menu'=>$menu,
      ]);
        if(!$auth->check($name,session('id'))){
      $this->error('没有该操作权限！');
     }

      }
    





     public function getConf(){
  	$confRes=array();
  	$_confRes=db('conf')->field('ename,value')->select();
  	foreach ($_confRes as $v) {
  		$confRes[$v['ename']]=$v['value'];
  	}
  	return $confRes;
  }
      
}
