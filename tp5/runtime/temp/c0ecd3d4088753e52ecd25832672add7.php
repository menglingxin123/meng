<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:55:"F:\wamp\www\tp5/application/admin\view\conf\conflst.htm";i:1511328139;s:54:"F:\wamp\www\tp5/application/admin\view\common\head.htm";i:1514082882;s:54:"F:\wamp\www\tp5/application/admin\view\common\left.htm";i:1514095268;}*/ ?>
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
                        <a href="#">系统设置</a>
                    </li>
                                        <li>
                        <a href="#">配置列表</a>
                    </li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">

            <div class="widget-body">
                <div class="widget-main ">
                    <div class="tabbable">
                        <ul class="nav nav-tabs tabs-flat" id="myTab11">
                            <li class="active">
                                <a data-toggle="tab" href="#home11">
                                    基本信息设置
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#profile11">
                                    联系方式
                                </a>
                            </li>
                             <li class="">
                                <a data-toggle="tab" href="#profile12">
                                    SEO设置
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content tabs-flat">
                            <div id="home11" class="tab-pane active">

                                <?php foreach($confRes as $k=>$v):if($v['cf_type']==1): ?>
		                        <div class="form-group">
			                        <label for="username" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname']; ?></label>
			                        <div class="col-sm-6">
                                        <?php if($v['dt_type']==1):?>
			                            <input class="form-control"  placeholder="" type="text" name="<?php echo $v['ename']; ?>" value="<?php echo $v['value']; ?>">
			                            <?php endif;if($v['dt_type']==2):
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                         ?>
                                        <div class="radio" style="float:left; padding-left:10px;">
                                            <label>
                                                <input <?php if($v1 == $v['value']): ?> checked="checked" <?php endif; ?> type="radio" class="colored-blue" value="<?php echo $v1; ?>" name="<?php echo $v['ename']; ?>">
                                                <span class="text"> <?php echo $v1; ?></span>
                                            </label>
                                        </div>
                           
                                        <?php
                                         endforeach;
                                         endif;if($v['dt_type']==3):
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                        ?>
                                        <div class="checkbox" style="float:left; padding-left:10px;">
                                            <label>
                                                <input type="checkbox" value="<?php echo $v1; ?>" class="colored-blue" <?php if($v1 == $v['value']): ?> checked="checked" <?php endif; ?>  name="<?php echo $v['ename']; ?>[]" >
                                                <span class="text"><?php echo $v1; ?></span>
                                            </label>
                                        </div>
                           
                                        <?php endforeach; endif;if($v['dt_type']==4):
                                 
                                        ?>
                                         <select  name="<?php echo $v['ename']; ?>" >
                                          <?php 
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                 
                                        ?>
                                            <option <?php if($v1 == $v['value']): ?> selected = "selected" <?php endif; ?> value="<?php echo $v1; ?>"><?php echo $v1; ?></option>
                                        <?php  endforeach; ?>

                                         </select>
                                        <?php  endif;if($v['dt_type']==5):?>
                                        <textarea  name="<?php echo $v['ename']; ?>"  class="form-control" rows="3" placeholder="Content" value="<?php echo $v['value']; ?>"></textarea>
                                        <?php endif;if($v['dt_type']==6):?>
                                        <input  placeholder="" style="float:left;" name="<?php echo $v['ename']; ?>" value="" type="file"><?php if($v['value']): ?><img height="30" src="__ADMIN__/uploads/<?php echo $v['value']; ?>"><?php else: ?>未上传<?php endif; endif;?>

                                    </div>
			                        <p class="help-block col-sm-4 red">* 必填</p>
		                        </div>
                                <?php endif;endforeach;?>
                            </div>

                            <div id="profile11" class="tab-pane">
                                 <?php foreach($confRes as $k=>$v):if($v['cf_type']==2): ?>
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname']; ?></label>
                                    <div class="col-sm-6">
                                        <?php if($v['dt_type']==1):?>
                                        <input class="form-control"  placeholder="" type="text" name="<?php echo $v['ename']; ?>" value="<?php echo $v['value']; ?>">
                                        <?php endif;if($v['dt_type']==2):
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                         ?>
                                        <div class="radio" style="float:left; padding-left:10px;">
                                            <label>
                                                <input value="<?php echo $v1; ?>" <?php if($v1 == $v['value']): ?> checked="checked" <?php endif; ?> type="radio" class="colored-blue"  name="<?php echo $v['ename']; ?>">
                                                <span class="text"> <?php echo $v1; ?></span>
                                            </label>
                                        </div>
                           
                                        <?php
                                         endforeach;
                                         endif;if($v['dt_type']==3):
                                           $valuesArr=explode(',',$v['values']);
                                           $valueArr=explode(',', $v['value']);
                                           foreach($valuesArr as $k1=>$v1):
                                        ?>
                                        <div class="checkbox" style="float:left; padding-left:10px;">
                                            <label>
                                                <input value="<?php echo $v1; ?>" type="checkbox" class="colored-blue" <?php if(in_array($v1, $valueArr)){echo 'checked="checked"';}?>  name="<?php echo $v['ename']; ?>[]" >
                                                <span class="text"><?php echo $v1; ?></span>
                                            </label>
                                        </div>
                           
                                        <?php endforeach; endif;if($v['dt_type']==4):
                                 
                                        ?>
                                         <select  name="<?php echo $v['ename']; ?>" >
                                          <?php 
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                 
                                        ?>
                                            <option value="<?php echo $v1; ?>" <?php if($v1 == $v['value']): ?> selected = "selected" <?php endif; ?>><?php echo $v1; ?></option>
                                        <?php  endforeach; ?>

                                         </select>
                                        <?php  endif;if($v['dt_type']==5):?>
                                        <textarea  name="<?php echo $v['ename']; ?>"  class="form-control" rows="3" placeholder="Content" value="<?php echo $v['value']; ?>"></textarea>
                                        <?php endif;if($v['dt_type']==6):?>
                                        <input  placeholder="" style="float:left;" name="<?php echo $v['ename']; ?>" value="" type="file"><?php if($v['value']): ?><img height="30" src="__ADMIN__/uploads/<?php echo $v['value']; ?>"><?php else: ?>未上传<?php endif; endif;?>

                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <?php endif;endforeach;?>
                            </div>
                           <div id="profile12" class="tab-pane">
                                <?php foreach($confRes as $k=>$v):if($v['cf_type']==3): ?>
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label no-padding-right"><?php echo $v['cname']; ?></label>
                                    <div class="col-sm-6">
                                        <?php if($v['dt_type']==1):?>
                                        <input class="form-control"  placeholder="" type="text" name="<?php echo $v['ename']; ?>" value="<?php echo $v['value']; ?>">
                                        <?php endif;if($v['dt_type']==2):
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                         ?>
                                        <div class="radio" style="float:left; padding-left:10px;">
                                            <label>
                                                <input value="<?php echo $v1; ?>" <?php if($v1 == $v['value']): ?> checked="checked" <?php endif; ?> type="radio" class="colored-blue"  name="<?php echo $v['ename']; ?>">
                                                <span class="text"> <?php echo $v1; ?></span>
                                            </label>
                                        </div>
                           
                                        <?php
                                         endforeach;
                                         endif;if($v['dt_type']==3):
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                        ?>
                                        <div class="checkbox" style="float:left; padding-left:10px;">
                                            <label>
                                                <input value="<?php echo $v1; ?>" type="checkbox" class="colored-blue" <?php if($v1 == $v['value']): ?> checked="checked" <?php endif; ?>  name="<?php echo $v['ename']; ?>[]" >
                                                <span class="text"><?php echo $v1; ?></span>
                                            </label>
                                        </div>
                           
                                        <?php endforeach; endif;if($v['dt_type']==4):
                                 
                                        ?>
                                         <select  name="<?php echo $v['ename']; ?>" >
                                          <?php 
                                           $valuesArr=explode(',', $v['values']);
                                           foreach($valuesArr as $k1=>$v1):
                                 
                                        ?>
                                            <option value="<?php echo $v1; ?>" <?php if($v1 == $v['value']): ?> selected = "selected" <?php endif; ?>><?php echo $v1; ?></option>
                                        <?php  endforeach; ?>

                                         </select>
                                        <?php  endif;if($v['dt_type']==5):?>
                                        <textarea  name="<?php echo $v['ename']; ?>"  class="form-control" rows="3" placeholder="Content" value="<?php echo $v['value']; ?>"></textarea>
                                        <?php endif;if($v['dt_type']==6):?>
                                        <input  placeholder="" style="float:left;" name="<?php echo $v['ename']; ?>"  value="" type="file"><?php if($v['value']): ?><img height="30" src="__ADMIN__/uploads/<?php echo $v['value']; ?>"><?php else: ?>未上传<?php endif; endif;?>

                                    </div>
                                    <p class="help-block col-sm-4 red">* 必填</p>
                                </div>
                                <?php endif;endforeach;?>
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
    


</body></html>