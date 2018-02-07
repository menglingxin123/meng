<?php
namespace app\admin\model;
use think\Model;
class Ad extends Model
{


    protected static function init()
    {    //前置钩子增加
        Ad::beforeInsert(function ($ad) {

          $data=$ad->data;
              if($data['type']==1){
                           

                if($_FILES['img_src']['tmp_name']){
                    $file = request()->file('img_src');
                    $info = $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                    if($info){

                        $imgSrc=$info->getSaveName();
                       $ad->data['img_src']=$imgSrc;
                    }
                }
             if($data['on']==1){
                db('ad')->where(array('adpos_id'=>$data['adpos_id']))->update(['on'=>0]);
            }
            }
        });
         Ad::afterInsert(function ($ad) {
         $data=$ad->data;
         if($data['type']==2){
         $id=$data['id'];
         foreach ($_FILES['fimg_src']['tmp_name'] as $k => $v) {
          if(!$v){
          	unset($data['flink'][$k]);
          }
         }
         sort($data['flink']);
          if($_FILES['fimg_src']['tmp_name']){
                $files = request()->file('fimg_src');
                foreach($files as $k=>$file){
                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                    if($info){
                      $arr['fimg_src']=$info->getSaveName();
                      $arr['ad_id']=$ad->data['id'];
                      $arr['flink']=$ad->data['flink'][$k];
                      db('adflash')->insert($arr);

                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();

                    }    
                }
         }

         }

        });
        Ad::beforeDelete(function ($ad) {
          $data=$ad->data;
          $adid=$data['id'];
          if($data['type']==1){
            $imgsrc=INDEXAD.$data['img_src'];
            if((file_exists($imgsrc))){
              @unlink($imgsrc);
            }
          }else{
            $adflash=db('adflash')->field('fimg_src,id')->where('ad_id',$adid)->select();
            foreach($adflash as $k=>$v){
              $fimg_src=INDEXAD.$v['fimg_src'];
              if(file_exists($fimg_src)){
                @unlink($fimg_src);
              }
            
            }
              db('adflash')->where(array('ad_id'=>$adid))->delete();
          }


        });
           Ad::beforeUpdate(function ($ad) {
            if($ad['type']==1){

            if($_FILES['img_src']['tmp_name']){
                  $oldimgsrc=INDEXAD.$ad['oldimgsrc'];
                  if(file_exists($oldimgsrc)){
                    @unlink($oldimgsrc);
                  }

              $file = request()->file('img_src');
              // 移动到框架应用根目录/public/uploads/ 目录下
              if($file){
                  $info = $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                  if($info){
                     $ad['img_src']=$info->getSaveName();
                  }
              }
             

            }
            if($ad['on'] == 1){
                    Ad::where('adpos_id',$ad['adpos_id'])->update(['on'=>0]);
                }

        }elseif($ad['type']==2){

             if(!empty($_FILES['fimg_src']['tmp_name'][0])){
            
                foreach ($_FILES['fimg_src']['tmp_name'] as $k => $v) {
                        if(!$v){
                        unset($ad->data['flink'][$k]);
                                                  }
                    }
                    sort($ad->data['flink']);
              $files = request()->file('fimg_src');
                foreach($files as $k=>$file){
                    // 移动到框架应用根目录/public/uploads/ 目录下
                    $info = $file->move(ROOT_PATH . 'public/static/index' . DS . 'ad');
                    if($info){
                      $arr['fimg_src']=$info->getSaveName();
                      $arr['ad_id']=$ad->data['id'];
                      $arr['flink']=$ad->data['flink'][$k];
                      db('adflash')->insert($arr);

                    }else{
                        // 上传失败获取错误信息
                        echo $file->getError();

                    }    
                }

            }
                 
                    foreach ($ad['oldflink'] as $k => $v) {
                        db('adflash')->where(array('id'=>$k))->update(['flink'=>$v]);
                    }
                
            if($ad['on'] == 1){
                    Ad::where('adpos_id',$ad['adpos_id'])->update(['on'=>0]);
                }
        }


        });


    }


    

   
}
