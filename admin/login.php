<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('../include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	var $table="admin";
	
	function thisPage(&$server,&$request) {
		parent::__construct($server,$request); 
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="INDEX";
		}
	
		$this->$form['mode']($form);
	}

	function INDEX($form) {
		if(isset($_SESSION[_SESSION_ADMIN_LOGIN]))
			unset($_SESSION[_SESSION_ADMIN_LOGIN]);
		$this->template_name="login.tpl";
	}

	function LOGIN($form) {
		$dbclass = &$this->getDBInstance();	
		$smarty = &$this->getSmartyInstance();
		$sql="SELECT admin_id,admin_name,permission FROM "._TABLE."admin WHERE admin_name=? AND admin_password=?";
		$params=array(strtolower($form["admin_name"]),md5(strtolower($form["admin_password"])));
		$sql=$this->setSql($sql,$params);
		
		$data = $dbclass->GetAll($sql);
		if (!$data) {
			$smarty->assign("form",$form);
			$smarty->assign("errmsg",_ERR_ADMIN_LOGIN);
		}
		else 
		{
			$loginData = array(
			"loginId" => $data[0]["admin_id"],
			"loginName" => $data[0]["admin_name"],
			"loginPermission" => $data[0]["permission"],
			"loginTime" => date("Y-m-d H:i:s")
			);
			$this->sessionSet(_SESSION_ADMIN_LOGIN,$loginData);
			
			$dbclass->SQLUpdate ( _TABLE.$this->table, array('last_login_time'=>$loginData['loginTime']), array('last_login_time'),"admin_id='".$loginData['loginId']."'" );
			
			$his_request_uri=$this->sessionGet("his_request_uri");
			if($his_request_uri)
			{
				$this->sessionDelete("his_request_uri");
				$this->Location($his_request_uri);
			}
			else{
				$this->Location("index.php");
			}
				
		}
		$this->template_name = "login.tpl";
	}
}

$thisPage = new thisPage($_SERVER,$_REQUEST);
$thisPage->Display();
?>