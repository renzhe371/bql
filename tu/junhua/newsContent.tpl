<div class="about_main market_main about_mains m_auto">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 max_w1388 float-l">
			<div class="about_de_l_t">
				<h1 class="new_title_h1"><{$res.news_title}></h1>
				<div class="new_times">
					<span class="display-i">发布于：<{$res.create_time|date_format:'%Y-%m-%d'}></span>
                    <span id="txtSmall">小</span><span id="txtMiddle">中</span><span id="txtBig">大</span>
					<span class="display-i">分享：<!-- JiaThis Button BEGIN -->
						<div class="jiathis_style display-i">
							<a class="jiathis_button_qzone"></a>
							<a class="jiathis_button_tsina"></a>
							<a class="jiathis_button_tqq"></a>
							<a class="jiathis_button_weixin"></a>
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
							<a class="jiathis_counter_style"></a>
						</div>
					</span>
					<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
					<!-- JiaThis Button END -->
				</div>
                <div class="newsCon">
                    <{$res.news_content|smarty:nodefaults}>
                </div>
			</div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>
<script>
     var newsCon=$(".newsCon");
    
     $("#txtSmall").click(function(){  
         newsCon.find("*").css("font-size","14px");
     })  
     
      $("#txtMiddle").click(function(){  
         newsCon.find("*").css("font-size","16px");
     }) 
      
    $("#txtBig").click(function(){  
         newsCon.find("*").css("font-size","18px");
     })
                
</script>