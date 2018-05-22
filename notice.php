<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	var $table_name ="";
	var $table=array();
	var $rows_per_page ="12";
	
	function thisPage(&$server,&$request) {
		global $db_notice;
		parent::__construct($server,$request); $this->table=$db_notice;
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
		if (empty ($form['p'])||!is_numeric($form['p'])){
			if(empty($session_p)||!is_numeric($session_p)) 
			{
				$session_p = 1;
			}
		}else{
			$session_p = $form['p'];
		}
		
		$form['p']=$session_p;

		return $this->IMDEX ($form);
	}
	
	function IMDEX($form){
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		
		if(empty($form['p']))
		{
			$form['p']='1';
		}
		$where="";
		if(!empty($form['pubtime']))
		{
			$where.=" where date_format(create_time,'%Y%m')='".$form['pubtime']."'";
		}

		$sql="SELECT count(notice_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		$sql="SELECT notice_id,hits,notice_title,notice_content,create_time FROM ".$this->table_name;
		$sql.=$where;
		$sql.=" ORDER BY create_time desc";
		$sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;
		$res = $dbclass->GetAll($sql);
		
		$smarty->assign("list",$res);
		
		//日期归档
		$date_sql="select date_format(create_time,'%Y%m') as pubtime,count(*) as cnt from ".$this->table_name;
		$date_sql.=" group by pubtime order by  pubtime desc";
		$date_res = $dbclass->GetAll($date_sql);
		$smarty->assign("date_res",$date_res);
		
		//最新新闻
		$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,3";
		$news_res = $dbclass->GetAll($news_sql);
		
		$smarty->assign("news_list",$news_res);
		
		$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
		$smarty->assign("pageList",$pagestr);
		$this->SessionSet ( 'session_p', $form["p"] );

		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);

		$smarty->assign("form",$form);
		$this->template_name="notice.tpl";
	}
	
	function VIEW($form) {
		if(!empty($form["notice_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where notice_id = '".$form["notice_id"]."'";
			$res=$dbclass->GetRow($sql);
			
			
			//最新新闻
			$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
			$news_sql.=" ORDER BY order_num desc, create_time desc";
			$news_sql.=" LIMIT 0,3";
			$news_res = $dbclass->GetAll($news_sql);
			
			$smarty->assign("news_list",$news_res);
			
			//浏览次数
			$allowTime = 5;//防刷新时间 
			$ip = $this->get_client_ip(); 
			$allowT = md5($ip);    
			if(!isset($_SESSION[$allowT]))         
			{      
				$hits_sql="update ".$this->table_name." set hits=hits+1 where notice_id=".$form['notice_id'];
				$hits=$dbclass->ExecuteSQL($hits_sql);        
				$_SESSION[$allowT] = time();         
			}elseif(time() - $_SESSION[$allowT]>$allowTime){ 
				
				$hits_sql="update ".$this->table_name." set hits=hits+1 where notice_id=".$form['notice_id'];
				$hits=$dbclass->ExecuteSQL($hits_sql);         
				$_SESSION[$allowT] = time();         
			}

			if(!empty($res))
			{
				$smarty->assign("res",$res);

                $company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
                $company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
                $company_res = $dbclass->GetAll($company_sql);
                $smarty->assign("company_list",$company_res);

				$smarty->assign("form",$form);
				$this->template_name="noticeContent.tpl";
			}
			else 
				$this->Location("error.php");
		}
		else 
		  $this->Location("error.php");
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>