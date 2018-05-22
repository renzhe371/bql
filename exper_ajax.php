<?php  
require_once('include/lib/MyWeb.class');

class thisPage extends MyWeb {
		
	var $table_name ="";
	var $table=array();
	
	function thisPage(&$server,&$request) {
		global $db_exper;
		parent::__construct($server,$request);
		 
		$this->table=$db_exper;
		$this->table_name=_TABLE."exper";
		
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="IMDEX";
		}
		$this->$form['mode']($form);
	}
	
	function PAGELIST($form) {
	
		$session_p = $this->SessionGet ( 'session_p' );
		$session_category_id = $this->SessionGet ( 'session_category_id' );
		if (empty ($form['p'])||!is_numeric($form['p'])){
			if(empty($session_p)||!is_numeric($session_p)) 
			{
				$session_p = 1;
			}
		}else{
			$session_p = $form['p'];
		}
		
		$form['p']=$session_p;
		//$form['category_id']=$session_category_id;
		return $this->IMDEX ($form);
	}
	
	function IMDEX($form){
	
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();

		$hid=$_POST['hid'];
		$sql="SELECT * FROM `pro_exper` where id=".$hid;
		//$res=mysql_query($sql) or die(mysql_error());
		
		$res=$dbclass->GetAll($sql);
		//output results from database  
		foreach($res as $row){
			
			$jingw=$row["jingw"];
			$name=$row["name"];
			$address=$row["address"];
			$str='';
			$str.='<div id="map_container" class="floatL shopBoxImg">
						<img src="'.$row["img_path1"].'"/>
					</div>
					<div class="floatR shopBoxText">
						<h3 class="sDName">'.$row["name"].'</h3>
						<p class="sDadd" name="112,200">'.$row["address"].'</p>
						<p class="sDpost">邮编：'.$row["postcode"].'</p>';
						if($row["c_name"]&&$row["c_phone"]){
							$str.='<p class="sDpost">联系人：'.$row["c_name"].'('.$row["c_phone"].')</p>';
						}
						if($row["c_phone2"]&&$row["c_phone2"]){
							$str.='<p class="sDpost">联系人：'.$row["c_name2"].'('.$row["c_phone2"].')</p>';
						}
						$str.='<strong class="displayBlock lighter mapBtn" onclick="creatMap('.$jingw.',\''.$name.'\',\''.$address.'\')">地图查找</strong>
						<div>
							<ul class="js_sDimgList overflow">';
							if($row["img_path1"]){$str.='<li><img src="'.$row["img_path1"].'"/></li>';}
							if($row["img_path2"]){$str.='<li><img src="'.$row["img_path2"].'"/></li>';}
							if($row["img_path3"]){$str.='<li><img src="'.$row["img_path3"].'"/></li>';}
							if($row["img_path4"]){$str.='<li><img src="'.$row["img_path4"].'"/></li>';}
							$str.='</ul>
						</div>
					</div>';
				echo $str;
		} 				
	}
}
$thisPage = new thisPage ( $_SERVER, $_REQUEST );

