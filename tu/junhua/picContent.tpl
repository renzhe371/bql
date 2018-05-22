<div class="about_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 max_w1388">
			<div id="childMain" class="picNewsContent">
				<div>
					<h1 class="lighter relative"><{$res.image_name}>
						<span><{$res.create_time|date_format:"%Y-%m-%d"}></span>
						<span class="absolute  picNewsShare js_picNewsShare" style="right:0;top:0">
							<i>分享</i>
							<a class="jiathis_button_tsina" href="javascript:void(0);"><abbr></abbr>微博</a>
							<a class="jiathis_button_weixin" href="javascript:void(0);"><abbr></abbr>微信</a>
						</span>
					</h1>
					<div class="relative" onselectstart="return false">
						<i class="absolute picLeft js_picLeft" onselectstart="return false"></i>
						<ul class="txt-center js_newsPic overflow">
						<{section name="loop" loop=$list|smarty:nodefaults}>
							<li <{if $smarty.section.loop.first}>class="cur"<{/if}>>
								<img src="http://www.protruly.com.cn/<{$list[loop].image_path}>">
							</li>
						<{/section}>
						</ul>
						<i class="absolute picRight js_picRight" onselectstart="return false"></i>
					</div>
					<div class="picNewsText js_picNewsText">
					<{section name="loop" loop=$list|smarty:nodefaults}>
						<p <{if $smarty.section.loop.first}>class="cur"<{/if}>>
							<span><i><{$smarty.section.loop.index+1}></i>&nbsp;/&nbsp;<abbr>51</abbr></span>
							<{$list[loop].description}>
						</p>
					<{/section}>
					</div>
					<div class="pNC_btn">
						<div class="relative content">
							<i class="prevNews absolute"></i>
							<div class="overflow relative js_newsBtnL relative">
								<ol class="absolute">
								<{section name="loop" loop=$list|smarty:nodefaults}>
									<li <{if $smarty.section.loop.first}>class="cur"<{/if}>>
										<img src="http://www.protruly.com.cn/<{$list[loop].image_path}>">
									</li>
								<{/section}>	
								</ol>
							</div>
							<i class="nextNews absolute"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 
<script src="http://v3.jiathis.com/code/jia.js"></script> 
<script>
var picNewsShare=$('.js_picNewsShare');
picNewsShare.hover(function(){

	$(this).find('a').css('display','block');
},function(){

	$(this).find('a').css('display','none');
})
var newsPic=$('.js_newsPic');
var newsBtnL=$('.js_newsBtnL');
var picNewsText = $('.js_picNewsText');
var prev=$('.prevNews');
var next=$('.nextNews');
var i=0;
var k=0;
var picLeft = $('.js_picLeft');
var picRight = $('.js_picRight');
var boxWidth=newsBtnL.find('li').width()+2+parseInt(newsBtnL.find('li').css('margin-right'));
var olWidth=newsBtnL.find('li').length*boxWidth;
var timer;
picNewsText.find('abbr').text(newsBtnL.find('li').length);
picNewsText.find('i').each(function(index){$(this).text(index+1);})
newsBtnL.find('ol').width(olWidth);
newsBtnL.find('li').each(function(index){

	var _this=$(this);
	_this.click(function(){
	
		k=index;
		newsPic.find('li').eq(index).fadeIn().siblings().fadeOut(); 
		_this.addClass('cur').siblings().removeClass('cur');
		picNewsText.find('p').eq(index).fadeIn().siblings().fadeOut(); 
	})
})
   
var timer1,timer2;
picLeft.click(function(event){

	event.preventDefault();
	clearTimeout(timer1);
	timer2=setTimeout(picLeft,250);
	function picLeft(){
	
		if(i>0){
			
			i--;
		}else{
			
			i=newsBtnL.find('li').length-10; 
		}
		if(k>0){
			 
			k--;
		}else{
		
			k=newsBtnL.find('li').length-1;  
		}
		newsPic.find('li').eq(k).fadeIn().siblings().fadeOut(); 
		picNewsText.find('p').eq(k).fadeIn().siblings().fadeOut();
		newsBtnL.find('ol').stop();
		newsBtnL.find('ol').animate({'left':i*(-1)*boxWidth}); 
		newsBtnL.find('li').eq(k).addClass('cur').siblings().removeClass('cur');
	}
})
  
picRight.click(function(event){

	event.preventDefault();
	clearTimeout(timer2);
	timer2=setTimeout(picRight,250);
	  
	function picRight(){
	
		if(i+10<newsBtnL.find('li').length){
		
			i++;
		}else{
		
			i=0; 
		}
		if(k<newsBtnL.find('li').length-1){
		
			k++;
		}else{
		
			k=0;  
		}
		newsPic.find('li').eq(k).fadeIn().siblings().fadeOut(); 
		picNewsText.find('p').eq(k).fadeIn().siblings().fadeOut();
		newsBtnL.find('ol').stop();
		newsBtnL.find('ol').animate({'left':i*(-1)*boxWidth}); 
		newsBtnL.find('li').eq(k).addClass('cur').siblings().removeClass('cur');
	}
})

$('.js_newsPic').bind('mousewheel', function(event, delta){

	event.preventDefault();
	clearTimeout(timer);
	//alert(event.deltaY) 
	//next
	timer=setTimeout(scrollPage,400);
	function scrollPage(){
	
		if(event.deltaY<0){
			
			if(i+10<newsBtnL.find('li').length){
			
				i++;
			}else{
			
				i=0; 
			}
			if(k<newsBtnL.find('li').length-1){
			
				k++;
			}else{
			
				k=0;  
			}
		}else{
		 
		   if(i>0){
					
				i--; 
			}else{
					
				i=newsBtnL.find('li').length-10; 
			}
			if(k>0){
			
				k--;
			}else{
			
				k=newsBtnL.find('li').length-1;  
			}
		}
		newsPic.find('li').eq(k).fadeIn().siblings().fadeOut(); 
		picNewsText.find('p').eq(k).fadeIn().siblings().fadeOut();
		newsBtnL.find('ol').stop();
		newsBtnL.find('ol').animate({'left':i*(-1)*boxWidth}); 
		newsBtnL.find('li').eq(k).addClass('cur').siblings().removeClass('cur');
		//setCookie('IN',In);
	}
})

/************************/
  
next.click(function(){
	
	if(i+10<newsBtnL.find('li').length){
	
		i++;
	}else{
		
		i=0; 
	}
	newsBtnL.find('ol').stop();
	newsBtnL.find('ol').animate({'left':i*(-1)*boxWidth}); 
})

prev.click(function(){

	if(i>0){
	
		i--;
	}else{
	
		i=newsBtnL.find('li').length-10; 
	}
	newsBtnL.find('ol').stop();
	newsBtnL.find('ol').animate({'left':i*(-1)*boxWidth}); 
})
</script>