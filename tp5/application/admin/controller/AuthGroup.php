<?php
namespace app\admin\controller;
class AuthGroup extends Common
{
    public function lst(){
        $authRes=db('AuthGroup')->paginate(2);
        $this->assign(array(
             'authRes'=>$authRes,
            ));
        return view();
    }
    public function add(){
         if(request()->isPost()){
            $data=input('post.');
            //验证
            $validate=validate('authGroup');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }
            $insert=db('AuthGroup')->insert($data);
            if($insert){
            $this->success('添加成功','lst');
            }else{
                $this->error('添加失败');
            }
         }
         return view();
    }
    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            //验证
            $validate=validate('authGroup');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            $save=db('authGroup')->update($data);
            if($save!==false){
                $this->success('修改用户组成功！','lst');
            }else{
                $this->error('修改用户组失败！');
            }
            return;
        }
        $id=input('id');
        $authGroups=db('authGroup')->find($id);
        $this->assign([
            'authGroups'=>$authGroups,
            ]);
        return view();
    }
    public function del($id){
        //删除用户组前，先删除该用户组下所有管理员
        // $delAdmin=db('admin')->where(array('groupid'=>$id))->delete();
        $del=db('authGroup')->delete($id);
        if($del && $delAdmin){
            $this->success('删除用户组成功！','lst');
        }else{
            $this->error('删除用户组失败！');
        }
    }
     //分配权限
    public function power(){
        if(request()->isPost()){
            $data=input('post.');
            $rules=implode(',', $data['rules']);
            $save=db('authGroup')->where(array('id'=>$data['id']))->update(['rules'=>$rules]);
            if($save !== false){
                $this->success('分配权限成功！');
            }else{
                $this->error('分配权限失败！');
            }
            return;
        }
        $data=db('authRule')->where(['pid'=>0])->select();
        foreach ($data as $k => $v) {
            $data[$k]['children']=db('authRule')->where(['pid'=>$v['id']])->select();
            foreach ($data[$k]['children'] as $k1 => $v1) {
                $data[$k]['children'][$k1]['children']=db('authRule')->where(['pid'=>$v1['id']])->select();
            }
        }
        $id=input('id');
        $authGroups=db('authGroup')->find($id);
        $rules=explode(',',$authGroups['rules']);
        $this->assign([
            'authGroups'=>$authGroups,
            'data'=>$data,
            'rules'=>$rules,
            ]);
        return view();
    }
public function changeStatus(){
          $id=input('id');
        $authGroups=db('authGroup')->field('status')->find($id);
        if($authGroups['status']==1){
            db('authGroup')->where(array('id'=>$id))->update(['status'=>0]);
        }else{
            db('authGroup')->where(array('id'=>$id))->update(['status'=>1]);
        }
}

}

