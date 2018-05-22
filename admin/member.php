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
		global $db_member;
		parent::__construct($server,$request);
		
		$this->table=$db_member;
		$this->table_name=_TABLE."member";
		
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
		if(isset($form['search_member_name'])&&$form['search_member_name']!="")
		{
			$where.=" and member_name like '%".$form['search_member_name']."%'";
		}
		if(isset($form['search_permission'])&&$form['search_permission']!="")
		{
			$where.=" and permission='".$form['search_permission']."'";
		}
		
		$sql="SELECT count(member_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/ROWS_PER_PAGE) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/ROWS_PER_PAGE);
		}
		$sql="SELECT member_id,member_name,company_name,permission,update_time FROM ".$this->table_name;
		$sql.=$where;
		$sql.=" ORDER BY ".$this->setOrderBy($form,'update_time');
		$sql.=" LIMIT ".($form["p"]-1)*ROWS_PER_PAGE." , ".ROWS_PER_PAGE;
		$res = $dbclass->GetAll($sql);
		$smarty->assign("list",$res);
		$pagestr = $this->getPageListLine(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"]);
		$smarty->assign("pageList",$pagestr);
		$smarty->assign("form",$form);
		
		$this->SessionSet ( _SESSION_SEARCH_FORM, $form );
		$this->template_name="member_list.tpl";
	}
	
	function ADD($form) {
		$form["add_flg"]="1"; //add_flg:0　编辑　add_flg:1　添加
		$this->formPage($form);
	}
	
	function EDIT($form) {
		if(!empty($form["select_id"]))
		{
			$form["member_id"]=$form["select_id"][0];
		}
		if(!empty($form["member_id"]))
		{
			$dbclass=$this->getDBInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where member_id = '".$form["member_id"]."'";
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
		$this->template_name="member_edit.tpl";
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
				$form["create_time"]=$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLInsert ( $this->table_name, $form, array_keys($this->table) );
			}
			else 
			{
				$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table),"member_id='".$form['member_id']."'" );
			}
			
			$this->location ( "member.php?mode=PAGELIST" );
		}	
	}
	
	function checkSave($table,&$form)
	{
		$error=array();
		$dbclass=$this->getDBInstance();
		$check = &$this->getCheckInstance();
		$error=$check->run($table,$form);
		
		if(empty($error["member_name"]))
		{
			$sql="select member_id from ".$this->table_name;
			$sql.=" where member_name = '".$form["member_name"]."'";
			if(!empty($form["member_id"])&&@$form["add_flg"]=="0")
			{
				$sql.=" and member_id <> '".$form["member_id"]."'";
			}
			$rec=$dbclass->GetOne($sql);
			if(!empty($rec))
			{
				$error["member_name"]=str_replace("%",$table["member_name"]["text"],ERROR_HAVE_EXIST);
			}
		}
		
		if(@$form["add_flg"]=="1"&&empty($error["member_password"]))
		{
			if($form["member_password"]!=@$form["member_password_confirm"])
			{
				$error["member_password_confirm"]=ERROR_PASSWORD_DIFFERENCE;
			}
		}
		
		if(!empty($form["member_password_new"]))
		{
			$news_password_form=array('member_password_new'=>$form["member_password_new"]);
			$news_password_check=array("member_password_new"=>array("text"=>"新密码","type"=>"alnum","minlength"=>"0","maxlength"=>"20","isNull"=>""));
			$news_password_error=$check->run($news_password_check,$news_password_form);
			
			if(@$form["add_flg"]!="1"&&empty($news_password_error["member_password_new"]))
			{
				if($form["member_password_new"]!=$form["member_password_confirm"])
				{
					$error["member_password_confirm"]=ERROR_PASSWORD_DIFFERENCE;
				}
			}
			$error=array_merge($error,$news_password_error);
		}
		
		return $error;
	}
	
	function DEL($form)
	{
		if(!empty($form["member_id"]))
		{
			$form ["select_id"][0]=$form["member_id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$where = " member_id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLDelete($this->table_name,$where);
		}
		$this->location ( "member.php?mode=PAGELIST" );
		
	}
	
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>