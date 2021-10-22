<?php
    session_start();
    include"../include/common.php";
    $act=isset($_GET['act'])? $_GET['act']:"";
    if($act=="")
    {
        $string='{"code": 0,"msg": "","count":0,';
        $data=$string.'"data": []}';
    }
    else 
    {
        $db = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['pwd'], $dbconfig['dbname']);
        if($act=="emoji")
        {
            $sql = "SELECT * FROM brj_emoji";
            $string='{"code": 0,"msg": "","count":';
            $data='"data": [';
            $result = $db->query($sql);
            if ($result->num_rows > 0){
                $i=0;
        		while($row = $result->fetch_assoc())
        		{
    
    		        if($i!=0)$data=$data.',';
        		    $i++;
        		    $data=$data.'{"id": "'.$row["id"].'","title":"'.$row["title"].'","state": "'.$row["state"].'","alt":"'.$row["alt"].'","url":"'.$row['url'].'"}';
    		    }
        	}
        	$data=$string.$i.','.$data.']}';
        	echo $data;
        }
        else if($act=="admincolor")
        {
            $sql = "SELECT * FROM brj_color";
            $string='{"code": 0,"msg": "","count":';
            $data='"data": [';
            $result = $db->query($sql);
            if ($result->num_rows > 0){
                $i=0;
        		while($row = $result->fetch_assoc())
        		{
                    if($row["type"]=="admin")
                    {
                        if($i!=0)$data=$data.',';
            		    $i++;
            		    $data=$data.'{"id": "'.$row["id"].'","title":"'.$row["title"].'","color": "'.$row["value"].'"}';
                    }
    		        
    		    }
        	}
        	$data=$string.$i.','.$data.']}';
        	echo $data;
        }
        else if($act=="usercolor")
        {
            $sql = "SELECT * FROM brj_color";
            $string='{"code": 0,"msg": "","count":';
            $data='"data": [';
            $result = $db->query($sql);
            if ($result->num_rows > 0){
                $i=0;
        		while($row = $result->fetch_assoc())
        		{
                    if($row["type"]=="user")
                    {
                        if($i!=0)$data=$data.',';
            		    $i++;
            		    $data=$data.'{"id": "'.$row["id"].'","title":"'.$row["title"].'","color": "'.$row["value"].'"}';
                    }
    		        
    		    }
        	}
        	$data=$string.$i.','.$data.']}';
        	echo $data;
        }
        else if($act=="publiccolor")
        {
            $sql = "SELECT * FROM brj_color";
            $string='{"code": 0,"msg": "","count":';
            $data='"data": [';
            $result = $db->query($sql);
            if ($result->num_rows > 0){
                $i=0;
        		while($row = $result->fetch_assoc())
        		{
                    if($row["type"]=="public")
                    {
                        if($i!=0)$data=$data.',';
            		    $i++;
            		    $data=$data.'{"id": "'.$row["id"].'","title":"'.$row["title"].'","color": "'.$row["value"].'"}';
                    }
    		        
    		    }
        	}
        	$data=$string.$i.','.$data.']}';
        	echo $data;
        }
    }
?>