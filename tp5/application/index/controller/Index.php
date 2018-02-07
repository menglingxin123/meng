<?php
namespace app\index\controller;
class Index extends Common
{
    public function index()
    {
            //首页关于我们
      $about=model('Cate')->getPageContent(2);
      //首页技术服务
      $service=model('Cate')->getPageContent(11);
      //公司新闻
      $news=db('archives')->where(array('cate_id'=>7))->order('id desc')->find();
      //产品中心
      $proRes=db('archives')->where('cate_id','in','(8,9,10)')->order('click desc')->limit(10)->select();
      //首页幻灯广告，广告位id为10
      $ads=db('ad')->where(array('on'=>1,'id'=>93))->find();
      if($ads['type']==1){//图片广告
        $adStr='<a href=""><img src="__INDEX__/ad/{$ads.img_src}" /></a>';
      }else{//轮换广告
        $imgRes=db('adflash')->where(array('ad_id'=>93))->select();
        $adStr='';
        foreach ($imgRes as $k => $v) {
          $flink='javascript:;';
          if($v['flink']){
            $flink=$v['flink'];
          }
          $adStr.='<div class="carousel-item"><div class="carousel-img"><a href="'.$flink.'" target=""><img src="__INDEX__/ad/'.$v['fimg_src'].'" height="550" /></a></div></div>';
        }
      }
    	$cate['id']=0;
    	$this->assign(
	       array(
               'topcid'=>'index',
               'cate'=>$cate,
               'about'=>$about,
               'service'=>$service,
               'news'=>$news,
               'proRes'=>$proRes,
               'adStr'=>$adStr,
	       )
    	);

       return $this->fetch($this->getTemp().'/index');
    }
}
