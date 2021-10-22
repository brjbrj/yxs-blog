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
    <link href="../asset/highlight/styles/monokai-sublime.min.css" rel="stylesheet">  
    <script src="../asset/highlight/highlight.min.js"></script>
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
		.baobao-line-in
		{
			width:100%;
			display: inline-block;
			padding-bottom:5px;
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
		form div.user-baobao-form-input
		{
			text-align:center;
			height:40px;
			line-height:40px;
			width:79%;
			float:right;
			overflow:hidden;
		}
		.baobao-edit
		{
		    width:80%;
		    margin-top:20px;
		    transform: translate(-50%,0%);
		    margin-left:50%;
		    border:solid 1px;
		    border-color:#fff;
		    outline:none;
		}
		.code-settings
		{
		    margin-top:10px;
		}
		.w-e-menu .w-e-panel-container .w-e-panel-tab-title
		{
		    overflow-x:auto ;
		    overflow-y:hidden;
		}
		.w-e-menu .w-e-panel-container .w-e-panel-close
		{
		    right: -5px;
		}
		.w-e-toolbar .eleImg/*表情的高度*/
		{
		    max-height:60px;
		}
		.eleImg/*插入的高度*/
		{
		    max-height:60px;
		}
		element
		{
		    width:auto;
		}
		.wang-code-textarea
		{
		    tab-size:4;
        	-moz-tab-size:4;
        	-o-tab-size:4;
		}
	</style>
	<div class="user-baobao-pannel user-baobao-run">
		<div class="user-baobao-pannel-body">
		    <div class="user-baobao-width-406080" style="margin:0 auto;">
				<div class="user-baobao-title" style="border-radius:3px;">
					<span style="font-weight:bold;">开始编辑</span>
				<div>
				<form class="user-baobao-form">
    			    <div class="baobao-line-in">
    					<div class="user-baobao-form-span" style="width:20%;">
    						<div style="font-weight:bold;"><span>标题</span></div>
    					</div>
    					<div class="user-baobao-form-input">
    						<input class="user-baobao-input" id="article_title" type="text" value="">
    					</div>
    				</div>
				</div>
                <div id="edit" style="text-align:left;line-height:20px;">
                    
                </div>
                <div style="padding-bottom:20px;">
                    <div class="user-baobao-title" id="save"  style="margin-top:5px;border-radius:3px;">
    					<span style="font-weight:bold;">保存</span>
    				<div>
    			</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
        $(function(){
	        $("#save").on("click",function(){
	            var text=editor.txt.html();
	            text=text.replace(/\n/g,'brj-n');
	            alert(text);
	            var act="savearticle";
	            var article_title=document.getElementById("article_title").value;
	            var id="<?php echo $_SESSION['id'];?>";
	            var loading = layer.load(1, {
                    shade: false,
                });
	            $.ajax({
                    url:'ajax.php',
                    type:'post',
                    data:
                    {
                        'text':text,
                        'act':act,
                        'id':id,
                        'article_title':article_title,
                    },
                    success:function(data){
                        layer.close(loading);
                        if(data==1){
                            layer.msg("保存成功",{icon:1});
                        }
                        else{
                            layer.msg("保存失败",{icon:5});
                        }
                    }
                });
	        });
        });
    </script>
    <script type="text/javascript" src="../asset/wangeditor/dist/wangeditor.js"></script>
    <!-- 引入 wangEditor.min.js -->

    <script type="text/javascript">
        const E = window.wangEditor
        const editor = new E('#edit')
        editor.config.onblur = function (html) {
            // html 即编辑器中的内容
            console.log('onblur', html)
        }
        editor.config.languageTab = '    '
        editor.highlight = hljs
        editor.config.zIndex = 10
        editor.config.emotions = [
            <?php
                $db = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['pwd'], $dbconfig['dbname']);
                $sql = "SELECT * FROM brj_emoji";
                $string=array();
                $data=array();
                $result = $db->query($sql);
                $i=0;
            	if ($result->num_rows > 0){
            		while($row = $result->fetch_assoc())
            		{
            		    $flag=0;
            		    for($x=0;$x<count($string);$x++)
                        {
                            if($string[$x]==$row['title'])
                            {
                                $i=$x;
                                $flag=1;
                                break;
                            }
                        }
                        if($flag)
                        {
                            $data[$i]=$data[$i]."{alt:'[".$row['alt']."]',src:'".$row['url']."'},";
                        }
                        else
                        {
                            $string[$x]=$row['title'];
                            $data[$x]="{title:'".$row['title']."',type:'image',content:[{alt:'[".$row['alt']."]',src:'".$row['url']."'},";
                        }
            		}
            	}
            	for($x=0;$x<count($data);$x++)
                {
                    $data[$x]=$data[$x]."]},";
                    echo $data[$x];
                }
            ?>
            {
                // tab 的标题
                title: '默认',
                // type -> 'emoji' / 'image'
                type: 'image',
                // content -> 数组
                content: [
                    {
                        alt: '[坏笑]',
                        src: 'http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_org.png'
                    },
                    {
                        alt: '[舔屏]',
                        src: 'http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_org.png'
                    }
                ]
            },
            {
                // tab 的标题
                title: 'emoji',
                // type -> 'emoji' / 'image'
                type: 'emoji',
                // content -> 数组
                content: ['😀', '😃', '😄', '😁', '😆']
            }
        ]
        editor.config.showFullScreen =<?php echo $conf['edit_full'];?>;
        editor.config.height = parseInt(<?php echo $conf['edit_height'];?>)
        editor.config.lineHeights = [<?php echo $conf['edit_lineheight'];?>]
        // editor.config.fontSizes = {
        //     'x-small': { name: '10px', value: '1' },
        //     'small': { name: '13px', value: '2' },
        //     'normal': { name: '16px', value: '3' },
        //     'large': { name: '18px', value: '4' },
        //     'x-large': { name: '24px', value: '5' },
        //     'xx-large': { name: '32px', value: '6' },
        //     'xxx-large': { name: '48px', value: '7' },
        // }
        editor.config.colors =
        [
            <?php echo $conf['edit_color'];?>
        ]
        editor.config.menus =
        [
            <?php echo $conf['edit_tool'];?>
        ]
        editor.config.showLinkImg = <?php echo $conf['edit_linkimg'];?>; //是否开启网络图片，默认开启的。
        editor.config.uploadImgShowBase64 = <?php echo $conf['edit_base64'];?>;   // 使用 base64 保存图片
        editor.config.debug = false; //是否开启Debug 默认为false 建议开启 可以看到错误
        //图片开始
        <?php if($conf['edit_upload']=="true"){?>
        editor.config.uploadFileName = "file";      //文件名称  也就是你在后台接受的 参数值
        editor.config.uploadImgServer = "./upload.php?type=img";  // 上传图片到服务器
        editor.config.uploadImgHeaders = {    //header头信息 
            'Accept': 'text/x-json'
        }
        editor.config.uploadImgAccept = [<?php echo $conf['edit_type'];?>]
        // 将图片大小限制为 3M
        editor.config.uploadImgMaxSize = parseInt(<?php echo $conf['edit_val'];?>) * 1024 <?php if($conf['edit_EA']=="MB"){?>* 1024<?php }?>;   //默认为5M
        
        // editor.customConfig.customAlert = function (info) { //自己设置alert错误信息
        //     // info 是需要提示的内容
        //     alert('自定义提示：' + '图片上传失败，请重新上传')
        // };
        
        // editor.customConfig.debug = location.href.indexOf('wangeditor_debug_mode=1') > 0; // 同上 二选一
        //图片在编辑器中回显
        editor.config.uploadImgHooks = {  
            error: function (xhr, editor) {
                layer.msg("上传错误",{icon:5});
                // 图片上传出错时触发  如果是这块报错 就说明文件没有上传上去，直接看自己的json信息。是否正确
                // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
            },
            fail: function (xhr, editor, result) {
                //  如果在这出现的错误 就说明图片上传成功了 但是没有回显在编辑器中，我在这做的是在原有的json 中添加了
                //  一个url的key（参数）这个参数在 customInsert也用到
                //  
                layer.msg("上传失败",{icon:5});
            },
            success:function(xhr, editor, result){
                //成功 不需要alert 当然你可以使用console.log 查看自己的成功json情况 
                console.log(result)
                // insertImg('https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png')
            },
            customInsert: function (insertImg, result, editor) {
                //console.log(result);
                // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
                // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
                // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
                insertImg(result.url);
            }
        };
        <?php }?>
        //图片结束
        //视频开始
        <?php if($conf['edit_localvideo']=="true"){?>
        editor.config.uploadVideoName = 'video';
        editor.config.uploadVideoServer = './upload.php?type=video';
        editor.config.uploadVideoMaxSize = parseInt(<?php echo $conf['edit_val2'];?>) * 1024 <?php if($conf['edit_EA2']=="MB"){?>* 1024<?php }?>;
        editor.config.uploadVideoAccept = [<?php echo $conf['edit_type2'];?>]
        editor.config.uploadVideoHooks = {
            // 上传视频之前
            // before: function(xhr) {
            //     console.log(xhr)
        
            //     // 可阻止视频上传
            //     return {
            //         prevent: true,
            //         msg: '需要提示给用户的错误信息'
            //     }
            // },
            // 视频上传并返回了结果，视频插入已成功
            error: function (xhr, editor) {
                layer.msg("上传错误",{icon:5});
                // 图片上传出错时触发  如果是这块报错 就说明文件没有上传上去，直接看自己的json信息。是否正确
                // xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
            },
            fail: function (xhr, editor, result) {
                //  如果在这出现的错误 就说明图片上传成功了 但是没有回显在编辑器中，我在这做的是在原有的json 中添加了
                //  一个url的key（参数）这个参数在 customInsert也用到
                //  
                layer.msg("上传失败",{icon:5});
            },
            success:function(xhr, editor, result){
                //成功 不需要alert 当然你可以使用console.log 查看自己的成功json情况 
                console.log(result)
                // insertImg('https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png')
            },
            customInsert: function (insertVideoFn, result, editor) {
                //console.log(result);
                // 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
                // insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
                // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
                insertVideoFn(result.url);
            }
        };
        <?php }?>
        //视频结束
        // 或者 const editor = new E( document.getElementById('div1') )
        editor.create()
    </script>
    
	</body>
    <script type='text/javascript'>
        function keyHandler(e) {
            if (event.keyCode == 9)
            {
                //e.value = e.value + "  "; // 跳几格由你自已决定
                var str='\t';
                event.returnValue = false;
                if (document.selection) {
                    var sel = document.selection.createRange();
                    sel.text =str;
                    event.returnValue = false;
                } else if (typeof e.selectionStart === 'number' && typeof e.selectionEnd === 'number') {
                    var startPos = e.selectionStart,
                        endPos = e.selectionEnd,
                        cursorPos = startPos,
                        tmpStr = e.value;
                    e.value = tmpStr.substring(0, startPos) + str + tmpStr.substring(endPos, tmpStr.length);
                    cursorPos += str.length;
                    e.selectionStart = e.selectionEnd = cursorPos;
                    event.returnValue = false;
                } else {
                    e.value += str;
                    event.returnValue = false;
                }
            }
        }
    </script>
<html>