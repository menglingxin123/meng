<?php
namespace app\admin\controller;
class Ad extends Common
{
    public function lst()
    {
        $adlst=db('ad')->alias('a')->field('a.id,a.ad_name,a.on,a.type,a.adpos_id,b.name')->join('adpos b','a.adpos_id=b.id')->paginate('5');
        $this->assign(
           array(
            'adlst'=>$adlst
            )
            );
        return view('list');
    }

    public function add()
    {
        if(request()->isPost()){
            $data=input('post.');
            $add=model('Ad')->allowField(true)->save($data);
            if($add){
                $this->success('添加成功',url('lst'));
            }else{
                $this->error('添加失败');
            }
        }
        $adposRes=db('adpos')->select();
        $this->assign(array(
           'adposRes'=>$adposRes
        ));
        return view();
    }

    public function edit($id){
        if(request()->isPost()){
            $data=input('post.');
            $ad=model('Ad');
            $adsave=$ad->allowField(true)->save($data,['id'=>$data['id']]);
            if($adsave!==false){
                $this->success('广告修改成功','lst');
            }else{
                $this->error('广告修改失败');
            }
        }
        $adposRes=db('adpos')->field('id,name')->select();
        $ad=db('ad')->find($id);
        if($ad['type']==2){
            $adflashRes=db('adflash')->where('ad_id',$id)->select();
            $this->assign(
            array(
            'adflashRes'=>$adflashRes
                )
                );

        }else{
         $this->assign(
            array(
            'adflashRes'=>'',
                )
                );

        }
        $this->assign([
        'ad'=>$ad,
        'adposRes'=>$adposRes
        ]);
         
    	return view();
    }

    public function del($id){
        $ad=model('Ad');
        $addelete=$ad::destroy(['id' =>$id]);
        if($addelete){
            $this->success('删除广告成功！','lst');
        }else{
           $this->error('删除广告失败！');

        }
    }
    //ajax 改变状态
    public function changestatus(){
        $id=input('id');
        $adposId=input('adposId');
        $ad=db('ad')->field('on')->where('id',$id)->find();
        if($ad['on']===0){
        db('ad')->where('adpos_id',$adposId)->update(array('on'=>0));
        db('ad')->where('id',$id)->update(array('on'=>1));
        }else{
            db('ad')->where('id',$id)->update(array('on'=>0));
        }

    }
    public function ajaxdel(){
    	 $id=input('id');
    	 $adflash=db('adflash')->find($id);
    	 $fimgsrc=INDEXAD.$adflash['fimg_src'];
    	 if(file_exists($fimgsrc)){
    	 	@unlink($fimgsrc);
    	 };
    	 $addelete=db('adflash')->where('id',$id)->delete();
    	 if($addelete){
    	 	echo 1;
    	 }else{
    	 	echo 2;
    	 }

    }
}

