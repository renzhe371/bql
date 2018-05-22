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
	var $rows_per_page ="6";
	
	function thisPage(&$server,&$request) {
		global $db_tech;
		parent::__construct($server,$request); $this->table=$db_tech;
		$this->table_name=_TABLE."tech";
		
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
		
		$sql="SELECT tech_id,tech_name,tech_content FROM ".$this->table_name;
		$sql.=" where tech_id=".$form['tech_id'];

		$res = $dbclass->GetAll($sql);
		$smarty->assign("res",$res[0]);
		
		$where=' where 1=1 ';
		if(!empty($form['category_id']))
		{
			$where.=" and case_corp='".$form['category_id']."'";
		}
		$sql="SELECT count(news_id) FROM "._TABLE."news";
		$sql.=$where." and case_status=1";
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		
		$case_sql="SELECT news_id,news_title,category_id,image_path,news_ms,hits,create_time FROM "._TABLE."news";
		$case_sql.=$where." and case_status=1";
		$case_sql.=" ORDER BY order_num desc, create_time desc";
		$case_sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;
		
		$case_res = $dbclass->GetAll($case_sql);
		if(!empty($case_res))
		{
			foreach ($case_res as $k=>$v)
			{
				$case_res[$k]["news_ms"]=mb_strcut(strip_tags($v['news_ms']),0,480,"UTF-8");
			}
		}
		
		$smarty->assign("case_list",$case_res);
		
		//最新新闻
		$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,3";
		$news_res = $dbclass->GetAll($news_sql);
		
		$smarty->assign("news_list",$news_res);
		
		$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
		$smarty->assign("pageList",$pagestr);
		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["category_id"] );
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);

		$smarty->assign("form",$form);
		$this->template_name="techContent.tpl";
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>