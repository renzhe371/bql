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
		global $db_picnews;
		parent::__construct($server,$request);
		
		$this->table=$db_picnews;
		$this->table_name=_TABLE."picnews";
		
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
		
		$sql="SELECT count(image_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/ROWS_PER_PAGE) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/ROWS_PER_PAGE);
		}
		$sql="SELECT * FROM ".$this->table_name;
		$sql.=$where;
		$sql.=" ORDER BY ".$this->setOrderBy($form,'order_num');
		$sql.=" LIMIT ".($form["p"]-1)*ROWS_PER_PAGE." , ".ROWS_PER_PAGE;
		$res = $dbclass->GetAll($sql);
		$smarty->assign("list",$res);
		$pagestr = $this->getPageListLine(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"]);
		$smarty->assign("pageList",$pagestr);
		$smarty->assign("form",$form);
		
		$this->SessionSet ( _SESSION_SEARCH_FORM, $form );
		$this->template_name="picnews.tpl";
	}
	
	function ADD($form) {
		$dbclass=$this->getDBInstance();
		$sql="select max(order_num) from ".$this->table_name;
		$max_order_num = $dbclass->GetOne($sql);
		$form["order_num"] = $max_order_num+1;
		$form["add_flg"]="1"; //add_flg:0　编辑　add_flg:1　添加
		$this->formPage($form);
	}
	
	function EDIT($form) {
		if(!empty($form["select_id"]))
		{
			$form["image_id"]=$form["select_id"][0];
		}
		if(!empty($form["image_id"]))
		{
			$dbclass=$this->getDBInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where image_id = '".$form["image_id"]."'";
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
		if(!empty($form["image_path"]))
		{
			if(file_exists($form["image_path"]))
			{
				$form['sizeArr']=$this->myGetImgSize($form["image_path"],_IMAGE_S_WIDTH,_IMAGE_S_HEIGHT);
			}
			else 
			{
				$form["image_path"]="";
			}
		}
		
		if(!empty($form["image_path2"]))
		{
			if(file_exists($form["image_path2"]))
			{
				$form['sizeArr2']=$this->myGetImgSize($form["image_path2"],_AMDIN_PIC_WIDTH,_AMDIN_PIC_HEIGHT);
			}
			else 
			{
				$form["image_path2"]="";
			}
		}
		
		$smarty->assign("edit",$form);
		$this->template_name="picnews_edit.tpl";
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
				$sql="select max(image_id) from ".$this->table_name;
				$max_id = $dbclass->GetOne($sql);
			    $form['image_id'] =$max_id+1;
			}
			
			if(!file_exists(_UPLOAD_DIR_PICNEWS))
				mkdir(_UPLOAD_DIR_PICNEWS,0777);
			
			$file_path=_UPLOAD_DIR_PICNEWS.$form['image_id']."/";
			if(!file_exists($file_path))
				mkdir($file_path,0777);
			
			//上传图片
			if(!empty($form["image_path"])&&strpos($form["image_path"],_TMP_FILE_DIR) !== false)
			{
				$file_name=$form['image_id'].$this->getExtension($form["image_path"]);
				copy($form["image_path"],$file_path.$file_name);
				$this->imgScaling($file_path.$file_name,$file_path,"s_".$file_name,_AMDIN_IMAGE_WIDTH,_AMDIN_IMAGE_HEIGHT);
				$this->DelOneFile($form["image_path"]);
				$form["image_path"]=$file_path.$file_name;
			}
			
			//
			if(!file_exists(_UPLOAD_DIR_PICNEWS2))
				mkdir(_UPLOAD_DIR_PICNEWS2,0777);
			
			$file_path=_UPLOAD_DIR_PICNEWS2.$form['image_id']."/";
			if(!file_exists($file_path))
				mkdir($file_path,0777);
				chmod($file_path,0777);
				
			if(!empty($form["image_path2"])&&strpos($form["image_path2"],_TMP_FILE_DIR) !== false)
			{
				$file_name=$form['image_id'].$this->getExtension($form["image_path2"]);
				copy($form["image_path2"],$file_path.$file_name);
				$this->imgScaling($file_path.$file_name,$file_path,"s_".$file_name,_BANNER_S_WIDTH,_BANNER_S_HEIGHT);
				$this->DelOneFile($form["image_path2"]);
				$form["image_path2"]=$file_path.$file_name;
			}
			
			if($form["add_flg"]=="1")
			{
				$form["create_time"]=$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLInsert ($this->table_name, $form, array_keys($this->table) );
			}
			else 
			{
				$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table),"image_id='".$form['image_id']."'" );
			}
			
			$this->location ( "picnews.php?mode=PAGELIST" );
		}	
	}
	
	function checkSave($table,&$form)
	{
		//print_r($form);
		$error=array();
		$dbclass=$this->getDBInstance();
		$check = &$this->getCheckInstance();
		$error=$check->run($table,$form);
		
		if($_FILES["img_upload"]['name']==''&&@$form["image_path"]=="")
		{
			$error["image_path"]=ERROR_IMAGE_NULL;
		}
		else 
		{
			if($_FILES["img_upload"]['name']!='')
			{
				if($_FILES["img_upload"]['error']!='0')
				{
					$error["image_path"]=$table["image_path"]["text"].ERROR_IMAGE_UPLOAD;
				}
				elseif (strpos($_FILES["img_upload"]['type'],"image") === false)
				{
					$error["image_path"]=$table["image_path"]["text"].ERROR_IMAGE_INVALID;
				}
				else 
				{
					$name=_TMP_FILE_DIR."image_".date("YmdHis").$this->getExtension($_FILES["img_upload"]['name']);
					if(!file_exists(_TMP_FILE_DIR))
						mkdir(_TMP_FILE_DIR,0777);
					move_uploaded_file($_FILES["img_upload"]['tmp_name'] , $name);
					$form["image_path"]=$name;
				}
			}
		}
		
		if($_FILES["img_upload2"]['name']!=''){
		
			if($_FILES["img_upload2"]['error']!='0')
			{
				$error["image_path2"]=$table["image_path2"]["text"].ERROR_IMAGE_UPLOAD;
			}
			elseif (strpos($_FILES["img_upload2"]['type'],"image") === false)
			{
				$error["image_path2"]=$table["image_path2"]["text"].ERROR_IMAGE_INVALID;
			}
			else 
			{
				$name=_TMP_FILE_DIR."pic_".date("YmdHis").$this->getExtension($_FILES["img_upload2"]['name']);
				if(!file_exists(_TMP_FILE_DIR))
					mkdir(_TMP_FILE_DIR,0777);
					chmod(_TMP_FILE_DIR,0777);
				move_uploaded_file($_FILES["img_upload2"]['tmp_name'] , $name);
				$form["image_path2"]=$name;
			}
		}
		
		
		return $error;
	}
	
	function DEL($form)
	{
		if(!empty($form["image_id"]))
		{
			$form ["select_id"][0]=$form["image_id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$where = " image_id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLDelete($this->table_name,$where);
			foreach ($form ["select_id"] as $id)
			{
				$this->DelDir(_UPLOAD_DIR_newspic.$id."/");
			}
		}
		$this->location ( "picnews.php?mode=PAGELIST" );
		
	}
	
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>