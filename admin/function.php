<?php
	session_start();
	if($_SESSION['adminlogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您未登录！');window.location.href='login.php';</script>");
	}
	include"../include/common.php";
	$act="site";
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
			user-select:none;
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
			overflow:hidden;
			border-radius:5px 5px 5px 5px;
			color:#fff;
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
		.baobao-select
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:65%;
			float:right;
			overflow:hidden;
			border-color:#E8E8E8;
			outline:none;
			border-style:solid;
			border-width:1px;
			border-radius:5px 5px 5px 5px;
			text-indent:20px;
             
		}
		.baobao-select:focus
		{
			border-color:#ccccff;
			border-style:solid;
			border-width:3px;
		}
		.baobao-select:hover
		{
			border-color:#ccccff;
			border-width:3px;
		}
		.baobao-select option
		{
		    height: 20px;
		    color:red;
		    
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
	</style>
	<div class="baobao-pannel baobao-run">
		<div class="baobao-pannel-body">
			<div class="baobao-width-406080" style="margin:0 auto;">
				<div class="baobao-title" style="border-radius:3px;">
					<span style="color:white;font-weight:bold;">功能限制</span>
				<div>
				<form class="baobao-form" id="function-form">
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>注册验证码开关</span></div>
						</div>
						<div style="width:64%;float:right;">
						    <div id="regyzm" style="width:100%;border-radius:5px 5px 5px 5px;" class="xm-select-demo"></div>
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>登录验证码开关</span></div>
						</div>
						<div style="width:64%;float:right;">
						    <div id="loginyzm" style="width:100%;border-radius:5px 5px 5px 5px;" class="xm-select-demo"></div>
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>验证码长度</span></div>
						</div>
						<div style="width:64%;float:right;">
						    <div id="yzmlen" style="width:100%;border-radius:5px 5px 5px 5px;" class="xm-select-demo"></div>
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>邮箱验证码有效时间</span></div>
						</div>
						<div style="width:64%;float:right;">
						    <div id="yzmtime" style="width:100%;border-radius:5px 5px 5px 5px;" class="xm-select-demo"></div>
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>找回密码</span></div>
						</div>
						<div style="width:64%;float:right;">
						    <div id="findpwd" style="width:100%;border-radius:5px 5px 5px 5px;" class="xm-select-demo"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
    var regyzm = xmSelect.render({
    	el: '#regyzm', 
    	radio: true,
    	clickClose: true,
    	model: {
    		label: {
    			type: 'text',
    			text: {
    				//左边拼接的字符
    				left: '',
    				//右边拼接的字符
    				right: '',
    				//中间的分隔符
    				separator: ', ',
    			},
    		}
    	},
    	on: function(data)
    	{
    	    var arr = data.arr;
    	    for (let i = 0; i < arr.length; i++) {
                value = arr[i].value;
            }
            if(value==0)
            {
                regyzm.update({
                    data: [
                        {name: '关闭', value: 0,selected:true,disabled:true},
        		        {name: '开启普通验证', value: 1,selected:false,disabled:false},
        		        {name: '开启邮箱验证', value: 2,selected:false,disabled:false},
                    ]
                })
            }
            else if(value==1)
            {
                regyzm.update({
                    data: [
                        {name: '关闭', value: 0,selected:false,disabled:false},
        		        {name: '开启普通验证', value: 1,selected:true,disabled:true},
        		        {name: '开启邮箱验证', value: 2,selected:false,disabled:false},
                    ]
                })
            }
            else
            {
                regyzm.update({
                    data: [
                        {name: '关闭', value: 0,selected:false,disabled:false},
        		        {name: '开启普通验证', value: 1,selected:false,disabled:false},
        		        {name: '开启邮箱验证', value: 2,selected:true,disabled:true},
                    ]
                })
            }
            var act="limit";
    	    var method="regyzm";
    	    var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
    		$.ajax({  
				type: "POST",   //提交的方法
				url:"./ajax.php", //提交的地址  
				data:
				{
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
    	},
    	data: [
    		{name: '关闭', value: 0,<?php echo isselect("0",$conf['yzm_reg']); ?>},
    		{name: '开启普通验证', value: 1,<?php echo isselect("1",$conf['yzm_reg']); ?>},
    		{name: '开启邮箱验证', value: 2,<?php echo isselect("2",$conf['yzm_reg']); ?>},
    	],
    })
    var loginyzm = xmSelect.render({
    	el: '#loginyzm', 
    	radio: true,
    	clickClose: true,
    	model: {
    		label: {
    			type: 'text',
    			text: {
    				//左边拼接的字符
    				left: '',
    				//右边拼接的字符
    				right: '',
    				//中间的分隔符
    				separator: ', ',
    			},
    		}
    	},
    	on: function(data)
    	{
    	    var arr = data.arr;
    	    for (let i = 0; i < arr.length; i++) {
                value = arr[i].value;
            }
            if(value==0)
            {
                loginyzm.update({
                    data: [
                        {name: '关闭', value: 0,selected:true,disabled:true},
        		        {name: '开启普通验证', value: 1,selected:false,disabled:false},
        		        {name: '开启邮箱验证', value: 2,selected:false,disabled:false},
                    ]
                })
            }
            else if(value==1)
            {
                loginyzm.update({
                    data: [
                        {name: '关闭', value: 0,selected:false,disabled:false},
        		        {name: '开启普通验证', value: 1,selected:true,disabled:true},
        		        {name: '开启邮箱验证', value: 2,selected:false,disabled:false},
                    ]
                })
            }
            else
            {
                loginyzm.update({
                    data: [
                        {name: '关闭', value: 0,selected:false,disabled:false},
        		        {name: '开启普通验证', value: 1,selected:false,disabled:false},
        		        {name: '开启邮箱验证', value: 2,selected:true,disabled:true},
                    ]
                })
            }
            var act="limit";
    	    var method="loginyzm";
    	    var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
    		$.ajax({  
				type: "POST",   //提交的方法
				url:"./ajax.php", //提交的地址  
				data:
				{
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
    	},
    	data: [
    		{name: '关闭', value: 0,<?php echo isselect("0",$conf['yzm_login']); ?>},
    		{name: '开启普通验证', value: 1,<?php echo isselect("1",$conf['yzm_login']); ?>},
    		{name: '开启邮箱验证', value: 2,<?php echo isselect("2",$conf['yzm_login']); ?>},
    	],
    })
    var yzmlen = xmSelect.render({
    	el: '#yzmlen', 
    	radio: true,
    	clickClose: true,
    	model: {
    		label: {
    			type: 'text',
    			text: {
    				//左边拼接的字符
    				left: '',
    				//右边拼接的字符
    				right: '',
    				//中间的分隔符
    				separator: ', ',
    			},
    		}
    	},
    	data: [
    		{name: '4', value: 4,<?php echo isselect("4",$conf['yzm_len']); ?>},
    		{name: '5', value: 5,<?php echo isselect("5",$conf['yzm_len']); ?>},
    		{name: '6', value: 6,<?php echo isselect("6",$conf['yzm_len']); ?>},
    		{name: '7', value: 7,<?php echo isselect("7",$conf['yzm_len']); ?>},
    	],
    	on: function(data)
    	{
    	    var arr = data.arr;
    	    for (let i = 0; i < arr.length; i++) {
                value = arr[i].value;
            }
            if(value==4)
            {
                yzmlen.update({
                    data: [
                        {name: '4', value: 4,selected:false,disabled:true},
                		{name: '5', value: 5,selected:false,disabled:false},
                		{name: '6', value: 6,selected:false,disabled:false},
                		{name: '7', value: 7,selected:false,disabled:false},
                    ]
                })
            }
            else if(value==5)
            {
                yzmlen.update({
                    data: [
                        {name: '4', value: 4,selected:false,disabled:false},
                		{name: '5', value: 5,selected:false,disabled:true},
                		{name: '6', value: 6,selected:false,disabled:false},
                		{name: '7', value: 7,selected:false,disabled:false},
                    ]
                })
            }
            else if(value==6)
            {
                yzmlen.update({
                    data: [
                        {name: '4', value: 4,selected:false,disabled:false},
                		{name: '5', value: 5,selected:false,disabled:false},
                		{name: '6', value: 6,selected:false,disabled:true},
                		{name: '7', value: 7,selected:false,disabled:false},
                    ]
                })
            }
            else if(value==7)
            {
                yzmlen.update({
                    data: [
                        {name: '4', value: 4,selected:false,disabled:false},
                		{name: '5', value: 5,selected:false,disabled:false},
                		{name: '6', value: 6,selected:false,disabled:false},
                		{name: '7', value: 7,selected:false,disabled:true},
                    ]
                })
            }
            var act="limit";
    	    var method="yzmlen";
    	    var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
    		$.ajax({  
				type: "POST",   //提交的方法
				url:"./ajax.php", //提交的地址  
				data:
				{
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
    	},
    })
    var findpwd = xmSelect.render({
    	el: '#findpwd', 
    	radio: true,
    	clickClose: true,
    	model: {
    		label: {
    			type: 'text',
    			text: {
    				//左边拼接的字符
    				left: '',
    				//右边拼接的字符
    				right: '',
    				//中间的分隔符
    				separator: ', ',
    			},
    		}
    	},
    	on: function(data)
    	{
    	    var arr = data.arr;
    	    for (let i = 0; i < arr.length; i++) {
                value = arr[i].value;
            }
            if(value==0)
            {
                findpwd.update({
                    data: [
                        {name: '关闭', value: 0,selected:false,disabled:true},
        		        {name: '开启', value: 1,selected:false,disabled:false},
                    ]
                })
            }
            else
            {
                findpwd.update({
                    data: [
                        {name: '关闭', value: 0,selected:false,disabled:false},
        		        {name: '开启', value: 1,selected:false,disabled:true},
                    ]
                })
            }
            var act="limit";
    	    var method="findpwd";
    	    var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
    		$.ajax({  
				type: "POST",   //提交的方法
				url:"./ajax.php", //提交的地址  
				data:
				{
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
    	},
    	data: [
    		{name: '关闭', value: 0,<?php echo isselect("0",$conf['yzm_find']); ?>},
    		{name: '开启', value: 1,<?php echo isselect("1",$conf['yzm_find']); ?>},
    	],
    })
    var yzmtime = xmSelect.render({
    	el: '#yzmtime', 
    	radio: true,
    	clickClose: true,
    	filterable: false,
    	create: function(val, arr){
    		if(arr.length === 0){
    			return {
    				name:  val,
    				value: val+'s'
    			}
    		}
    	},
    	model: {
    		icon: 'hidden',
    		label: {
    			type: 'text',
    		}
    	},
    	on: function(data)
    	{
    	    var arr = data.arr;
    	    for (let i = 0; i < arr.length; i++) {
                value = arr[i].value;
            }
            var act="limit";
    	    var method="yzmtime";
            $.ajax({  
				type: "POST",   //提交的方法
				url:"./ajax.php", //提交的地址  
				data:
				{
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
						if(value==60)
						{
						    yzmtime.update({
                                data: [
                                    {name: '60s', value: 60,selected:true,disabled:true},
                            		{name: '180s', value: 180,selected:false,disabled:false},
                            		{name: '300s', value: 300,selected:false,disabled:false},
                            		{name: '600s', value: 600,selected:false,disabled:false},
                            		{name: '1800s', value: 1800,selected:false,disabled:false},
                                ]
                            })
						}
						else if(value==180)
						{
						    yzmtime.update({
                                data: [
                                    {name: '60s', value: 60,selected:false,disabled:false},
                            		{name: '180s', value: 180,selected:true,disabled:true},
                            		{name: '300s', value: 300,selected:false,disabled:false},
                            		{name: '600s', value: 600,selected:false,disabled:false},
                            		{name: '1800s', value: 1800,selected:false,disabled:false},
                                ]
                            })
						}
						else if(value==300)
						{
						    yzmtime.update({
                                data: [
                                    {name: '60s', value: 60,selected:false,disabled:false},
                            		{name: '180s', value: 180,selected:false,disabled:false},
                            		{name: '300s', value: 300,selected:true,disabled:true},
                            		{name: '600s', value: 600,selected:false,disabled:false},
                            		{name: '1800s', value: 1800,selected:false,disabled:false},
                                ]
                            })
						}
						else if(value==600)
						{
						    yzmtime.update({
                                data: [
                                    {name: '60s', value: 60,selected:false,disabled:false},
                            		{name: '180s', value: 180,selected:false,disabled:false},
                            		{name: '300s', value: 300,selected:false,disabled:false},
                            		{name: '600s', value: 600,selected:true,disabled:true},
                            		{name: '1800s', value: 1800,selected:false,disabled:false},
                                ]
                            })
						}
						else if(value==1800)
						{
						    yzmtime.update({
                                data: [
                                    {name: '60s', value: 60,selected:false,disabled:false},
                            		{name: '180s', value: 180,selected:false,disabled:false},
                            		{name: '300s', value: 300,selected:false,disabled:false},
                            		{name: '600s', value: 600,selected:true,disabled:true},
                            		{name: '1800s', value: 1800,selected:true,disabled:true},
                                ]
                            })
						}
						
					}
					else if(data==0)
					{
						layer.msg('修改失败，未知错误', {icon: 2,time:1000,shade:0.4});
					}
				}
			});
    	},
    	data: [
    		{name: '60s', value: 60,<?php echo isselect("60",$conf['yzm_time']); ?>},
    		{name: '180s', value: 180,<?php echo isselect("180",$conf['yzm_time']); ?>},
    		{name: '300s', value: 300,<?php echo isselect("300",$conf['yzm_time']); ?>},
    		{name: '600s', value: 600,<?php echo isselect("600",$conf['yzm_time']); ?>},
    		{name: '1800s', value: 1800,<?php echo isselect("1800",$conf['yzm_time']); ?>},
    	]
    })
    </script>
	</body>
<html>