<{if $pageFlag eq '2'}>
<!--主体内容开始-->
<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<li class="float-l">
			<a href="News_category2.html" class="display-i <{if $form.category_id eq '2'||$form.category_id eq '3'||$form.category_id eq '10'||$form.category_id eq '9'}>cur<{/if}>">企业新闻</a>
		</li>
		<li class="float-l">
			<a href="News_category4.html" class="display-i <{if $form.category_id eq '4'}>cur<{/if}>">行业新闻</a>
		</li>
		<li class="float-l">
			<a href="News_category1.html" class="display-i <{if $form.category_id eq '1'}>cur<{/if}>">媒体新闻</a>
		</li>
		<li class="float-l">
			<a href="VideoList.html" class="display-i <{if $action eq 'videolist.php'}>cur<{/if}>">视频中心</a>
		</li>
		<li class="float-l">
			<a href="PicNews.html" class="display-i <{if $action eq 'picnews.php'}>cur<{/if}>">图片新闻</a>
		</li>
		<li class="float-r"><a href="javascript:history.go(-1);" class="display-i">返回上页</a></li>
	</ul>
</div>

<{elseif $pageFlag eq '3'}>
<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<li class="float-l">
			<a href="Hardware.html" class="display-i <{if $action eq 'hardware.php'}>cur<{/if}>">咨询服务</a>
		</li>
		<li class="float-l">
			<a href="ExperService.html" class="display-i <{if $action eq 'ExperService.php'}>cur<{/if}>">体验服务</a>
		</li>
		<li class="float-l">
			<a href="NewMedia.html" class="display-i <{if $action eq 'newmedia.php'}>cur<{/if}>">客户支持</a>
		</li>
		<li class="float-r">
			<a href="javascript:history.go(-1)" class="display-i">返回上页</a>
		</li>
	</ul>
</div>

		  
<{elseif $pageFlag eq '4'}>
<!--主体内容开始-->
<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<{foreach item=item key=key from=""|getMarketCategory}>
		<li class="float-l">
			<a href="/Market_category<{$key}>.html" class="display-i <{if $form.category_id eq $key}>cur<{/if}>">	
				<{$item}>
			</a>
		</li>
		<{/foreach}>
		<li class="float-l">
			<a href="H5list.html" class="display-i <{if $action eq 'H5list.php'}>cur<{/if}>">活动H5</a>
		</li>
		<li class="float-r"><a href="javascript:history.go(-1)" class="display-i">返回上页</a></li>
	</ul>
</div>
		  
<{elseif $pageFlag eq '5'}>
<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<li class="float-l">
			<a href="Develop.html" class="display-i <{if $action eq 'develop.php'}>cur<{/if}>">企业发展</a>
		</li>
		<li class="float-l">
			<a href="Notice.html" class="display-i <{if $action eq 'notice.php'}>cur<{/if}>">集团公告</a>
		</li>
		<li class="float-l">
			<a href="Report.html" class="display-i <{if $action eq 'report.php'}>cur<{/if}>">分析报告</a>
		</li>
		<li class="float-l">
			<a href="Way.html" class="display-i <{if $action eq 'way.php'}>cur<{/if}>">联系方式</a>
		</li>
		<li class="float-r">
			<a href="javascript:history.go(-1)" class="display-i">返回上页</a>
		</li>
	</ul>
</div>

<{elseif $pageFlag eq '6'}>
       
<{elseif $pageFlag eq '7'}>
<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<li class="float-l">
			<a href="About.html" class="display-i <{if $action eq 'about.php'||$action eq 'image.php'||$action eq 'certification.php'||$action eq 'history.php'}>cur<{/if}>">企业介绍</a>
		</li>
		<li class="float-l">
			<a href="CEO_Speech.html" class="display-i <{if $action eq 'ceospeech.php'}>cur<{/if}>">董事长致辞</a>
		</li>
		<li class="float-l">
			<a href="Organization.html" class="display-i <{if $action eq 'organization.php'}>cur<{/if}>">企业架构</a>
		</li>
		<li class="float-l">
			<a href="Culture.html" class="display-i <{if $action eq 'culture.php'}>cur<{/if}>">企业文化</a>
		</li>
		<li class="float-l">
			<a href="JobList.html" class="display-i <{if $action eq 'joblist.php'}>cur<{/if}>">人力资源</a>
		</li>
		<li class="float-r">
			<a href="javascript:history.go(-1)" class="display-i">返回上页</a>
		</li>
	</ul>
</div>

<{/if}>