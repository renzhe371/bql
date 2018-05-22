<div class="about_main market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 bql_download_box_ul max_w1388 float-l overflow">
		<{if $list|smarty:nodefaults|@count ne '0'}>
		<form id="myform" name="myform" action="" method="post">
		<input type="hidden" id="mode" name="mode" value="">
		<input type="hidden" name="p" value="">
			<{if $form.category_id eq '2'||$form.category_id eq '3'||$form.category_id eq '10'||$form.category_id eq '9'}>
			<div class="h5_screen m_auto news_de_bottm_nav">
				<a href="News_category3.html" class="float-l po-r <{if $form.category_id eq '3'}>on<{/if}>">获奖认证</a>
				<a href="News_category10.html" class="float-l po-r <{if $form.category_id eq '10'}>on<{/if}>">展会信息</a>
				<a href="News_category9.html" class="float-l po-r <{if $form.category_id eq '9'}>on<{/if}>">社会责任</a>
			</div>
			<{/if}>
			<ul class="cf box_uls new_box_uls">
				<{section name="loop" loop=$list|smarty:nodefaults}> 
				<li class="float-l">
		             <dl class="cf">
		              <dt class="float-l">
		                <a href="/NewsContent<{$list[loop].news_id}>.html"><img width="248" src="http://www.protruly.com.cn/<{$list[loop].image_path}>" alt="" class="display-b"></a>
		              </dt>
		              <dd>
		                <div class="cf">
		                  <h3 class="overflow-nowrap float-l ti"><a href="/NewsContent<{$list[loop].news_id}>.html"><{$list[loop].news_title|truncate:'88'}></a></h3>
		                </div>
		                <h4 class="sx"><span>时间：<{$list[loop].create_time|date_format:'%Y-%m-%d'}></span>
							<span>点击：<{$list[loop].hits}>次</span></h4>
		                <p class="overflow"><a href="/NewsContent<{$list[loop].news_id}>.html"><{$list[loop].news_ms|smarty:nodefaults}></a></p>

		              </dd>
		            </dl>
		          </li>
				<{/section}>
			</ul>
			<div class="pag_box"><{$pageList|smarty:nodefaults}></div>
		</form>
		<{/if}>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>