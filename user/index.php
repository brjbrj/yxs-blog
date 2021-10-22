<?php
	session_start();
	if(!isset($_SESSION['islogin']))$_SESSION['islogin']=0;
	if($_SESSION['islogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您未登录！');window.location.href='../login.php';</script>");
	}
	include"../include/common.php";
	$act="index";
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
	</style>
	<div class="user-baobao-pannel user-baobao-run">
		<div class="user-baobao-pannel-body">
			<div class="user-baobao-width-406080" style="margin:0 auto;">
				<div class="user-baobao-title" style="border-radius:3px;">
					123
				<div>
				<form class="user-baobao-form">
					<div class="user-baobao-line">
						<div class="user-baobao-form-span" >
							<div style="font-weight:bold;"><span>123</span></div>
						</div>
						<div class="user-baobao-form-input">
							<input class="user-baobao-input" type="text" >
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
<html>