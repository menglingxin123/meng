<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"F:\wamp\www\tp5\public/../application/admin\view\ad\edit.htm";i:1513691614;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\head.htm";i:1514082882;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\left.htm";i:1514095268;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>ThinkPHP5.0</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="__ADMIN__/style/bootstrap.css" rel="stylesheet">
    <link href="__ADMIN__/style/font-awesome.css" rel="stylesheet">
    <link href="__ADMIN__/style/weather-icons.css" rel="stylesheet">
        <script src="__ADMIN__/style/jquery_002.js"></script>
    <script src="__ADMIN__/layer/layer.js"></script>

    <!--Beyond styles-->
    <link id="beyond-link" href="__ADMIN__/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="__ADMIN__/style/demo.css" rel="stylesheet">
    <link href="__ADMIN__/style/typicons.css" rel="stylesheet">
    <link href="__ADMIN__/style/animate.css" rel="stylesheet">
    
</head>
<body>
	<!-- 头部 -->
	<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="__ADMIN__/images/logo.png" alt="">
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="__ADMIN__/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Session::get('uname'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Login/logout'); ?>">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('Admin/edit',array('id'=>\think\Session::get('id'))); ?>">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

	<!-- /头部 -->
	
	<div class="main-container container-fluid">
		<div class="page-container">
			            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input class="searchinput" type="text">
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): ?>
                    <li  

                         <?php  $arr=explode('/',$vo['name']);
                                $pcom=$arr[1];
                                if($pcom==$con){
                                echo 'class="open active" ';
                            }
                          ?>


                    >
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-cog"></i>
                            <span class="menu-text"><?php echo $vo['title']; ?></span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$vo1): ?>
                            <li <?php if($vo1['name'] == $name): ?> class="active" <?php endif; ?>>
                                <a href="<?php echo url($vo1['name']); ?>">
                                    <span class="menu-text">
                                        <?php echo $vo1['title']; ?>                                  </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                 
                        </ul>                            
                    </li> 
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                   
                    
                                           
                    
                </ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
<div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                                        <li>
                        <a href="#">系统</a>
                    </li>
                                        <li>
                        <a href="/tp5dm/public/admin/ad/lst.html">广告管理</a>
                    </li>
                                        <li class="active">修改广告</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">修改广告</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action="" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="id" value="<?php echo $ad['id']; ?>">
                                        <input type="hidden" name="oldimgsrc" value="<?php echo $ad['img_src']; ?>">
                                        <input type="hidden" name="type" value="<?php echo $ad['type']; ?>">
                                        <div class="form-group">
                                            <label for="group_id" class="col-sm-2 control-label no-padding-right">所属广告位</label>
                                            <div class="col-sm-6">
                                                <select name="adpos_id" style="width: 100%;">
                                                    <option value="">选择广告位</option>
                                                    <?php if(is_array($adposRes) || $adposRes instanceof \think\Collection || $adposRes instanceof \think\Paginator): $i = 0; $__LIST__ = $adposRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?>
                                                         <option selected="selected" value="<?php echo $res['id']; ?>"><?php echo $res['name']; ?></option>
                                                     <?php endforeach; endif; else: echo "" ;endif; ?>                                                    
                                                </select>
                                            </div>
                                        </div>  

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">广告名</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="" name="ad_name" value="<?php echo $ad['ad_name']; ?>" type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">是否启用</label>
                                            <div class="col-sm-6">

                                                 <!-- 单选按钮 -->
                                                <div class="radio" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input <?php if($ad['on'] == 1): ?>checked="checked"<?php endif; ?> name="on" value="1" class="colored-blue" type="radio">
                                                        <span class="text">是</span>
                                                    </label>
                                                </div>
                                                 <!-- 单选按钮 -->
                                                <div class="radio" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input <?php if($ad['on'] == 0): ?>checked="checked"<?php endif; ?> name="on" value="0" class="colored-blue" type="radio">
                                                        <span class="text">否</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">广告类型</label>
                                            <div class="col-sm-6">
                                                <div class="radio" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <?php if($ad['type'] == 1): ?>
                                                          <span class="label label-orange"> 图片 </span>
                                                          <?php else: ?>
                                                          <span class="label label-green"> 轮换 </span>

                                                          <?php endif; ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <?php if($ad['type'] == 1): ?>
                                        <div class="img">
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">图片</label>
                                                <div class="col-sm-6">
                                                    <input class="help-block" name="img_src" type="file">
                                                <img width="100" src="__INDEX__/ad/<?php echo $ad['img_src']; ?>">
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">链接</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" placeholder="" name="link" value="<?php echo $ad['link']; ?>" type="text">
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                        </div>
                                        <?php endif; if($ad['type'] == 2): if($adflashRes): ?>
                                             <div class="lh" >
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right"><a href="javascript:;" onclick="dt(this);">[+]</a></label>
                                                <div class="col-sm-6 help-block">
                                                    <span>图片：</span>
                                                    <input style="display:inline;" placeholder="" name="fimg_src[]"  type="file">
                                                    <span>链接：</span>
                                                    <input style="display:inline; width:300px;" placeholder="" name="flink[]" value="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                          <?php if(is_array($adflashRes) || $adflashRes instanceof \think\Collection || $adflashRes instanceof \think\Paginator): $i = 0; $__LIST__ = $adflashRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$res): $mod = ($i % 2 );++$i;?>
                                         <div class="lh" >
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right"><a id="<?php echo $res['id']; ?>" href="javascript:;" onclick="dt(this);">[-]</a></label>
                                                <div class="col-sm-6 help-block">
                                                    <span>图片：</span>
<!--                                                     <input style="display:inline;" placeholder="" name="oldfimg_src[]"  type="file">
 -->                                                    <img width="100" src="__INDEX__/ad/<?php echo $res['fimg_src']; ?>">
                                                    <span>链接：</span>
                                                    <input style="display:inline; width:300px;" placeholder="" name="oldflink[<?php echo $res['id']; ?>]" value="<?php echo $res['flink']; ?>" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; endif; ?>
                              
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">保存信息</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
		</div>	
	</div>

	    <!--Basic Scripts-->
    <script src="__ADMIN__/style/jquery_002.js"></script>
    <script src="__ADMIN__/style/bootstrap.js"></script>
    <script src="__ADMIN__/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="__ADMIN__/style/beyond.js"></script>
    <script type="text/javascript">
        $("#img").click(function(){
            $(".img").show();
            $(".lh").hide();
        });
        $("#lh").click(function(){
            $(".img").hide();
            $(".lh").show();
        });
        //删除广告记录
        function ajaxdel(id,div){
            layer.confirm('确定要删除该广告吗？', {icon: 3, title:'提示'}, function(index){
            //do something
            // var table_name=$(o).attr("table_name");
            $.ajax({
                type:"post",
                dataType:"json",
                data:{id:id},
                url:"<?php echo url('Ad/ajaxdel'); ?>",
                success:function(data){
                    if(data==1){
                        layer.msg('删除广告成功！', {icon: 1});
                        div.remove();
                        // window.location.href="<?php echo url('ModelFields/lst'); ?>";
                    }else{
                        layer.msg('删除广告失败！', {icon: 2});
                    }
                }
            });
              layer.close(index);
            });
        }

                function dt(o){
            var div=$(o).parent().parent();
            var id=$(o).attr('id');
            if($(o).html()==='[+]'){
                var newdiv=div.clone();
                newdiv.find("a").html('[-]');
                div.after(newdiv);
            }else{
             if(id){
               ajaxdel(id,div);
              }else{
                div.remove();
              }
                // 
            }
        }
    </script>


</body></html>