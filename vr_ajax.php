<?php 

$file ="krpano.xml";

//创建DOMDocument的对象

$dom = new DOMDocument('1.0', 'utf-8');

//载入krpano.xml文件
$dom->load($file);

//获得record节点的集合
$records = $dom->getElementsByTagName('preview');

$record = $records->item(0);

$img=$_POST['src'];
$record->setAttribute('url',$img);

$res=$dom->save('krpano.xml');
?>