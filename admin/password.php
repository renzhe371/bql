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
		parent::__construct($server,$request);
		
		$this->table_name=_TABLE."admin";
		 
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="EDIT";
		}
		$this->$form['mode']($form);
	}
	
	function EDIT($form) {
		$loginData=$this->sessionGet(_SESSION_ADMIN_LOGIN);
		if(!empty($loginData["loginId"]))
		{
			$dbclass=$this->getDBInstance();
			$sql="select admin_id,admin_name from ".$this->table_name;
			$sql.=" where admin_id = '".$loginData["loginId"]."'";
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
		$msg=$this->sessionGet("edit_succeed");
		if(!empty($msg))
		{
			$smarty->assign("msg",$msg);
			$this->SessionDelete("edit_succeed");
		}
		$smarty->assign("edit",$form);
		$this->template_name="admin_password_edit.tpl";
	}
	
	function SAVE($form) {
		$db_amdin = array("admin_password"=>array("text"=>"密码","type"=>"alnum","minlength"=>"0","maxlength"=>"100","isNull"=>"N"));
		$smarty = &$this->getSmartyInstance();
		$dbclass=$this->getDBInstance();
		
		$error=$this->checkSave($db_amdin,&$form);
		if(!empty($error))
		{
			$smarty->assign("error",$error);
			$this->formPage($form);
		}
		else 
		{
			$form["admin_password"]=md5($form['admin_password']);
			$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($db_amdin),"admin_id='".$form['admin_id']."'" );
			$this->sessionSet("edit_succeed",_EDIT.SUCCEED);
			$this->location ( "password.php" );
		}	
	}
	
	function checkSave($table,&$form)
	{
		$error=array();
		$dbclass=$this->getDBInstance();
		$check = &$this->getCheckInstance();
		$error=$check->run($table,$form);
		
		if(empty($error["admin_password"]))
		{
			if($form["admin_password"]!=$form["admin_password_confirm"])
			{
				$error["admin_password_confirm"]=ERROR_PASSWORD_DIFFERENCE;
			}
		}
		
		return $error;
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1);

?>