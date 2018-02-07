<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"F:\wamp\www\tp5\public/../application/admin\view\auth_rule\lst.htm";i:1513926431;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\head.htm";i:1514082882;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\left.htm";i:1514095268;}*/ ?>
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
    <style>
    .open {
    border: 1px solid #ccc;
    padding: 0 3px 0 3px;
    cursor: pointer;
}
 
    </style>
    
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
                                        <li class="active">广告管理</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<button type="button" tooltip="添加广告" class="btn btn-sm btn-azure btn-addon" onclick="javascript:window.location.href = '<?php echo url('add'); ?>'"> <i class="fa fa-plus"></i> Add
</button>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <table class="table table-bordered table-hover">
                        <thead class="">
                            <tr> 
                                <th class="text-center">伸缩</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">规则名称</th>
                                <th class="text-center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php if(is_array($authRes) || $authRes instanceof \think\Collection || $authRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$auth): $mod = ($i % 2 );++$i;?>
                                 <tr id="<?php echo $auth['id']; ?>" pid="<?php echo $auth['pid']; ?>" <?php if($auth['pid'] != 0): ?> style="display:none;" <?php endif; ?> >
                                    <td align="center"><span class="open">+</span></td>
                                    <td align="center"><?php echo $auth['id']; ?></td>
                                    <td align="center"><?php echo str_repeat('-',$auth['level']*6)?><?php echo $auth['title']; ?></td>
                                    <td align="center">
                                        <a href="<?php echo url('AuthRule/edit',array('id'=>$auth['id'])); ?>" class="btn btn-primary btn-sm shiny">
                                            <i class="fa fa-edit"></i> 编辑
                                        </a>
                                        <a href="#" onclick="warning('确实要删除吗', '<?php echo url('AuthRule/del',array('id'=>$auth['id'])); ?>')" class="btn btn-danger btn-sm shiny">
                                            <i class="fa fa-trash-o"></i> 删除
                                        </a>
                                    </td>
                                </tr>
                              <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>

                </div>

                <div style="padding-top:10px; text-align:right; ">
                                    </div>

                <div>
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
    <script>
     $('.open').click(function(){
        var id=$(this).parents('tr').attr('id');
        if($(this).html()=='+'){
            $(this).html('-');
            $("tr[pid="+id+"]").show();
    }else if($(this).html()=='-'){
            $(this).html('+');
            $.ajax({
                type:'post',
                dataType:'json',
                data:{id:id},
                url:"<?php echo url('AuthRule/shengsuo'); ?>",
                success:function(data){
                 $.each(data,function(k,v){
                  $("tr[id="+v+"]").hide();

                 })
                }
            });
    }
     });

    </script>
    


</body></html>