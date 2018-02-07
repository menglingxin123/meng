<?php
namespace app\index\model;
use think\Model;
class Cate extends Model
{
   //获取顶级栏目
   public function getTopId($cid){
    $data=db('cate')->field('id,pid')->select();
     $arr=array();
    foreach ($data as $k => $v) {
      $arr[$v['id']]=$v['pid'];
   }
    $id =$cid;
   while($arr[$id]){
    $id=$arr[$cid];
   }
   return $id;
   }
    
//面包屑      
   public function position($cid){
    $data=db('cate')->select();
     $cates=db('cate')->field('id,cate_name,pid,cate_attr')->find($cid);//当前栏目信息
   return  $this->_position($data,$cates['pid']);
   }
   public function _position($data,$pid){
    static $pos=array();
    foreach ($data as $k => $v){
      if($v['id']==$pid){
         $pos[]=$v;
         $this->_position($data,$v['pid']);
      }
    }
    
    return array_reverse($pos);

   }
     public function getPageContent($cid){
      $cates=$this->field('content')->find($cid);
      $content=strip_tags($cates['content']);
      $content=cut_str($content,66);
      return $content;
    }
   
}
