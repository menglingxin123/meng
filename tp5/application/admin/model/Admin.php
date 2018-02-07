<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model
{
  public function login($data){
       $uname=$data['uname'];
       $password=md5($data['password']);
       $admins=Admin::get(['uname'=>$uname]);
       if($admins){
        if($admins['status']==0){
          return 4;
        }
        $_password=$admins['password'];
        if($_password==$password){
          session('uname',$uname);
          session('id',$admins['id']);
          return 1;
        }else{
          return 2;
        }

       }else{
        return 3;
       }

  }


   
}
