<?php
	session_start();
	include_once 'creatcode.php';
	include_once 'common.php';
	$_vc = new ValidateCode(int($conf['yzm_len']));
	$_vc->doimg();
	$act=daddslashes($_GET['act']);
	if($act=="adchange")
	{
		$_SESSION['vc_code_adchange'] = $_vc->getCode();
	}
	else if($act=="add")
	{
		$_SESSION['vc_code_add'] = $_vc->getCode();
	}
	else if($act=="admin")
	{
		$_SESSION['adminlogin']=0;
		$_SESSION['vc_code_admin'] = $_vc->getCode();
	}
	else if($act=="change")
	{
		$_SESSION['vc_code_change'] = $_vc->getCode();
	}
	else if($act=="login")
	{
		$_SESSION['vc_code_login'] = $_vc->getCode();
	}
	else if($act=="reg")
	{
		$_SESSION['vc_code_reg'] = $_vc->getCode();
		$_SESSION['islogin']=0;
	}
?>