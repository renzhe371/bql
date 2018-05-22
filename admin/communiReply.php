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
        global $db_reply;
        parent::__construct($server,$request);

        $this->table=$db_reply;
        $this->table_name=_TABLE."reply";

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
        if(isset($form["r_status"]) && $form["r_status"] != "")
        {
            $where.=" and r_status = '".$form['r_status']."'";
        }

        $sql="SELECT count(rid) FROM ".$this->table_name;
        $sql.=$where;
        $recNum = $dbclass->GetOne($sql);
        if($form ['p'] > ceil($recNum/ROWS_PER_PAGE) && $form["p"] > 1)
        {
            $form["p"] = ceil($recNum/ROWS_PER_PAGE);
        }
        $sql="SELECT * FROM ".$this->table_name;
        $sql.=$where;
        $sql.=" ORDER BY ".$this->setOrderBy($form,'r_creat_time');
        $sql.=" LIMIT ".($form["p"]-1)*ROWS_PER_PAGE." , ".ROWS_PER_PAGE;
        $res = $dbclass->GetAll($sql);

        $smarty->assign("list",$res);
        $pagestr = $this->getPageListLine(basename($_SERVER["PHP_SELF"]), $recNum, $form["p"]);
        $smarty->assign("pageList",$pagestr);
        $smarty->assign("form",$form);

        $this->SessionSet ( _SESSION_SEARCH_FORM, $form );
        $this->template_name="communiReply.tpl";
    }

    function VIEW($form) {
        if(!empty($form["select_id"]))
        {
            $form["rid"]=$form["select_id"][0];
        }
        if(!empty($form["rid"]))
        {
            $dbclass=$this->getDBInstance();
            $smarty = &$this->getSmartyInstance();

            if(empty($form['r_status'])||$form['r_status']=='0')
            {
                $colArr=array("r_creat_time");
                $updateForm=array("r_creat_time"=>date("Y-m-d H:i:s"));
                $dbclass->SQLUpdate ( $this->table_name, $updateForm, $colArr,"rid='".$form['rid']."'" );
            }
            $sql="select * from ".$this->table_name;
            $sql.=" where rid = '".$form["rid"]."'";
            $res=$dbclass->GetRow($sql);

            $smarty->assign("view",$res);
            $smarty->assign("form",$form);
            $this->template_name="communiReplyView.tpl";
        }
    }

    function SETREPLY($form)
    {
        if(!empty($form["rid"]))
        {
            $form ["select_id"][0]=$form["rid"];
        }
        if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
            $dbclass=$this->getDBInstance();
            $colArr=array("r_status","r_creat_time");
            $updateForm=array("r_status"=>'1',"r_creat_time"=>date("Y-m-d H:i:s"));
            $where = " rid in ('".implode("','",$form ["select_id"])."') ";
            $dbclass->SQLUpdate ($this->table_name, $updateForm, $colArr,$where );
        }
        $this->location ( "communiReply.php?mode=PAGELIST" );
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
                $dbclass->SQLInsert ($this->table_name, $form, array_keys($this->table) );
            }
            else
            {
                $dbclass->SQLUpdate ($this->table_name, $form, array_keys($this->table),"rid='".$form['rid']."'" );
            }
            $this->location ( "communiReply.php?mode=PAGELIST" );
        }
    }

    function checkSave($table,&$form)
    {
        $error=array();
        $dbclass=$this->getDBInstance();
        $check = &$this->getCheckInstance();
        $error=$check->run($table,$form);

        return $error;
    }

    function DEL($form)
    {
        if(!empty($form["rid"]))
        {
            $form ["select_id"][0]=$form["rid"];
        }
        if (! empty ( $form ["select_id"] )&&is_array($form ["select_id"])) {
            $dbclass=$this->getDBInstance();
            $where = " rid in ('".implode("','",$form ["select_id"])."') ";
            $dbclass->SQLDelete($this->table_name,$where);
        }
        $this->location ( "communiReply.php?mode=PAGELIST" );

    }

}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>