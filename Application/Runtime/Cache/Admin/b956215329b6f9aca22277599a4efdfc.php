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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 菜单管理 <span class="c-gray en">&gt;</span> 菜单列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<section class="main-width" style="height: 90%">
    <div class="row cl">
        <div class="col-xs-0 col-sm-2" >
            <div class="zTreeDemoBackground left">
                <ul id="treeDemo" class="ztree"></ul>
            </div>
        </div>
        <div class="col-xs-12 col-sm-10" style="height: 500px">
            <iframe scrolling="yes" id="deptIframe" frameborder="0" src="<?php echo U('Menu/welcome');?>" width="100%" height="80%"></iframe>
        </div>
    </div>
</section>
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

<script type="text/javascript" src="admin/lib/jquery.ztree.core.js" ></script>
<script type="text/javascript">
    var setting = {
        data: {
            simpleData: {
                enable: true
            }
        },
        callback:{
            onClick:onClick
        }
    };
    var zNodes;
    $(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo U('Menu/getMenu');?>",
            async: false,
            success: function(msg){
                zNodes=msg;
            }
        });
    })

   /* var zNodes = [
        {id:0,name:"根节点", open:true, iconOpen:"css/img/diy/1_open.png", iconClose:"css/img/diy/1_close.png"},
        { id:1, pId:0, name:"展开、折叠 自定义图标不同", open:true, iconOpen:"css/img/diy/1_open.png", iconClose:"css/img/diy/1_close.png"},
        { id:11, pId:1, name:"叶子节点1", icon:"css/img/diy/2.png"},
        { id:12, pId:1, name:"叶子节点2", icon:"css/img/diy/3.png"},
        { id:13, pId:1, name:"叶子节点3", icon:"css/img/diy/5.png"},
        { id:2, pId:0, name:"展开、折叠 自定义图标相同", open:true, icon:"css/img/diy/4.png"},
        { id:21, pId:2, name:"叶子节点1", icon:"css/img/diy/6.png"},
        { id:22, pId:2, name:"叶子节点2", icon:"css/img/diy/7.png"},
        { id:23, pId:2, name:"叶子节点3", icon:"css/img/diy/8.png"},
        { id:3, pId:0, name:"不使用自定义图标", open:true },
        { id:31, pId:3, name:"叶子节点1"},
        { id:32, pId:3, name:"叶子节点2"},
        { id:33, pId:3, name:"叶子节点3"}

    ];*/
    function onClick(event, treeId, treeNode, clickFlag) {
        url="<?php echo U('Menu/dis_menu');?>";
        loadIframe('deptIframe', url+'?id=' + treeNode.id)
    }
    function loadIframe(iframeName, url) {
        var iframe = $('#' + iframeName);
        if (iframe.length) {
            iframe.attr('src', url);
            return false;
        }
        return true;
    }

    $(document).ready(function(){
        $.fn.zTree.init($("#treeDemo"), setting, zNodes);
    });

    //-->
</script>
</body>
</html>