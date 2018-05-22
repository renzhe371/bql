<?php
function randrgb()
{
	$str='0123456789ABCDEF';
	$estr='#';
	$len=strlen($str);
	for($i=1;$i<=6;$i++)
	{
		$num=rand(0,$len-1);  
		$estr=$estr.$str[$num]; 
	}
	return $estr;
}
function getbrowser()
{
        $Agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = '';
        $browserver = '';
        $Browser = array('Lynx', 'MOSAIC', 'AOL', 'Opera', 'JAVA', 'MacWeb', 'WebExplorer', 'OmniWeb');
        for($i = 0; $i <= 7; $i ++)
        {
            if(strpos($Agent, $Browser[$i]))
            {
                $browser = $Browser[$i];
                $browserver = '';
            }
        }
        if(ereg('Mozilla', $Agent) && !ereg('MSIE', $Agent))
        {
            $temp = explode('(', $Agent);
            $Part = $temp[0];
            $temp = explode('/', $Part);
            $browserver = $temp[1];
            $temp = explode(' ', $browserver);
            $browserver = $temp[0];
            $browserver = preg_replace('/([d.]+)/', '.', $browserver);
            $browserver = $browserver;
            $browser = 'Netscape Navigator';
        }
        if(ereg('Mozilla', $Agent) && ereg('Opera', $Agent)) 
        {
            $temp = explode('(', $Agent);
            $Part = $temp[1];
            $temp = explode(')', $Part);
            $browserver = $temp[1];
            $temp = explode(' ', $browserver);
            $browserver = $temp[2];
            $browserver = preg_replace('/([d.]+)/', '.', $browserver);
            $browserver = $browserver;
            $browser = 'Opera';
        }
        if(ereg('Mozilla', $Agent) && ereg('MSIE', $Agent))
        {
            $temp = explode('(', $Agent);
            $Part = $temp[1];
            $temp = explode(';', $Part);
            $Part = $temp[1];
            $temp = explode(' ', $Part);
            $browserver = $temp[2];
            $browserver = preg_replace('/([d.]+)/','.',$browserver);
            $browserver = $browserver;
            $browser = 'Internet Explorer';
        }
        if($browser != '')
        {
            $browseinfo = $browser.' '.$browserver;
        } 
        else
        {
            $browseinfo = false;
        }
        return $browseinfo;
}
function getOS()
{
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $os = false;
        if (eregi('win', $agent) && strpos($agent, '95'))
        {
            $os = 'Windows 95';
        }
        else if (eregi('win 9x', $agent) && strpos($agent, '4.90'))
        {
            $os = 'Windows ME';
        }
        else if (eregi('win', $agent) && ereg('98', $agent))
        {
            $os = 'Windows 98';
        }
        else if (eregi('win', $agent) && eregi('nt 5.2', $agent))
        {
            $os = 'Windows Server 2003';
        }
        else if (eregi('win', $agent) && eregi('nt 5.1', $agent))
        {
            $os = 'Windows XP';
        }
        else if (eregi('win', $agent) && eregi('nt 5', $agent))
        {
            $os = 'Windows Server 2000';
        }
        else if (eregi('win', $agent) && eregi('nt', $agent))
        {
            $os = 'Windows NT';
        }
        else if (eregi('win', $agent) && ereg('32', $agent))
        {
            $os = 'Windows 32';
        }
        else if (eregi('linux', $agent))
        {
            $os = 'Linux';
        }
        else if (eregi('unix', $agent))
        {
            $os = 'Unix';
        }
        else if (eregi('sun', $agent) && eregi('os', $agent))
        {
            $os = 'SunOS';
        }
        else if (eregi('ibm', $agent) && eregi('os', $agent))
        {
            $os = 'IBM OS/2';
        }
        else if (eregi('Mac', $agent) && eregi('PC', $agent))
        {
            $os = 'Macintosh';
        }
        else if (eregi('PowerPC', $agent))
        {
            $os = 'PowerPC';
        }
        else if (eregi('AIX', $agent))
        {
            $os = 'AIX';
        }
        else if (eregi('HPUX', $agent))
        {
        $os = 'HPUX';
        }
        else if (eregi('NetBSD', $agent))
        {
            $os = 'NetBSD';
        }
        else if (eregi('BSD', $agent))
        {
            $os = 'BSD';
        }
        else if (ereg('OSF1', $agent))
        {
            $os = 'OSF1';
        }
        else if (ereg('IRIX', $agent))
        {
            $os = 'IRIX';
        }
        else if (eregi('FreeBSD', $agent))
        {
            $os = 'FreeBSD';
        }
        else if (eregi('teleport', $agent))
        {
            $os = 'teleport';
        }
        else if (eregi('flashget', $agent))
        {
            $os = 'flashget';
        }
        else if (eregi('webzip', $agent))
        {
            $os = 'webzip';
        }
        else if (eregi('offline', $agent))
        {
            $os = 'offline';
        }
        else
        {
            $os = 'Unknown';
        }
        return $os;
}
function browserinfo()
{
        return $_SERVER['HTTP_USER_AGENT'];
}
function nowurl()
{
        return "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
}

