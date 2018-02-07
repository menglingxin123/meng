<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"F:\wamp\www\tp5\public/../application/admin\view\cate\lst.htm";i:1515074039;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\head.htm";i:1514082882;s:64:"F:\wamp\www\tp5\public/../application/admin\view\common\left.htm";i:1514095268;}*/ ?>
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
                    
<button type="button" tooltip="添加用户" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('Cate/add'); ?>'"> <i class="fa fa-plus"></i> Add
</button>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                  <form method="post" action="<?php echo url('Cate/del_sort'); ?>" >

                    <table class="table table-bordered table-hover">
                        <thead class="">
                            <tr pid="0">
                               <th class="text-center">伸缩</th>
                                <th class="text-center">
                                    <label>
                                        <input id="checkall" class="colored-blue" type="checkbox">
                                        <span class="text"></span>
                                    </label>
                                </th>
                                <th class="text-center">ID</th>
                                <th class="text-center">栏目</th>
                                <th class="text-center">状态</th>
                                <th class="text-center">属性</th>
                                <th class="text-center">所属模型</th>
                                <th class="text-center">排序</th>
                                <th class="text-center">操作</th>

                            </tr>
                        </thead>
                        <tbody>
                         <?php if(is_array($cateRes) || $cateRes instanceof \think\Collection || $cateRes instanceof \think\Paginator): $i = 0; $__LIST__ = $cateRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>

                             <tr id="<?php echo $cate['id']; ?>" pid="<?php echo $cate['pid']; ?>">
                               <td align="center">
                                <span style="border:1px solid #ccc;padding:0px 3px; cursor:pointer" class="open">+</span>
                                </td>
                                <td align="center">
                                     <label>
                                        <input  name="itm[]"  class="colored-blue" value="<?php echo $cate['id']; ?>" type="checkbox">

                                        <span class="text"></span>
                                    </label>
                                </td>
                                <td ><?php echo $cate['id']; ?></td>
                                <td ><a href="<?php echo url('Content/lst',array('cateid'=>$cate['id'],'modelid'=>$cate['model_id'])); ?>"><?php echo str_repeat('-', $cate['level']*8);?><?php echo $cate['cate_name']; ?></a><a style="float:right;" class="btn btn-sm btn-azure btn-addon" href="<?php echo url('Cate/add',array('cateid'=>$cate['id'])); ?>"><i class="fa fa-plus"></i>添加子栏目</a></td>
                                <td ><?php if($cate['status'] == 1): ?><a  cateid="<?php echo $cate['id']; ?>" onclick="changestatus(this)" class="btn btn-primary btn-sm shiny">显示
                                    </a><?php else: ?><a  cateid="<?php echo $cate['id']; ?>"  onclick="changestatus(this)"  class="btn btn-danger btn-sm shiny">隐藏
                                    </a><?php endif; ?></td>
                                <td ><?php if($cate['cate_attr'] == 1): ?>列表栏目<?php elseif($cate['cate_attr'] == 2): ?>频道封面<?php elseif($cate['cate_attr'] == 3): ?>外链<?php endif; ?></td>
                                <td ><?php echo $cate['model_name']; ?></td>
                                <td><input name="sort[<?php echo $cate['id']; ?>]" style="width:50px; text-align:center;" type="text" value="<?php echo $cate['sort']; ?>"></td>
                                <td align="center">
                                    <a href="<?php echo url('Cate/edit',array('cateid'=>$cate['id'])); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> 编辑
                                    </a>
                                    <a href="#" onClick="warning('确实要删除吗', '<?php echo url('Cate/del',array('cateid'=>$cate['id'])); ?>')" class="btn btn-danger btn-sm shiny">
                                        <i class="fa fa-trash-o"></i> 删除
                                    </a>
                                </td>
                            </tr>
                             <script type="text/javascript">
                                var cateid=<?php echo $cate['id']; ?>;

                                $.ajax({
                                   type:"post",
                                   dataType:"json",
                                   url:"<?php echo url('Cate/shengsuo'); ?>",
                                   data:{cateid:cateid},
                                   success:function(data){
                                    if(data.cateRes.length==0){
                                       $("tr[id="+data.cateid+"]").find('span:first').text('-');
                                       $("tr[id="+data.cateid+"]").find('span:first').attr('sstype',2);
                                       
                                    }else{
                                       $("tr[id="+data.cateid+"]").find('span:first').text('+');
                                        $("tr[id="+data.cateid+"]").find('span:first').attr('sstype',1); 
                                    }

                       
                                   }

                                });
                             </script>
                         <?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr pid="0">
                                <td colspan="8"></td>
                                <td align="center">
                                    <button class="btn btn-default" type="submit">保存信息</button>
                                </td>
                            </tr>
                       </tbody>
                    </table>
                  </form>

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

    
  <script type="text/javascript">
       function changestatus(o){
        var cateid=$(o).attr('cateid');
        $.ajax({
           type:"post",
           dataType:"json",
           url:"<?php echo url('Cate/changestatus'); ?>",
           data:{cateid:cateid},
           success:function(data){


             if(data==1){
                    $(o).attr("class","btn btn-danger btn-sm shiny");
                    $(o).text('隐藏');
                }else{
                    $(o).attr("class","btn btn-primary btn-sm shiny");
                    $(o).text('显示');
                }
           }

        });
       }

    //全选处理
    $("#checkall").click(function(){
        if($("#checkall").attr("checked")){
            $(".colored-blue").removeAttr("checked");
        }else{
            $(".colored-blue").attr("checked","checked");
        }
    });
    //伸缩处理
     $("tr[pid!=0]").hide();
    $('.open').click(function(){
        var id=$(this).parent().parent().attr('id');
           id=parseInt(id);
        var sstype=$(this).attr('sstype');
            sstype=parseInt(sstype);
        if($(this).text()=='+'&& sstype==1){
            $(this).text('-');
            $("tr[pid="+id+"]").show();
        }else if($(this).text()=='-'&& sstype==1){
            $(this).text('+');
            $.ajax({
               type:"post",
               dataType:"json",
               url:"<?php echo url('Cate/hidelm'); ?>",
               data:{cateid:id},
               success:function(data){
                $(data).each(function(k,v){
                    $("tr[id="+v+"]").hide();
                    $.ajax({
                       type:"post",
                       dataType:"json",
                       url:"<?php echo url('Cate/shengsuo'); ?>",
                       data:{cateid:v},
                       success:function(data){
                        $(data).each(function(k,v){
                            if(data.cateRes.length==0){
                               $("tr[id="+data.cateid+"]").find('span:first').text('-');
                               $("tr[id="+data.cateid+"]").find('span:first').attr('sstype',2);
                               
                            }else{
                               $("tr[id="+data.cateid+"]").find('span:first').text('+');
                                $("tr[id="+data.cateid+"]").find('span:first').attr('sstype',1); 
                            }
                        }) 


                       }

                    })
                })


               }

            });
            
            // $("tr[pid="+id+"]").find('span:first').text('+');
        }
    });

  </script>

</body></html>