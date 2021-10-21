<?php
	session_start();
	if(!isset($_SESSION['adminlogin']))$_SESSION['adminlogin']=0;
	if($_SESSION['adminlogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您未登录！');window.location.href='login.php';</script>");
	}
	include"../include/common.php";
	$act="color";
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
		form.baobao-line
		{
			width:100%;
			margin-top:10px;
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
		}
		.layui-form
		{
		    font-weight: 400;
		}
		.layui-table-cell{
            height:30px;
            line-height: 30px;
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
	</style>
	<div class="baobao-pannel baobao-run">
		<div class="baobao-pannel-body">
			<div class="baobao-width-406080" style="margin:0 auto;">
				<div class="baobao-title" style="border-radius:3px;font-weight:bold;user-select:none">
					<?php
					    $mod=(isset($_GET['mod']))?$_GET['mod']:"";
					    if($mod=="admin")
					    {
					        echo "admin";
					    }
					    else
					    {
					        echo "user";
					    }
					?>
				<div>
				<form class="baobao-form">
					<div class="baobao-line">
						<div style="margin-top:0;">
        	                <table class="layui-hide" id="demo" lay-filter="demo"></table>
        	            </div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
	    layui.use('table', function(){
            //监听表格复选框选择
            var table = layui.table;
            table.on('checkbox(demo)', function(obj){
                console.log(obj)
            });
            var tableIns=table.render({
                elem: '#demo'
                ,url:'./data.php?act='+<?php if($mod=="admin")echo "'admin'";else echo "'user'";?>+'color'
                ,toolbar: '#toolbarDemo'
                ,cellMinWidth: 80
                ,cellMinHeight: 50
                ,title: '颜色数据表'
                ,id: 'colorlist'
                ,totalRow: false
                ,loading:false
                ,cols: [[
                    {field:'id', title:'ID', unresize: true, sort: true,width:70,}
                  ,{field:'title', title:'对象', sort: true}
                  ,{field:'color', title:'颜色', templet: '#color',unresize: true,sort: true,width:100,}
                  ,{title:'操作', toolbar: '#barDemo',unresize: true,width:100}
                ]]
                ,page: true
                ,limits: [5,10,15,20]  //一页选择显示3,5或10条数据
                ,limit: 10  //一页显示10条数据
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
            table.on('tool(demo)', function (obj) {
                if(obj.event === 'edit')
                {
                    var item = obj.data;
                    layer.open({
                        type: 1,
                        skin: 'layui-layer-rim', //加上边框
                        area: ['200px', '200px'], //宽高
                       
                        fixed:false,
                        zIndex:10,
                        move:false,
                        content:'<meta name="viewport" content="width=device-width, initial-scale=1.0"><script type="text/javascript">layui.use("colorpicker", function(){\nvar $ = layui.$\n,colorpicker = layui.colorpicker;\ncolorpicker.render({\nelem: "#colorc"\n,color: "'+item.color+'"\n,done: function(color){\n$("#color_value").val(color);\n}\n});\n});\n$("#submit_color").click(function()\n{\nvar color_id=document.getElementById("color_id").value;\nvar color_value=document.getElementById("color_value").value;\nvar act="color";\nvar index = layer.load(1, {\nshade: [0.1,"#fff"]\n});\n$.ajax({  \ntype: "POST",\nurl:"./ajax.php",\ndata:\n{\n"act":act,\n"color_id":color_id,\n"color_value":color_value,\n}, \ndataType : "json",\nsuccess:function(data) \n{\nlayer.closeAll("loading");\nif(data==1)\n{\nlayer.closeAll("page");\nlayer.msg("修改成功", {icon: 1,time:1000,shade:0.4});\nlayui.table.reload("colorlist", {\npage: {\ncurr: 1\n}\n});\n}\nelse if(data==0)\n{\nlayer.msg("修改失败，未知错误", {icon: 2,time:1000,shade:0.4});\n}\n}\n});\n});\n<\/script><form class="layui-form" style="overflow-x:hidden;" action=""><div id="colorc" style="margin-left:50%;margin-top:20px;transform: translate(-50%,0);"></div><div class="layui-form-item"><input id="color_id" style="display:none;" value="'+item.id+'"><input id="color_value" style="display:none;" value="'+item.color+'"><input class="baobao-button" type="button"style="width:80%;margin-top:30px;margin-left:50%;transform: translate(-50%,0);" id="submit_color" value="确定"></div></form>',
                        title:'修改表情'
                    });
                }
            });
            $('body').on('click','.demoTable .layui-btn',function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
        });
	</script>
	<script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit" style="margin-top:5px;">上传</a>
    </script>
    <script id="color" type="text/html">
            <div style="height:30px;width:30px;background-color:{{d.color}};border-radius:100%;">
            </div>
    </script>
	</body>
<html>