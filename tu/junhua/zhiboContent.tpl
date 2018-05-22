<div class="about_bag min_w1200 news_bag zhibo_bag" style="background:url(<{$zb_res.image_path}>) no-repeat center bottom"></div>
<{if $zb_res.zb_status==3}>

<{else}>
<div class="about_main">
	<div class="max_w1750 min_w1200 cf zhibo_list_main about_de m_auto po-r">
		<div class="actvity_list max_w1388">
			<{if $zb_res.zb_status==1}>
			<div style="height:500px;margin-bottom:20px;">
				<!-- <div id="moviePlayerWapper" data-video="<{$zb_res.zb_url}>"  data-image="<{$zb_res.image_path3}>"></div> -->
				<iframe src="http://zhibo.protruly.com.cn/zszz/live/m3u8.html" scrolling="no" style="border:0 none;width:100%;height:100%;overflow:hidden"></iframe>
			</div>
			<{/if}>
			<ul class="actvity_list_ul">
				<{section name="loop" loop=$zbImg_res|smarty:nodefaults}>	
				<li class="po-r">
					<a class="display-b" href="javascript:void(0);">
					<dl>
						<dt class="cf">
							<strong class="display-i float-l"><{$zbImg_res[loop].create_time|date_format:"%Y-%m-%d %H:%M:%S"}></strong>
							<a class="float-r Comment_icon js_Comment_icon" href="javascript:void(0);">评论</a>
						</dt>
						<dd style="position:relative">
							<{if $zbImg_res[loop].image_path2!=''}>
							<!--<i class="vr_i" onclick="$(this).hide();playVr(<{$zbImg_res[loop].image_id}>)">进入全景</i>-->
							<img src="<{$zbImg_res[loop].image_path}>" onclick="playVr(<{$zbImg_res[loop].image_id}>)">
							<input type="hidden" id="img<{$zbImg_res[loop].image_id}>" value="<{$zbImg_res[loop].image_path2}>">
							<div class="pano" id="pano<{$zbImg_res[loop].image_id}>"></div>
							<{else}>
							<img  class="animated" data-animation="fadeIn" data-animation-delay="100" src="images/load.gif" data-src="<{$zbImg_res[loop].image_path|smarty:nodefaults}>"  alt="">
							<p><{$zbImg_res[loop].description|smarty:nodefaults}></p>
							<{/if}>
						</dd>
					</dl>
					</a>
				</li>
				<{/section}> 
			</ul>
			<script src="js/swfobject.js"></script>
			<script>
				var play = function()
				{
					var video_url = $("#moviePlayerWapper").attr("data-video");
					//console.log(video_url);
					var flashvars = {
						// M3U8 url, or any other url which compatible with SMP player (flv, mp4, f4m)
						// escaped it for urls with ampersands
						src: escape(video_url),
						// url to OSMF HLS Plugin
						//plugin_m3u8: "/js/hlsf.swf"
					};
					var params = {
						// self-explained parameters
						allowFullScreen: true,
						allowScriptAccess: "always",
						bgcolor: "#000",
						wmode:"transparent",
						play:false,
						autostart:true
					};
					var attrs = {
						name: "player"
					};
				   swfobject.embedSWF(
						// url to SMP player
					   "/js/strobemedia.swf",
						// div id where player will be place
						"moviePlayerWapper",
						// width, height
						"100%", "100%",
						// minimum flash player version required
						"10.2",
						// other parameters
						null, flashvars, params, attrs
					);
				};
				play();//直播方法
			</script>
			<script src="js/krpano.js"></script>
			<noscript>
				<table style="width:100%;height:100%;">
					<tr style="vertical-align:middle;text-align:center;">
						<td>ERROR:<br><br>Javascript not activated<br><br></td>
					</tr>
				</table>
			</noscript>
			<script>
				function playVr(vid){
					
					$("#pano"+vid).css("display","block");
					var IMG=$("#img"+vid).val();
				   
					$.ajax({
						type: "post",
						url: "vr_ajax.php",
						data: {src:IMG},
						dataType:"xml",
						success: function(data){
							embedpano({swf:"js/krpano.swf", xml:"krpano.xml?v="+vid, target:"pano"+vid, html5:"auto", mobilescale:1.0, passQueryParameters:true});
						}
					});
				}
			</script>
		</div>
		<div class="po-a zhibo_de_r">
			<div class="zhibo_de_r_m">
				<div class="zhibo_ewm">
					<{if $act_res.active_id !=''}><!--<a href="Link<{$act_res.active_id}>.html">--><a href="javascript:void(0);">
					<{else}><a href="javascript:void(0);">
					<{/if}>			
						<h3><{$zb_res.zb_title}><br/>(浏览人数：<span style="color:#f00;"><{$zb_res.order_num}></span>人)</h3>
						<span class="display-i">
						<{if $zb_res.image_path2 !=''}><img width="158" src="<{$zb_res.image_path2}>" alt="">
						<{else}><img src="images/ewm_2.jpg">
						<{/if}>
						</span>
						<!--<p>参与评论赢取精美礼品，活动规则点击此处</p>-->
					</a>
				</div>
				<div class="comment_list js_comment_list">
					<h2>评论区</h2>
					<{if $post_list|smarty:nodefaults|@count ne '0'}>	
					<ul class="js_commonList">
						<{section name="loop" loop=$post_list|smarty:nodefaults}>
						<li>
							<div class="cf">
								<strong class="float-l"><{$post_list[loop].nick_name}></strong>
								<i class="float-r">#<{$recNum-$smarty.section.loop.index}>楼</i>
							</div>
							<span class="display-b">发表于：<{$post_list[loop].creat_time|date_format:"%Y"}>年<{$post_list[loop].creat_time|date_format:"%m"}>月<{$post_list[loop].creat_time|date_format:"%d"}>日</span>
							<p><{$post_list[loop].content}></p>
						</li>
						<{/section}>
					</ul>
					<{/if}>
				</div>
			</div>
		</div>
	</div>
