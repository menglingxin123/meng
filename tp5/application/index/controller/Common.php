<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{
	public $confTemp;

    public function _initialize()
    {
      $this->confTemp=config('template.view_path').$this->getTemp();
      $temp_src=config('view_replace_str.temp_src').'/'.$this->getTemp();
      $cateRes=$this->getCate(false);//顶部导航
      $botCateRes=$this->getCate(true);//底部导航
      $this->assign(
         array(
         	'temp_src'=>$temp_src,
          'cateRes'=>$cateRes,
          'botCateRes'=>$botCateRes,
         	)
      	);
    }
      public function getTemp(){
    	$confTemp=db('conf')->field('value')->where(array('ename'=>'temp'))->find();
    	return $confTemp['value'];
    }
        public function getCate($bottom=false){
        if($bottom){//底部导航
          $cateRes=db('cate')->where(array('pid'=>0,'status'=>1,'bottom_nav'=>1))->select();  
        }else{//顶部导航
          $cateRes=db('cate')->where(array('pid'=>0,'status'=>1))->select();  
        }
        foreach ($cateRes as $k => $v) {
            $cateRes[$k]['children']=db('cate')->where(array('pid'=>$v['id'],'status'=>1))->select();
        }
        return $cateRes;
    }
}
