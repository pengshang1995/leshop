<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
    <title>乐搭配商城--个人中心</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/leshop/Public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/leshop/Public/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/leshop/Public/js/move-top.js"></script>
    <script type="text/javascript" src="/leshop/Public/js/easing.js"></script>
    <script type="text/javascript" src="/leshop/Public/js/startstop-slider.js"></script>
    <link href="/leshop/Public/font-frist/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/leshop/Public/layui/css/layui.css"  media="all">
    
    <script src="/leshop/Public/js/easyResponsiveTabs.js" type="text/javascript"></script>
    <link href="/leshop/Public/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="/leshop/Public/css/global.css">
    <link rel="stylesheet" href="/leshop/Public/css/user.css">
    <script src="/leshop/Public/js/slides.min.jquery.js"></script>

    <script>
        var public='/leshop/Public';
        $(function(){
            $('#products').slides({
                preload: true,
                preloadImage: public+'img/loading.gif',
                effect: 'slide, fade',
                crossfade: true,
                slideSpeed: 350,
                fadeSpeed: 500,
                generateNextPrev: true,
                generatePagination: false
            });
        });
    </script>

</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="headertop_desc">
            <div class="logo">
                <a href="index.html"><img src="/leshop/Public/images/logo.png" alt="" /></a>
            </div>
            <div class="account_desc">
                <?php if(empty($_SESSION['user'])): ?><ul>
                        <li><a href="<?php echo U('Public/login');?>">登录</a></li>
                        <li><a href="<?php echo U('Public/login');?>">注册</a></li>
                    </ul>
                    <?php else: ?>
                    <ul>
                        <li><?php echo W('Public/getUser');?></li>
                        <li><a href="<?php echo U('Cart/cartDis');?>">我的购物车</a></li>
                        <li><a href="<?php echo U('Personal/index');?>">个人中心</a></li>
                        <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
                    </ul><?php endif; ?>

            </div>
            <div class="clear"></div>
        </div>
        <div class="header_top">

            <script type="text/javascript">
                function DropDown(el) {
                    this.dd = el;
                    this.initEvents();
                }
                DropDown.prototype = {
                    initEvents : function() {
                        var obj = this;

                        obj.dd.on('click', function(event){
                            $(this).toggleClass('active');
                            event.stopPropagation();
                        });
                    }
                }

                $(function() {

                    var dd = new DropDown( $('#dd') );

                    $(document).click(function() {
                        // all dropdowns
                        $('.wrapper-dropdown-2').removeClass('active');
                    });

                });

            </script>
            <div class="clear"></div>
        </div>
        <div class="header_bottom">
            <div class="menu">
                <ul>
                    <li class="active"><a href="<?php echo U('Index/index');?>">主页</a></li>
                    <li><a href="<?php echo U('Collocate/collocateList');?>">个人试衣间</a></li>
                    <li><a href="<?php echo U('Collocate/ranking');?>">搭配排行榜</a></li>
                    <li><a href="#">联系我们</a></li>
                </ul>
            </div>
            <div class="search_box">
                <form>
                    <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    
    <section class="main">
        <p class="layui-elem-quote">个人中心</p>
        <div class="main-content">
                <div class="per-left">
                    <ul>
                        <li><a href="">个人信息</a></li>
                        <li><a href="">未付款订单</a></li>
                        <li><a href="">待发货订单</a></li>
                        <li><a href="">待收获订单</a></li>
                        <li><a href="">待评价订单</a></li>
                        <li><a href="">售后服务</a></li>
                        <li><a href="">收货地址管理</a></li>
                    </ul>
                </div>
                <div class="per-right">
                    <div class="per-right-content">
                        <form class="layui-form" action="javascript:;" id="data_forms">
                            <div class="layui-form-item">
                                <label class="layui-form-label">昵称</label>
                                <div class="layui-input-block" style="width: 40%">
                                    <input type="text" name="nicname" lay-verify="title" autocomplete="off" placeholder="" value="<?php echo ($data["nicname"]); ?>" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">性别</label>
                                <div class="layui-input-block" style="width: 40%">
                                    <select name="sex" lay-filter="aihao" value="">
                                        <?php if($data["sex"] == 1): ?><option value="1">男</option>
                                            <?php else: ?>
                                            <option value="0">女</option><?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">出生日期</label>
                                <div class="layui-input-block" style="width: 40%">
                                    <input type="text" name="birthday" id="date" lay-verify="date" placeholder="<?php echo (date('Y-m-d',$data["birthday"])); ?>" autocomplete="off" class="layui-input" onclick="layui.laydate({elem: this})">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">手机号</label>
                                <div class="layui-input-inline">
                                    <input type="tel" name="tel" lay-verify="phone" value="<?php echo ($data["tel"]); ?>" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <input type="hidden" value="<?php echo ($date["id"]); ?>" name="id" >
                                    <button class="layui-btn" lay-submit="" deal="upload" lay-filter="demo1">保存个人信息</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clear-float"></div>
        </div>
    </section>


