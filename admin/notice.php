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
        global $db_notice;
        parent::__construct($server,$request);

        $this->table=$db_notice;
        $this->table_name=_TABLE."notice";

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

        $sql="SELECT count(notice_id) FROM ".$this->table_name;
        $sql.=$where;
        $recNum = $dbclass->GetOne($sql);
        if($form ['p'] > ceil($recNum/ROWS_PER_PAGE) && $form["p"] > 1)
        {
            $form["p"] = ceil($recNum/ROWS_PER_PAGE);
        }
        $sql="SELECT notice_id,notice_title,notice_pdf,order_num,update_time FROM ".$this->table_name;
        $sql.=$where;
        $sql.=" ORDER BY ".$this->setOrderBy($form,'order_num');
        $sql.=" LIMIT ".($form["p"]-1)*ROWS_PER_PAGE." , ".ROWS_PER_PAGE;
        $res = $dbclass->GetAll($sql);
        $smarty->assign("list",$res);
        $pagestr = $this->getPageListLine(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"]);
        $smarty->assign("pageList",$pagestr);
        $smarty->assign("search",$form);

        $this->SessionSet ( _SESSION_SEARCH_FORM, $form );
        $this->template_name="notice.tpl";
    }

    function ADD($form) {

        $dbclass=$this->getDBInstance();
        $smarty = &$this->getSmartyInstance();

        $sql="select max(order_num) from ".$this->table_name;
        $max_order_num = $dbclass->GetOne($sql);
        $form["order_num"] = $max_order_num+1;
        $form["add_flg"]="1"; //add_flg:0　编辑　add_flg:1　添加
        $this->formPage($form);
    }

    function EDIT($form) {
        if(!empty($form["select_id"]))
        {
            $form["notice_id"]=$form["select_id"][0];
        }
        if(!empty($form["notice_id"]))
        {
            $dbclass=$this->getDBInstance();
            $sql="select * from ".$this->table_name;
            $sql.=" where notice_id = '".$form["notice_id"]."'";
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
        $this->template_name="notice_edit.tpl";
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
                $sql="select max(notice_id) from ".$this->table_name;
                $max_id = $dbclass->GetOne($sql);
                $form['notice_id'] =$max_id+1;
            
				$form["create_time"]=$form["update_time"]=date("Y-m-d H:i:s");
				$dbclass->SQLInsert ($this->table_name, $form, array_keys($this->table) );
			}
            else
            {
                $form["update_time"]=date("Y-m-d H:i:s");
                $dbclass->SQLUpdate ( $this->table_name, $form, array_keys($this->table),"notice_id='".$form['notice_id']."'" );
            }
            $this->location ( "notice.php?mode=PAGELIST" );
        }
    }

    function checkSave($table,&$form)
    {
        $error=array();
        $dbclass=$this->getDBInstance();
        $check = &$this->getCheckInstance();
        $error=$check->run($table,$form);


        if(!empty($_FILES["pdf_upload"]['name'])&&$_FILES["pdf_upload"]['name']!='')
        {
            if($_FILES["pdf_upload"]['error']!='0')
            {
                $error["notice_pdf"]=$table["notice_pdf"]["text"].ERROR_IMAGE_UPLOAD;
            }
			elseif (pathinfo($_FILES["pdf_upload"]['name'],PATHINFO_EXTENSION)!='pdf')
            {
                $error["notice_pdf"]=$table["notice_pdf"]["text"].ERROR_IMAGE_INVALID;
            }
            else
            {
                $form["notice_pdf"]=_TMP_FILE_DIR."pdf_".date("YmdHis").$this->getExtension($_FILES["pdf_upload"]['name']);
                if(!file_exists(_TMP_FILE_DIR))
                    mkdir(_TMP_FILE_DIR,0777);
                if(move_uploaded_file($_FILES["pdf_upload"]['tmp_name'] ,  $form["notice_pdf"])){
                    //上传成功
                }else{
                    echo "上传失败！";
                }
            }
        }
        return $error;
    }

    function DEL($form)
    {
        if(!empty($form["notice_id"]))
        {
            $form ["select_id"][0]=$form["notice_id"];
        }
        if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
            $dbclass=$this->getDBInstance();
            $where = " notice_id in ('".implode("','",$form ["select_id"])."') ";
            $dbclass->SQLDelete($this->table_name,$where);
        }
        $this->location ( "notice.php?mode=PAGELIST" );

    }

}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>