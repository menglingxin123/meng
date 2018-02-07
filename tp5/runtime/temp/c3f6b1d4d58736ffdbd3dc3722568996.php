<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"F:\wamp\www\tp5\public/../application/admin\view\cate\add.htm";i:1514641084;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\head.htm";i:1514082882;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\left.htm";i:1514095268;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>ThinkPHP5.0</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="__ADMIN__/style/jquery_002.js"></script>

    <!--Basic Styles-->
    <link href="__ADMIN__/style/bootstrap.css" rel="stylesheet">
    <link href="__ADMIN__/style/font-awesome.css" rel="stylesheet">
    <link href="__ADMIN__/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="__ADMIN__/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="__ADMIN__/style/demo.css" rel="stylesheet">
    <link href="__ADMIN__/style/typicons.css" rel="stylesheet">
    <link href="__ADMIN__/style/animate.css" rel="stylesheet">
     <script src="__ADMIN__/uploadify/jquery.uploadify.min.js"></script>
     <script src="__ADMIN__/ueditor/ueditor.config.js"></script>
     <script src="__ADMIN__/ueditor/ueditor.all.min.js"></script>
     <script src="__ADMIN__/ueditor/lang/zh-cn/zh-cn.js"></script>
     <script src="__ADMIN__/layer/layer.js"></script>


     <style>
     	.uploadify{
     		line-height:30px;

     	}


     </style>
     <script type="text/javascript">
	    $(function () {
	            $("#uploadify").uploadify({
	                //指定swf文件
	                'swf': "__ADMIN__/uploadify/uploadify.swf",
	                //后台处理的页面
	                'uploader': "<?php echo url('cate/upimg'); ?>",
	                'progressData' : 'speed',
	                //按钮显示的文字
	                'buttonText': '上传文件',
	                //按钮样式
	                'buttonClass': 'btn btn-azure',
	                // 显示的高度和宽度，默认 height 30；width 120
	                'height': 32,
	                'width': 93,
	                //上传文件的类型  默认为所有文件    'All Files'  ;  '*.*'
	                //在浏览窗口底部的文件类型下拉菜单中显示的文本
	                'fileTypeDesc': 'Image Files',
	                //设定发送数据的name值
	                'fileObjName':'img',
	                //允许上传的文件后缀   
	                'onUploadSuccess' : function(file,data,response){
	                	$("input[name='img']").val(data);
	                	var cateimgsrc="__ADMIN__/uploads/cateimg/"+data;
	                	var cateimg="<img height='100' src='"+cateimgsrc+"'>";
	                	$("#cateimgdiv").show();
	                	$("#cateimg").html(cateimg);

	                }        
	            });
	            // $("#uploadify-button").prepend("<i style='padding-right:4px;' class='fa fa-upload'></i>");
	            // $("#uploadify-button").removeAttr('style');
	        });

    

    </script>
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

                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                                        <li>
                        <a href="<?php echo url('Index/index'); ?>">系统</a>
                    </li>
                                        <li>
                        <a href="<?php echo url('Cate/lst'); ?>">栏目管理</a>
                    </li>
                                        <li class="active">添加栏目</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">


        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增用户</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">

                        <div class="widget-body">
                            <div class="widget-main ">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs tabs-flat" id="myTab11">
                                        <li class="active">
                                            <a data-toggle="tab" href="#home11">
                                                基本信息
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#profile11">
                                                SEO信息
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#profile12">
                                                栏目内容
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content tabs-flat">
                                        <div id="home11" class="tab-pane in active">
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">所属模型</label>
                                                <div class="col-sm-6">
                                                    <select name="model_id">
                                                        <option value="">请选择模型</option>
                                                        <?php if(is_array($model) || $model instanceof \think\Collection || $model instanceof \think\Paginator): $i = 0; $__LIST__ = $model;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$modelinfo): $mod = ($i % 2 );++$i;?>
                                                        <option value="<?php echo $modelinfo['id']; ?>"><?php echo $modelinfo['model_name']; ?></option>
                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </select>
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                             <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">上级栏目</label>
                                                <div class="col-sm-6">
                                                   <select name="pid">
                                                        <option value="0">
                                                           顶级栏目
                                                        </option>
                                                   	 <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                                        <option value="<?php echo $cate['id']; ?>" >
                                                        	<?php echo str_repeat('-', $cate['level']*8);?><?php echo $cate['cate_name']; ?>
                                                        </option>
                                                   	 <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </select>
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                             <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">栏目名称</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" id="username"  name="cate_name"  type="text">
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="username"  class="col-sm-2 control-label no-padding-right">隐藏栏目</label>
                                                <div class="col-sm-6">
                                                    <label>
                                                        <input class="checkbox-slider toggle colored-blue" type="checkbox" name="status" value="0">
                                                        <span class="text"></span>
                                                    </label>
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">否是设为底部导航</label>
                                        <div class="col-sm-6">

                                             <!-- 单选按钮 -->
                                            <div class="radio" style="float:left; padding-left:10px;">
                                                <label>
                                                    <input name="bottom_nav" value="1" class="colored-blue" type="radio">
                                                    <span class="text">是</span>
                                                </label>
                                            </div>
                                             <!-- 单选按钮 -->
                                            <div class="radio" style="float:left; padding-left:10px;">
                                                <label>
                                                    <input checked="checked" name="bottom_nav" value="0" class="colored-blue" type="radio">
                                                    <span class="text">否</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
		                                    <div class="form-group">
		                                        <label for="username" class="col-sm-2 control-label no-padding-right">栏目图片</label>
		                                        <div class="col-sm-6">
                                                    <label>
                                                        <span id="uploadify"></span>
                                                        <span class="text"></span>
                                                        <input name="img" value="" type="hidden">
                                                    </label>
                                                   <label>
                                                    <div id="cancel" style="float:left;" class="uploadify-button btn btn-azure"><span class="uploadify-button-text"><i style="padding-right:4px;" class="fa fa-rotate-left"></i>撤销上传</span></div>
                                                   </label>
		                                        </div>
		                                    </div>
		                                    <div class="form-group" id="cateimgdiv" style="display:none;">
		                                        <label for="username" class="col-sm-2 control-label no-padding-right"></label>
		                                        <div class="col-sm-6">
		                                            <label id="cateimg">
		                                            </label>
		                                        </div>
		                                        <p class="help-block col-sm-4 red">* 必填</p>
		                                    </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">栏目属性</label>
                                                <div class="col-sm-6">
                                                   <div class="radio" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="cate_attr" value="1" type="radio" checked="checked">
                                                        <span class="text">列表页栏目（可以发布文章） </span>
                                                    </label>
                                                   </div>
                                                   <div class="radio" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="cate_attr" type="radio" value="2" >
                                                        <span class="text">封面频道栏目 </span>
                                                    </label>
                                                   </div>
                                                   <div class="radio" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="cate_attr" type="radio" value="3" >
                                                        <span class="text">外链栏目 </span>
                                                    </label>
                                                   </div>
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">列表页模板</label>
                                                <div class="col-sm-6">
                                                    <input  class="form-control" id="username"  name="list_tmp" type="text">
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">频道页模板</label>
                                                <div class="col-sm-6">
                                                    <input class="form-control" id="username"  name="index_tmp" type="text">
                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">内容页模板</label>
                                                <div class="col-sm-6">
                                                    <input  class="form-control" id="username"  name="article_tmp" type="text">

                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">外链地址</label>
                                                <div class="col-sm-6">
                                                    <input  class="form-control" id="username" name="link" type="text">

                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                        </div>

                                        <div id="profile11" class="tab-pane">
                                            <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">栏目标题</label>
                                                <div class="col-sm-6">
                                                    <input  class="form-control" id="username"  name="title" type="text">

                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                             <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">关键词</label>
                                                <div class="col-sm-6">
                                                    <input  class="form-control" id="username"  name="keywords" type="text">

                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                             <div class="form-group">
                                                <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                                                <div class="col-sm-6">
                                                    <textarea class="form-control" rows="3" placeholder="Content" name="desc"></textarea>

                                                </div>
                                                <p class="help-block col-sm-4 red">* 必填</p>
                                            </div>
                                        </div>
                                         <div id="profile12" class="tab-pane">
                                             <div class="col-lg-12 col-sm-12 col-xs-12">
                                                    <div class="widget flat radius-bordered">
                                                        <div class="widget-body">
                                                            <div class="widget-main no-padding">
                                                                <textarea id="content" name="content"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                               </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">保存信息</button>
                                </div>
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
    <script src="__ADMIN__/style/bootstrap.js"></script>
    <!--Beyond Scripts-->
    <script src="__ADMIN__/style/beyond.js"></script>
    
    <script src="__ADMIN__/style/summernote.js"></script>