</div>
<div class="footer">
    <div class="wrap">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>购物指南</h4>
                <ul>
                    <li><a href="about.html">购物流程</a></li>
                    <li><a href="contact.html">会员介绍</a></li>
                    <li><a href="#">生活旅行</a></li>
                    <li><a href="delivery.html">常见问题</a></li>
                    <li><a href="contact.html">联系客服</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>配送方式</h4>
                <ul>
                    <li><a href="about.html">上门自提</a></li>
                    <li><a href="contact.html">211限时达</a></li>
                    <li><a href="#">配送服务查询</a></li>
                    <li><a href="contact.html">配送费收取标准</a></li>
                    <li><a href="#">海外配送</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>支付方式</h4>
                <ul>
                    <li><a href="contact.html">货到付款</a></li>
                    <li><a href="index.html">在线支付</a></li>
                    <li><a href="#">分期付款</a></li>
                    <li><a href="#">邮局汇款</a></li>
                    <li><a href="contact.html">公司转账</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>电话</h4>
                <ul>
                    <li><span>+91-123-456789</span></li>
                    <li><span>+00-123-000000</span></li>
                </ul>
                <div class="social-icons">
                    <h4>联系方式</h4>
                    <ul>
                        <li><a href="#" target="_blank"><img src="/leshop/Public/images/facebook.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="/leshop/Public/images/twitter.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"><img src="/leshop/Public/images/skype.png" alt="" /> </a></li>
                        <li><a href="#" target="_blank"> <img src="/leshop/Public/images/dribbble.png" alt="" /></a></li>
                        <li><a href="#" target="_blank"> <img src="/leshop/Public/images/linkedin.png" alt="" /></a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy_right">
        <p>2017  &copy;  PHPCoder 德州学院</p>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>

    <script type="text/javascript" src="/leshop/Public/admin/plugins/layui/layui.js"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <script>
        layui.use(['form', 'layedit', 'laydate'], function () {
            var form = layui.form(),
                layer = layui.layer,
                layedit = layui.layedit,
                laydate = layui.laydate;

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
                 url:"/leshop/index.php/Home/Personal/editUser",
                 type:'post',
                 data:$("#data_forms").serialize(),
                 async:true,
                 success:function (data) {
                 if(data==true){
                 layer.msg('保存成功');
                 parent.location.reload();
                 }else if(data==false){
                 layer.msg('保存失败');
                 }
                 }
                 });
                return false;
            });
        });
    </script>
    <script src="/leshop/Public/layer.js"></script>
    <script type="text/javascript">
        if($('#btn').prop('checked')==false){
            var i=1;
        }else{
            var i=2;
        }
        $('#btn').click(function () {

            if(i%2==1){
                $("input:checkbox").prop('checked',true);
            }else{
                $("input:checkbox").prop('checked',false);
            }
            i++;

        });
        $('button').click(function () {
            switch($(this).html()){
                case '编辑':
                    var id= $(this).attr('aa');
                    $.ajax({
                        url:"/leshop/index.php/Home/Cart/GetOneCart",
                        type:'post',
                        data:{'id':id},
                        async:true,
                        success:function (data) {
                            if(data==false){
                                layer.msg('编辑失败');
                            }else{
                                $('#goodname').html(data.goodname);
                                $('#single').html('$'+data.price/data.goodnum);
                                $('#ps-num').val(data.goodnum);
                                $('#ps-good-id').val(data.id);
                            }
                        }
                    });
                    layer.open({
                        type: 1,
                        area: ['600px', '360px'],
                        shadeClose: true, //点击遮罩关闭
                        content:$('.out-body')
                    });
                    break;
                case '提交修改':
                    var id=$('#ps-good-id').val();
                    $.ajax({
                        url:"/leshop/index.php/Home/Cart/updateCart",
                        type:'post',
                        data:{'id':id,'goodnum':$('#ps-num').val(),'single':$('#single').html()},
                        async:true,
                        success:function (data) {
                            if(data==true){
                                layer.msg('更新成功');
                                location.reload();
                            }else{
                                layer.msg('更新失败');
                            }
                        }
                    });
                    break;
                case '删除':
                    var id=$(this).attr('aa');
                    $.ajax({
                        url:"/leshop/index.php/Home/Cart/deleteCart",
                        type:'post',
                        data:{'id':id},
                        async:true,
                        success:function (data) {
                            if(data==true){
                                layer.msg('删除成功');
                                location.reload();
                            }else {
                                layer.msg("删除失败");
                            }
                        }
                    });
                    break;
                case '批量删除':
                    layer.confirm('你确定清空购物车中选中的商品吗', {
                        btn: ['确定','放弃'] //按钮
                    }, function(){
                        var obj=document.getElementsByName("good");
                        var check_val=[];
                        for (k in obj){
                            if(obj[k].checked){
                                check_val.push(obj[k].value);
                            }
                        }
                        $.ajax({
                            url:"/leshop/index.php/Home/Cart/deleteBatchCart",
                            type:'post',
                            data:{'id':check_val},
                            async:true,
                            success:function (data) {
                                if(data==true){
                                    layer.msg('删除成功');
                                    location.reload();
                                }else {
                                    layer.msg("删除失败");
                                }
                            }
                        });
                    }, function(){

                    });
                    break;
                case '去结算':
                    var obj=document.getElementsByName("good");
                    var check_val=[];
                    for (k in obj){
                        if(obj[k].checked){
                            check_val.push(obj[k].value);
                        }
                    }
                    $.ajax({
                        url:"/leshop/index.php/Home/Order/add_order",
                        type:"post",
                        data:{'id':check_val},
                        async:true,
                        success:function (data) {
                            if(data!=false){
                                location.href="/leshop/index.php/Home/Order/order/id/"+data.id;
                            }
                        }
                    })
                    break;

            }
        });
    </script>

<a href="#" id="toTop"><span id="toTopHover"> </span></a>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>