</div>
<{/if}>
 <div class="liveComment js_liveComment colorwhite">
	<form id="myform" name="myform" action="" method="post">
		<input type="hidden" id="mode" name="mode" value="">
		<input type="hidden" name="p" value="">
		<input type="hidden" name="mid" id="mid" value="<{$form.market_id}>">
		<input type="hidden" value="<{$image_res|smarty:nodefaults|@count}>" id="num">
		<i class="js_commentClose"></i>
		<ul class="content clearfix">
			<li class="live_name">
				<span>昵&nbsp;&nbsp;称：</span><input type="text" placeholder="请输入您的昵称" id="nick" name="nick"/>
			</li> 
			<li class="live_content">
				<span>内&nbsp;&nbsp;容：</span><textarea id="content" name="content"></textarea>
			</li> 
		  <li class="live_Email">
				<span>手&nbsp;&nbsp;机：</span>
				<input type="text" placeholder="请输入您的手机号码" id="tel" name="tel"/>
			   
			</li>   				
			 <!-- <li class="live_yanzheng"><span>验证码：</span><input type="text" name="randcode" id="randcode" placeholder="请输入验证码"/><img id="yzm" name="yzm" style="margin-left:3px;border:1px solid #ddd;vertical-align:middle;height:33px;" src='../include/rand_func.php'  onclick="reloadyzm();" title="单击重新换一个"/>

			 </li>
			 <li class="live_code">
				 <input type="text" placeholder="输入短信验证码" id="code" name="code"/>
				  <b onclick="huoqu();">获取验证码</b><i class="live_tips"></i>
			 
			 </li> -->
			
			<li class="live_submit">
				<input type="button" onclick="checkSave3();" value="发表评论" />
			</li>  
		</ul>
	</form>
	</div>
	
