<?php
	function unicodeencode($strLong) {
	  $strArr = preg_split('/(?<!^)(?!$)/u', $strLong);//拆分字符串为数组(含中文字符)
	  $resUnicode = '';
	  foreach ($strArr as $str)
	  {
		  $bin_str = '';
		  $arr = is_array($str) ? $str : str_split($str);//获取字符内部数组表示,此时$arr应类似array(228, 189, 160)
		  foreach ($arr as $value)
		  {
			  $bin_str .= decbin(ord($value));//转成数字再转成二进制字符串,$bin_str应类似111001001011110110100000,如果是汉字"你"
		  }
		  $bin_str = preg_replace('/^.{4}(.{4}).{2}(.{6}).{2}(.{6})$/', '$1$2$3', $bin_str);//正则截取, $bin_str应类似0100111101100000,如果是汉字"你"
		  $unicode = dechex(bindec($bin_str));//返回unicode十六进制
		  $_sup = '';
		  for ($i = 0; $i < 4 - strlen($unicode); $i++)
		  {
			  $_sup .= '0';//补位高字节 0
		  }
		  $str =  '\\u' . $_sup . $unicode; //加上 \u  返回
		  $resUnicode .= $str;
	  }
	  return $resUnicode;
	}
//Unicode编码转字符串方法1
	function unicode_decode($name)
	{
	  // 转换编码，将Unicode编码转换成可以浏览的utf-8编码
	  $pattern = '/([\w]+)|(\\\u([\w]{4}))/i';
	  preg_match_all($pattern, $name, $matches);
	  if (!empty($matches))
	  {
		$name = '';
		for ($j = 0; $j < count($matches[0]); $j++)
		{
		  $str = $matches[0][$j];
		  if (strpos($str, '\\u') === 0)
		  {
			$code = base_convert(substr($str, 2, 2), 16, 10);
			$code2 = base_convert(substr($str, 4), 16, 10);
			$c = chr($code).chr($code2);
			$c = iconv('UCS-2', 'UTF-8', $c);
			$name .= $c;
		  }
		  else
		  {
			$name .= $str;
		  }
		}
	  }
	  return $name;
	}
//Unicode编码转字符串
	function unicodedecode($unicode_str){
		$json = '{"str":"'.$unicode_str.'"}';
		$arr = json_decode($json,true);
		if(empty($arr)) return '';
		return $arr['str'];
	}
	function brj64encode($yw)
	{
		$code='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+-()[]*';
		$l=strlen($code);
		for($i=1;$i<=$l;$i++)
		{
			$mm[$i]=substr($code,$i-1,1);
		}
		$l=strlen($yw);
		$key=0;
		$qu_=-1;
		$res='';
		for($i=1;$i<=$l;$i++)
		{
			$ch = substr($yw,$i-1,1);
			$ch_asc = ord($ch);
			$t=pro($ch_asc,$key);
			$key=$t;
			$qu=intval($t / 64);
			$wei=$t % 64;
			if($qu!=$qu_)
			{
				$res=$res.$mm[65+$qu];
				$qu_=$qu;
				$tt=$mm[65+$qu];
				$mm[65+$qu]=$mm[69];
				$mm[69]=$tt;
			}
			$res=$res.$mm[$wei+1];
			$tt=$mm[$wei+1];
			$mm[$wei+1]=$mm[69];
			$mm[69]=$tt;
		}
		return $res;
	}

	function pro($a,$b){  
		$aa=($a|$b) - ($a&$b);
		return $aa;
	}

	function brj64decode($mw)
	{
		$code='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789+-()[]*';
		$l=strlen($code);
		for($i=1;$i<=$l;$i++)
		{
			$mm[$i]=substr($code,$i-1,1);
		}
		$l=strlen($mw);
		$key=0;
		$res='';
		$qu=-1;
		$wei=-1;
		for($i=1;$i<=$l;$i++)
		{
			$ch = substr($mw,$i-1,1);
			for($j=1;$j<=69;$j++)
			{
				if($mm[$j]==$ch)
				{
					if($j<=64)
					{
						$wei=$j-1;
						$tt=$qu*64+$wei;
						$r=pro($tt,$key);
						$key=$tt;
						$re=chr($r);
						$res=$res.$re;
					}
					else
					{
						$qu=$j-65;
					}
					$t=$mm[$j];
					$mm[$j]=$mm[69];
					$mm[69]=$t;
					break;
				}
			}
		}
		return $res;
	}
	//$useragent = $_SERVER['HTTP_USER_AGENT'];
	function isphone($useragent)
	{
		if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
				substr($useragent, 0, 4))) {
			// 手机
			return 1;
		}
		else{
		//电脑
			return 0;
		}
	}
	
	//发送邮件必要函数
	function send_mail($to, $sub, $msg) {
		global $conf;
		include ROOT."smtp.class.php";
		$From = $conf['mail_name'];
		$Host = $conf['mail_smtp'];
		$Port = $conf['mail_port'];
		$SMTPAuth = 1;
		$Username = $conf['mail_name'];
		$Password = $conf['mail_pwd'];
		$Nickname = $conf['sitename'];
		$SSL = $conf['mail_port']==465?1:0;
		$mail = new SMTP($Host , $Port , $SMTPAuth , $Username , $Password , $SSL);
		$mail->att = array();
		if($mail->send($to , $From , $sub , $msg, $Nickname)) {
			return true;
		} else {
			return $mail->log;
		}
	}
	
	function randkey($len=4,$place)
	{
		if($place==0)
		{
			$value=1111111;
			for($i=7;$i>$len;$i--)
			{
				$value /= 10;
			}
			return intval($value);
		}
		else
		{
			$value=9999999;
			for($i=7;$i>$len;$i--)
			{
				$value /= 10;
			}
			return intval($value);
		}
	}
	//添加反斜杠
	function daddslashes($string, $force = 0, $strip = FALSE) {
		!defined('MAGIC_QUOTES_GPC') && define('MAGIC_QUOTES_GPC', get_magic_quotes_gpc());
		if(!MAGIC_QUOTES_GPC || $force) {
			if(is_array($string)) {
				foreach($string as $key => $val) {
					$string[$key] = daddslashes($val, $force, $strip);
				}
			} else {
				$string = addslashes($strip ? stripslashes($string) : $string);
			}
		}
		return $string;
	}
	
	//随机数
	function random($length, $numeric = 0) {
		$seed = base_convert(md5(microtime().$_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
		$seed = $numeric ? (str_replace('0', '', $seed).'012340567890') : ($seed.'zZ'.strtoupper($seed));
		$hash = '';
		$max = strlen($seed) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $seed{mt_rand(0, $max)};
		}
		return $hash;
	}

	//select选中
	function isselect($value,$key)
	{
		if($value==$key)
		{
			return 'selected: true,disabled: true';
		}
	}
	function isselect2($value,$key)
	{
		if($value==$key)
		{
			return 'selected: true';
		}
	}
	function select($value,$key)
	{
		if($value==$key)
		{
			return 'selected';
		}
		else
		{
		    return '';
		}
	}
	function check($value,$key)
	{
		if($value==$key)
		{
			return 'checked';
		}
		else
		{
		    return '';
		}
	}
	
	function this($value,$key)
	{
		if($value==$key)
		{
			return 'id="baobao-this"';
		}
	}
	//验证码获取长度
	function int($value)
	{
		if("4"==$value)
		{
			return 4;
		}
		else if("5"==$value)
		{
			return 5;
		}
		else if("6"==$value)
		{
			return 6;
		}
		else if("7"==$value)
		{
			return 7;
		}
	}
?>