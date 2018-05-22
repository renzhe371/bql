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
		global $db_news;
		parent::__construct($server,$request);
        $this->table=$db_news;
		$this->table_name=_TABLE."news";
		
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
        if(!empty($form['parent_id']))
		{
            $s = "select  category_id from  pro_news_category where  parent_id=".$form['parent_id'];
             // $res = mysql_query($s);
             $res = $dbclass->GetAll($s);
             foreach($res as $val){
                 $arr[] = $val['category_id'];
             }
             $category_id =   @implode(",", $arr);

             $where.=" and FIND_IN_SET(category_id, '$category_id') ";
		}
		if(!empty($form['category_id']))
		{
			if(empty($form['parent_id']))
				$form['parent_id']=$this->getParentId($form['category_id'],"news_category");
			$where.=" and category_id='".$form['category_id']."'";
		}

		$sql="SELECT count(news_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		$sql="SELECT news_id,news_title,category_id,image_path,news_ms,hits,create_time FROM ".$this->table_name;
		$sql.=$where;

		if(!empty($form['category_id']))
			$sql.=" ORDER BY order_num desc, create_time desc";
		else 
			$sql.=" ORDER BY create_time desc";
		$sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;


		$res = $dbclass->GetAll($sql);
		
		if(!empty($res))
		{
			foreach ($res as $k=>$v)
			{
				$res[$k]["news_ms"]=mb_strcut(strip_tags($v['news_ms']),0,480,"UTF-8");
				if(!empty($v["image_path"]))
				{
					$res[$k]['s_image_path']=str_replace(basename($v['image_path']),'s_'.basename($v['image_path']),$v['image_path']);
				}
			}
		}
		$smarty->assign("list",$res);
		
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
		$this->template_name="newsList.tpl";
	}
	
	function VIEW($form) {
		if(!empty($form["news_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where news_id = '".$form["news_id"]."'";
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
				$hits_sql="update ".$this->table_name." set hits=hits+1 where news_id=".$form['news_id'];
				$hits=$dbclass->ExecuteSQL($hits_sql);        
				$_SESSION[$allowT] = time();         
			}elseif(time() - $_SESSION[$allowT]>$allowTime){ 
				
				$hits_sql="update ".$this->table_name." set hits=hits+1 where news_id=".$form['news_id'];
				$hits=$dbclass->ExecuteSQL($hits_sql);         
				$_SESSION[$allowT] = time();         
			}
			
			if(!empty($res))
			{
				$smarty->assign("res",$res);
				$form['category_id'] = $this->SessionGet ( 'session_category_id' );
				$form['preId']=$this->getPreId($res["order_num"],$res["create_time"],$res["news_id"],$form['category_id']);
				$form['nextId']=$this->getNextId($res["order_num"],$res["create_time"],$res["news_id"],$form['category_id']);
		
				$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
				$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
				$company_res = $dbclass->GetAll($company_sql);
				$smarty->assign("company_list",$company_res);

				$smarty->assign("form",$form);
				$this->template_name="newsContent.tpl";
			}
			else 
				$this->Location("error.php");
		}
		else 
		  $this->Location("error.php");
	}
	
	function getPreId($order_num,$create_time,$id,$category_id=null)
	{
		$dbclass=$this->getDBInstance();
		$sql="select news_id from ".$this->table_name;
		$where=" where (order_num > '".$order_num."' or (order_num = '".$order_num."' and create_time > '".$create_time."')) and news_id <> '".$id."'";
		$orderby=" order by order_num asc,create_time asc limit 0,1";
		if(!empty($category_id))
		{
			$where.=" and category_id='".$category_id."'";
		}
		$preId=$dbclass->GetOne($sql.$where.$orderby);
		if(empty($preId))
			$preId=0;
			
		return $preId;
	}
	
	function getNextId($order_num,$create_time,$id,$category_id=null)
	{
		$dbclass=$this->getDBInstance();
		$sql="select news_id from ".$this->table_name;
		$where=" where (order_num < '".$order_num."' or (order_num = '".$order_num."' and create_time < '".$create_time."')) and news_id <> '".$id."'";
		$orderby=" order by order_num desc,create_time desc limit 0,1";
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