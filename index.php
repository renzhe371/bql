<? 
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	function thisPage(&$server,&$request) {
		parent::__construct($server,$request); $this->table_name=_TABLE."company";

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

        $news_sql="SELECT news_id,news_title,image_path,news_ms,create_time FROM "._TABLE."news";
		$news_sql.=" ORDER BY create_time desc";
		$news_sql.=" LIMIT 0,5";
		$news_res = $dbclass->GetAll($news_sql);

        foreach($news_res as $k=>$v){

            $news_res[$k]['news_ms']=mb_strcut(strip_tags($v['news_ms']),0,280,"utf-8")."...";
        }
		$smarty->assign("news_list",$news_res);

		$company_sql="SELECT title,company_name,description,keywords,security FROM "._TABLE."company";
		$company_sql.=" ORDER BY title desc,company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);

		$smarty->assign("company_list",$company_res);
		$this->template_name="index.tpl";
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>