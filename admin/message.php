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
		global $db_message;
		parent::__construct($server,$request);
		
		$this->table=$db_message;
		$this->table_name=_TABLE."message";
		
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
		if(isset($form["read_state"]) && $form["read_state"] != "")
		{
			$where.=" and read_state = '".$form['read_state']."'";
		}
		
		$sql="SELECT count(message_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/ROWS_PER_PAGE) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/ROWS_PER_PAGE);
		}
		$sql="SELECT message_id,name,company_name,create_time,reply_state FROM ".$this->table_name;
		$sql.=$where;
		$sql.=" ORDER BY ".$this->setOrderBy($form,'create_time');
		$sql.=" LIMIT ".($form["p"]-1)*ROWS_PER_PAGE." , ".ROWS_PER_PAGE;
		$res = $dbclass->GetAll($sql);
		$smarty->assign("list",$res);
		$pagestr = $this->getPageListLine(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"]);
		$smarty->assign("pageList",$pagestr);
		$smarty->assign("form",$form);
		
		$this->SessionSet ( _SESSION_SEARCH_FORM, $form );
		$this->template_name="message_list.tpl";
	}
	
	function VIEW($form) {
		if(!empty($form["select_id"]))
		{
			$form["message_id"]=$form["select_id"][0];
		}
		if(!empty($form["message_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			
			if(empty($form['read_state'])||$form['read_state']=='0')
			{
				$colArr=array("read_state","update_time");
				$updateForm=array("read_state"=>'1',"update_time"=>date("Y-m-d H:i:s"));
				$dbclass->SQLUpdate ( $this->table_name, $updateForm, $colArr,"message_id='".$form['message_id']."'" );
			}
			$sql="select * from ".$this->table_name;
			$sql.=" where message_id = '".$form["message_id"]."'";
			$res=$dbclass->GetRow($sql);
			
			$smarty->assign("view",$res);
			$smarty->assign("form",$form);
			$this->template_name="message_view.tpl";
		}
	}
	
	function SETREPLY($form)
	{
		if(!empty($form["message_id"]))
		{
			$form ["select_id"][0]=$form["message_id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$colArr=array("reply_state","update_time");
			$updateForm=array("reply_state"=>'1',"update_time"=>date("Y-m-d H:i:s"));
			$where = " message_id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLUpdate ($this->table_name, $updateForm, $colArr,$where );
		}
		$this->location ( "message.php?mode=PAGELIST" );
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
				$dbclass->SQLInsert ($this->table_name, $form, array_keys($this->table) );
			}
			else 
			{
				$dbclass->SQLUpdate ($this->table_name, $form, array_keys($this->table),"message_id='".$form['message_id']."'" );
			}
			$this->location ( "message.php?mode=PAGELIST" );
		}	
	}
	
	function checkSave($table,&$form)
	{
		$error=array();
		$dbclass=$this->getDBInstance();
		$check = &$this->getCheckInstance();
		$error=$check->run($table,$form);
		
		return $error;
	}
	
	function DEL($form)
	{
		if(!empty($form["message_id"]))
		{
			$form ["select_id"][0]=$form["message_id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$where = " message_id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLDelete($this->table_name,$where);
		}
		$this->location ( "message.php?mode=PAGELIST" );
		
	}
	
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>