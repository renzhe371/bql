			<div class="floatR con_area">
              <div class="overflow conTit_posi">
                   <h2 class="floatL lighter child_con_tit">服务指南</h2>
                   <div class="floatR position font12">当前位置：<p><a href="/">首页</a>–<a href="Case.html">保千里产业</a>– <span>常见问答</span></p></div>
              </div>
              
              <div class="detail_con">
				<{if $list|smarty:nodefaults|@count ne '0'}>
				<form id="myform" name="myform" action="" method="POST">
				<input type="hidden" id="mode" name="mode" value="">
				<input type="hidden" name="p" value="">
        
                   <ul class="child_list server_que_list">
					<{section name="loop" loop=$list|smarty:nodefaults}>
                      <li>
                             <h4>
                                <a href="/ServiceContent<{$list[loop].service_id}>.html"><{$list[loop].service_title}></a>
                                <span><{$list[loop].update_time|date_format:'20%y/%m/%d'}></span>
                             </h4>
                              
                             <p>
								 <a href="/ServiceContent<{$list[loop].service_id}>.html">
									<{$list[loop].service_content|smarty:nodefaults}>
								 </a>
							 </p>
                      </li>
					<{/section}>
                   </ul> 
				   <{$pageList|smarty:nodefaults}>
				</form>
				<{/if}> 
              </div>
          </div>
      </div>  
   </div>
</div>
<!--主体内容结束-->