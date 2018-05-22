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
	var $rows_per_page ="7";
	
	function thisPage(&$server,&$request) {
		global $db_video;
		parent::__construct($server,$request); $this->table=$db_video;
		$this->table_name=_TABLE."video";
		
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
		
		//按时间倒序调用视频
		$sql="SELECT video_id,image_path,video_title,video_content,video_flv,category_id,create_time FROM ".$this->table_name;
		$sql1=$sql." where category_id=11 ORDER BY create_time desc,order_num desc LIMIT $this->rows_per_page";
		$res1 = $dbclass->GetAll($sql1);
		$smarty->assign("list1",$res1);
		
		$sql2=$sql." where category_id=12 ORDER BY create_time desc,order_num desc LIMIT $this->rows_per_page";
		$res2 = $dbclass->GetAll($sql2);
		$smarty->assign("list2",$res2);
		
		$sql3=$sql." where category_id=13 ORDER BY create_time desc,order_num desc LIMIT $this->rows_per_page";
		$res3 = $dbclass->GetAll($sql3);
		$smarty->assign("list3",$res3);
		
		$sql4=$sql." where category_id=14 ORDER BY create_time desc,order_num desc LIMIT $this->rows_per_page";
		$res4 = $dbclass->GetAll($sql4);
		$smarty->assign("list4",$res4);
		
		//最新新闻
		$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,3";
		$news_res = $dbclass->GetAll($news_sql);
		
		$smarty->assign("news_list",$news_res);
		
		//调用分页显示
		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["category_id"] );
		
		//头部标题等调用
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);

		$smarty->assign("form",$form);
		$this->template_name="videoList.tpl";
	}
	
	function VIEW($form) {
		if(!empty($form["video_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where video_id = '".$form["video_id"]."'";
			$res=$dbclass->GetRow($sql);
			if(!empty($res))
			{
				$smarty->assign("res",$res);

				$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
				$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
				$company_res = $dbclass->GetAll($company_sql);
				
				$smarty->assign("company_list",$company_res);
				$this->template_name="videoContent.tpl";
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