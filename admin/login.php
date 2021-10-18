<?php
	session_start();
	if(!isset($_SESSION['adminlogin']))$_SESSION['adminlogin']=0;
	if($_SESSION['adminlogin']==1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您已登录！');window.location.href='index.php';</script>");
	}
	include_once "../asset/css/function_css.php";
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1，user-scalable=0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="../asset/css/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="./css/baobao_login.css" />
		<link rel="stylesheet" type="text/css" href="./css/baobao_head.css" />
		<script type="text/javascript" src="../asset/js/jquery.js"></script>
		<script type="text/javascript" src="../asset/layer/layer.js"></script>
		<script type="text/javascript">
		$(document).ready(function()
		{
			$("#submit").click(function()
			{
				var send=1;
				if(document.getElementById("username").value=="")
				{
					layer.msg('请填写账号', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_1").style.visibility="visible";
				};
				if(document.getElementById("password").value=="" && send==1)
				{
					layer.msg('请填写密码', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_2").style.visibility="visible";
				}
				if(document.getElementById("yzm").value==""  && send==1)
				{
					layer.msg('请填写验证码', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_3").style.visibility="visible";
				}
				if(send==1)
				{
				    var index = layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
					var username=document.getElementById("username").value;
					var password=document.getElementById("password").value;
					var yzm=document.getElementById("yzm").value;
					var act="login";
					$.ajax({  
						type: "POST",   //提交的方法
						url:"./ajax.php", //提交的地址  
						data:
						{
							'username':username,
							'password':password,
							'yzm':yzm,
							'act':act,
						},// 序列化表单值  
						dataType : 'json',
						success:function(data) 
						{
						    layer.closeAll('loading');
							if(data==1)
							{
								layer.msg('登陆成功', {icon: 1,time:2000,shade:0.4});
								setTimeout(function(){//两秒后跳转
									 location.href = "index.php";//PC网页式跳转
								 },2000);
							}
							else if(data==0)
							{
								layer.msg('登陆失败，密码或账号错误', {icon: 2,time:1000,shade:0.4});
								$('#codeimg').click();
								document.getElementById("yzm").value="";
							}
							else
							{
								layer.msg('登陆失败，验证码错误', {icon: 2,time:1000,shade:0.4});
								$('#codeimg').click();
								document.getElementById("wrong_3").style.visibility="visible";
								document.getElementById("yzm").value="";
							}
						}
					});
				}
			});
			$("#username").click(function()
			{
				document.getElementById("wrong_1").style.visibility="hidden";
			});
			$("#password").click(function()
			{
				document.getElementById("wrong_2").style.visibility="hidden";
				if(document.getElementById("username").value=="")
				{
					document.getElementById("wrong_1").style.visibility="visible";
				};
			});
			$("#yzm").click(function()
			{
				document.getElementById("wrong_3").style.visibility="hidden";
				if(document.getElementById("username").value=="")
				{
					document.getElementById("wrong_1").style.visibility="visible";
				};
				if(document.getElementById("password").value=="")
				{
					document.getElementById("wrong_2").style.visibility="visible";
				}
			});
		});
		</script>
	</head>
	<title>后台登录</title>
	<body class="baobao-body" style="background-color:#908084;overflow:hidden;">
	    <script pointColor="0,0,0" color="255,255,255" opacity='1' zIndex="-1" count="100"  src="../asset/js/dist_canvas-nest.js"></script>
		<?php require_once('./head.php')?>
		<div class="baobao-body baobao-run-center">
			<div class="baobao-show">
				<div class="baobao-width-406080 baobao-x-center" style="float: none;padding-top:30px;">
					<div class="baobao-contain baobao-font-title" style="diaplay:inline-block;height:50px;<?php echo background_image_2(90,'#4D3B3F','#A78C91','#4D3B3F');?>border-radius:10px 10px 0% 0%;">
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
									<span class="baobao-span iconfont icon-guanliyuan"></span>
							</div>
							<div style="float:left;">
									<span class="baobao-span" style="user-select:none;">影小薯博客系统后台</span>
							</div>
						</div>
					</div>
					<hr>
					<form name="login" action="##" method="post" class="baobao-form">
						<div class="baobao-inline" style="float:none;">
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
						<div class="baobao-inline" style="float:none;">
							<div class=" baobao-lable" style="text-align:center;float:left;line-height:50px;">
								<div style="display:inline-block; *display:inline; zoom:1;">
									<div style="float:left;">
										<span class=" iconfont icon-password"></span>
									</div>
									<div style="float:left;">
										<span for="name" >密码:</span>
									</div>
								</div>
							</div>
							<input style="float:left;"  type="password" class="baobao-input" id="password" name="password" >
							<span  for="name" id="wrong_2" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
						</div>
						<hr>
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
							<span  for="name" id="wrong_3" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
						</div>
						<hr>
						<div class="baobao-inline" style="height:50px;background-color:#614A4F;">
							<font style="color:#fff;line-height:50px;font-weight:bold;" >点击验证码更换</font>
							<span  for="name" style="float:right;"><img  style="margin:0px;" height="50" id="codeimg" class="baobao-yzm" src="../include/code.php?act=admin&r=<?php echo time();?>" onclick="this.src='../include/code.php?act=admin&r='+Math.random();" title="点击更换验证码"></span>
						</div>
						<hr>
						<div class="baobao-inline" style="height:50px;background-color:#614A4F;">
							<div style="float:left;width:100%;"><input type="button" id="submit" name="submit"  style="height:100%;font-weight:bold;font-size:18px;color:#fff;background:linear-gradient(to right,#614A4F,#000000,#614A4F);border:none;width:100%;cursor:pointer;" value="登录"></div>
						</div>
					</form>
					<hr>
					<div class="baobao-contain baobao-font-title" style="float:none;<?php echo background_image_2(90,'#4D3B3F','#A78C91','#4D3B3F');?>border-radius:0% 0% 10px 10px;font-size:10px;">
						如若忘记密码请前往数据库blog_admin中查看密码
					</div>
				</div>
			</div>
		</div>
	</body>
</html>