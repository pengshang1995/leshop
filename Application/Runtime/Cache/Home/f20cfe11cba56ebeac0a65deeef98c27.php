<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
    <title>乐搭配商城--个人试衣间</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/leshop/Public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script type="text/javascript" src="/leshop/Public/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/leshop/Public/js/move-top.js"></script>
    <script type="text/javascript" src="/leshop/Public/js/easing.js"></script>
    <script type="text/javascript" src="/leshop/Public/js/startstop-slider.js"></script>
    <link href="/leshop/Public/font-frist/css/font-awesome.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/leshop/Public/layui/css/layui.css"  media="all">
    <style type="text/css">
        h2{
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
    
    <script src="/leshop/Public/js/easyResponsiveTabs.js" type="text/javascript"></script>
    <link href="/leshop/Public/css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="/leshop/Public/css/global.css">
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
            <div class="call">
                <p><span>需要帮助？</span>请联系我们<span class="number">0534-8768152</span></span></p>
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
            <div class="logo">
                <a href="<?php echo U('Index/index');?>"><img src="/leshop/Public/images/logo.png" alt="" /></a>
            </div>
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
                    <div class="clear"></div>
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

    <section class="main" style="margin-top: 10px">
        <p class="layui-elem-quote">搭配排行榜</p>
        <table class="layui-table" lay-even lay-skin="nob">
            <colgroup>
                <col width="100">
                <col width="200">
                <col width="60">
                <col width="100">
                <col width="60">
                <col width="60">
                <col width="80">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>排名</th>
                <th>搭配方案名称</th>
                <th>性别</th>
                <th>喜爱量</th>
                <th>关注</th>
                <th>生成效果图</th>
                <th>一键添加购物车</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($newlist["data"])): $k = 0; $__LIST__ = $newlist["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                    <td><?php echo ($k+($p-1)*20); ?></td>
                    <td><?php echo ($vo["title"]); ?></td>
                    <td>
                        <?php if($vo["sex"] == 1): ?>男
                            <?php else: ?>
                            女<?php endif; ?>
                    </td>
                    <td>
                        <?php echo ($vo["star"]); ?>
                    </td>
                    <td>
                        <?php if($vo["truestar"] == 1): ?><button class="layui-btn layui-btn-mini" style="background-color: #CD1F25;" aa="<?php echo ($vo["id"]); ?>" bb="false" onclick="star(this)">
                                <i  class="fa fa-meh-o fa-lg " aria-hidden="true" style="text-align: center;"></i>取消关注
                            </button>
                            <?php else: ?>
                            <button class="layui-btn layui-btn-mini"  aa="<?php echo ($vo["id"]); ?>" onclick="star(this)" bb="true">
                                <i  class="fa fa-meh-o fa-lg " aria-hidden="true" style="text-align: center;"></i>关注
                            </button><?php endif; ?>
                    </td>
                    <td>
                        <button class="layui-btn layui-btn-mini" aa="<?php echo ($vo["id"]); ?>">生成效果图</button>
                    </td>
                    <td>
                        <button class="layui-btn layui-btn-mini" style="background-color: #CD1F25;" aa="<?php echo ($vo["id"]); ?>">一键加入购物车</button>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div id="demo3" style="margin: 0px auto;width: 80%;">

        </div>
        <input type="hidden" id="total" value="<?php echo ($newlist["total"]); ?>" />
        <input type="hidden" id="page" value="<?php echo ($p); ?>" />
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
<div class="clothes-apply">
    <div class="left">
        <div class="dis" onclick="onclickColse()" >
            关闭衣橱
        </div>
        <div class="hidden" onclick="onclickOpen()">
            打开衣橱
        </div>
    </div>
    <div class="right">
        <span class="left-span" onclick="onclickLeft()" title="向左转动模型">

        </span>
        <span class="right-span" onclick="onclickRight()"  title="向右转动模型" >

        </span>
        <img src="" id="img-cloth" />
        <div class="choose-sex">
            <button class="layui-btn" style="background-color: #CD1F25;width: 32px;height: 32px;line-height: 32px;padding-left: 10px;" onclick="OnclickMan()">男</button>
            <button class="layui-btn " style="width: 32px;height: 32px;line-height: 32px;padding-left:10px;" onclick="OnclickWoman()">女</button>
        </div>
        <button class="layui-btn" id="cart-onekey" onclick="addCart()">
            一键添加购物车
        </button>
    </div>
</div>
<script>
    var public="/leshop/Public";
    var root="/leshop";
    var deal='front';
    var sex=1;
    var data=new Array();
    var i=0;
    var base64=new Array();
    $(function () {
        $.ajax({
            url:"/leshop/index.php/Home/Collocate/index",
            type:'post',
            async:false,
            success:function (dataTwo) {
               data=dataTwo;
            }
        });
        hecheng();
    });

   /* var data=new Array();
    data[0]=public+"/images/colth/ss.jpg";
    data[1]=public+"/images/img/to.png";
    data[2]=public+"/images/img/1.png";
    data[3]=public+"/images/img/4.png";
    data[4]=public+"/images/img/3.png";*/


    function OnclickMan() {
        sex=1;
        $.ajax({
            url:"/leshop/index.php/Home/Collocate/index",
            data: {'sex': sex},
            type:'post',
            async:false,
            success:function (dataTwo) {
                data=dataTwo;
            }
        });
        base64.splice(0,base64.length);
        i=0;
        deal='front';
        hecheng();
    }

    function OnclickWoman() {
        sex=0;
        $.ajax({
            url:"/leshop/index.php/Home/Collocate/index",
            data: {'sex': sex},
            type:'post',
            async:false,
            success:function (dataTwo) {
                data=dataTwo;
            }
        });
        base64.splice(0,base64.length);
        i=0;
        deal='front';
        hecheng();
    }
    function hecheng(){
        draw(function(){
            $('#img-cloth').attr('src',base64[i])
        },deal)
    }
    function draw(fn,deal){
        var c=document.createElement('canvas'),
            ctx=c.getContext('2d'),
            len=data.length;
        c.width=300;
        c.height=400;
        ctx.rect(0,0,c.width,c.height);
        ctx.fillStyle='#fff';
        ctx.fill();
        function drawing(n,pos){
            if(n<len){
                var img=new Image;
                //img.crossOrigin = 'Anonymous'; //解决跨域、
                if(n==0){
                    img.src=data[0];
                }else {
                    img.src=root+data[n][pos];
                }

                img.onload=function(){
                    ctx.drawImage(img,0,0,300,400);
                    drawing(n+1,pos);//递归
                }
            }else{
                //保存生成作品图片
                base64.push(c.toDataURL("image/jpeg",0.8));
                //alert(JSON.stringify(base64));
                fn();
            }
        }
        drawing(0,deal);
    }
    function onclickLeft() {
        switch (deal){
            case 'front':
                deal='left';
                i++;
                hecheng();
                break;
            case 'left':
                deal='behind';
                i++;
                hecheng();
                break;
            case 'behind':
                deal='right';
                i++;
                hecheng();
                break;
            case 'right':
                deal='front';
                i++;
                hecheng();
                break;
        }
    }
    function onclickRight() {
        switch (deal){
            case 'front':
                deal='right';
                i++;
                hecheng();
                break;
            case 'right':
                deal='behind';
                i++;
                hecheng();
                break;
            case 'behind':
                deal='left';
                i++;
                hecheng();
                break;
            case 'left':
                deal='right';
                i++;
                hecheng();
                break;
        }
    }
    /*function drawImg(url,x,y,w,h) {
        var canvas =document.getElementById('canvas');
        canvas.width=280;
        canvas.height=360;
        var ctx = canvas.getContext('2d');
        ctx.fillStyle='transparent';//画布填充颜色
        ctx.fill();
        var img=new Image();
        img.src=url;
        ctx.fillRect(0, 0, 240, 360);
        img.onload = function(){ctx.drawImage(img,x,y,w,h);}
    }*/
    function onclickOpen() {
        $('.clothes-apply').animate({'right':'0px'},'slow');
        $('.hidden').delay(1000).hide();
        $('.dis').show().delay(1000);
    }

    function onclickColse() {
        $('.clothes-apply').animate({'right':'-300px'},'slow');
        $('.hidden').show().delay(10);
        $('.dis').hide().delay(10);
    }
    function addCart() {
        layer.confirm('你确定一键添加购物车吗？', {
            btn: ['确定', '取消'] //可以无限个按钮
            ,btn3: function(index, layero){
                //按钮【按钮三】的回调
            }
        }, function(index, layero){
            //按钮【按钮一】的回调
            $.ajax({
                    url:"/leshop/index.php/Home/Cart/addBatchCart",
                    data: {'sex': sex},
                    type:'post',
                    async:false,
                    success:function (data) {
                        if (data == true) {
                            layer.msg('添加购物车成功');
                        } else if (data == false) {
                            layer.msg('请先登录!');
                            location.href = "/leshop/index.php/Home/Public/login";
                        } else{
                            layer.msg(data);
                        }
                    }
                });
            });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>

    <script src="/leshop/Public/layui/layui.js"></script>
    <script>
        function star(obj) {
            var id= $(obj).attr('aa');
            var deal= $(obj).attr('bb');

            if(deal=="true"){
                $.ajax({
                    url:"/leshop/index.php/Home/collocate/addStar",
                    type:'post',
                    data:{'id':id},
                    async:true,
                    success:function (data) {
                        if(data==true){
                            layer.msg('关注成功');
                            location.reload();
                        }else{
                            layer.msg('关注失败');
                        }
                    }
                });
            }else{
                $.ajax({
                    url:"/leshop/index.php/Home/collocate/deleteStar",
                    type:'post',
                    data:{'id':id},
                    async:true,
                    success:function (data) {
                        if(data==true){
                            layer.msg('删除成功');
                            location.reload();
                        }else{
                            layer.msg('删除失败');
                        }
                    }
                });
            }
        }
        function setParam(param,value){
            var query = location.search.substring(1);
            var p = new RegExp("(^|)" + param + "=([^&]*)(|$)");
            if(p.test(query)){
                //query = query.replace(p,"$1="+value);
                var firstParam=query.split(param)[0];
                var secondParam=query.split(param)[1];
                if(secondParam.indexOf("&")>-1){
                    var lastPraam=secondParam.split("&")[1];
                    return  '?'+firstParam+'&'+param+'='+value+'&'+lastPraam;
                }else{
                    if(firstParam){
                        return '?'+firstParam+''+param+'='+value;
                    }else{
                        return '?'+param+'='+value;
                    }
                }
            }else{
                if(query == ''){
                    return '?'+param+'='+value;
                }else{
                    return '?'+query+'&'+param+'='+value;
                }
            }
        }
        var total=$('#total').val();
        var p=$('#page').val();
        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage
                ,layer = layui.layer;
            laypage({
                cont: 'demo3'
                ,pages: total
                ,skip: true,
                curr: p,
                jump: function(e, first){ //触发分页后的回调
                    if(!first){ //一定要加此判断，否则初始时会无限刷新
                        location.href=setParam("p",e.curr);
                    }
                }
            });

        });
    </script>
    <script src="/leshop/Public/layer.js"></script>
    <script type="text/javascript">
        $('button').click(function () {
            switch($(this).html()){
                case '生成效果图':
                    var id= $(this).attr('aa');
                    $.ajax({
                        url:"/leshop/index.php/Home/Collocate/index",
                        data: {'id':id},
                        type:'post',
                        async:false,
                        success:function (dataTwo) {
                            data=dataTwo;
                        }
                    });
                    base64.splice(0,base64.length);
                    i=0;
                    deal='front';
                    hecheng();
                    break;
                case '一键加入购物车':
                    var id= $(this).attr('aa');
                    layer.confirm('你确定一键添加购物车吗？', {
                        btn: ['确定', '取消'] //可以无限个按钮
                        ,btn3: function(index, layero){
                            //按钮【按钮三】的回调
                        }
                    }, function(index, layero){
                        //按钮【按钮一】的回调
                        $.ajax({
                            url:"/leshop/index.php/Home/Cart/addBatchCart",
                            data: {'id':id},
                            type:'post',
                            async:false,
                            success:function (data) {
                                if (data == true) {
                                    layer.msg('添加购物车成功');
                                } else if (data == false) {
                                    layer.msg('请先登录!');
                                    location.href = "/leshop/index.php/Home/Public/login";
                                } else{
                                    layer.msg(data);
                                }
                            }
                        });
                    });
                    break;

            }
        });
    </script>

<a href="#" id="toTop"><span id="toTopHover"> </span></a>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>