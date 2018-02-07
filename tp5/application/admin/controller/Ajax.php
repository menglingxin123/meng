<?php
namespace app\admin\controller;
use think\Controller;
class Ajax extends Controller
{
        public function adminchangeStatus(){
        $id=input('id');
        $admin=db('admin')->find($id);
        if($admin['status']==1){
            db('admin')->where(array('id'=>$id))->setField('status',0);;
        }else{
             db('admin')->where(array('id'=>$id))->update(['status'=>1]);
        }
    } 
}

