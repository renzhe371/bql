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
		global $db_zhibo_h5;
		parent::__construct($server,$request);
        $this->table=$db_zhibo_h5;
		$this->table_name=_TABLE."zhibo_h5";
		
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
		$form['hid']=$session_category_id;
		return $this->IMDEX ($form);
	}
	
	function IMDEX($form){

		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		
		if(empty($form['p']))
		{
			$form['p']='1';
		}
		$where=" where hid<>'0' and hid<>'' ";
       
		if(!empty($form['hid']))
		{
			$where.=" and hid='".$form['hid']."'";
		}

		$sql="SELECT count(img_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		$sql="SELECT * FROM ".$this->table_name;
		$sql.=$where;
		
		//按时间或热度排序
		if(!empty($form['hid'])){
		
			$sql.=" ORDER BY order_num desc, create_time desc";
		}else{ 
			
			$sql.=" ORDER BY create_time desc";
		}
		$sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;

		$res = $dbclass->GetAll($sql);
		$smarty->assign("list",$res);
		
		//最新活动大图
		$H_sql="select * from "._TABLE."zhibo_h5";
		$H_sql.=" where image_path2<>'' ";
		$H_sql.=" ORDER BY order_num desc,img_id DESC";
		$H_sql.=" limit 5";
		$H_list=$dbclass->GetAll($H_sql);
		$smarty->assign("H_list",$H_list);
		
		//热门活动
		$h_sql="select * from "._TABLE."zhibo_h5";
		$h_sql.=" ORDER BY order_num desc,img_id DESC";
		$h_sql.=" limit 5";
		$h_list=$dbclass->GetAll($h_sql);
		$smarty->assign("h_list",$h_list);
		
		//活动分类
		$cat_sql="select * from "._TABLE."h5_category";
		$cat_sql.=" ORDER BY order_num desc";
		$cat_list=$dbclass->GetAll($cat_sql);
		$smarty->assign("cat_list",$cat_list);//echo "<pre>";print_r($_SERVER);echo "</pre>";

		$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
		$smarty->assign("pageList",$pagestr);
		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["hid"] );
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);
		$smarty->assign("form",$form);
		$this->template_name="H5list.tpl";
		
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);

?>