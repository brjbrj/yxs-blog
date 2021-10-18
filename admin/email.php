<?php
	session_start();
	if(!isset($_SESSION['adminlogin']))$_SESSION['adminlogin']=0;
	if($_SESSION['adminlogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您未登录！');window.location.href='login.php';</script>");
	}
	include"../include/common.php";
	$act="email";
	$mod = isset($_GET['mod'])? $_GET['mod']:'account';
?>
<html lang="zh">
<?php
	include_once"./head2.php";
?>
	<style>
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
				width:60%;
			}
		}
		@media screen and (max-width: 768px)
		{
			.baobao-width-406080
			{
				width:80%;
			}
		}
		.baobao-title
		{
			width:100%;
			margin-top:40px;
			background:#FF5555;
			height:40px;
			line-height:40px;
			border:none;
			user-select: none;
		}
		.baobao-form
		{
			width:100%;
			padding-top:10px;
		}
		.baobao-line-item
		{
			width:100%;
			margin-top:5px;
			height:40px;
		}
		form div.baobao-form-span
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:35%;
			background:#EE9C66;
			user-select:none;
			float:left;
			color:#fff;
			overflow:hidden;
			border-radius:5px 5px 5px 5px;
		}
		.baobao-button
		{
			height:40px;
			width:100%;
			border:none;
			outline:none;
			background:#FF5555;
			border-radius:3px 3px 3px 3px;
			color:#fff;
			font-weight:bold;
			font-size:15px;
		}
		.baobao-button:hover
		{
			background:#FF6666;
		}
		form div.baobao-form-input
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:65%;
			float:right;
			overflow:hidden;
		}
		.baobao-input
		{
			height:40px;
			width:100%;
			border-color:#E8E8E8;
			outline:none;
			border-style:solid;
			border-width:1px;
			border-radius:5px 5px 5px 5px;
			font-size:15px;
			text-indent:20px;
		}
		.baobao-input:focus
		{
			border-color:#ccccff;
			border-style:solid;
			border-width:3px;
		}
		.baobao-input:hover
		{
			border-color:#ccccff;
			border-width:3px;
			transition: all .3s;
		}
		
		/*tab类*/
		.baobao-tab-title
		{
			width: 100%;
			height: auto;
			color: black;
			margin: 0;
			display: flex;
		}

		.baobao-tab-title span
		{
			width:auto;
			height: auto;
			line-height:auto;
			text-align: center;
			float: left;
			font-size:17px;
			flex: 1;
			border-right: 1px solid #FF9900;
			border-top: 1px solid #FF9900;
			border-radius:5px 5px 5px 5px;
			user-select: none;
			overflow:hidden;
		}
		.baobao-tab-title span:nth-child(3)
		{
			border-right: none;
		}
		.baobao-tab
		{
			color: #fff;
			background-color: #FF5555;
			cursor: pointer;
		}
		#baobao-tab>div
		{
			width: 100%;
			height: auto;
			display: none;
			text-align: center;
		}
		#baobao-tab .baobao-content
		{
			display: block;
		}
		.baobao-textarea
		{
			width:100%;
			height:100px;
			resize:none;
			outline:none;
			border:none;
			padding-left:20px;
			padding-right:20px;
			font-size:20px;
		}
		.baobao-textarea:hover
		{
			border:2px solid #FABA5B;
			background-color:#FFFFEE;
		}
		.baobao-textarea:focus
		{
			border:2px solid #FABA5B;
			background-color:#FFFFEE;
		}
	</style>
	<script>
		$(document).ready(function()
		{
			$("#submit").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var host=document.getElementById("host").value;
				var username=document.getElementById("username").value;
				var password=document.getElementById("password").value;
				var port=document.getElementById("port").value;
				var act="email";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'host':host,
						'username':username,
						'password':password,
						'port':port,
						'act':act,
					},// 序列化表单值  
					dataType : 'json',
					success:function(data) 
					{
					    layer.closeAll('loading');
						if(data==1)
						{
							layer.msg('修改成功', {icon: 1,time:1000,shade:0.4});
						}
						else if(data==0)
						{
							layer.msg('修改失败，未知错误', {icon: 2,time:1000,shade:0.4});
						}
					}
				});
			});
			$("#reg_submit").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var title=document.getElementById("reg_title").value;
				var value=document.getElementById("reg_value").value;
				var act="template";
				var method="reg";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'title':title,
						'value':value,
						'method':method,
						'act':act,
					},// 序列化表单值  
					dataType : 'json',
					success:function(data) 
					{
					    layer.closeAll('loading');
						if(data==1)
						{
							layer.msg('修改成功', {icon: 1,time:1000,shade:0.4});
						}
						else if(data==0)
						{
							layer.msg('修改失败，未知错误', {icon: 2,time:1000,shade:0.4});
						}
					}
				});
			});
			$("#login_submit").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var title=document.getElementById("login_title").value;
				var value=document.getElementById("login_value").value;
				var act="template";
				var method="login";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'title':title,
						'value':value,
						'method':method,
						'act':act,
					},// 序列化表单值  
					dataType : 'json',
					success:function(data) 
					{
					    layer.closeAll('loading');
						if(data==1)
						{
							layer.msg('修改成功', {icon: 1,time:1000,shade:0.4});
						}
						else if(data==0)
						{
							layer.msg('修改失败，未知错误', {icon: 2,time:1000,shade:0.4});
						}
					}
				});
			});
			$("#find_submit").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var title=document.getElementById("find_title").value;
				var value=document.getElementById("find_value").value;
				var act="template";
				var method="find";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'title':title,
						'value':value,
						'method':method,
						'act':act,
					},// 序列化表单值  
					dataType : 'json',
					success:function(data) 
					{
					    layer.closeAll('loading');
						if(data==1)
						{
							layer.msg('修改成功', {icon: 1,time:1000,shade:0.4});
						}
						else if(data==0)
						{
							layer.msg('修改失败，未知错误', {icon: 2,time:1000,shade:0.4});
						}
					}
				});
			});
			$("#test").click(function()
			{
				layer.prompt({title: '输入收信邮箱', formType:4}, function(text, index){
					layer.close(index);
					var email=text;
					var act="send_test";
					var index = layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
					$.ajax({  
						type: "POST",   //提交的方法
						url:"./ajax.php", //提交的地址  
						data:
						{
							'email':email,
							'act':act,
						},// 序列化表单值  
						dataType : 'json',
						success:function(data) 
						{
						    layer.closeAll('loading');
							if(data==1)
							{
								layer.msg('发送成功', {icon: 1,time:1000,shade:0.4});
							}
							else if(data==0)
							{
								layer.msg('发送失败，邮箱错误', {icon: 2,time:1000,shade:0.4});
							}
						}
					});
				});
			});
		});
	</script>
	<script>
		var tabs = document.getElementsByClassName("baobao-tabspan");
		// 获取所有的div标签组
		var cts = document.getElementsByClassName("baobao-tabdiv");
		function changeTab(current) {
			for(i = 0; i < tabs.length; i++) {
				if(tabs[i] == current) {
					tabs[i].className = "baobao-tab baobao-tabspan";
					cts[i].className = "baobao-content baobao-tabdiv";
				} else {
					tabs[i].className = "baobao-tabspan";
					cts[i].className = "baobao-tabdiv";
				}
			}
		}
	</script>
	<div class="baobao-pannel baobao-run">
		<div class="baobao-pannel-body">
			<div class="baobao-width-406080" style="margin:0 auto;">
				<?php if($mod=='account'){?>
				<div class="baobao-title" style="border-radius:3px;">
					<span style="color:white;font-weight:bold;">账号配置</span>
				<div>
				<form class="baobao-form">
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div ><span>SMTP服务器</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" id="host" name="host" type="text" value="<?php echo $conf['mail_smtp']; ?>">
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div ><span>SMTP用户名</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" id="username" name="username" type="text" value="<?php echo $conf['mail_name'];?>">
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div ><span>SMTP密码</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" id="password" name="password" type="text" value="<?php echo $conf['mail_pwd']; ?>">
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div ><span>服务器端口</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" id="port" name="port" type="text" value="<?php echo $conf['mail_port']; ?>">
						</div>
					</div>
					<div class="baobao-line-item">
						<input class="baobao-button" type="button" id="submit" value="确定">
					</div>
					<div class="baobao-line-item" >
						<input class="baobao-button" type="button" style="background:#EE9C66;"id="test" value="发送测试">
					</div>
				</form>
				<?php }else{?>
				<div class="baobao-title" style="border-radius:3px;">
					<span style="color:white;font-weight:bold;">发信模板</span>
				<div>
				<div id="baobao-tab" style="margin-top:10px;">
					<h2 class="baobao-tab-title">
						<span class="baobao-tab baobao-tabspan" onclick="changeTab(this)">注册验证码</span>
						<span onclick="changeTab(this)" class="baobao-tabspan">登录验证码</span>
						<span onclick="changeTab(this)" class="baobao-tabspan">找回密码验证码</span>
					</h2>
					<div class="baobao-content baobao-tabdiv">
						<form class="baobao-form">
							<div class="baobao-line-item">
								<div class="baobao-form-span"style="width:100%;" >
									<div ><span>邮件标题</span></div>
								</div>
							</div>
							<textarea class="baobao-textarea" id="reg_title" name="reg_title"><?php echo $conf['yzm_mod_reg_head'];?></textarea>
							<div class="baobao-line-item">
								<div class="baobao-form-span"style="width:100%;" >
									<div ><span>邮件内容</span></div>
								</div>
							</div>
							<textarea class="baobao-textarea" id="reg_value" name="reg_value"><?php echo $conf['yzm_mod_reg'];?></textarea>
							<div class="baobao-line-item">
								<input class="baobao-button" type="button" id="reg_submit" value="确定">
							</div>
						</form>
					</div>
					<div class="baobao-tabdiv">
						<form class="baobao-form">
							<div class="baobao-line-item">
								<div class="baobao-form-span"style="width:100%;" >
									<div ><span>邮件标题</span></div>
								</div>
							</div>
							<textarea class="baobao-textarea" id="login_title" name="login_title"><?php echo $conf['yzm_mod_login_head'];?></textarea>
							<div class="baobao-line-item">
								<div class="baobao-form-span"style="width:100%;" >
									<div ><span>邮件内容</span></div>
								</div>
							</div>
							<textarea class="baobao-textarea" id="login_value" name="login_value"><?php echo $conf['yzm_mod_login'];?></textarea>
							<div class="baobao-line-item">
								<input class="baobao-button" type="button" id="login_submit" value="确定">
							</div>
						</form>
					</div>
					<div class="baobao-tabdiv">
						<form class="baobao-form">
							<div class="baobao-line-item">
								<div class="baobao-form-span"style="width:100%;" >
									<div ><span>邮件标题</span></div>
								</div>
							</div>
							<textarea class="baobao-textarea" id="find_title" name="find_title"><?php echo $conf['yzm_mod_find_head'];?></textarea>
							<div class="baobao-line-item">
								<div class="baobao-form-span"style="width:100%;" >
									<div ><span>邮件内容</span></div>
								</div>
							</div>
							<textarea class="baobao-textarea" id="find_value" name="find_value"><?php echo $conf['yzm_mod_find'];?></textarea>
							<div class="baobao-line-item">
								<input class="baobao-button" type="button" id="find_submit" value="确定">
							</div>
						</form>
					</div>
				</div>
				<div style="border-radius:3px;background:none;width:100%;">
					<span style="color:#FF6944;font-weight:bold;font-size:10px;">可用参数表</span>
				<div>
				<div  style="border-radius:3px;background:none;width:100%;margin-top:0;">
					<span style="color:#FF6944;font-weight:bold;font-size:10px;">用户名:$username<font color="#FF9900">||</font>站名:$title<font color="#FF9900">||</font>客服QQ:$qq<font color="#FF9900">||</font>验证码:$code</span>
				<div>
				<?php }?>
			</div>
		</div>
	</div>
	</body>
<html>