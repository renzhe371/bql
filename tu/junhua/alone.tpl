<div class="float-r about_de_r">
	<h2>最新动态</h2>
	<div class="guangao_r">
		<{section name="loop" loop=$news_list|smarty:nodefaults}>
		<a class="display-b" href="PicContent<{$news_list[loop].image_id}>.html">
			<img src="http://www.protruly.com.cn/<{$news_list[loop].image_path2}>" alt="">
		</a>
		<h3 class="overflow-nowrap"><a href="PicContent<{$news_list[loop].image_id}>.html">
			<{$news_list[loop].image_name}>
		</a></h3>
		<{/section}> 
	</div>
</div>
