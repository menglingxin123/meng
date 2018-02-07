<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:34:"template/default/index_article.htm";i:1514718404;s:25:"template/default\head.htm";i:1514904703;s:29:"template/default\position.htm";i:1514712243;s:25:"template/default\left.htm";i:1514645120;s:27:"template/default\footer.htm";i:1514819269;}*/ ?>
<!DOCTYPE html>
<head id="Head">
<script type="text/javascript">var allpane = 'headerAreaA|mainArea|sidebarAreaA|footerAreaA|bottomAreaA|fixedBottomArea|fixed-left|fixed-right|popup-area';</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="author" content="order by thinkphp5"/>
<title>thinkphp5</title>
<meta name="keywords" content="<?php echo $cates['keywords']; ?>"/>
<meta name="description" content="<?php echo $cates['desc']; ?>"/>
<meta http-equiv="PAGE-ENTER" content="RevealTrans(Duration=0,Transition=1)"/>
<link id="qhddefaultcontent2075_css" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/qhdcontent.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_content_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/content.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_menu_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/menu.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_jquery_fancybox_1_3_4_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/jquery.fancybox-1.3.4.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_pgwslideshow_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/pgwslideshow.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_animate_min_css?ver=1_0" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/animate.min.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_style_css?ver=1_2" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/style.css"/>
<link id="_Portals__default_Skins_Biotechnology_Html_css_style_PurpleAndPink_css" rel="stylesheet" type="text/css" href="<?php echo $temp_src; ?>/css/style-purpleandpink.css"/>
<style>html{background-image:url(<?php echo $temp_src; ?>/img/bg-rep-02.png);}</style>
<!--[if lt IE 9]>
 <script src="<?php echo $temp_src; ?>/js/html5.js"></script>
<![endif]--><!--[if IE 6]>
 <script type="text/javascript" src="<?php echo $temp_src; ?>/js/ie7.js"></script>
 <script type="text/javascript" src="<?php echo $temp_src; ?>/js/dd_belatedpng.js"></script>
 <script type="text/javascript">
  DD_belatedPNG.fix('.top img, .footer img, .bottom img, .form-btn, .module-icon-default');
 </script>
<![endif]-->
<meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
</head>
<body class="font-zh-CN" style="background:url(<?php echo $temp_src; ?>/img/bg-img-04.jpg) top center fixed;">
<form name="Form" method="post" action="/about_01/language_zh-CN" id="Form" enctype="multipart/form-data" style="height:inherit">
<div>
<input type="hidden" name="__VIEWSTATE_CACHEKEY" id="__VIEWSTATE_CACHEKEY" value="VS_1gt5cusxepf1f22pwhu5geeh_/about_01/language_zh-CN"/>
</div>
<script src="<?php echo $temp_src; ?>/js/a1portalcore.js" type="text/javascript"></script><script src="<?php echo $temp_src; ?>/js/a1portal.js"></script><script src="<?php echo $temp_src; ?>/js/jquery-1.7.2.min.js"></script><script src="<?php echo $temp_src; ?>/js/superfish.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.caroufredsel.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.touchswipe.min.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.tools.min.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.fancybox-1.3.4.pack.js"></script><script src="<?php echo $temp_src; ?>/js/pgwslideshow.min.js"></script><script src="<?php echo $temp_src; ?>/js/jquery.fixed.js"></script><script src="<?php echo $temp_src; ?>/js/cloud-zoom.1.0.2.min.js"></script><script src="<?php echo $temp_src; ?>/js/device.min.js"></script><script src="<?php echo $temp_src; ?>/js/html5media-1.2.js"></script><script src="<?php echo $temp_src; ?>/js/animate.min.js"></script><script src="<?php echo $temp_src; ?>/js/custom.js"></script>
<div id="wrapper" class="insi-page"> 
<header class="top header-v1 desktops-section default-top">   
<div class="top-main">
<div class="page-width clearfix">
<div class="logo" skinobjectzone="HtmlLogo_399"><a href="/"><img src="<?php echo $temp_src; ?>/img/472d1f03-0560-4338-846b-b29ac61e993a_0_80.png" alt="中英双语响应式生物科技实验室类模板(自适应)"/></a></div>
  
