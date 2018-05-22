<div class="about_navs">
	<ul class="max_w1750 m_auto min_w1200 po-r cf">
		<{section name="loop" loop=$list|smarty:nodefaults}>
		<li class="float-l">
			<a href="TrainContent<{$list[loop].train_id}>.html" class="display-i <{if $smarty.section.loop.first}>cur<{/if}>">
				<{$list[loop].train_corp}>
			</a>
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
			<div class="about_de_l_t"><{$list[0].train_content|smarty:nodefaults}></div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>


