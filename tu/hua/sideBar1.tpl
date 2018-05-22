<{php}>
$actions = array(
	"sys"=>array(
			"index.php","admin.php","password.php"),
	"company"=>array(
			"company.php","about.php","ceospeech.php","organization.php","image.php","culture.php","certification.php","history.php","law.php","contact.php"),
	"news"=>array(
			"news_category.php","news.php"),
    "solutions"=>array(
			"security.php","commercial.php","education.php","civilianuse.php"),
    "case"=>array(
			"case_category.php","case.php"),
	"product"=>array(
			"product_category.php","product.php"),
	"member"=>array(
			"member.php"),
	"page"=>array(
			"page.php"),
	"service"=>array(
			"service_category.php","service.php","services.php","network.php","download.php","customer.php"),
    "jobs"=>array(
			"strategy.php","social.php","campus.php"),
	"message"=>array(
			"message.php"),
	"statistics"=>array(
			"access.php")
);
$action = basename($_SERVER["SCRIPT_FILENAME"]);
$this->assign("action",$action);if($action=='message.php')
{
	$this->assign("read_state",$_REQUEST['read_state']);
}
while(list($k,$v)=each($actions))
{
	if(in_array($action, $v))
	{
		$this->assign("focusMenu",$k);
		break;
	}
}
<{/php}>
<div id="sideBar">
  <div id="header">
    <h1 id="sidebar-title"><a href="index.php">PROTRULY Admin</a></h1>
    <div id="logo"><a href="index.php"><img src="common/images/logo_221.png" alt="PROTRULY Admin logo"/></a></div>
    <div id="profile-links"><{if $_admin_login.loginPermission eq '1'}>Hello, <a href="admin.php"><{$_admin_login.loginName}></a>, you have <a href="message.php?read_state=0"><{getNewMessage}> Messages</a><{/if}>
      <p><a href="/index.html" target="_blank">网站首页</a> | <a href="logout.php" onclick="javascript:if(!confirm('确定退出本系统？')) return false;">安全退出</a> </p>
    </div>
  </div>
  <ul id="subnav">
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'sys'}>current<{/if}>"> 系统管理 </a>
      <ul>
        <li><a href="index.php" <{if $action eq 'index.php'}>class="current"<{/if}>>系统信息</a></li>
        <{if $_admin_login.loginPermission eq '1'}><li><a href="admin.php" <{if $action eq 'admin.php'}>class="current"<{/if}>>管理员</a></li>
        <{else}><li><a href="password.php" <{if $action eq 'password.php'}>class="current"<{/if}>>密码修改</a></li><{/if}>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'company'}>current<{/if}>"> 企业信息 </a>
      <ul style="display:none;">
        <li><a href="company.php" <{if $action eq 'company.php'}>class="current"<{/if}>>基本信息</a></li>
	    <li><a href="about.php" <{if $action eq 'about.php'}>class="current"<{/if}>>企业介绍</a></li>
        <li><a href="ceospeech.php" <{if $action eq 'ceospeech.php'}>class="current"<{/if}>>董事长致辞</a></li>
        <li><a href="organization.php" <{if $action eq 'organization.php'}>class="current"<{/if}>>组织架构</a></li>
        <li><a href="image.php" <{if $action eq 'image.php'}>class="current"<{/if}>>企业形象</a></li>
        <li><a href="culture.php" <{if $action eq 'culture.php'}>class="current"<{/if}>>企业文化</a></li>
        <li><a href="certification.php" <{if $action eq 'certification.php'}>class="current"<{/if}>>荣誉证书</a></li>
        <li><a href="history.php" <{if $action eq 'history.php'}>class="current"<{/if}>>大记事</a></li>
        <li><a href="law.php" <{if $action eq 'law.php'}>class="current"<{/if}>>法律声明</a></li>
	    <li><a href="contact.php" <{if $action eq 'contact.php'}>class="current"<{/if}>>联系我们</a></li>
      </ul>
    </li>
	 <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'news'}>current<{/if}>"> 新闻中心 </a>
      <ul style="display:none;">
        <li><a href="news_category.php" <{if $action eq 'news_category.php'}>class="current"<{/if}>>分类管理</a></li>
	    <li><a href="news.php" <{if $action eq 'news.php'}>class="current"<{/if}>>信息列表</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'solutions'}>current<{/if}>"> 解决方案 </a>
      <ul style="display:none;">
        <li><a href="security.php" <{if $action eq 'security.php'}>class="current"<{/if}>>安防</a></li>
	    <li><a href="commercial.php" <{if $action eq 'commercial.php'}>class="current"<{/if}>>商用</a></li>
        <li><a href="education.php" <{if $action eq 'education.php'}>class="current"<{/if}>>教育</a></li>
        <li><a href="civilianuse.php" <{if $action eq 'civilianuse.php'}>class="current"<{/if}>>民用</a></li>
      </ul>
    </li>
     <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'case'}>current<{/if}>">工程案例 </a>
      <ul style="display:none;">
        <li><a href="case_category.php" <{if $action eq 'case_category.php'}>class="current"<{/if}>>分类管理</a></li>
	    <li><a href="case.php" <{if $action eq 'case.php'}>class="current"<{/if}>>案例列表</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'product'}>current<{/if}>"> 产品中心 </a>
      <ul style="display:none;">
        <li><a href="product_category.php" <{if $action eq 'product_category.php'}>class="current"<{/if}>>产品分类</a></li>
	    <li><a href="product.php" <{if $action eq 'product.php'}>class="current"<{/if}>>产品列表</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'service'}>current<{/if}>"> 服务支持 </a>
      <ul style="display:none;">
       <li><a href="services.php" <{if $action eq 'services.php'}>class="current"<{/if}>>服务政策</a></li>
        <li><a href="service_category.php" <{if $action eq 'service_category.php'}>class="current"<{/if}>>安全问答、知识分类管理</a></li>
	    <li><a href="service.php" <{if $action eq 'service.php'}>class="current"<{/if}>>安全问答、知识信息列表</a></li>
        <li><a href="network.php" <{if $action eq 'network.php'}>class="current"<{/if}>>服务网点</a></li>
        <li><a href="download.php" <{if $action eq 'download.php'}>class="current"<{/if}>>下载中心</a></li>
        <li><a href="customer.php" <{if $action eq 'customer.php'}>class="current"<{/if}>>联系客服</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'jobs'}>current<{/if}>"> 人力资源 </a>
      <ul style="display:none;">
        <li><a href="strategy.php" <{if $action eq 'strategy.php'}>class="current"<{/if}>>人才策略</a></li>
	    <li><a href="social.php" <{if $action eq 'social.php'}>class="current"<{/if}>>社会招聘</a></li>
        <li><a href="campus.php" <{if $action eq 'campus.php'}>class="current"<{/if}>>校园招聘</a></li>
      </ul>
    </li>
    <{if $_admin_login.loginPermission eq '1'}>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'message'}>current<{/if}>"> 留言管理 </a>
      <ul style="display:none;">
        <li><a href="message.php?read_state=0" <{if $action eq 'message.php' and $read_state eq '0'}>class="current"<{/if}>>未读留言(<{getNewMessage}>)</a></li>
	    <li><a href="message.php?read_state=1" <{if $action eq 'message.php' and $read_state eq '1'}>class="current"<{/if}>>已读留言</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'statistics'}>current<{/if}>"> 统计管理 </a>
      <ul style="display:none;">
        <li><a href="access.php" <{if $action eq 'access.php'}>class="current"<{/if}>>访问统计</a></li>
      </ul>
    </li>
    <{/if}>
  </ul>
</div>