function language()
{
        return $_SERVER['HTTP_ACCEPT_LANGUAGE'];
}

function getip()
{
	if (isset($_SERVER))
	{
			$realip = $_SERVER['REMOTE_ADDR'];
	}
	else 
	{
			$realip = getenv("REMOTE_ADDR");
	}
	return $realip;
}
function request_uri()
{ 
	if (isset($_SERVER['REQUEST_URI'])) 
	{ 
		$uri = $_SERVER['REQUEST_URI']; 
	} 
	else
	{ 
		if (isset($_SERVER['argv'])) 
		{ 
			$uri = $_SERVER['PHP_SELF'] .(empty($_SERVER['argv'])?'':('?'. $_SERVER['argv'][0])); 
		} 
		else
		{ 
			$uri = $_SERVER['PHP_SELF'] .(empty($_SERVER['QUERY_STRING'])?'':('?'. $_SERVER['QUERY_STRING'])); 
		} 
	} 
	return $uri; 
} 
function inject_check($sql_str) 
{ 
     return preg_match('/select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|and|outfile/', $sql_str);    
}
function magic()
{
	if(!get_magic_quotes_gpc()&&isset($_POST))
	{
		foreach($_POST as $key=>$v)
		{
			if(!is_array($v))
				$_POST[$key]=addslashes($v);
		}
	}
	//要过滤的字符

   $_SERVER["REQUEST_URI"]=request_uri();
   if(inject_check($_SERVER["REQUEST_URI"]))
	 {
	   echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><center><br>-----------------------------------------------------------------------------------------------<br>';
  echo '你的URL中含有非法字符串,请勿恶意进行破坏!<br />';
  echo '操作时间:'.date("Y-m-d H:i:s").'<br />';
  echo '你的IP:'.getIP().'<br>';
  echo '你的浏览器:'.getbrowser().'<br>';
  echo '你的操作系统:'.getOS().'<br>';
  echo '你使用的错误参数:'.$_SERVER["REQUEST_URI"].'<br>-----------------------------------------------------------------------------------------------</center>';
       die;
	 } 
	    if(!empty($_GET["firstRow"])&&!is_numeric($_GET["firstRow"]))
	 {
	   echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><center><br>-----------------------------------------------------------------------------------------------<br>';
  echo '你的URL中含有非法字符串,请勿恶意进行破坏!<br />';
  echo '操作时间:'.date("Y-m-d H:i:s").'<br />';
  echo '你的IP:'.getIP().'<br>';
  echo '你的浏览器:'.getbrowser().'<br>';
  echo '你的操作系统:'.getOS().'<br>';
  echo '你使用的错误参数:'.$_SERVER["REQUEST_URI"].'<br>-----------------------------------------------------------------------------------------------</center>';
       die;
	 } 
	  if(!empty($_GET["totalRows"])&&!is_numeric($_GET["totalRows"]))
	 {
	   echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><center><br>-----------------------------------------------------------------------------------------------<br>';
  echo '你的URL中含有非法字符串,请勿恶意进行破坏!<br />';
  echo '操作时间:'.date("Y-m-d H:i:s").'<br />';
  echo '你的IP:'.getIP().'<br>';
  echo '你的浏览器:'.getbrowser().'<br>';
  echo '你的操作系统:'.getOS().'<br>';
  echo '你使用的错误参数:'.$_SERVER["REQUEST_URI"].'<br>-----------------------------------------------------------------------------------------------</center>';
       die;
	 } 
}