<script type="text/javascript" src="js/appear.js"></script>
<script>
  function liveFuc (){
		$('.animated').appear(function() {

			var elem = $(this);
			var animation = elem.attr("data-animation");
			if(!elem.hasClass('visible')){
			
				var animationDelay = elem.attr('data-animation-delay');
				var _src = elem.attr('data-src');
				if (animationDelay) {
				
					setTimeout(function() {
					
						elem.addClass(animation + " visible");
						if(_src){
						 
							elem.attr({
								src: _src
							}); 
						}
					}, animationDelay);
				}else{
				
					elem.addClass(animation + " visible");
				}
			}
		});
}
liveFuc();
var now = true;
$('#comment_submit_but').click(function(){

	var tel = /^1[3|4|5|7|8]\d{9}$/;
	now = true;
	if($('#nick').val() == ''){
		
		show_err_msg('请填写您的昵称！');  
		$('#nick').focus();
	}else if($('#content').val() == ''){
		
		show_err_msg('请填写您的内容！');
		$('#content').focus();
	}else if($('#tel').val() == ''){
		
		show_err_msg('请填写您的手机号码！');
		$('#tel').focus();
	}else if(!tel.test($('#tel').val())){
		
		show_err_msg('手机格式不对！');
		$('#tel').focus();
	}else{
	
		//这里发送ajax请求，如果请求成功调用show_msg函数
		now = true;  
	}
	return now;
});


function show_err_msg(str){

	alert(str);
	now = false; 
};


var noew = false;

function size_r (){

	var top = $(window).scrollTop();
	var actvity = $(".actvity_list");
	var footer_t = $("#footer").offset().top-1000;
	var w_h = $(window).height();
	var about_de_w = $(".zhibo_list_main").innerWidth();
	var actvity_t = actvity.offset().top;
	var zhibo_de_r = $(".zhibo_de_r_m");

	//$(".comment_list ul").height(w_h-506);

	if(top>actvity_t){

		zhibo_de_r.addClass('zhibo_de_r_fid');

		if(top>footer_t){
		
			if(noew){
			
				zhibo_de_r.removeClass('zhibo_de_r_fid');
			}
		}
	}else{
		
		zhibo_de_r.removeClass('zhibo_de_r_fid');
	}
	console.log(footer_t);
}

$(function(){

	size_r();
	$(window).scroll(function(){
		noew = true;
		size_r();
	});
	$(window).resize(function(){

		size_r();
		noew = true;
	});
})

var newsTimer=null;	
var notesTimer=null;

newsTimer=setInterval(getNews,36000);//每隔360s刷新一次
notesTimer=setInterval(getNotes,60000);//每隔60s刷新一次

function reloadyzm(){

	var verify=document.getElementById('yzm');
	verify.setAttribute('src','../include/rand_func.php?rc='+Math.random());
}

$('body').on('click','.js_Comment_icon,.js_live_goToComment',function(){

	$('#content').val('请输入');
	$('.js_liveComment').fadeIn();
})
$('.js_commentClose').click(function(){ 

    $('.js_liveComment').fadeOut();
	if($(window).width()<1280){
	
		$('html').css({'height':'auto','overflow-y':'auto'});
	}	
})

var liveList= $('.actvity_list_ul'); 
var beforeNum=liveList.find('li').length;
function getNews(){
	$.ajax({  
		type: "post",		
		url: 'zhibo_ajax.php',  
		data:'mid='+$("#mid").val()+'&zb_num='+beforeNum,
		success: function(msg){  console.log(msg); 
		
			$(".actvity_list_ul").prepend(msg);
			beforeNum=$(".actvity_list_ul").find("li").size();
			   
			liveFuc();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			
			return false;
		}
	});
}

function getNotes(){
   
	$.ajax({  
	
		type: "post",		
		url: 'zhibo_ajax.php',  
		data:'mode=NOTES'+'&mid='+$("#mid").val(),
		success: function(msg){  
			//console.log(msg);
			$('.js_commonList').html(msg);
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
		
			return false;
		}
	});
}  
</script>
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" >
var title=$('.rightRule h4').text();
var jiathis_config={
	summary:"",
	title: title,
	shortUrl:false,
	hideMore:false
}
</script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<!-- JiaThis Button END -->