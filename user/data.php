<?php
    session_start();
    include"../include/common.php";
    $id=isset($_SESSION['id'])? $_SESSION['id']:0;
    if($id==0)
    {
        $string='{"code": 0,"msg": "","count":0,';
        $data=$string.'"data": []}';
    }
    else 
    {
        $db = new mysqli($dbconfig['host'], $dbconfig['user'], $dbconfig['pwd'], $dbconfig['dbname']);
        $sql = "SELECT * FROM brj_article";
        $string='{"code": 0,"msg": "","count":';
        $data='"data": [';
        $result = $db->query($sql);
        $i=0;
    	if ($result->num_rows > 0){
    		while($row = $result->fetch_assoc())
    		{
    		    if($row["user"]==$id)
    		    {
    		        if($i!=0)$data=$data.',';
        		    $i++;
        		    $data=$data.'{"id": "'.$row["id"].'","title":"'.$row["title"].'","state": "'.$row["state"].'"}';
    		    }
    		}
    	}
    	$data=$string.($i).','.$data.']}';
    }
    echo $data;
?>