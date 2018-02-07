<?php
namespace app\admin\model;
use think\Model;
class AuthRule extends Model
{

public function ruletree($AuthRule){
  return $this->sort($AuthRule);

}
public function sort($AuthRule,$pid=0,$level=0){
  static $arr=array();
  foreach($AuthRule as $k=>$v){
    if($v['pid']==$pid){
         $v['level']=$level;
         $arr[]=$v;
         $this->sort($AuthRule,$v['id'],$level+1);
    }

  }
  return $arr;

}
public function children($auth,$id){
 return $this->childrens($auth,$id);
} 
public function childrens($auth,$id){
  static $arrid=array();
  foreach($auth as $k=>$v){
    if($v['pid']==$id){
      $arrid[]=$v['id'];
      $this->childrens($auth,$v['id']);
    }

  }
 return $arrid;
}  
}
