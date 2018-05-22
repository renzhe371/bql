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
	var $rows_per_page ="5";
	
	function thisPage(&$server,&$request) {
		global $db_service;
		parent::__construct($server,$request); $this->table=$db_service;
		$this->table_name=_TABLE."service";
		
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
		
		if(empty($form['p']))
		{
			$form['p']='1';
		}
		$where=" where category_id<>'0' and category_id<>'' ";
		if(!empty($form['category_id']))
		{
			$where.=" and category_id='".$form['category_id']."'";
		}
		$sql="SELECT count(service_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		$sql="SELECT service_id,service_title,service_content,category_id,update_time FROM ".$this->table_name;
		$sql.=$where;
		if(!empty($form['category_id']))
			$sql.=" ORDER BY order_num desc, update_time desc";
		else 
			$sql.=" ORDER BY update_time desc";
		$sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;
		$res = $dbclass->GetAll($sql);
		
		if(!empty($res))
		{
			foreach ($res as $k=>$v)
			{
				$res[$k]["service_content"]=mb_substr(strip_tags($v['service_content']),0,180,"UTF-8");
			}
		}

		$smarty->assign("list",$res);
		
		$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
		$smarty->assign("pageList",$pagestr);
		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["category_id"] );

		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);

		$smarty->assign("form",$form);
		$this->template_name="serviceList.tpl";
	}
	
	function VIEW($form) {
		if(!empty($form["service_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where service_id = '".$form["service_id"]."'";
			$res=$dbclass->GetRow($sql);
			if(!empty($res))
			{
				$smarty->assign("res",$res);
				$form['category_id'] = $this->SessionGet ( 'session_category_id' );

                $company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
                $company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
                $company_res = $dbclass->GetAll($company_sql);
                $smarty->assign("company_list",$company_res);

				$smarty->assign("form",$form);
				$this->template_name="serviceContent.tpl";
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