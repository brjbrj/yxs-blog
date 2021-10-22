<?php
echo '
	<head>
		<script src="../asset/js/jquery.js" type="text/javascript"></script>
		<script type="text/javascript" src="../asset/layer/layer.js"></script>
		<script type="text/javascript" src="../asset/layui/layui.js"></script>
		<link rel="stylesheet" type="text/css" href="../asset/layui/css/layui.css">
		<script type="text/javascript" src="../asset/select/xm-select.js"></script>
		<style>
			/* 以下实际使用若已初始化可删除 .nav height父级需逐级设置为100%*/
			body{margin:0;padding:0;height:100%;width:100%;background-color:'.$colors["27"].';}
			ul{margin:0;padding:0;}
			li{list-style:none} 
			a{text-decoration:none;}
			.user-baobao-pannel
			{
				padding-top:50px;
				height:calc(100% - 50px);
				text-align:center;
				background:'.$colors["27"].';
			}
			.user-baobao-pannel .user-baobao-pannel-body
			{
				overflow-y:auto;
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
				background:'.$colors["48"].';
			}
			.user-baobao-pannel .user-baobao-pannel-body::-webkit-scrollbar-track
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			.user-baobao-form-span
    		{
    			text-align:center;
    			height:40px;
    			line-height:40px;
    			width:35%;
    			background:'.$colors["29"].';
    			user-select:none;
    			float:left;
    			color:'.$colors["31"].';
    			overflow:hidden;
    			font-weight:bold;
    			border-radius:5px 5px 5px 5px;
    		}
			.user-baobao-title
    		{
    			width:100%;
    			margin-top:40px;
    			background:'.$colors["28"].';
    			height:40px;
    			line-height:40px;
    			border:none;
    			user-select: none;
    			color:'.$colors["30"].';
    		}
    		.user-baobao-button
    		{
    			height:40px;
    			width:100%;
    			border:none;
    			outline:none;
    			background:'.$colors["38"].';
    			border-radius:3px 3px 3px 3px;
    			color:'.$colors["39"].';
    			font-weight:bold;
    			font-size:15px;
    		}
    		.user-baobao-button:hover
    		{
    			background:'.$colors["40"].';
    			cursor:pointer;
    			color:'.$colors["31"].';
    			transition:all .5s;
    		}
    		.user-baobao-textarea
    		{
    			width:100%;
    			height:100px;
    			resize:vertical;
    			outline:none;
    			border:none;
    			min-height: 80px;
    			max-height: 200px;
    			padding-left:20px;
    			padding-right:20px;
    			font-size:13px;
    			margin-bottom: 10px;
    			margin-top: 5px;
    			background-color:'.$colors["42"].';
    			color:'.$colors["44"].';
    		}
    		.user-baobao-textarea:hover
    		{
    			border:2px solid '.$colors["47"].';
    			background-color:'.$colors["43"].';
    			color:'.$colors["45"].';
    			transition: all .5s;
    		}
    		.user-baobao-textarea:focus
    		{
    			border:2px solid '.$colors["47"].';
    			background-color:'.$colors["43"].';
    			color:'.$colors["45"].';
    		}
    		.user-baobao-input
    		{
    			height:40px;
    			width:100%;
    			border-color:'.$colors["46"].';
    			outline:none;
    			border-style:solid;
    			border-width:1px;
    			border-radius:5px 5px 5px 5px;
    			font-size:15px;
    			text-indent:20px;
    			background-color:'.$colors["42"].';
    			color:'.$colors["44"].';
    		}
    		.user-baobao-input:focus
    		{
    			border-color:'.$colors["47"].';
    			background-color:'.$colors["43"].';
    			color:'.$colors["45"].';
    			border-style:solid;
    			border-width:3px;
    		}
    		.user-baobao-input:hover
    		{
    			border-color:'.$colors["47"].';
    			background-color:'.$colors["43"].';
    			color:'.$colors["45"].';
    			border-width:3px;
    			transition: all .5s;
    		}
    		.layui-input,.layui-textarea
    		{
    		    color:'.$colors["44"].';
    		    background-color:'.$colors["42"].';
    		    border-color:'.$colors["46"].';
    		}
    		.layui-input:focus,.layui-textarea:focus{background-color:'.$colors["18"].';border-width:3px;color:'.$colors["45"].';border-color:'.$colors["47"].'!important}
    		.layui-input:hover,.layui-textarea:hover{background-color:'.$colors["18"].';border-width:3px;color:'.$colors["45"].';border-color:'.$colors["47"].'!important}
    		xm-select
    		{
    		    width:100%;
    		    height:100%;
    		    border-radius:5px 5px 5px 5px;
    		    box-sizing:border-box;
    		    transition: all .5s;
    		    color:'.$colors["44"].';
    		    background-color:'.$colors["42"].';
    		    border-color:'.$colors["46"].';
    		}
    		xm-select:hover
    		{
    		    border-width:3px;
    		    background-color:'.$colors["43"].';
    		    color:'.$colors["45"].';
    		    border-color:border-color:'.$colors["47"].'!important
    		}
    		xm-select:focus
    		{
    		    border-width:3px;
    		    background-color:'.$colors["43"].';
    		    color:'.$colors["45"].';
    		    border-color:border-color:'.$colors["47"].'!important
    		}
    		.layui-tab-card > .layui-tab-title li::-webkit-scrollbar
    		{
    			height:2px;
    		}
    		.layui-tab-card > .layui-tab-title li::-webkit-scrollbar-thumb
    		{
    			border-radius: 1px;
    			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    			background:'.$colors["49"].';
    		}
    		.layui-tab-card > .layui-tab-title li::-webkit-scrollbar-track
    		{
    			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    			border-radius: 0;
    			background: rgba(0,0,0,0.1);
    		}
    		xm-select > .xm-label .scroll .label-content
    		{
    		    padding:0px 10px;
    		}
    		.scroll::-webkit-scrollbar
    		{
    			height:3px;
    		}
    		.scroll::-webkit-scrollbar-thumb
    		{
    			border-radius: 1px;
    			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    			background:'.$colors["49"].';
    		}
    		.scroll::-webkit-scrollbar-track
    		{
    			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    			border-radius: 0;
    			background: rgba(0,0,0,0.1);
    		}
    		.user-baobao-textarea::-webkit-scrollbar
    		{
    			width:7px;
    		}
    		.user-baobao-textarea::-webkit-scrollbar-thumb
    		{
    			border-radius: 1px;
    			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    			background:'.$colors["49"].';
    		}
    		.user-baobao-textarea::-webkit-scrollbar-track
    		{
    			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
    			border-radius: 0;
    			background: rgba(0,0,0,0.1);
    		}
			.user-baobao-nav-top
			{
			    overflow-y:hidden;
			    overflow-x:auto;
			}
			.user-baobao-nav-top::-webkit-scrollbar
			{
				display:none; 
			}
			.user-baobao-nav-head
			{
				position:fixed;
				text-indent:20px;
				text-align:left;
				line-height:50px;
				background:'.$colors["26"].';
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
				background:'.$colors["26"].';
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
				background:'.$colors["33"].';
				color:'.$colors["36"].';
			}
			#baobao-this>a
			{
				color:'.$colors["36"].';
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
				background:'.$colors['48'].';
			}
			.user-baobao-nav::-webkit-scrollbar-track
			{
				-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
				border-radius: 0;
				background: rgba(0,0,0,0.1);
			}
			.user-baobao-nav .user-baobao-line
			{
				margin-left:0;
				border-bottom:1px solid'.$colors["37"].';
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
				color:'.$colors["35"].';
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
				background:'.$colors["34"].';
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
			.user-baobao-nav-show,.user-baobao-nav-item>a:focus
			{
				color:'.$colors["36"].';
				background:'.$colors["33"].';
			}
			.user-baobao-nav-show,.user-baobao-nav-item>a:hover
			{
				color:'.$colors["36"].';
				background:'.$colors["32"].';
			}
			.user-baobao-nav-show>a:before,.user-baobao-nav-item>a:hover:before
			{
				opacity:1;
			}
			.user-baobao-nav-item li:hover a
			{
				color:'.$colors["36"].';
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
						<span class="user-baobao-span" style="color:'.$colors['50'].';">影小薯博客系统用户后台</span>
				</div>
			</a>
		</nav>
		<div class="user-baobao-nav">
			<div class="user-baobao-nav-top" >
	            <div class="user-baobao-line">
					<div style="display:inline-block; *display:inline; zoom:1;">
						<div id="user-baobao-mini" style="float:left;">
							<span  class="iconfont icon-leftalignment" style="color:'.$colors['50'].';line-height:50px;font-weight:bold;"></span>
						</div>
						<div style="float:left;" class="user-baobao-hide">
							<a href="./" style="color:'.$colors['50'].';line-height:50px;font-weight:bold;cursor:pointer;padding-left:10px;max-width:150px;">影小薯博客系统用户后台</a>
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