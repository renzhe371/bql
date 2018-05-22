<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	function thisPage(&$server,&$request) {
		parent::__construct($server,$request); 
		
		$this->table_name=_TABLE."company";
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
		$sql="select customer from ".$this->table_name;
		$customer_content=$dbclass->GetOne($sql);
		$smarty->assign("customer_content",$customer_content);
		$service_sql="SELECT service_id,service_title,service_content,order_num,update_time,create_time FROM "._TABLE."service";
		$service_sql.=" ORDER BY order_num desc, create_time desc";
		$service_sql.=" LIMIT 0,8";
		$service_res = $dbclass->GetAll($service_sql);
		$smarty->assign("service_list",$service_res);
        $news_sql="SELECT news_id,news_title,image_path,news_ms,order_num,update_time,create_time FROM "._TABLE."news";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,1";
		$news_res = $dbclass->GetAll($news_sql);
		$smarty->assign("news_list",$news_res);
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);
		$this->template_name="customer.tpl";
		
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);

?>