//阻止IP访问 如，$ip="202.102.*"
function stop_ip($ip)
{
	if(is_array($ip))
	{
		$thisip=getip();
		foreach($ip as $v)
		{	
			if(!empty($thisip))
			{	
				$pos = strpos($thisip, str_replace('.*','',$v));
				if($pos===false)
					;
				else
					die('100');
			}
		}
	}
}
//只允许IP访问 如，$ip="202.102.*"
function pass_ip($ip)
{
	if(is_array($ip))
	{
		$thisip=getip();
		foreach($ip as $v)
		{	
			if(!empty($thisip))
			{	
				$pos = strpos($thisip, str_replace('.*','',$v));
				if($pos===false)
					die('100');
				else
					;
			}
		}
	}
}
function csubstr($str,$start)
{ 
	preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $str, $ar); 
	if(func_num_args() >= 3) { 
		$end = func_get_arg(2); 
	return join("",array_slice($ar[0],$start,$end)); 
	} else { 
	return join("",array_slice($ar[0],$start)); 
	} 
}


function randuid($uid)
{
	$time=time();
	$randstr=substr(md5(microtime()),0,9);
	$loc=rand(1,8);
	$str='';
	$str=$loc.$time.substr($randstr,0,$loc).$uid.substr($randstr,-(9-$loc));
	$str=str_replace('=','',base64_encode(xorop($str)));
	$str=strtoupper(substr(md5($str),0,6)).$str;
	return $str;
}

function retuid($mid)
{
	$nowtime=time();
	$hash=strtolower(substr($mid,0,6));
	$decode=substr($mid,6);
	if(substr(md5($decode),0,6)!=$hash) return -1;
	$str=xorop(base64_decode($decode));
	$validtime=intval(substr($str,1,10));
	if(($nowtime-$validtime)>300)
		return -1;
	else
	{
		$loc=substr($str,0,1);
		$len=strlen($str);
		return substr($str,(11+$loc),($len-20));
	}
}

function xorop($string)
{
	global $authkey;
	$encode='';
	for($i=0,$j=strlen($string);$i<$j;$i++)
	{
		$encode.=$string[$i]^$authkey;
	}
	return $encode;
}


