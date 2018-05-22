<div class="about_main about_mains m_auto market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 max_w1388 float-l">
			<div class="about_de_l_t job_de_l_t">
				<ol>
					<li><strong>招聘岗位：</strong><{$res.job_jobs|smarty:nodefaults}></li>
					<li><strong>工作地点：</strong><{$res.place|smarty:nodefaults}></li>
					<li><strong>发布时间：</strong><{$res.update_time|date_format:'20%y-%m-%d'}></li>
					<li><strong>工资待遇：</strong><{$res.treatment|smarty:nodefaults}></li>
					<li><strong>性　　别：</strong><{$res.gender|smarty:nodefaults}></li>
					<li><strong>年　　龄：</strong><{$res.age|smarty:nodefaults}></li>
					<li><strong>专业技术：</strong><{$res.professional|smarty:nodefaults}></li>
					<li><strong>学历文凭：</strong><{$res.schooling|smarty:nodefaults}></li>
					<li><strong>需求人数：</strong><{$res.number|smarty:nodefaults}></li>
					<li><strong>有效期限：</strong><{$res.linit|smarty:nodefaults}></li>
				</ol>                  
				<{$res.title|smarty:nodefaults}>
			</div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>