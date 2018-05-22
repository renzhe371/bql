<?php 
require_once('include/lib/MyWeb.class');
class thisPage extends MyWeb {
		
	var $table_name ="";
	var $table=array();
	var $item_per_page = 6;
	
	function thisPage(&$server,&$request) {
		global $db_notice;
		parent::__construct($server,$request);
		 
		$this->table=$db_notice;
		$this->table_name=_TABLE."notice";
		
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

		//Limit our results within a specified range.
		$sql="select date_format(create_time,'%Y%m') as pubtime,count(*) as cnt from ".$this->table_name;
		$sql.=" group by pubtime order by pubtime desc LIMIT $position, $this->item_per_page";
		$res=mysql_query($sql) or die(mysql_error());
		while($row = mysql_fetch_array($res)){
			
			$row['YY']=substr($row["pubtime"],0,4);
			$row['MM']=substr($row["pubtime"],4,6);
			
			echo '<li><i>.</i><a href="Notice'.$row["pubtime"].'.html">
					'.$row["YY"].'年'.$row["MM"].'月
					('.$row["cnt"].')
				</a></li>';
		}
	}
}		
$thisPage = new thisPage ( $_SERVER, $_REQUEST );
?>