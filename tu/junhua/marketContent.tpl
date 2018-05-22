
	<div id="childMain" class="topicContent">
		<div id="childBanner" class="t-c-banner" style="background:url('<{$list.image_path2}>') center bottom no-repeat;">
            <img  style="visibility:hidden;" src="http://www.protruly.com.cn/<{$list.image_path2}>"/>
        </div>
		<div class="content">
            <div class="zhiboLinks overflow" >
			<{if $zb_res.image_path3}>
				<div class="floatL zblImg relative">
					<div class="market_con_tit">活动直播</div>
                    <a href="ZhiboContent<{$list.market_id}>.html">
                        <img src="http://www.protruly.com.cn/<{$zb_res.image_path3}>">
                         <i class="absolute">
                           <img  src="http://www.protruly.com.cn/<{if $zb_res.zb_status==2}>images/zb_icon1.png<{elseif $zb_res.zb_status==1}>images/zb_icon3.png<{else}>images/zb_icon2.png<{/if}>"> 
                        </i> 
                    </a>
				</div>
				<!--<div class="floatL zblIntro">
                   <div class="market_con_tit">直播简介</div>
                   <a href="ZhiboContent<{$list.market_id}>.html"><{$zb_res.content|smarty:nodefaults}></a>
                </div>-->
                <div class="floatR  H5">
					<div class="market_con_tit">活动H5</div>
					<div class="H5_list">
						<ul class="tarList">
						<{section name="loop" loop=$h_res|smarty:nodefaults}> 
							<li <{if $smarty.section.loop.first}>class="cur"<{/if}>>
								<a href="<{$h_res[loop].img_url}>" target="_blank"><img src="http://www.protruly.com.cn/<{$h_res[loop].img_path}>"></a>
                                <span><{$h_res[loop].img_title}></span>
							</li>
						<{/section}>
						</ul> 
						<ol  class="tarBtn">
						<{section name="loop" loop=$h_res|smarty:nodefaults}> 
							<li <{if $smarty.section.loop.first}>class="on"<{/if}>></li>
						<{/section}>
						</ol>
					</div>  
				</div>
			<{/if}>
			</div>
			<!--活动简介开始-->
			<div class="maket_intro content overflow" id="huodong">
				<div class="floatL mark_scroll">
					<div id="temp6">
						<div class="JQ-content-box">
							<ul class="JQ-slide-content">
							<{section name="loop" loop=$image_arr|smarty:nodefaults}> 
								<li>
									<a href="#" ><img src="http://www.protruly.com.cn/<{$image_arr[loop].image_path|smarty:nodefaults}>" /></a>
									<span><{$image_arr[loop].image_name|smarty:nodefaults}></span>
								</li>
							<{/section}>
							</ul>
							<ul class="JQ-slide-nav">
							<{section name="loop" loop=$image_arr|smarty:nodefaults}> 
								<li <{if $smarty.section.loop.first}>class="on"<{/if}>></li>
							<{/section}>
							</ul>
						</div>
					</div>
				</div>
				<div class="floatL mark_news market_displayNO">
					<{$list.market_content|smarty:nodefaults}>
				</div>
				<div class="floatL market_intro">
					<div class="market_con_tit">活动简介</div>
					<strong><{$list.intro|smarty:nodefaults}></strong> 
				</div>
			</div>
			<!--活动简介结束-->
			<!--媒体报道开始-->
			<div class="content clear video_report" id="shipin">
				<div class="floatL">
					<div class="market_videoList"> 
						<{if $flv_res[0].flv_news ne ''}>
						<div class="market_video"  id="market_video" dateVideo="<{$flv_res[0].flv_news|smarty:nodefaults}>"  dateImge="<{$flv_res[0].image_path|smarty:nodefaults}>"></div>
						<{/if}>
					</div>
					<ul class="market_video_tit">
					<{section name="loop" loop=$flv_res|smarty:nodefaults}> 
						<li><{$flv_res[loop].flv_name|smarty:nodefaults}></li>
					<{/section}>
					</ul>
					<ol class="JS_market_videoSrc">
					<{section name="loop" loop=$flv_res|smarty:nodefaults}> 
						<{if $flv_res[loop].flv_news ne ''}>
						<li  dateVideo="<{$flv_res[loop].flv_news|smarty:nodefaults}>"  dateImge="<{$flv_res[loop].image_path|smarty:nodefaults}>"></li>
						<{else}>
						<li><img src="http://www.protruly.com.cn/<{$flv_res[loop].image_path|smarty:nodefaults}>"/></li>
						<{/if}>
					<{/section}>
					</ol>
				</div> 
				<div class="floatL video_report_list" >
					<div>
						<div class="market_con_tit">媒体专访</div>
						<{$list.visitor|smarty:nodefaults}>
					</div>
					<div>
						<div class="market_con_tit">媒体报道</div><{$list.video_content|smarty:nodefaults}>
				   </div>
				</div>
				<div class="floatL otherTopics market_displayNO">
					<div class="market_con_tit">其它专题活动</div>
					<ul class="overflow">
					<{section name="loop" loop=$other_res|smarty:nodefaults}>
						<li>
							<dl>
								<dt><a href="<{$other_res[loop].other_url}>"><img src="http://www.protruly.com.cn/<{$other_res[loop].image_path}>" /></a></dt>
								<dd><a href="<{$other_res[loop].other_url}>"><{$other_res[loop].other_name|truncate:18}></a></dd>
							</dl> 
						</li>
					<{/section}>
					</ul>
				</div>
			</div> 
			<!--媒体报道结束-->   
			<!--图片报道开始-->   
			<div class="content clear pic_report" id="tupian">  
				<h2>图片报道</h2>
				<{if $image_res[0].image_path != ''}>
				<div class="pic_report_con overflow">
					<div class="market_picReport_L">
						<img src="http://www.protruly.com.cn/<{$image_res[0].image_path|smarty:nodefaults}>" />
						<div>
							<span><p><{$image_res[0].description|smarty:nodefaults|truncate:400}></p></span>
							<i class="tongjiPic"> (<abbr>1</abbr>/<acronym>10</acronym>)</i>
						</div>
					</div>
					<div class="market_picReport_S overflow">
						<abbr class="scroll_L  floatL"></abbr>
						<div class="floatL overflow picReport_S_list">
							<ul class="overflow JS_picReport_S">
							<{section name="loop" loop=$image_res|smarty:nodefaults}>
								<li><img src="http://www.protruly.com.cn/<{$image_res[loop].image_path|smarty:nodefaults}>" /></li>
							<{/section}>
							</ul>
						</div>
						<ol>
						<{section name="loop" loop=$image_res|smarty:nodefaults}>
							<li>
								<img src="http://www.protruly.com.cn/<{$image_res[loop].image_path|smarty:nodefaults}>" />
								<span><p><{$image_res[loop].description|smarty:nodefaults|truncate:400}></p></span>     
							</li>
						<{/section}>  
						</ol>
						<abbr class="scroll_R  floatL"></abbr>
					</div>
				</div>
				<{/if}>
			</div>
			<!--图片报道结束-->  
			<!--视频合辑开始--> 
			<div class="clear content  video_collect" id="shipinheji">
				<div class="overflow video_collect_tit">
					<h2 class="floatL"> 视频合辑  </h2>
				</div> 
				<div class="video_collect_con">
					<ul class="overflow cur">
					<{section name="loop" loop=$media_res2|smarty:nodefaults}>
						<{if $smarty.section.loop.first}>
						<li class="video_collect_list_T">
						<dl>
							<dt>
								<div id="x" dateVideo="<{$media_res2[loop].media_news|smarty:nodefaults}>" dateImge="<{$media_res2[loop].image_path|smarty:nodefaults}>"></div> 
							</dt>
							<dd>
								<h3><{$media_res2[loop].media_title|smarty:nodefaults}></h3>
								<p><{$media_res2[loop].description|smarty:nodefaults|truncate:400}></p>
							</dd>
						</dl>
						</li>
						<{else}>
						<li >
						<dl>
							<dt>
								<div id="x" dateVideo="<{$media_res2[loop].media_news|smarty:nodefaults}>" dateImge="<{$media_res2[loop].image_path|smarty:nodefaults}>"></div> 
							</dt>
							<dd>
								<h3><{$media_res2[loop].media_title|smarty:nodefaults}></h3>
							</dd>
						</dl>
						</li>
						<{/if}>
					<{/section}>
					</ul>
					<ul class="overflow ">
					<{section name="loop" loop=$media_res1|smarty:nodefaults}>
						<{if $smarty.section.loop.first}>
						<li class="video_collect_list_T">
						<dl>
							<dt>
								<div id="x" dateVideo="<{$media_res1[loop].media_news|smarty:nodefaults}>" dateImge="<{$media_res1[loop].image_path|smarty:nodefaults}>"></div> 
							</dt>
							<dd>
								<h3><{$media_res1[loop].media_title|smarty:nodefaults}></h3>
								<p><{$media_res1[loop].description|smarty:nodefaults|truncate:400}></p>
							</dd>
						</dl>
						</li>
						<{else}>
						<li >
						<dl>
							<dt>
								<div id="x" dateVideo="<{$media_res1[loop].media_news|smarty:nodefaults}>" dateImge="<{$media_res1[loop].image_path|smarty:nodefaults}>"></div> 
							</dt>
							<dd>
								<h3><{$media_res1[loop].media_title|smarty:nodefaults}></h3>
							</dd>
						</dl>
						</li>
						<{/if}>
					<{/section}>
					</ul>
				</div>
			</div>
		  
			<!--视频合辑结束--> 
			<!--相关媒体开始-->
			<div class="clear content  relect_media" id="xiangguan">
				<h2>相关媒体</h2>
				<div class="relect_media_Logo overflow">
					<div id="div1">
						<{$list.media|smarty:nodefaults}>
					</div>
				</div>
			</div> 
			<!--相关媒体结束--> 
		</div>
	</div> 
