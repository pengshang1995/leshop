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
<article class="page-container">
    <form  class="form form-horizontal" id="form-admin-role-add"  ng-app="app" ng-controller="RoleCtrl" novalidate="novalidate" name="roleAdd" novalidate>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" name="title" ng-init="form.title=title"   placeholder="" id="roleName" ng-model="form.title" required>
                <span style="color:red" ng-show="roleAdd.title.$invalid">
                    <span ng-show="roleAdd.title.$error.required">菜单名称是必须的。</span>
                </span>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">权限列表：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><dl class="permission-list">
                        <dt>
                            <label>
                                <?php if(in_array($vo['id'],$single['rules'])): ?><input type="checkbox"  value="<?php echo ($vo["id"]); ?>" name="rules" checked >
                                <?php echo ($vo["title"]); ?>
                                <?php else: ?>
                                    <input type="checkbox"  value="<?php echo ($vo["id"]); ?>" name="rules" >
                                    <?php echo ($vo["title"]); endif; ?>
                            </label>
                        </dt>
                        <dd>
                            <?php if(is_array($vo["_data"])): foreach($vo["_data"] as $key=>$val): ?><dl class="cl permission-list2">
                                    <dt>
                                        <label class="">
                                            <?php if(in_array($val['id'],$single['rules'])): ?><input type="checkbox" value="<?php echo ($val["id"]); ?>"   name="rules" checked >
                                            <?php echo ($val["title"]); ?>
                                                <?php else: ?>
                                                <input type="checkbox" value="<?php echo ($val["id"]); ?>"   name="rules" >
                                                <?php echo ($val["title"]); endif; ?>
                                        </label>
                                    </dt>
                                    <dd>
                                        <?php if(is_array($val["_data"])): foreach($val["_data"] as $key=>$value): ?><label class="">
                                                <?php if(in_array($value['id'],$single['rules'])): ?><input type="checkbox"  value="<?php echo ($value["id"]); ?>"   name="rules" checked>
                                                <?php echo ($value["title"]); ?>
                                                <?php else: ?>
                                                    <input type="checkbox"  value="<?php echo ($value["id"]); ?>"   name="rules"> <?php echo ($value["title"]); endif; ?>
                                            </label><?php endforeach; endif; ?>
                                    </dd>
                                </dl><?php endforeach; endif; ?>
                        </dd>
                    </dl><?php endforeach; endif; ?>

            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button type="submit" ng-disabled="roleAdd.title.$invalid"  ng-click="edit()" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
            </div>
        </div>
    </form>
</article>
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

<script type="text/javascript" src="lib/jquery.ztree.core.js" ></script>
<script type="text/javascript">
    $(function(){
        $(".permission-list dt input:checkbox").click(function(){
            $(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
        });
        $(".permission-list2 dd input:checkbox").click(function(){
            var l =$(this).parent().parent().find("input:checked").length;
            var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;

            if($(this).prop("checked")){
                $(this).closest("dl").find("dt input:checkbox").prop("checked",true);
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
            }
            else{
                if(l==0){
                    $(this).closest("dl").find("dt input:checkbox").prop("checked",false);
                }
                if(l2==0){
                    $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
                }
            }
        });
    });
    app.controller('RoleCtrl',function ($http,$scope) {
        $scope.init = function() {
            $scope.title = "<?php echo ($single["title"]); ?>";
        };
        $scope.init();
        var rules=new Array();
        $scope.edit=function () {
            $("input:checkbox[name='rules']:checked").each(function() { // 遍历name=test的多选框
                rules[rules.length]=$(this).val();  // 每一个被选中项的值
            });
            $scope.form.rules=rules;
            $scope.form.id="<?php echo ($single["id"]); ?>";
            $http({
                method: 'POST',
                url: "<?php echo U('Role/edit_deal');?>",
                data:$scope.form
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


        /*$scope.frist=function ($event) {
         var obj=$event.target;
         $(obj).closest("dl").find("dd input:checkbox").prop("checked",$(obj).prop("checked"));
         }
         $scope.two=function ($event) {
         var obj=$event.target;
         var l =$(obj).parent().parent().find("input:checked").length;
         var l2=$(obj).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
         if($(obj).prop("checked")){
         $(obj).closest("dl").find("dt input:checkbox").prop("checked",true);
         $(obj).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
         }
         else{
         if(l==0){
         console.log(1);
         $(obj).closest("dl").find("dt input:checkbox").prop("checked",false);
         }
         if(l2==0){
         console.log(2);
         $(obj).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
         }
         }
         }*/
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
    });
</script>
</body>
</html>