<div class="about_main market_main about_mains m_auto">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="actvity_list about_de_l min_w1200 max_w1388 float-l">
		<form id="myform" name="myform" action="" method="POST">
			<input type="hidden" id="mode" name="mode" value="">
			<input type="hidden" name="p" value="">
			<ul class="actvity_list_ul actvityClassi">
			<{if $list|smarty:nodefaults|@count ne '0'}>
			<{section name="loop" loop=$list|smarty:nodefaults}> 
			<li class="po-r <{if $smarty.section.loop.index<3}>top3<{/if}>">
				<abbr class="po-a"></abbr>
				<i class="po-a"><{$list[loop].create_time|date_format:'%Y-%m-%d'}></i>
				<a class="display-b" href="/MarketContent<{$list[loop].market_id}>.html">
				<dl>
					<dt>
						<h3><{$list[loop].market_name}></h3>
						<p><{$list[loop].intro|smarty:nodefaults|strip_tags|truncate:'280'}></p>
					</dt>
					<dd>
						<img src="<{$list[loop].image_path2}>"  alt="">
					</dd>
				</dl>
				</a>
			</li>
			<{/section}>
			</ul>
		</form>
		<{/if}>
		<div class="pag_box"><{$pageList|smarty:nodefaults}></div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>	