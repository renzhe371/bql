<?php
/*
<{jw_checkboxes name="hoken" options=""|get_hoken selected=$edit.hoken labelstr="dd" step="5" stepstr="dl"}>
*/
function smarty_function_mycheckboxes($params, &$smarty)
{
    require_once $smarty->_get_plugin_filepath('shared','escape_special_chars');

    $name = 'checkbox';
    $values = null;
    $options = null;
    $selected = null;
    $separator = '';
    $labels = true;
    $output = null;
	$labelstr = 'label';
	$step = null;
	$stepstr = null;
    $extra = '';
    $class = NULL;
    $bit = false;
    $explode= NULL;
    $nbsp=false;
    $nbspstr = '&nbsp;&nbsp;';

    foreach($params as $_key => $_val) {
        switch($_key) {
            case 'name':
            case 'separator':
            case 'class':
            case 'explode':
            
                $$_key = $_val;
                break;

            case 'labels':
            case 'bit':
            case 'nbsp':
                $$_key = (bool)$_val;
                break;

            case 'options':
                $$_key = (array)$_val;
                break;

            case 'values':
            case 'output':
                $$_key = array_values((array)$_val);
                break;

            case 'checked':
            case 'selected':
                $selected = array_map('strval', array_values((array)$_val));
                break;

            case 'checkboxes':
                $smarty->trigger_error('html_checkboxes: the use of the "checkboxes" attribute is deprecated, use "options" instead', E_USER_WARNING);
                $options = (array)$_val;
                break;

            case 'assign':
                break;
			case 'labelstr':
                $$_key = $_val;
                break;
            case 'step':
                $$_key = (int)$_val;
                break;
            case 'stepstr':
                $$_key = $_val;
                break;    
            default:
                if(!is_array($_val)) {
                    $extra .= ' '.$_key.'="'.smarty_function_escape_special_chars($_val).'"';
                } else {
                    $smarty->trigger_error("html_checkboxes: extra attribute '$_key' cannot be an array", E_USER_NOTICE);
                }
                break;
        }
    }
    
	if($bit){
		$selected = $selected[0];
		if(!empty($explode)){
			$selected = explode($explode,$selected);
		}else{
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
		}
			
		
		
		//print_r($selected);
	}
    if (!isset($options) && !isset($values))
        return ''; /* raise error here? */

    settype($selected, 'array');
    $_html_result = array();

    if (isset($options)) {    	
		$num = 1;
        foreach ($options as $_key=>$_val){
        	$stepstr1 = '';
        	$stepstr2 = '';
        	if(!empty($step) && !empty($stepstr)){
        		if(($num-1) % $step == 0){
        			$stepstr1 = '<'.$stepstr.'>';
        			
        		}
        		if(($num) % $step == 0 || ($num==count($options))){
        			$stepstr2 = '</'.$stepstr.'>';
        		}
        	}
        	//if($num==1) 
        	$class2 = $class;
        	//else $class2 = NULL; 
        	$_html_result[] = $stepstr1.smarty_function_jw_checkboxes_output($name, $_key, $_val, $selected, $extra, $separator, $labels,$labelstr,$nbspstr,$nbsp,$class2).$stepstr2;
			$num++;
        }
    } else {
    	$num = 1;
        foreach ($values as $_i=>$_key) {
            $_val = isset($output[$_i]) ? $output[$_i] : '';
            if($num==1) $class2 = $class;
        	else $class2 = NULL; 
            $_html_result[] = smarty_function_jw_checkboxes_output($name, $_key, $_val, $selected, $extra, $separator, $labels,$labelstr,$nbspstr,$nbsp,$class2);
        	$num++;
        }

    }

    if(!empty($params['assign'])) {
        $smarty->assign($params['assign'], $_html_result);
    } else {
        return implode("\n",$_html_result);
    }

}

function smarty_function_jw_checkboxes_output($name, $value, $output, $selected, $extra, $separator, $labels,$labelstr,$nbspstr,$nbsp,$class) {
    $_output = '';
    
    if ($labels) $_output .= '<'.$labelstr.'>';
    $_output .= '<input type="checkbox" name="'
        . smarty_function_escape_special_chars($name) . '[]" value="'
        . smarty_function_escape_special_chars($value) . '"';
	if(!empty($class)) $_output .= ' class = '.$class;
    if (in_array((string)$value, $selected)) {
        $_output .= ' checked="checked"';
    }
    $_output .= $extra . ' >';
    if ($nbsp) {
    	$_output.=$nbspstr.$output;
    }else {
    	$_output.=$output;
    }
    if ($labels) $_output .= '</'.$labelstr.'>';
    $_output .=  $separator;
    return $_output;
}

?>
