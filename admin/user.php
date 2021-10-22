<?php
	session_start();
	if(!isset($_SESSION['adminlogin']))$_SESSION['adminlogin']=0;
	if($_SESSION['adminlogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您未登录！');window.location.href='login.php';</script>");
	}
	include"../include/common.php";
	$act="user";
	$mod = isset($_GET['mod'])? $_GET['mod']:'account';
	$db = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['pwd'], $dbconfig['dbname']);
    $sql = "SELECT * FROM brj_user";
    $string='{"code": 0,"msg": "","count":';
    $data='"data": [';
    $result = $db->query($sql);
    $i=0;
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc())
		{
		    if($i!=0)$data=$data.',';
		    $i++;
		    $data=$data.'{"id": "'.$row["id"].'" ,"username": "'.$row["username"].'","state": "'.$row["state"].'","date": "'.$row["date"].'"}';
		}
	}
	$data=$data.',{"id":"","username":"","state":"","date":""}';
	$string=$string.($i+1).','.$data.']}';
    file_put_contents('data.txt', $string);
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
				width:95%;
			}
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
		form div.baobao-form-input
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:65%;
			float:right;
			overflow:hidden;
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
		.baobao-page-this
		{
		    background-color:#41CF41;
		}
		.baobao-page-none
		{
		    background-color:#CCCCCC;
		    cursor:not-allowed;
		}
		.baobao-table-button
		{
		    outline:none;
		    border:none;
		    padding:2px 5px;
		    color:#fff;
		    margin:0;
		    cursor:pointer;
		}
		.baobao-safe-btn
		{
		    background-color:#17C717;
		}
		.baobao-safe-btn:hover
		{
		    background-color:#85F285;
		}
		.baobao-danger-btn
		{
		    background-color:#FF4111;
		}
		.baobao-danger-btn:hover
		{
		    background-color:#FF7755;
		}
		.baobao-normal-btn
		{
		    background-color:#47BDDB;
		}
		.baobao-normal-btn:hover
		{
		    background-color:#80D1E6;
		}
		.baobao-disable-btn
		{
		    cursor:not-allowed;
		    background-color:#DDDDDD;
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
        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">更改密码</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    </script>
	<script id="state" type="text/html">
        {{# if(d.state === "1"){ }}
            <a class="layui-btn layui-btn-xs" lay-event="changestate">激活</a>
        {{# } else if (d.state === "0") { }}
            <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="changestate">封禁</a>
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
	<div class="baobao-pannel baobao-run">
		<div class="baobao-pannel-body">
			<div class="baobao-width-406080" style="margin:0 auto;">
				<?php if($mod=='add'){?>
				<div class="baobao-title" style="border-radius:3px;">
				    <div style="display:inline-block; *display:inline; zoom:1;">
    					<div style="float:left;">
            				<span style="font-weight:bold;" class="iconfont icon-add-account"></span>
            			</div>
            			<div style="float:left;">
            				<span style="font-weight:bold;" >添加用户</span>
            			</div>
        			</div>
				<div>
				<form class="baobao-form">
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div ><span>用户名</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" id="username" name="username" type="text" value="@qq.com">
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div ><span>密码</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" id="password" name="password" type="text" value="Aa123456">
						</div>
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span" >
							<div ><span>验证码</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" id="yzm" name="yzm" type="text" value="">
						</div>
						
					</div>
					<div class="baobao-line-item">
						<div class="baobao-form-span">
							<div ><span>点击更换验证码</span></div>
						</div>
						<span  for="name" style="float:right;">
						    <img  style="margin:0px;" height="40" id="codeimg"  src="../include/code.php?act=add&r=<?php echo time();?>" onclick="this.src='../include/code.php?act=add&r='+Math.random();" title="点击更换验证码">
						</span>
					</div>
					<div class="baobao-line-item">
						<input class="baobao-button" type="button" id="submit" value="确定">
					</div>
				</form>
				<?php }else{?>
				<div class="baobao-title" style="border-radius:3px;">
				    <div style="display:inline-block; *display:inline; zoom:1;">
    					<div style="float:left;">
            				<span style="font-weight:bold;" class="iconfont icon-kehupandian"></span>
            			</div>
            			<div style="float:left;">
            				<span style="font-weight:bold;" >用户列表</span>
            			</div>
        			</div>
				<div>
				<!-- 搜索 -->
                <table class="layui-hide" id="demo" lay-filter="demo"></table>
				<?php }?>
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
            //温馨提示：默认由前端自动合计当前行数据。从 layui 2.5.6 开始： 若接口直接返回了合计行数据，则优先读取接口合计行数据。
            //详见：https://www.layui.com/doc/modules/table.html#totalRow
            var tableIns=table.render({
                elem: '#demo'
                ,url:'data.txt'
                ,toolbar: '#toolbarDemo'
                ,cellMinWidth: 80
                ,title: '用户数据表'
                ,id: 'userlist'
                ,totalRow: true
                ,loading:false
                ,cols: [[
                  {type: 'checkbox', fixed: 'left'}
                  ,{field:'id', title:'ID', unresize: true, sort: true, totalRowText: '合计',width:70,}
                  ,{field:'username', title:'用户名',  edit: 'text',minWidth: 150,sort: true,}
                  ,{field:'state', title:'状态',  templet: '#state',sort: true,style:'text-align:center;'}
                  ,{field:'date', title:'时间',edit: 'text',minWidth: 150,sort: true}
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
                    var act="useredit";
                    var method="7";
                    $.ajax({
                        url:'ajax.php',
                        type:'post',
                        data:
                        {
                            'method':method,
                            'act':act,
                        },//向服务端发送删除的id
                        success:function(data){
                            if(data==1){
                                layer.msg("刷新成功",{icon:1});
                                table.reload('userlist', {
                                    page: {
                                        curr: 1 //重新从第 1 页开始
                                    }
                                });
                            }
                            else{
                                layer.msg("刷新失败",{icon:5});
                            }
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
                        var act="useredit";
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
                        var act="useredit";
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
                        var act="useredit";
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
            });
            // table.on('tool(demo)', function(obj){
            //     var data = obj.data;
            //     if(obj.event === 'detail'){
            //       layer.msg('ID：'+ data.id + ' 的查看操作');
            //     } else if(obj.event === 'del'){
            //       if(data.id!="12")
            //       {
            //           layer.confirm('真的删除行么', function(index){
            //             //后台数据给入
            //             $.ajax({
            //                 url:'del.php',
            //                 type:'post',
            //                 data:{'id':data.id},//向服务端发送删除的id
            //                 success:function(data){
            //                     if(data==1){
            //                         obj.del(); //删除对应行（tr）的DOM结构，并更新缓存
            //                         layer.close(index);
            //                         console.log(index);
            //                         layer.msg("删除成功",{icon:1});
            //                     }
            //                     else{
            //                         layer.msg("删除失败",{icon:5});
            //                     }
            //                 }
            //             });
            //             layer.close(index);
            //           });    
            //       }
            //       else
            //       {
            //           layer.msg("删除失败",{icon:5});
            //       }
            //     } else if(obj.event === 'edit')
            //     {
            //       layer.alert('编辑行：<br>'+ JSON.stringify(data))
            //     }
            // });
            layui.use(['table', 'util'], function(){
                var table = layui.table
                ,util = layui.util;
                //监听单元格编辑
                table.on('edit(demo)', function(obj){
                    var value = obj.value //得到修改后的值
                    var act="useredit"
                    ,data = obj.data //得到所在行所有键值
                    ,field = obj.field; //得到字段
                    var method="5";
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
                    else
                    {
                        layer.confirm('是否增加数据', function(index){
                        //后台数据给入
                            $.ajax({
                                url:'add.php',
                                type:'post',
                                data:
                                {
                                    'field':field,
                                    'value':value
                                },//向服务端发送删除的id
                                success:function(data){
                                    if(data==1){
                                        layer.close(index);
                                        console.log(index);
                                        layer.msg("插入成功",{icon:1});
                                        tableIns.reload();
                                    }
                                    else{
                                        layer.msg("插入失败",{icon:5});
                                    }
                                }
                            });
                          layer.close(index);
                        });
                    }
                    //layer.msg('[ID: '+ data.id +'] ' + field + ' 字段更改值为：'+ util.escape(value));
                });
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
                                table.reload('userlist', {
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
        $(document).ready(function()
		{
			$("#submit").click(function()
			{
				var send=1;
				if(document.getElementById("username").value=="")
				{
					layer.msg('请填写账号', {icon: 2,time:1000,shade:0.4});
					send=0;
				};
				if(document.getElementById("password").value=="" && send==1)
				{
					layer.msg('请填写密码', {icon: 2,time:1000,shade:0.4});
					send=0;
				}
				if(document.getElementById("yzm").value==""  && send==1)
				{
					layer.msg('请填写验证码', {icon: 2,time:1000,shade:0.4});
					send=0;
				}
				if(send==1)
				{
				    var index = layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
					var username=document.getElementById("username").value;
					var password=document.getElementById("password").value;
					var yzm=document.getElementById("yzm").value;
					var act="adduser";
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
								layer.msg('添加成功', {icon: 1,time:2000,shade:0.4});
								$('#codeimg').click();
								document.getElementById("yzm").value="";
								document.getElementById("username").value="";
								document.getElementById("password").value="Aa123456";
							}
							else if(data==0)
							{
								layer.msg('添加失败，密码或账号错误', {icon: 2,time:1000,shade:0.4});
								$('#codeimg').click();
								document.getElementById("yzm").value="";
							}
							else
							{
								layer.msg('添加失败，验证码错误', {icon: 2,time:1000,shade:0.4});
								$('#codeimg').click();
								document.getElementById("yzm").value="";
							}
						}
					});
				}
			});
		});
	</script>
	</body>
<html>