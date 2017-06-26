<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
    <title>Lee商城--首页</title>
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
        <p class="layui-elem-quote">我的购物车</p>

        <div class="layui-form">
            <table class="layui-table">
                <colgroup>
                    <col width="50">
                    <col width="400">
                    <col width="100">
                    <col width="200">
                    <col width="100">
                    <col>
                </colgroup>
                <thead>
                <tr>
                    <th><input type="checkbox" name="" id="btn" lay-skin="primary" lay-filter="allChoose" title="全选" style="display: block"></th>
                    <th>商品信息</th>
                    <th>单价</th>
                    <th>数量</th>
                    <th>总价</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><input type="checkbox" name="good" lay-skin="primary" value="<?php echo ($vo["id"]); ?>" style="display: block"></td>
                            <td><div class="good-info">
                                <div class="left"><img src="<?php echo ($vo["savepath"]); ?>"/> </div>
                                <div class="right"><span><?php echo ($vo["goodname"]); ?></span></div>
                            </div></td>
                            <td>$<?php echo ($vo["single"]); ?></td>
                            <td><?php echo ($vo["goodnum"]); ?></td>
                            <td>$<?php echo ($vo["price"]); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <button class="layui-btn " aa="<?php echo ($vo["id"]); ?>">编辑</button>
                                    <button class="layui-btn" aa="<?php echo ($vo["id"]); ?>">删除</button>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <p class="sub-cart">  <button class="layui-btn">去结算</button><button class="layui-btn layui-btn-danger">批量删除</button></p>
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

    <div class="out-body" style="display: none;">
            <div class="layui-form-item">
                <label class="layui-form-label">商品名称</label>
                <div class="layui-input-block">
                    <div class="layui-form-mid layui-word-aux" id="goodname"></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">单价</label>
                <div class="layui-input-block">
                    <div class="layui-form-mid layui-word-aux" id="single"></div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">数量</label>
                <div class="layui-input-block">
                    <select  name="quiz1" class="cart-num" id="ps-num">
                        <option value=""></option>
                        <option value="1" selected="">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <input type="hidden" value="" id="ps-good-id"/>
                <label class="layui-form-label" style="margin-left: 100px;"> <button class="layui-btn layui-btn-normal">提交修改</button></label>
                <label class="layui-form-label">  <button class="layui-btn layui-btn-warm">取消</button></label>

            </div>
    </div>
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