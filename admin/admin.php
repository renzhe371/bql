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
		global $db_amdin;
		parent::__construct($server,$request);
		
		$this->table=$db_amdin;
		$this->table_name=_TABLE."admin";
		
		$smarty = &$this->getSmartyInstance();
		$smarty->assign("table",$this->table);
		 
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="INDEX";
		}
		$this->$form['mode']($form);
	}
	
	function INDEX($form){
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		$sql="SELECT admin_id,admin_name,permission,last_login_time,update_time FROM ".$this->table_name;
		$res = $dbclass->GetAll($sql);
		$smarty->assign("list",$res);
		
		$this->template_name="admin_list.tpl";
	}
	
	function ADD($form) {
		$form["add_flg"]="1"; //add_flg:0　编辑　add_flg:1　添加
		$this->formPage($form);
	}
	
	function EDIT($form) {
		if(!empty($form["select_id"]))
		{
			$form["admin_id"]=$form["select_id"][0];
		}
		if(!empty($form["admin_id"]))
		{
			$dbclass=$this->getDBInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where admin_id = '".$form["admin_id"]."'";
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
		$this->template_name="admin_edit.tpl";
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
				$form['admin_password']=md5($form['admin_password']);
				$form["create_time"]=$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLInsert ( $this->table_name, $form, array_keys($this->table) );
			}
			else 
			{
				if(!empty($form["admin_password_new"]))
					$form["admin_password"]=md5($form['admin_password_new']);
				$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table),"admin_id='".$form['admin_id']."'" );
			}
			$this->location ( "admin.php" );
		}	
	}
	
	function checkSave($table,&$form)
	{
		$error=array();
		$dbclass=$this->getDBInstance();
		$check = &$this->getCheckInstance();
		$error=$check->run($table,$form);
		
		if(empty($error["admin_name"]))
		{
			$sql="select admin_id from ".$this->table_name;
			$sql.=" where admin_name = '".$form["admin_name"]."'";
			if(!empty($form["admin_id"])&&@$form["add_flg"]=="0")
			{
				$sql.=" and admin_id <> '".$form["admin_id"]."'";
			}
			$rec=$dbclass->GetOne($sql);
			if(!empty($rec))
			{
				$error["admin_name"]=str_replace("%",$table["admin_name"]["text"],ERROR_HAVE_EXIST);
			}
		}
		
		if(@$form["add_flg"]=="1"&&empty($error["admin_password"]))
		{
			if($form["admin_password"]!=@$form["admin_password_confirm"])
			{
				$error["admin_password_confirm"]=ERROR_PASSWORD_DIFFERENCE;
			}
		}
		
		if(!empty($form["admin_password_new"]))
		{
			$news_password_form=array('admin_password_new'=>$form["admin_password_new"]);
			$news_password_check=array("admin_password_new"=>array("text"=>"新密码","type"=>"alnum","minlength"=>"0","maxlength"=>"100","isNull"=>""));
			$news_password_error=$check->run($news_password_check,$news_password_form);
			
			if(@$form["add_flg"]!="1"&&empty($news_password_error["admin_password_new"]))
			{
				if($form["admin_password_new"]!=$form["admin_password_confirm"])
				{
					$error["admin_password_confirm"]=ERROR_PASSWORD_DIFFERENCE;
				}
			}
			$error=array_merge($error,$news_password_error);
		}
		
		
		return $error;
	}
	
	function DEL($form)
	{
		if(!empty($form["admin_id"]))
		{
			$form ["select_id"][0]=$form["admin_id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$where = " admin_id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLDelete($this->table_name,$where);
		}
		$this->location ( "admin.php" );
		
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>