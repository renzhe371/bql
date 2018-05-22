<div class="h5_banner">
	<div class="max_w1750 min_w1200 m_auto overflow po-r">
		<div id="h5_banner_main" class="h5_banner_main">
			<div class="slick">
				<{section name="loop" loop=$H_list|smarty:nodefaults}>
				<{if $H_list[loop].image_path2}>
				<div>
					<img width="100%" src="<{$H_list[loop].image_path2}>">
				</div>
				<{/if}>
				<{/section}>	
			</div>
		</div>
		<div class="po-a activity_hot">
			<h2>热门活动</h2>
			<{section name="loop" loop=$h_list|smarty:nodefaults}>
			<dl class="cf" id="link">
				<dt class="float-l">
					<a class="display-b" href="<{$h_list[loop].img_url}>">
						<img  class="display-b" width="68" height="64" src="<{$h_list[loop].img_path}>" alt="">
					</a>
				</dt>
				<dd>
					<h3 class="overflow-nowrap">精彩回顾●<a href="<{$h_list[loop].img_url}>">
						<{$h_list[loop].img_title|truncate:"36"}>
					</a></h3>
					<p><{$h_list[loop].create_time|date_format:"%Y-%m-%d"}></p>
				</dd>
			</dl>
			<{/section}>   
		</div>
	</div>
</div>
<div class="about_main" id="H5Main" >
	<div class="max_w1750 min_w1200 about_de m_auto overflow ">
		<div class="bql_download_box bql_download_boxs">
			<div class="bql_h5_main">
				<div class="h5_screen m_auto">
					<a href="H5list.html#link" class="float-l po-r <{if $form.hid eq ''}>cur<{/if}>">全部</a>
					<{section name="loop" loop=$cat_list|smarty:nodefaults}>
						<a href="H5list.html?hid=<{$cat_list[loop].category_id}>#link" class="float-l po-r <{if $cat_list[loop].category_id eq $form.hid}>cur<{/if}>">
							<{$cat_list[loop].category_name}>
						</a>
					<{/section}>  
				</div>
				<{if $list|smarty:nodefaults|@count ne '0'}>
				<form id="myform" name="myform" action="" method="post">
				<input type="hidden" id="mode" name="mode" value="">
				<input type="hidden" name="p" value="">
				<ul class="cf h5_main">
					<{section name="loop" loop=$list|smarty:nodefaults}>
					<li class="float-l">
						<a target="_blank" class="display-b" href="<{$list[loop].img_url}>" target="_blank">
							<img  class="display-b" width="100%" src="<{$list[loop].img_path}>" alt="">
						</a>
						<p class="overflow-nowrap"><a target="_blank" href="<{$list[loop].img_url}>">
							<{$list[loop].img_title|truncate:"36"}>
						</a></p>
						<div class="cf">
							<span class="float-l"><{$list[loop].create_time|date_format:"%Y-%m-%d"}></span>
							<a href="<{$list[loop].img_url}>" target="_blank" class="float-r">点击查看</a>
						</div>
					</li>
					<{/section}>
				</ul>
				<div class="pag_box"><{$pageList|smarty:nodefaults}></div>
				</form>
				<{/if}>
			</div>
		</div>
	</div>
</div>

<script>
$(function(){
	$('.h5_banner_main .slick').slick({

	slidesToShow: 1,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 5000,
	dots:false,
	arrows:true,
	draggable:false,
	speed:1200
});

function h5_ban(){

	var h = $("#h5_banner_main").height();
    var activity_hot = $(".activity_hot");
    if(h<450){
	
		activity_hot.find("dl").show().eq(4).hide();
		avt_h();
		if(h<362){
		
			activity_hot.find("dl").show().eq(3).hide();
			activity_hot.find("dl").eq(4).hide();
			avt_h();
		}
	}else{
		
		activity_hot.find("dl").show();
		avt_h();
	}
	function avt_h(){
	
		activity_hot.height(h-14);
    }
}
h5_ban();
$(window).resize(function(){
	
	h5_ban();
});
})

</script>