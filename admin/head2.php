<?php
	$background="#FF0000";
	$headcutline="#FFCCCC";
	$indexfontcolor="#FFCCAA";
	$thisfontcolor="#FFF";
	$thisbackcolor="#EE5F00";
	$thisleft="#FFFF00";
	$thisbackmini="#EE5F00";
	$scrollcolor="#880000";
echo '
	<head>
		<script src="../asset/js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="../asset/layer/layer.js"></script>
		<script type="text/javascript" src="../asset/layui/layui.js"></script>
		<link rel="stylesheet" type="text/css" href="../asset/layui/css/layui.css">
		<script type="text/javascript" src="../asset/select/xm-select.js"></script>
		<style>
			/* 以下实际使用若已初始化可删除 .nav height父级需逐级设置为100%*/
			body{margin:0;padding:0;height:100%;width:100%;background-color:#FFF8DD;}
			ul{margin:0;padding:0;}
			li{list-style:none} 
			a{text-decoration:none;}
			.baobao-pannel
			{
				padding-top:50px;
				height:calc(100% - 50px);
				text-align:center;
				background:#FFF8DD;
			}
			.baobao-pannel .baobao-pannel-body
			{
				overflow-y:auto;
				overflow-x:hidden;
				height:100%;
			}
			.baobao-pannel .baobao-pannel-body::-webkit-scrollbar
			{
				width:4px;   
			}
			 .baobao-pannel .baobao-pannel-body::-webkit-scrollbar-thumb
			 {
				border-radius: 2px;
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				background:'.$scrollcolor.';
			}
			.baobao-pannel .baobao-pannel-body::-webkit-scrollbar-trac
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			.baobao-nav-top
			{
			    overflow-y:hidden;
			    overflow-x:auto;
			}
			.baobao-nav-top::-webkit-scrollbar
			{
				display:none; 
			}
			.baobao-nav-head
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
			.baobao-span
			{
				border:none;
				font-weight:bold;
				color:#E6E6E6;
				outline:none;
			}
			/* nav */
			.baobao-nav/*默认*/
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
			.baobao-nav::-webkit-scrollbar
			{
				width:4px;   
			}
			.baobao-nav::-webkit-scrollbar-thumb
			{
				border-radius: 2px;
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				background:'.$scrollcolor.';
			}
			.baobao-nav::-webkit-scrollbar-trac
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			.baobao-nav .baobao-line
			{
				margin-left:0;
				border-bottom:1px solid'.$headcutline.';
				height:50px;
				text-align:center;
			}
			.baobao-nav a/*链接*/
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
			.baobao-nav a::-webkit-scrollbar
			{
			    display:none;
			}
			.baobao-nav a span/*链接中的span*/
			{
				margin-left:30px;
			}
			.baobao-nav-item
			{
				position:relative;
				user-select:none;
			}
			.baobao-nav-item.baobao-nav-show
			{
				border-bottom: none;
			}
			.baobao-nav-item ul
			{
				display: none;
				background: rgba(0,0,0,.1);
			}
			.baobao-nav-item.baobao-nav-show ul
			{
				display: block;
			}
			.baobao-nav-item>a:before
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
			
			.baobao-nav .baobao-nav-icon
			{
				font-size: 20px;
				position: absolute;
				margin-left:-1px;
			}
			.baobao-nav-more
			{
				float:right;
				margin-right:20px;
				font-size:12px;
				transition:transform .3s;
			}
			/* 此处为导航右侧箭头 如果自定义iconfont 也需要替换*/
			.baobao-nav-more::after
			{
				content: "\e745";
			}
			/*---------------------*/
			.baobao-nav-show .baobao-nav-more
			{
				transform:rotate(90deg);
			}
			.baobao-nav-show,.baobao-nav-item>a:hover
			{
				color:'.$thisfontcolor.';
				background:'.$thisbackcolor.';
			}
			.baobao-nav-show>a:before,.baobao-nav-item>a:hover:before
			{
				opacity:1;
			}
			.baobao-nav-item li:hover a
			{
				color: #FFF;
				background: rgba(0, 0, 0,.1);
			}
			
			/* nav-mini */
			.baobao-nav-mini.baobao-nav
			{
				width: 60px;
				height:auto;
				overflow-y:hidden;
				transition: all .3s;
				z-index:10000;
			}
			.baobao-nav-mini.baobao-nav .baobao-line
			{
				margin-left:0;
				border:none;
				height:50px;
				text-align:center;
				transition: all .3s;
			}
			.baobao-nav-mini ul
			{
				display:none;
				transition: all .3s;
			}
			
			/*动画*/
			.baobao-show
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
			.baobao-run/*菜单跑出右移动画*/
			{
				animation:run 0.5s ease forwards;
			}
			.baobao-back/*菜单收回左移动画*/
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
		        $("#logout").on("click",function(){
		            layer.confirm("确定退出登录？", {
                        btn: ["确定","点错了"]}, function(){
                            location.href="./logout.php";
                    }, function(){});
		        });
		    });
		</script>
		<script>
			$(function(){
				// baobao-nav收缩展开
				$(".baobao-nav-item>a").on("click",function(){
					if (!$(".baobao-nav").hasClass("baobao-nav-mini")) {
						if ($(this).next().css("display") == "none") {
							//展开未展开
							$(".baobao-nav-item").children("ul").slideUp(300);
							$(this).next("ul").slideDown(300);
							$(this).parent("li").addClass("baobao-nav-show").siblings("li").removeClass("baobao-nav-show");
						}else{
							//收缩已展开
							$(this).next("ul").slideUp(300);
							$(".baobao-nav-item.baobao-nav-show").removeClass("baobao-nav-show");
						}
					}
				});
				//baobao-nav-mini切换
				$("#baobao-mini").on("click",function(){
					if (!$(".baobao-nav").hasClass("baobao-nav-mini")) {
						$(".baobao-nav-item.baobao-nav-show").removeClass("baobao-nav-show");
						$(".baobao-nav-item").children("ul").removeAttr("style");
						$(".baobao-nav").addClass("baobao-nav-mini");
						$(".baobao-pannel").removeClass("baobao-run");
						$(".baobao-pannel").addClass("baobao-back");
						$(".baobao-hide").hide();
						$("#baobao-shadow").removeClass("shadow");
					}else{
						$(".baobao-nav").removeClass("baobao-nav-mini");
						$(".baobao-hide").show();
						$(".baobao-hide").addClass("baobao-show");
						$(".baobao-pannel").removeClass("baobao-back");	
						$(".baobao-pannel").addClass("baobao-run");	
						$("#baobao-shadow").addClass("shadow");
					}
				});
			});
		</script>
		<link rel="stylesheet" type="text/css" href="../asset/css/iconfont.css">	
	</head>
	<body>
		<nav class="baobao-nav-head">
			<a href="./">
				<div style="float:left;text-indent:60px;white-space: nowrap;">
						<span class="baobao-span" >影小薯博客系统后台</span>
				</div>
			</a>
		</nav>
		<div class="baobao-nav">
			<div class="baobao-nav-top" >
	            <div class="baobao-line">
					<div style="display:inline-block; *display:inline; zoom:1;">
						<div id="baobao-mini" style="float:left;">
							<span  class="iconfont icon-leftalignment" style="line-height:50px;color:white;font-weight:bold;"></span>
						</div>
						<div style="float:left;" class="baobao-hide">
							<a href="./" style="line-height:50px;color:white;font-weight:bold;cursor:pointer;padding-left:10px;max-width:150px;user-select:none;">影小薯博客系统后台</a>
						</div>
					</div>
				</div>
	        </div>
			<ul>
				<li '.this($act,"index").' class="baobao-nav-item" style="line-height:50px;">
					<a id="a1" href="./index.php">
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-all" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="baobao-hide">
								<span style="padding:0;margin-left:10px;">后台首页</span>
							</div>
						</div>
					</a>
				</li>
				<li '.this($act,"site").' class="baobao-nav-item" style="line-height:50px;">
					<a>
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-editor" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="baobao-hide">
								<span style="padding:0;margin-left:10px;">网站信息配置</span>
							</div>
						</div>
						<div style="float:right;>
							<span style="padding:0;" class="iconfont baobao-nav-more"></span>
						</div>
					</a>
					<ul >
	                    <li><a href="./notice.php"><span>网站首页设置</span></a></li>
	                    <li><a href="./function.php"><span>首页功能限制</span></a></li>
	                    <li><a href="./set_editor.php"><span>用户编辑器配置</span></a></li>
	                </ul>
				</li>
				<li '.this($act,"email").' class="baobao-nav-item" style="line-height:50px;">
					<a>
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-email" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="baobao-hide">
								<span style="padding:0;margin-left:10px;">邮箱配置</span>
							</div>
						</div>
						<div style="float:right;>
							<span style="padding:0;" class="iconfont baobao-nav-more"></span>
						</div>
					</a>
					<ul >
	                    <li><a href="./email.php?mod=account"><span>账号配置</span></a></li>
	                    <li><a href="./email.php?mod=template"><span>发信模板</span></a></li>
	                </ul>
				</li>
				<li '.this($act,"user").' class="baobao-nav-item" style="line-height:50px;">
					<a>
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-tongxunlu" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="baobao-hide">
								<span style="padding:0;margin-left:10px;">用户管理</span>
							</div>
						</div>
						<div style="float:right;>
							<span style="padding:0;" class="iconfont baobao-nav-more"></span>
						</div>
					</a>
					<ul >
	                    <li><a href="./user.php?mod=add"><span>添加用户</span></a></li>
	                    <li><a href="./user.php?mod=list"><span>用户列表</span></a></li>
	                </ul>
				</li>
				<li '.this($act,"color").' class="baobao-nav-item" style="line-height:50px;">
					<a>
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-color" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="baobao-hide">
								<span style="padding:0;margin-left:10px;">颜色管理</span>
							</div>
						</div>
						<div style="float:right;>
							<span style="padding:0;" class="iconfont baobao-nav-more"></span>
						</div>
					</a>
					<ul >
	                    <li><a href="#"><span>用户颜色管理</span></a></li>
	                    <li><a href="#"><span>后台颜色管理</span></a></li>
	                </ul>
				</li>
				<li class="baobao-nav-item" style="line-height:50px;">
					<a id="logout">
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<i class="iconfont icon-reeor" style="font-size:25px;"></i>
							</div>
							<div style="float:left;" class="baobao-hide">
								<span style="padding:0;margin-left:10px;">退出登录</span>
							</div>
						</div>
					</a>
				</li>
			</ul>
		</div>
		<div id="baobao-shadow" class="shadow"></div>
';
?>