<nav class="nav">
<div class="main-nav clearfix" skinobjectzone="menu_461">
<ul class="sf-menu">
<li  <?php if($topcid == 'index'): ?> class="current" <?php endif; ?>> <a class="first-level" href="<?php echo url('index/Index/index'); ?>" target=""><strong>网站首页</strong></a><i></i></li>
<?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
  <li <?php if($cate['id'] == $topcid): ?> class="current" <?php endif; ?> >
    <a class="first-level" href="
    <?php if($cate['cate_attr'] == 1): ?><?php echo url('index/Cate/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 2): ?><?php echo url('index/Page/index',array('cid'=>$cate['id'])); endif; if($cate['cate_attr'] == 3): ?><?php echo $cate['link']; endif; ?>
    "><strong><?php echo $cate['cate_name']; ?></strong></a><i></i>
      <?php if($cate['children']): ?>
        <ul>
        <?php if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sonCate): $mod = ($i % 2 );++$i;?>
        <li><a href="
          <?php if($sonCate['cate_attr'] == 1): ?><?php echo url('index/Cate/index',array('cid'=>$sonCate['id'])); endif; if($sonCate['cate_attr'] == 2): ?><?php echo url('index/Page/index',array('cid'=>$sonCate['id'])); endif; if($sonCate['cate_attr'] == 3): ?><?php echo $sonCate['link']; endif; ?>
        "><strong><?php echo $sonCate['cate_name']; ?></strong></a></i></li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      <?php endif; ?>
  </li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
 </div>
</div>
 
<div class="clear"></div>
</header>
 
<div class="touch-top mobile-section clearfix">
<div class="touch-top-wrapper clearfix">
<div class="touch-logo" skinobjectzone="HtmlLogo_2643"><a class="" href="/"><img src="<?php echo $temp_src; ?>/img/472d1f03-0560-4338-846b-b29ac61e993a_0_80.png" alt="中英双语响应式生物科技实验室类织梦模板(自适应)"/></a></div>
 
<div class="touch-navigation">
<div class="touch-toggle">
<ul>
<li class="touch-toggle-item-first"></li>
<li class="touch-toggle-item-last"><a href="javascript:;" class="drawer-menu" data-drawer="drawer-section-menu"><i class="touch-icon-menu"></i><span>导航</span></a></li>
</ul>
</div>
</div>
 </div>
 
<div class="touch-toggle-content touch-top-home">
<div class="drawer-section drawer-section-menu">
<div class="touch-menu" skinobjectzone="menu_3142">
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
     
     $(".touch-toggle a").click(function(event){
      var className = $(this).attr("data-drawer");
      
      if( $("."+className).css('display') == 'none' ){      
       $("."+className).slideDown().siblings(".drawer-section").slideUp();
      }else{
       $(".drawer-section").slideUp(); 
      }
      event.stopPropagation();
     });
     
     /*$(document).click(function(){
      $(".drawer-section").slideUp();     
     })*/
     
     $('.touch-menu a').click(function(){     
      if( $(this).next().is('ul') ){
       if( $(this).next('ul').css('display') == 'none' ){
        $(this).next('ul').slideDown();
        $(this).find('i').attr("class","touch-arrow-up");     
       }else{
        $(this).next('ul').slideUp();
        $(this).next('ul').find('ul').slideUp();
        $(this).find('i').attr("class","touch-arrow-down");
       }   
      }
     });
    });
</script></div>
 </div>
   
<div id="a1portalSkin_headerAreaA" class="header"> <a name="31443" id="31443"></a>
<div class="module-default">
<div class="module-inner">
<div id="a1portalSkin_ctr8921989219_mainArea" class="module-content">  
<div class="slideshow slideshow-min carousel clearfix" style="height:350px; overflow:hidden;">
<div id="carousel-89219">
<div class="carousel-item">
<div class="carousel-img"><a href="javascript:;" target=""><img src="<?php echo $temp_src; ?>/img/6acd039f-37c8-4b2c-9790-cce6b928df8c_0_350.jpg" height="350" alt=""/></a></div>
</div>
</div>
<div class="carousel-btn carousel-btn-fixed" id="carousel-page-89219"></div>
</div>
<script type="text/javascript">
 $(window).bind("load resize",function(){
  $("#carousel-89219").carouFredSel({
   width       : '100%',
   items  : { visible : 1 },
   auto     : { pauseOnHover: true, timeoutDuration:5000 },
   swipe     : { onTouch:true, onMouse:true },
   pagination  : "#carousel-page-89219",
   scroll   : { fx : "crossfade" }
  }); 
 });
</script>  </div>
</div>
</div>
</div>
  
