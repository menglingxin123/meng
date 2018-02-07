<?php
namespace app\admin\controller;
use think\Db;
class Model extends Common
{   //添加
    public function add()
    {
	    if(request()->isPost()){
	       $data=input('post.');
         $validate = validate('Model');
         if(!$validate->check($data)){
           $this->error($validate->getError());
        }
	       $insert=db('model')->insert($data);
	       if($insert){
	       	$tableName=config('database.prefix').$data['table_name'];
	       	$sql="create table {$tableName} (aid int unsigned not null) engine=MYISAM default charset=utf8";
	       	Db::execute($sql);
	       	$this->success('添加成功',url('lst'));
	       }else{
	       	$this->error('添加失败');
	       }
	   }
       return view();
      }
   
//分页
    public function lst()
    {
       $modelRes=db('model')->order('id desc')->paginate(2);
       $prefix=config("database.prefix");
       $this->assign(array(
        "modelRes"=>$modelRes,
        "prefix"=>$prefix,
       	));
       return view();
   }
   //修改状态
   public function changestatus(){
     if(request()->isAjax()){
	   	$id=input('id');

	   	$modelstatus=db('model')->field('status')->where('id',$id)->find();
        if($modelstatus['status']==1){
        	db('model')->where('id',$id)->update(array('status'=>0));
        	echo 1;
        }elseif($modelstatus['status']==0){
        	db('model')->where('id',$id)->update(array('status'=>1));
        	echo 2;
        }
    }
  }
        //修改
    public function edit(){
        if(request()->isPost()){
           $data=input('post.');
           $oldTableName=db('model')->field('table_name')->find($data['id']);
           $oldTableName=$oldTableName['table_name'];
           $tablename=$data['table_name'];
           $validate = validate('Model');
           if(!$validate->check($data)){
             $this->error($validate->getError());
          }
           $update=db('model')->update($data);
           if($update!==false){
              if($oldTableName != $data['table_name']){
              $prefix=config("database.prefix");
              $oldTableName=$prefix.$oldTableName;
              $tableName=$prefix.$data['table_name'];
              $sql=" alter table {$oldTableName} rename {$tableName} ";
              Db::execute($sql);
            }
            $this->success('修改成功',url('lst'));
           }else{
            $this->error('修改失败');
           }
        }
        $id=input('id');
        $editmodel=db('model')->where('id',$id)->find();
        $this->assign("editmodel",$editmodel);
        return view();
    }
    //s删除
   public function del(){
   	$id=input('id');
   	$tableName=config('database.prefix').input('tablename');
   	$delmodel=db('model')->delete($id);
   	if($delmodel){
        $sql="drop table {$tableName}";
    	Db::execute($sql);
   		$this->success('删除成功',url('lst'));
   	}else{
        $this->error('删除失败');
   	}


}
 
   
}
