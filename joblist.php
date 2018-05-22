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
	var $rows_per_page ="999";
	
	function thisPage(&$server,&$request) {
		global $db_job;
		parent::__construct($server,$request); $this->table=$db_job;
		$this->table_name=_TABLE."job";
		
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

		$sql="SELECT count(job_id) FROM ".$this->table_name;
		$recNum = $dbclass->GetOne($sql);

		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		$sql="SELECT job_id,job_jobs,place,treatment,gender,age,professional,schooling,number,linit,update_time FROM ".$this->table_name;
        $sql.=" ORDER BY update_time desc";
		$sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;
		$res = $dbclass->GetAll($sql);
		
		if(!empty($res))
		{
			foreach ($res as $k=>$v)
			{
				$res[$k]["job_jobs"]=mb_substr(strip_tags($v['job_jobs']),0,80,"UTF-8");
				if(!empty($v["image_path"]))
				{
					$res[$k]['s_image_path']=str_replace(basename($v['image_path']),'s_'.basename($v['image_path']),$v['image_path']);
				}
			}
		}
		
		$smarty->assign("list",$res);
		
		
		$sql="select campus from "._TABLE."company";
		$campus_content=$dbclass->GetOne($sql);
		$smarty->assign("campus_content",$campus_content);

		//最新新闻
		$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,3";
		$news_res = $dbclass->GetAll($news_sql);
		
		$smarty->assign("news_list",$news_res);

		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);
		$smarty->assign("form",$form);
		$this->template_name="jobList.tpl";
	}
	
	function VIEW($form) {
		if(!empty($form["job_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where job_id = '".$form["job_id"]."'";
			$res=$dbclass->GetRow($sql);
			
			
			//最新新闻
			$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
			$news_sql.=" ORDER BY order_num desc, create_time desc";
			$news_sql.=" LIMIT 0,3";
			$news_res = $dbclass->GetAll($news_sql);
			
			$smarty->assign("news_list",$news_res);

			if(!empty($res))
			{
				$smarty->assign("res",$res);
				$form['category_id'] = $this->SessionGet ( 'session_category_id' );
				$form['preId']=$this->getPreId($res["order_num"],$res["update_time"],$res["job_id"],$form['category_id']);
				$form['nextId']=$this->getNextId($res["order_num"],$res["update_time"],$res["job_id"],$form['category_id']);
				$form['parent_id']=$this->getParentId($form['category_id'],"job_category");

		        $company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		        $company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		        $company_res = $dbclass->GetAll($company_sql);
		        $smarty->assign("company_list",$company_res);
				$smarty->assign("form",$form);
				$this->template_name="jobContent.tpl";
			}
			else 
				$this->Location("error.php");
		}
		else 
		  $this->Location("error.php");
	}
	
	function getPreId($order_num,$update_time,$id,$category_id=null)
	{
		$dbclass=$this->getDBInstance();
		$sql="select job_id from ".$this->table_name;
		$where=" where (order_num > '".$order_num."' or (order_num = '".$order_num."' and update_time > '".$update_time."')) and job_id <> '".$id."'";
		$orderby=" order by order_num asc,update_time asc limit 0,1";
		if(!empty($category_id))
		{
			$where.=" and category_id='".$category_id."'";
		}
		$preId=$dbclass->GetOne($sql.$where.$orderby);
		if(empty($preId))
			$preId=0;
			
		return $preId;
	}
	
	function getNextId($order_num,$update_time,$id,$category_id=null)
	{
		$dbclass=$this->getDBInstance();
		$sql="select job_id from ".$this->table_name;
		$where=" where (order_num < '".$order_num."' or (order_num = '".$order_num."' and update_time < '".$update_time."')) and job_id <> '".$id."'";
		$orderby=" order by order_num desc,update_time desc limit 0,1";
		if(!empty($category_id))
		{
			$where.=" and category_id='".$category_id."'";
		}
		$nextId=$dbclass->GetOne($sql.$where.$orderby);
		if(empty($nextId))
			$nextId=-1;
			
		return $nextId;
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>