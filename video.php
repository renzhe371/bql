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
		$where=" where 1=1 ";
		if(!empty($form['category_id']))
		{
			$where.=" and category_id='".$form['category_id']."'";
		} 
		$sql="SELECT count(video_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		//按时间倒序调用所有视频
		$sql="SELECT video_id,image_path,video_title,video_content,video_flv,category_id,create_time FROM ".$this->table_name;
		$sql.=$where;
		if(!empty($form['category_id']))
			$sql.=" ORDER BY create_time desc,order_num desc";
		else 
			$sql.=" ORDER BY create_time desc";
		$sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;
		$res = $dbclass->GetAll($sql);
		
		if(!empty($res))
		{
			foreach ($res as $k=>$v)
			{
				if(!empty($v["image_path"]))
				{
					$res[$k]['s_image_path']=str_replace(basename($v['image_path']),'s_'.basename($v['image_path']),$v['image_path']);
				}
			}
		}
		$smarty->assign("list",$res);
		
		//最新新闻
		$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,3";
		$news_res = $dbclass->GetAll($news_sql);
		
		$smarty->assign("news_list",$news_res);
		
		//调用分页显示
		$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
		$smarty->assign("pageList",$pagestr);
		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["category_id"] );
		
		//头部标题等调用
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);

		$smarty->assign("form",$form);
		$this->template_name="video.tpl";
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