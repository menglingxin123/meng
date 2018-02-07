<?php
namespace app\admin\controller;
use think\Db;
class ModelFields extends Common
{   //添加
    public function add()
    {
      if(request()->isPost()){
       $data=input('post.');
       $tableName=db('model')->field('table_name')->find($data['model_id']);
       $tableName=config("database.prefix").$tableName['table_name'];
         //过滤中文"，"
        if($data['field_values']){
            $data['field_values']=str_replace('，', ',', $data['field_values']);
        }
        //验证数据
        $validate=validate('model_fields');
        if(!$validate->scene('edit')->check($data)){
            $this->error($validate->getError());
        }
       $insert=db('model_fields')->insert($data);
       if($insert){
           //字段类型：1：单行文本 2：单选安按钮 3：复选框 4：下拉菜单 5：文本域 6：附件 7：浮点 8：整型 9：长文本类型 longtext 
                switch ($data['field_type']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 6:
                        $fileType='varchar(150) not null default ""';
                        break;
                    case 5:
                        $fileType='varchar(600) not null default ""';
                        break;
                    case 7:
                        $fileType='float not null default "0.0"';
                        break;
                    case 8:
                        $fileType='int not null default "0"';
                        break;
                    case 9:
                        $fileType='longtext';
                        break;
                    default:
                        $fileType='varchar(150) not null default ""';
                        break;
                }
                $sql="alter table {$tableName} add {$data['field_ename']} {$fileType}";
                Db::execute($sql);
                $this->success('添加字段成功！','lst');
       }else{
        $this->error('添加失败');
       }
       }
     $modelRes=db('model')->field('id,model_name')->select();
      $this->assign([
          'modelRes'=>$modelRes,
          ]);
     return view();
    }
   
//分页
    public function lst()
    {
       $lstRes=db('model_fields')->alias('a')->field('a.*,b.model_name')->join('model b','a.model_id=b.id')->paginate(3);
       $this->assign(
       array(
         'lstRes'=> $lstRes,
       )
       );
       return view();
   }

        //修改
    public function edit(){

      if(request()->isPost()){
        $data=input('post.');
        $modelRes=db('model_fields')->alias('a')->field('a.field_ename,b.table_name')->join('model b','a.model_id=b.id')->find($data['id']);
        $tableName=config("database.prefix").$modelRes['table_name'];
        $field_ename=$modelRes['field_ename'];
        //过滤中文"，"
          if($data['field_values']){
              $data['field_values']=str_replace('，', ',', $data['field_values']);
          }
          //验证数据
          $validate=validate('model_fields');
          if(!$validate->scene('edit')->check($data)){
              $this->error($validate->getError());
          }
        $update=db('model_fields')->update($data);
        if($update!==false){
          switch ($data['field_type']) {
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 6:
                        $fileType='varchar(150) not null default ""';
                        break;
                    case 5:
                        $fileType='varchar(600) not null default ""';
                        break;
                    case 7:
                        $fileType='float not null default "0.0"';
                        break;
                    case 8:
                        $fileType='int not null default "0"';
                        break;
                    case 9:
                        $fileType='longtext';
                        break;
                    default:
                        $fileType='varchar(150) not null default ""';
                        break;
                }
            $sql="alter table {$tableName} change {$modelRes['field_ename']} {$data['field_ename']} {$fileType}";
            Db::execute($sql);
          $this->success('字段修改成',url('lst'));
        }else
        {
          $this->error('字段修改失败');
        }

      }
     $modelFields=db('model_fields')->find(input('fid'));
     $modelRes=db('model')->field('id,model_name')->select();
      $this->assign([
          'modelRes'=>$modelRes,
         'modelFields'=>$modelFields,
          ]);
        return view();
    }
    //s删除
   public function del(){
   $fid=input('fid');
   $modelRes=db('model_fields')->alias('a')->field('a.field_ename,b.table_name')->join('model b','a.model_id=b.id')->find($fid);
   $tableName=config("database.prefix").$modelRes['table_name'];
   $field_ename=$modelRes['field_ename'];

   
   $del=db('model_fields')->delete($fid);
   if($del){
    $sql="alter table {$tableName} drop column {$field_ename}"; 
    DB::execute($sql);

    $this->success('字段删除成功',url('lst'));
   }else{
    $this->error('删除失败');
   }

}
 
   
}