function send_sms($mobile,$content)
{
	global $config;
	$api="http://a1.imrobots.cn/utf8/interface/send_sms.aspx?username=".$config['smsuser']."&password=".$config['smspwd']."&receiver=".$mobile."&content=".urlencode($content);
	$result = file_get_contents($sendurl);
	$xml = simplexml_load_string($result);
     if ($xml->result < 0)
	{
		return $xml->message;
	}
}
$vf='0';
function send_mail($email,$name,$title,$con,$from=NULL)
{	
	global $webroot,$config;
	if(!empty($config["smtp"]))
	{	
		include_once($webroot."/module/phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP();                        
		$mail->Host = $config["smtp"];  	
		$sm=explode(":",$config["smtp"]);
		if(count($sm)>=2)
			$mail->Port = $sm[1];  	   
		$mail->SMTPAuth = true;                
		$mail->Username = $config["cemail"];               
		$mail->Password = $config["emailpass"];          
		$mail->From = $config["cemail"];                 
		$mail->FromName=$config['sitetitle']; 
		$mail->AddReplyTo=$from;//回复地址
		$mail->WordWrap = 50;           
		$mail->AddAddress($email,$name);
		$mail->IsHTML(true);                
		$mail->CharSet="utf-8";
		$mail->Subject =$title; 
		$mail->Body =$con;
		$re=$mail->send();
		return $re;
	}
	else
	{
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
		$headers .= 'From: '.$from.'<'.$config['sitetitle'].'>' . "\r\n";
		$oks=mail($email,$title,$con,$headers);
		return $oks;
	}
}


//检查手机号
function ismobile($mobile)
{
	return preg_match("/^13\d{9}$/", $mobile) || preg_match("/^15\d{9}$/", $mobile) || preg_match("/^18\d{9}$/", $mobile) || preg_match("/^14\d{9}$/", $mobile)  || preg_match('/^09\d{8}$/',$mobile);
}

//发送短信
function sendsms($user, $pass, $mobile, $content)
{
	if(!ismobile($mobile)) {
		 die("手机号码不正确");
	}
	elseif(empty($content)) {
		 die("短信内容不能为空！");
	}
	else
	{
		//发送地址
		$content = urlEncode($content);
		$sendurl = "http://api.twsms.com/send_sms.php?username=$user&password=$pass&type=now&encoding=unicode&mobile=$mobile&message=$content";
		
		$result = get_url_content($sendurl);

		$data = explode("=",$result);

		if (intval($data[1]) > 0)
		{
			return true;
		}
		else
		{
			return $data[1];
		}
	}
}
function get_url_content($url) {
   if( !$url ) { return ''; }
   $url .= '&'.time(); $ch = '';

   if( function_exists('curl_init') ){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	ob_start();
	@curl_exec($ch); @curl_close($ch);
	$ch=ob_get_contents(); ob_end_clean();
	$ch != '' && $ch .= '';
   }

   if( $ch=='' && function_exists('fsockopen') ){
	$ch = parse_url($url);
	!$ch['port'] && $ch['port'] = '80';
	$fp = @fsockopen( $ch['host'], $ch['port'] );
	if( $fp ){
		$ch = "GET {$ch['path']}?{$ch['query']} HTTP/1.1\r\nAccept: */*\r\nAccept-Language: zh-cn\r\nAccept-Encoding: gzip, deflate\r\nUser-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Maxthon; InfoPath.1; .NET CLR 2.0.50727)\r\nHost: {$ch['host']}\r\nConnection: Close\r\n\r\n";
		fwrite( $fp, $ch );
		$ch = ''; $inheader = 1;
		while( !feof($fp) ){
			if( $inheader==1 ){
				$ch = fgets($fp,1024);
				( $ch=="\n" || $ch=="\r\n" ) && $inheader = 0;
				$ch = '';
			}else{
				$ch .= fgets($fp, 1024);
			}
		}
		fclose($fp);
	}
	$ch != '' && $ch .= '';
   }

   if( $ch=='' && function_exists('file_get_contents') ){
	$i = 0;
	while( !$ch && $i<5 ){
		$ch = @file_get_contents($url.$i);
		$i++; sleep(1);
	}
	$ch != '' && $ch .= '';
   }

   if( $ch=='' && function_exists('file') ){
	$i = 0;
	while( !$ch && $i<5 ){
		$ch = implode('', @file($url.($i+6)));
		$i++; sleep(1);
	}
	$ch != '' && $ch .= '';
   }

   return $ch;
}

function convertip($ip) {  
	global $webroot; 
    $dat_path =  $webroot.'/includes/qqwry.Dat';  
  
 
    if(!preg_match("/^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$/", $ip)) {  
        return 'IP Address Error';  
    }  
 
    if(!$fd = @fopen($dat_path, 'rb')){  
        return 'IP date file not exists or access denied';  
    }  
  
 
    $ip = explode('.', $ip);  
    $ipNum = $ip[0] * 16777216 + $ip[1] * 65536 + $ip[2] * 256 + $ip[3];  
  
 
    $DataBegin = fread($fd, 4);  
    $DataEnd = fread($fd, 4);  
    $ipbegin = implode('', unpack('L', $DataBegin));  
    if($ipbegin < 0) $ipbegin += pow(2, 32);  
    $ipend = implode('', unpack('L', $DataEnd));  
    if($ipend < 0) $ipend += pow(2, 32);  
    $ipAllNum = ($ipend - $ipbegin) / 7 + 1;  
      
    $BeginNum = 0;  
    $EndNum = $ipAllNum;  
  

    while($ip1num>$ipNum || $ip2num<$ipNum) {  
        $Middle= intval(($EndNum + $BeginNum) / 2);  
  
 
        fseek($fd, $ipbegin + 7 * $Middle);  
        $ipData1 = fread($fd, 4);  
        if(strlen($ipData1) < 4) {  
            fclose($fd);  
            return 'System Error';  
        }  

        $ip1num = implode('', unpack('L', $ipData1));  
        if($ip1num < 0) $ip1num += pow(2, 32);  
          

        if($ip1num > $ipNum) {  
            $EndNum = $Middle;  
            continue;  
        }  
          

        $DataSeek = fread($fd, 3);  
        if(strlen($DataSeek) < 3) {  
            fclose($fd);  
            return 'System Error';  
        }  
        $DataSeek = implode('', unpack('L', $DataSeek.chr(0)));  
        fseek($fd, $DataSeek);  
        $ipData2 = fread($fd, 4);  
        if(strlen($ipData2) < 4) {  
            fclose($fd);  
            return 'System Error';  
        }  
        $ip2num = implode('', unpack('L', $ipData2));  
        if($ip2num < 0) $ip2num += pow(2, 32);  
  
 
        if($ip2num < $ipNum) {  
            if($Middle == $BeginNum) {  
                fclose($fd);  
                return 'Unknown';  
            }  
            $BeginNum = $Middle;  
        }  
    }  
  
    $ipFlag = fread($fd, 1);  
    if($ipFlag == chr(1)) {  
        $ipSeek = fread($fd, 3);  
        if(strlen($ipSeek) < 3) {  
            fclose($fd);  
            return 'System Error';  
        }  
        $ipSeek = implode('', unpack('L', $ipSeek.chr(0)));  
        fseek($fd, $ipSeek);  
        $ipFlag = fread($fd, 1);  
    }  
  
    if($ipFlag == chr(2)) {  
        $AddrSeek = fread($fd, 3);  
        if(strlen($AddrSeek) < 3) {  
            fclose($fd);  
            return 'System Error';  
        }  
        $ipFlag = fread($fd, 1);  
        if($ipFlag == chr(2)) {  
            $AddrSeek2 = fread($fd, 3);  
            if(strlen($AddrSeek2) < 3) {  
                fclose($fd);  
                return 'System Error';  
            }  
            $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));  
            fseek($fd, $AddrSeek2);  
        } else {  
            fseek($fd, -1, SEEK_CUR);  
        }  
  
        while(($char = fread($fd, 1)) != chr(0))  
            $ipAddr2 .= $char;  
  
        $AddrSeek = implode('', unpack('L', $AddrSeek.chr(0)));  
        fseek($fd, $AddrSeek);  
  
        while(($char = fread($fd, 1)) != chr(0))  
            $ipAddr1 .= $char;  
    } else {  
        fseek($fd, -1, SEEK_CUR);  
        while(($char = fread($fd, 1)) != chr(0))  
            $ipAddr1 .= $char;  
  
        $ipFlag = fread($fd, 1);  
        if($ipFlag == chr(2)) {  
            $AddrSeek2 = fread($fd, 3);  
            if(strlen($AddrSeek2) < 3) {  
                fclose($fd);  
                return 'System Error';  
            }  
            $AddrSeek2 = implode('', unpack('L', $AddrSeek2.chr(0)));  
            fseek($fd, $AddrSeek2);  
        } else {  
            fseek($fd, -1, SEEK_CUR);  
        }  
        while(($char = fread($fd, 1)) != chr(0)){  
            $ipAddr2 .= $char;  
        }  
    }  
    fclose($fd);  
  
    if(preg_match('/http/i', $ipAddr2)) {  
        $ipAddr2 = '';  
    }  
    $ipaddr = "$ipAddr1 $ipAddr2";  
    $ipaddr = preg_replace('/CZ88.Net/is', '', $ipaddr);  
    $ipaddr = preg_replace('/^s*/is', '', $ipaddr);  
    $ipaddr = preg_replace('/s*$/is', '', $ipaddr);  
    if(preg_match('/http/i', $ipaddr) || $ipaddr == '') {  
        $ipaddr = 'Unknown';  
    }  
  
    return $ipaddr;  
}  
   
