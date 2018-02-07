<?php
namespace app\admin\controller;
class Cate extends Common
{
// /public/static/admin/uploads/20180104\5b048038706d2cdbb6194bf9e4fade69.jpg
// /public/static/admin/uploads/20171122\920d1806bf22b0f05220eabbe86ccce1.jpg
// /public/static/admin/uploads/20180104\156db45820bd9f0a15b32455921ae402.jpg
// /public/static/admin/uploads/﻿20180104\156db45820bd9f0a15b32455921ae402.jpg

    public function add()
    {
      if(request()->isPost()){
       $data=input('post.');
       $validate=validate('cate');
      if(!$validate->scene('add')->check($data)){
        $this->error($validate->getError());
      }
       // dump($data);die();
       $add=db('cate')->insert($data);
       if($add){
          $this->success('添加栏目成功！',url('lst'));
        }else{
          $this->error('添加栏目失败！');
        }
        return;
      }
       $cateid=input('cateid');
       $_cateRes=db('cate')->select();
       $cateRes=model('Cate')->catetree($_cateRes);
       $model=db('model')->select();
       $this->assign(array(
           'model'=>$model,
          'cateRes'=>$cateRes,
          'cateid'=>$cateid
        ));
       return view();
      }
   

    public function lst()
    {
       $_cateRes=db('cate')->alias('a')->field('a.*,b.model_name')->join('model b','a.model_id = b.id')->order('sort desc')->select();
       $cateRes=model('Cate')->catetree($_cateRes);
       $this->assign('cateRes',$cateRes);
       return view();
   }
      //上传栏目图片
    public function upimg()
    {
     if($_FILES['img']['tmp_name'] != ''){
        $file = request()->file('img');
    
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    if($file){
	        $info = $file->move(ROOT_PATH . 'public/static/admin/uploads');
	        if($info){

	            echo $info->getSaveName();

	        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	        }
        }

     }
   }

    //ajax异步修改栏目显示状态
    public function changestatus(){
        if(request()->isAjax()){
               $cateid=input('cateid');
              $status=db('cate')->field('status')->where('id',$cateid)->find();
              $status=$status['status'];
              if($status==1){
                  db('cate')->where('id',$cateid)->update(['status'=>0]);
                  echo 1;//由显示改为隐藏
              }else{
                  db('cate')->where('id',$cateid)->update(['status'=>1]);
                  echo 2;//由隐藏改为显示
              }  
          }else{
              echo $this->error("非法操作！");
        }
    }
    //批量删除  批量修改排序
   public function del_sort(){
     $data=input('post.');
     if($data['sort']){
       foreach ($data['sort'] as $k => $v) {
          $update=db('cate')->where('id',$k)->update(['sort'=>$v]);
          if($update===false){
            $this->error('修改失败');
          }
        }

     }
     if(isset($data['itm'])){
      
      $delete=model('Cate')->pdel($data['itm']);
      if($delete<=0){
        $this->error('删除失败！');
      }
   }
    $this->success('数据处理成功！',url('lst'));
 }
    //s删除
   public function del(){
    $cateid=input('cateid');

    $childrenids=model('Cate')->childrenids($cateid);
    $childrenids[]=(int)$cateid;
    $del=db('cate')->delete($childrenids);
    if($del){
        $this->success('删除栏目成功！',url('lst'));
    }else{
        $this->error('删除栏目失败！');
    }
   }
    //修改   
   public function edit(){
    if(request()->isPost()){
      $data=input('post.');
      $_data=array();
      foreach($data as $k=>$v){
        $_data[]=$k;
      }
      if(!in_array('status',$_data)){
        $data['status']=1;
      }
      $validate=validate('cate');
      if(!$validate->scene('edit')->check($data)){
        $this->error($validate->getError());
      }
      $save=db('cate')->update($data);
      if($save!==false){
        $this->success('修改栏目成功',url('cate/lst'));
      }else{
        $this->error('修改栏目失败');
      }
    }
    $cateid=input('cateid');
    $cates=db('cate')->where('id',$cateid)->find();
     $_cateRes=db('cate')->select();
    $cateRes=model('Cate')->catetree($_cateRes);
     $model=db('model')->select();
    $this->assign(array(
          'model'=>$model,
          'cateRes'=>$cateRes,
          'cates'=>$cates
        ));
    return  view();

   }
   //撤销图片
   public function delimg(){
    $imgurl=ADMINIMG.input('imgurl');
    $cateid=input('cateid');
    $res=unlink($imgurl);
    if($cateid){
      db('cate')->where('id',$cateid)->setField('img','');
    }
    if($res){
      echo 1;
    }else{
      echo 2;
    }

   }
   //ajax优化栏目伸展
    public function shengsuo(){
      $cateid=input('cateid');
      $cateRes=model('Cate')->childrenids($cateid);
      $array=array('cateid'=>$cateid,'cateRes'=>$cateRes);
     echo json_encode($array);


   }

   public function hidelm(){
      $cateid=input('cateid');
      $cateRes=model('Cate')->childrenids($cateid);
       echo json_encode($cateRes);
   }
   //ajax优化栏目添加修改信息
   public function ajaxcateinfo(){
      $cateid=input('cateid');
      $data=db('cate')->where('id',$cateid)->find();
      echo json_encode($data);
   }



         
}
