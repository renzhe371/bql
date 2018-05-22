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
		global $db_djs;
		parent::__construct($server,$request);
		
		$this->table=$db_djs;
		$this->table_name=_TABLE."djs";
		
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
		
		$sql="SELECT count(djs_id) FROM ".$this->table_name;
		$sql.=$where;
		$recNum = $dbclass->GetOne($sql);
		if($form ['p'] > ceil($recNum/ROWS_PER_PAGE) && $form["p"] > 1)
		{
			$form["p"] = ceil($recNum/ROWS_PER_PAGE);
		}
		$sql="SELECT djs_id,djs_title,djs_content,category_id,order_num,update_time FROM ".$this->table_name;
		$sql.=$where;
		$sql.=" ORDER BY ".$this->setOrderBy($form,'order_num');
		$sql.=" LIMIT ".($form["p"]-1)*ROWS_PER_PAGE." , ".ROWS_PER_PAGE;
		$res = $dbclass->GetAll($sql);
		$smarty->assign("list",$res);
		$pagestr = $this->getPageListLine(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"]);
		$smarty->assign("pageList",$pagestr);
		$smarty->assign("search",$form);
		
		$this->SessionSet ( _SESSION_SEARCH_FORM, $form );
		$this->template_name="djs_list.tpl";
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
			$form["djs_id"]=$form["select_id"][0];
		}
		if(!empty($form["djs_id"]))
		{
			$dbclass=$this->getDBInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where djs_id = '".$form["djs_id"]."'";
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
				$form['sizeArr']=$this->myGetImgSize($form["image_path"],_AMDIN_DJS_WIDTH,_AMDIN_DJS_HEIGHT);
			}
			else 
			{
				$form["image_path"]="";
			}
		}
		$smarty->assign("edit",$form);
		$this->template_name="djs_edit.tpl";
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
				$sql="select max(djs_id) from ".$this->table_name;
				$max_id = $dbclass->GetOne($sql);
			    $form['djs_id'] =$max_id+1;
			}
			
			if(!file_exists(_UPLOAD_DIR_DJS))
				mkdir(_UPLOAD_DIR_DJS,0777);
			
			$file_path=_UPLOAD_DIR_DJS.$form['djs_id']."/";
			if(!file_exists($file_path))
				mkdir($file_path,0777);
			
			//上传图片
			if(!empty($form["image_path"]))
			{
				$file_name=$form['djs_id'].$this->getExtension($form["image_path"]);
				$this->imgScaling($form["image_path"],$file_path,$file_name,_DJS_WIDTH,_DJS_HEIGHT);
				$this->imgScaling($file_path.$file_name,$file_path,"s_".$file_name,_DJS_S_WIDTH,_DJS_S_HEIGHT);
				if (strpos($form["image_path"],_TMP_FILE_DIR) !== false)
				{
					$this->DelOneFile($form["image_path"]);
				}
				$form["image_path"]=$file_path.$file_name;
			}
			
			
			
			if($form["add_flg"]=="1")
			{
				$form["create_time"]=$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLInsert ($this->table_name, $form, array_keys($this->table) );
			}
			else 
			{
				$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table),"djs_id='".$form['djs_id']."'" );
			}
			$this->location ( "djs.php?mode=PAGELIST" );
		}	
	}
	
	function checkSave($table,&$form)
	{
		$error=array();
		$dbclass=$this->getDBInstance();
		$check = &$this->getCheckInstance();
		$error=$check->run($table,$form);
		
		if(!empty($_FILES["img_upload"]['name'])&&$_FILES["img_upload"]['name']!='')
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
				$name=_TMP_FILE_DIR."djs_".date("YmdHis").$this->getExtension($_FILES["img_upload"]['name']);
				if(!file_exists(_TMP_FILE_DIR))
					mkdir(_TMP_FILE_DIR,0777);
				move_uploaded_file($_FILES["img_upload"]['tmp_name'] , $name);
				$form["image_path"]=$name;
			}
		}
		
		if(empty($error["djs_content"])&&!empty($form["djs_content"]))
		{
			$sql="select djs_id from ".$this->table_name;
			$sql.=" where djs_content = '".$form["djs_content"]."'";
			if(!empty($form["djs_id"])&&@$form["add_flg"]=="0")
			{
				$sql.=" and djs_id <> '".$form["djs_id"]."'";
			}
			$rec=$dbclass->GetOne($sql);
			if(!empty($rec))
			{
				$error["djs_content"]=str_replace("%",$table["djs_content"]["text"],ERROR_HAVE_EXIST);
			}
		}
		
		return $error;
	}
	
	function DEL($form)
	{
		if(!empty($form["djs_id"]))
		{
			$form ["select_id"][0]=$form["djs_id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$where = " djs_id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLDelete($this->table_name,$where);
			
			foreach ($form ["select_id"] as $id)
			{
				$this->DelDir(_UPLOAD_DIR_DJS.$id."/");
			}
		}
		$this->location ( "djs.php?mode=PAGELIST" );
		
	}
	
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>