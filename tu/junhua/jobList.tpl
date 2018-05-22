<div class="about_main about_mains m_auto market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 max_w1388 float-l about_hr_l">
			<div class="about_de_l_t job_de_l_t">
				<h1 class="title_h1">校园招聘</h1>
				<{$campus_content|smarty:nodefaults}>
				<h1 class="title_h1">社会招聘</h1>
				<table>
					<tr>
						<th class="align_l">职位名称</th>
						<th class="align_l">专业技术</th>
						<th>需求人数</th>
						<th>发布时间</th>
						<th>有效期限</th>
					</tr>
					<{section name="loop" loop=$list|smarty:nodefaults}>
					<tr>
						<td class="align_l"><a href="/JobContent<{$list[loop].job_id}>.html"><{$list[loop].job_jobs}></a></td>
						<td class="align_l"><a href="/JobContent<{$list[loop].job_id}>.html"><{$list[loop].professional}></a></td>
						<td><{$list[loop].number}></td>
						<td><{$list[loop].update_time|date_format:'%Y-%m-%d'}></td>
						<td><{$list[loop].linit}></td>
					</tr>
					<{/section}> 
				</table>
			</div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>
