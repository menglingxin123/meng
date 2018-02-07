<?php
namespace app\admin\controller;
use think\Db;
class Content extends Common
{
    public function add()
    {

       $cateid=input('cateid');
       $modelid=input('modelid');
       if(!$cateid || !$modelid){
          exit("非法操作");
       }
            if(!$modelid){
        $modelId=0;
      }
       if(request()->isPost()){
          $data=input('post.');

          foreach($_FILES as $k=>$v){
            if($v['tmp_name']!=" "){
             $file = request()->file($k);
            
            // 移动到框架应用根目录/public/uploads/ 目录下
              if($file){
                  $info = $file->move(ROOT_PATH . 'public/static/index/uploads/img');
                  if($info){
                      // 成功上传后 获取上传信息
                      // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                   $data[$k]=$info->getSaveName();
        
                  }else{
                      // 上传失败获取错误信息
                      echo $file->getError();
                  }
              }
          }
          }
          foreach($data as $k=>$v){
            if(is_array($v)){
                $data[$k]=implode(',',$v);
            }
          }
           $data['time']=time();
           $tableName=db('model')->field('table_name')->find($modelid);//获取附加表名称
           $tableName=$tableName['table_name'];
           $adda=model('Archives')->allowField(true)->save($data);

           $data['aid']=model('Archives')->getLastInsID();

           $adds=model($tableName)->allowField(true)->save($data);
           
            if($adda&&$adds){
                $this->success('添加数据成功！','lst');
            }else{
                $this->error('添加数据失败！');
            }
            return;
       }

	   //获取栏目
	   $_cateRes=db('cate')->select();
	   $cateRes=model('Cate')->catetree($_cateRes);
	   $diyFields=db('model_fields')->where(['model_id'=>$modelid])->select();
       $this->assign(
        array(
        	'modelid'=>$modelid,
        	'cateRes'=>$cateRes,
        	'cateId'=>$cateid,
        	'diyFields'=>$diyFields
        )
       );
       return view();
      }
   

    public function lst()
    {
    	$modelid=input('modelid');
    	$cateid=input('cateid');
    	if(!$modelid){
    		$modelId=0;
    	}
    	 //获取当前模型自定义字段
      $archives=db('archives')->alias('a')->field('a.id,a.title,a.attr,a.model_id,b.table_name,c.cate_name')->join('cate c','a.cate_id=c.id')->join('model b','a.model_id=b.id')->order('id DESC')->paginate(5);;
    	$this->assign([
    		'modelId'=>$modelid,
    		'cateId' =>$cateid,
        'archives'=>$archives
    		]);

       return view();
   }
     public function edit()
    {
       $artid=input('art_id');
       $modelid=input('model_id');

      if(!$modelid){
        $modelId=0;
      }
      if(request()->isPost()){
          $data=input('post.');

          if($_FILES){
          foreach($_FILES as $k=>$v){
            if($v['tmp_name']!=" "){
             $file = request()->file($k);
            
            // 移动到框架应用根目录/public/uploads/ 目录下
              if($file){
                  $info = $file->move(ROOT_PATH . 'public/static/index/uploads/img');
                  if($info){
                      // 成功上传后 获取上传信息
                      // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                   $data[$k]=$info->getSaveName();
        
                  }else{
                      // 上传失败获取错误信息
                      echo $file->getError();
                  }
              }
          }
          }
          }
          foreach($data as $k=>$v){
            if(is_array($v)){
                $data[$k]=implode(',',$v);
            }
          }
           $data['time']=time();
           // dump($data);die;
           $tableName=db('model')->field('table_name')->find($modelid);//获取附加表名称
           $tableName=$tableName['table_name'];
           $adda=model('Archives')->allowField(true)->save($data,['id'=>$artid]);
           $adds=model($tableName)->allowField(true)->save($data,['aid'=>$artid]);
            if($adda!==false&&$adds!==false){
                $this->success('修改数据成功！','lst');
            }else{
                $this->error('修改数据失败！');
            }
            return;
       }
        //获取文章的所属附表
       $models=db('model')->field('table_name')->find($modelid);
       $tableName=$models['table_name'];
       //获取副表信息
       $diyvals=db($tableName)->where('aid',$artid)->find();
       //获取主表信息
        $arts=db('archives')->find($artid);

           //获取栏目
       $_cateRes=db('cate')->select();
       $cateRes=model('cate')->catetree($_cateRes);
       $diyFields=db('model_fields')->where(['model_id'=>$modelid])->select();
         $this->assign(
          array(
            'modelid'=>$modelid,
            'cateRes'=>$cateRes,
            'diyFields'=>$diyFields,
            'diyvals'=>$diyvals,
            'arts'=>$arts
          )
         );
       return view();
   }
  public function ajaxDelImg(){
     $aid=input('aid');
     $model_id=input('model_id');
     $field_name=input('field_name');
     //获取附加表名称
     $models=db('model')->find($model_id);
     $tableName=$models['table_name'];
     $tableName=ucfirst($tableName);
     $jl=db($tableName)->where(array('aid'=>$aid))->find();
     $imgSrc=INDEXIMG.$jl[$field_name];
     @unlink($imgSrc);
     $save=db($tableName)->where(array('aid'=>$aid))->setField($field_name,'');
        if($save){
            echo 1;//删除图片成功
        }else{
            echo 2;//删除图片失败
        }
  }
  