<section class="main">
<div class="page-width clearfix"> 
<section class="content float-right"> 
<section class="page-title page-title-inner clearfix"> 
<div class="breadcrumbs float-right" skinobjectzone="HtmlBreadCrumb_3803"><span>当前位置：</span><a href='<?php echo url('index/index'); ?>'>主页</a> >
  <?php if(is_array($position) || $position instanceof \think\Collection || $position instanceof \think\Paginator): $i = 0; $__LIST__ = $position;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pos): $mod = ($i % 2 );++$i;?>
  <a href="
    <?php if($pos['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$pos['id'])); endif; if($pos['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$pos['id'])); endif; if($pos['cate_attr'] == 3): ?><?php echo $pos['link']; endif; ?>
    "><?php echo $pos['cate_name']; if($i != count($position)): ?>><?php endif; ?></a>
  <?php endforeach; endif; else: echo "" ;endif; ?>

</div>

  
<div class="page-name float-left">
<h2><?php echo $cates['cate_name']; ?></h2>
</div>
 </section>
 
<div id="a1portalSkin_mainArea" class="content-wrapper"> <a name="31444" id="31444"></a>
  <div class="module-default">
    <div class="module-inner">
      <div id="a1portalSkin_ctr8922089220_mainArea" class="module-content"> 
        <div class="qhd-content">
        <?php echo $cates['content']; ?>
        </div>
      </div>
  </div>
</div>
 
<div class="track"><i></i></div>
<script>
     $(document).ready(function(){
      var sidebarHeight = $(".sidebar").height();
      var contentHeight = $(".content").height();
      if(sidebarHeight>contentHeight){
       $(".track").height(sidebarHeight);
      }
     });
</script> </section>
  
<section class="sidebar float-left"> 
<section class="page-menu" skinobjectzone="menu_4014">
<div class="page-menu-title">
<h3><?php echo $topCates['cate_name']; ?></h3>
</div>
<div class="page-menu-content">
<ul>
<?php if(is_array($sonCateRes) || $sonCateRes instanceof \think\Collection || $sonCateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $sonCateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scate): $mod = ($i % 2 );++$i;?>
<li <?php if($scate['id'] == $cid): ?> class="current" <?php endif; ?>><a href="
    <?php if($scate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 3): ?><?php echo $scate['link']; endif; ?>
    "><?php echo $scate['cate_name']; ?></a><i></i></li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
  <script type="text/javascript">
                   $(document).ready(function(){
        $('.page-menu-content ul').find('li:last').addClass('last');
        
        $('.page-menu-content > ul > li > a').click(function(){
         if( $(this).parent('li').find('ul') ){
          $(this).parent('li').find('ul').slideDown('fast');
          $(this).parent('li').siblings('li').find('ul').slideUp('fast');
          $(this).parent('li').addClass('current').siblings('li').removeClass('current');
         }
        }); 
        
       });
</script></div>
</section>
 
<div class="clear"></div>
<div id="a1portalSkin_sidebarAreaA" class="QHDEmptyArea sidebar-content"></div>
</section>
>
 </div>
</section>
  
