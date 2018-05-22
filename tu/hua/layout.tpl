<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-script-type" content="text/javascript" />
<meta http-equiv="content-style-type" content="text/css" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>后台管理</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/public.js"  ></script>
<script type="text/javascript" src="../js/prototype.js"  ></script>
<script type="text/javascript" src="../js/date/WdatePicker.js"></script>
<script type="text/javascript" src="common/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="common/js/iouweb.jquery.configuration.js"></script>
</head>
<body>
<div id="container">
  <!-- sideBar start-->
    <{include file="sideBar.tpl"}>
  <!-- sideBar end-->
  <!-- main start-->
  <div id="main">
  <a name="TOP"></a>
  	  <!-- main_body start-->
      <{include file=$template_name}>
      <!-- main_body end-->
	  <!-- footer start-->
	  <{include file="footer.tpl"}>
	<!-- footer end-->
  </div>
  <!-- main end-->
</div>
</body>
</html>