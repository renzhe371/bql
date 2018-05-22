<? 
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('include/lib/MyWeb.class');

class thisPage extends MyWeb {
	
	var $table_name ="";
	var $table=array();
	var $rows_per_page ="4";
	
	function thisPage(&$server,&$request) {
		global $db_market;
		parent::__construct($server,$request); $this->table=$db_market;
		$this->table_name=_TABLE."market";
		
		$form=$this->request->get();
		
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="IMDEX";
		}
		$this->$form['mode']($form);
	}
	
	function PAGELIST($form) {
		$session_p = $this->SessionGet ( 'session_p' );
		$session_category_id = $this->SessionGet ( 'session_category_id' );
		if (empty ($form['p'])||!is_numeric($form['p'])){
			if(empty($session_p)||!is_numeric($session_p)) 
			{
				$session_p = 1;
			}
		}else{
			$session_p = $form['p'];
		}
		
		$form['p']=$session_p;
		$form['category_id']=$session_category_id;
		return $this->IMDEX ($form);
	}
	
	function IMDEX($form){
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();

        if(empty($form['p']))
        {
            $form['p']='1';
        }
		
		$where=" where category_id<>'0' and category_id<>'' and market_id not in(13,16,17,19,37)";
		if(!empty($form['category_id']))
		{
			$where.=" and category_id='".$form['category_id']."'";
		}


        $sql="SELECT count(*) FROM ".$this->table_name;
        $sql.=$where;
        $recNum = $dbclass->GetOne($sql);

        if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
        {
            $form["p"] = ceil($recNum/$this->rows_per_page);
        }
        $sql="SELECT market_id,market_name,intro,category_id,image_path2,create_time FROM ".$this->table_name;
        $sql.=$where;
        if(!empty($form['category_id']))
            $sql.=" ORDER BY create_time desc,order_num desc";
        else
            $sql.=" ORDER BY create_time desc";
        $sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;

        $res = $dbclass->GetAll($sql);
		
        if(!empty($res))
        {
            foreach ($res as $k=>$v)
            {
                if(!empty($v["image_path2"]))
                {
                    $res[$k]["intro"]=mb_substr(strip_tags($v['intro']),0,150,"UTF-8");
                    $res[$k]['s_image_path']=str_replace(basename($v['image_path2']),'s_'.basename($v['image_path2']),$v['image_path2']);
                }
            }
        }

        $smarty->assign("list",$res);

		//最新新闻
		$news_sql="SELECT image_id,image_path2,image_name FROM "._TABLE."picnews";
		$news_sql.=" ORDER BY order_num desc, create_time desc";
		$news_sql.=" LIMIT 0,3";
		$news_res = $dbclass->GetAll($news_sql);
		
		$smarty->assign("news_list",$news_res);
		
        $pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
        $smarty->assign("pageList",$pagestr);
        $this->SessionSet ( 'session_p', $form["p"] );
        $this->SessionSet ( 'session_category_id', @$form["category_id"] );
		
		$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
		$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
		$company_res = $dbclass->GetAll($company_sql);
		$smarty->assign("company_list",$company_res);
		$smarty->assign("form",$form);
		$this->template_name="marketing_list.tpl";
	}
	
	function VIEW($form) {
		if(!empty($form["market_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where market_id = '".$form["market_id"]."'";
			$where=" where category_id= '".$form["market_id"]."'";
			$res=$dbclass->GetRow($sql);
			if(!empty($res))
			{
				if($form["market_id"]==14){
					
					$this->template_name="xunyan.tpl";
				}else{
				
					//直播H5
					$h_sql="select * from "._TABLE."zhibo_h5";
					$h_sql.=$where;
					$h_sql.=" ORDER BY order_num DESC";
					$h_res=$dbclass->GetAll($h_sql);
					
					//直播图片
					$zbImg_sql="select * from "._TABLE."zhibo_image";
					$zbImg_sql.=$where;
					$zbImg_sql.=" ORDER BY create_time DESC";
					$zbImg_res=$dbclass->GetAll($zbImg_sql);
					
					//图片报道
					$image_sql="select * from "._TABLE."image";
					$image_sql.=$where;
					$image_sql.=" ORDER BY create_time DESC";
					$image_res=$dbclass->GetAll($image_sql);
			
					$flv_sql="select * from "._TABLE."market_flv";
					$flv_sql.=$where;
					$flv_sql.=" ORDER BY order_num DESC";
					$flv_res=$dbclass->GetAll($flv_sql);
			
					$other_sql="select * from "._TABLE."market_other";
					$other_sql.=$where;
					$other_res=$dbclass->GetAll($other_sql);
			
					$image_sql2="select * from "._TABLE."live_image";
					$image_sql2.=$where;
					$image_arr=$dbclass->GetAll($image_sql2);
					
					$media_sql="SELECT * FROM `pro_media` where category_id='".$form['market_id']."' order by order_num desc";
					$media_sql1="SELECT * FROM `pro_media` where cate_id=1 and category_id='".$form['market_id']."' order by order_num desc";
					$media_sql2="SELECT * FROM `pro_media` where cate_id=2 and category_id='".$form['market_id']."' order by order_num desc";
					$media_sql3="SELECT * FROM `pro_media` where cate_id=3 and category_id='".$form['market_id']."' order by order_num desc";
					
					$media_res=$dbclass->GetAll($media_sql);
					$media_res1=$dbclass->GetAll($media_sql1);
					$media_res2=$dbclass->GetAll($media_sql2);
					$media_res3=$dbclass->GetAll($media_sql3);
					
					//直播
					$zb_sql="select * from "._TABLE."zhibo";
					$zb_sql.=$where;
					$zb_res=$dbclass->GetRow($zb_sql);
					$zb_res["content"]=mb_substr(strip_tags($zb_res['content']),0,150,"UTF-8");
					
					//礼品活动
					$act_sql="select active_id from "._TABLE."active";
					$act_sql.=$where;
					$act_res=$dbclass->GetRow($act_sql);
					
					$smarty->assign("list",$res);
					$smarty->assign("h_res",$h_res);
					$smarty->assign("zbImg_res",$zbImg_res);
					$smarty->assign("image_res",$image_res);
					$smarty->assign("flv_res",$flv_res);
					$smarty->assign("other_res",$other_res);
					$smarty->assign("image_arr",$image_arr);
					$smarty->assign("media_res",$media_res);
					$smarty->assign("media_res1",$media_res1);
					$smarty->assign("media_res2",$media_res2);
					$smarty->assign("media_res3",$media_res3);
					$smarty->assign("zb_res",$zb_res);
					$smarty->assign("act_res",$act_res);
					
					
					$form['category_id'] = $this->SessionGet ( 'session_category_id' );
					
					if(empty($form['p']))
					{
						$form['p']='1';
					}
						
					$where=' where category_id='.$form['market_id'];
					$sql="SELECT count(pid) FROM "._TABLE."post";
					$sql.=$where;
					$recNum = $dbclass->GetOne($sql);
					$smarty->assign("recNum",$recNum);
					
					if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
					{
						$form["p"] = ceil($recNum/$this->rows_per_page);
					}

					$post_sql="select pid,tel,content,nick_name,creat_time from "._TABLE."post";
					$post_sql.=$where;
					$post_sql.=" ORDER BY creat_time desc";
					//$post_sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;
                    $post_sql.=" limit 10";
					$post_res = $dbclass->GetAll($post_sql);
					$words = "庄敏|鹿鹏|保千里|陈杨辉|唐德川|王浩|汪洋";
					foreach($post_res as $k=>$v){
						
						$post_res[$k]['nick_name'] = preg_replace('/\s/', '', trim($v['nick_name']));
					}
					
					foreach($post_res as $k=>$v){
						
						$post_res[$k]['nick_name'] = preg_replace('/'.$words.'/i', '**', trim($v['nick_name']));
					}

					$smarty->assign("post_list",$post_res);

					$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
					$smarty->assign("pageList",$pagestr);
					$this->SessionSet ( 'session_p', $form["p"] );

			
					$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
					$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
					$company_res = $dbclass->GetAll($company_sql);
					$smarty->assign("company_list",$company_res);

					$smarty->assign("form",$form);
					$this->template_name="marketContent.tpl";
				}
			}
			else 
				$this->Location("error.php");
		}
		else 
		  $this->Location("error.php");
	}
	
	 function SAVE($form) {
		
        global $db_post;
        $smarty = &$this->getSmartyInstance();
        $dbclass=$this->getDBInstance();
		
        $dbclass->SQLInsert ( _TABLE."post", $form, array_keys($db_post) );
    }
	
	function zhibo($form){
	
		if(!empty($form["market_id"]))
		{
			$dbclass=$this->getDBInstance();
			$smarty = &$this->getSmartyInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where market_id = '".$form["market_id"]."'";
			$where=" where category_id= '".$form["market_id"]."'";
			$res=$dbclass->GetRow($sql);
			if(!empty($res))
			{
				if($form["market_id"]==14){
					
					$this->template_name="xunyan.tpl";
				}else{
				
					//直播图片
					$zbImg_sql="select * from "._TABLE."zhibo_image";
					$zbImg_sql.=$where;
					$zbImg_sql.=" ORDER BY create_time DESC";
					$zbImg_res=$dbclass->GetAll($zbImg_sql);
					
					
					//浏览次数
					$allowTime = 5;//防刷新时间 
					$ip = $this->get_client_ip(); 
					$allowT = md5($ip);    
					if(!isset($_SESSION[$allowT]))         
					{      
						$hits_sql="update "._TABLE."zhibo set order_num=order_num+1";
						$hits_sql.=$where;
						$hits=$dbclass->ExecuteSQL($hits_sql);        
						$_SESSION[$allowT] = time();         
					}elseif(time() - $_SESSION[$allowT]>$allowTime){ 
						
						$hits_sql="update "._TABLE."zhibo set order_num=order_num+1";
						$hits_sql.=$where;
						$hits=$dbclass->ExecuteSQL($hits_sql);         
						$_SESSION[$allowT] = time();         
					}
					
					//直播
					$zb_sql="select * from "._TABLE."zhibo";
					$zb_sql.=$where;
					$zb_res=$dbclass->GetRow($zb_sql);
					
					$zb_res["content"]=mb_substr(strip_tags($zb_res['content']),0,150,"UTF-8");
					
					//礼品活动
					$act_sql="select active_id from "._TABLE."active";
					$act_sql.=$where;
					$act_res=$dbclass->GetRow($act_sql);
					
					$smarty->assign("list",$res);
					$smarty->assign("zbImg_res",$zbImg_res);
					$smarty->assign("zb_res",$zb_res);
					$smarty->assign("act_res",$act_res);
					
					
					$form['category_id'] = $this->SessionGet ( 'session_category_id' );
					
					if(empty($form['p']))
					{
						$form['p']='1';
					}
						
					$where=' where category_id='.$form['market_id']." and status=1 ";
					$sql="SELECT count(pid) FROM "._TABLE."post";
					$sql.=$where;
					$recNum = $dbclass->GetOne($sql);
					$smarty->assign("recNum",$recNum);
					
					if($form ['p'] > ceil($recNum/$this->rows_per_page) && $form["p"] > 1)
					{
						$form["p"] = ceil($recNum/$this->rows_per_page);
					}

					$post_sql="select pid,tel,content,nick_name,creat_time from "._TABLE."post";
					$post_sql.=$where;
					$post_sql.=" ORDER BY creat_time desc";
					//$post_sql.=" LIMIT ".($form["p"]-1)*$this->rows_per_page." , ".$this->rows_per_page;
					$post_res = $dbclass->GetAll($post_sql);
					$words = "庄敏|鹿鹏|保千里|陈杨辉|唐德川|王浩|汪洋";
					foreach($post_res as $k=>$v){
						
						$post_res[$k]['nick_name'] = preg_replace('/\s/', '', trim($v['nick_name']));
					}
					
					foreach($post_res as $k=>$v){
						
						$post_res[$k]['nick_name'] = preg_replace('/'.$words.'/i', '**', trim($v['nick_name']));
					}

					$smarty->assign("post_list",$post_res);

					$pagestr = $this->getPageListLineHtdocs(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"],$this->rows_per_page);
					$smarty->assign("pageList",$pagestr);
					$this->SessionSet ( 'session_p', $form["p"] );

			
					$company_sql="SELECT company_name,description,keywords FROM "._TABLE."company";
					$company_sql.=" ORDER BY company_name desc,description desc,keywords desc";
					$company_res = $dbclass->GetAll($company_sql);
					$smarty->assign("company_list",$company_res);

					$smarty->assign("form",$form);
					$this->template_name="zhiboContent.tpl";
				}
			}
			else 
				$this->Location("error.php");
		}
		else 
		  $this->Location("error.php");
	}
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>