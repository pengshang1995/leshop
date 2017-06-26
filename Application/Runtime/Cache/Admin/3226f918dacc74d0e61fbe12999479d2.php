<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <base href="/leshop/Public/">
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/leshop/Public/statics/webuploader-0.1.5/xb-webuploader.css">
<script src="/leshop/Public/statics/js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="/leshop/Public/statics/umeditor1_2_2/themes/default/css/umeditor.css">
    <!--[if lt IE 9]>
    <script type="text/javascript" src="admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="admin/lib/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="admin/lib/angular.js"></script>
    <link rel="stylesheet" type="text/css" href="admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="admin/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="admin/static/mystyle.css" />
    <link rel="stylesheet" type="text/css" href="admin/css/zTreeStyle.css" />
    <link href="admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
    <link href="admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="admin/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="admin/font-awesome/css/font-awesome.min.css">
    <!--[if IE 6]>
    <script type="text/javascript" src="admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script src="admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>添加管理员 - 管理员管理 - H-ui.admin v2.4</title>
</head>
<body>


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container" ng-app="app" ng-controller="adminCtrl">
    <div class="text-c">
        <input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称"  name="">
        <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加管理员','<?php echo U('Admin/add_admin');?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="9">员工列表</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="40">ID</th>
            <th width="150">登录名</th>
            <th width="90">手机</th>
            <th width="150">邮箱</th>
            <th>角色</th>
            <th width="130">加入时间</th>
            <th width="100">是否已启用</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-c" ng-repeat="x in names">
            <td><input type="checkbox" value="1" name=""></td>
            <td>{{x.id}}</td>
            <td>{{x.username}}</td>
            <td>{{x.tel}}</td>
            <td>{{x.email}}</td>
            <td>超级管理员</td>
            <td>{{x.addtime|date:'yyyy-MM-dd hh:mm:ss'}}</td>
            <td class="td-status">
                <span class="label label-success radius" ng-if="x.status ==1">已启用</span> <span class="label label-default radius" ng-if="x.status == 0">已禁用</span></td>
            <td class="td-manage">
                <a style="text-decoration:none"  ng-click="admin_stop(this,x.id)" title="停用" ng-if="x.status==1"><i class="Hui-iconfont">&#xe631;</i></a> <a ng-click="admin_start(this,x.id)" href="javascript:;" title="启用" style="text-decoration:none" ng-if="x.status==0"><i class="Hui-iconfont">&#xe615;</i></a>
                <a title="编辑" href="javascript:;" ng-click="admin_edit('管理员编辑','<?php echo U('Admin/admin_edit');?>','800','500',x.id)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" ng-click="admin_del(x.id)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
        </tr>
        </tbody>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/leshop/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/leshop/Public/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/leshop/Public/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/leshop/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/leshop/Public/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/leshop/Public/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/leshop/Public/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="/leshop/Public/admin/lib/myScript.js"></script>
<script type="text/javascript" src="/leshop/Public/admin/app.js"></script>
<!--/请在上方写此页面业务相关的脚本-->


<script type="text/javascript">
    app.controller('adminCtrl', function($scope, $http) {

        $http({
            method: 'POST',
            url: "<?php echo U('Admin/getAdminList');?>"
        }).then(function successCallback(response) {
            $scope.names = response.data.records;
        }, function errorCallback(response) {
            // 请求失败执行代码
        });

        
        $scope.admin_start=function (obj,id) {
            layer.confirm('确认要启用吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $http({
                    method: 'POST',
                    url: "<?php echo U('Admin/admin_start');?>",
                    data:{id:id}
                }).then(function successCallback(resonse) {
                    for(var i in $scope.names){
                        if($scope.names[i].id==id){
                            $scope.names[i].status=1;
                        }

                    }
                    layer.msg(resonse.data.message,{icon: resonse.data.icon,time:1000});
                });

            });
        }
        $scope.admin_edit=function (title,url,w,h,id) {
            url+='?id='+id;
            layer_show(title,url,w,h);
        }
        $scope.admin_del=function (id) {
            layer.confirm('确认要删除吗？',function(index){
                $http({
                    method: 'POST',
                    url: "<?php echo U('Admin/admin_del');?>",
                    data:{id:id}
                }).then(function successCallback(resonse) {
                    for(var i in $scope.names){
                        if($scope.names[i].id==id){
                            $scope.names.splice(i,1);
                        }

                    }
                    layer.msg(resonse.data.message,{icon: resonse.data.icon,time:1000});
                });
            });
        }
        $scope.admin_stop=function (obj,id) {
            layer.confirm('确认要停用吗？',function(index){
                //此处请求后台程序，下方是成功后的前台处理……
                $http({
                    method: 'POST',
                    url: "<?php echo U('Admin/admin_stop');?>",
                    data:{id:id}
                }).then(function successCallback(resonse) {
                    for(var i in $scope.names){
                        if($scope.names[i].id==id){
                            $scope.names[i].status=0;
                        }

                    }
                    layer.msg(resonse.data.message,{icon: resonse.data.icon,time:1000});
                });

            });
        }
    });
    /*管理员-增加*/
    function admin_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
</script>

</body>
</html>