    public function upimg()
    {
     if($_FILES['img']['tmp_name'] != ''){
        $file = request()->file('img');
    
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    if($file){
	        $info = $file->move(ROOT_PATH . 'public/static/index/uploads/img');
	        if($info){
            if($this->config['thumb']=='是'){
                $thumb_width=$this->config['thumb_width'];
                $thumb_height=$this->config['thumb_height'];
                $water_pos=$this->config['water_pos'];
                $tmd=$this->config['tmd'];
                //缩略图裁剪方式
                switch ($this->config['thumb_way']) {
                    case '等比例缩放':
                        $thumb_way=1;
                        break;
                    case '缩放后填充':
                        $thumb_way=2;
                        break;
                    case '居中裁剪':
                        $thumb_way=3;
                        break;
                    case '左上角裁剪':
                        $thumb_way=4;
                        break;
                    case '右下角裁剪':
                        $thumb_way=5;
                        break;
                    case '固定尺寸缩放':
                        $thumb_way=6;
                        break;
                    
                    default:
                        $thumb_way=1;
                        break;
                }

                //水印图位置
                switch ($this->config['water_pos']) {
                    case '左上角':
                        $thumb_pos=1;
                        break;
                    case '上居中':
                        $thumb_pos=2;
                        break;
                    case '右上角':
                        $thumb_pos=3;
                        break;
                    case '左居中':
                        $thumb_pos=4;
                        break;
                    case '居中':
                        $thumb_pos=5;
                        break;
                    case '右居中':
                        $thumb_pos=6;
                        break;
                    case '左下角':
                        $thumb_pos=7;
                        break;
                    case '下居中':
                        $thumb_pos=8;
                        break;
                    case '右下角':
                        $thumb_pos=9;
                        break;
                    default:
                        $thumb_pos=9;
                        break;
                }
                //数据处理
                $imgSrc=INDEXIMG.$info->getSaveName();
                $image = \think\Image::open($imgSrc);
                // $water=INDEXIMG.'water.png';//水印图片__ADMIN__/uploads/
                $water=ADMIN_STATIC.'/uploads/'.$this->config['water_img'];
                if($this->config['water']=='是'){
                    $image->thumb($thumb_width, $thumb_height,$thumb_way)->water($water,$thumb_pos,$tmd)->save($imgSrc);//生成缩略图、删除原图以及添加水印
                }else{
                    $image->thumb($thumb_width, $thumb_height,$thumb_way)->save($imgSrc);//生成缩略图、删除原图以及添加水印
                }
                
            }
            // 成功上传后 获取上传信息
            echo $info->getSaveName();
        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	        }
        }

     }
   }


    //s删除
   public function del(){
    $artId=input('art_id');
    $modelId=input('model_id');
    $archives=db('archives')->field('litpic')->find($artId);
    if($archives['litpic']){
        $litpicSrc=INDEXIMG.$archives['litpic'];
        if(file_exists($litpicSrc)){
            @unlink($litpicSrc);
        }
    }
    $delArchives=db('archives')->delete($artId);
    $models=db('model')->field('table_name')->find($modelId);
    $addTable=$models['table_name'];
    $delAdds=db($addTable)->where(array('aid'=>$artId))->delete();
    if($delArchives && $delAdds){
        $this->success('删除文章成功！');
    }else{
        $this->error('删除文章失败！');
    }
   }
    public function addselect(){
        //获取栏目
        $_cateRes=db('cate')->select();
        $cateRes=model('cate')->catetree($_cateRes);
        $this->assign([
            'cateRes'=>$cateRes,
            ]);
        return view();
    }
        public function ajaxGetModelId($cateid){
        $cates=db('cate')->field('model_id')->find($cateid);
        echo json_decode($cates['model_id']);
    }
   //撤销图片
   public function delimg(){
    $imgurl=INDEXIMG.input('imgurl');
    $cateid=input('cateid');
    $res=unlink($imgurl);
    if($cateid){
      db('cate')->where('id',$cateid)->setField('img','');
    }
    if($res){
      echo 1;
    }else{
      echo 2;
    }

   }




         
}
