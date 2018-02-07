<?php
namespace app\admin\controller;
class Conf extends Common
{
    public function add()
    {

      if(request()->isPost()){
        $param=$this->request->param();
        $validate=validate('conf');
        if(!$validate->scene('add')->check($param)){
          $this->error($validate->getError());
        }
        $add=db('conf')->insert($param);
        if($add){
          $this->success('添加配置成功',url('lst'));
        }else{
          $this->error('添加配置失败');
        }
      }
       return view();
      }
   

    public function conflst()
    {
       if(request()->isPost()){

          $data=input('post.');
          //获取数据表conf ename这列的所有数据
          $enameArr=db('conf')->column('ename');
          //获取数据表conf dt_type等于6 ename这列的所有数据
          $imgcolumn=db('conf')->where('dt_type',6)->column('ename');
          $confArr=array();
          //遍历提交获取到的数据
         foreach($data as $k=>$v){
          $confArr[]=$k;
          if(is_array($v)){
             $v=implode(',', $v);
          }
          $update=db('conf')->where('ename',$k)->update(['value'=>$v]);
          if($update===false){
          $this->error('修改错误');
          }
         }
         //遍历所有ename 主要是checked修改
         foreach($enameArr as $k=>$v){
          if(!in_array($v,$confArr)&&!in_array($v,$imgcolumn)){
             $update=db('conf')->where('ename',$v)->update(['value'=>'']);
             if($update===false){
                $this->error('修改错误');
              }
          }
         }
         //遍历上传图片
         foreach($imgcolumn as $k=>$v){
           if($_FILES[$v]['tmp_name']!==''){

                          // 获取表单上传文件 例如上传了001.jpg
              $file = request()->file($v);
              
              // 移动到框架应用根目录/public/uploads/ 目录下
              if($file){
                  $info = $file->move(ROOT_PATH .'public/static/admin/uploads');
                  if($info){
                      // 成功上传后 获取上传信息
                      // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                      $imgSrc=$info->getSaveName();
                      if($imgSrc!=''){
                       db('conf')->where('ename',$v)->update(['value'=>$imgSrc]);
                    }
                  }else{
                      // 上传失败获取错误信息
                      $this->error($file->getError());
                  }
              }
           }
         }

           $this->success('修改配置成功！',url('conflst'));
       }

       $confRes=db('conf')->select();
       $this->assign('confRes',$confRes);
       return view();
   }

    public function edit($id)
    {
        if($this->request->isPost()){
          $data=input('post.');
          $validate=validate('conf');
          if(!$validate->scene('edit')->check($data)){
            $this->error($validate->getError());
          }
          $save=db('conf')->update($data);
          if($save!==false){
               $this->success('修改配置成功！',url('lst')); 
            }else{
                $this->error('修改配置失败！');
            }
        }      
        $confs=db('conf')->find($id);
        $this->assign('confs',$confs);
        return view();
    }
    public function lst()
    {
      $confRes=db('conf')->field('id,cname,ename,value,values')->paginate(6);
      $this->assign('confRes',$confRes);
       return view();
   }
       public function del($id)
    {
      $del=db('conf')->delete($id);
        if($del){
            $this->success('删除配置项成功！',url('lst'));
        }else{
            $this->error('删除配置失败！');
        }
       return view();
      }
   
}
