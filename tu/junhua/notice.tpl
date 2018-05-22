<div class="about_main about_mains m_auto">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 bql_news_box max_w1388 overflow">
			<div class="touzizhe_list_box">
				<h2>集团公告</h2>
				<div class="touzizhe_list cf">
				<{if $list|smarty:nodefaults|@count ne '0'}>
				<form id="myform" name="myform" action="" method="POST">
				<input type="hidden" id="mode" name="mode" value="">
				<input type="hidden" name="p" value="">
					<{section name="loop" loop=$list|smarty:nodefaults}>
					<dl class="cf float-l">
					  <dt class="float-l">
						<h4><{$list[loop].create_time|date_format:'%Y'}>年</h4>
						<span><{$list[loop].create_time|date_format:'%m'}>月<{$list[loop].create_time|date_format:'%d'}>日</span>
					  </dt>
					  <dd>
						<h3 class="overflow-nowrap"><{$list[loop].notice_title}></h3>
						<p class="overflow-nowrap"><{$list[loop].notice_title}></p>
						<a class="display-b" href="NoticeContent<{$list[loop].notice_id}>.html">点击查看</a>
					  </dd>
					</dl>
					<{/section}>
				</div>
				<div class="pag_box"><{$pageList|smarty:nodefaults}></div>
				</form>
				<{/if}>  
			</div>
		</div>
	</div>
</div>