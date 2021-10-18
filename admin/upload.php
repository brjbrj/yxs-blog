<?php
    $type=(isset($_GET['type']))? $_GET['type']:"img";
    if($type=="img")
    {
        $savename = date('YmdHis',time()).mt_rand(0,9999).'.jpeg';//localResizeIMG压缩后的图片都是jpeg格式
        //生成文件夹
        $imgdirs = "../public/img/".date('Y-m-d',time()).'/';
        mkdirs($imgdirs);
        //获取图片文件的名字
        $fileName = $_FILES["file"]["name"];
        //图片保存的路径
        $savepath = '../public/img/'.date('Y-m-d' ,time()).'/'.$savename;
        //生成一个URL获取图片的地址
        $url = "http://".$_SERVER['HTTP_HOST'].'/public/img/'.date('Y-m-d' ,time()).'/'.$savename;
        //返回数据。wangeditor3 需要用到的数据 json格式的
        $data["errno"] = 0;
        $data["data"] = $savepath;
        $data['url'] = "{$url}";
        file_put_contents('data.txt',$_FILES["file"]["tmp_name"]);
        //可有可无的一段，也就是图片文件移动。
        move_uploaded_file($_FILES["file"]["tmp_name"],$savepath);
        include_once('./zip.php');
        $size = getimagesize($url);
        $width = $size[0];
        $height = $size[1];
        imgzip($savepath,$width,$height,$savepath);
        //返回数据
        echo json_encode($data);
        
    }
    //创建文件夹 权限问题
    function mkdirs($dir, $mode = 0777){
        if (is_dir($dir) || @mkdir($dir, $mode)) return TRUE;
        if (!mkdirs(dirname($dir), $mode)) return FALSE;
        return @mkdir($dir, $mode);
    }
?>