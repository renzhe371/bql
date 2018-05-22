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
		global $db_exper;
		parent::__construct($server,$request);
		
		$this->table=$db_exper;
		$this->table_name=_TABLE."exper";
		
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
		
		$sql="SELECT count(id) FROM ".$this->table_name;
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
		$this->template_name="exper_list.tpl";
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
			$form["id"]=$form["select_id"][0];
		}
		if(!empty($form["id"]))
		{
			$dbclass=$this->getDBInstance();
			$sql="select * from ".$this->table_name;
			$sql.=" where id = '".$form["id"]."'";
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
				$form['sizeArr']=$this->myGetImgSize($form["image_path"],_EXPER_S_WIDTH,_EXPER_S_HEIGHT);
			}
			else 
			{
				$form["image_path"]="";
			}
		}
		if(!empty($form["img_path1"]))
		{
			if(file_exists($form["img_path1"]))
			{
				$form['sizeArr1']=$this->myGetImgSize($form["img_path1"],_EXPER_S_WIDTH1,_EXPER_S_HEIGHT1);
			}
			else 
			{
				$form["img_path1"]="";
			}
		}
		$smarty->assign("edit",$form);
		$this->template_name="exper_edit.tpl";
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
				$sql="select max(id) from ".$this->table_name;
				$max_id = $dbclass->GetOne($sql);
			    $form['id'] =$max_id+1;
			}
			
			if(!file_exists(_UPLOAD_DIR_EXPER))
				mkdir(_UPLOAD_DIR_EXPER,0777);
			
			$file_path=_UPLOAD_DIR_EXPER.$form['id']."/";
			if(!file_exists($file_path))
				mkdir($file_path,0777);
			
			//上传图片
			if(!empty($form["image_path"])&&strpos($form["image_path"],_TMP_FILE_DIR) !== false)
			{
				$file_name=$form['id'].$this->getExtension($form["image_path"]);
				copy($form["image_path"],$file_path.$file_name);
				$this->imgScaling($file_path.$file_name,$file_path,"s_".$file_name,_ADMIN_EXPER_WIDTH,_ADMIN_EXPER_HEIGHT);
				$this->DelOneFile($form["image_path"]);
				$form["image_path"]=$file_path.$file_name;
			}
			
			if(!empty($form["img_path1"])&&strpos($form["img_path1"],_TMP_FILE_DIR) !== false)
			{
				$file_name=$form['id'].$this->getExtension($form["img_path1"]);
				copy($form["img_path1"],$file_path.$file_name);
				$this->imgScaling($file_path.$file_name,$file_path,"A_".$file_name,_ADMIN_EXPER_WIDTH1,_ADMIN_EXPER_HEIGHT1);
				$this->DelOneFile($form["img_path1"]);
				$form["img_path1"]=$file_path."A_".$file_name;
			}
			
			if(!empty($form["img_path2"])&&strpos($form["img_path2"],_TMP_FILE_DIR) !== false)
			{
				$file_name=$form['id'].$this->getExtension($form["img_path2"]);
				copy($form["img_path2"],$file_path.$file_name);
				$this->imgScaling($file_path.$file_name,$file_path,"B_".$file_name,_ADMIN_EXPER_WIDTH1,_ADMIN_EXPER_HEIGHT1);
				$this->DelOneFile($form["img_path2"]);
				$form["img_path2"]=$file_path."B_".$file_name;
			}
			
			
			if(!empty($form["img_path3"])&&strpos($form["img_path3"],_TMP_FILE_DIR) !== false)
			{
				$file_name=$form['id'].$this->getExtension($form["img_path3"]);
				copy($form["img_path3"],$file_path.$file_name);
				$this->imgScaling($file_path.$file_name,$file_path,"C_".$file_name,_ADMIN_EXPER_WIDTH1,_ADMIN_EXPER_HEIGHT1);
				$this->DelOneFile($form["img_path3"]);
				$form["img_path3"]=$file_path."C_".$file_name;
			}
			
			
			if(!empty($form["img_path4"])&&strpos($form["img_path4"],_TMP_FILE_DIR) !== false)
			{
				$file_name=$form['id'].$this->getExtension($form["img_path4"]);
				copy($form["img_path4"],$file_path.$file_name);
				$this->imgScaling($file_path.$file_name,$file_path,"D_".$file_name,_ADMIN_EXPER_WIDTH1,_ADMIN_EXPER_HEIGHT1);
				$this->DelOneFile($form["img_path4"]);
				$form["img_path4"]=$file_path."D_".$file_name;
			}
			
			
			
			if($form["add_flg"]=="1")
			{
				$sql="select max(id) from ".$this->table_name;
				$max_id = $dbclass->GetOne($sql);
			    $form['id'] =$max_id+1;
				
				$dbclass->SQLInsert ( $this->table_name, $form, array_keys($this->table) );
			}
			else 
			{
				$dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table),"id='".$form['id']."'" );
			}
			$this->location ( "experlist.php" );
		}	
	}
	
	function checkSave($table,&$form)
	{
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
		
		if($_FILES["img_upload1"]['name']!='')
		{
			if($_FILES["img_upload1"]['error']!='0')
			{
				$error["img_path1"]=$table["img_path1"]["text"].ERROR_IMAGE_UPLOAD;
			}
			elseif (strpos($_FILES["img_upload1"]['type'],"image") === false)
			{
				$error["img_path1"]=$table["img_path1"]["text"].ERROR_IMAGE_INVALID;
			}
			else 
			{
				$name=_TMP_FILE_DIR."img1_".date("YmdHis").$this->getExtension($_FILES["img_upload1"]['name']);
				if(!file_exists(_TMP_FILE_DIR))
					mkdir(_TMP_FILE_DIR,0777);
				move_uploaded_file($_FILES["img_upload1"]['tmp_name'] , $name);
				$form["img_path1"]=$name;
			}
		}
	
		if($_FILES["img_upload2"]['name']!='')
		{
			if($_FILES["img_upload2"]['error']!='0')
			{
				$error["img_path2"]=$table["img_path2"]["text"].ERROR_IMAGE_UPLOAD;
			}
			elseif (strpos($_FILES["img_upload2"]['type'],"image") === false)
			{
				$error["img_path2"]=$table["img_path2"]["text"].ERROR_IMAGE_INVALID;
			}
			else 
			{
				$name=_TMP_FILE_DIR."img2_".date("YmdHis").$this->getExtension($_FILES["img_upload2"]['name']);
				if(!file_exists(_TMP_FILE_DIR))
					mkdir(_TMP_FILE_DIR,0777);
				move_uploaded_file($_FILES["img_upload2"]['tmp_name'] , $name);
				$form["img_path2"]=$name;
			}
		}
	
	
	
		if($_FILES["img_upload3"]['name']!='')
		{
			if($_FILES["img_upload3"]['error']!='0')
			{
				$error["img_path3"]=$table["img_path3"]["text"].ERROR_IMAGE_UPLOAD;
			}
			elseif (strpos($_FILES["img_upload3"]['type'],"image") === false)
			{
				$error["img_path3"]=$table["img_path3"]["text"].ERROR_IMAGE_INVALID;
			}
			else 
			{
				$name=_TMP_FILE_DIR."img3_".date("YmdHis").$this->getExtension($_FILES["img_upload3"]['name']);
				if(!file_exists(_TMP_FILE_DIR))
					mkdir(_TMP_FILE_DIR,0777);
				move_uploaded_file($_FILES["img_upload3"]['tmp_name'] , $name);
				$form["img_path3"]=$name;
			}
		}
	
	
		if($_FILES["img_upload4"]['name']!='')
		{
			if($_FILES["img_upload4"]['error']!='0')
			{
				$error["img_path4"]=$table["img_path4"]["text"].ERROR_IMAGE_UPLOAD;
			}
			elseif (strpos($_FILES["img_upload4"]['type'],"image") === false)
			{
				$error["img_path4"]=$table["img_path4"]["text"].ERROR_IMAGE_INVALID;
			}
			else 
			{
				$name=_TMP_FILE_DIR."img4_".date("YmdHis").$this->getExtension($_FILES["img_upload4"]['name']);
				if(!file_exists(_TMP_FILE_DIR))
					mkdir(_TMP_FILE_DIR,0777);
				move_uploaded_file($_FILES["img_upload4"]['tmp_name'] , $name);
				$form["img_path4"]=$name;
			}
		}
		
		return $error;
	}
	
	function DEL($form)
	{
		if(!empty($form["id"]))
		{
			$form ["select_id"][0]=$form["id"];
		}
		if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
			$dbclass=$this->getDBInstance();
			$where = " id in ('".implode("','",$form ["select_id"])."') ";
			$dbclass->SQLDelete($this->table_name,$where);
			$dbclass->SQLUpdate ( _TABLE."exper", array("id"=>""), array("id"),$where );
		}
		$this->location("experlist.php");
		
	}
	
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>