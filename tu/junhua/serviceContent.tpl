		<div class="floatR con_area">
		  <div class="overflow conTit_posi">
			   <h2 class="floatL lighter child_con_tit"><{$res.category_id|getServiceCategory}></h2>
			   <div class="floatR position font12">当前位置：<p><a href="/">首页</a>–<a href="Case.html">保千里产业</a>–<span><{$res.category_id|getServiceCategory}></span></p></div>
		  </div>
		  <div class="detail_con">
			  <div class="con_tit">
				  <h4 class="font18 lighter">
					   <{$res.service_title}>
					  <p>发布于：<span><{$res.update_time|date_format:'%Y-%m-%d'}></span></p>
				   </h4>
			  </div>
			  <div class="detail"><{$res.service_content|smarty:nodefaults}></div>
		  </div>
		</div>
      </div>
   </div>
</div>