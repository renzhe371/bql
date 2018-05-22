<div class="about_main news_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto  bql_download_box_ul">
		<div class="news_de">
			<div class="news_de_top">
				<ul class="cf">
					<{section name="loop" loop=$list2|smarty:nodefaults}> 
					<li class="float-l">
						<a href="/PicContent<{$list2[loop].image_id}>.html" class="display-b">
							<img width="100%" src="http://www.protruly.com.cn/<{$list2[loop].image_path}>" alt="">
							<h3 class="overflow-nowrap"><{$list2[loop].image_name}></h3>
						</a>
					</li>
					<{/section}>
				</ul>
			</div>
			<div id="news_de_bottm" class="news_de_bottm m_auto">
			<{if $list|smarty:nodefaults|@count ne '0'}>
			<form id="myform" name="myform" action="" method="post">
			<input type="hidden" id="mode" name="mode" value="">
			<input type="hidden" name="p" value="">
			
				<ul class="cf box_uls new_box_uls new_all_uls" style="width: 102%;">
				<{section name="loop" loop=$list|smarty:nodefaults}> 
				
				 <li class="float-l">
		             <dl class="cf">
		              <dt class="float-l">
		                <a href="/NewsContent<{$list[loop].news_id}>.html"><img style="height:auto;min-height:102px;" width="100%" src="http://www.protruly.com.cn/<{$list[loop].image_path}>" alt="" class="display-b"></a>
		              </dt>
		              <dd>
		                <div class="cf">
		                  <h3 class="overflow-nowrap float-l ti"><a href="/NewsContent<{$list[loop].news_id}>.html"><{$list[loop].news_title|truncate:'88'}></a></h3>
		                </div>
		                <h4 class="sx overflow-nowrap"><span>时间：<{$list[loop].create_time|date_format:'%Y-%m-%d'}></span>
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
		</div>
	</div>
</div>	
<!--主体内容结束-->