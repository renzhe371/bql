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
		global $db_soft;
		parent::__construct($server,$request);
        $this->table=$db_soft;
		$this->table_name=_TABLE."soft";
		
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
		$where=" where soft_cid<>'0' and soft_cid<>'' ";
        if(!empty($form['parent_id']))
		{
            $s = "select  category_id from  pro_corp_category where  parent_id=".$form['parent_id'];
             // $res = mysql_query($s);
             $res = $dbclass->GetAll($s);
             foreach($res as $val){
                 $arr[] = $val['category_id'];
             }
             $soft_cid =   @implode(",", $arr);

             $where.=" and FIND_IN_SET(soft_cid, '$soft_cid') ";
		}
		if(!empty($form['category_id']))
		{
			if(empty($form['parent_id']))
				$form['parent_id']=$this->getParentId($form['category_id'],"corp_category");
			$where.=" and soft_cid='".$form['category_id']."'";
		}

		$sql="SELECT count(soft_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/$this->rows_per_page);
		}
		$sql="SELECT * FROM ".$this->table_name;
		$sql.=$where;
		
		//按时间或热度排序
		if(!empty($form['soft_cid'])){
		
			$sql.=" ORDER BY order_num desc, create_time desc";
		}else{ 
			
			if(!empty($_GET['order'])&&$_GET['order']=='hots'){
				
				$sql.=" ORDER BY soft_hits desc";
				$smarty->assign("hots",'1');
			}else{
			
				$sql.=" ORDER BY create_time desc";
			}
		}
		$sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;

		$res = $dbclass->GetAll($sql);
		
		if(!empty($res))
		{
			foreach ($res as $k=>$v)
			{
				$res[$k]["description"]=mb_strcut(strip_tags($v['description']),0,420,"UTF-8");
				if(!empty($v["soft_img"]))
				{
					$res[$k]['s_image_path']=str_replace(basename($v['soft_img']),'s_'.basename($v['soft_img']),$v['soft_img']);
				}
			}
		}
		$smarty->assign("list",$res);
		
		$soft_sql="SELECT soft_id,soft_name,create_time,description FROM "._TABLE."soft";
		$soft_sql.=" ORDER BY order_num desc, create_time desc";
		$soft_sql.=" LIMIT 0,9";
		$soft_res = $dbclass->GetAll($soft_sql);
		
		$smarty->assign("soft_list",$soft_res);
		
		//公司
		$corp_sql="select * from "._TABLE."corp";
		$corp_sql.=" ORDER BY order_num desc";
		$corp_list = $dbclass->GetAll($corp_sql);
		
		$smarty->assign("corp_list",$corp_list);//var_dump($corp_list);
		
		//类别
		$cat_sql="select * from "._TABLE."corp_category";
		if(!empty($form['parent_id'])){
			
			$cat_sql.=" where parent_id=".$form['parent_id'];
		}
		$cat_sql.=" ORDER BY order_num desc";
		$cat_list = $dbclass->GetAll($cat_sql);
		
		$smarty->assign("cat_list",$cat_list);
		
		//最新软件
		$smarty->assign("bql_list",$this->getN(4));
		$smarty->assign("p2n_list",$this->getN(3));
		$smarty->assign("zlb_list",$this->getN(2));
		$smarty->assign("darl_list",$this->getN(1));

		$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
		$smarty->assign("pageList",$pagestr);
		$this->SessionSet ( 'session_p', $form["p"] );
		$this->SessionSet ( 'session_category_id', @$form["soft_cid"] );
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);//echo "<pre>";print_r($form);echo "</pre>";
		$smarty->assign("form",$form);
		$this->template_name="softList.tpl";
	}
	
	function getN($pid){
		
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
			
		$nsql="select p.* from "._TABLE."soft as p,"._TABLE."corp_category as c";
		$nsql.=" where p.soft_cid=c.category_id and c.parent_id=".$pid;
		$nsql.=" ORDER BY p.order_num desc,p.create_time desc";
		$nsql.=" limit 3";
		$nlist = $dbclass->GetAll($nsql);
		
		return $nlist;
	}
	
	function VIEW($form) {
		if(!empty($form["soft_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where soft_id = '".$form["soft_id"]."'";
			$res=$dbclass->GetRow($sql);
			
			//最新软件
			$smarty->assign("bql_list",$this->getN(4));
			$smarty->assign("p2n_list",$this->getN(3));
			$smarty->assign("zlb_list",$this->getN(2));
			$smarty->assign("darl_list",$this->getN(1));
			
			//浏览次数
			$allowTime = 5;//防刷新时间 
			$ip = $this->get_client_ip(); 
			$allowT = md5($ip);    
			if(!isset($_SESSION[$allowT]))         
			{      
				$soft_hits_sql="update ".$this->table_name." set soft_hits=soft_hits+1 where soft_id=".$form['soft_id'];
				$soft_hits=$dbclass->ExecuteSQL($soft_hits_sql);        
				$_SESSION[$allowT] = time();         
			}elseif(time() - $_SESSION[$allowT]>$allowTime){ 
				
				$soft_hits_sql="update ".$this->table_name." set soft_hits=soft_hits+1 where soft_id=".$form['soft_id'];
				$soft_hits=$dbclass->ExecuteSQL($soft_hits_sql);         
				$_SESSION[$allowT] = time();         
			}
			
			if(!empty($res))
			{
				$smarty->assign("res",$res);
				$form['soft_cid'] = $this->SessionGet ( 'session_category_id' );
		
				$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
				$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
				$company_res = $dbclass->GetAll($company_sql);
				$smarty->assign("company_list",$company_res);

				$smarty->assign("form",$form);
				$this->template_name="softContent.tpl";
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