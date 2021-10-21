<?php
	//css背景色渐变函数

	function background_image_1($angle=0,$first_color='#000000',$last_color='#FFFFFF',$repeat=0)//两色渐变函数(角度，颜色1，颜色2，是否重复)
	{
		//调整角度
		if($angle<0)$angle=-$angle;
		while($angle>360)$angle=$angle-360;
		//编写语句
		$res=$repeat==0 ? 'background-image:linear-gradient('.$angle.'deg,'.$first_color.','.$last_color.');' : 'background-image:repeating-linear-gradient('.$angle.'deg,'.$first_color.','.$last_color.');';
		return $res;
	}

	function background_image_2($angle=0,$first_color='#000000',$mid_color='#FFFFFF',$last_color='#000000',$repeat=0)//两色渐变函数(角度，颜色1，颜色2，颜色3，是否重复)
	//想要指定位置可以加参数如('#000000 33%','#FFFFFF 66%','#000000 90%')
	{
		//调整角度
		if($angle<0)$angle=-$angle;
		while($angle>360)$angle=$angle-360;
		//编写语句
		$res=$repeat==0 ? 'background-image:linear-gradient('.$angle.'deg,'.$first_color.','.$mid_color.','.$last_color.');' : 'background-image:repeating-linear-gradient('.$angle.'deg,'.$first_color.','.$mid_color.','.$last_color.');';
		return $res;
	}

	function background_image_3($first_color='#000000',$last_color='#000000',$repeat=0)//两色渐变函数(角度，颜色1，颜色2，颜色3，是否重复)
	//想要指定位置可以加参数如('#000000','#FFFFFF',0)
	{
		//编写语句
		$res=$repeat==0 ? 'background-image:radial-gradient('.$first_color.','.$last_color.');' : 'background-image:repeating-radial-gradient('.$first_color.','.$last_color.');';
		return $res;
	}

	function background_image_4($x='20%',$y='20%',$first_color='#FFFFFF',$last_color='#000000',$others='',$repeat=0)
	//background-image: radial-gradient(circle at 20% 40%,#99CCCC 20%, #7171B7 40%, #CCCC99 60%, #4F9C9C 80%);
	{
		//编写语句
		if($others!='')$others=','.$others;
		$res= $repeat==0 ? 'background-image: radial-gradient(circle at '.$x.' '.$y.','.$first_color.','.$last_color.$others.');' : 'background-image:repeating-radial-gradient(circle at '.$x.' '.$y.','.$first_color.','.$last_color.$others.');';
		return $res;
	}

	function background_image_5($x='20%',$y='20%',$first_color='#FFFFFF',$last_color='#000000',$others='',$repeat=0)
	//background-image: radial-gradient(circle at 20% 40%,#99CCCC 20%, #7171B7 40%, #CCCC99 60%, #4F9C9C 80%);
	{
		//编写语句
		if($others!='')$others=','.$others;
		$res= $repeat==0 ? 'background-image: radial-gradient(farthest-side at '.$x.' '.$y.','.$first_color.','.$last_color.$others.');' : 'background-image:repeating-radial-gradient(farthest-side at '.$x.' '.$y.','.$first_color.','.$last_color.$others.');';
		return $res;
	}
	
?>