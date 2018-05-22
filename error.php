<?


/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	var $type_arr=array('permit');
	
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
		if (!empty($form['type'])&&in_array($form['type'],$this->type_arr)) {
			$smarty = &$this->getSmartyInstance();
			if ($form['type']=='permit') {
				$errmsg=ERR_NO_PERMIT;
				$smarty->assign("errmsg",$errmsg);
			}
		}
		$this->template_name = "error.tpl";
	
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>