layui.use(['upload', 'element', 'layer'], function(){
  var $ = layui.jquery
  ,upload = layui.upload
  ,element = layui.element
  ,layer = layui.layer;
  
  //常规使用 - 普通图片上传
  var uploadInst = upload.render({
    elem: '#test1'
    ,url: './upload.php?type=img' //此处用的是第三方的 http 请求演示，实际使用时改成您自己的上传接口即可。
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo1').attr('src', result); //图片链接（base64）
      });
      
      element.progress('demo', '0%'); //进度条复位
      layer.msg('上传中', {icon: 16, time: 0});
    }
    ,done: function(res){
      //如果上传失败
      if(res.errno != 0){
        return layer.msg('上传失败');
      }
      //上传成功的一些操作
      document.getElementById("emoji_url").value=res.url;
      //……
      $('#demoText').html(''); //置空上传失败的状态
    }
    ,error: function(){
      //演示失败状态，并实现重传
      var demoText = $('#demoText');
      demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
      demoText.find('.demo-reload').on('click', function(){
        uploadInst.upload();
      });
    }
    //进度条
    ,progress: function(n, elem, e){
      element.progress('demo', n + '%'); //可配合 layui 进度条元素使用
      if(n == 100){
        layer.msg('上传完毕', {icon: 1});
      }
    }
  });
});
$(document).ready(function()
{
	$("#submit_emoji").click(function()
	{
		var emoji_title=document.getElementById("emoji_title").value;
		var emoji_url=document.getElementById("emoji_url").value;
		var emoji_alt=document.getElementById("emoji_alt").value;
		var act="set_edit";
		var method="6";
		if(emoji_title=="")
		{
		    layer.msg("请输入组名");
		}
		else if(emoji_url=="")
		{
		    layer.msg("请输入url");
		}
		else
		{
		    var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
    		$.ajax({  
    			type: "POST",   //提交的方法
    			url:"./ajax.php", //提交的地址  
    			data:
    			{
    				'method':method,
    				'act':act,
    				'emoji_alt':emoji_alt,
    				'emoji_url':emoji_url,
    				'emoji_title':emoji_title,
    			},// 序列化表单值  
    			dataType : 'json',
    			success:function(data) 
    			{
    			    layer.closeAll('loading');
    				if(data==1)
    				{
    					layer.msg('添加成功', {icon: 1,time:1000,shade:0.4});
    					document.getElementById("emoji_alt").value="";
    					document.getElementById("emoji_title").value="";
    					document.getElementById("emoji_url").value="";
    				}
    				else if(data==0)
    				{
    					layer.msg('添加失败，未知错误', {icon: 2,time:1000,shade:0.4});
    				}
    			}
    		});
		}
	});
	$("#upload_emoji").click(function()
	{
		var emoji_title=document.getElementById("emoji_title").value;
		var emoji_url=document.getElementById("emoji_url").value;
		var emoji_alt=document.getElementById("emoji_alt").value;
		var emoji_id=document.getElementById("emoji_id").value;
		var act="set_edit";
		var method="7";
		if(emoji_title=="")
		{
		    layer.msg("请输入组名");
		}
		else if(emoji_url=="")
		{
		    layer.msg("请输入url");
		}
		else
		{
		    var index = layer.load(1, {
                shade: [0.1,'#fff'] //0.1透明度的白色背景
            });
    		$.ajax({  
    			type: "POST",   //提交的方法
    			url:"./ajax.php", //提交的地址  
    			data:
    			{
    				'method':method,
    				'act':act,
    				'emoji_alt':emoji_alt,
    				'emoji_url':emoji_url,
    				'emoji_title':emoji_title,
    				'emoji_id':emoji_id,
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
		}
	});
});