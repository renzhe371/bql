<?
/*
    Thank you for choosing Enterprise Website site management system (hereinafter referred to as Huaad)
	[Enterprise Website System] Copyright (c) 2008-2012 tujunhua (huaad.com)
	This is NOT a freeware, use is subject to license.txt
*/
require_once ('../include/lib/MyWeb.class');
class thisPage extends MyWeb {
	
	var $table_name ="";
	
	function thisPage(&$server,&$request) {
		parent::__construct($server,$request);
		
		$this->table_name=_TABLE."accesslog";
		 
		$form=$this->request->get();
		if(empty($form['mode'])||$form['mode']=="")
		{
			$form['mode']="INDEX";
		}
		$this->$form['mode']($form);
	}
	
	function INDEX($form){
		$this->template_name="access.tpl";
	}
	
	function MONTH($form){
		$smarty = &$this->getSmartyInstance();
		$form['search_start']="2011";
		$form['search_end']=date("Y");
		$smarty->assign("search",$form);
		$this->template_name="month_access.tpl";
	}
	
	function MONTH_SEARCH($form){
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		$rate=array();
		
		$where=" where 1=1 ";
		if(empty($form['search_start']))
			$form['search_start']="2011";
		$where.=" and substring(access_time,1,4) >= '".$form['search_start']."'";
		if(empty($form['search_end']))
			$form['search_end']=date("Y");
		$where.=" and substring(access_time,1,4) <= '".$form['search_end']."'";
		
		$sql=" select count(access_ip) from ".$this->table_name;
		$sql.=$where;
		$total = $dbclass->GetOne($sql);
		if(!empty($total))
		{
			if(empty($form['year']))
				$form['year']=$form['search_start'];
			$sql=" select count(access_ip) from ".$this->table_name;
			$sql.=" where substring(access_time,1,4)='".$form['year']."'";
			$y_total = $dbclass->GetOne($sql);
			
			$sql=" select substring(access_time,6,2) as month,count(log_id) as count,count(log_id)*100/'".$y_total."' as rate from ".$this->table_name;
			$sql.=" where substring(access_time,1,4)='".$form['year']."'";
			$sql.=" group by substring(access_time,6,2) order by substring(access_time,6,2)";
			$res = $dbclass->GetAll($sql);
			if(!empty($res))
			{
				foreach ($res as $value)
				{
					if($value['month']<10)
						$value['month']=str_replace("0","",$value['month']);
					$rate[$value['month']]=array('count'=>$value['count'],'rate'=>$value['rate']);
				}
			}
			$smarty->assign("y_total",$y_total);
			$smarty->assign("rate",$rate);
		}
		$smarty->assign("total",$total);
		$smarty->assign("search",$form);
		$this->template_name="month_access.tpl";
	}
	
	function MONTH_DOWNLOAD($form)
	{
		$dbclass=$this->getDBInstance();
		
		$where=" where 1=1 ";
		if(empty($form['search_start']))
			$form['search_start']="2011";
		$where.=" and substring(access_time,1,4) >= '".$form['search_start']."'";
		if(empty($form['search_end']))
			$form['search_end']=date("Y");
		$where.=" and substring(access_time,1,4) <= '".$form['search_end']."'";
		
		$sql=" select count(access_ip) from ".$this->table_name;
		$sql.=$where;
		$total = $dbclass->GetOne($sql);
		
		$this->SetTextHeader("每月累计访问量(".date("YmdHis").").xls");
		$s="\t";
		$message="每月累计访问量"."\n\n";
		$message.="统计时间".$s.$form['search_start']." ～ ".$form['search_end']."\n";
		$message.="总访问量".$s.$total."\n\n";
		$message =mb_convert_encoding($message, "GBK", "UTF-8"); 
		echo $message;
		
		for ($year=$form['search_start'];$year<=$form['search_end'];$year++)
		{
			$sql=" select count(access_ip) from ".$this->table_name;
			$sql.=" where substring(access_time,1,4)='".$year."'";
			$y_total = $dbclass->GetOne($sql);
			$message ="年份".$s.$year.$s."年访问量".$s.$y_total;
			
			$rate=array();
			$sql=" select substring(access_time,6,2) as month,count(log_id) as count,count(log_id)*100/'".$y_total."' as rate from ".$this->table_name;
			$sql.=" where substring(access_time,1,4)='".$year."'";
			$sql.=" group by substring(access_time,6,2) order by substring(access_time,6,2)";
			$res = $dbclass->GetAll($sql);
			if(!empty($res))
			{
				foreach ($res as $value)
				{
					if($value['month']<10)
						$value['month']=str_replace("0","",$value['month']);
					$rate[$value['month']]=array('count'=>$value['count'],'rate'=>$value['rate']);
				}
			}
			
			for ($month=1;$month<=12;$month++)
			{
				$month_count='0';
				if(!empty($rate[$month]['count']))
				{
					$month_count=$rate[$month]['count'];
				}
				$month_rate='0%';
				if(!empty($rate[$month]['rate']))
				{
					$month_rate=$rate[$month]['rate'].'%';
				}
				
				$message.="\n".$this->getRegCSVStr($month).$s.$this->getRegCSVStr($month_count).$s.$this->getRegCSVStr($month_rate);
			}
			
			$message =mb_convert_encoding($message, "GBK", "UTF-8"); 
			echo $message."\n";
		}
		exit();
	}
	
