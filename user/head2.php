<?php
	$background="#9999ff";
	$headcutline="#660099";
	$indexfontcolor="#ECE5F7";
	$thisfontcolor="#FFF";
	$thisbackcolor="#9966ff";
	$thisleft="#66EEEE";
	$thisbackmini="#EE5F00";
	$scrollcolor="#663399";
echo '
	<head>
		<script src="../asset/js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="../asset/layer/layer.js"></script>
		<script type="text/javascript" src="../asset/layui/layui.js"></script>
		<link rel="stylesheet" type="text/css" href="../asset/layui/css/layui.css">
		<script type="text/javascript" src="../asset/select/xm-select.js"></script>
		<style>
			/* 以下实际使用若已初始化可删除 .nav height父级需逐级设置为100%*/
			body{margin:0;padding:0;height:100%;width:100%;background-color:#E3D8F3;}
			ul{margin:0;padding:0;}
			li{list-style:none} 
			a{text-decoration:none;}
			.user-baobao-pannel
			{
				padding-top:50px;
				height:calc(100% - 50px);
				text-align:center;
				background:#E3D8F3;
			}
			.user-baobao-pannel .user-baobao-pannel-body
			{
				overflow-y:scroll;
				overflow-x:hidden;
				height:100%;
			}
			.user-baobao-pannel .user-baobao-pannel-body::-webkit-scrollbar
			{
				width:4px;   
			}
			 .user-baobao-pannel .user-baobao-pannel-body::-webkit-scrollbar-thumb
			 {
				border-radius: 2px;
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				background:'.$scrollcolor.';
			}
			.user-baobao-pannel .user-baobao-pannel-body::-webkit-scrollbar-trac
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			.user-baobao-nav-head
			{
				position:fixed;
				text-indent:20px;
				text-align:left;
				line-height:50px;
				background:'.$background.';
				height:50px;
				width:100%;
				z-index:15;
			}
			.user-baobao-span
			{
				border:none;
				font-weight:bold;
				color:#E6E6E6;
				outline:none;
			}
			/* nav */
			.user-baobao-nav/*默认*/
			{
				width: 220px;
				height:100%;
				background:'.$background.';
				transition: all .3s;
				position: fixed;
				top:0;
				left:0;
				overflow-y:auto;
				float:left;
				z-index:10000;
			}
			#baobao-this
			{
				background:'.$thisbackcolor.';
				color:'.$thisfontcolor.';
			}
			#baobao-this>a
			{
				color:'.$thisfontcolor.';
			}
			#baobao-this>a:before
			{
				opacity:1;
			}
			/*滚轮条样式*/
			.user-baobao-nav::-webkit-scrollbar
			{
				width:4px;   
			}
			.user-baobao-nav::-webkit-scrollbar-thumb
			{
				border-radius: 2px;
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				background:'.$scrollcolor.';
			}
			.user-baobao-nav::-webkit-scrollbar-trac
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			.user-baobao-nav .user-baobao-line
			{
				margin-left:0;
				border-bottom:1px solid'.$headcutline.';
				height:50px;
				text-align:center;
			}
			.user-baobao-nav a/*链接*/
			{
				display:block;
				overflow-x:auto;
				overflow-y:hidden;
				padding-left:20px;
				line-height:46px;
				max-height:46px;
				color:'.$indexfontcolor.';
				transition:all .3s;
				white-space: nowrap;
			}
			.user-baobao-nav a::-webkit-scrollbar
			{
			    display:none;
			}
			.user-baobao-nav a span/*链接中的span*/
			{
				margin-left:30px;
			}
			.user-baobao-nav-item
			{
				position:relative;
				user-select:none;
			}
			.user-baobao-nav-item.user-baobao-nav-show
			{
				border-bottom: none;
			}
			.user-baobao-nav-item ul
			{
				display: none;
				background: rgba(0,0,0,.1);
			}
			.user-baobao-nav-item.user-baobao-nav-show ul
			{
				display: block;
			}
			.user-baobao-nav-item>a:before
			{
				content: "";
				position: absolute;
				left: 0px;
				width: 3px;
				height: 46px;
				background:'.$thisleft.';
				opacity:0;
				transition: all .3s;
			}
			
			.user-baobao-nav .user-baobao-nav-icon
			{
				font-size: 20px;
				position: absolute;
				margin-left:-1px;
			}
			.user-baobao-nav-more
			{
				float:right;
				margin-right:20px;
				font-size:12px;
				transition:transform .3s;
			}
			/* 此处为导航右侧箭头 如果自定义iconfont 也需要替换*/
			.user-baobao-nav-more::after
			{
				content: "\e745";
			}
			/*---------------------*/
			.user-baobao-nav-show .user-baobao-nav-more
			{
				transform:rotate(90deg);
			}
			.user-baobao-nav-show,.user-baobao-nav-item>a:hover
			{
				color:'.$thisfontcolor.';
				background:'.$thisbackcolor.';
			}
			.user-baobao-nav-show>a:before,.user-baobao-nav-item>a:hover:before
			{
				opacity:1;
			}
			.user-baobao-nav-item li:hover a
			{
				color: #FFF;
				background: rgba(0, 0, 0,.1);
			}
			
			/* nav-mini */
			.user-baobao-nav-mini.user-baobao-nav
			{
				width: 60px;
				height:auto;
				overflow-y:hidden;
				transition: all .3s;
				z-index:10000;
			}
			.user-baobao-nav-mini.user-baobao-nav .user-baobao-line
			{
				margin-left:0;
				border:none;
				height:50px;
				text-align:center;
				transition: all .3s;
			}
			.user-baobao-nav-mini ul
			{
				display:none;
				transition: all .3s;
			}
			
			/*动画*/
			.user-baobao-show
			{
				animation: showtip 1s ease forwards;
			}
			@keyframes showtip
			{
				from {
					opacity: 0;
				}
				to {
					opacity: 1;
				}
			}
			.user-baobao-run/*菜单跑出右移动画*/
			{
				animation:run 0.5s ease forwards;
			}
			.user-baobao-back/*菜单收回左移动画*/
			{
				animation:back 0.5s ease forwards;
			}
			@media screen and (min-width: 768px)
			{
				@keyframes run
				{
					0%{
						width:100%;
						margin-left:0px;
					}
					100%{
						width:calc(100% - 220px);
						margin-left:220px;
					}
				}
				@keyframes back
				{
					0%{
						width:calc(100% - 220px);
						margin-left:220px;
					}
					100%{
						width:100%;
						margin-left:0px;
					}
				}
				.shadow
				{
				    z-index:-10;
				    display:none;
				}
			}
			@media screen and (max-width: 768px)
			{
				@keyframes run
				{
					0%{
						margin-left:0px;
						background: rgba(0,0,0,0);
					}
					100%{
						margin-left:0px;
						background: rgba(0,0,0,0.5);
					}
				}
				@keyframes back
				{
					0%{
						margin-left:0px;
						background: rgba(0,0,0,0.5);
					}
						margin-left:0px;
						background: rgba(0,0,0,0);
					}
				}
				.shadow
				{
				    width:100%;
				    height:100%;
				    z-index:1200;
				    opacity:0.5;
				    position:fixed;
				    animation:run 0.5s ease forwards;
				}
			}
		</style>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script>
			$(function(){
				// user-baobao-nav收缩展开
				$(".user-baobao-nav-item>a").on("click",function(){
					if (!$(".user-baobao-nav").hasClass("user-baobao-nav-mini")) {
						if ($(this).next().css("display") == "none") {
							//展开未展开
							$(".user-baobao-nav-item").children("ul").slideUp(300);
							$(this).next("ul").slideDown(300);
							$(this).parent("li").addClass("user-baobao-nav-show").siblings("li").removeClass("user-baobao-nav-show");
						}else{
							//收缩已展开
							$(this).next("ul").slideUp(300);
							$(".user-baobao-nav-item.user-baobao-nav-show").removeClass("user-baobao-nav-show");
						}
					}
				});
				//user-baobao-nav-mini切换
				$("#user-baobao-mini").on("click",function(){
					if (!$(".user-baobao-nav").hasClass("user-baobao-nav-mini")) {
						$(".user-baobao-nav-item.user-baobao-nav-show").removeClass("user-baobao-nav-show");
						$(".user-baobao-nav-item").children("ul").removeAttr("style");
						$(".user-baobao-nav").addClass("user-baobao-nav-mini");
						$(".user-baobao-pannel").removeClass("user-baobao-run");
						$(".user-baobao-pannel").addClass("user-baobao-back");
						$(".user-baobao-hide").hide();
						$("#user-baobao-shadow").removeClass("shadow");
					}else{
						$(".user-baobao-nav").removeClass("user-baobao-nav-mini");
						$(".user-baobao-hide").show();
						$(".user-baobao-hide").addClass("user-baobao-show");
						$(".user-baobao-pannel").removeClass("user-baobao-back");	
						$(".user-baobao-pannel").addClass("user-baobao-run");	
						$("#user-baobao-shadow").addClass("shadow");
					}
				});
			});
		</script>
		<script>
		    $(function(){
		        $("#logout").on("click",function(){
		            layer.confirm("确定退出登录？", {
                        btn: ["确定","点错了"]}, function(){
                            location.href="./logout.php";
                    }, function(){});
		        });
		    });
		</script>
		<link rel="stylesheet" type="text/css" href="../asset/css/iconfont.css">	
	</head>
	<body>
		<nav class="user-baobao-nav-head">
			<a href="./">
				<div style="float:left;text-indent:60px;white-space: nowrap;">
						<span class="user-baobao-span" >影小薯博客系统用户后台</span>
				</div>
			</a>
		</nav>
		<div class="user-baobao-nav">
			<div class="user-baobao-nav-top" >
	            <div class="user-baobao-line">
					<div style="display:inline-block; *display:inline; zoom:1;">
						<div id="user-baobao-mini" style="float:left;">
							<span  class="iconfont icon-leftalignment" style="line-height:50px;color:white;font-weight:bold;"></span>
						</div>
						<div style="float:left;" class="user-baobao-hide">
							<a href="./" style="line-height:50px;color:white;font-weight:bold;cursor:pointer;padding-left:10px;max-width:150px;user-select:none;">影小薯博客系统用户后台</a>
						</div>
					</div>
				</div>
	        </div>
			<ul>
				<li '.this($act,"index").' class="user-baobao-nav-item" style="line-height:50px;">
					<a id="a1" href="./index.php">
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-all" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="user-baobao-hide">
								<span style="padding:0;margin-left:10px;">首页</span>
							</div>
						</div>
					</a>
				</li>
				<li '.this($act,"article").' class="user-baobao-nav-item" style="line-height:50px;">
					<a>
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-editor" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="user-baobao-hide">
								<span style="padding:0;margin-left:10px;">发布文章</span>
							</div>
						</div>
						<div style="float:right;>
							<span style="padding:0;" class="iconfont user-baobao-nav-more"></span>
						</div>
					</a>
					<ul >
	                    <li><a href="./edit.php"><span>开始编辑</span></a></li>
	                    <li><a href="./draft.php"><span>草稿箱</span></a></li>
	                </ul>
				</li>
				<!--注释开始
				<li '.this($act,"email").' class="user-baobao-nav-item" style="line-height:50px;">
					<a>
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-email" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="user-baobao-hide">
								<span style="padding:0;margin-left:10px;">邮箱配置</span>
							</div>
						</div>
						<div style="float:right;>
							<span style="padding:0;" class="iconfont user-baobao-nav-more"></span>
						</div>
					</a>
					<ul >
	                    <li><a href="./email.php?mod=account"><span>账号配置</span></a></li>
	                    <li><a href="./email.php?mod=template"><span>发信模板</span></a></li>
	                </ul>
				</li>
				<li '.this($act,"user").' class="user-baobao-nav-item" style="line-height:50px;">
					<a>
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-tongxunlu" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="user-baobao-hide">
								<span style="padding:0;margin-left:10px;">用户管理</span>
							</div>
						</div>
						<div style="float:right;>
							<span style="padding:0;" class="iconfont user-baobao-nav-more"></span>
						</div>
					</a>
					<ul >
	                    <li><a href="./user.php?mod=add"><span>添加用户</span></a></li>
	                    <li><a href="./user.php?mod=list"><span>用户列表</span></a></li>
	                </ul>
				</li>
				注释结束-->
				<li class="user-baobao-nav-item" style="line-height:50px;">
					<a id="logout">
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-reeor" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="user-baobao-hide">
								<span style="padding:0;margin-left:10px;">退出登录</span>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<div id="user-baobao-shadow" class="shadow"></div>
';
?>