<!--主体内容结束-->
<link href="css/active_con.css"  rel="stylesheet"  type="text/css"/>
<script src="js/market.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jq.Slide.js"></script>
<script>
   if($("#temp6").find("img").length>1)
   {
     $("#temp6").Slide({
		effect : "scroolY",
		speed : "normal",
		timer : 3000
	});
   }


if($('.H5 ul').find('img').length>1){ 

	$(".H5_list").Slide({
		effect : "fade",
		speed : "normal",
		timer : 3000,
        claCon:"tarList",
		claNav:"tarBtn",
        
	});
}
  
</script>
<script language="javascript" type="text/javascript" src="js/FTMzKDHrEeODISIACusDuQ.js"></script>
<script>
    
    var skinSrc='js/carbon.xml';
   if($('.market_video').length>0){
  
	var  videoPath=$('.market_video').attr('dateVideo');
	var  imagePath=$('.market_video').attr('dateImge');
	var  idName=$('.market_video').attr('id');
	var swfPlayer='js/player.swf';
	jwplayer(idName).setup({
	    skin: skinSrc,
		stretching: 'exactfit',	
		image:imagePath,
		width:'100%',	
		height:'100%',
		file:videoPath,
		flashplayer: swfPlayer,
		ga: {}
	});
}

$(".market_video_tit li").each(function(index){

	$(this).click(function(){
	
		videoPath=$('.JS_market_videoSrc li').eq(index).attr('dateVideo');
		imagePath=$('.JS_market_videoSrc li').eq(index).attr('dateImge');
		jwplayer(idName).setup({
		    skin: skinSrc,
			stretching: 'exactfit',	
			image:imagePath,
			width:'100%',
			height:'100%',
			file:videoPath,
			flashplayer: swfPlayer,
			ga: {}
		});
	})
})	  				
						
$(".video_collect_con dt").find("div").each(function(index){	

	$(this).attr('id','video_collect'+ (index + 1));
	var  videoPath=$(this).attr('dateVideo');
	var  imagePath=$(this).attr('dateImge');
	var  idName=$(this).attr('id');
	var swfPlayer='js/player.swf';
	jwplayer(idName).setup({
	    skin: skinSrc,
		stretching: 'exactfit',	
		image:imagePath,
		width:'100%',
		height:'100%',
		file:videoPath,
		flashplayer: swfPlayer,
		ga: {}
	});
})

</script>