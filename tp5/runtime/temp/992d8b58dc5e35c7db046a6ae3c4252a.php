<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"F:\wamp\www\tp5\public/../application/admin\view\auth_group\power.htm";i:1501484234;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\head.htm";i:1514082882;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\left.htm";i:1514095268;}*/ ?>
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
                        <a href="#">用户组权限管理</a>
                    </li>
                                        <li class="active">用户组权限</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">用户组权限</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" action="" method="post">
                        <input type="hidden" value="<?php echo $authGroups['id']; ?>" name="id">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">用户组名</label>
                            <div class="col-sm-6">
                                <input class="form-control" placeholder="" name="title" value="<?php echo $authGroups['title']; ?>" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right">分配权限</label>
                            <div class="col-sm-6">
                            <!-- 权限分配 -->
                                <table class="table table-hover">
                                    <thead class="bordered-darkorange">
                                        <tr>
                                            <th>
                                               <label style="padding:0 15px 0 0;">
                                                    <input id="chkAll" onclick="CheckAll(this.form)" value="全选" type="checkbox" class="colored-success checkbox-parent" type="checkbox">
                                                    <span class="text">权限全选</span>
                                                </label>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): ?>
                                        <tr>
                                            <td>
                                                <label style="padding-right:15px;">
                                                    <input id="<?php echo $vo['id']; ?>" value="<?php echo $vo['id']; ?>" name="rules[]" dataid="id-<?php echo $vo['id']; ?>" <?php if(in_array($vo['id'], $rules)){ echo 'checked="checked"';}?> class="colored-success checkbox-parent" type="checkbox">
                                                    <span class="text"><?php echo $vo['title']; ?></span>
                                                </label>
                                            </td>
                                        </tr>
                                            <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$vo2): ?>
                                            <tr>
                                                <td style="padding-left:30px;">
                                                    <label style="padding-right:15px;">
                                                        <input <?php if(in_array($vo2['id'], $rules)){ echo 'checked="checked"';}?> class="colored-success checkbox-parent checkbox-child" id="<?php echo $vo2['id']; ?>" value="<?php echo $vo2['id']; ?>" name="rules[]"  dataid="id-<?php echo $vo['id']; ?>-<?php echo $vo2['id']; ?>" type="checkbox">
                                                        <span class="text"><?php echo $vo2['title']; ?></span>
                                                    </label>
                                                </td>
                                            </tr>
                                                <?php if($vo2['children']): ?>
                                                <tr>
                                                    <td style="padding-left:60px;">
                                                    <?php if(is_array($vo2['children']) || $vo2['children'] instanceof \think\Collection || $vo2['children'] instanceof \think\Paginator): if( count($vo2['children'])==0 ) : echo "" ;else: foreach($vo2['children'] as $key=>$vo3): ?>
                                                        <label style="padding-right:15px;">
                                                            <input <?php if(in_array($vo3['id'], $rules)){ echo 'checked="checked"';}?> class="colored-success checkbox-child" id="<?php echo $vo3['id']; ?>" value="<?php echo $vo3['id']; ?>" name="rules[]" dataid="id-<?php echo $vo['id']; ?>-<?php echo $vo2['id']; ?>-<?php echo $vo3['id']; ?>" type="checkbox">
                                                            <span class="text"><?php echo $vo3['title']; ?></span>
                                                        </label>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </tbody>
                                </table>
                            <!-- 权限分配 -->
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
    <script src="__ADMIN__/style/jquery_002.js"></script>
    <script src="__ADMIN__/style/bootstrap.js"></script>
    <script src="__ADMIN__/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="__ADMIN__/style/beyond.js"></script>
    <script type="text/javascript">
        /* 多选判断 */
    function CheckAll(form) {
        for (var i = 0; i < form.elements.length; i++) {
            var e = form.elements[i];
            if (e.Name != 'chkAll' && e.disabled == false) {
                e.checked = form.chkAll.checked;
            }
        }
    }
    </script>
    <script type="text/javascript">
/* 权限配置 */
$(function () {
    //动态选择框，上下级选中状态变化
    $('input.checkbox-parent').on('change', function () {
        var dataid = $(this).attr("dataid");
        $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
    });
    $('input.checkbox-child').on('change', function () {
        var dataid = $(this).attr("dataid");
        dataid = dataid.substring(0, dataid.lastIndexOf("-"));
        var parent = $('input[dataid=' + dataid + ']');
        if ($(this).is(':checked')) {
            parent.prop('checked', true);
            //循环到顶级
            while (dataid.lastIndexOf("-") != 2) {
                dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                parent = $('input[dataid=' + dataid + ']');
                parent.prop('checked', true);
            }
        } else {
            //父级
            if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                parent.prop('checked', false);
                //循环到顶级
                while (dataid.lastIndexOf("-") != 2) {
                    dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                    parent = $('input[dataid=' + dataid + ']');
                    if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                        parent.prop('checked', false);
                    }
                }
            }
        }
    });
});
    </script>


</body></html>