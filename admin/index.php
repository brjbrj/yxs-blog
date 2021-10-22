<?php
	session_start();
	if(!isset($_SESSION['adminlogin']))$_SESSION['adminlogin']=0;
	if($_SESSION['adminlogin']!=1)
	{
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('您未登录！');window.location.href='login.php';</script>");
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
			background:red;
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
	</style>
	<div class="baobao-pannel baobao-run">
		<div class="baobao-pannel-body">
			<div class="baobao-width-406080" style="margin:0 auto;">
				<div class="baobao-title" style="border-radius:3px;">
					123
				<div>
				<form class="baobao-form">
					<div class="baobao-line">
						<div class="baobao-form-span" >
							<div style="font-weight:bold;"><span>123</span></div>
						</div>
						<div class="baobao-form-input">
							<input class="baobao-input" type="text" >
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
<html>