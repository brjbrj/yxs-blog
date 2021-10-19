<?php
	include_once ("../include/common.php");
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
		if($act=="login")
		{
			$username=daddslashes($_POST['username']);
			$password=daddslashes($_POST['password']);
			$yzm=strtolower(daddslashes($_POST['yzm']));
			if($_SESSION['vc_code_admin']==$yzm)
			{
				if($username==$conf['username'] && $password==$conf['password'])
				{
					echo 1;
					$_SESSION['adminlogin']=1;
					$_SESSION['adminname']=$username;
				}
				else
				{
					echo 0;
				}
			}
			else
			{
				echo 2;
			}
			unset($_SESSION['vc_code_admin']);
		}
		else if($act=="email")
		{
			$username=isset($_POST['username'])? daddslashes($_POST['username']):"";
			$password=isset($_POST['password'])? daddslashes($_POST['password']):"";
			$host=isset($_POST['host'])? daddslashes($_POST['host']):"";
			$port=isset($_POST['port'])? daddslashes($_POST['port']):"";
			$db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
			$db->query("SET NAMES UTF8");
			$sql =  $db->query("update brj_admin set v='".$host."' where k='mail_smtp'");
			$sql =  $db->query("update brj_admin set v='".$username."' where k='mail_name'");
			$sql =  $db->query("update brj_admin set v='".$port."' where k='mail_port'");
			$sql =  $db->query("update brj_admin set v='".$password."' where k='mail_pwd'");
			echo 1;
		}
		else if($act=="template")
		{
			$method=isset($_POST['method'])? daddslashes($_POST['method']):"";
			if($method=="")
			{
				echo 0;
			}
			else
			{
				$db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
				$db->query("SET NAMES UTF8");
				$title=isset($_POST['title'])? daddslashes($_POST['title']):"";
				$value=isset($_POST['value'])? daddslashes($_POST['value']):"";
				if($method=="reg")
				{
					$sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_mod_reg'");
					$sql =  $db->query("update brj_admin set v='".$title."' where k='yzm_mod_reg_head'");
				}
				else if($method=="login")
				{
					$sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_mod_login'");
					$sql =  $db->query("update brj_admin set v='".$title."' where k='yzm_mod_login_head'");
				}
				else if($method=="find")
				{
					$sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_mod_find'");
					$sql =  $db->query("update brj_admin set v='".$title."' where k='yzm_mod_find_head'");
				}
				echo 1;
			}
		}
		else if($act=="send_test")
		{
			$email=isset($_POST['email'])? daddslashes($_POST['email']):"";
			if($email==""||preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',$email)!=1)
			{
				echo 0;
			}
			else
			{
				$sub = $conf['title'].' - 邮件配置测试邮件';
				$msg = '这是一封测试邮件';		
				$result=send_mail($email, $sub, $msg);
				if($result===true)
				{
					echo 1;
				}
				else
				{
					echo 0;
				}
			}
		}
		else if($act=="limit")
		{
		    $method=isset($_POST['method'])? daddslashes($_POST['method']):"";
		    if($method=="")
			{
				echo 0;
			}
			else
			{
			    $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
				$db->query("SET NAMES UTF8");
				$value=isset($_POST['value'])? daddslashes($_POST['value']):"";
			    if($method=="regyzm")
			    {
			        $sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_reg'");
			        if($sql==1)
			        {
			            echo 1;
			        }
			        else
			        {
			            echo 0;
			        }
			    }
			    elseif($method=="loginyzm")
			    {
			        $sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_login'");
			        if($sql==1)
			        {
			            echo 1;
			        }
			        else
			        {
			            echo 0;
			        }
			    }
			    elseif($method=="yzmlen")
			    {
			        $sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_len'");
			        if($sql==1)
			        {
			            echo 1;
			        }
			        else
			        {
			            echo 0;
			        }
			    }
			    elseif($method=="yzmtime")
			    {
			        $sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_time'");
			        if($sql==1)
			        {
			            echo 1;
			        }
			        else
			        {
			            echo 0;
			        }
			    }
			    elseif($method=="findpwd")
			    {
			        $sql =  $db->query("update brj_admin set v='".$value."' where k='yzm_find'");
			        if($sql==1)
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
			        echo 0;
			    }
			}
		}
		else if($act=="adduser")
		{
		    $username=isset($_POST['username'])? daddslashes($_POST['username']):"";
		    $password=isset($_POST['password'])? daddslashes($_POST['password']):"";
		    $yzm=isset($_POST['yzm'])? daddslashes($_POST['yzm']):"";
		    if(strtolower($yzm) != $_SESSION['vc_code_add'])
		    {
		        unset($_SESSION['vc_code_add']);
		        echo 2;
		    }
		    else
		    {
    		    unset($_SESSION['vc_code_add']);
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
		}
		else if($act=="notice")
		{
		    $method=isset($_POST['method'])? daddslashes($_POST['method']):"";
		    if($method!="")
		    {
		        $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
    		    if($method=="0")
    		    {
    		        $res=1;
    		        $notice_num=isset($_POST['notice_num'])? daddslashes($_POST['notice_num']):"";
    		        $notice_height=isset($_POST['notice_height'])? daddslashes($_POST['notice_height']):"";
    		        $notice_width=isset($_POST['notice_width'])? daddslashes($_POST['notice_width']):"";
    		        $notice_interval=isset($_POST['notice_interval'])? daddslashes($_POST['notice_interval']):"";
    		        $notice_autoplay=isset($_POST['notice_autoplay'])? daddslashes($_POST['notice_autoplay']):"";
    		        $notice_anim=isset($_POST['notice_anim'])? daddslashes($_POST['notice_anim']):"";
    		        $notice_indicator=isset($_POST['notice_indicator'])? daddslashes($_POST['notice_indicator']):"";
    		        $notice_arrow=isset($_POST['notice_arrow'])? daddslashes($_POST['notice_arrow']):"";
    		        $sql =  $db->query("update brj_admin set v='".$notice_num."' where k='notice_num'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$notice_height."' where k='notice_height'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$notice_width."' where k='notice_width'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$notice_interval."' where k='notice_interval'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$notice_autoplay."' where k='notice_autoplay'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$notice_anim."' where k='notice_anim'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$notice_indicator."' where k='notice_indicator'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$notice_arrow."' where k='notice_arrow'");
    		        if(!$sql)$res=0;
    		        if($res)
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
    		        $notice_="notice_$method";
    		        $$notice_=isset($_POST[$notice_])? daddslashes($_POST[$notice_]):"";
    		        $sql =  $db->query("update brj_admin set v='".$$notice_."' where k='".$notice_."'");
    		        if($sql)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
		    }
		    else
		    {
		        echo 0;
		    }
		}
		else if($act=="useredit")
		{
		    $id=daddslashes($_POST['id']);
		    $method=daddslashes($_POST['method']);
		    $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
			$db->query("SET NAMES UTF8");
		    if($method==1)
		    {
			    $sql =  $db->query("update brj_user set state='0' where id='".$id."'");
			    if($sql)
			    {
			        echo 1;
			    }
			    else
			    {
			        echo 0;
			    }
		    }
		    else if($method==2)
		    {
			    $sql =  $db->query("update brj_user set state='1' where id='".$id."'");
			    if($sql)
			    {
			        echo 1;
			    }
			    else
			    {
			        echo 0;
			    }
		    }
		    else if($method==3)
		    {
		        $password=daddslashes($_POST['password']);
		        if(preg_match('/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,16}/',$password)==1)
            	{
            	    $sql =  $db->query("update brj_user set password='".$password."' where id='".$id."'");
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
            	    echo 0;
            	}
		    }
		    else if($method==4)
		    {
		        $sql =  $db->query("delete from brj_user where id='".$id."'");
		        if($sql)
			    {
			        echo 1;
			        $num=$conf["usernum"]-1;
					$sql_ =$db->query("update brj_admin set v='".$num."' where k='usernum'");
			    }
			    else
			    {
			        echo 0;
			    }
		    }
		    else if($method==5)
		    {
		        $field=daddslashes($_POST['field']);
		        $value=daddslashes($_POST['value']);
		        $sql =  $db->query("update brj_user set ".$field."= '".$value."' where id='".$id."'");
		        if($sql)
			    {
			        echo 1;
			    }
			    else
			    {
			        echo 0;
			    }
		    }
		    else if($method==6)
		    {
		        $field=daddslashes($_POST['field']);
		        $value=daddslashes($_POST['value']);
		        $sql = "SELECT * FROM brj_user";
                $string='{"code": 0,"msg": "","count":';
                $data='"data": [';
                $result = $db->query($sql);
                $i=0;
            	if ($result->num_rows > 0){
            		while($row = $result->fetch_assoc())
            		{
            		    if($row[$field]==$value)
            		    {
                		    if($i!=0)$data=$data.',';
                		    $i++;
                		    $data=$data.'{"id": "'.$row["id"].'" ,"username": "'.$row["username"].'","state": "'.$row["state"].'","date": "'.$row["date"].'"}';
            		    }
            		}
            	}
            	$string=$string.($i+1).','.$data.']}';
                file_put_contents('data.txt', $string);
		        if($i)
			    {
			        echo 1;
			    }
			    else
			    {
			        echo 0;
			    }
		    }
		    else if($method==7)
		    {
		        $field=daddslashes($_POST['field']);
		        $value=daddslashes($_POST['value']);
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
		        if($i)
			    {
			        echo 1;
			    }
			    else
			    {
			        echo 0;
			    }
		    }
		}
		else if($act=="set_edit")
		{
		    $method=isset($_POST['method'])? daddslashes($_POST['method']):"";
		    if($method!="")
		    {
		        $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
    		    if($method=="0")
    		    {
    		        $res=1;
    		        $edit_height=isset($_POST['edit_height'])? daddslashes($_POST['edit_height']):"";
    		        $edit_base64=isset($_POST['edit_base64'])? daddslashes($_POST['edit_base64']):"";
    		        $edit_upload=isset($_POST['edit_upload'])? daddslashes($_POST['edit_upload']):"";
    		        $edit_linkimg=isset($_POST['edit_linkimg'])? daddslashes($_POST['edit_linkimg']):"";
    		        $edit_tool=isset($_POST['edit_tool'])? daddslashes($_POST['edit_tool']):"";
    		        $edit_lineheight=isset($_POST['edit_lineheight'])? daddslashes($_POST['edit_lineheight']):"";
    		        $edit_full=isset($_POST['edit_full'])? daddslashes($_POST['edit_full']):"";
    		        $sql =  $db->query("update brj_admin set v='".$edit_height."' where k='edit_height'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_base64."' where k='edit_base64'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_upload."' where k='edit_upload'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_linkimg."' where k='edit_linkimg'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_tool."' where k='edit_tool'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_lineheight."' where k='edit_lineheight'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_full."' where k='edit_full'");
    		        if(!$sql)$res=0;
    		        if($res)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
    		    else if($method=="1")
    		    {
    		        $edit_color=isset($_POST['edit_color'])? daddslashes($_POST['edit_color']):"";
    		        $sql =  $db->query("update brj_admin set v='".$edit_color."' where k='edit_color'");
    		        if($sql)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
    		    else if($method=="2")
    		    {
    		        $edit_emoji=isset($_POST['edit_emoji'])? daddslashes($_POST['edit_emoji']):"";
    		        $sql =  $db->query("update brj_admin set v='".$edit_emoji."' where k='edit_emoji'");
    		        if($sql)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
    		    else if($method=="3")
    		    {
    		        $res=1;
    		        $edit_val2=isset($_POST['edit_val2'])? daddslashes($_POST['edit_val2']):"";
    		        $edit_EA2=isset($_POST['edit_EA2'])? daddslashes($_POST['edit_EA2']):"";
    		        $edit_type2=isset($_POST['edit_type2'])? daddslashes($_POST['edit_type2']):"";
    		        $sql =  $db->query("update brj_admin set v='".$edit_val2."' where k='edit_val2'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_EA2."' where k='edit_EA2'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_type2."' where k='edit_type2'");
    		        if(!$sql)$res=0;
    		        if($res)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
    		    else if($method=="4")
    		    {
    		        $res=1;
    		        $edit_val=isset($_POST['edit_val'])? daddslashes($_POST['edit_val']):"";
    		        $edit_EA=isset($_POST['edit_EA'])? daddslashes($_POST['edit_EA']):"";
    		        $edit_type=isset($_POST['edit_type'])? daddslashes($_POST['edit_type']):"";
    		        $sql =  $db->query("update brj_admin set v='".$edit_val."' where k='edit_val'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_EA."' where k='edit_EA'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_type."' where k='edit_type'");
    		        if(!$sql)$res=0;
    		        if($res)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
    		    else if($method=="5")
    		    {
    		        $res=1;
    		        $edit_imgurl=isset($_POST['edit_imgurl'])? daddslashes($_POST['edit_imgurl']):"";
    		        $edit_imgalt=isset($_POST['edit_imgalt'])? daddslashes($_POST['edit_imgalt']):"";
    		        $sql =  $db->query("update brj_admin set v='".$edit_imgurl."' where k='edit_imgurl'");
    		        if(!$sql)$res=0;
    		        $sql =  $db->query("update brj_admin set v='".$edit_imgalt."' where k='edit_imgalt'");
    		        if(!$sql)$res=0;
    		        if($res)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
    		    else if($method=="6")
    		    {
    		        $emoji_alt=isset($_POST['emoji_alt'])? daddslashes($_POST['emoji_alt']):"";
    		        $emoji_title=isset($_POST['emoji_title'])? daddslashes($_POST['emoji_title']):"";
    		        $emoji_url=isset($_POST['emoji_url'])? daddslashes($_POST['emoji_url']):"";
    		        $sql = "insert into brj_emoji values (null,\"$emoji_title\",\"1\",\"$emoji_alt\",\"$emoji_url\")";
        					#执行sql 语句
        			$res = $db->query($sql);
    		        if($res)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
    		    else if($method=="7")
    		    {
    		        $emoji_alt=isset($_POST['emoji_alt'])? daddslashes($_POST['emoji_alt']):"";
    		        $emoji_title=isset($_POST['emoji_title'])? daddslashes($_POST['emoji_title']):"";
    		        $emoji_url=isset($_POST['emoji_url'])? daddslashes($_POST['emoji_url']):"";
    		        $emoji_id=isset($_POST['emoji_id'])? daddslashes($_POST['emoji_id']):"";
    		        $sql =  $db->query("update brj_emoji set title='".$emoji_title."',alt='".$emoji_alt."',url='".$emoji_url."' where id='".$emoji_id."'");
    		        if($sql)
    		        {
    		            echo 1;
    		        }
    		        else
    		        {
    		            echo 0;
    		        }
    		    }
		    }
		}
		else if($act=="emojiedit")
		{
		    $method=isset($_POST['method'])? daddslashes($_POST['method']):"";
		    if($method=="")
		    {
		        echo 0;
		    }
		    else
		    {
		        $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
		        $id=isset($_POST['id'])? daddslashes($_POST['id']):"";
		        if($method=="1")
		        {
		            $sql =  $db->query("update brj_emoji set state='0' where id='".$id."'");
		        }
		        else if($method=="2")
		        {
		            $sql =  $db->query("update brj_emoji set state='1' where id='".$id."'"); 
		        }
		        else if($method=="3")
		        {
		            $field=daddslashes($_POST['field']);
		            $value=daddslashes($_POST['value']);
		            $sql =  $db->query("update brj_emoji set ".$field."= '".$value."' where id='".$id."'");
		        }
		        else if($method=="4")
		        {
		            $sql =  $db->query("delete from brj_emoji where id='".$id."'");
		        }
		        if($sql)
		        {
		            echo 1;
		        }
		        else
		        {
		            echo 0;
		        }
		    }
		}
		else
		{
			echo 0;
		}
	}
?>