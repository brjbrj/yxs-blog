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

		form div.baobao-form-input
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:65%;
			float:right;
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
		.layui-form
		{
		    margin-top:10px;
		}
        .layui-tab-card>.layui-tab-title .layui-this
		{
		    color:<?php echo $colors["4"];?>;
		    background-color: <?php echo $colors["6"];?>;
		    font-weight: bold;
		}
        .layui-tab
        {
           box-shadow:none;
        }
        
		.baobao-span
		{
		    color:<?php echo $colors["6"];?>;
		}
		.layui-colorpicker
		{
		    border:none;
		}
		.xm-label-block 
		{
		    background-color:#FF5555;
		}
		.layui-form-pane .layui-form-label{
        	display: flex;
        	align-items: center;
        	justify-content: center;
        }
        .layui-table-cell .layui-form-checkbox[lay-skin="primary"]
		{
            top: 50%;
            transform: translateY(-50%);
        }
        .layui-table-tool
        {
            z-index:10;
        }
        .layui-table-fixed
        {
            z-index:10;
        }
        .layui-table-body
        {
             z-index:10;
        }
        .layui-table-main
        {
             z-index:10;
        }
        .layui-table-cell{
            height:50px;
            line-height: 50px;
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
				var edit_height=document.getElementById("edit_height").value;
				var edit_base64=document.getElementById("edit_base64").value;
				var edit_upload=document.getElementById("edit_upload").value;
				var edit_linkimg=document.getElementById("edit_linkimg").value;
				var edit_fontsize=document.getElementById("edit_fontsize").value;
				var edit_lineheight=document.getElementById("edit_lineheight").value;
				var edit_full=document.getElementById("edit_full").value;
				var edit_tool = tool.getValue('valueStr');
				var act="set_edit";
				var method="0";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'edit_height':edit_height,
						'edit_base64':edit_base64,
						'edit_upload':edit_upload,
						'edit_linkimg':edit_linkimg,
						'edit_tool':edit_tool,
						'edit_fontsize':edit_fontsize,
						'edit_lineheight':edit_lineheight,
						'edit_full':edit_full,
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
				var edit_color=document.getElementById("edit_color").value;
				var act="set_edit";
				var method="1";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'edit_color':edit_color,
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
				
				var act="set_edit";
				var method="2";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
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
			$("#submit_3").click(function()
			{
			    var index = layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
				var edit_val2=document.getElementById("edit_val2").value;
				var edit_EA2=document.getElementById("edit_EA2").value;
				var edit_type2=document.getElementById("edit_type2").value;
				var act="set_edit";
				var method="3";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'edit_val2':edit_val2,
						'edit_EA2':edit_EA2,
						'edit_type2':edit_type2,
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
				var edit_val=document.getElementById("edit_val").value;
				var edit_EA=document.getElementById("edit_EA").value;
				var edit_type=document.getElementById("edit_type").value;
				var act="set_edit";
				var method="4";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'edit_val':edit_val,
						'edit_EA':edit_EA,
						'edit_type':edit_type,
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
				var edit_imgurl=document.getElementById("edit_imgurl").value;
				var edit_imgalt=document.getElementById("edit_imgalt").value;
				var act="set_edit";
				var method="5";
				$.ajax({  
					type: "POST",   //提交的方法
					url:"./ajax.php", //提交的地址  
					data:
					{
						'method':method,
						'act':act,
						'edit_imgurl':edit_imgurl,
						'edit_imgalt':edit_imgalt,
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
            				<span style="font-weight:bold;" class="iconfont icon-set"></span>
            			</div>
            			<div style="float:left;">
            				<span style="font-weight:bold;" >编辑器设置</span>
            			</div>
        			</div>
        		</div>
				<form class="layui-form" action="" style="margin-top:10px;">
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>编辑器高</span></div>
						</div>
						<div class="baobao-form-input">
    						<input class="baobao-input" id="edit_height" type="text" value="<?php echo $conf['edit_height'];?>">
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>工具栏设置</span></div>
						</div>
						<div class="baobao-form-input">
						    <div id="tool" class="xm-select-demo" style="width:100%;height:100%;"></div>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>支持的字号</span></div>
						</div>
						<div class="baobao-form-input">
    						<input class="baobao-input" id="edit_fontsize" type="text" value="<?php echo $conf['edit_fontsize'];?>">
    					</div>
					</div>
					<div class="baobao-line-in">
					    <lable style="width:100%;font-size:12px;">字号用英文下的单引号包起来，字号间用英文下的逗号隔开，例如'12px','20px'</lable>
				    </div>
				    <div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>支持的行高</span></div>
						</div>
						<div class="baobao-form-input">
    						<input class="baobao-input" id="edit_lineheight" type="text" value="<?php echo $conf['edit_lineheight'];?>">
    					</div>
					</div>
					<div class="baobao-line-in">
					    <lable style="width:100%;font-size:12px;">行高用英文下的单引号包起来，行高间用英文下的逗号隔开，例如'1','1.15','1.6', '2','2.5','3'</lable>
				    </div>
				    <div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>全屏功能</span></div>
						</div>
						<div class="baobao-form-input">
						    <select name="edit_full" id="edit_full" lay-filter="edit_full">
                                <option value="true" <?php echo select('true',$conf['edit_full']);?>>打开</option>
                                <option value="false" <?php echo select('false',$conf['edit_full']);?>>关闭</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>base64保存图片</span></div>
						</div>
						<div class="baobao-form-input">
						    <select name="edit_base64" id="edit_base64" lay-filter="edit_base64">
                                <option value="true" <?php echo select('true',$conf['edit_base64']);?>>打开</option>
                                <option value="false" <?php echo select('false',$conf['edit_base64']);?>>关闭</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>上传图片到本地</span></div>
						</div>
						<div class="baobao-form-input">
						    <select name="edit_upload" id="edit_upload" lay-filter="edit_upload">
                                <option value="true" <?php echo select('true',$conf['edit_upload']);?>>打开</option>
                                <option value="false" <?php echo select('false',$conf['edit_upload']);?>>关闭</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>网络图片</span></div>
						</div>
						<div class="baobao-form-input">
						    <select name="edit_linkimg" id="edit_linkimg" lay-filter="edit_linkimg">
                                <option value="true" <?php echo select('true',$conf['edit_linkimg']);?>>打开</option>
                                <option value="false" <?php echo select('false',$conf['edit_linkimg']);?>>关闭</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>网络视频</span></div>
						</div>
						<div class="baobao-form-input">
						    <select name="edit_linkvideo" id="edit_linkvideo" lay-filter="edit_linkvideo">
                                <option value="true" <?php echo select('true',$conf['edit_linkvideo']);?>>打开</option>
                                <option value="false" <?php echo select('false',$conf['edit_linkvideo']);?>>关闭</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>网络视频</span></div>
						</div>
						<div class="baobao-form-input">
						    <select name="edit_linkvideo" id="edit_linkvideo" lay-filter="edit_linkvideo">
                                <option value="true" <?php echo select('true',$conf['edit_linkvideo']);?>>打开</option>
                                <option value="false" <?php echo select('false',$conf['edit_linkvideo']);?>>关闭</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>本地视频</span></div>
						</div>
						<div class="baobao-form-input">
						    <select name="edit_localvideo" id="edit_localvideo" lay-filter="edit_localvideo">
                                <option value="true" <?php echo select('true',$conf['edit_localvideo']);?>>打开</option>
                                <option value="false" <?php echo select('false',$conf['edit_localvideo']);?>>关闭</option>
                            </select>
    					</div>
					</div>
					<div class="baobao-line-in">
						<input class="baobao-button" type="button" id="submit" value="确定">
					</div>
				</form>
				<div class="layui-tab layui-tab-card" style="width:100%;margin-top:10px;margin-bottom:100px;border:none;">
                    <ul class="layui-tab-title" style="background-color:<?php echo $colors['4'];?>;color:<?php echo $colors['6'];?>;width:100%;height:auto;max-height:100px;">
                        <li class="layui-this">颜色&表情</li>
                        <li>字号&代码高亮</li>
                        <?php if($conf['edit_localvideo']=="true"){ ?>
                        <li>视频配置</li>
                        <?php }?>
                        <?php if($conf['edit_upload']=="true"){ ?>
                        <li>本地图片</li>
                        <?php }?>
                        <?php if($conf['edit_linkimg']=="true"){ ?>
                        <li>网络图片</li>
                        <?php }?>
                    </ul>
                    <div class="layui-tab-content" style="height:auto;margin:0;padding:0;text-align:center;">
                        <div class="layui-tab-item layui-show">
                            <form class="layui-form" action="">
            				    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;" >
                						<div>
                						    <span class="baobao-span">颜色</span>
                						    <div class="layui-inline" style="margin-left: 20px;">
                                                <div id="color"></div>
                                            </div>
                                        </div>
                					</div>
                				</div>
                				<textarea class="baobao-textarea" id="edit_color" name="edit_color"><?php echo $conf['edit_color'];?></textarea>
                				<div class="baobao-line-in">
        						    <lable style="width:100%;font-size:12px;">颜色用英文下的单引号包起来，颜色间用英文下的逗号隔开，例如'#ffffff','#000000'</lable>
        					    </div>
        					    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;height:40px;" >
                						<div ><span class="baobao-span">表情</span></div>
                					</div>
                				</div>
                				<div style="margin-top:40px;">
                	                <table class="layui-hide" id="demo" lay-filter="demo"></table>
                	            </div>
                				<div class="baobao-line-item">
    								<input class="baobao-button" type="button" id="submit_1" value="确定">
    							</div>
            				</form>
                        </div>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="">
            				    <div class="baobao-line-item">
                					<div class="baobao-form-span"style="width:100%;" >
                						<div ><span class="baobao-span">字号</span></div>
                					</div>
                				</div>
                				<div class="baobao-line-item">
    								<input class="baobao-button" type="button" id="submit_2" value="确定">
    							</div>
            				</form>
                        </div>
                        <?php if($conf['edit_localvideo']=="true"){ ?>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="" style="margin-top:10px;">
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>大小数值</span></div>
            						</div>
            						<div class="baobao-form-input">
                						<input class="baobao-input" id="edit_val2" type="text" value="<?php echo $conf['edit_val2'];?>">
                					</div>
            					</div>
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>大小单位</span></div>
            						</div>
            						<div class="baobao-form-input">
            						    <select name="edit_EA2" id="edit_EA2" lay-filter="edit_EA2">
                                            <option value="KB" <?php echo select('KB',$conf['edit_EA2']);?>>KB</option>
                                            <option value="MB" <?php echo select('MB',$conf['edit_EA2']);?>>MB</option>
                                        </select>
                					</div>
            					</div>
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>视频类型</span></div>
            						</div>
            						<div class="baobao-form-input">
                						<input class="baobao-input" id="edit_type2" type="text" value="<?php echo $conf['edit_type2'];?>">
                					</div>
            					</div>
            					<div class="baobao-line-in">
        						    <lable style="width:100%;font-size:12px;">支持上传的视频类型，用英文下的单引号描述支持上传的文件后缀(小写)，两个后缀间用英文下的逗号隔开例如：'mp4',留空表示不限制</lable>
        					    </div>
            					<div class="baobao-line-in">
            						<input class="baobao-button" type="button" id="submit_3" value="确定">
            					</div>
            				</form>
                        </div>
                        <?php }?>
                        <?php if($conf['edit_upload']=="true"){ ?>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="" style="margin-top:10px;">
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>大小数值</span></div>
            						</div>
            						<div class="baobao-form-input">
                						<input class="baobao-input" id="edit_val" type="text" value="<?php echo $conf['edit_val'];?>">
                					</div>
            					</div>
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>大小单位</span></div>
            						</div>
            						<div class="baobao-form-input">
            						    <select name="edit_EA" id="edit_EA" lay-filter="edit_EA">
                                            <option value="KB" <?php echo select('KB',$conf['edit_EA']);?>>KB</option>
                                            <option value="MB" <?php echo select('MB',$conf['edit_EA']);?>>MB</option>
                                        </select>
                					</div>
            					</div>
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>图片类型</span></div>
            						</div>
            						<div class="baobao-form-input">
                						<input class="baobao-input" id="edit_type" type="text" value="<?php echo $conf['edit_type'];?>">
                					</div>
            					</div>
            					<div class="baobao-line-in">
        						    <lable style="width:100%;font-size:12px;">支持上传的图片类型，用英文下的单引号描述支持上传的文件后缀(小写)，两个后缀间用英文下的逗号隔开例如：'jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'，留空表示不限制</lable>
        					    </div>
            					<div class="baobao-line-in">
            						<input class="baobao-button" type="button" id="submit_4" value="确定">
            					</div>
            				</form>
                        </div>
                        <?php }?>
                        <?php if($conf['edit_linkimg']=="true"){ ?>
                        <div class="layui-tab-item">
                            <form class="layui-form" action="" style="margin-top:10px;">
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>图片Alt</span></div>
            						</div>
            						<div class="baobao-form-input">
                						<select name="edit_imgalt" id="edit_imgalt" lay-filter="edit_imgalt">
                                            <option value="false" <?php echo select('false',$conf['edit_imgalt']);?>>关闭</option>
                                            <option value="true" <?php echo select('true',$conf['edit_imgalt']);?>>打开</option>
                                        </select>
                					</div>
            					</div>
            					<div class="baobao-line-in">
            						<div class="baobao-form-span" >
            							<div style="font-weight:bold;"><span>图片链接</span></div>
            						</div>
            						<div class="baobao-form-input">
                						<select name="edit_imgurl" id="edit_imgurl" lay-filter="edit_imgurl">
                                            <option value="false" <?php echo select('false',$conf['edit_imgurl']);?>>关闭</option>
                                            <option value="true" <?php echo select('true',$conf['edit_imgurl']);?>>打开</option>
                                        </select>
                					</div>
            					</div>
            					<div class="baobao-line-in">
            						<input class="baobao-button" type="button" id="submit_5" value="确定">
            					</div>
            				</form>
                        </div>
                        <?php }?>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<script>
	layui.use('colorpicker', function(){
      var $ = layui.$
      ,colorpicker = layui.colorpicker;
    	colorpicker.render({
            elem: '#color'
            ,color: '#ffffff'
        });
	});
	</script>
	<script>
        var tool = xmSelect.render({
        	el: '#tool',
        	toolbar: {
        		show: true,
        	},
        	paging: true,
        	pageSize: 5,
        	data: [
        		{name: '标题', value: "'head'",<?php echo isselect2(true,strpos($conf['edit_tool'],'head'));?>},
        		{name: '粗体', value: "'bold'",<?php echo isselect2(true,strpos($conf['edit_tool'],'bold'));?>},
        		{name: '字号', value: "'fontSize'",<?php echo isselect2(true,strpos($conf['edit_tool'],'fontSize'));?>},
        		{name: '字体', value: "'fontName'",<?php echo isselect2(true,strpos($conf['edit_tool'],'fontName'));?>},
        		{name: '斜体', value: "'italic'",<?php echo isselect2(true,strpos($conf['edit_tool'],'italic'));?>},
        		{name: '下划线', value: "'underline'",<?php echo isselect2(true,strpos($conf['edit_tool'],'underline'));?>},
        		{name: '缩进', value: "'indent'",<?php echo isselect2(true,strpos($conf['edit_tool'],'indent'));?>},
        		{name: '行高', value: "'lineHeight'",<?php echo isselect2(true,strpos($conf['edit_tool'],'lineHeight'));?>},
        		{name: '分割线', value: "'splitLine'",<?php echo isselect2(true,strpos($conf['edit_tool'],'splitLine'));?>},
        		{name: '删除线', value: "'strikeThrough'",<?php echo isselect2(true,strpos($conf['edit_tool'],'strikeThrough'));?>},
        		{name: '文字颜色', value: "'foreColor'",<?php echo isselect2(true,strpos($conf['edit_tool'],'foreColor'));?>},
        		{name: '背景颜色', value: "'backColor'",<?php echo isselect2(true,strpos($conf['edit_tool'],'backColor'));?>},
        		{name: '插入链接', value: "'link'",<?php echo isselect2(true,strpos($conf['edit_tool'],'link'));?>},
        		{name: '列表', value: "'list'",<?php echo isselect2(true,strpos($conf['edit_tool'],'list'));?>},
        		{name: '对齐方式', value: "'justify'",<?php echo isselect2(true,strpos($conf['edit_tool'],'justify'));?>},
        		{name: '引用', value: "'quote'",<?php echo isselect2(true,strpos($conf['edit_tool'],'quote'));?>},
        		{name: '表情', value: "'emoticon'",<?php echo isselect2(true,strpos($conf['edit_tool'],'emoticon'));?>},
        		{name: '插入图片', value: "'image'",<?php echo isselect2(true,strpos($conf['edit_tool'],'image'));?>},
        		{name: '表格', value: "'table'",<?php echo isselect2(true,strpos($conf['edit_tool'],'table'));?>},
        		{name: '插入视频', value: "'video'",<?php echo isselect2(true,strpos($conf['edit_tool'],'video'));?>},
        		{name: '插入代码', value: "'code'",<?php echo isselect2(true,strpos($conf['edit_tool'],'code'));?>},
        		{name: '待办事项', value: "'todo'",<?php echo isselect2(true,strpos($conf['edit_tool'],'todo'));?>},
        		{name: '撤销', value: "'undo'",<?php echo isselect2(true,strpos($conf['edit_tool'],'undo'));?>},
        		{name: '重复', value: "'redo'",<?php echo isselect2(true,strpos($conf['edit_tool'],'redo'));?>},
        	]
        })
    </script>
    <script>
	    layui.use('table', function(){
            //监听表格复选框选择
            var table = layui.table;
            table.on('checkbox(demo)', function(obj){
                console.log(obj)
            });
            //温馨提示：默认由前端自动合计当前行数据。从 layui 2.5.6 开始： 若接口直接返回了合计行数据，则优先读取接口合计行数据。
            //详见：https://www.layui.com/doc/modules/table.html#totalRow
            var tableIns=table.render({
                elem: '#demo'
                ,url:'./data.php?act=emoji'
                ,toolbar: '#toolbarDemo'
                ,cellMinWidth: 80
                ,cellMinHeight: 100
                ,title: '表情数据表'
                ,id: 'emojilist'
                ,totalRow: false
                ,loading:false
                ,cols: [[
                  {type: 'checkbox', fixed: 'left'}
                  ,{field:'id', title:'ID', unresize: true, sort: true,width:70,}
                  ,{field:'title', title:'分组名',edit: 'text', unresize: true, sort: true,width:120,}
                  ,{field:'state', title:'状态',  templet: '#state',sort: true,style:'text-align:center;'}
                  ,{field:'alt', title:'alt',edit: 'text',sort: true,width:100}
                  ,{field:'url', title:'图片链接',edit: 'text',sort: true,width:150}
                  ,{field:'view', title:'预览',templet: '#show',sort:false,width:150,style:'text-align:center;'}
                  ,{title:'操作', toolbar: '#barDemo',width:200}
                ]]
                ,page: true
                ,limits: [5,20,15,20]  //一页选择显示3,5或10条数据
                ,limit: 5  //一页显示10条数据
                ,done:function (res) {   //返回数据执行回调函数
                    layer.close(loading);    //返回数据关闭loading
                }
                ,parseData: function(res){ //将原始数据解析成 table 组件所规定的数据，res为从url中get到的数据
                    var result;
                    console.log(this);
                    console.log(JSON.stringify(res));
                    var loading = layer.load(1, {
                        shade: false,
                    });
                    if(this.page.curr){
                        result = res.data.slice(this.limit*(this.page.curr-1),this.limit*this.page.curr);
                    }
                    else{
                        result=res.data.slice(0,this.limit);
                    }
                    layer.close(loading);
                    return {
                        "code": res.code, //解析接口状态
                        "msg": res.msg, //解析提示文本
                        "count": res.count, //解析数据长度
                        "data": result,//解析数据列表
                    };
                }
            });
          //工具栏事件
            table.on('toolbar(demo)', function(obj){
                switch(obj.event){
                    case 'fresh':
                        layer.msg("刷新成功",{icon:1});
                        table.reload('emojilist', {
                            page: {
                                curr: 1 //重新从第 1 页开始
                            }
                        });
                    break;
                    case 'add':
                        layer.open({
                          type: 1,
                          skin: 'layui-layer-rim', //加上边框
                          area: ['80%', '400px'], //宽高
                          offset: ['10%', '10%'],
                          fixed:false,
                          zIndex:10,
                          move:false,
                          content:'<style>.baobao-button\n{\nheight:40px;\nwidth:100%;\nborder:none;\noutline:none;\nbackground:<?php echo $colors["13"];?>;\nborder-radius:3px 3px 3px 3px;\ncolor:<?php echo $colors["14"];?>;\nfont-weight:bold;\nfont-size:15px;\n}\n.baobao-button:hover\n{\nbackground:<?php echo $colors["15"];?>;\ncursor:pointer;\ncolor:<?php echo $colors["16"];?>;\ntransition:all .5s;\n}</style><meta name="viewport" content="width=device-width, initial-scale=1.0"><script type="text/javascript" src="./upload.js"><\/script><form class="layui-form" action=""><div class="layui-form-item"><label class="layui-form-label">分组名</label><div class="layui-input-block"><input type="text" name="title" id="emoji_title" lay-verify="title" autocomplete="off" placeholder="请输入分组名" style="width:80%;" class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">表情名称</label><div class="layui-input-block"><input type="text" name="alt" lay-verify="title" id="emoji_alt" autocomplete="off" placeholder="请输入表情名称" style="width:80%;" class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">URL</label><div class="layui-input-block"><input type="text" name="alt" lay-verify="title" id="emoji_url" autocomplete="off" placeholder="URL" style="width:80%;" class="layui-input"></div></div><div class="baobao-line-item"><input class="baobao-button" type="button"style="width:80%;margin-left:50%;transform: translate(-50%,0);" id="submit_emoji" value="确定"></div></form><div style="margin-left:50%;transform: translate(-50%,0);margin-top:10px;"><div class="layui-upload"><button type="button" class="layui-btn" id="test1">上传图片</button><div class="layui-upload-list"><img style="max-width:50%;" class="layui-upload-img" id="demo1"><p id="demoText"></p></div><div style="width: 95px;"><div class="layui-progress layui-progress-big" lay-showpercent="yes" lay-filter="demo"><div class="layui-progress-bar" lay-percent=""></div></div></div></div></div>',
                          title:'添加表情'
                        });
                    break;
                };
            });
            table.on('tool(demo)', function (obj) {
                var event = obj.event;
                if ("changestate" == event) {
                    var item = obj.data;
                    // 根据当前状态确定下一个状态，这样来模拟依次变化身份。
                    if (item.state == "0")
                    {
                        var index = layer.load(1, {
                            shade: [0.1,'#fff'] //0.1透明度的白色背景
                        });
                        var act="emojiedit";
                        var method="2";
                        $.ajax({  
            				type: "POST",   //提交的方法
            				url:"./ajax.php", //提交的地址  
            				data:
            				{
            					'id':item.id,
            					'act':act,
            					'method':method
            				},// 序列化表单值  
            				dataType : 'json',
            				success:function(data) 
            				{
            				    layer.closeAll('loading');
            					if(data==1)
            					{
            					    item.state = "1";
            					    obj.update(item);
            					    layer.msg('修改成功', {icon: 1,time:1000,shade:0.4});
            					}
            					else if(data==0)
            					{
            						layer.msg('修改失败', {icon: 2,time:1000,shade:0.4});
            					}
            				}
            			});
                    }
                    else if (item.state == "1")
                    {
                        var index = layer.load(1, {
                            shade: [0.1,'#fff'] //0.1透明度的白色背景
                        });
                        var act="emojiedit";
                        var method="1";
                        $.ajax({  
            				type: "POST",   //提交的方法
            				url:"./ajax.php", //提交的地址  
            				data:
            				{
            					'id':item.id,
            					'act':act,
            					'method':method
            				},// 序列化表单值  
            				dataType : 'json',
            				success:function(data) 
            				{
            				    layer.closeAll('loading');
            					if(data==1)
            					{
            					    layer.msg('修改成功', {icon: 1,time:1000,shade:0.4});
            					    item.state = "0";
            					    obj.update(item);
            					}
            					else if(data==0)
            					{
            						layer.msg('修改失败', {icon: 2,time:1000,shade:0.4});
            					}
            				}
            			});
                    }
                    // 更新改变用户身份。
                }
                else if(obj.event === 'edit')
                {
                    var item = obj.data;
                    layer.open({
                        type: 1,
                        skin: 'layui-layer-rim', //加上边框
                        area: ['80%', '400px'], //宽高
                        offset: ['10%', '10%'],
                        fixed:false,
                        zIndex:10,
                        move:false,
                        content:'<style>.baobao-button\n{\nheight:40px;\nwidth:100%;\nborder:none;\noutline:none;\nbackground:<?php echo $colors["13"];?>;\nborder-radius:3px 3px 3px 3px;\ncolor:<?php echo $colors["14"];?>;\nfont-weight:bold;\nfont-size:15px;\n}\n.baobao-button:hover\n{\nbackground:<?php echo $colors["15"];?>;\ncursor:pointer;\ncolor:<?php echo $colors["16"];?>;\ntransition:all .5s;\n}</style><meta name="viewport" content="width=device-width, initial-scale=1.0"><script type="text/javascript" src="./upload.js"><\/script><form class="layui-form" action=""><div class="layui-form-item"><label class="layui-form-label">分组名</label><div class="layui-input-block"><input id="emoji_id" style="display:none;" value="'+item.id+'"><input type="text" name="title" id="emoji_title" value="'+item.title+'" lay-verify="title" autocomplete="off" placeholder="请输入分组名" style="width:80%;" class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">表情名称</label><div class="layui-input-block"><input type="text" name="alt" lay-verify="title" id="emoji_alt" autocomplete="off" placeholder="请输入表情名称" value="'+item.alt+'" style="width:80%;" class="layui-input"></div></div><div class="layui-form-item"><label class="layui-form-label">URL</label><div class="layui-input-block"><input type="text" name="url" lay-verify="title" id="emoji_url" autocomplete="off" placeholder="URL" style="width:80%;" value="'+item.url+'" class="layui-input"></div></div><div class="baobao-line-item"><input class="baobao-button" type="button"style="width:80%;margin-left:50%;transform: translate(-50%,0);" id="upload_emoji" value="确定"></div></form><div style="margin-left:50%;transform: translate(-50%,0);margin-top:10px;"><div class="layui-upload"><button type="button" class="layui-btn" id="test1">重新上传图片</button><div class="layui-upload-list"><img style="max-width:50%;" class="layui-upload-img" id="demo1" src="'+item.url+'"><p id="demoText"></p></div><div style="width: 95px;"><div class="layui-progress layui-progress-big" lay-showpercent="yes" lay-filter="demo"><div class="layui-progress-bar" lay-percent=""></div></div></div></div></div>',
                        title:'修改表情'
                    });
                }
                else if(obj.event === 'del')
                {
                    var item = obj.data;
                    layer.confirm('真的删除行么', function(index){
                        //后台数据给入
                        var index = layer.load(1, {
                            shade: [0.1,'#fff'] //0.1透明度的白色背景
                        });
                        var act="emojiedit";
                        var method="4";
                        $.ajax({
                            type: "POST",   //提交的方法
            				url:"./ajax.php", //提交的地址  
            				data:
            				{
            					'id':item.id,
            					'act':act,
            					'method':method
            				},// 序列化表单值  
            				dataType : 'json',
                            success:function(data){
                                if(data==1){
                                    obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
                                    layer.close(index);
                                    console.log(index);
                                    layer.msg("删除成功",{icon:1});
                                }
                                else
                                {
                                    layer.msg("删除失败",{icon:5});
                                }
                            }
                        });
                        layer.close(index);
                    });    
                }
                else if(obj.event === 'scan')
                {
                    var item = obj.data;
                    var index = layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
                    var url="../blog.php?id="+item.id;
                    layer.closeAll('loading');
                    window.open(url);
                }
            });
            // var $ = layui.$, active = {
            //     reload: function(){
            //         var demoReload = $('#demoReload');
            //         //执行重载
            //         var value=demoReload.val();
            //         var field="id";
            //         var act="useredit";
            //         var method="6";
            //         $.ajax({
            //             url:'ajax.php',
            //             type:'post',
            //             data:
            //             {
            //                 'field':field,
            //                 'value':value,
            //                 'method':method,
            //                 'act':act,
            //             },//向服务端发送删除的id
            //             success:function(data){
            //                 if(data==1){
            //                     layer.msg("查询成功",{icon:1});
            //                     table.reload('articlelist', {
            //                         page: {
            //                             curr: 1 //重新从第 1 页开始
            //                         }
            //                     });
            //                 }
            //                 else{
            //                     layer.msg("查询失败",{icon:5});
            //                 }
            //             }
            //         });
            //     }
            // };
            layui.use(['table', 'util'], function(){
                var table = layui.table
                ,util = layui.util;
                //监听单元格编辑
                table.on('edit(demo)', function(obj){
                    var value = obj.value //得到修改后的值
                    var act="emojiedit"
                    ,data = obj.data //得到所在行所有键值
                    ,field = obj.field; //得到字段
                    var method="3";
                    if(data.id)
                    {
                        layer.confirm('更改是否保存', function(index){
                        //后台数据给入
                            $.ajax({
                                url:'ajax.php',
                                type:'post',
                                data:
                                {
                                    'field':field,
                                    'value':value,
                                    'method':method,
                                    'act':act,
                                    'id':data.id
                                },//向服务端发送删除的id
                                success:function(data){
                                    if(data==1){
                                        layer.close(index);
                                        console.log(index);
                                        layer.msg("修改成功",{icon:1});
                                    }
                                    else{
                                        layer.msg("修改失败",{icon:5});
                                    }
                                }
                            });
                        layer.close(index);
                      });
                    }
                    //layer.msg('[ID: '+ data.id +'] ' + field + ' 字段更改值为：'+ util.escape(value));
                });
            });
            $('body').on('click','.demoTable .layui-btn',function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
        });
	</script>
	<script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">上传</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
	<script id="state" type="text/html">
        {{# if(d.state === "1"){ }}
            <a class="layui-btn layui-btn-xs" lay-event="changestate" style="margin-top: 50%;transform: translateY(-50%);">启用</a>
        {{# } else if (d.state === "0") { }}
            <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="changestate" style="margin-top: 50%;transform: translateY(-50%);">禁用</a>
        {{# } }}
    </script>
    <script id="show" type="text/html">
            <img src={{d.url}} height="50"/>
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="demoTable">
            <div style="display:none;">搜索ID：
            <div class="layui-inline">
                <input class="layui-input" name="id" id="demoReload" autocomplete="off">
            </div>
            <button class="layui-btn" data-type="reload">搜索</button></div>
            <button class="layui-btn layui-btn-normal layui-btn-sm" style="float:left;" lay-event="fresh">刷新</button>
            <input id="btn_add" type="button" value="添加" style="float:left;" class="layui-btn layui-btn-sm" lay-event="add" />
        </div>
    </script>
	</body>
<html>