	function AREA($form){
		$smarty = &$this->getSmartyInstance();
		$form['search_start']="2011-01-01";
		$form['search_end']=date("Y-m-d");
		$smarty->assign("search",$form);
		$this->template_name="area_access.tpl";
	}
	
	function AREA_SEARCH($form){
		$dbclass=$this->getDBInstance();
		$smarty = &$this->getSmartyInstance();
		$rate=array();
		
		$where=" where 1=1 ";
		if(empty($form['search_start']))
			$form['search_start']="2011-01-01";
		$where.=" and substring(access_time,1,10) >= '".$form['search_start']."'";
		if(empty($form['search_end']))
			$form['search_end']=date("Y-m-d");
		$where.=" and substring(access_time,1,10) <= '".$form['search_end']."'";
		
		$sql=" select count(access_ip) from ".$this->table_name;
		$sql.=$where;
		$total = $dbclass->GetOne($sql);
		if(!empty($total))
		{
			$sql=" select code ,count(code) as count,count(code)*100/'".$total."' as rate
					from ".$this->table_name;
			$sql.=$where;
			$sql.=" group by code order by code";
			$res = $dbclass->GetAll($sql);
			if(!empty($res))
			{
				foreach ($res as $value)
				{
					$rate[$value['code']]=array('count'=>$value['count'],'rate'=>$value['rate']);
				}
			}
		}
		$smarty->assign("total",$total);
		$smarty->assign("rate",$rate);
		$smarty->assign("search",$form);
		$this->template_name="area_access.tpl";
	}
	
	function AREA_DOWNLOAD($form)
	{
		$dbclass=$this->getDBInstance();
		$rate=array();
		
		$where=" where 1=1 ";
		if(empty($form['search_start']))
			$form['search_start']="2011-01-01";
		$where.=" and substring(access_time,1,10) >= '".$form['search_start']."'";
		if(empty($form['search_end']))
			$form['search_end']=date("Y-m-d");
		$where.=" and substring(access_time,1,10) <= '".$form['search_end']."'";
		
		$sql=" select count(access_ip) from ".$this->table_name;
		$sql.=$where;
		$total = $dbclass->GetOne($sql);
		if(!empty($total))
		{
			$sql=" select code ,count(code) as count,count(code)*100/'".$total."' as rate
					from ".$this->table_name;
			$sql.=$where;
			$sql.=" group by code order by code";
			$res = $dbclass->GetAll($sql);
			if(!empty($res))
			{
				foreach ($res as $value)
				{
					$rate[$value['code']]=array('count'=>$value['count'],'rate'=>$value['rate']);
				}
			}
		}
		
		$this->SetTextHeader("访问者地区分布(".date("YmdHis").").xls");
		$s="\t";
		$message="访问者地区分布"."\n\n";
		$message.="统计时间".$s.$form['search_start']." ～ ".$form['search_end']."\n";
		$message.="总访问量".$s.$total."\n";
		$message .="地区".$s."访问量".$s."比率";
		$provinceArr=$this->getProvinceCode();
		foreach ($provinceArr as $code=>$province)
		{
			$province_count='0';
			if(!empty($rate[$code]['count']))
			{
				$province_count=$rate[$code]['count'];
			}
			$province_rate='0%';
			if(!empty($rate[$code]['rate']))
			{
				$province_rate=$rate[$code]['rate'].'%';
			}
			
			$message.="\n".$this->getRegCSVStr($province).$s.$this->getRegCSVStr($province_count).$s.$this->getRegCSVStr($province_rate);
		}
		$message.="\n总访问量".$s.$total.$s."\n";
		$message =mb_convert_encoding($message, "GBK", "UTF-8"); 
		echo $message;
		exit();
	}
	
	
	
}

$thisPage = new thisPage ( $_SERVER, $_REQUEST );
$thisPage->Display($layoutFlg=1,$thisPage->template_name);
?>