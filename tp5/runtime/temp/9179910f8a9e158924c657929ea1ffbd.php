<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"F:\wamp\www\tp5\public/../application/admin\view\content\add.htm";i:1512737692;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\head.htm";i:1514082882;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\left.htm";i:1514095268;}*/ ?>
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

    <!--Beyond styles-->
    <link id="beyond-link" href="__ADMIN__/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="__ADMIN__/style/demo.css" rel="stylesheet">
    <link href="__ADMIN__/style/typicons.css" rel="stylesheet">
    <link href="__ADMIN__/style/animate.css" rel="stylesheet">
        <script src="__ADMIN__/style/jquery_002.js"></script>
    <script src="__ADMIN__/layer/layer.js"></script>

         <script src="__ADMIN__/ueditor/ueditor.config.js"></script>
     <script src="__ADMIN__/ueditor/ueditor.all.min.js"></script>
     <script src="__ADMIN__/ueditor/lang/zh-cn/zh-cn.js"></script>
     <script src="__ADMIN__/uploadify/jquery.uploadify.min.js"></script>
     <script type="text/javascript">
        $(function () {
                $("#uploadify").uploadify({
                    //指定swf文件
                    'swf': "__ADMIN__/uploadify/uploadify.swf",
                    //后台处理的页面
                    'uploader': "<?php echo url('content/upimg'); ?>",
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
                        $("input[name='litpic']").val(data);
                        var imgsrc="__INDEX__/uploads/img/"+data;
                        var img="<img height='100' src='"+imgsrc+"'>";
                        $("#imgdiv").show();
                        $("#litpic").html(img);

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
                        <a href="#">用户管理</a>
                    </li>
                                        <li class="active">添加用户</li>
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
                                                                <input type="hidden" name="model_id" value="<?php echo $modelid; ?>" >

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">标题</label>
                                            <div class="col-sm-6">
                                                <input class="form-control"  name="title"  type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">属性</label>
                                            <div class="col-sm-6">
                                                <div class="checkbox" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="attr[]" class="colored-blue" value="头条" type="checkbox">
                                                        <span class="text">头条</span>
                                                    </label>
                                                </div>

                                                <div class="checkbox" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="attr[]" class="colored-blue" value="推荐" type="checkbox">
                                                        <span class="text">推荐</span>
                                                    </label>
                                                </div>

                                                <div class="checkbox" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="attr[]" class="colored-blue" value="幻灯" type="checkbox">
                                                        <span class="text">幻灯</span>
                                                    </label>
                                                </div>

                                                <div class="checkbox" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="attr[]" class="colored-blue" value="加粗" type="checkbox">
                                                        <span class="text">加粗</span>
                                                    </label>
                                                </div>

                                                <div class="checkbox" style="float:left; padding-left:10px;">
                                                    <label>
                                                        <input name="attr[]" class="colored-blue" value="图片" type="checkbox">
                                                        <span class="text">图片</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                            <div class="col-sm-6">
                                                    <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;if($cate['id'] == $cateId): ?> 
                                                        <span class="form-control"><?php echo $cate['cate_name']; ?> </span>
                                                        <input type="hidden" name="cate_id" value="<?php echo $cate['id']; ?>">
                                                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">关键词</label>
                                            <div class="col-sm-6">
                                                <input class="form-control"  name="keywords"  type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                                            <div class="col-sm-6">
                                                <textarea name="description" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                                            <div class="col-sm-6">
                                                <input class="form-control"  name="writer"  type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">来源</label>
                                            <div class="col-sm-6">
                                                <input class="form-control"  name="source"  type="text">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">缩略图</label>
                                            <div class="col-sm-6">
                                                <label>
                                                    <span id="uploadify"></span>
                                                    <span class="text"></span>
                                                    <input name="litpic" value="" type="hidden">
                                                </label>
                                                <label>
                                                    <div id="cancel" style="float:left;" class="uploadify-button btn btn-azure"><span class="uploadify-button-text"><i style="padding-right:4px;" class="fa fa-rotate-left"></i>撤销上传</span></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group" id="imgdiv" style="display:none;">
                                            <label for="username" class="col-sm-2 control-label no-padding-right"></label>
                                            <div class="col-sm-6">
                                                <label id="litpic">
                                                </label>
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                       <!--自定义字段-->
                                        <?php foreach ($diyFields as $k => $v):?>
                                         <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right"><?php echo $v['field_cname'];?></label>
                                            <div class="col-sm-6">
                                                <?php switch ($v['field_type']) {
                                                        case 1:
                                                        case 7:
                                                        case 8:
                                                        echo "<input type='text' name='".$v['field_ename']."' class='form-control'>";
                                                        break;
                                                        case 6:
                                         echo "<input type='file' name='".$v['field_ename']."' >";
                                                       break;
                                                                                                         case 6:
                                         echo "<textarea name='".$v['field_ename']."'></textarea>>";
                                                       break;
                                                          case 2:
                                                            if($v['field_values']){
                                                                $arr=explode(',', $v['field_values']);
                                                                foreach ($arr as $k1 => $v1) {
                                                                    echo "<div class='radio' style='float:left; padding-left:10px;'>";
                                                                    echo "<label>";
                                                                    echo "<input type='radio' name='".$v['field_ename']."' value='".$v1."' class='colored-blue'>";
                                                                    echo "<span class='text'>$v1</span> ";
                                                                    echo "</label>  ";
                                                                    echo "</div>";
                                                                }
                                                            }
                                                        break;
                                                        case 3:
                                                             if($v['field_values']){
                                                                $arr=explode(',', $v['field_values']);
                                                                foreach ($arr as $k1 => $v1) {
                                                                    echo "<div class='checkbox' style='float:left; padding-left:10px;'>";
                                                                    echo "<label>";
                                                                    echo "<input type='checkbox' name='".$v['field_ename']."[]' value='".$v1."' class='colored-blue'>";
                                                                    echo "<span class='text'>$v1</span> ";
                                                                    echo "</label>  ";
                                                                    echo "</div>";
                                                                }
                                                            }
                                                        break;
                                                        case 4:
                                                            if($v['field_values']){
                                                                $arr=explode(',', $v['field_values']);
                                                                echo "<select name='".$v['field_ename']."'>";
                                                                foreach ($arr as $k1 => $v1) {
                                                                    echo "<option value='".$v1."'>".$v1."</option>";
                                                                }
                                                                echo "</select>";
                                                            }
                                                       break;
                                                       case 9:
                                                        echo get_ueditor($v['field_ename']);
                                                        break;
                                                    default:
                                                        echo "<input type='text' name='".$v['field_ename']."' class='form-control'>";
                                                        break;
                                                }?>
                                             </div>
                                       </div>
                                       <?php endforeach;?>
                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label no-padding-right">内容</label>
                                            <div class="col-sm-6">
                                                <textarea name="content" id="content"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="group_id" class="col-sm-2 control-label no-padding-right">点击数</label>
                                            <div class="col-sm-6">
                                               <input class="form-control"  name="click"  type="text">
                                            </div>
                                        </div>  
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
    <script src="__ADMIN__/style/bootstrap.js"></script>
    <script src="__ADMIN__/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="__ADMIN__/style/beyond.js"></script>
    
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:400,});
    
        $("#cancel").click(function(){
        var imgurl=$("input[name='litpic']").val();
        if(!imgurl){
            // alert('请先上传图片！');
            layer.msg('请先上传图片！', {icon: 2});
            return false;
        }
        // if(!confirm('确定要撤销图片吗？')){
        //     return false;
        // }
        layer.confirm('确定要撤销图片吗？', {icon: 3, title:'提示'}, function(index){
          //do something
        $("#imgdiv").hide();
        $("input[name='litpic']").val('');
        $.ajax({
            type:"post",
            dataType:"json",
            data:{imgurl:imgurl},
            url:"<?php echo url('Content/delimg'); ?>",
            success:function(data){
                if(data==1){
                    layer.msg('撤销成功！', {icon: 1});
                }else{
                    layer.msg('撤销失败！', {icon: 2});
                }
            }
        });
          layer.close(index);
        });
        
    });

</script>

</body></html>