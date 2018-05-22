<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
<meta name="baidu-site-verification" content="yNcJMPoOr1" />
<link rel="stylesheet"  href="css/style.css?v=5" type="text/css">
<link rel="stylesheet"  href="css/animate.css" type="text/css">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/jquery.mousewheel.js"></script> 
<script type="text/javascript" src="include/rec/cn/alertmsg.js"></script> 

<meta name="description" content='<{section name="loop" loop=$company_list|smarty:nodefaults}><{$company_list[loop].description}><{/section}>' />
<meta name="keywords" content='<{section name="loop" loop=$company_list|smarty:nodefaults}><{$company_list[loop].keywords}><{/section}>' />
<title>
 <{if $action eq 'index.php'}>
<{section name="loop" loop=$company_list|smarty:nodefaults}>
<{$company_list[loop].company_name}>
 <{/section}>
 <{section name="loop" loop=$company_list|smarty:nodefaults}>
	- <{$company_list[loop].title}>
<{/section}>
<{else}>

<{if $action eq 'about.php'}>关于保千里<{/if}>
<{if $action eq 'jobs.php'}>人力资源<{/if}>
<{if $action eq 'introduction.php'}>企业介绍<{/if}>
<{if $action eq 'ceospeech.php'}>董事长致辞<{/if}>
<{if $action eq 'organization.php'}>企业架构<{/if}>
<{if $action eq 'image.php'}>企业形象<{/if}>
<{if $action eq 'culture.php'}>企业文化<{/if}>
<{if $action eq 'certification.php'}>荣誉证书<{/if}>
<{if $action eq 'history.php'}>大事记<{/if}>
<{if $action eq 'joblist.php'}>人力资源<{/if}>
	<{$res.job_jobs}>
<{if $action eq 'service.php'}>服务指南<{/if}>
<{if $action eq 'servicelist.php'}>常见问答<{/if}>
<{if $action eq 'support.php'}>服务支持<{/if}>
<{if $action eq 'network.php'}>招商服务政策<{/if}>
<{if $action eq 'contact.php'}>联系我们<{/if}>
<{if $action eq 'message.php'}>在线留言<{/if}>
<{if $action eq 'map.php'}>网站地图<{/if}>
<{if $action eq 'link.php'}><{$link_content.active_title}><{/if}>
<{if $action eq 'download.php'}>下载中心<{/if}>
<{if $action eq 'customer.php'}>联系客服<{/if}>
<{if $action eq 'case.php'}>解决方案<{/if}>
<{if $action eq 'news.php'}>新闻资讯<{/if}>
<{if $action eq 'picnews.php'}>图片新闻<{/if}>
<{if $action eq 'videolist.php'}>视频中心<{/if}>
<{if $action eq 'law.php'}>法律声明<{/if}>
<{if $action eq 'softdownload.php'}>软件下载<{/if}>
<{if $action eq 'training.php'}>用户培训<{/if}>
<{if $action eq 'introlist.php'}>保修说明<{/if}>
<{if $action eq 'policylist.php'}>保修政策<{/if}>
<{if $action eq 'customerlist.php'}>售后服务<{/if}>
<{if $action eq 'ExperService.php'}>体验服务<{/if}>
<{if $action eq 'trainlist.php'}><{$res.train_corp}><{/if}>
<{if $action eq 'H5list.php'}>活动H5<{/if}>
<{if $action eq 'activities.php'}>智能硬件+全营销平台<{/if}>
<{if $template_name eq 'zhiboContent.tpl'}><{$zb_res.zb_title}><{/if}>

<{if $action eq 'tech.php'}><{$res.tech_name}><{/if}>
<{if $action eq 'hardware.php'}>咨询服务<{/if}>
<{if $action eq 'internet.php'}>体验服务<{/if}>
<{if $action eq 'newmedia.php'}>客户支持<{/if}>

<{if $action eq 'develop.php'}>企业发展<{/if}>
<{if $template_name eq 'notice.tpl'}>公司公告<{/if}>
<{if $template_name eq 'noticeContent.tpl'}><{$res.notice_title}><{/if}>
<{if $action eq 'report.php'}>分析报告<{/if}>
<{if $action eq 'way.php'}>联系方式<{/if}>

<{if $action eq 'market.php'}>保千里专题<{/if}>
<{if $template_name eq 'xunyan.tpl'}>保千里特种装备商业伙伴联盟暨全国招商巡演<{/if}>

<{if $action eq 'newslist.php'}>
	<{if $form.category_id ne '' }><{$form.category_id|getNewsCategory}><{else}><{/if}>
	<{$res.news_title}>
<{/if}>
<{if $action eq 'picnews.php'}>
	<{if $form.category_id ne '' }><{$form.category_id|getPicCategory}><{else}><{/if}>
	<{$res.image_name}>
<{/if}>
<{if $action eq 'video.php'}>
<{if $form.category_id ne '' }><{$form.category_id|getVideoCategory}><{else}><{/if}>
	<{$res.video_title}>
<{/if}>
<{if $action eq 'servicelist.php'}>
	<{if $form.category_id ne '' }><{$form.category_id|getServiceCategory}><{else}><{/if}>
	<{$res.service_title}>
<{/if}>
<{if $action eq 'caselist.php'}>
	<{if $form.category_id ne '' }><{$form.category_id|getCaseCategory}><{else}><{/if}>
	<{$res.case_name}>
<{/if}>
<{if $template_name eq 'marketing_list.tpl'}>
	<{if $form.category_id ne '' }><{$form.category_id|getMarketCategory}><{else}><{/if}>
<{/if}>
<{if $template_name eq 'marketContent.tpl'}>
	<{$list.market_name}>
<{/if}>

<{section name="loop" loop=$company_list|smarty:nodefaults}>
_ <{$company_list[loop].company_name}>
<{/section}>
<{/if}>
</title>
 
</head>
<body>
<{if $template_name eq 'index.tpl'}>
	<!-- header -->
	<{include file='header.tpl'}>
    <!-- /header -->
<!-- banner -->
        <{include file='banner.tpl'}>
<!-- /banner -->
<!-- main -->

	<!-- mainContent -->
	<{include file=$template_name}>
	<!-- /mainContent -->

<!-- main -->

<!-- footer -->
	<{include file='footer.tpl'}>
<!-- /footer -->

<{elseif $template_name eq 'error.tpl'}>
	<!-- mainContent -->
	<{include file=$template_name}>
	<!-- /mainContent -->
<{elseif $template_name eq 'marketContent.tpl'||$template_name eq 'xunyan.tpl'||$template_name eq 'zhiboContent.tpl'}>
	<!-- header -->
	<{include file='header.tpl'}>
    <!-- /header -->
	<!-- mainContent -->
    	<{include file=$template_name}>
	<!-- /mainContent -->
	<!-- footer -->
	<{include file='footer.tpl'}>
	<!-- /footer -->

<{else}>

	<!-- header -->
	<{include file='header.tpl'}>
    <!-- /header -->
    <!-- location -->
    <{include file='location.tpl'}>
    <!-- /location -->
    <!-- main -->

    	<!-- sideBar -->
    	<{include file='sidebar.tpl'}>
    	<!-- /sideBar -->
    	<!-- mainContent -->
    	<{include file=$template_name}>
    	<!-- /mainContent -->

    <!-- main -->
	<!-- footer -->
	<{include file='footer.tpl'}>
	<!-- /footer -->

<{/if}>
</body>
</html>
<link rel="stylesheet" type="text/css" href="css/slick.css">
<script type="text/javascript" src="js/slick.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/public.js"></script>
<script type="text/javascript" src="js/mobile.js"></script>