<div class="about_main market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l video_de_l min_w1200 max_w1388 float-l">
			<div class="h5_screen m_auto news_de_bottm_nav news_video_nav">
				<{foreach item=item key=key from=""|getVideoCategory}>
					<a href="Video_category<{$key}>.html" class="float-l po-r <{if $form.category_id eq $key}>on<{/if}>">
						<{$item}>
					</a>
				<{/foreach}>
			</div>
			<div  class="news_video_main  News_video_list">
			<{if $list|smarty:nodefaults|@count ne '0'}>
			<form id="myform" name="myform" action="" method="POST">
			<input type="hidden" id="mode" name="mode" value="">
			<input type="hidden" name="p" value="">
				<ul id="video-list" class="cf video-list">
					<{section name="loop" loop=$list|smarty:nodefaults}>
					<a class="display-b"  href="javascript:void(0);" dateVideo='<{$list[loop].video_flv|smarty:nodefaults}>' dateImge='<{$list[loop].image_path|smarty:nodefaults}>'>
						<li class="float-l po-r overflow">
							<div class="overflow">
							<{if $list[loop].image_path neq ''}>
							<img width="100%" class="img_videos"  src="<{$list[loop].image_path|smarty:nodefaults}>" alt="">
							<{else}>
							<img width="100%" class="img_videos"  src="images/videoFace.jpg" alt="">
							<{/if}>
							</div>
							<span class="po-a display-b"></span>
							<i class="po-a display-b"><img src="images/video_bag.png" alt=""></i>
							<h3 class="display-b overflow-nowrap transition_all2"><{$list[loop].video_title}></h3>
						</li>
					</a>
					<{/section}>
				</ul>
				<div class="pag_box"><{$pageList|smarty:nodefaults}></div>
				</form>
				<{/if}>  
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