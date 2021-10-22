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
	    if($act=="savearticle")
		{   
		    $db = new mysqli($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
		    $text=isset($_POST['text'])? daddslashes($_POST['text']):"";
		    $id=isset($_POST['id'])? daddslashes($_POST['id']):"";
		    $article_title=isset($_POST['article_title'])? daddslashes($_POST['article_title']):"";
		    $sql = "insert into brj_article values (null,\"$id\",\"1\",\"$article_title\",\"$text\")";
			#执行sql 语句
			$result = $db->query($sql);
			if($result)
			{
			    echo 1;
			}
			else
			{
			    echo 0;
			}
		}
		else if($act=="articleedit")
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
		            if($id=="")
		            {
		                echo 0;
		            }
		            else
		            {
		                $sql =  $db->query("update brj_article set state='0' where id='".$id."'");
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
		        else if($method=="2")
		        {
		            if($id=="")
		            {
		                echo 0;
		            }
		            else
		            {
		                $sql =  $db->query("update brj_article set state='1' where id='".$id."'");
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
		        else if($method=="4")
    		    {
    		        $sql =  $db->query("delete from brj_article where id='".$id."'");
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
	}
	else
	{
	    echo 0;
	}
?>