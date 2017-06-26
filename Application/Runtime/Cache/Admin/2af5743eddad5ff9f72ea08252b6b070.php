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
    <blockquote class="layui-elem-quote">
        <a href="javascript:;" class="layui-btn layui-btn-small" deal="add" id="add">
            <i class="layui-icon">&#xe608;</i> 添加分类
        </a>
        <!-- <a href="#" class="layui-btn layui-btn-small" id="import">
             <i class="layui-icon">&#xe608;</i> 导入信息
         </a>
         <a href="#" class="layui-btn layui-btn-small">
             <i class="fa fa-shopping-cart" aria-hidden="true"></i> 导出信息
         </a>
         <a href="#" class="layui-btn layui-btn-small" id="getSelected">
             <i class="fa fa-shopping-cart" aria-hidden="true"></i> 获取全选信息
         </a>
         <a href="javascript:;" class="layui-btn layui-btn-small" id="search">
             <i class="layui-icon">&#xe615;</i> 搜索
         </a>-->
    </blockquote>
    <fieldset class="layui-elem-field">
        <legend>分类列表</legend>
        <div class="layui-field-box layui-form">
            <table class="layui-table admin-table">
                <thead>
                <tr>
                    <th style="width: 30px;"><input type="checkbox" lay-filter="allselector" lay-skin="primary"></th>
                    <th>id</th>
                    <th>类型名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="content">
                    <?php echo ($data); ?>
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

    layui.use(['paging', 'form'], function() {
        var $ = layui.jquery,
            paging = layui.paging(),
            layerTips = parent.layer === undefined ? layui.layer : parent.layer, //获取父窗口的layer对象
            layer = layui.layer, //获取当前窗口的layer对象
            form = layui.form();

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
                        content:'/leshop/index.php/Admin/Shop/editTypePage?id='+id
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
                            url:"/leshop/index.php/Admin/Shop/deleteGoodType",
                            type:'post',
                            data:{'id':id},
                            async:true,
                            success:function (data) {
                                if(data.status==true){
                                    layer.msg(data.info);
                                    location.reload();
                                }else if(data.status==false){
                                    layer.msg(data.info);
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
                        content:'/leshop/index.php/Admin/Shop/addTypePage'
                    });
                    break;

            }
        }
    );
</script>




    <div id="out-edit-node" class="col-lg-12" style="display: none">
        <div class="row">
            <div class="col-sm-12">
                <div class="box border primary">
                    <div class="box-title">
                        <h4><i class="fa fa-bars"></i></h4>
                        <div class="tools hidden-xs">
                            <a href="#box-config" data-toggle="modal" class="config">
                                <i class="fa fa-cog"></i>
                            </a>
                            <a href="javascript:;" class="reload">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <a href="javascript:;" class="collapse">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body big">
                        <form class="form-horizontal" role="form" id="edit_node_forms">
                             <div class="form-group">
                                <label class="col-sm-3 control-label">顶级节点</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="node_pid"name="pid" >
                                        <option value="0">顶级类型</option>
                                        <?php echo ($lay); ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-3 control-label">商品类型 </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="" id="node_typename" name="typename">
                                </div>
                            </div>
                       
                     
                            <div class="form-group">
                                <input type="hidden" value="" name="id" id="node_id">
                                <div class="col-sm-1 col-sm-offset-2"><button type="button" class="btn btn-primary">保存信息</button></div>
                                <div class="col-sm-1 col-sm-offset-2"><button type="button" class="btn btn-primary">取消</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('button').click(
            function () {
                switch ($(this).html()) {
                    case "提交":
                        $.ajax({
                            url:"/leshop/index.php/Admin/Shop/addGoodType",
                            type:'post',
                            data:$("#node_forms").serialize(),
                            async:true,
                            success:function (data) {
                                if(data==true){
                                    layer.closeAll();
                                    layer.msg('添加成功');
                                    location.reload();
                                }else if(data==false){
                                    layer.msg('添加失败');
                                }
                            }
                        });
                        break;
                    case '取消':
                        layer.closeAll();
                        break;
                    case '编辑':
                        var id=$(this).attr('aa');
                        $.ajax({
                            url:"/leshop/index.php/Admin/Shop/SelectOneNode",
                            type:'post',
                            data:{'id':id},
                            async:true,
                            success:function (data) {
                                /**
                                 * 返回json数据
                                 */                             
                                $('#node_pid').val(data.pid);
                                $('#node_id').val(data.id);
                                $('#node_typename').val(data.typename);
                            
                                layer.open({
                                    type: 1,
                                    area: ['600px', '360px'],
                                    shadeClose: true, //点击遮罩关闭
                                    content:$('#out-edit-node')
                                });
                            }
                        });
                        break;
                    case '保存信息':
                        $.ajax({
                            url:"/leshop/index.php/Admin/Shop/editGoodType",
                            type:'post',
                            data:$("#edit_node_forms").serialize(),
                            async:true,
                            success:function (data) {
                                if(data==true){
                                    layer.closeAll();
                                    layer.msg('保存成功');
                                    location.reload();
                                }else if(data==false){
                                    layer.msg('保存失败');
                                }
                            }
                        });
                        break;
                    case '删除':
                        var id=$(this).attr('aa');
                        $.ajax({
                            url:"/leshop/index.php/Admin/Shop/deleteGoodType",
                            type:'post',
                            data:{'id':id},
                            async:true,
                            success:function (data) {
                                if(data.status==true){
                                    layer.msg(data.info);
                                    location.reload();
                                }else if(data.status==false){
                                    layer.msg(data.info);
                                }
                            }
                        });
                        break;
                }
            }
        );
    </script>



    <script src="/leshop/Public/layer.js"></script>
    <script type="text/javascript">
        $('#add_node').on('click', function(){
            layer.open({
                type: 1,
                area: ['600px', '360px'],
                shadeClose: true, //点击遮罩关闭
                content:$('#out-tip-group')
            });
        });
    </script>