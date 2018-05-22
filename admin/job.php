<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('../include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	var $table_name ="";
	var $table=array();
	
	function thisPage(&$server,&$request) {
		global $db_job;
		parent::__construct($server,$request);
		
		$this->table=$db_job;
		$this->table_name=_TABLE."job";
		
		$smarty = &$this->getSmartyInstance();
		$smarty->assign("table",$this->table);
		 
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="SEARCH";
		}
		$this->$form['mode']($form);
	}
	
	function PAGELIST($form) {
		$session_search_form = $this->SessionGet ( _SESSION_SEARCH_FORM );
		if (empty ($form['p'])||!is_numeric($form['p'])){
			if(empty($session_search_form ['p'])||!is_numeric($session_search_form ['p'])) 
			{
				@$session_search_form ['p'] = 1;
			}
		}else{
			$session_search_form ['p'] = $form['p'];
		}
		if(!empty($form['ordField'])!="")
		{
			$session_search_form['ordField']= $form['ordField'];
		}
		return $this->SEARCH_PAGE ($session_search_form);
	}
	
	function SEARCH($form) {
		$form ['p'] = 1;
		return $this->SEARCH_PAGE ($form);
	}
	
	function SEARCH_PAGE($form){
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		
		$where=" where 1=1 ";
		
		$sql="SELECT count(job_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/ROWS_PER_PAGE) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/ROWS_PER_PAGE);
		}
		$sql="SELECT job_id,job_jobs,linit,place,category_id,order_num,update_time FROM ".$this->table_name;
		$sql.=$where;
		$sql.=" ORDER BY ".$this->setOrderBy($form,'order_num');
		$sql.=" LIMIT ".($form["p"]-1)*ROWS_PER_PAGE." , ".ROWS_PER_PAGE;
		$res = $dbclass->GetAll($sql);
		$smarty->assign("list",$res);
		$pagestr = $this->getPageListLine(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"]);
		$smarty->assign("pageList",$pagestr);
		$smarty->assign("form",$form);
		
		$this->SessionSet ( _SESSION_SEARCH_FORM, $form );
		$this->template_name="job_list.tpl";
	}
	
	function ADD($form) {
		$dbclass=$this->getDBInstance();
		$sql="select max(order_num) from ".$this->table_name;
		$max_order_num = $dbclass->GetOne($sql);
		$form["order_num"] = $max_order_num+1;
		$form["add_flg"]="1"; //add_flg:0　编辑　add_flg:1　添加
		$this->formPage($form);
	}
	
	function EDIT($form) {
		if(!empty($form["select_id"]))
		{
			$form["job_id"]=$form["select_id"][0];
		}
		if(!empty($form["job_id"]))
		{
			$dbclass=$this->getDBInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where job_id = '".$form["job_id"]."'";
			$res=$dbclass->GetRow($sql);
			if(!empty($res))
			{
				$form=$res;
				$form["add_flg"]="0"; //add_flg:0　编辑　add_flg:1　添加
				$this->formPage($form);
			}
		}
	}
	
	function formPage($form)
	{
		$smarty = &$this->getSmartyInstance();
		
		$smarty->assign("edit",$form);
		$this->template_name="job_edit.tpl";
	}
	
	function SAVE($form) {
		$smarty = &$this->getSmartyInstance();
		$dbclass=$this->getDBInstance();
		
		$error=$this->checkSave($this->table,$form);
		if(!empty($error))
		{
			$smarty->assign("error",$error);
			$this->formPage($form);
		}
		else 
		{
			if($form["add_flg"]=="1")
			{
				$sql="select max(job_id) from ".$this->table_name;
				$max_id = $dbclass->GetOne($sql);
			    $form['job_id'] =$max_id+1;
			}
			
			if(!file_exists(_UPLOAD_DIR_JOB))
				mkdir(_UPLOAD_DIR_JOB,0777);
			
			$file_path=_UPLOAD_DIR_JOB.$form['job_id']."/";
			if(!file_exists($file_path))
				mkdir($file_path,0777);
			

			
			if($form["add_flg"]=="1")
			{
				$form["create_time"]=$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLInsert ( $this->table_name, $form, array_keys($this->table) );
			}
			else 
			{
				$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table),"job_id='".$form['job_id']."'" );
			}
			$this->location ( "job.php?mode=PAGELIST" );
		}	
	}
	
	function checkSave($table,&$form)
	{
		$error=array();
		$dbclass=$this->getDBInstance();
		$check = &$this->getCheckInstance();
		$error=$check->run($table,$form);
		
		
		
		if(empty($error["job_jobs"])&&!empty($form["job_jobs"]))
		{
			$sql="select job_id from ".$this->table_name;
			$sql.=" where job_jobs = '".$form["job_jobs"]."'";
			if(!empty($form["job_id"])&&@$form["add_flg"]=="0")
			{
				$sql.=" and job_id <> '".$form["job_id"]."'";
			}
			$rec=$dbclass->GetOne($sql);
		}
		
		return $error;
	}
	
	function DEL($form)
	{
		if(!empty($form["job_id"]))
		{
			$form ["select_id"][0]=$form["job_id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$where = " job_id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLDelete($this->table_name,$where);
			
			foreach ($form ["select_id"] as $id)
			{
				$this->DelDir(_UPLOAD_DIR_JOB.$id."/");
			}
		}
		$this->location ( "job.php?mode=PAGELIST" );
		
	}
	
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>