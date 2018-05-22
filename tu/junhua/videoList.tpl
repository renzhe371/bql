<div class="about_main market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div  id="video-list" class="about_de_l  min_w1200 max_w1388 float-l back_none">
			<!-- <div class="h5_screen m_auto news_de_bottm_nav news_video_nav">
				<{foreach item=item key=key from=""|getVideoCategory}>
					<a href="Video_category<{$key}>.html" class="float-l po-r <{if $form.category_id eq $key}>on<{/if}>">
						<{$item}>
					</a>
				<{/foreach}>
			</div> -->
			<div class="news_video_main">
				<div class="video_fl_list">
					<div class="video_fl_ti">
                        <h3 class="float-l"><a href="Video_category11.html">企业视频</a></h3>
                        <a class="float-r" href="Video_category11.html">更多</a>
                    </div>
					<dl class="index_video cf">
						<dt class="float-l">
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list1[0].video_flv|smarty:nodefaults}>" dateimge="<{$list1[0].image_path|smarty:nodefaults}>">
								<div class="overflow po-r">  
									<{if $list1[0].image_path neq ''}>
									<img class="img_videos" src="<{$list1[0].image_path|smarty:nodefaults}>" alt="">
									<{else}>
									<img class="img_videos" src="images/videoFace.jpg" alt="">
									<{/if}>
									<span class="po-a display-b"></span>
									<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
								</div>
								<h3 class="display-b overflow-nowrap transition_all2"><{$list1[0].video_title}></h3>
								<p><{$list1[0].create_time|date_format:"%Y-%m-%d"}></p>
							</a>
						</dt> 
						<dd>
						<ul class="cf video-list">
							<{section name="loop" loop=$list1|smarty:nodefaults start=1}>
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list1[loop].video_flv|smarty:nodefaults}>" dateimge="<{$list1[loop].image_path|smarty:nodefaults}>">
								<li class="float-l po-r overflow">
									<div class="overflow po-r">
										<{if $list1[loop].image_path neq ''}>
										<img width="100%" class="img_videos"  src="<{$list1[loop].image_path|smarty:nodefaults}>" alt="">
										<{else}>
										<img width="100%" class="img_videos"  src="images/videoFace.jpg" alt="">
										<{/if}>
										<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
                                        <span class="po-a display-b"></span>
									</div>
                                    
									<h3 class="display-b overflow-nowrap transition_all2"><{$list1[loop].video_title}></h3>
									<p><{$list1[loop].create_time|date_format:"%Y-%m-%d"}></p>
								</li>
							</a>
							<{/section}>
						</ul>
						</dd>
					</dl>
				</div>


				<div class="video_fl_list">
                    
					<div class="video_fl_ti">
                        <h3 class="float-l"><a href="Video_category12.html">活动视频</a></h3>
                        <a class="float-r" href="Video_category12.html">更多</a>                     
                    </div>
					<dl class="index_video cf">
						<dt class="float-l">
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list2[0].video_flv|smarty:nodefaults}>" dateimge="<{$list2[0].image_path|smarty:nodefaults}>">
								<div class="overflow po-r" >
									<{if $list2[0].image_path neq ''}>
									<img class="img_videos" src="<{$list2[0].image_path|smarty:nodefaults}>" alt="">
									<{else}>
									<img class="img_videos" src="images/videoFace.jpg" alt="">
									<{/if}>
									<span class="po-a display-b"></span>
									<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
								</div>
                                        
								<h3 class="display-b overflow-nowrap transition_all2"><{$list2[0].video_title}></h3>
								<p><{$list2[0].create_time|date_format:"%Y-%m-%d"}></p>
							</a>
						</dt> 
						<dd>
						<ul class="cf video-list">
							<{section name="loop" loop=$list2|smarty:nodefaults start=1}>
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list2[loop].video_flv|smarty:nodefaults}>" dateimge="<{$list2[loop].image_path|smarty:nodefaults}>">
								<li class="float-l po-r overflow">
									<div class="overflow po-r">
										<{if $list2[loop].image_path neq ''}>
										<img width="100%" class="img_videos"  src="<{$list2[loop].image_path|smarty:nodefaults}>" alt="">
										<{else}>
										<img width="100%" class="img_videos"  src="images/videoFace.jpg" alt="">
										<{/if}>
										<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
                                        <span class="po-a display-b"></span>
									</div>
									<h3 class="display-b overflow-nowrap transition_all2"><{$list2[loop].video_title}></h3>
									<p><{$list2[loop].create_time|date_format:"%Y-%m-%d"}></p>
								</li>
							</a>
							<{/section}>
						</ul>
						</dd>
					</dl>
				</div>


				<div class="video_fl_list">
					<div class="video_fl_ti">
                        <h3 class="float-l"><a href="Video_category13.html">产品视频</a></h3>
                        <a class="float-r" href="Video_category13.html">更多</a>
                    </div>
					<dl class="index_video cf">
						<dt class="float-l">
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list3[0].video_flv|smarty:nodefaults}>" dateimge="<{$list3[0].image_path|smarty:nodefaults}>">
								<div class="overflow po-r" >
									<{if $list3[0].image_path neq ''}>
									<img class="img_videos" src="<{$list3[0].image_path|smarty:nodefaults}>" alt="">
									<{else}>
									<img class="img_videos" src="images/videoFace.jpg" alt="">
									<{/if}>
									<span class="po-a display-b"></span>
									<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
								</div>
								<h3 class="display-b overflow-nowrap transition_all2"><{$list3[0].video_title}></h3>
								<p><{$list3[0].create_time|date_format:"%Y-%m-%d"}></p>
							</a>
						</dt> 
						<dd>
						<ul class="cf video-list">
							<{section name="loop" loop=$list3|smarty:nodefaults start=1}>
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list3[loop].video_flv|smarty:nodefaults}>" dateimge="<{$list3[loop].image_path|smarty:nodefaults}>">
								<li class="float-l po-r overflow">
									<div class="overflow po-r">
										<{if $list3[loop].image_path neq ''}>
										<img width="100%" class="img_videos"  src="<{$list3[loop].image_path|smarty:nodefaults}>" alt="">
										<{else}>
										<img width="100%" class="img_videos"  src="images/videoFace.jpg" alt="">
										<{/if}>
										<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
                                        <span class="po-a display-b"></span>
									</div>
									<h3 class="display-b overflow-nowrap transition_all2"><{$list3[loop].video_title}></h3>
									<p><{$list3[loop].create_time|date_format:"%Y-%m-%d"}></p>
								</li>
							</a>
							<{/section}>
						</ul>
						</dd>
					</dl>
				</div>


				<div class="video_fl_list">
					<div class="video_fl_ti">
                        <h3 class="float-l"><a href="Video_category14.html">媒体视频</a></h3>
                        <a class="float-r" href="Video_category14.html">更多</a>
                    </div>
					<dl class="index_video cf">
						<dt class="float-l">
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list4[0].video_flv|smarty:nodefaults}>" dateimge="<{$list4[0].image_path|smarty:nodefaults}>">
								<div class="overflow po-r" >
									<{if $list4[0].image_path neq ''}>
									<img class="img_videos" src="<{$list4[0].image_path|smarty:nodefaults}>" alt="">
									<{else}>
									<img class="img_videos" src="images/videoFace.jpg" alt="">
									<{/if}>
									<span class="po-a display-b"></span>
									<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
								</div>
								<h3 class="display-b overflow-nowrap transition_all2"><{$list4[0].video_title}></h3>
								<p><{$list4[0].create_time|date_format:"%Y-%m-%d"}></p>
							</a>
						</dt> 
						<dd>
						<ul class="cf video-list">
							<{section name="loop" loop=$list4|smarty:nodefaults start=1}>
							<a class="display-b" href="javascript:void(0);" datevideo="<{$list4[loop].video_flv|smarty:nodefaults}>" dateimge="<{$list4[loop].image_path|smarty:nodefaults}>">
								<li class="float-l po-r overflow">
									<div class="overflow po-r">
										<{if $list4[loop].image_path neq ''}>
										<img width="100%" class="img_videos"  src="<{$list4[loop].image_path|smarty:nodefaults}>" alt="">
										<{else}>
										<img width="100%" class="img_videos"  src="images/videoFace.jpg" alt="">
										<{/if}>
										<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
                                        <span class="po-a display-b"></span>
									</div>
									<h3 class="display-b overflow-nowrap transition_all2"><{$list4[loop].video_title}></h3>
									<p><{$list4[loop].create_time|date_format:"%Y-%m-%d"}></p>
								</li>
							</a>
							<{/section}>
						</ul>
						</dd>
					</dl>
				</div>

				
			</div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>
