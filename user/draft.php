<?php
	session_start();
	if(!isset($_SESSION['islogin']))$_SESSION['islogin']=0;
	if($_SESSION['islogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您未登录！');window.location.href='login.php';</script>");
	}
	include"../include/common.php";
	$act="article";
?>
<html lang="zh">
<?php
	include_once"./head2.php";
?>
	<style>
		@media screen and (min-width: 992px)
		{
			.user-baobao-width-406080
			{
				width:40%;
			}
		}
		@media screen and (min-width: 768px)
		{
			.user-baobao-width-406080
			{
				width:60%;
			}
		}
		@media screen and (max-width: 768px)
		{
			.user-baobao-width-406080
			{
				width:80%;
			}
		}
		.user-baobao-title
		{
			width:100%;
			margin-top:40px;
			background:#fff;
			height:40px;
			line-height:40px;
			border:none;
		}
		.user-baobao-form
		{
			width:100%;
			padding-top:10px;
		}
		form.user-baobao-line
		{
			width:100%;
			margin-top:10px;
		}
		form div.user-baobao-form-span
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:35%;
			background:red;
			user-select:none;
			float:left;
			overflow:hidden;
			border-radius:5px 5px 5px 5px;
		}
		form div.user-baobao-form-input
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:65%;
			float:right;
			overflow:hidden;
		}
		.user-baobao-input
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
		.user-baobao-input:focus
		{
			border-color:#ccccff;
			border-style:solid;
			border-width:3px;
		}
		.user-baobao-input:hover
		{
			border-color:#ccccff;
			border-width:3px;
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
	</style>
	<script type="text/html" id="barDemo">
        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">修改</a>
        <a class="layui-btn layui-btn-xs" lay-event="scan">查看</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
	<script id="state" type="text/html">
        {{# if(d.state === "1"){ }}
            <a class="layui-btn layui-btn-xs" lay-event="changestate">已公布</a>
        {{# } else if (d.state === "0") { }}
            <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="changestate">未公布</a>
        {{# } }}
    </script>
    <script type="text/html" id="toolbarDemo">
        <div class="demoTable">
            搜索ID：
            <div class="layui-inline">
                <input class="layui-input" name="id" id="demoReload" autocomplete="off">
            </div>
            <button class="layui-btn" data-type="reload">搜索</button>
            <button class="layui-btn layui-btn-normal" lay-event="fresh">刷新</button>
        </div>
    </script>    
	<div class="user-baobao-pannel user-baobao-run">
		<div class="user-baobao-pannel-body">
			<div class="user-baobao-width-406080" style="margin:0 auto;">
				<div class="user-baobao-title" style="border-radius:3px;">
				    <div style="display:inline-block; *display:inline; zoom:1;">
    					<div style="float:left;">
            				<span style="color:#856CE8;font-weight:bold;" class="iconfont icon-kehupandian"></span>
            			</div>
            			<div style="float:left;">
            				<span style="color:#856CE8;font-weight:bold;" >文章列表</span>
            			</div>
        			</div>
				<div>
				<!-- 搜索 -->
                <table class="layui-hide" id="demo" lay-filter="demo"></table>
			</div>
		</div>
	</div>
	</body>
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
                ,url:'data.php'
                ,toolbar: '#toolbarDemo'
                ,cellMinWidth: 80
                ,title: '用户数据表'
                ,id: 'articlelist'
                ,totalRow: true
                ,loading:false
                ,cols: [[
                  {type: 'checkbox', fixed: 'left'}
                  ,{field:'id', title:'ID', unresize: true, sort: true,width:70,}
                  ,{field:'title', title:'标题', unresize: true, sort: true,width:120,}
                  ,{field:'state', title:'状态',  templet: '#state',sort: true,style:'text-align:center;'}
                  ,{title:'操作', toolbar: '#barDemo',width:200}
                ]]
                ,page: true
                ,limits: [10,20,30]  //一页选择显示3,5或10条数据
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
            table.on('toolbar(demo)', function(obj){
                switch(obj.event){
                    case 'fresh':
                        layer.msg("刷新成功",{icon:1});
                        table.reload('articlelist', {
                            page: {
                                curr: 1 //重新从第 1 页开始
                            }
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
                        var act="articleedit";
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
                        var act="articleedit";
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
                    layer.prompt({title: '输入密码:', formType:4}, function(text, index){
    					layer.close(index);
    					var password=text;
    			    	var index = layer.load(1, {
                            shade: [0.1,'#fff'] //0.1透明度的白色背景
                        });
                        var act="useredit";
                        var method="3";
                        $.ajax({  
            				type: "POST",   //提交的方法
            				url:"./ajax.php", //提交的地址  
            				data:
            				{
            					'id':item.id,
            					'act':act,
            					'password':password,
            					'method':method
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
            						layer.msg('修改失败', {icon: 2,time:1000,shade:0.4});
            					}
            				}
            			});
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
                        var act="articleedit";
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
            var $ = layui.$, active = {
                reload: function(){
                    var demoReload = $('#demoReload');
                    //执行重载
                    var value=demoReload.val();
                    var field="id";
                    var act="useredit";
                    var method="6";
                    $.ajax({
                        url:'ajax.php',
                        type:'post',
                        data:
                        {
                            'field':field,
                            'value':value,
                            'method':method,
                            'act':act,
                        },//向服务端发送删除的id
                        success:function(data){
                            if(data==1){
                                layer.msg("查询成功",{icon:1});
                                table.reload('articlelist', {
                                    page: {
                                        curr: 1 //重新从第 1 页开始
                                    }
                                });
                            }
                            else{
                                layer.msg("查询失败",{icon:5});
                            }
                        }
                    });
                }
            };
            $('body').on('click','.demoTable .layui-btn',function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
        });
	</script>
<html>