<script type="text/javascript">
 $('#summernote').summernote({ height: 300 });
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:1000,initialFrameHeight:400,});
   $('#cancel').click(function(){
   var imgurl=$("input[name='img']").val();
   if(!imgurl){
   layer.msg('请先上传图片', {icon: 2});     return false;
   }
   layer.confirm('确定要撤销？', {icon: 3, title:'提示'}, function(index){
      $.ajax({
        type:"post",
        dataType:"json",
        data:{imgurl:imgurl},
        url:"<?php echo url('Cate/delimg'); ?>",
        success:function(data){
             if(data==1){
              $("input[name='img']").val('');
              $("#cateimgdiv").hide();
               layer.msg('撤销成功！', {icon: 1});
           }else{
               layer.msg('撤销失败！', {icon: 2});
            }
        }
    });
      layer.close(index);
    })

   });

    $("select[name='pid']").change(function(){
        var cateid=$("select[name='pid']").find('option:selected').val();
        $.ajax({
            type:"post",
            dataType:"json",
            data:{cateid:cateid},
            url:"<?php echo url('Cate/ajaxcateinfo'); ?>",
            success:function(data){
                $("input[name=list_tmp]").val(data.list_tmp);
                $("input[name=index_tmp]").val(data.index_tmp);
                $("input[name=article_tmp]").val(data.article_tmp);
                $("select[name=model_id]").val(data.model_id);
            }
        });
    });

</script>
</body></html>