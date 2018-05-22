<?php
session_start();
header("content-type:text/html;charset=utf8");
//手机短信验证
include_once("include/CCPRestSDK.php");
//主帐号
$accountSid= 'aaf98f894f4fbec2014f6dab7cfb1481';

//主帐号Token
$accountToken= '35b9d4dd130547f6bc4e51732691bfb0';

//应用Id
$appId='8a48b5514f4fc588014f6dfe12f44179';
//$appId='8a48b5514f4fc588014f6dabf6d94007';

//请求地址，格式如下，不需要写https://
//$serverIP='sandboxapp.cloopen.com';
$serverIP='app.cloopen.com';

//请求端口 
$serverPort='8883';

//REST版本号
$softVersion='2013-12-26';
	
if(md5($_POST['randcode'])!=$_SESSION["auth"]){

	unset($_SESSION["auth"]);
	echo '图形验证码错误';
	die;
	
}
$rep="/^[1][358][0-9]{9}$/";
if(!preg_match($rep,$_POST['tel'])){
	
	echo "手机号码格式错误";
	die;
}else{
	
	$_SESSION['tel']=$_POST['tel'];
	//Demo调用,参数填入正确后，放开注释可以调用,测试模板ID为1 
	sendTemplate($_POST['tel'],array(rand(0,999999)),"34928");
	//sendTemplate('18124176325',array(rand(0,999999)),"1");
	die;
}

	
function sendTemplate($to,$datas,$tempId)
{
     // 初始化REST SDK
     global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
     $rest = new REST($serverIP,$serverPort,$softVersion);
     $rest->setAccount($accountSid,$accountToken);
     $rest->setAppId($appId);
    
     // 发送模板短信
    // echo "Sending TemplateSMS to $to ,";
     $result = $rest->sendTemplateSMS($to,$datas,$tempId);
     if($result == NULL ) {
         echo "result error!";
         die;
     }
     if($result->statusCode!=0) {
        // echo "error code :" . $result->statusCode . ",";
         //echo "error msg :" . $result->statusMsg . ",";
		 echo "您发送的短信已超过当日数量限制！";
         //TODO 添加错误处理逻辑
     }else{
        // echo "Sendind TemplateSMS success!";
         // 获取返回信息
         $smsmessage = $result->TemplateSMS;
         //echo "dateCreated:".$smsmessage->dateCreated.",";
         //echo "smsMessageSid:".$smsmessage->smsMessageSid.",";
         //TODO 添加成功处理逻辑
		 $_SESSION['code']=$datas[0];
		 $_SESSION['expiretime'] = time() + 3600; // 刷新时间戳
		 $code=$_SESSION['code'];
		 $str="短信已下发，请于10分钟内正确输入！";
		// $arr=array($code,$str);//print_r($arr);
		echo $code."-".$str;
     }
	
}
?>