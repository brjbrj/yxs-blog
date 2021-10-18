<?php
	include_once ("./include/common.php");
	session_start();
	$flag=0;
	if(isset($_POST['act']))
	{
		$act=daddslashes($_POST['act']);
		$flag=1;
	}
	elseif(isset($_GET['act']))
	{
	    $act=daddslashes($_GET['act']);
		$flag=1;
	}
	else
	{
		echo 0;
	}
	if($flag==1)
	{
	    if($act=="sendcode")
		{   
		    $email=isset($_POST['email'])? daddslashes($_POST['email']):"";
		    $method=isset($_POST['method'])? daddslashes($_POST['method']):"";
		    $code = rand(randkey(int($conf['yzm_len']),0),randkey(int($conf['yzm_len']),1));
			if($method=="")
			{
				echo 0;
			}
			else
			{
    			if($method=="login")
    			{
    			    $sub = str_replace("\$code",$code,$conf['yzm_mod_login_head']);
            		$msg =str_replace("\$code",$code,$conf['yzm_mod_login']);
            		$_SESSION['vc_code_login']=strval($code);
    			}
    			elseif($method=="reg")
    			{
    			    $sub = str_replace("\$code",$code,$conf['yzm_mod_reg_head']);
        		    $msg =str_replace("\$code",$code,$conf['yzm_mod_reg']);
        	    	$_SESSION['vc_code_reg']=strval($code);
    			}
    			elseif($method=="find")
    			{
    			    $sub = str_replace("\$code",$code,$conf['yzm_mod_find_head']);
            		$msg =str_replace("\$code",$code,$conf['yzm_mod_find']);
            		$_SESSION['vc_code_find']=strval($code);
            		$_SESSION['do']=0;
    			}
    			$msg =str_replace("\$username",$email,$msg);
            	$msg =str_replace("\$title",$conf['title'],$msg);
            	$msg =str_replace("\$qq",$conf['qq'],$msg);
            	$sub =str_replace("\$username",$email,$sub);
            	$sub =str_replace("\$title",$conf['title'],$sub);
            	$sub =str_replace("\$qq",$conf['qq'],$sub);
            	if($method!="find"){
            		$result=send_mail($email, $sub, $msg);
            	}
            	else
            	{
            		$db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
            		#设置查询数据格式
            		$db->query("SET NAMES UTF8");
            		#编辑sql语句
            		$sql = $db->query("select `username` from brj_user where username='$email'");
            		$row = mysqli_fetch_assoc($sql);
            		if($row>0)
            		{
            			$result=send_mail($email, $sub, $msg);
            		}
            		else
            		{
            			unset($_SESSION['vc_code_find']);
            			$result=false;
            		}
            	}
            	if($result===true){
            		echo 1;
            	}else{
            		if($act=="find")
            		{
            			echo 2;
            		}
            		else
            		{
            			echo 0;
            		}
            	}
			}
		}
		else if($act=="login")
		{
		    $username=isset($_POST['username'])? daddslashes($_POST['username']):"";
		    $password=isset($_POST['password'])? daddslashes($_POST['password']):"";
		    $f=1;
		    if($conf['yzm_login']!="0")
		    {
		        $yzm=isset($_POST['yzm'])? daddslashes($_POST['yzm']):"";
		        $yzm_r=$_SESSION['vc_code_login'];
		        if(strtolower($yzm)!=strtolower($yzm_r))
		        {
		            $f=0;
		        }
		        unset($_SESSION['vc_code_login']);
		    }
		    if($f!=0)
		    {
		        $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
		        $sql = $db->query("select * from brj_user where username='$username' and password='$password'");
		        $row = mysqli_fetch_assoc($sql);
		        if($row)
		        {
		            $_SESSION['islogin']=1;
		            $sql = "SELECT * FROM brj_user where username='$username'";
					$result = $db->query($sql);
					$res=$result->fetch_assoc();
					$_SESSION['id']=$res["id"];
		            echo 1;
		        }
		        else
		        {
		            echo 0;
		        }
		    }
		    else
		    {
		        echo 0;
		    }
		}
		else if($act=="reg")
		{
		    $username=isset($_POST['username'])? daddslashes($_POST['username']):"";
		    $password=isset($_POST['password'])? daddslashes($_POST['password']):"";
		    $f=1;
		    if($conf['yzm_reg']!="0")
		    {
		        $yzm=isset($_POST['yzm'])? daddslashes($_POST['yzm']):"";
		        $yzm_r=$_SESSION['vc_code_reg'];
		        if(strtolower($yzm)!=strtolower($yzm_r))
		        {
		            $f=0;
		        }
		    }
		    if($f!=0)
		    {
		        if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',$username)==1)
            	{
            		if(preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,16}/',$password)==1)
            		{
            		    $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
        				#设置查询数据格式
        				$db->query("SET NAMES UTF8");
        				#编辑sql语句
        				$sql = $db->query("select `username` from brj_user where username='$username'");
        				$row = mysqli_fetch_assoc($sql);
        				if($row>0){
        					echo 3;
        				}
        				else
        				{
        				    date_default_timezone_set("PRC");
	                    	$date = date("Y-m-d  H:i:s");
        					$sql = "insert into brj_user values (null,\"$username\",\"$password\",\"1\",\"$date\")";
        					#执行sql 语句
        					$result = $db->query($sql);
        					#用户数加一的数据库改写开始
        					$sql = "SELECT * FROM brj_admin where k='usernum'";
        					$result = $db->query($sql);
        					$res=$result->fetch_assoc();
        					$num=$res["v"]+1;
        					$sql =  $db->query("update brj_admin set v='".$num."' where k='usernum'");
        					#用户数加一的数据库改写结束
        					echo 1;
        				}
            		}
            		else
            		{
            		    echo 0;
            		}
            	}
            	else
            	{
            	    echo 0;    
            	}
		    }
		    else
		    {
		        echo 4;
		    }
		}
		else if($act=="find")
		{
		    $method=isset($_POST['method'])? daddslashes($_POST['method']):"";
		    if($method=="")
		    {
		        echo 0;
		    }
		    else
		    {
		        $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
		        $username=isset($_POST['username'])? daddslashes($_POST['username']):"";
		        if($method=="1")
		        {
		            $db->query("SET NAMES UTF8");
        				#编辑sql语句
    				$sql = $db->query("select `username` from brj_user where username='$username'");
    				$row = mysqli_fetch_assoc($sql);
    				if($row<=0)
    				{
    					echo 0;
    				}
    				else
    				{
    				    $_SESSION['finduser']=$username;
    				    echo 1;
    				}
		        }
		        else if($method=="2")
    		    {
    		        $yzm=isset($_POST['yzm'])? daddslashes($_POST['yzm']):"";
    		        if($_SESSION['vc_code_find']==$yzm)
    		        {
    		            unset($_SESSION['vc_code_find']);
    		            echo 1;
    		        }
    		        else
    		        {
    		            unset($_SESSION['vc_code_find']);
    		            echo 0;
    		        }
    		    }
    		    else if($method=="3")
    		    {
    		        $password=isset($_POST['password'])? daddslashes($_POST['password']):"";
    		        if(preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,16}/',$password)==1)
            		{
            		    $_SESSION['pwd']=$password;
            		    echo 1;
            		}
            		else
            		{
            		    echo 0;
            		}
    		    }
    		    else if($method=="4")
    		    {
    		        $passwordcheck=isset($_POST['passwordcheck'])? daddslashes($_POST['passwordcheck']):"";
    		        if($passwordcheck==$_SESSION['pwd'])
            		{
            		    unset($_SESSION['pwd']);
            		    $username=$_SESSION['finduser'];
            		    $sql =  $db->query("update brj_user set password='".$password."' where username='".$username."'");
            		    if($sql)
            		    {
            		        echo 1;
            		    }
            		    else
            		    {
            		        echo 0;
            		    }
            		}
            		else
            		{
            		    unset($_SESSION['pwd']);
            		    echo 0;
            		}
    		    }
		    }
		    
		}
	}
	else
	{
	    echo 0;
	}
?>