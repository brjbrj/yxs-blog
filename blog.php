<?php
	session_start();
	include"./include/common.php";
	$id=isset($_GET['id'])?$_GET['id']:0;
?>
<html>
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="./asset/highlight/highlight.min.js"></script>
		<link href="./asset/highlight/styles/monokai-sublime.min.css" rel="stylesheet">
		<script type="text/javascript" src="./asset/wangeditor/dist/wangeditor.js"></script>
		<script type="text/javascript" src="./asset/js/jquery.js"></script>
		<style>
		    html
		    {
		        margin: 0;
		        padding：0;
		        width:100%;
		    }
		    body
		    {
		     margin-left:10%;
		     width:80%;
		     margin-top:0;
		     padding:0;
		    }
		</style>
		<link rel="stylesheet" type="text/css" href="./asset/css/iconfont.css">
		<script>
            var a_idx = 0;
            jQuery(document).ready(function($) {
                $("body").click(function(e) {
                    var a = new Array("影小薯","博客","❤","鲍鲍");
                    var $i = $("<span></span>").text(a[a_idx]);
                    a_idx = (a_idx + 1) % a.length;
                    var x = e.pageX,
                    y = e.pageY;
                    $i.css({
                        "z-index": 999,
                        "top": y - 120,
                        "left": x,
                        "position": "absolute",
                        "font-weight": "bold",
                        "user-select":"none",
                        "color": "rgb("+~~(255*Math.random())+","+~~(255*Math.random())+","+~~(255*Math.random())+")",
                        "font-size":(Math.random()*(15 - 10) + 10)+"px"
                    });
                    $("body").append($i);
                    $i.animate({
                        "top": y - 20,
                        "opacity": 0
                    },
                    1500,
                    function() {
                        $i.remove();
                    });
                });
            });
        </script>
    </head>
    <body style="margin:0;padding:0;width:100%;background-color:#f88deb;">
        <script pointColor="54,91,45" color="82,136,68" opacity='1' zIndex="-1" count="100"  src="./asset/js/dist_canvas-nest.js"></script>
        <?php 
            include_once('./head2.php');
        ?>
        <div style="margin-left:10%;margin-top:50px;width:80%;">
            
            <?php if($id){
                $db = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['pwd'], $dbconfig['dbname']);
                $sql = "SELECT * FROM brj_article where id=".$id;
                $result = $db->query($sql);
                if($result)
                {
                    $row = $result->fetch_assoc();
                    $res=str_replace("<?","\<\?",addslashes($row['content']));
                    $res=str_replace("?>","\?\>",$res);
                    $res=str_replace("brj-n","\\n",$res);
                    $title=$row['title'];
                    $id=$row['id'];
                }
                else
                {
                    $res = '<p>404</p>';
                }
                
            }
            else
            {
                $res = '<p>404</p>';
            }
            ?>
            <nav class="baobao-login-head">
        		<a>
        			<div style="float:left;text-indent:20px;">
        					<span class="baobao-span iconfont icon-browse"></span>
        			</div>
        			<div style="float:left;">
        					<span class="baobao-span" style="font-size:15px;"><?php echo $title;?></span>
        			</div>
        		</a>
        		<a href="#">
        		    <div style="float:right;margin-right:10px;">
        				<span class="baobao-span" style="font-size:15px;">ID:<?php echo $id;?></span>
        			</div>
        		</a>
        	</nav>
            <div id="edit" style="min-height:300px;height:auto;">
                
            </div>
            <link href="../asset/highlight/styles/monokai-sublime.min.css" rel="stylesheet">  
            <script src="../asset/highlight/highlight.min.js"></script>
            <script type="text/javascript">
                const E = window.wangEditor
                const editor = new E('#edit')
                editor.config.menus = []
                editor.config.zIndex = 10
                editor.config.showFullScreen =false;
                editor.highlight = hljs
                editor.config.height = 'auto'
                editor.create()
                editor.disable()
                editor.txt.html('<?php echo $res;?>')
            </script>
        </div>
    </body>
    
</html>