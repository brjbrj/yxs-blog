<?php
    session_start();
    if(!isset($_SESSION['islogin']))$_SESSION['islogin']=0;
	if($_SESSION['islogin']==1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您已登录！');window.location.href='./user/index.php';</script>");
	}
	include "./include/common.php";
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
            	color:#FFFFFF;
            	outline:none;
            }
            .baobao-span:hover
            {
            	border:none;
            	font-weight:bold;
            	color:#FFFFFF;
            	cursor:pointer;
            }
            .baobao-span:focus
            {
            	border:none;
            	font-weight:bold;
            	color:#FFFFFF;
            	cursor:pointer;
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
            	border-color:#E8E8E8;
            	outline:none;
            	border-style:solid;
            	border-width:1px;
            }
            .baobao-input:focus
            {
            	border-color:#E2D9DA;
            	border-style:solid;
            	border-width:3px;
            }
            .baobao-input:hover
            {
            	border-color:#E2D9DA;
            	border-width:3px;
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
            	background-color:#1A94E6;
            	line-height:50px;
            	font-size:100%;
            	color:#fff;
            	font-weight:bold;
            }
            hr
            {
            	margin:0;
            	border-width:1px;
            	border-style:solid;
            	border-color:#29C1E8;
            	background-color:#29C1E8;
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
			$("#submit").click(function()
			{
				var send=1;
				if(document.getElementById("username").value=="")
				{
					layer.msg('请填写邮箱', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_1").style.visibility="visible";
				};
				if(document.getElementById("password").value=="" && send==1)
				{
					layer.msg('请填写密码', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_2").style.visibility="visible";
				}
				if(document.getElementById("passwordcheck").value=="" && send==1)
				{
					layer.msg('请填写密码', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_4").style.visibility="visible";
				}
				if(document.getElementById("passwordcheck").value!=document.getElementById("password").value && send==1)
				{
					layer.msg('两次输入密码不一致', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_4").style.visibility="visible";
				}
				<?php if($conf['yzm_reg']!="0"){ ?>
				if(document.getElementById("yzm").value==""  && send==1)
				{
					layer.msg('请填写验证码', {icon: 2,time:1000,shade:0.4});
					send=0;
					document.getElementById("wrong_3").style.visibility="visible";
				}
				<?php }?>
				if(send==1)
				{
				    var index = layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
					var username=document.getElementById("username").value;
					var password=document.getElementById("password").value;
					<?php if($conf['yzm_reg']!="0"){ ?>
					var yzm=document.getElementById("yzm").value;
					<?php }?>
					var act="reg";
					$.ajax({  
						type: "POST",   //提交的方法
						url:"./ajax.php", //提交的地址  
						data:
						{
							'username':username,
							'password':password,
							<?php if($conf['yzm_reg']!="0"){ ?>
							'yzm':yzm,
							<?php }?>
							'act':act,
						},// 序列化表单值  
						dataType : 'json',
						success:function(data) 
						{
						    layer.closeAll('loading');
							if(data==1)
							{
								layer.msg('注册成功', {icon: 1,time:2000,shade:0.4});
								setTimeout(function(){//两秒后跳转
									 location.href = "./login.php";//PC网页式跳转
								 },2000);
							}
							else if(data==0)
							{
								layer.msg('注册失败，密码或账号错误', {icon: 2,time:1000,shade:0.4});
								<?php if($conf['yzm_reg']!="0"){ ?>
								$('#codeimg').click();
								document.getElementById("yzm").value="";
								<?php }?>
							}
							else if(data==3)
							{
							    layer.msg('注册失败，用户名已存在', {icon: 2,time:1000,shade:0.4});
								<?php if($conf['yzm_reg']!="0"){ ?>
								$('#codeimg').click();
								document.getElementById("yzm").value="";
								<?php }?>
							}
							<?php if($conf['yzm_reg']!="0"){ ?>
							else
							{
								layer.msg('注册失败，验证码错误', {icon: 2,time:1000,shade:0.4});
								$('#codeimg').click();
								document.getElementById("wrong_3").style.visibility="visible";
								document.getElementById("yzm").value="";
							}
							<?php }?>
						}
					});
				}
			});
			$("#username").click(function()
			{
			    layer.msg('填写邮箱', {time:800});
				document.getElementById("wrong_1").style.visibility="hidden";
			});
			$("#password").click(function()
			{
			    layer.msg('密码包含大小写字母和数字，且为6-16位', {time:1000});
				document.getElementById("wrong_2").style.visibility="hidden";
				if(document.getElementById("username").value=="")
				{
					document.getElementById("wrong_1").style.visibility="visible";
				};
			});
			$("#passwordcheck").click(function()
			{
				if(document.getElementById("username").value=="")
				{
					document.getElementById("wrong_1").style.visibility="visible";
				};
				if(document.getElementById("password").value=="")
				{
					document.getElementById("wrong_2").style.visibility="visible";
				};
			});
			<?php if($conf['yzm_reg']!="0"){ ?>
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
				if(document.getElementById("password").value!=document.getElementById("passwordcheck").value)
				{
					document.getElementById("wrong_4").style.visibility="visible";
					layer.msg('两次输入的密码不一致', {time:1500});
				}
			});
			<?php }?>
		});
		</script>
		<script>
			$(function(){
				/*仿刷新：检测是否存在cookie*/
				if($.cookie("captcha_reg")){
					var count = $.cookie("captcha_reg");
					document.getElementById("sendcode").setAttribute("disabled","true" );
					document.getElementById("sendcode").value=count + "秒后重获";
					var resend = setInterval(function(){
						count--;
						if (count > 0){
							document.getElementById("sendcode").setAttribute("disabled","true" );//设置按钮为禁用状态
							document.getElementById("sendcode").value=count + "秒后重获";
							$.cookie("captcha_reg", count, {path: '/', expires: (1/86400)*count});
						}else {
							clearInterval(resend);
							document.getElementById("sendcode").removeAttribute("disabled");//移除禁用状态改为可用
							document.getElementById("sendcode").value="重获验证码";
						}
					}, 1000);
				}
				if($.cookie("email_reg"))
				{
					document.getElementById("username").value=$.cookie("email_reg");
				}
				/*点击改变按钮状态，已经简略掉ajax发送短信验证的代码*/
				$('#sendcode').click(function(){
					var count = 60;
					var email=document.getElementById("username").value;
					var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
					var right=1;
					if(!reg.test(email)){right=0;}
					$.cookie("email_reg", email, {path: '/', expires: (1/86400)*count});
					if(email=="")
					{
						layer.msg("请输入用户名(邮箱)");
					}
					else if(right==0)
					{
						layer.msg("邮箱格式不正确");
						document.getElementById("username").values="";
					}
					if(right==1){
						var resend = setInterval(function(){
							count--;
							if (count > 0){
								document.getElementById("sendcode").value=count + "秒后重获";
								$.cookie("captcha_reg", count, {path: '/', expires: (1/86400)*count});
							}else {
								clearInterval(resend);
								document.getElementById("sendcode").removeAttribute("disabled");//移除禁用状态改为可用
								document.getElementById("sendcode").value="重获验证码";
							}
						}, 1000);
						document.getElementById("sendcode").setAttribute("disabled","true" );
						var act="sendcode";
						var method="reg";
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
    		function  testCapsLock(e){  
               var valueCapsLock = e.keyCode ? e.keyCode:e.which; // 按键   
               var valueShift = e.shiftKey ? e.shiftKey:((valueCapsLock == 16 ) ? true : false ); // shift键是否按住  
               if (((valueCapsLock >= 65 && valueCapsLock <= 90 ) && !valueShift) // 输入了大写字母，并且shift键没有按住，说明Caps Lock打开
                || ((valueCapsLock >= 97 && valueCapsLock <= 122 ) && valueShift)){// 输入了小写字母，并且按住 shift键，说明Caps Lock打开
                    if(document.getElementById("pwd").value=="2"||document.getElementById("pwd").value=="0")
                    {
                        layer.msg('大写已开启');
                        document.getElementById("pwd").value="1";
                    }
                }
                else if(document.getElementById("pwd").value=="2"||document.getElementById("pwd").value=="1")
                {
                	layer.msg('大写已关闭');
                	document.getElementById("pwd").value="0";
                }    
            }
        </script>
        <script>
		    function  testCapsLock(e){  
               var valueCapsLock = e.keyCode ? e.keyCode:e.which; // 按键   
               var valueShift = e.shiftKey ? e.shiftKey:((valueCapsLock == 16 ) ? true : false ); // shift键是否按住  
               if (((valueCapsLock >= 65 && valueCapsLock <= 90 ) && !valueShift) // 输入了大写字母，并且shift键没有按住，说明Caps Lock打开
                || ((valueCapsLock >= 97 && valueCapsLock <= 122 ) && valueShift)){// 输入了小写字母，并且按住 shift键，说明Caps Lock打开
                    if(document.getElementById("pwd").value=="2"||document.getElementById("pwd").value=="0")
                    {
                        layer.msg('大写已开启');
                        document.getElementById("pwd").value="1";
                    }
                }
                else if(document.getElementById("pwd").value=="2"||document.getElementById("pwd").value=="1")
                {
                	layer.msg('大写已关闭');
                	document.getElementById("pwd").value="0";
                }    
            }
		</script>
		<script type="text/javascript" src="./asset/js/click.js"></script>
    </head>
    <body style="background-color:#ADECFC;">
        <script pointColor="238,143,0" color="255,204,0" opacity='1' zIndex="-1" count="100"  src="./asset/js/dist_canvas-nest.js"></script>
        <?php 
            include"head.php";
            include_once "./asset/css/function_css.php";
        ?>
        <div class="baobao-body baobao-run-center">
			<div class="baobao-show">
				<div class="baobao-width-406080 baobao-x-center" style="float: none;padding-top:30px;">
					<div class="baobao-contain baobao-font-title" style="diaplay:inline-block;height:50px;<?php echo background_image_2(90,'#1A94E6','#94E0F3','#1A94E6');?>border-radius:10px 10px 0% 0%;">
						<div style="display:inline-block; *display:inline; zoom:1;">
							<div style="float:left;">
								<span class="baobao-span iconfont icon-add"></span>
							</div>
							<div style="float:left;">
								<span class="baobao-span" style="user-select:none;">影小薯博客系统注册</span>
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
							<input style="float:left;" onkeypress ="testCapsLock(event)" type="password" class="baobao-input" id="password" name="password" >
							<input style="display:none;" id="pwd" value="2" />
							<span  for="name" id="wrong_2" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
						</div>
						<hr>
						<div class="baobao-inline" style="float:none;">
							<div class=" baobao-lable" style="text-align:center;float:left;line-height:50px;">
								<div style="display:inline-block; *display:inline; zoom:1;">
									<div style="float:left;">
										<span class=" iconfont icon-password"></span>
									</div>
									<div style="float:left;">
										<span for="name" >确认密码:</span>
									</div>
								</div>
							</div>
							<input style="float:left;" onkeypress ="testCapsLock(event)" type="password" class="baobao-input" id="passwordcheck" name="passwordcheck" >
							<span  for="name" id="wrong_4" style="float:right;position:absolute;color:#D60808;font-size:30px;font-weight:bold;line-height:50px;visibility:hidden;" class="iconfont icon-reeor"></span>
						</div>
						<hr>
						<?php if($conf['yzm_reg']!="0"){ ?>
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
						<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
						    <?php if($conf['yzm_reg']=="1"){ ?>
							<font style="color:#fff;line-height:50px;font-weight:bold;" >点击验证码更换</font>
							<span  for="name" style="float:right;"><img  style="margin:0px;" height="50" id="codeimg" class="baobao-yzm" src="../include/code.php?act=reg&r=<?php echo time();?>" onclick="this.src='../include/code.php?act=reg&r='+Math.random();" title="点击更换验证码"></span>
							<?php }else{?>
							<font style="color:#fff;line-height:50px;font-weight:bold;" >点击获取验证码</font>
							<input id="sendcode" style="width: 120px;height: 50px;float:right;background-color: white;border: 1px solid #E2E2E2;" name="sendcode" type="button"   value="获取邮箱验证码" onclick="sendMessage();" />
							<?php }?>
						</div>
						<hr>
						<?php }?>
						<div class="baobao-inline" style="height:50px;background-color:#1A94E6;">
							<div style="float:left;width:100%;"><input type="button" id="submit" name="submit"  style="height:100%;font-weight:bold;font-size:18px;color:#fff;background:linear-gradient(to right,#226DDD,#94E0F3,#226DDD);border:none;width:100%;cursor:pointer;" value="注册"></div>
						</div>
					</form>
					<hr>
					<div class="baobao-contain baobao-font-title" style="float:none;<?php echo background_image_2(90,'#1A94E6','#94E0F3','#1A94E6');?>border-radius:0% 0% 10px 10px;font-size:10px;">
						<a href="./find.php"><span style="color:#fff;">忘记密码</span></a><a href="./login.php"><span style="color:#fff;margin-left:30px;">已有账号,前往登录</span></a>
					</div>
				</div>
			</div>
		</div>
    </body>
    
</html>