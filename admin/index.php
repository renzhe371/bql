<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('../include/lib/MyWeb.class');
class thisPage extends MyWeb {
	
	function thisPage(&$server,&$request) {
		parent::__construct($server,$request); 
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="INDEX";
		}
		$this->$form['mode']($form);
	}
	
	function INDEX($form){
		$smarty = &$this->getSmartyInstance();
		$dbclass = &$this->getDBInstance();
		$conn=$dbclass->conn;
		$form["phpinfo"]=phpversion();
		$form["mysqlinfo"]=mysql_get_server_info($conn);
		$form["osinfo"]=$_SERVER['SERVER_SOFTWARE'];
		$form["max_upload"] = ini_get('file_uploads') ? ini_get('upload_max_filesize') : 'Disabled';
		$form["max_ex_time"]= ini_get('max_execution_time').' seconds';
		$form["sys_mail"]= ini_get('sendmail_path') ? 'Unix Sendmail ( Path: '.ini_get('sendmail_path').')' :( ini_get('SMTP') ? 'SMTP ( Server: '.ini_get('SMTP').')': 'Disabled' );
		$form["ifcookie"] = isset($_COOKIE) ? "SUCCESS" : "FAIL";
		$form["systemtime"] = date("Y-m-j g:i A");
		$smarty->assign("form",$form);
		
		$this->template_name="index.tpl";
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>