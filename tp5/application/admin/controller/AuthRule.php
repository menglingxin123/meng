<?php
namespace app\admin\controller;
class AuthRule extends Common
{
    public function add(){
        if(request()->isPost()){
            $data=input('post.');
            //验证
            $validate=validate('authRule');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $auinsert=db('AuthRule')->insert($data);
            if($auinsert){
                $this->success("添加成功","lst");
            }else{
                $this->error("添加失败");
            }
         }
        $AuthRule=db('AuthRule')->select();
        $authRes=model('AuthRule')->ruletree($AuthRule);
        $this->assign(
          array(
          'authRes'=>$authRes,
            )
            );
        return view();
    }
    public function edit($id){
        if(request()->isPost()){
            $data=input('post.');
            //验证
            $validate=validate('authRule');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $auupdate=db('AuthRule')->update($data);
            if($auupdate!==false){
                $this->success('修改成功','lst');
            }else{
                $this->error('修改失败');
            }
        }
        $AuthRule=db('AuthRule')->select();
        $authRes=model('AuthRule')->ruletree($AuthRule);
        $authrule=db('AuthRule')->find($id);
        $this->assign(
          array(
            'authrule'=>$authrule,
            'authRes'=>$authRes,
            )
            );
        return view();
    }
    public function lst(){
        $AuthRule=db('AuthRule')->select();
        $authRes=model('AuthRule')->ruletree($AuthRule);
        $this->assign(
          array(
          'authRes'=>$authRes,
            )
            );
        return view();
    }
    public function del(){
        $id=input('id');
        $auth=db('AuthRule')->select();
        $ids=model('AuthRule')->children($auth,$id);
        $ids[]=(int)$id;
        $audelete=db('AuthRule')->delete($ids);
        if($audelete){
            $this->success('删除成功','lst');
        }else{
            $this->error('删除失败');
        }
        
    }
	//伸缩
    public function shengsuo(){
        if(request()->isAjax()){
        $id=input('id');
        $auth=db('AuthRule')->select();
        $childrens=model('AuthRule')->children($auth,$id);
        echo json_encode($childrens,true);
      }else{
        $this->error("非法操作");
      }
    }
  
    }


