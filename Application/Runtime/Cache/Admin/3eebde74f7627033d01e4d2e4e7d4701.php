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
<div class="admin-main">
    <fieldset class="layui-elem-field">
        <legend>商品列表</legend>
        <div class="layui-field-box layui-form">
            <table class="layui-table admin-table">
                <thead>
                <tr>
                    <th style="width: 30px;"><input type="checkbox" lay-filter="allselector" lay-skin="primary"></th>
                    <th>编号</th>
                    <th width="30%">商品名称</th>
                    <th>价格</th>
                    <th>上架</th>
                    <th>库存</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="content">
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td style="width: 30px;"><input type="checkbox" lay-skin="primary"></td>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["goodname"]); ?></td>
                        <td><?php echo ($vo["goodprice"]); ?></td>
                        <td><?php if($vo['status'] == 1 ): ?><i class="fa fa-check"></i><?php else: ?> <i class="fa fa-times"></i><?php endif; ?></td>
                        <td><?php echo ($vo["num"]); ?></td>
                        <td>
                            <button class="layui-btn layui-btn-small" deal="edit" aa="<?php echo ($vo["id"]); ?>"><i class="layui-icon"></i></button>
                            <button class="layui-btn layui-btn-small" deal="upload-model" aa="<?php echo ($vo["id"]); ?>"><i class="layui-icon"></i> 上传模型</button>
                            <button class="layui-btn layui-btn-small" deal="upload-size" aa="<?php echo ($vo["id"]); ?>"><i class="layui-icon"></i>商品规格上传</button>
                            <button class="layui-btn layui-btn-small" deal="upload-img" aa="<?php echo ($vo["id"]); ?>"><i class="layui-icon"></i> 多图上传</button>
                            <button class="layui-btn layui-btn-small" deal="del" aa="<?php echo ($vo["id"]); ?>"><i class="layui-icon"></i></button>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </fieldset>
    <div class="admin-table-page">
        <div id="paged" class="page">
        </div>
    </div>
</div>
<script type="text/javascript" src="/leshop/Public/admin/layui/layui.js"></script>
<script src="/leshop/Public/admin/layui/lay/lib/jquery.js" type="text/javascript"></script>
<script src="/leshop/Public/admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="/leshop/Public/layer.js"></script>
<script type="text/javascript">
    var public ="/leshop/Public/admin/";
    layui.config({
        base: public+'js/'
    });

    layui.use(['form'], function() {

    });
    $('button').click(
        function () {
            var deal=$(this).attr('deal');
            switch (deal){
                case 'edit':
                    var id=$(this).attr('aa');
                    layer.open({
                        type: 2,
                        area: ['100%', '100%'],
                        shadeClose: true, //点击遮罩关闭
                        content:'/leshop/index.php/Admin/Shop/editGood?id='+id
                    });
                    break;
                case 'upload-model':
                    var id=$(this).attr('aa');
                    layer.open({
                        type: 2,
                        area: ['100%', '100%'],
                        shadeClose: true, //点击遮罩关闭
                        content:'/leshop/index.php/Admin/Shop/addModelImg?id='+id
                    });
                    break;
                case 'upload-img':
                    var id=$(this).attr('aa');
                    layer.open({
                        type: 2,
                        area: ['100%', '100%'],
                        shadeClose: true, //点击遮罩关闭
                        content:'/leshop/index.php/Admin/Shop/addImg?id='+id
                    });
                    break;
                case 'upload-size':
                    var id=$(this).attr('aa');
                    layer.open({
                        type: 2,
                        area: ['100%', '100%'],
                        shadeClose: true, //点击遮罩关闭
                        content:'/leshop/index.php/Admin/Shop/addSize?id='+id
                    });
                    break;
                case 'del':
                    var id=$(this).attr('aa');
                    layer.confirm('你确定要删除吗？', {
                        btn: ['确定', '取消'] //可以无限个按钮
                        ,btn3: function(index, layero){
                            //按钮【按钮三】的回调
                        }
                    }, function(index, layero){
                        //按钮【按钮一】的回调
                        $.ajax({
                            url:"/leshop/index.php/Admin/Shop/deleteGood",
                            type:'post',
                            data:{'id':id},
                            async:true,
                            success:function (data) {
                                if(data==true){
                                    layer.msg('删除成功');
                                    location.reload();
                                }else if(data==false){
                                    layer.msg('删除失败');
                                }
                            }
                        });
                    });
                    break;

            }
        }
    );
    $('a').click(
        function () {
            var deal=$(this).attr('deal');
            switch (deal){
                case 'add':
                    layer.open({
                        type: 2,
                        area: ['100%', '100%'],
                        shadeClose: true, //点击遮罩关闭
                        content:'/leshop/index.php/Admin/Rule/add_admin_page'
                    });
                    break;

            }
        }
    );
</script>