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
	var $rows_per_page ="8";
	
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
		$where=" ";
        
		if(!empty($form['category_id']))
		{
			$where.=" where category_id='".$form['category_id']."'";
		}

		$sql="SELECT count(id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		
		//分类
		$cat_sql="select * from "._TABLE."exper_category";
		$cat_sql.=" ORDER BY order_num desc";
		$cat_list = $dbclass->GetAll($cat_sql);
		$smarty->assign("cat_list",$cat_list);
		
		//调用列表
		$res1=$this->getCatid($cat_list[0]['category_id']);
		$res2=$this->getCatid($cat_list[1]['category_id']);
		$smarty->assign("list1",$res1);
		$smarty->assign("list2",$res2);

		$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
		$smarty->assign("pageList",$pagestr);
		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["category_id"] );
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);//echo "<pre>";print_r($form);echo "</pre>";
		$smarty->assign("form",$form);
		$this->template_name="ExperService.tpl";
	}
	
	function getCatid($cid){
		
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		
		$sql="SELECT * FROM ".$this->table_name." where category_id=".$cid." ORDER BY order_num desc,id desc";
		$res = $dbclass->GetAll($sql);
		return $res;
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>