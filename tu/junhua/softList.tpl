<div class="about_navs bql_main_navs ">
	<ul class="max_w1750 m_auto min_w1200 po-r cf po-r">
		<li class="bql_main_navs_t">
			<span class="display-i">公司：</span>
			<a class="display-i <{if $form.parent_id eq ''}>cur<{/if}>" href="SoftDownload.html">全部</a>
			<{section name="loop" loop=$corp_list|smarty:nodefaults}>
			<a class="display-i <{if $corp_list[loop].corp_id eq $form.parent_id}>cur<{/if}>" href="SoftDownload.html?parent_id=<{$corp_list[loop].corp_id}>">
				<img src="<{$corp_list[loop].corp_logo}>">
			</a>
			<{/section}>
		</li>
		<li class="bql_main_navs_t">
			<span class="display-i">类别：</span>
			<a class="display-i <{if $form.parent_id eq ''}>cur<{/if}>" href="SoftDownload.html">全部</a>
			<{section name="loop" loop=$cat_list|smarty:nodefaults}>
			<a class="display-i <{if $cat_list[loop].category_id eq $form.category_id}>cur<{/if}>" href="SoftDownload.html?category_id=<{$cat_list[loop].category_id}>">
				<{$cat_list[loop].category_name}>
			</a>
			<{/section}>
		</li>
		<a href="javascript:history.go(-1)" class="display-i po-a">返回上页</a>
	</ul>
</div>
<div class="about_main market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 bql_download_box_ul max_w1388 float-l overflow">
		<{if $list|smarty:nodefaults|@count ne '0'}>
		<form id="myform" name="myform" action="" method="post">
			<input type="hidden" id="mode" name="mode" value="">
			<input type="hidden" name="p" value="">
			<div class="sort_ser">
				<{if $hots eq ''}>
				<a href="SoftDownload.html?order=time" style="color:#222">按时间</a><span>|</span><a href="SoftDownload.html?order=hots">按热度</a>
				<{else}>
				<a href="SoftDownload.html?order=time">按时间</a><span>|</span><a href="SoftDownload.html?order=hots" style="color:#222">按热度</a>
				<{/if}>
			</div>
			<ul class="cf box_uls">
				<{section name="loop" loop=$list|smarty:nodefaults}>
				
				 <li class="float-l">
		             <dl class="cf">
		              <dt class="float-l">
		                <a href="SoftDetail<{$list[loop].soft_id}>.html"><img width="122" src="<{$list[loop].soft_img}>" alt=""></a>
		              </dt>
		              <dd>
		                <div class="cf">
		                  <h3 class="overflow-nowrap float-l"><a href="SoftDetail<{$list[loop].soft_id}>.html"><{$list[loop].soft_name}></a></h3>
		                  <div class="float-r">
		                    <span>文件大小：<{$list[loop].soft_size}></span>
		                    <span>时间：<{$list[loop].create_time|date_format:"%Y-%m-%d"}></span>
		                  </div>
		                </div>
		                <h4>系统要求：<{$list[loop].soft_sys}></h4>
		                  <p class="overflow"><a href="SoftDetail<{$list[loop].soft_id}>.html"><{$list[loop].description|smarty:nodefaults}>...</a></p>

		              </dd>
		            </dl>
		          </li>
				<{/section}>
			</ul>
			<div class="pag_box"><{$pageList|smarty:nodefaults}></div>
		</form>
		<{/if}>
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