<footer class="footer">
      <div class="footer-main">
        <div id="a1portalSkin_footerAreaA" class="page-width clearfix"><!-- Start_Module_89208 --><a name="31438" id="31438"></a>
          <div class="module-default">
            <div class="module-inner">
              <div id="a1portalSkin_ctr8920889208_mainArea" class="module-content"><!-- Start_Module_89208 -->
                <div class="qhd-module">
                  <div class="column">
                  <?php if(is_array($botCateRes) || $botCateRes instanceof \think\Collection || $botCateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $botCateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                 <div class="col-5-1">
                      <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_QHDCPM89208M1" class="qhd_column_contain"><!-- Start_Module_89209 --><a name="31439" id="31439"></a>
                        <div class="module-default">
                          <div class="module-inner">
                            <div class="module-title module-title-default clearfix">
                              <div class="module-title-content clearfix">
                                <h3 style="" class=""><?php echo $cate['cate_name']; ?></h3>
                              </div>
                            </div>
                            <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_ctr8920989209_mainArea" class="module-content"><!-- Start_Module_89209 --><!-- S link-line -->
                              <div class="link link-block">
                                <ul>
                                 <?php if(is_array($cate['children']) || $cate['children'] instanceof \think\Collection || $cate['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scate): $mod = ($i % 2 );++$i;?>
                                  <li><a href="
                                  <?php if($scate['cate_attr'] == 1): ?><?php echo url('Cate/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 2): ?><?php echo url('Page/index',array('cid'=>$scate['id'])); endif; if($scate['cate_attr'] == 3): ?><?php echo $scate['link']; endif; ?>
                                  " target=""><span><?php echo $scate['cate_name']; ?></span></a></li>
                                 <?php endforeach; endif; else: echo "" ;endif; ?>  
                                </ul>
                              </div>
                              <!-- E link-line --><!-- End_Module_89209 --></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                    <div class="col-5-2 last">
                      <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_QHDCPM89208M4" class="qhd_column_contain"><!-- Start_Module_89212 --><a name="31442" id="31442"></a>
                        <div class="module-default">
                          <div class="module-inner">
                            <div class="module-title module-title-default clearfix">
                              <div class="module-title-content clearfix">
                                <h3 style="" class="">广州某某生物科技有限公司</h3>
                              </div>
                            </div>
                            <div id="a1portalSkin_ctr8920889208_Column4C20A20A20A40_ctr8921289212_mainArea" class="module-content"><!-- Start_Module_89212 -->
                              <div class="qhd-content">
                                <p> ICP备********号 &nbsp; &nbsp;Copyright © 2014-2018  meng 版权所有 </p>
                         
                                <p> <a href="" target="_blank"><img alt="" src="<?php echo $temp_src; ?>/img/184210d2-c505-4ad4-8e62-8581f9c865ac.png" style="width: 35px; height: 35px;" /></a>&nbsp; &nbsp;<a href="http://t.qq.com" target="_blank"><img alt="" src="<?php echo $temp_src; ?>/img/09f4108c-a904-41dd-8ff8-71ce53d84771.png" style="width: 35px; height: 35px;" /></a></p>
                              </div>
                              <!-- End_Module_89212 --></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End_Module_89208 --></div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  
<section class="bottom">
<div id="a1portalSkin_bottomAreaA" class="QHDEmptyArea page-width clearfix"></div>
</section>
 </div>
  
<div id="a1portalSkin_fixedBottomArea" class="QHDEmptyArea fixed-bottom"></div>
  
<div id="a1portalSkin_fixed-left" class="QHDEmptyArea fixed-side fixed-left"></div>
  
<div id="a1portalSkin_fixed-right" class="fixed-side fixed-right"> <a name="31467" id="31467"></a>
<div class="module-default">
<div class="module-inner">
<div id="a1portalSkin_ctr8921889218_mainArea" class="module-content"> 
<div class="link-fixed-side">
<ul>
<li class="first"><a href="http://wpa.qq.com/msgrd?v=3&uin=1234567890&site=qq&menu=yes" class="link-name" target="_blank"><i style="background-image:url(<?php echo $temp_src; ?>/img/c125b589-e76e-49c0-98d7-e6401cb1c361_32_32_uniformfill.png);" alt="合作咨询"></i><span>合作咨询</span></a></li>
<li class=""><a href="http://wpa.qq.com/msgrd?v=3&uin=1234567890&site=qq&menu=yes" class="link-name" target="_blank"><i style="background-image:url(<?php echo $temp_src; ?>/img/5d9e132e-a784-4456-8686-4419cc50e854_32_32_uniformfill.png);" alt="在线客服"></i><span>在线客服</span></a></li>
<li class=""><a href="javascript:;" class="link-name" target=""><i style="background-image:url(<?php echo $temp_src; ?>/img/87389d6b-e02e-4c9b-8197-0ea992d705cc_32_32_uniformfill.png);" alt="服务电话"></i><span>服务电话</span></a>
<div class="link-summary"><i class="arrow-section-r"></i>
<div class="link-summary-content">
<div class="qhd-content">
<p style="text-align:center;">400-123-4567</p>
</div>
</div>
</div>
</li>
</ul>
</div>
 </div>
</div>
</div>
</div>
  
<div id="popup" class="popup">
<div class="popup-content not-animated" data-animate="fadeInDown">
<div id="a1portalSkin_popup-area" class="QHDEmptyArea popup-content-wrapper"></div>
<div class="popup-close-btn"><a href="javascript:;" title="关闭"><span>关闭</span></a></div>
</div>
<div class="popup-overlay"></div>
</div>
  
<div class="gotop-wrapper"><a href="javascript:;" class="fixed-gotop gotop"></a></div>
 
<input name="ScrollTop" type="hidden" id="ScrollTop"/>
<input name="__a1portalVariable" type="hidden" id="__a1portalVariable"/>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value=""/>
</form>
 
 
</body>
</html>