<? session_start();
 if(!empty($_POST['code'])){
	
	$code = $_POST['code'];
	if(isset($_SESSION['expiretime'])) {
	
		if($_SESSION['expiretime'] < time()) {
		
			unset($_SESSION['expiretime']);
			unset($_SESSION['code']);
			if ($code!=$_SESSION['code']){
			
				echo "短信验证码错误" ;
				die;
			}
		} else {
		
			$_SESSION['expiretime'] = time() + 3600; // 刷新时间戳
			$code=$_SESSION['code'];
			echo $code;
		}
	}
}

/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	var $item_per_page = 1;
	var $table_name ="";
	var $table=array();
	
	function thisPage(&$server,&$request) {
		parent::__construct($server,$request); 
		$this->table_name=_TABLE."post";
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="IMDEX";
		}
		$this->$form['mode']($form);
	}
	
	function IMDEX($form){
		
		$smarty = &$this->getSmartyInstance();
        $dbclass=$this->getDBInstance();
		
		$mid=$_POST['mid'];
		$image_sql="select count(*) from "._TABLE."zhibo_image";
		$image_sql.=" where category_id=".$mid;
		$counts=$dbclass->GetOne($image_sql);
		$limits=$counts-intval($_POST['zb_num']);
		if($limits>0){
		
			$image_sql="select * from "._TABLE."zhibo_image";
			$image_sql.=" where category_id=".$mid;
			$image_sql.=" ORDER BY create_time DESC limit ".$limits;
			$res=mysql_query($image_sql) or die(mysql_error());
			$str='';
			while($row = mysql_fetch_array($res))
			{  
				//$d=strtotime($row["create_time"]);
					
				$str.='<li class="po-r">
						<a class="display-b" href="javascript:void(0);">
						<dl>
							<dt class="cf">
								<strong class="display-i float-l">'.$row["create_time"].'</strong>
							</dt>
							<dd style="position:relative">';
								if(!empty($row["image_path2"])){
								
									$str.='<i class="vr_i" onclick="$(this).hide();playVr('.$row["image_id"].')">进入全景</i>
										<img src="'.$row["image_path"].'" onclick="playVr('.$row["image_id"].')">
										<input type="hidden" id="img'.$row["image_id"].'" value="'.$row["image_path2"].'">
										<div class="pano" id="pano'.$row["image_id"].'"></div>';
								}else{
									
									$str.='<img  class="animated" data-animation="fadeIn" data-animation-delay="100" src="images/load.gif" data-src="'.$row["image_path"].'" alt="">
									<p>'.$row["description"].'</p>';
								}
							$str.='</dd>
						</dl>
						</a>
					</li>';
			}
			echo $str;	
		}
	}
	
	function NOTES($form){
		
		$smarty = &$this->getSmartyInstance();
        $dbclass=$this->getDBInstance();
		
		$mid=$_POST['mid'];
		
		//评论总数
		$sql="SELECT count(pid) FROM "._TABLE."post";
		$sql.=" where category_id=".$mid." and status=1 ";
		$recNum = $dbclass->GetOne($sql);
		
		$post_sql="select pid,tel,content,nick_name,creat_time from "._TABLE."post";
		$post_sql.=" where category_id=".$mid." and status=1 ";
		$post_sql.=" ORDER BY creat_time desc";
		
		$post_res=mysql_query($post_sql) or die(mysql_error());
		$k=0;
		$words = "庄敏|鹿鹏|保千里|陈杨辉|唐德川|王浩|汪洋";
		while($row = mysql_fetch_array($post_res))
		{  
			$row['nick_name'] = preg_replace('/\s/', '', trim($row['nick_name']));
			$row['nick_name'] = preg_replace('/'.$words.'/i', '**', trim($row['nick_name']));
			echo '<li>
					<div class="cf">
						<strong class="float-l">'.$row["nick_name"].'</strong>
						<i class="float-r">#'.($recNum-$k).'楼</i>
					</div>
					<span class="display-b">发表于：'.$row["creat_time"].'</span>
					<p>'.$row["content"].'</p>
				</li>';
			$k++;
		} 	
	}
	
	function SAVE($form) {

		global $db_post;
		$smarty = &$this->getSmartyInstance();
		$dbclass=$this->getDBInstance();
		
		$dbclass->SQLInsert ( _TABLE."post", $form, array_keys($db_post) );
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
