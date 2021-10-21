<?php
    function imgzip($src,$newwid,$newhei,$savepath){
        $imgInfo = getimagesize($src);
        $imgType = image_type_to_extension($imgInfo[2], false);
        $fun = "imagecreatefrom{$imgType}";
        //声明图片 打开图片 在内存中
        $image = $fun($src);
        //方便配置长度宽度、高度，设置框为变量wid,高度为hei
        $wid=$imgInfo[0];
        $hei=$imgInfo[1];
        //判断长度和宽度，以方便等比缩放,规格按照500, 320
        if($wid>$hei)
        {
            $wid=$newwid;
            $hei=$newwid/($wid/$hei);
        }
        else
        {
            $wid = $newhei * ($wid / $hei);
            $hei = $newhei;
        }
        //在内存中建立一张图片
        $images2 = imagecreatetruecolor($newwid, $newhei); //建立一个500*320的图片
        //将原图复制到新建图片中
        //imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h)
        imagecopyresampled($images2, $image, 0, 0, 0, 0, $wid,$hei, $imgInfo[0],$imgInfo[1]);
        //销毁原始图片
        imagedestroy($image);
        //直接输出图片文件
        //保存图片 到新文件
        imagejpeg($images2,$savepath, 100); //10代码输出图片的质量 0-100 100质量最高
        //销毁
        imagedestroy($images2);
    }
?>