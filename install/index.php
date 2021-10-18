<?php
	error_reporting(0);//关闭错误报告
	session_start();
	@header('Content-Type: text/html; charset=UTF-8');
	$do=isset($_GET['do'])?$_GET['do']:'0';
	$title='影小薯博客系统';
	//检测是否安装
	if(file_exists('install.lock')){
		$installed=true;
		$do='0';
	}

	function checkfunc($f,$m = false) {
		if (function_exists($f)) {
			return '<font color="green">可用</font>';
		} else {
			if ($m == false) {
				return '<font color="black">不支持</font>';
			} else {
				return '<font color="red">不支持</font>';
			}
		}
	}

	function checkclass($f,$m = false) {
		if (class_exists($f)) {
			return '<font color="#229405">可用</font>';
		} else {
			if ($m == false) {
				return '<font color="black">不支持</font>';
			} else {
				return '<font color="#FF0000">不支持</font>';
			}
		}
	}
	include('./css/function_css.php');
?>
<html lang="zh-cn">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1，user-scalable=0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="./css/baobao_install.css" />
		<link rel="stylesheet" type="text/css" href="../asset/css/iconfont.css" />
		<title><?php echo $title;?>-安装向导</title>
		<style>
		html
		{
		    margin:0;
		    padding:0;
		}
		body
		{
		    margin:0;
		    padding:0;
		    overflow-y:auto ;
		    overflow-x:hidden ;
		}
		body::-webkit-scrollbar
        {
        	width:7px;
        }
        body::-webkit-scrollbar-thumb
        {
        	border-radius: 1px;
        	-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
        	background:#E094F3;
        }
        body::-webkit-scrollbar-trac
        {
        	-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.2);
        	border-radius: 0;
        	background: rgba(0,0,0,0.1);
        }
		</style>
	</head>
	<body class="baobao-body">
		<nav class="baobao-nav-left" style="background-color:#A755DD;">
			<div style="display:inline-block; *display:inline; zoom:1;">
				<div style="float:left;">
					<span class="baobao-span iconfont icon-home"></span>
				</div>
				<div style="float:left;">
					<span class="baobao-span" >欢迎使用<?php echo $title;?></span>
				</div>
			</div>
		</nav>
	<?php if($do=='0'){
		$_SESSION['checksession']=1;
	?>
	<div style="padding-top:60px;">
		<div class="baobao-run-center">
			<div class="baobao-width-607080 baobao-x-center" style="float: none;">
				<div class="baobao-contain baobao-font-title" style="<?php echo background_image_2(90,'#E2C6F4','#A755DD','#E2C6F4');?>border-radius:10px 10px 0% 0%;">
					<?php echo $title;?>更新日志
				</div>
				<div style="padding:0 0 20px 0;">
					<p class="baobao-show" style="margin-top:0px;border: 1px dashed #C709F7; border-top: none;border-radius:0px 0px 10px 10px;padding:10px 1px 10px 0;"><iframe  style="width:100%;height:465px;" frameborder="0"  src="../read.php"></iframe></p>
					<?php if($installed==1){ ?>
					<div class="baobao-alert alert-warning baobao-show">您已经安装过，如需重新安装请删除<font color=red> install/install.lock </font>文件后再安装！</div>
					<?php }else{?>
					<p align="center" class="baobao-show"><a class="baobao-btn" style="background:linear-gradient(to right,#14b7ff,#b221ff);" href="index.php?do=1"><font  color="white">开始安装</font></a></p>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<?php }elseif($do=='1'){?>
	<div  style="padding-top:60px;">
		<div class="baobao-run-center">
			<div class="baobao-width-607080 baobao-x-center" style="float: none;">
				<div class="baobao-contain baobao-font-title" style="<?php echo background_image_2(90,'#E2C6F4','#A755DD','#E2C6F4');?>border-radius:10px 10px 0% 0%;">
					环境检查
				</div>
				<div class="baobao-progress">
					<div class="baobao-progress baobao-progress-success baobao-colorchange" style="border-radius:0 5px 5px 0;width: 30%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
						<span>30%</span>
					</div>
				</div>
				<table class="baobao-table baobao-show">
					<thead>
						<tr>
							<th style="width:20%">函数检测</th>
							<th style="width:15%">需求</th>
							<th style="width:15%">当前</th>
							<th style="width:50%">用途</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>PHP 5.6+</td>
							<td>必须</td>
							<td><font color="#229405"><?php echo phpversion(); ?></font></td>
							<td>PHP版本支持</td>
						</tr>
						<tr>
							<td>curl_exec()</td>
							<td>必须</td>
							<td><?php echo checkfunc('curl_exec',true); ?></td>
							<td>抓取网页</td>
						</tr>
						<tr>
							<td>file_get_contents()</td>
							<td>必须</td>
							<td><?php echo checkfunc('file_get_contents',true); ?></td>
							<td>读取文件</td>
						</tr>
						<tr>
							<td>session</td>
							<td>必须</td>
							<td><?php echo $_SESSION['checksession']==1?'<font color="#229405">可用</font>':'<font color="#FF0000">不支持</font>'; ?></td>
							<td>PHP必备功能</td>
						</tr>
						<tr>
							<td>是否正版</td>
							<td>必须</td>
							<td><font color="#229405">正版</font></td>
							<td><?php echo $title;?></td>
						</tr>
					</tbody>
				</table>
				<p style="text-align;margin-top:20px;" class="baobao-show">
					<span style="float:left"><a class="baobao-btn" style="background:linear-gradient(to right,#14b7ff,#b221ff);" href="index.php?do=0"><font  color="white"><<上一步</font></a></span>
					<span style="float:right"><a class="baobao-btn" style="background:linear-gradient(to right,#14b7ff,#b221ff);" href="index.php?do=2" align="right"><font  color="white">下一步>></font></a></span>
				</p>
			</div>
		</div>
	</div>
	<?php }elseif($do=='2'){?>
	<div style="padding-top:60px;">
		<div class="baobao-run-center">
			<div class="baobao-width-607080 baobao-x-center" style="float: none;">
				<div class="baobao-contain baobao-font-title" style="<?php echo background_image_2(90,'#E2C6F4','#A755DD','#E2C6F4');?>border-radius:10px 10px 0% 0%;">
					数据库配置
				</div>
				<div class="baobao-progress">
					<div class="baobao-progress baobao-progress-success baobao-colorchange" style="border-radius:0 5px 5px 0;width: 60%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
						<span>60%</span>
					</div>
				</div>
				<div class="baobao-body"  style="border: 1px dashed #C709F7;border-top-width:0;">
				<?php
					if(defined("SAE_ACCESSKEY"))
					{
						echo '
							检测到您使用的是SAE空间，支持一键安装，请点击 <a href="?do=3">下一步</a>
						';
					}
					else
					{
						echo '
								<form action="?do=3" class="baobao-form" style="margin-top:10px;" method="post">
								<div class="baobao-inline">
									<div class="baobao-inline-item">
										<div class="baobao-lable"><span for="name">数据库地址:</span></div>
										<input type="text" class="baobao-input" name="db_host" value="localhost">
									</div>
									<div class="baobao-inline-item">
										<div class="baobao-lable"><span for="name">数据库端口:</span></div>
										<input type="text" class="baobao-input" name="db_port" value="3306">
									</div>
									<div class="baobao-inline-item">
										<div class="baobao-lable"><span for="name">数据库用户名:</span></div>
										<input type="text" class="baobao-input" name="db_user">
									</div>
									<div class="baobao-inline-item">
										<div class="baobao-lable"><span for="name">数据库密码:</span></div>
										<input type="text" class="baobao-input" name="db_pwd">
									</div>
									<div class="baobao-inline-item">
										<div class="baobao-lable"><span for="name">数据库名:</span></div>
										<input type="text" class="baobao-input" name="db_name">
									</div>
									<div class="baobao-inline-item">
										<div class="baobao-lable"><span for="name">数据表前缀:</span></div>
										<input type="text" class="baobao-input" name="db_qz" value="blog"><br>
									</div>
									<div class="baobao-inline-item">
										<input type="submit" class="baobao-btn" name="submit" style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);width:80%" value="保存配置">
									</div>
								</div>
								</form>
								<div style="margin-top:20px;margin-bottom:20px;">（如果已事先填写好config.php相关数据库配置，请 <a href="?do=3&jump=1">点击此处</a> 跳过这一步！）'
						;
					}
				?>
				</div>
			</div>
		</div>
	</div>
	<?php }elseif($do=='3'){?>
	<div class="baobao-run-center" style="padding-top:60px;">
		<div class="baobao-width-607080 baobao-x-center" style="float: none;">
			<div class="baobao-contain baobao-font-title" style="<?php echo background_image_2(90,'#E2C6F4','#A755DD','#E2C6F4');?>border-radius:10px 10px 0% 0%;">
				保存数据库
			</div>
			<div class="baobao-progress">
				<div class="baobao-progress baobao-progress-success baobao-colorchange" style="border-radius:0 5px 5px 0;width: 70%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
					<span>70%</span>
				</div>
			</div>
			<div class="baobao-body">
			<?php
				require './db.class.php';
				if(defined("SAE_ACCESSKEY") || $_GET['jump']==1)
				{
					include_once '../include/config.php';
					if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname'])
					{
						echo '<div class="baobao-alert alert-danger">请先填写好数据库并保存后再安装！<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
					}
					else
					{
						if(!$con=DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']))
						{
							if(DB::connect_errno()==2002)
								echo '<div class="baobao-alert alert-warning">连接数据库失败，数据库地址填写错误！<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
							elseif(DB::connect_errno()==1045)
								echo '<div class="baobao-alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
							elseif(DB::connect_errno()==1049)
								echo '<div class="baobao-alert alert-warning">连接数据库失败，数据库名不存在！<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
							else
								echo '<div class="baobao-alert alert-warning">连接数据库失败，['.DB::connect_errno().']'.DB::connect_error().'<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
						}
						else
						{
							echo '<div class="baobao-alert alert-success">数据库配置文件保存成功！</div>';
							if(DB::query("select * from ".$dbconfig['dbqz']."_config where 1")==FALSE)
								echo '<p style="text-align:center"><a class="baobao-btn" style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);" href="?do=4">创建数据表>></a></p>';
							else
								echo '<div class="baobao-alert alert-warning">系统检测到你已安装过'.$title.'</div>
								<div class="baobao-inline-item">
									<p style="float:left;"><a href="?do=6" class="baobao-btn"  style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);">跳过安装</a></p>
									<p style="float:right;"><a href="?do=4" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}"  class="baobao-btn"  style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);">强制全新安装</a></p>
								</div>';
						}
					}
				}
				else
				{
					$db_host=isset($_POST['db_host'])?$_POST['db_host']:NULL;
					$db_port=isset($_POST['db_port'])?$_POST['db_port']:NULL;
					$db_user=isset($_POST['db_user'])?$_POST['db_user']:NULL;
					$db_pwd=isset($_POST['db_pwd'])?$_POST['db_pwd']:NULL;
					$db_name=isset($_POST['db_name'])?$_POST['db_name']:NULL;
					$db_qz=isset($_POST['db_qz'])?$_POST['db_qz']:'help';

					if($db_host==null || $db_port==null || $db_user==null || $db_pwd==null || $db_name==null || $db_qz==null)
					{
						echo '<div class="baobao-alert alert-danger">保存错误,请确保每项都不为空<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
					}
					else
					{
						$config="<?php
								/*数据库配置*/
								\$dbconfig=array(
									'host' => '{$db_host}', //数据库服务器
									'port' => {$db_port}, //数据库端口
									'user' => '{$db_user}', //数据库用户名
									'pwd' => '{$db_pwd}', //数据库密码
									'dbname' => '{$db_name}', //数据库名
									'dbqz' => '{$db_qz}' //数据表前缀
								);
						?>";
						if(!$con=DB::connect($db_host,$db_user,$db_pwd,$db_name,$db_port))
						{
							if(DB::connect_errno()==2002)
								echo '<div class="baobao-alert alert-warning">连接数据库失败，数据库地址填写错误！<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
							elseif(DB::connect_errno()==1045)
								echo '<div class="baobao-alert alert-warning">连接数据库失败，数据库用户名或密码填写错误！<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
							elseif(DB::connect_errno()==1049)
								echo '<div class="baobao-alert alert-warning">连接数据库失败，数据库名不存在！<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
							else
								echo '<div class="baobao-alert alert-warning">连接数据库失败，['.DB::connect_errno().']'.DB::connect_error().'<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
						}
						elseif(file_put_contents('../include/config.php',$config))
						{
							echo '<div class="baobao-alert alert-success">数据库配置文件保存成功！</div>';
							if(DB::query("select * from ".$db_qz."_config where 1")==TRUE)
								echo '<p style="text-align:center;"><a class="baobao-btn" style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);" href="?do=4">创建数据表>></a></p>';
							else
								echo '<div class="baobao-alert alert-warning">系统检测到你已安装过'.$title.'</div>
								<div class="baobao-inline-item">
									<p style="float:left;"><a href="?do=6" class="baobao-btn"  style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);">跳过安装</a></p>
									<p style="float:right;"><a href="?do=4" onclick="if(!confirm(\'全新安装将会清空所有数据，是否继续？\')){return false;}"  class="baobao-btn"  style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);">强制全新安装</a></p>
								</div>';
						}
						else
						{
							echo '<div class="baobao-alert alert-danger">保存失败，请确保网站根目录有写入权限<br/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
						}
					}
				}
			?>
			</div>
		</div>
	</div>
