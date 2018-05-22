<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<li class="float-l">
			<a href="javascript:void(0);" class="display-i cur"><{$res.tech_name}></a>
		</li>
		<li class="float-r"><a href="javascript:history.go(-1);" class="display-i">返回上页</a></li>
	</ul>
</div>
<div class="about_main about_mains m_auto market_main news_tech_box">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<{if $res.tech_id eq '6'}>
		<div class="about_de_l min_w1200 bql_download_box_ul max_w1388 float-l overflow">
			<div class="h5_screen m_auto news_de_bottm_nav">
				<{foreach item=item key=key from=""|getCorpCategory}>
					<a href="Tech_category<{$key}>.html" class="float-l po-r <{if $form.category_id eq $key}>on<{/if}>">
						<{$item}>
					</a>
				<{/foreach}>
			</div>
			<{if $case_list|smarty:nodefaults|@count ne '0'}>
			<form id="myform" name="myform" action="" method="post">
			<input type="hidden" id="mode" name="mode" value="">
			<input type="hidden" name="p" value="">
				<ul class="cf box_uls new_box_uls">
					<{section name="loop" loop=$case_list|smarty:nodefaults}> 
					<li class="float-l">
						 <dl class="cf">
						  <dt class="float-l">
							<a href="/NewsContent<{$case_list[loop].news_id}>.html"><img width="248" src="http://www.protruly.com.cn/<{$case_list[loop].image_path}>" alt="" class="display-b"></a>
						  </dt>
						  <dd>
							<div class="cf">
							  <h3 class="overflow-nowrap float-l ti"><a href="/NewsContent<{$case_list[loop].news_id}>.html"><{$case_list[loop].news_title|truncate:'88'}></a></h3>
							</div>
							<h4 class="sx"><span>时间：<{$case_list[loop].create_time|date_format:'%Y-%m-%d'}></span>
								<span>点击：<{$case_list[loop].hits}>次</span></h4>
							<p class="overflow"><a href="/NewsContent<{$case_list[loop].news_id}>.html"><{$case_list[loop].news_ms|smarty:nodefaults}></a></p>

						  </dd>
						</dl>
					</li>
					<{/section}>
				</ul>
				<div class="pag_box"><{$pageList|smarty:nodefaults}></div>
			</form>
			<{/if}>
		</div>
		<{else}>
		<div class="about_de_l min_w1200 max_w1388 float-l overflow">
			<{$res.tech_content|smarty:nodefaults}>
		</div>
		<{/if}>
		<{include file='alone.tpl'}>
	</div>
</div>
