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
<div class="page-container" >
    <form class="form" ng-app="app" ng-controller="AuthCtrl"   id="form-add" novalidate="novalidate" name="formAdd" novalidate>
        <table class="table table-border table-bordered table-hover ">
            <tbody>
            <tr id="trparentid">
                <td width="100">父菜单：</td>
                <td>
                    {{title}}
                </td>
            </tr>
            <tr>
                <td width="100">名称：</td>
                <td>
                    <input type="text" class="input-text" value="" name="title" placeholder="菜单名称" ng-model="addAuth.title" required>
                    <span style="color:red" ng-show="formAdd.title.$invalid">
                            <span ng-show="formAdd.title.$error.required">菜单名称是必须的。</span>
                        </span>
                </td>
            </tr>

            <tr ng-if="type!=0">
                <td>链接：</td>
                <td>
                    <input type="text" class="input-text" value="" name="name" ng-init="addAuth.percode='必填'" placeholder="菜单链接" ng-model="addAuth.percode" required>
                    <span style="color:red" ng-show="formAdd.name.$invalid">
                            <span ng-show="formAdd.name.$error.required">链接是必须的。</span>
                        </span>
                </td>
            </tr>
            <tr>
                <td>操作：</td>
                <td>
                    <input type="hidden" ng-init="addAuth.pid=pid" ng-model="addAuth.pid"  >
                    <input type="hidden" ng-init="addAuth.type=2" ng-model="addAuth.type"  >
                    <input type="submit" ng-disabled="formAdd.name.$invalid ||  formAdd.title.$invalid" ng-click="submit_add()" class="btn btn-primary radius size-S"   value="提交" >

                </td>
            </tr>
            </tbody></table>
    </form>
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
    app.controller('AuthCtrl',function ($http,$scope) {
        $scope.init = function() {
            $scope.pid = "<?php echo ($pid); ?>";
            $scope.title = "<?php echo ($title); ?>";
        };

        $scope.init();
        $scope.submit_add=function () {
            $http({
                method: 'POST',
                url: "<?php echo U('Menu/add_deal');?>",
                data:$scope.addAuth
            }).then(function successCallback(response) {
                layer.msg(response.data.message, {
                    icon: response.data.icon,
                    time: 2000
                });
                if(response.data.icon==1){
                    setTimeout(function () {
                        parent.location.reload();
                    },2100);
                }
            }, function errorCallback(response) {
                // 请求失败执行代码
            });
        }
        $scope.layer_show=function(title,url,w,h){
            if (title == null || title == '') {
                title=false;
            };
            if (url == null || url == '') {
                url="404.html";
            };
            if (w == null || w == '') {
                w=800;
            };
            if (h == null || h == '') {
                h=($(window).height() - 50);
            };
            var index = layer.open({
                type: 2,
                content: url,
                area: ['300px', '195px'],
                title: title,
                maxmin: true
            });
            layer.full(index);
            /*  layer.open({
             type: 2,
             area: [w+'px', h +'px'],
             fix: false, //不固定
             maxmin: true,
             shade:0.4,

             });*/
        }
    })
</script>
</body>
</html>