<div class="videoBox">
	<span></span>
	<ul><li><i class="js_video_close_btn"></i><h4></h4><div id="videoBox"></div></li></ul>
</div>  
<script src="js/FTMzKDHrEeODISIACusDuQ.js"></script>
<script>
var swfPlayer='js/player.swf';
var videoObj=null;
var skinSrc='js/carbon.xml';

$('#video-list a.display-b').each(function(index){

	var _this=$(this);
	var  videoPath=_this.attr('dateVideo');
	console.log(videoPath);
	var  imagePath=_this.attr('dateImge');
 
	_this.click(function(){

		$('.videoBox').show();
		$('.videoBox h4').text(_this.find('h3').text());
		   
		videoObj = jwplayer('videoBox').setup({
		  
			stretching: 'exactfit', 
			skin: skinSrc,
			image:imagePath,
			width:820,
			height:480,
			file:videoPath,
			flashplayer: swfPlayer,
			ga: {}
		}); 
	})
});

$('.videoBox>span,.js_video_close_btn').click(function(){
	
	videoObj.stop();
	$('.videoBox').hide();
})
$('body').on('click','.videoBtn',function(){

	$(this).siblings('div').css({'width':'800px','height':'600px','left':0,'top':0,'position':'fixed','z-index':'5000'})
}) 
</script>