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
<fieldset class="layui-elem-field">
    <legend>商品规格</legend>
    <div class="layui-field-box layui-form">
        <table class="layui-table admin-table">
            <thead>
            <tr>
                <th style="width: 30px;"><input type="checkbox" lay-filter="allselector" lay-skin="primary"></th>
                <th>编号</th>
                <th>商品规格参数</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="content">
            <?php if(empty($size)): ?><tr>
                    <td colspan="4">没有任何数据</td>
                </tr>
                <?php else: ?>
                <?php if(is_array($size)): $i = 0; $__LIST__ = $size;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><input type="checkbox"  lay-skin="primary"></td>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["size"]); ?></td>
                        <td><button class="layui-btn layui-btn-small" deal="del" aa="<?php echo ($vo["id"]); ?>"><i class="layui-icon"></i></button></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </tbody>
        </table>
    </div>
</fieldset>
<form class="layui-form" action="javascript:;" id="data_forms">
    <div class="layui-form-item">
        <label class="layui-form-label">商品规格</label>
        <div class="layui-input-block"  style="width: 40%">
            <input type="text" name="size"  placeholder="规格参数" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block" >
            <input type="hidden" value="<?php echo ($id); ?>" name="id">
            <button class="layui-btn" lay-submit="" deal="upload" lay-filter="demo1">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="/leshop/Public/admin/layui/layui.js"></script>
<script src="/leshop/Public/admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script>
    layui.use(['form', 'layedit', 'laydate'], function() {
        var form = layui.form(),
            layer = layui.layer,
            layedit = layui.layedit,
            laydate = layui.laydate;

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');
        //自定义验证规则
        /* form.verify({
         title: function(value) {
         if(value.length < 5) {
         return '标题至少得5个字符啊';
         }
         },
         pass: [/(.+){6,12}$/, '密码必须6到12位'],
         content: function(value) {
         layedit.sync(editIndex);
         }
         });*/
        form.on('submit(demo1)', function (data) {
            $.ajax({
                url:"/leshop/index.php/Admin/Shop/addSizeDeal",
                type:'post',
                data:$("#data_forms").serialize(),
                async:true,
                success:function (data) {
                    if(data==true){
                        layer.msg('添加成功');
                        location.reload();
                    }else if(data==false){
                        layer.msg('添加失败');
                    }
                }
            });
            return false;
        });
    });

    $('button').click(
        function () {
            var deal=$(this).attr('deal');
            switch (deal){
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
                            url:"/leshop/index.php/Admin/Shop/deleteSize",
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
</script>