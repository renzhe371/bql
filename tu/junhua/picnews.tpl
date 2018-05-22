<div class="about_main market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l  min_w1200 max_w1388 float-l back_none" style="padding-top:0">
			<div class="news_pic_main">
				<div class="img_new_box">
				<div class="po-r picnews_banner">
					<div class="slider">
						<div class="bd">
							<ul>
							<{section name="loop" loop=$list|smarty:nodefaults}>
								<li><a href="PicContent<{$list[loop].image_id}>.html">
									<img src="http://www.protruly.com.cn/<{$list[loop].image_path}>" />
								</a></li>
							<{/section}>	
							</ul>
						</div>
						<div id="hd" class="hd">
							<ul class="po-r"></ul>
							<div class="po-a">
								<{section name="loop" loop=$list|smarty:nodefaults}>
								<a class="overflow-nowrap displayBlock" href="PicContent<{$list[loop].image_id}>.html">
									<{$list[loop].image_name}>
								</a>
								<{/section}>
							</div>
						</div>
						<div class="pnBtn prev"><span class="blackBg"></span><a class="arrow" href="javascript:void(0)"></a></div>
						<div class="pnBtn next"><span class="blackBg"></span><a class="arrow" href="javascript:void(0)"></a></div>
					</div>
				</div>
				</div>
				<div class="img_new_box">
				<div class="news_pic_box pN1">
					<div class="cf change">
						<h2 class="float-l">活动</h2>
						<a class="float-r more1" href="javascript:void(0);">换一批</a>
					</div>
					<ul class="cf">
						<{section name="loop" loop=$pic_res1|smarty:nodefaults max='4'}>
						<li class="float-l">
							<a href="PicContent<{$pic_res1[loop].image_id}>.html">
								<img width="100%" src="http://www.protruly.com.cn/<{$pic_res1[loop].image_path2}>" alt="">
							</a>
							<h3 class="overflow-nowrap">
							<a href="PicContent<{$pic_res1[loop].image_id}>.html">			
                            	<{$pic_res1[loop].image_name|truncate:'32'}>
							</a>
							</h3>
							<p><span><{$pic_res1[loop].create_time|date_format:"%Y-%m-%d"}></span></p>
						</li>
						<{/section}>
					</ul>
					<input type="hidden" value="<{$pic_res1|smarty:nodefaults|@count}>" id="num1">
					<input type="hidden" value="<{$pic_res1[0].category_id}>" id="cat1">
				</div>
				</div>
				<div class="img_new_box">
				<div class="news_pic_box pN2">
					<div class="cf change">
						<h2 class="float-l">产品</h2>
						<a class="float-r more2" href="javascript:void(0);">换一批</a>
					</div>
					<ul class="cf">
						<{section name="loop" loop=$pic_res2|smarty:nodefaults max='4'}>
						<li class="float-l">
							<a href="PicContent<{$pic_res2[loop].image_id}>.html">
								<img width="100%" src="http://www.protruly.com.cn/<{$pic_res2[loop].image_path2}>" alt="">
							</a>
							<h3 class="overflow-nowrap">
								<a href="PicContent<{$pic_res2[loop].image_id}>.html">	
									<{$pic_res2[loop].image_name|truncate:'32'}>
								</a>
							</h3>
							<p><span><{$pic_res2[loop].create_time|date_format:"%Y-%m-%d"}></span></p>
						</li>
						<{/section}>
					</ul>
					<input type="hidden" value="<{$pic_res2|smarty:nodefaults|@count}>" id="num2">
					<input type="hidden" value="<{$pic_res2[0].category_id}>" id="cat2">
				</div>
				</div>
				<div class="img_new_box">
				<div class="news_pic_box pN3">
					<div class="cf change">
						<h2 class="float-l">场景</h2>
						<a class="float-r more3" href="javascript:void(0);">换一批</a>
					</div>
					<ul class="cf">
						<{section name="loop" loop=$pic_res6|smarty:nodefaults max='4'}>
						<li class="float-l">
							<a href="PicContent<{$pic_res6[loop].image_id}>.html"><img width="100%" src="http://www.protruly.com.cn/<{$pic_res6[loop].image_path2}>" alt=""></a>
							<h3 class="overflow-nowrap"><a href="PicContent<{$pic_res6[loop].image_id}>.html"><{$pic_res6[loop].image_name|truncate:'32'}></a></h3>
							<p><span><{$pic_res6[loop].create_time|date_format:"%Y-%m-%d"}></span></p>
						</li>
						<{/section}>
					</ul>
					<input type="hidden" value="<{$pic_res6|smarty:nodefaults|@count}>" id="num3">
					<input type="hidden" value="<{$pic_res6[0].category_id}>" id="cat3">
				</div>
				</div>

			</div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>
	
<!--主体内容结束-->
<script src="http://v3.jiathis.com/code/jia.js"></script>
<script type="text/javascript" src="js/superslide.js"></script>
<script type="text/javascript" >
var jiathis_config={

	summary:"",
	shortUrl:false,
	hideMore:false
}

var picNewsChild=$('.news_pic_main')
function picnews(id,div1,div2,catid){
	
	var track_click = 0; 
	var row = $(id).val();
	var total_pages = Math.ceil(row/4);
	var div=$(div1).html();
    if(total_pages<=1)
    {   
    	picNewsChild.find('div.change').eq(parseInt(id.replace('#num',''))-1).find('a.float-r').css({'opacity':0.2,'filter':'alpha(opacity=20)'});
    	console.log(id.replace('#num',''))
    }
	$(document).ready(function(){
		
		$(div2).click(function(){
			  
			track_click++;
			if(track_click < total_pages){
				
				$.post('news_ajax.php',{'page': track_click,'catid':catid}, function(msg) { 
					//alert(msg);
					$(div1).html(msg);
				})
			}else{
			
				$(div1).html(div);
				track_click=0;
			}
		})
	})
} 

for(var i=1;i<=3;i++){

	var catid=$("#cat"+i).val();
	picnews("#num"+i,".pN"+i+" ul",".more"+i,catid);
}
</script>

<script type="text/javascript">
$(document).ready(function(){
  
  /* 设置第一张图片 */
  $(".slider .bd li").first().before($(".slider .bd li").last());
  
  /* 鼠标悬停箭头按钮显示 */
  $(".slider").hover(function(){
    $(this).find(".arrow").stop(true,true).fadeIn(300)
  },function(){
    $(this).find(".arrow").fadeOut(300)
  });
  
  /* 滚动切换 */
  $(".slider").slide({
    titCell:".hd ul", 
    mainCell:".bd ul", 
    effect:"leftLoop",
    autoPlay:true, 
    vis:3,
    autoPage:true, 
    trigger:"click",
    delayTime: 600,
    interTime: 6000,
  });

  $(".hd li").each(function(i) {
 
    $(".hd li").eq(i).html('<img src="'+$(".bd li img").eq(i+2).attr("src")+'" />');
 
  });



});
</script>