<?php }elseif($do=='4'){?>
	<div class="baobao-run-center" style="padding-top:60px;">
		<div class="baobao-width-607080 baobao-x-center" style="float: none;">
			<div class="baobao-contain baobao-font-title" style="<?php echo background_image_2(90,'#E2C6F4','#A755DD','#E2C6F4');?>border-radius:10px 10px 0% 0%;">
				创建数据表
			</div>
			<div class="baobao-progress">
				<div class="baobao-progress baobao-progress-success baobao-colorchange" style="border-radius:0 5px 5px 0;width: 80%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
					<span>80%</span>
				</div>
			</div>
			<div>
			<?php
				include_once '../include/config.php';
				if(!$dbconfig['user']||!$dbconfig['pwd']||!$dbconfig['dbname'])
				{
					echo '<div class="baobao-alert alert-danger">请先填写好数据库并保存后再安装！<hr/><a href="javascript:history.back(-1)"><< 返回上一页</a></div>';
				}
				else
				{
					require './db.class.php';
					$sql=file_get_contents("install.sql");
					$sql=explode(';',$sql);
					$cn = DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
					if (!$cn) die('err:'.DB::connect_error());
					DB::query("set sql_mode = ''");
					DB::query("set names utf8");
					$t=0; $e=0; $error='';
					for($i=0;$i<count($sql);$i++)
					{
						if ($sql[$i]=='')continue;
						if(DB::query($sql[$i]))
						{
							++$t;
						}
						else
						{
							++$e;
							$error.=DB::error().'<br/>';
						}
					}
					date_default_timezone_set("PRC");
					$date = date("Y-m-d");
					DB::query("INSERT INTO `blog_admin` VALUES ('build', '".$date."')");
				}
				if($e==0)
				{
					echo '<div class="baobao-alert alert-success">安装成功！<br/>SQL成功'.$t.'句/失败'.$e.'句</div><p align="right"><a class="baobao-btn" style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);" href="index.php?do=5">下一步>></a></p>';
				}
				else
				{
					echo '<div class="baobao-alert alert-danger">安装失败<br/>SQL成功'.$t.'句/失败'.$e.'句<br/>错误信息：'.$error.'</div><p align="left"><a class="baobao-btn" style="color:#fff;background:linear-gradient(to right,#14b7ff,#b221ff);" href="index.php?do=4">点此进行重试</a></p>';
				}
			?>
		</div>
	</div>
</div>
<?php }elseif($do=='5'){?>
	<div class="baobao-run-center" style="padding-top:60px;">
		<div class="baobao-width-607080 baobao-x-center" style="float: none;">
			<div class="baobao-contain baobao-font-title" style="<?php echo background_image_2(90,'#E2C6F4','#A755DD','#E2C6F4');?>border-radius:10px 10px 0% 0%;">
				安装完成
			</div>
			<div class="baobao-progress">
				<div class="baobao-progress baobao-progress-success baobao-colorchange" style="border-radius:0;width: 100%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
					<span>100%</span>
				</div>
			</div>
			<div class="baobao-body">
			<?php
				@file_put_contents("install.lock",'欢迎使用'.$title.'  本文件仅用于判断是否授权或替换文件');
				echo '<div class="baobao-alert alert-success"><font color="green">安装完成！管理账号和密码是:admin/123456</font><br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/login.php">>>后台管理</a><hr/>更多设置选项请登录后台管理进行修改。<br/><br/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录建立 install.lock 文件！</font></div>';
			?>
			</div>
		</div>
	</div>
<?php }elseif($do=='6'){?>
	<div class="baobao-run-center" style="padding-top:60px;">
		<div class="baobao-width-607080 baobao-x-center" style="float: none;">
			<div class="baobao-contain baobao-font-title" style="<?php echo background_image_2(90,'#E2C6F4','#A755DD','#E2C6F4');?>border-radius:10px 10px 0% 0%;">
				安装完成
			</div>
			<div class="baobao-progress">
				<div class="baobao-progress baobao-progress-success baobao-colorchange" style="border-radius:0;width: 100%;" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
					<span>100%</span>
				</div>
			</div>
			<div>
			<?php
				@file_put_contents("install.lock",'欢迎使用'.$title.'  本文件仅用于判断是否授权或替换文件');
				echo '<div class="abaobao-lert alert-success"><font color="green">安装完成！管理账号和密码是:admin/123456</font><br/><br/><a href="../">>>网站首页</a>｜<a href="../admin/">>>后台管理</a><hr/>更多设置选项请登录后台管理进行修改。<br/><br/><font color="#FF0033">如果你的空间不支持本地文件读写，请自行在install/ 目录建立 install.lock 文件！</font></div>';
			?>
			</div>
		</div>
	</div>
<?php }?>
</body>
</html>