<?php
	session_start();
	$_SESSION['islogin']=0;
	if($_SESSION['islogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您已退出登录！');window.location.href='../login.php';</script>");
	}
?>