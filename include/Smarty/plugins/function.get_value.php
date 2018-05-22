<?php
function smarty_function_get_value($params, &$smarty)
{
	$options = null;
	$selected = null;
	$implode = '';
	$separator = '';
	$maxlength;
	$etc = "...";
	$all = NULL;

	foreach($params as $_key => $_val) {
		switch($_key) {
			case 'options':
				$$_key = (array)$_val;
				break;
			case 'selected':
			case 'implode':
			case 'separator':
			case 'etc':
			case 'all':	
				$$_key = $_val;
				break;
			case 'maxlength':
				$$_key = intval($_val);
				break;
			default:
				break;
		}
	}
	if($separator=='bit'){
		if(is_numeric($selected)){
			$bit_array = array();
			for($i=1;$i<=strlen($selected);$i++){
				 $bit_val= substr($selected,$i-1,1);
				 if($bit_val==1){
				 	$bit_array[] = $i;
				 }
			}
		}
		$selected = $bit_array;
	}else {
		if(is_array($selected)){			
			$selected = array_map('strval', array_values((array)$selected));
		}else{			
			if(!empty($separator)){
				
				$selected = explode($separator,$selected);
			}
		}
	}

	if (!isset($options))
	return ''; /* raise error here? */

	
  
	if (is_array($selected)) {
		settype($selected, 'array');
		if($all){	    	
			$options = array_keys($options);		
			$tmp = array_intersect($options,$selected);			
			$tmp = array_diff($options,$tmp);		
			$tmp =  count($tmp);
			if($tmp>0){				
			}else{
				 return $all;
			}
    	}
		$_html_result = array();		
		foreach ($selected as $_val){
			if (isset($options[$_val])) {
				$_html_result[] = $options[trim($_val)];
			}
		}
	}else{
		$return_str=$options[trim($selected)];
		if($maxlength>0 && $maxlength<strlen($return_str)) {
		   for($i=0; $i < $maxlength; $i++)    
		   	if (ord($return_str[$i]) > 128) $i++;    
		 	  $return_str = substr($return_str,0,$i) . $etc;    
		 }    
		return $return_str;
	}
	$return_str = implode($implode,$_html_result);
	if($maxlength>0 && $maxlength<strlen($return_str)) {
	   for($i=0; $i < $maxlength; $i++)    
	   	if (ord($return_str[$i]) > 128) $i++;    
	 	  $return_str = substr($return_str,0,$i) . $etc;    
	 }    
//		$return_str = substr($return_str,0,$maxlength);
//		$return_str .= $etc;
//	}
	return $return_str;
}

?>
