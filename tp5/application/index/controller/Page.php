<?php
namespace app\index\controller;
class Page extends Common
{
    public function index($cid)
    {
    	$cates=db('cate')->find($cid);//查询当前栏目信息
    	if($cates['jump_id']!==0){
    		$cates=db('cate')->find($cates['jump_id']);//查询当前栏目信息
    	}
    	//面包屑
    	$position=model('Cate')->position($cates['id']);
    	$position[]=$cates;
    	//获取终极父id
    	$topcid=model('Cate')->getTopId($cates['id']);
    	//获取终极父ID的信息
         $topCates=db('cate')->find($topcid);
    	//通过父ID获取其下面的二级子栏目
    	$sonCateRes=db('cate')->where('pid',$topcid)->where(array('status'=>1))->select();
    	$this->assign(
         array(
           'cid'=>$cates['id'],
           'topcid'=>$topcid,
           'sonCateRes'=>$sonCateRes,
           'topCates'=>$topCates,
           'cates'=>$cates,
           'position'=>$position

         )
    	);
       return $this->fetch($this->confTemp.'/'.$cates['index_tmp']);
    }
}
