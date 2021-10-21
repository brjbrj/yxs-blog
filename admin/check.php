<?php
	session_start();
	$un=urldecode($_GET['username']);
	$pw1=$_GET['password1'];
	$yzm=$_GET['yzm'];
	require("../include/config.php");
	#连接数据库
	$db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
	#设置查询数据格式
	$db->query("SET NAMES UTF8");
	#编辑sql语句
	$sql = $db->query("select `k` from help_admin where k='password' and v='$pw1'");
	$row = mysqli_fetch_assoc($sql);
	$sql = $db->query("select `k` from help_admin where k='username' and v='$un'");
	$row2 = mysqli_fetch_assoc($sql);
	if(strtolower($yzm) != $_SESSION['vc_code_admin'])
	{
		unset($_SESSION['vc_code_admin']);
		echo "<script type='text/javascript'>var msg = confirm('登陆失败,验证码错误！');if (msg) {window.location.href = 'login.php';}</script>";
	}
	else
	{
		if($row>0 && $un!="" && $pw1!="" && $row2>0)
		{
			unset($_SESSION['vc_code_admin']);
			$_SESSION['adminlogin']=1;
			$_SESSION['adminname']=$un;
			echo "<script type='text/javascript'>var msg = confirm('登陆成功');if (msg) {window.location.href = 'index.php';}</script>";
		}
		else
		{
			unset($_SESSION['vc_code_admin']);
			#执行sql 语句
			echo "<script type='text/javascript'>var msg = confirm('登陆失败,用户名或密码错误！');if (msg) {window.location.href = 'login.php';}</script>";
		}
	 }
?>