<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	function thisPage(&$server,&$request) {
		parent::__construct($server,$request); $this->table_name=_TABLE."company";
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="IMDEX";
		}
		$this->$form['mode']($form);
	}
	
	function IMDEX($form){

		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();

		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);
		$this->template_name="message.tpl";
	}
	
	function SAVE($form) {

		global $db_message;
		$smarty = &$this->getSmartyInstance();
		$dbclass=$this->getDBInstance();
		$dbclass->SQLInsert ( _TABLE."message", $form, array_keys($db_message) );
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>