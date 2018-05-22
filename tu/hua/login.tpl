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
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script src="/js/public.js" type="text/javascript"></script>
</head>
<body>
<div id="login-wrapper">
  <div id="login-top">
    <h1>PROTRULY Admin</h1>
    <div id="logo"><img src="common/images/logo.png" alt="IOUWEB Admin logo" /></div>
  </div>
  <div id="login-content">
    <form id="myform" name="myform" method="post">
    <input type="hidden" id="mode" name="mode" value="">
      <div class="notification information png_bg">
        <div> 请输入用户名和密码 </div>
      </div>
      <p>
        <label>用 户 名</label>
        <input class="text-input" type="text" name="admin_name" id="admin_name" value="<{$form.admin_name}>"/>
      </p>
      <p>
        <label>密 码</label>
        <input class="text-input" type="password" name="admin_password" id="admin_password" value=""/>
      </p>
      <p>
          <{if $errmsg ne ''}><div style="color:#f00;"><{$errmsg}></div><{/if}>
      </p>
      <p>
        <input class="button" type="submit" value="登 录" onClick="mySubmit('LOGIN');return false;"/>
      </p>
    </form>
  </div>
</div>
<!--[if lte IE 6]>
	<script type="text/javascript" src="common/js/MSIE.PNG.js"></script>
	<script type="text/javascript">
		fixPng("common/js/blank.gif");
	</script>
	<script type="text/javascript" src="common/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('#login-wrapper');
	</script>
<![endif]-->
</body>
</html>
