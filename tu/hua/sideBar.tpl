<{php}>
$actions = array(
	"sys"=>array("index.php","admin.php","password.php"),
	"company"=>array("company.php","about.php","ceospeech.php","organization.php","image.php","culture.php","certification.php","law.php","contact.php","security.php"),
	"news"=>array("news_category.php","news.php","pic_category.php","picnews.php","picdesc.php"),  
	"djs"=>array("djs_category.php","djs.php"),
	"chanye"=>array("tech.php","hardware.php","newmedia.php","corplist.php","corp_category.php","softlist.php","trainlist.php","introlist.php","policylist.php","customerlist.php","experlist.php","exper_category.php"),
    "case"=>array("case_category.php","case.php"),   "market"=>array("market_category.php","market.php","market_flv.php","market_other.php","market_image.php","market_media.php","market_live.php","market_zhibo.php","market_h5_category.php","market_zhibo_h5.php","market_zhibo_image.php","market_active.php"),
	"video"=>array("video_category.php","video.php"),
	"announce"=>array("develop.php","notice.php","report.php","way.php"),
	"member"=>array("member.php"),
	"page"=>array("page.php"),
	"service"=>array("service_category.php","service.php","services.php","network.php","download.php","customer.php"),
    "jobs"=>array("strategy.php","job.php","campus.php"),
	"message"=>array("message.php","communication.php"),
	"statistics"=>array("access.php")
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
    <div id="profile-links">Hello, <a href="admin.php"><{$_admin_login.loginName}></a>, you have <a href="message.php?read_state=0"><{getNewMessage}> Messages</a>
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
        <li><a href="ceospeech.php" <{if $action eq 'ceospeech.php'}>class="current"<{/if}>>董事长致辞</a></li>
	    <li><a href="about.php" <{if $action eq 'about.php'}>class="current"<{/if}>>企业介绍</a></li>
        <li><a href="organization.php" <{if $action eq 'organization.php'}>class="current"<{/if}>>组织架构</a></li>
        <li><a href="image.php" <{if $action eq 'image.php'}>class="current"<{/if}>>企业形象</a></li>
        <li><a href="culture.php" <{if $action eq 'culture.php'}>class="current"<{/if}>>企业文化</a></li>
        <li><a href="certification.php" <{if $action eq 'certification.php'}>class="current"<{/if}>>荣誉证书</a></li>
        <li><a href="law.php" <{if $action eq 'law.php'}>class="current"<{/if}>>法律声明</a></li>
		<li><a href="contact.php" <{if $action eq 'contact.php'}>class="current"<{/if}>>联系我们</a></li>
		<li><a href="map.php" <{if $action eq 'map.php'}>class="current"<{/if}>>网站地图</a></li>
		<li><a href="link.php" <{if $action eq 'link.php'}>class="current"<{/if}>>友情连接</a></li>
		<li><a href="security.php" <{if $action eq 'security.php'}>class="current"<{/if}>>隐私保护</a></li>
      </ul>
    </li>
	 <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'djs'}>current<{/if}>"> 大事记 </a>
      <ul style="display:none;">
        <li><a href="djs_category.php" <{if $action eq 'djs_category.php'}>class="current"<{/if}>>分类管理</a></li>
	    <li><a href="djs.php" <{if $action eq 'djs.php'}>class="current"<{/if}>>信息列表</a></li>
      </ul>
    </li>
	 <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'news'}>current<{/if}>"> 新闻中心 </a>
      <ul style="display:none;">
        <li><a href="news_category.php" <{if $action eq 'news_category.php'}>class="current"<{/if}>>分类管理</a></li>
	    <li><a href="news.php" <{if $action eq 'news.php'}>class="current"<{/if}>>信息列表</a></li>
        <li><a href="pic_category.php" <{if $action eq 'pic_category.php'}>class="current"<{/if}>>图片管理</a></li>
	    <li><a href="picnews.php" <{if $action eq 'picnews.php'}>class="current"<{/if}>>图片列表</a></li>
	    <li><a href="picdesc.php" <{if $action eq 'picdesc.php'}>class="current"<{/if}>>图片详情</a></li>
      </ul>
    </li>
	<li> <a href="#" class="nav-top-item <{if $focusMenu eq 'chanye'}>current<{/if}>">集团产业 </a>
      <ul style="display:none;">
        <li><a href="tech.php" <{if $action eq 'tech.php'}>class="current"<{/if}>>技术列表</a></li>
        <li><a href="hardware.php" <{if $action eq 'hardware.php'}>class="current"<{/if}>>咨询服务</a></li>
        <li><a href="newmedia.php" <{if $action eq 'newmedia.php'}>class="current"<{/if}>>客户支持</a></li>
        <li><a href="introlist.php" <{if $action eq 'introlist.php'}>class="current"<{/if}>>说明列表</a></li>
        <li><a href="policylist.php" <{if $action eq 'policylist.php'}>class="current"<{/if}>>政策列表</a></li>
        <li><a href="customerlist.php" <{if $action eq 'customerlist.php'}>class="current"<{/if}>>售后列表</a></li>
        <li><a href="corplist.php" <{if $action eq 'corplist.php'}>class="current"<{/if}>>公司列表</a></li>
        <li><a href="corp_category.php" <{if $action eq 'corp_category.php'}>class="current"<{/if}>>软件分类</a></li>
        <li><a href="softlist.php" <{if $action eq 'softlist.php'}>class="current"<{/if}>>软件列表</a></li>
        <li><a href="trainlist.php" <{if $action eq 'trainlist.php'}>class="current"<{/if}>>培训列表</a></li>
        <li><a href="exper_category.php" <{if $action eq 'exper_category.php'}>class="current"<{/if}>>体验分类</a></li>
        <li><a href="experlist.php" <{if $action eq 'experlist.php'}>class="current"<{/if}>>体验列表</a></li>
      </ul>
    </li>
     <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'market'}>current<{/if}>">活动专题</a>
      <ul style="display:none;">
        <li><a href="market_category.php" <{if $action eq 'market_category.php'}>class="current"<{/if}>>分类管理</a></li>
	    <li><a href="market.php" <{if $action eq 'market.php'}>class="current"<{/if}>>专题列表</a></li>
	    <li><a href="market_flv.php" <{if $action eq 'market_flv.php'}>class="current"<{/if}>>媒体报道列表</a></li>
		<li><a href="market_other.php" <{if $action eq 'market_other.php'}>class="current"<{/if}>>其它专题列表</a></li>
	    <li><a href="market_live.php" <{if $action eq 'market_live.php'}>class="current"<{/if}>>现场图片列表</a></li>
	    <li><a href="market_image.php" <{if $action eq 'market_image.php'}>class="current"<{/if}>>图片报道列表</a></li>
	    <li><a href="market_media.php" <{if $action eq 'market_media.php'}>class="current"<{/if}>>视频合辑列表</a></li>
	    <li><a href="market_zhibo.php" <{if $action eq 'market_zhibo.php'}>class="current"<{/if}>>直播列表</a></li>
	    <li><a href="market_h5_category.php" <{if $action eq 'market_h5_category.php'}>class="current"<{/if}>>直播H5分类</a></li>
	    <li><a href="market_zhibo_h5.php" <{if $action eq 'market_zhibo_h5.php'}>class="current"<{/if}>>直播H5列表</a></li>
	    <li><a href="market_zhibo_image.php" <{if $action eq 'market_zhibo_image.php'}>class="current"<{/if}>>直播图片列表</a></li>
	    <li><a href="market_active.php" <{if $action eq 'market_active.php'}>class="current"<{/if}>>活动赢礼品列表</a></li>
      </ul>
    </li>
	<li> <a href="#" class="nav-top-item <{if $focusMenu eq 'announce'}>current<{/if}>"> 投资者关系 </a>
      <ul style="display:none;">
	    <li><a href="develop.php" <{if $action eq 'develop.php'}>class="current"<{/if}>>企业发展</a></li>
		<li><a href="notice.php" <{if $action eq 'notice.php'}>class="current"<{/if}>>公司公告</a></li>
		<li><a href="report.php" <{if $action eq 'report.php'}>class="current"<{/if}>>分析报告</a></li>
		<li><a href="way.php" <{if $action eq 'way.php'}>class="current"<{/if}>>联系方式</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'video'}>current<{/if}>"> 多媒体视频中心 </a>
      <ul style="display:none;">
        <li><a href="video_category.php" <{if $action eq 'video_category.php'}>class="current"<{/if}>>分类管理</a></li>
	    <li><a href="video.php" <{if $action eq 'video.php'}>class="current"<{/if}>>媒体列表</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'service'}>current<{/if}>"> 服务支持 </a>
      <ul style="display:none;">
       <li><a href="services.php" <{if $action eq 'services.php'}>class="current"<{/if}>>服务政策</a></li>
       <li><a href="network.php" <{if $action eq 'network.php'}>class="current"<{/if}>>招商服务政策</a></li>
        <li><a href="service_category.php" <{if $action eq 'service_category.php'}>class="current"<{/if}>>安全问答、知识分类管理</a></li>
	    <li><a href="service.php" <{if $action eq 'service.php'}>class="current"<{/if}>>安全问答、知识信息列表</a></li>
        <li><a href="download.php" <{if $action eq 'download.php'}>class="current"<{/if}>>下载中心</a></li>
        <li><a href="customer.php" <{if $action eq 'customer.php'}>class="current"<{/if}>>联系客服</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'jobs'}>current<{/if}>"> 人力资源 </a>
      <ul style="display:none;">
        <li><a href="strategy.php" <{if $action eq 'strategy.php'}>class="current"<{/if}>>人才策略</a></li>
		<li><a href="job.php" <{if $action eq 'job.php'}>class="current"<{/if}>>社会招聘</a></li>
        <li><a href="campus.php" <{if $action eq 'campus.php'}>class="current"<{/if}>>校园招聘</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'message'}>current<{/if}>"> 留言管理 </a>
      <ul style="display:none;">
        <li><a href="message.php?read_state=0" <{if $action eq 'message.php' and $read_state eq '0'}>class="current"<{/if}>>未读留言(<{getNewMessage}>)</a></li>
	    <li><a href="message.php?read_state=1" <{if $action eq 'message.php' and $read_state eq '1'}>class="current"<{/if}>>已读留言</a></li>
		<li><a href="communication.php" <{if $action eq 'communication.php'}>class="current"<{/if}>>直播评论列表</a></li>
      </ul>
    </li>
    <li> <a href="#" class="nav-top-item <{if $focusMenu eq 'statistics'}>current<{/if}>"> 统计管理 </a>
      <ul style="display:none;">
        <li><a href="access.php" <{if $action eq 'access.php'}>class="current"<{/if}>>访问统计</a></li>
      </ul>
    </li>
  </ul>
</div>
