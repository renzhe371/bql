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
	var $rows_per_page ="4";
	
	function thisPage(&$server,&$request) {
		global $db_picnews;
		parent::__construct($server,$request); $this->table=$db_picnews;
		$this->table_name=_TABLE."picnews";
		
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
		
		$sql="SELECT image_id,image_name,image_name2,image_path,description,create_time FROM ".$this->table_name;
		$sql.=" ORDER BY create_time desc LIMIT 5";
		$res = $dbclass->GetAll($sql);
		if(!empty($res))
		{
			foreach ($res as $k=>$v)
			{
				$res[$k]["description"]=mb_substr(strip_tags($v['description']),0,21,"UTF-8");
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
		
		$smarty->assign("pic_res1",$this->pic(1));
		$smarty->assign("pic_res2",$this->pic(2));
		$smarty->assign("pic_res4",$this->pic(4));
		$smarty->assign("pic_res6",$this->pic(6)); 

		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["category_id"] );
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);

		$smarty->assign("form",$form);
		$this->template_name="picnews.tpl";
	}
	
	public function pic($cid){

        $dbclass=$this->getDBInstance();
        $smarty = &$this->getSmartyInstance();

        $pic_sql="SELECT * FROM `pro_picnews` where category_id=".$cid;
        $pic_sql.=" ORDER BY create_time desc,order_num desc";
        $pic_res = $dbclass->GetAll($pic_sql);

        return $pic_res;
    }
	
	function VIEW($form) {
		if(!empty($form["image_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where image_id = '".$form["image_id"]."'";
			$res=$dbclass->GetRow($sql);
			
			//最新新闻
			$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
			$news_sql.=" ORDER BY order_num desc, create_time desc";
			$news_sql.=" LIMIT 0,3";
			$news_res = $dbclass->GetAll($news_sql);
			$smarty->assign("news_list",$news_res);
			
			$sql2="select * from "._TABLE."picdesc";
			$sql2.=" where category_id = '".$form["image_id"]."'";
			$list=$dbclass->GetAll($sql2);
			if(!empty($list))
			{	
				foreach ($list as $k=>$v)
				{
					$list[$k]["description"]=mb_substr(strip_tags($v['description']),0,280,"UTF-8");
					if(!empty($v["image_path"]))
					{
						$list[$k]['s_image_path']=str_replace(basename($v['image_path']),'s_'.basename($v['image_path']),$v['image_path']);
					}
				}
			
				$smarty->assign("res",$res);
				$smarty->assign("list",$list);
				$form['category_id'] = $this->SessionGet ( 'session_category_id' );

				$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
				$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
				$company_res = $dbclass->GetAll($company_sql);
				$smarty->assign("company_list",$company_res);

				$smarty->assign("form",$form);
				$this->template_name="picContent.tpl";
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