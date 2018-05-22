<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {

    function thisPage(&$server,&$request) {
        parent::__construct($server,$request);

        $this->table_name=_TABLE."company";
        $form=$this->request->get();
        if(empty($form['mode'])||$form['mode']=="")
        {
            $form['mode']="IMDEX";
        }
        $this->$form['mode']($form);
    }

    function IMDEX($form){

        $dbclass=$this->getDBInstance();
        $smarty = &$this->getSmartyInstance();

        $smarty->assign("djs_2006",$this->djs("16"));
        $smarty->assign("djs_2007",$this->djs("17"));
        $smarty->assign("djs_2008",$this->djs("18"));
        $smarty->assign("djs_2009",$this->djs("19"));
        $smarty->assign("djs_2010",$this->djs("20"));
        $smarty->assign("djs_2011",$this->djs("21"));
        $smarty->assign("djs_2012",$this->djs("22"));
        $smarty->assign("djs_2013",$this->djs("23"));
        $smarty->assign("djs_2014",$this->djs("24"));
        $smarty->assign("djs_2015",$this->djs("25"));
        $smarty->assign("djs_2016",$this->djs("33"));
        $smarty->assign("djs_2017",$this->djs("34"));
		
		//最新新闻
		$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,3";
		$news_res = $dbclass->GetAll($news_sql);
		
		$smarty->assign("news_list",$news_res);

        $company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
        $company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
        $company_res = $dbclass->GetAll($company_sql);
        $smarty->assign("company_list",$company_res);
        $this->template_name="history.tpl";

    }

    public function djs($cid){

        $dbclass=$this->getDBInstance();
        $smarty = &$this->getSmartyInstance();

        $djs_sql="SELECT category_id,djs_id,djs_title,djs_content,image_path,order_num,update_time,create_time FROM pro_djs where category_id=".$cid;
        $djs_sql.=" ORDER BY order_num desc, create_time desc";
        $djs_sql.=" LIMIT 0,100";
        $djs_res = $dbclass->GetAll($djs_sql);

        return $djs_res;
    }
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);

?>