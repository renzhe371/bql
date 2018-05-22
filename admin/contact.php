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
		global $db_company;
		parent::__construct($server,$request);
		
		$this->table=$db_company;
		$this->table_name=_TABLE."company";
		
		$smarty = &$this->getSmartyInstance();
		$smarty->assign("table",$this->table);
		 
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="EDIT";
		}
		$this->$form['mode']($form);
	}
	
	function EDIT($form) {
		$dbclass=$this->getDBInstance();
		$sql="select contact from ".$this->table_name;
		$res=$dbclass->GetRow($sql);
		$form=$res;
		$form["add_flg"]="0"; //add_flg:0　编辑　add_flg:1　添加
		$this->formPage($form);
	}
	
	function formPage($form)
	{
		$smarty = &$this->getSmartyInstance();
		$msg=$this->sessionGet("edit_succeed");
		if(!empty($msg))
		{
			$smarty->assign("msg",$msg);
			$this->SessionDelete("edit_succeed");
		}
		$smarty->assign("edit",$form);
		$this->template_name="contact.tpl";
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
			$sql="select * from ".$this->table_name;
			$res=$dbclass->GetRow($sql);
			if(!empty($res))
			{
				$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table));
			}
			else 
				$dbclass->SQLInsert ( $this->table_name, $form, array_keys($this->table));
			
			$this->sessionSet("edit_succeed",_EDIT.SUCCEED);
			$this->location ( "contact.php" );
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
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>