<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<{section name="loop" loop=$corp_list|smarty:nodefaults}>
		<li class="float-l">
			<{if $form.category_id eq ''}>
			<a href="IntroList.html?category_id=<{$corp_list[loop].corp_id}>" <{if $smarty.section.loop.first}>class="cur"<{/if}>>
				<img src="<{$corp_list[loop].corp_logo}>">
			</a>
			<{else}>
			<a href="IntroList.html?category_id=<{$corp_list[loop].corp_id}>" <{if $corp_list[loop].corp_id eq $form.category_id}>class="cur"<{/if}>>
				<img src="<{$corp_list[loop].corp_logo}>">
			</a>
			<{/if}>
		</li>
		<{/section}>
		<li class="float-r">
			<a href="javascript:history.go(-1)" class="display-i">返回上页</a>
		</li>
	</ul>
</div>
<div class="about_main about_mains m_auto market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 max_w1388 float-l">
			<div class="about_de_l_t"><{$res.content|smarty:nodefaults}></div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>
