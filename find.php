<?php
	session_start();
	if(!isset($_SESSION['islogin']))$_SESSION['islogin']=0;
	if($_SESSION['islogin']==1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您已登录！');window.location.href='./user/index.php';</script>");
	}
	include "./include/common.php";
	if($conf['yzm_find']==0)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('管理员未开启找回密码！');window.location.href='login.php';</script>");
	}
	if(isset($_GET['do']))
	{
		$do=$_GET['do'];
	}
	else
	{
		$do=0;
	}
	if(!isset($_SESSION['finduser']))
	{
	    $finduser="";
	    $do=0;
	}
	else
	{
	    $finduser=$_SESSION['finduser'];
	}
?>
<html>
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./asset/css/iconfont.css">
		<style>
		    html,body
		    {
		        margin:0;
		        padding:0;
		        overflow-x:hidden ;
		    }
		    .baobao-body
            {
            	margin:0;
            	text-align:center;
            }
            
            .baobao-centerdiv
            {
            	display: flex;
            	justify-content: center;
            	align-items: center;
            }
            .baobao-x-center
            {
            	position: absolute;
            	margin-top:50px;
            	left: 50%;
            	transform: translate(-50%,0);
            }
            .baobao-yzm
            {
            	margin:0;
            	cursor:pointer;
            }
            
            .baobao-span
            {
            	border:none;
            	font-weight:bold;
            	color:<?php echo $colors['88'];?>;
            	outline:none;
            }
            
            a
            {
            	text-decoration:none;
            }
            
            .baobao-contain
            {
            	height:auto;
            	line-height:50px;
            	text-align:center;
            }
            
            .baobao-font-title
            {
            	font-weight:bold;
            	font-size:15px;
            	color:#E9E2E4;
            }
            
            .baobao-form
            {
            	width:100%;
            	margin:0;
            	text-align:center;
            }
            .baobao-input
            {
            	text-align:left;
            	text-indent:20px;
            	font-size:15px;
            	height:50px;
            	width:65%;
            	border-color:<?php echo $colors['84'];?>;
            	color:<?php echo $colors['81'];?>;
            	background-color:<?php echo $colors['80'];?>;
            	outline:none;
            	border-style:solid;
            	border-width:1px;
            }
            .baobao-input:focus
            {
            	border-color:<?php echo $colors['85'];?>;
            	color:<?php echo $colors['83'];?>;
            	background-color:<?php echo $colors['82'];?>;
            	border-style:solid;
            	border-width:3px;
            }
            .baobao-input:hover
            {
            	border-color:<?php echo $colors['85'];?>;
            	color:<?php echo $colors['83'];?>;
            	background-color:<?php echo $colors['82'];?>;
            	border-width:3px;
            	transition: all .5s;
            }
            
            .baobao-inline
            {
            	width:100%;
            	text-align:center;
            }	
            .baobao-inline.baobao-inline-item
            {
            	float:left;
            	margin:0;
            }
            .baobao-lable
            {
            	height:50px;
            	width:35%;
            	background-color:<?php echo $colors['78'];?>;
            	line-height:50px;
            	font-size:100%;
            	color:<?php echo $colors['79'];?>;
            	font-weight:bold;
            }
            hr
            {
            	margin:0;
            	border-width:1px;
            	border-style:solid;
            	border-color:<?php echo $colors['90'];?>;
            	background-color:<?php echo $colors['90'];?>;
            }
            @media screen and (min-width: 992px)
            {
            	.baobao-width-406080
            	{
            		width:40%;
            	}
            }
            @media screen and (min-width: 768px)
            {
            	.baobao-width-406080
            	{
            		width:40%;
            	}
            }
            @media screen and (max-width: 768px)
            {
            	.baobao-width-406080
            	{
            		width:80%;
            	}
            }
            
            .baobao-run-center
            {
            	animation:run 1s ease forwards;
            }
            @keyframes run
            {
            	0%{
            		transform:translateX(-100%);
            	}
            	50%{
            		transform:translateX(10px);
            	}
            	100%{
            		transform:translateX(0px); /*状态的样式不会继承。所以必须加上x轴的坐标值。*/
            	}
            }
            
            .baobao-show
            {
            	animation: showtip 3s 1;
            	animation-fill-mode: forwards;
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
            @-webkit-keyframes showtip
            {
            	from {
            		opacity: 0;
            	}
            	to {
            		opacity: 1;
            	}
            }
	    </style>
	    <meta name="viewport" content="width=device-width, initial-scale=1，user-scalable=0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<script type="text/javascript" src="./asset/js/jquery.js"></script>
		<script src="./asset/jquery/jquery.cookie.js" ></script>
		<script type="text/javascript" src="./asset/layer/layer.js"></script>
		<script type="text/javascript">
    		$(document).ready(function()
    		{
    			$("#submit_1").click(function()
    			{
    				var send=1;
    				if(document.getElementById("username").value=="")
    				{
    					layer.msg('请填写账号', {icon: 2,time:1000,shade:0.4});
    					send=0;
    					document.getElementById("wrong_1").style.visibility="visible";
    				};
    				if(send==1)
    				{
    				    var index = layer.load(1, {
                            shade: [0.1,'#fff'] //0.1透明度的白色背景
                        });
    					var username=document.getElementById("username").value;
    					var act="find";
    					var method="1";
    					$.ajax({  
    						type: "POST",   //提交的方法
    						url:"./ajax.php", //提交的地址  
    						data:
    						{
    							'username':username,
    							'method':method,
    							'act':act,
    						},// 序列化表单值  
    						dataType : 'json',
    						success:function(data) 
    						{
    						    layer.closeAll('loading');
    							if(data==1)
    							{
    								layer.msg('查询成功', {icon: 1,time:2000,shade:0.4});
    								setTimeout(function(){//两秒后跳转
    									 location.href = "./find.php?do=1";//PC网页式跳转
    								 },1500);
    							}
    							else if(data==0)
    							{
    								layer.msg('查询失败，无该账号', {icon: 2,time:1000,shade:0.4});
    								document.getElementById("wrong_1").style.visibility="visible";
    							}
    						}
    					});
    				}
    			});
    			$("#username").click(function()
    			{
    				document.getElementById("wrong_1").style.visibility="hidden";
    			});
    		});
		</script>
		<script>
			$(function(){
				/*仿刷新：检测是否存在cookie*/
				if($.cookie("captcha_find")){
					var count = $.cookie("captcha_find");
					document.getElementById("sendcode").setAttribute("disabled","true" );
					document.getElementById("sendcode").value=count + "秒后重获";
					var resend = setInterval(function(){
						count--;
						if (count > 0){
							document.getElementById("sendcode").setAttribute("disabled","true" );//设置按钮为禁用状态
							document.getElementById("sendcode").value=count + "秒后重获";
							$.cookie("captcha_find", count, {path: '/', expires: (1/86400)*count});
						}else {
							clearInterval(resend);
							document.getElementById("sendcode").removeAttribute("disabled");//移除禁用状态改为可用
							document.getElementById("sendcode").value="重获验证码";
						}
					}, 1000);
				}
				/*点击改变按钮状态，已经简略掉ajax发送短信验证的代码*/
				$('#sendcode').click(function(){
					var count = 60;
					var email="<?php echo $finduser;?>";
					$.cookie("email_find", email, {path: '/', expires: (1/86400)*count});
					if(1){
						var resend = setInterval(function(){
							count--;
							if (count > 0){
								document.getElementById("sendcode").value=count + "秒后重获";
								$.cookie("captcha_find", count, {path: '/', expires: (1/86400)*count});
							}else {
								clearInterval(resend);
								document.getElementById("sendcode").removeAttribute("disabled");//移除禁用状态改为可用
								document.getElementById("sendcode").value="重获验证码";
							}
						}, 1000);
						document.getElementById("sendcode").setAttribute("disabled","true" );
						var act="sendcode";
						var method="find";
						$.ajax({  
							type: "POST",   //提交的方法
							url:"./ajax.php", //提交的地址  
							data:
							{
							    'email':email,
							    'act':act,
							    'method':method,
							},// 序列化表单值  
							dataType : 'json',
							success:function(data) 
							{
								if(data==1){
									layer.msg("发送成功");
								}
								else
								{
									layer.msg("发送失败");
								}
							}
						});
					}
				});
			});
		</script>
		<script>
		    $(document).ready(function()
    		{
    			$("#submit_2").click(function()
    			{
    				var send=1;
    				if(document.getElementById("yzm").value=="")
    				{
    					layer.msg('请填写验证码', {icon: 2,time:1000,shade:0.4});
    					send=0;
    					document.getElementById("wrong_2").style.visibility="visible";
    				};
    				if(send==1)
    				{
    				    var index = layer.load(1, {
                            shade: [0.1,'#fff'] //0.1透明度的白色背景
                        });
    					var yzm=document.getElementById("yzm").value;
    					var act="find";
    					var method="2";
    					$.ajax({  
    						type: "POST",   //提交的方法
    						url:"./ajax.php", //提交的地址  
    						data:
    						{
    							'yzm':yzm,
    							'method':method,
    							'act':act,
    						},// 序列化表单值  
    						dataType : 'json',
    						success:function(data) 
    						{
    						    layer.closeAll('loading');
    							if(data==1)
    							{
    								layer.msg('验证成功', {icon: 1,time:2000,shade:0.4});
    								setTimeout(function(){//两秒后跳转
    									 location.href = "./find.php?do=2";//PC网页式跳转
    								 },1500);
    							}
    							else if(data==0)
    							{
    								layer.msg('验证失败', {icon: 2,time:1000,shade:0.4});
    								document.getElementById("wrong_2").style.visibility="visible";
    							}
    						}
    					});
    				}
    			});
    			$("#yzm").click(function()
    			{
    				document.getElementById("wrong_2").style.visibility="hidden";
    			});
    		});
		</script>
		<script type="text/javascript">
    		$(document).ready(function()
    		{
    			$("#submit_3").click(function()
    			{
    				var send=1;
    				if(document.getElementById("password").value=="")
    				{
    					layer.msg('请填写新密码', {icon: 2,time:1000,shade:0.4});
    					send=0;
    					document.getElementById("wrong_3").style.visibility="visible";
    				};
    				if(send==1)
    				{
    				    var index = layer.load(1, {
                            shade: [0.1,'#fff'] //0.1透明度的白色背景
                        });
    					var password=document.getElementById("password").value;
    					var act="find";
    					var method="3";
    					$.ajax({  
    						type: "POST",   //提交的方法
    						url:"./ajax.php", //提交的地址  
    						data:
    						{
    							'password':password,
    							'method':method,
    							'act':act,
    						},// 序列化表单值  
    						dataType : 'json',
    						success:function(data) 
    						{
    						    layer.closeAll('loading');
    							if(data==1)
    							{
    							    layer.msg('密码匹配', {icon: 1,time:1000,shade:0.4});
    								setTimeout(function(){//两秒后跳转
    									 location.href = "./find.php?do=3";//PC网页式跳转
    								 },1500);
    							}
    							else if(data==0)
    							{
    								layer.msg('保存失败,密码格式有误', {icon: 2,time:1000,shade:0.4});
    								document.getElementById("wrong_3").style.visibility="visible";
    							}
    						}
    					});
    				}
    			});
    			$("#password").click(function()
    			{
    			    layer.msg('密码为1-18位含有字母大小写和数字', {time:1000});
    				document.getElementById("wrong_3").style.visibility="hidden";
    			});
    		});
		</script>
		<script type="text/javascript">
    		$(document).ready(function()
    		{
    			$("#submit_4").click(function()
    			{
				    layer.msg('正在跳转', {icon: 1,time:2000,shade:0.4});
					setTimeout(function(){//两秒后跳转
						 location.href = "./login.php";//PC网页式跳转
					 },1500);
    			});
    		});
		</script>
		<script type="text/javascript" src="./asset/js/click.js"></script>
    </head>
    <body style="background-color:<?php echo $colors['77'];?>;">
        <script pointColor="<?php echo colortype($colors['94']);?>" color="<?php echo colortype($colors['93']);?>" opacity='1' zIndex="-1" count="100"  src="./asset/js/dist_canvas-nest.js"></script>
        <?php 
            include"head.php";
            include_once "./asset/css/function_css.php";
        ?>
        <div class="baobao-body baobao-run-center">
			<div class="baobao-show">
				<div class="baobao-width-406080 baobao-x-center" style="float: none;padding-top:10px;">
					<div class="baobao-contain baobao-font-title" style="diaplay:inline-block;height:50px;<?php echo background_image_2(90,$colors['87'],$colors['86'],$colors['87']);?>border-radius:10px 10px 0% 0%;">
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
									<span class="baobao-span iconfont icon-search"></span>
							</div>
							<div style="float:left;">
									<span class="baobao-span">影小薯博客系统找回密码</span>
									<input style="display:none;" id="pwd" value="2" />
							</div>
						</div>
					</div>
					<hr>
					<?php if($do==0){?>
					<form name="login" action="##" method="post" class="baobao-form">
						<div class="baobao-inline" style="float:none;">
						    <div style="height:20px;width:100%;background-color:#D1F2FA;z-index:1;">
						        <div style="height:20px;width:30%;background-color:#0E78BE;text-align:center;color:#fff;font-weight:bold;font-size:10px;line-height:20px;z-index:2;user-select:none;border-radius:0% 10px 10px 0%;">
						            30%
						        </div>
						    </div>
							<div class=" baobao-lable" style="text-align:center;float:left;line-height:50px;">
								<div style="display:inline-block; *display:inline; zoom:1;">
									<div style="float:left;">
										<span class=" iconfont icon-account"></span>
									</div>
									<div style="float:left;">
										<span for="name" >账号:</span>
									</div>
								</div>
							</div>
							<input type="text" style="float:left;"  class="baobao-input" id="username" name="username" >
							<span  for="name" id="wrong_1" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
						</div>
						<hr>
						<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
							<div style="float:left;width:100%;"><input type="button" id="submit_1" name="submit_1"  style="height:100%;font-weight:bold;font-size:18px;color:<?php echo $colors['89'];?>;<?php echo background_image_2(90,$colors['92'],$colors['91'],$colors['92']);?>border:none;width:100%;cursor:pointer;" value="确认"></div>
						</div>
					</form>
					<?php }else if($do==1){?>
					<form name="login" action="##" method="post" class="baobao-form">
						<div class="baobao-inline" style="float:none;">
						    <div style="height:20px;width:100%;background-color:#D1F2FA;z-index:1;">
						        <div style="height:20px;width:50%;background-color:#0E78BE;text-align:center;color:#fff;font-weight:bold;font-size:10px;line-height:20px;z-index:2;user-select:none;border-radius:0% 10px 10px 0%;">
						            50%
						        </div>
						    </div>
						    <div class="baobao-inline" style="float:none;height:50px;"> 
    							<div class=" baobao-lable" style="text-align:center;float:left;line-height:50px;">
    								<div style="display:inline-block; *display:inline; zoom:1;">
    									<div style="float:left;">
    										<span class=" iconfont icon-collection"></span>
    									</div>
    									<div style="float:left;">
    										<span for="name" >验证码:</span>
    									</div>
    								</div>
    							</div>
    							<input style="float:left;"  type="text" class="baobao-input" id="yzm" name="yzm" >
    							<span  for="name" id="wrong_2" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
    						</div>
    						<hr>
							<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
    							<font style="color:#fff;line-height:50px;font-weight:bold;" >点击获取验证码</font>
    							<input id="sendcode" style="width: 120px;height: 50px;float:right;background-color: white;border: 1px solid #E2E2E2;" name="sendcode" type="button" value="获取邮箱验证码"/>
    						</div>
						</div>
						<hr>
						<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
							<div style="float:left;width:100%;"><input type="button" id="submit_2" name="submit_2"  style="height:100%;font-weight:bold;font-size:18px;color:<?php echo $colors['89'];?>;<?php echo background_image_2(90,$colors['92'],$colors['91'],$colors['92']);?>border:none;width:100%;cursor:pointer;" value="确认"></div>
						</div>
					</form>
					<?php }else if($do==2){?>
					<form name="login" action="##" method="post" class="baobao-form">
						<div class="baobao-inline" style="float:none;">
						    <div style="height:20px;width:100%;background-color:#D1F2FA;z-index:1;">
						        <div style="height:20px;width:80%;background-color:#0E78BE;text-align:center;color:#fff;font-weight:bold;font-size:10px;line-height:20px;z-index:2;user-select:none;border-radius:0% 10px 10px 0%;">
						            80%
						        </div>
						    </div>
							<div class=" baobao-lable" style="text-align:center;float:left;line-height:50px;">
								<div style="display:inline-block; *display:inline; zoom:1;">
									<div style="float:left;">
										<span class=" iconfont icon-password"></span>
									</div>
									<div style="float:left;">
										<span for="name" >新密码:</span>
									</div>
								</div>
							</div>
							<input type="password" style="float:left;" onkeypress ="testCapsLock(event)" class="baobao-input" id="password" name="password" >
							<span  for="name" id="wrong_3" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
						</div>
						<hr>
						<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
							<div style="float:left;width:100%;"><input type="button" id="submit_3" name="submit_3"  style="height:100%;font-weight:bold;font-size:18px;color:<?php echo $colors['89'];?>;<?php echo background_image_2(90,$colors['92'],$colors['91'],$colors['92']);?>border:none;width:100%;cursor:pointer;" value="下一步"></div>
						</div>
					</form>
					<?php }else if($d0==3){?>
					<form name="login" action="##" method="post" class="baobao-form">
						<div class="baobao-inline" style="float:none;">
						    <div style="height:20px;width:100%;background-color:#D1F2FA;z-index:1;">
						        <div style="height:20px;width:90%;background-color:#0E78BE;text-align:center;color:#fff;font-weight:bold;font-size:10px;line-height:20px;z-index:2;user-select:none;border-radius:0% 10px 10px 0%;">
						            90%
						        </div>
						    </div>
							<div class=" baobao-lable" style="text-align:center;float:left;line-height:50px;">
								<div style="display:inline-block; *display:inline; zoom:1;">
									<div style="float:left;">
										<span for="name" >确认密码:</span>
									</div>
								</div>
							</div>
							<input type="password" style="float:left;" onkeypress ="testCapsLock(event)" class="baobao-input" id="passwordcheck" name="passwordcheck" >
							<span  for="name" id="wrong_4" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
						</div>
						<hr>
						<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
							<div style="float:left;width:100%;"><input type="button" id="submit_4" name="submit_4"  style="height:100%;font-weight:bold;font-size:18px;color:<?php echo $colors['89'];?>;<?php echo background_image_2(90,$colors['92'],$colors['91'],$colors['92']);?>border:none;width:100%;cursor:pointer;" value="确定"></div>
						</div>
					</form>
					<?php }else if($do==4){?>
					    <form name="login" action="##" method="post" class="baobao-form">
						<div class="baobao-inline" style="float:none;">
						    <div style="height:20px;width:100%;background-color:#D1F2FA;z-index:1;">
						        <div style="height:20px;width:100%;background-color:#0E78BE;text-align:center;color:#fff;font-weight:bold;font-size:10px;line-height:20px;z-index:2;user-select:none;">
						            100%
						        </div>
						    </div>
						</div>
						<hr>
						<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
							<div style="float:left;width:100%;"><input type="button" id="submit_4" name="submit_4"  style="height:100%;font-weight:bold;font-size:18px;color:<?php echo $colors['89'];?>;<?php echo background_image_2(90,$colors['92'],$colors['91'],$colors['92']);?>border:none;width:100%;cursor:pointer;" value=">>完成<<"></div>
						</div>
					</form>
					<?php }?>
					<hr>
					<div class="baobao-contain baobao-font-title" style="float:none;<?php echo background_image_2(90,$colors['87'],$colors['86'],$colors['87']);?>border-radius:0% 0% 10px 10px;font-size:10px;">
						<a href="./login.php"><span style="color:#fff;"><?php if($do==4){echo "想起来也没用了";}else{echo "想起密码,前往登录";}?></span></a><a href="./reg.php"><span style="color:#fff;margin-left:30px;">注册新账号</span></a>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>