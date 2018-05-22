<div class="about_main market_main about_mains m_auto">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 bql_download_box max_w1388 float-l overflow">
			<div class="download_de_t cf">
				<div class="float-l"><img width="200" src="<{$res.soft_img}>" alt=""></div>
				<div class="download_de_t_r">
					<h3><{$res.soft_name}></h3>
					<h4>系统要求：<{$res.soft_sys}></h4>
					<p>
						<span>时间：<{$res.create_time|date_format:"%Y-%m-%d"}></span>
						<span>文件大小：<{$res.soft_size}></span>
						<span>下载：<{$res.soft_hits}>次</span>
					</p>
					<p><b>应用简介：</b><{$res.description|smarty:nodefaults}></p>
					<a class="display-i download_de_but" href="<{$res.soft_url}>">立即下载</a>
				</div>
			</div>		
			<div class="download_de_b">
				<h3 class="yy_title">应用详情</h3>
				<{$res.content|smarty:nodefaults}>
			</div>
		</div>
		<div class="float-r about_de_r bql_main_r">
			<div class="cf new_software">
				<span class="float-l">最新软件</span>
				<div class="float-l">
					<a class="float-l cur" href="javascript:void(0);">电子</a>
					<a class="float-l" href="javascript:void(0);">彼图恩</a>  
					<a class="float-l" href="javascript:void(0);">智联宝</a>
					<a class="float-l" href="javascript:void(0);">打令</a>
				</div>
			</div>
			<div class="new_software_box">
				<div class="new_software_list">
					<{section name="loop" loop=$bql_list|smarty:nodefaults}>
					<dl class="cf">
						<dd class="float-l"><a href="SoftDetail<{$bql_list[loop].soft_id}>.html">
							<img height="80" width="80" src="<{$bql_list[loop].soft_img}>" alt="">
						</a></dd>
						<dt>
							<a class="display-b" href="SoftDetail<{$bql_list[loop].soft_id}>.html">
								<h3 class="overflow-nowrap"><{$bql_list[loop].soft_name}></h3>
								<p class="overflow"><{$bql_list[loop].description|smarty:nodefaults|strip_tags|truncate:180}></p>
							</a>
						</dt>
					</dl>
					<{/section}>
				</div>
				<div class="new_software_list displayNo">
					<{section name="loop" loop=$p2n_list|smarty:nodefaults}>
					<dl class="cf">
						<dd class="float-l"><a href="SoftDetail<{$p2n_list[loop].soft_id}>.html">
							<img height="80" width="80" src="<{$p2n_list[loop].soft_img}>" alt="">
						</a></dd>
						<dt>
							<a class="display-b" href="SoftDetail<{$p2n_list[loop].soft_id}>.html">
								<h3 class="overflow-nowrap"><{$p2n_list[loop].soft_name}></h3>
								<p class="overflow"><{$p2n_list[loop].description|smarty:nodefaults|strip_tags|truncate:180}></p>
							</a>
						</dt>
					</dl>
					<{/section}>
				</div>
				<div class="new_software_list displayNo">
					<{section name="loop" loop=$zlb_list|smarty:nodefaults}>
					<dl class="cf">
						<dd class="float-l"><a href="SoftDetail<{$zlb_list[loop].soft_id}>.html">
							<img height="80" width="80" src="<{$zlb_list[loop].soft_img}>" alt="">
						</a></dd>
						<dt>
							<a class="display-b" href="SoftDetail<{$zlb_list[loop].soft_id}>.html">
								<h3 class="overflow-nowrap"><{$zlb_list[loop].soft_name}></h3>
								<p class="overflow"><{$zlb_list[loop].description|smarty:nodefaults|strip_tags|truncate:180}></p>
							</a>
						</dt>
					</dl>
					<{/section}>
				</div>
				<div class="new_software_list displayNo">
					<{section name="loop" loop=$darl_list|smarty:nodefaults}>
					<dl class="cf">
						<dd class="float-l"><a href="SoftDetail<{$darl_list[loop].soft_id}>.html">
							<img height="80" width="80" src="<{$darl_list[loop].soft_img}>" alt="">
						</a></dd>
						<dt>
							<a class="display-b" href="SoftDetail<{$darl_list[loop].soft_id}>.html">
								<h3 class="overflow-nowrap"><{$darl_list[loop].soft_name}></h3>
								<p class="overflow"><{$darl_list[loop].description|smarty:nodefaults|strip_tags|truncate:180}></p>
							</a>
						</dt>
					</dl>
					<{/section}>
				</div>
			</div>
		</div>
	</div>
</div>