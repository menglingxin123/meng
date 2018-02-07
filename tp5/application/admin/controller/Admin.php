<?php
namespace app\admin\controller;
class Admin extends Common
{
    public function lst()
    {
         $adminRes=db('admin')->alias('a')->field('a.*,g.title')->join('auth_group g','a.groupid=g.id')->paginate(2);
         $this->assign(
           array(
             'adminRes'=>$adminRes
            )
            );
          return view();
    }

    /**
     * @return \think\response\View
     */
    public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
             $validate =validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $data['password']=md5($data['password']);
            $data['create_time']=time();
            $data['last_time']=time();
            $add=db('admin')->insertGetId($data);
             $_data=array();//对应管理员和用户组
            $_data['uid']=$add;
            $_data['group_id']=$data['groupid'];
            $addGroupAccess=db('authGroupAccess')->insert($_data);
            if($add){
                $this->success('管理员添加成功','lst');

            }else{
                $this->error('管理员添加失败');
            }
        }
                //所属用户组
        $groupRes=db('authGroup')->select();
        $this->assign([
            'groupRes'=>$groupRes,
            ]);

        return view();
    }

    public function edit($id){
        if(request()->isPost()){
            $data=input('post.');
            $validate =validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            if(isset($data['password'])&&!empty($data['password'])){
                $data['password']=md5($data['password']);
            }else{
                unset($data['password']);
            }
            $adupdate=db('admin')->update($data);
            db('authGroupAccess')->where(array('uid'=>$data['id']))->update(['group_id'=>$data['groupid']]);
            if($adupdate!==false){
                $this->success('修改成功','lst');
            }else{
                $this->error('修改失败');
            }
        }
        $admins=db('admin')->find($id);
        $groupRes=db('authGroup')->select();
        $this->assign(
           array(
            'admins'=>$admins,
            'groupRes'=>$groupRes,
            )
            );
         
    	return view();
    }

     public function del($id){
        if($id==1){
            $this->error('超级管理员不允许删除！');
        }
        $del=db('admin')->delete($id);
        if($del){
            $this->success('删除管理员成功！','lst');
        }else{
            $this->error('删除管理员失败！');
        }
    }
    public function changeStatus(){
        $id=input('id');
        $admin=db('admin')->find($id);
        if($admin['status']==1){
            db('admin')->where(array('id'=>$id))->setField('status',0);;
        }else{
             db('admin')->where(array('id'=>$id))->update(['status'=>1]);
        }
    }



}

