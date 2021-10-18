<?php
	session_start();
	if(!isset($_SESSION['adminlogin']))$_SESSION['adminlogin']=0;
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
			user-select: none;
		}
		.baobao-form
		{
			width:100%;
			padding-top:10px;
		}
		.baobao-line-in
		{
			width:100%;
			display: inline-block;
			padding-bottom:5px;
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
		}
		form div.baobao-form-input
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:65%;
			float:right;
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
		.layui-tab-card > .layui-tab-title li
        {
            width:20%;
            min-width: 20%;
            padding:0;
            padding-top:auto;
            padding-bottom:auto;
            margin:0;
            user-select: none;
            line-height:40px;
            overflow-x: auto;
            overflow-y: hidden;
        }
		.baobao-textarea
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
		.layui-form
		{
		    margin-top:10px;
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
		.layui-input:focus,.layui-textarea:focus{border-width:3px;border-color:#ccccff!important}
		.layui-input:hover,.layui-textarea:hover{border-width:3px;border-color:#ccccff!important}
		.layui-tab-card > .layui-tab-title .layui-this
        {
            background-color:#fff;
            color:#000;
            border:none;
        }
        .layui-tab-card > .layui-tab-title .layui-this::after
        {
            color:#fff;
            border:none;
        }
        .layui-tab
        {
           box-shadow:none;
        }
        .layui-tab-card > .layui-tab-title li::-webkit-scrollbar
		{
			height:2px;
		}
		.layui-tab-card > .layui-tab-title li::-webkit-scrollbar-thumb
		{
			border-radius: 1px;
			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
			background:#FABA5B;
		}
		.layui-tab-card > .layui-tab-title li::-webkit-scrollbar-trac
		{
			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
			border-radius: 0;
			background: rgba(0,0,0,0.1);
		}
		.baobao-textarea::-webkit-scrollbar
		{
			width:7px;
		}
		.baobao-textarea::-webkit-scrollbar-thumb
		{
			border-radius: 1px;
			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
			background:#FABA5B;
		}
		.baobao-textarea::-webkit-scrollbar-trac
		{
			-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
			border-radius: 0;
			background: rgba(0,0,0,0.1);
		}
		.baobao-span
		{
		    color:#fff;
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
				var notice_num=document.getElementById("notice_num").value;
				var notice_height=document.getElementById("notice_height").value;
				var notice_width=document.getElementById("notice_width").value;
				var notice_interval=document.getElementById("notice_interval").value;
				var notice_autoplay=document.getElementById("notice_autoplay").value;
				var notice_anim=document.getElementById("notice_anim").value;
				var notice_indicator=document.getElementById("notice_indicator").value;
				var notice_arrow=document.getElementById("notice_arrow").value;
				var act="notice";
				var method="0";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'notice_num':notice_num,
						'notice_height':notice_height,
						'notice_width':notice_width,
						'notice_interval':notice_interval,
						'notice_autoplay':notice_autoplay,
						'notice_anim':notice_anim,
						'notice_indicator':notice_indicator,
						'notice_arrow':notice_arrow,
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
			$("#submit_1").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var notice_1=document.getElementById("notice_1").value;
				var act="notice";
				var method="1";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'notice_1':notice_1,
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
			$("#submit_2").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var notice_2=document.getElementById("notice_2").value;
				var act="notice";
				var method="2";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'notice_2':notice_2,
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
			$("#submit_3").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var notice_3=document.getElementById("notice_3").value;
				var act="notice";
				var method="3";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'notice_3':notice_3,
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
			$("#submit_4").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var notice_4=document.getElementById("notice_4").value;
				var act="notice";
				var method="4";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'notice_4':notice_4,
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
			$("#submit_5").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var notice_5=document.getElementById("notice_5").value;
				var act="notice";
				var method="5";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'notice_5':notice_5,
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
			$("#submit_6").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var notice_6=document.getElementById("notice_6").value;
				var act="notice";
				var method="6";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'notice_6':notice_6,
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
		});
	</script>
	<div class="baobao-pannel baobao-run">
		<div class="baobao-pannel-body">
			<div class="baobao-width-406080" style="margin:0 auto;">
				<div class="baobao-title" style="border-radius:3px;">
				    <div style="display:inline-block; *display:inline; zoom:1;">
    					<div style="float:left;">
            				<span style="color:white;font-weight:bold;" class="iconfont icon-signboard"></span>
            			</div>
            			<div style="float:left;">
            				<span style="color:white;font-weight:bold;" >公告设置</span>
            			</div>
        			</div>
        		</div>
				<form class="layui-form" action="">
				    <div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span style="color:#fff;">公告数目</span></div>
						</div>
						<div class="baobao-form-input">
							<select name="notice_num" id="notice_num" lay-filter="notice_num">
							    <?php
							        $i=0;
							        for($i=0;$i<=5;$i++)
							        {
							            echo '<option value="'.$i.'"'.select($i,$conf['notice_num']).'>'.$i.'</option>';
							        }
							    ?>
                            </select>
						</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span style="color:#fff;">公告-高</span></div>
						</div>
						<div class="baobao-form-input">
    						<input class="baobao-input" id="notice_height" type="text" value="<?php echo $conf['notice_height'];?>">
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span style="color:#fff;">公告-宽</span></div>
						</div>
						<div class="baobao-form-input">
    						<input class="baobao-input" id="notice_width" type="text" value="<?php echo $conf['notice_width'];?>">
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span style="color:#fff;">播放速度(ms)</span></div>
						</div>
						<div class="baobao-form-input">
    						<input class="baobao-input" id="notice_interval" type="text" value="<?php echo $conf['notice_interval'];?>">
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span style="color:#fff;">自动播放</span></div>
						</div>
						<div class="baobao-form-input">
    						<select name="notice_autoplay" id="notice_autoplay" lay-filter="notice_autoplay">
                                <option value="true" <?php echo select('true',$conf['notice_aautoplay']);?>>ON</option>
                                <option value="false" <?php echo select('false',$conf['notice_autoplay']);?>>OFF</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" style="height:auto;">
							<div style="font-weight:bold;"><span style="color:#fff;">动画类型</span></div>
						</div>
						<div class="baobao-form-input">
                            <select name="notice_anim" id="notice_anim" lay-filter="notice_anim">
                                <option value="0" <?php echo select(0,$conf['notice_anim']);?>>左右</option>
                                <option value="1" <?php echo select(1,$conf['notice_anim']);?>>渐隐</option>
                                <option value="2" <?php echo select(2,$conf['notice_anim']);?>>上下</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" style="height:auto;">
							<div style="font-weight:bold;"><span style="color:#fff;">页按键</span></div>
						</div>
    					<div class="baobao-form-input">
                            <select name="notice_indicator" id="notice_indicator" lay-filter="notice_indicator">
                                <option value="0" <?php echo select(0,$conf['notice_indicator']);?>>内部</option>
                                <option value="1" <?php echo select(1,$conf['notice_indicator']);?>>外部</option>
                                <option value="2" <?php echo select(2,$conf['notice_indicator']);?>>隐藏</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" style="height:auto;">
							<div style="font-weight:bold;"><span style="color:#fff;">翻页按键</span></div>
						</div>
    					<div class="baobao-form-input">
                            <select name="notice_arrow" id="notice_arrow" lay-filter="notice_arrow">
                                <option value="0" <?php echo select(0,$conf['notice_arrow']);?>>悬浮</option>
                                <option value="1" <?php echo select(1,$conf['notice_arrow']);?>>一直存在</option>
                                <option value="2" <?php echo select(2,$conf['notice_arrow']);?>>隐藏</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<input class="baobao-button" type="button" id="submit" value="确定">
					</div>
				</form>
				<div class="layui-tab layui-tab-card" style="width:100%;margin-top:10px;margin-bottom:100px;border:none;">
                    <ul class="layui-tab-title" style="background-color:#EE9C66;color:#fff;width:100%;height:auto;max-height:100px;">
                        <li class="layui-this">公告1</li>
                        <li>公告2</li>
                        <li>公告3</li>
                        <li>公告4</li>
                        <li>公告5</li>
                    </ul>
                    <div class="layui-tab-content" style="height:auto;margin:0;padding:0;text-align:center;">
                        <div class="layui-tab-item layui-show">
                            <form class="layui-form" action="">
            				    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;" >
                						<div ><span class="baobao-span">公告1</span></div>
                					</div>
                				</div>
                				<textarea class="baobao-textarea" id="notice_1" name="notice_1"><?php echo $conf['notice_1'];?></textarea>
                				<div class="baobao-line-item">
    								<input class="baobao-button" type="button" id="submit_1" value="确定">
    							</div>
            				</form>
                        </div>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="">
            				    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;" >
                						<div ><span class="baobao-span">公告2</span></div>
                					</div>
                				</div>
                				<textarea class="baobao-textarea" id="notice_2" name="notice_2"><?php echo $conf['notice_2'];?></textarea>
                				<div class="baobao-line-item">
    								<input class="baobao-button" type="button" id="submit_2" value="确定">
    							</div>
            				</form>
                        </div>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="">
            				    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;" >
                						<div ><span class="baobao-span">公告3</span></div>
                					</div>
                				</div>
                				<textarea class="baobao-textarea" id="notice_3" name="notice_3"><?php echo $conf['notice_3'];?></textarea>
                				<div class="baobao-line-item">
    								<input class="baobao-button" type="button" id="submit_3" value="确定">
    							</div>
            				</form>
                        </div>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="">
            				    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;" >
                						<div ><span class="baobao-span">公告4</span></div>
                					</div>
                				</div>
                				<textarea class="baobao-textarea" id="notice_4" name="notice_4"><?php echo $conf['notice_4'];?></textarea>
                				<div class="baobao-line-item">
    								<input class="baobao-button" type="button" id="submit_4" value="确定">
    							</div>
            				</form>
                        </div>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="">
            				    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;" >
                						<div ><span class="baobao-span">公告5</span></div>
                					</div>
                				</div>
                				<textarea class="baobao-textarea" id="notice_5" name="notice_5"><?php echo $conf['notice_5'];?></textarea>
                				<div class="baobao-line-item">
    								<input class="baobao-button" type="button" id="submit_5" value="确定">
    							</div>
            				</form>
                        </div>
                        <div class="baobao-line-in">
						    <lable style="width:100%;font-size:12px;">公告内容是HTML代码并且主体内容必须是在&lt;div&gt;&lt;/div&gt;之间的，面板的背景颜色可以在最外层的div上修改。</lable>
					    </div>
                        <form class="layui-form" action="">
        				    <div class="baobao-line-item">
            					<div class="baobao-form-span"style="width:100%;" >
            						<div ><span class="baobao-span">主页主体部分</span></div>
            					</div>
            				</div>
            				<textarea class="baobao-textarea" style="min-height:300px;max-height:600px;" id="notice_6" name="notice_6" onkeydown="tab(this)"><?php echo $conf['notice_6'];?></textarea>
            				<div class="baobao-line-item">
								<input class="baobao-button" type="button" id="submit_6" value="确定">
							</div>
        				</form>
                    </div>
                </div>
			</div>
		</div>
	</div>
	</body>
<html>