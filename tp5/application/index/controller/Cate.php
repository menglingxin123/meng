<?php
namespace app\index\controller;
class Cate extends Common
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
  	  $cateTmp=$cates['list_tmp'];
      //获取对应的附加表的名称
      $models=db('model')->field('table_name')->find($cates['model_id']);
      $addTableName=$models['table_name'];
      //获取当前栏目以及其子栏目的id
      $sid=model('admin/Cate')->childrenids($cid);
      $sid[]=intval($cid);
      $map['cate_id']=array('in',$sid);
    	$artRes=db('archives')->alias('a')->join("$addTableName b",'a.id=b.aid')->where($map)->order('id desc')->paginate(10);
      $page = $artRes->render();
    	    	$this->assign(
         array(
           'cid'=>$cates['id'],
           'topcid'=>$topcid,
           'sonCateRes'=>$sonCateRes,
           'topCates'=>$topCates,
           'position'=>$position,
           'page'=>$page,
           'artRes'=>$artRes,
           'cates'=>$cates
         )
    	);
       return $this->fetch($this->confTemp.'/'.$cateTmp);
    }
}
