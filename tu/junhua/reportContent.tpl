<div class="about_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 max_w1388 float-l">
			<div class="about_de_l_t">
				<div class="newsTit txt-center">
					<h3 class="lighter">
						<{$res.report_title}>
						<span class="a_artical"><img src="images/pdf.png" />
						<a href="<{$res.notice_pdf}>">查看PDF原文</a></span>
					</h3>
					<em class="font12">
						<span>公告日期：<i><{$res.create_time|date_format:'%Y-%m-%d'}></i></span>
						&nbsp;&nbsp;证劵代码：<span>600074</span> 
						&nbsp;&nbsp;证劵简称：<span>保千里</span>
					</em>
				</div>
				<!-- JiaThis Button BEGIN -->
				<script type="text/javascript" >
				var jiathis_config={
					summary:"",
					shortUrl:false,
					hideMore:false
				}
				</script>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
				<!-- JiaThis Button END -->
				<{$res.report_content|smarty:nodefaults}>
			</div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>
