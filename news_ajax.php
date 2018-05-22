<?php  
require_once('include/lib/MyWeb.class');

class thisPage extends MyWeb {
		
	var $table_name ="";
	var $table=array();
	var $item_per_page = 4;
	
	function thisPage(&$server,&$request) {
		global $db_picnews;
		parent::__construct($server,$request);
		 
		$this->table=$db_picnews;
		$this->table_name=_TABLE."picnews";
		
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
		$form['category_id']=$session_category_id;
		return $this->IMDEX ($form);
	}
	
	function IMDEX($form){
	
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		//sanitize post value
		$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}

		//get current starting point of records
		$position = (($page_number) * $this->item_per_page);
		$catid=$_POST['catid'];
		
		//Limit our results within a specified range.
		$sql="SELECT * FROM `pro_picnews` where category_id=".$catid;
		$sql.="	ORDER BY create_time DESC LIMIT $position, $this->item_per_page";
		
		$res=mysql_query($sql) or die(mysql_error());
		
		//output results from database  
		while($row = mysql_fetch_array($res))
		{  
			$row["image_name"]=mb_substr(strip_tags($row["image_name"]),0,18,"utf-8");
			$d=strtotime($row["create_time"]);
			$row["create_time"]=date('Y-m-d',$d); 
				
			echo '<li class="float-l">
					<a href="PicContent'.$row["image_id"].'.html">
						<img width="100%" src="http://www.protruly.com.cn/'.$row["image_path2"].'">
					</a>
					<h3 class="overflow-nowrap">
					<a href="PicContent'.$row["image_id"].'.html">			
						'.$row["image_name"].'
					</a>
					</h3>
					<p><span>'.$row["create_time"].'</span></p>
				</li>';
		} 				
	}
}
$thisPage = new thisPage ( $_SERVER, $_REQUEST );

