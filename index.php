<?php
	include_once "./include/common.php";
?>
<html>
	<head>
	    <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./asset/css/iconfont.css">
		<script type="text/javascript" src="./asset/layui/layui.js"></script>
		<link rel="stylesheet" type="text/css" href="./asset/layui/css/layui.css">
		<script type="text/javascript" src="./asset/js/jquery.js"></script>
		<script src="./asset/jquery/jquery.cookie.js" ></script>
		<style>
		    html,body
		    {
		        margin:0;
		        padding:0;
		        width:100%;
		        height:auto;
		    }
		    a
            {
            	text-decoration:none;
            }
            img
            {
                user-select: none;
            }
            .baobao-login-head
            {
                height:50px;
                width:100%;
                background-color:#719D30;
                line-height:50px;
                z-index:200;
                margin-top:0;
                top:0;
                position: fixed;
            }
            .baobao-login-head .baobao-span
            {
                color:#fff;
                font-weight:bold;
                user-select:none;
            }
            .baobao-foot
            {
                position: absolute;
                left: 0px;
                bottom: -100px;
                z-index: 9999;
                width:100%;
                height:60px;
                background-color:<?php echo $colors['74'];?>;
                color:<?php echo $colors['75'];?>;
                user-select: none;
                line-height: 60px;
                margin-top:10px;
            }
            .layui-carousel div::-webkit-scrollbar
			{
				width:2px;
			}
			.layui-carousel div::-webkit-scrollbar-thumb
			{
				border-radius: 1px;
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				background:<?php echo $colors['76'];?>;
			}
			.layui-carousel div::-webkit-scrollbar-track
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
            .layui-tab-card > .layui-tab-title .layui-this
            {
                background-color:#003300;
                color:#fff;
                border:none;
            }
            .layui-tab-card > .layui-tab-title .layui-this::after
            {
                color:#fff;
                border:none;
            }
            .layui-tab-card > .layui-tab-title li
            {
                width:25%;
                min-width: 25%;
                padding:0;
                padding-top:auto;
                padding-bottom:auto;
                margin:0;
                user-select: none;
                line-height:40px;
                overflow-x: auto;
                overflow-y: hidden;
            }
            .layui-tab-card > .layui-tab-title li::-webkit-scrollbar
			{
				height:2px;
				display: none;
			}
			.layui-tab-card > .layui-tab-title li::-webkit-scrollbar-thumb
			{
				border-radius: 1px;
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				background:<?php echo $colors['76'];?>;
			}
			.layui-tab-card > .layui-tab-title li::-webkit-scrollbar-trac
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			html::-webkit-scrollbar
			{
				width:4px;   
			}
			html::-webkit-scrollbar-thumb
			{
				border-radius: 2px;
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				background:<?php echo $colors['76'];?>;
			}
			html::-webkit-scrollbar-trac
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			
            .layui-tab
            {
               box-shadow:none;
            }
        </style>
        <script>
            var a_idx = 0;
            jQuery(document).ready(function($) {
                $("body").click(function(e) {
                    var a = new Array("影小薯","博客","❤","鲍鲍");
                    var $i = $("<span></span>").text(a[a_idx]);
                    a_idx = (a_idx + 1) % a.length;
                    var x = e.pageX,
                    y = e.pageY;
                    $i.css({
                        "z-index": 999,
                        "top": y - 120,
                        "left": x,
                        "position": "absolute",
                        "font-weight": "bold",
                        "user-select":"none",
                        "color": "rgb("+~~(255*Math.random())+","+~~(255*Math.random())+","+~~(255*Math.random())+")",
                        "font-size":(Math.random()*(15 - 10) + 10)+"px"
                    });
                    $("body").append($i);
                    $i.animate({
                        "top": y - 20,
                        "opacity": 0
                    },
                    1500,
                    function() {
                        $i.remove();
                    });
                });
            });
        </script>
	</head>
	<body style="background-color:<?php echo $colors['70'];?>;">
	    <script pointColor="<?php echo colortype($colors['72']);?>" color="<?php echo colortype($colors['71']);?>" opacity='1' zIndex="-1" count="100"  src="./asset/js/dist_canvas-nest.js"></script>
	    <nav class="baobao-login-head" style="background-color:<?php echo $colors['68'];?>;overflow:hidden;">
    		<a href="./">
    			<div style="float:left;text-indent:20px;">
    				<span class="baobao-span iconfont icon-Daytimemode" style="color:<?php echo $colors['69'];?>;"></span>
    			</div>
    			<div style="float:left;">
    				<span class="baobao-span" style="font-size:15px;color:<?php echo $colors['69'];?>;">影小薯博客系统</span>
    			</div>
    		</a>
    		<a href="./reg.php">
        		<div style="float:right;margin-right:10px;">
    				<span class="baobao-span" style="color:<?php echo $colors['69'];?>;">注册</span>
    			</div>
    		</a>
    		<a href="./login.php">
    			<div style="float:right;margin-right:30px;">
    				<span class="baobao-span" style="color:<?php echo $colors['69'];?>;">登录</span>
    			</div>
			</a>
    	</nav>
    	<?php if($conf['notice_num']!=0){ ?>
		<div class="layui-carousel" id="notice" lay-filter="test4" style="align-items:center;left: 50%;margin-top:60px;transform: translate(-50%,0%);width:<?php echo $conf['notice_width']?>;border-radius:15px;background-color:<?php echo $colors['73'];?>;height:<?php echo $conf['notice_height']?>;">
            <div carousel-item="" style="border-radius:15px;overflow-y:auto;overflow-x:hidden;">
                <?php
                    for($i=1;$i<=$conf['notice_num'];$i++)
                    {
                        $notice_="notice_$i";
                        echo $conf[$notice_];
                    }
                ?>
            </div>
        </div>
        <?php }?>
        <?php echo $conf['notice_6'];?>
        <div class="baobao-foot">
            <span style="margin-left:20px;">Copyright © 2021</span>
            <span style="margin-left:20px;">影小薯</span>
        </div>
        <script>
        <?php if($conf['notice_num']!=0){ ?>
            layui.use(['carousel', 'form'], function(){
              var carousel = layui.carousel;
              //设定各种参数
              var ins3 = carousel.render({
                elem: '#notice'
                ,autoplay:<?php echo $conf['notice_autoplay'];?>//自动播放打开ON关闭OFF
                ,interval:<?php echo $conf['notice_interval'];?>
                ,indicator:'<?php if($conf['notice_indicator']==0){echo "indicator";}else if($conf['notice_indicator']==1){echo "outside";}else{echo "none";}?>'//outtside外部none没有
                ,arrow:'<?php if($conf['notice_arrow']==0){echo "arrow";}else if($conf['notice_arrow']==1){echo "always";}else{echo "none";}?>'//always一直none没有
                ,anim:'<?php if($conf['notice_anim']==0){echo "default";}else if($conf['notice_anim']==1){echo "fade";}else{echo "updown";}?>'//fade渐隐updown上下
                ,width: '<?php echo $conf['notice_width'];?>'
                ,height: '<?php echo $conf['notice_height'];?>'
              });
            });
        <?php }?>
        </script>
        <script type="text/javascript">
            $(function()
            {
                $('.baobao-img').on('click', function()
                {
                    var src = $(this).attr('src');
                    $('.bigimg img').attr('src', src);
                    $('.bigimg').show()
                });
                $('.bigimg').on('click', function()
                {
                    $('.bigimg').hide()
                });
            })
        </script>
	</body>
</html>