function findstr($str, $substr)  
{  
         $m = strlen($str);  
        $n = strlen($substr );  
        if ($m < $n) return false ;  
        for ($i=0; $i <=($m-$n+1); $i ++){  
                $sub = substr( $str, $i, $n);  
                if ( strcmp($sub, $substr) == 0) return true;  
        }  
        return false ;  
} 

 function getid($string, $operation = 'DECODE', $key = '', $expiry = 0) {  
	 global $authkey;
     $ckey_length = 4;    
     $key = md5($key ? $key : $authkey);  
     $keya = md5(substr($key, 0, 16));  
     $keyb = md5(substr($key, 16, 16));  
     $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';  
     $cryptkey = $keya.md5($keya.$keyc);  
     $key_length = strlen($cryptkey);  
    $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;  
     $string_length = strlen($string);  
     $result = '';  
     $box = range(0, 255);  
     $rndkey = array();  
     for($i = 0; $i <= 255; $i++) {  
         $rndkey[$i] = ord($cryptkey[$i % $key_length]);  
     }  
     for($j = $i = 0; $i < 256; $i++) {  
         $j = ($j + $box[$i] + $rndkey[$i]) % 256;  
         $tmp = $box[$i];  
         $box[$i] = $box[$j];  
         $box[$j] = $tmp;  
     }  

     for($a = $j = $i = 0; $i < $string_length; $i++) {  
         $a = ($a + 1) % 256;  
         $j = ($j + $box[$a]) % 256;  
         $tmp = $box[$a];  
         $box[$a] = $box[$j];  
         $box[$j] = $tmp;  

         $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));  
     }  
     if($operation == 'DECODE') {  

        
         if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {  
             return substr($result, 26);  
         } else {  
             return '';  
         }  
     } else {        
         return $keyc.str_replace('=', '', base64_encode($result));  
     }  
 }  
?>