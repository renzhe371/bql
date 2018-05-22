<!-- main -->
<div class="bql_main m_auto min_w1200 max_w1750">
	<div class="cf">
		<div class="float-l bql_main_intro">
			<a href="Introduction.html">
			<div class="intro_box cf">
				<h3>智联传统产业 创造智慧生活</h3>
				<p>布局智能硬件+战略，启动全新商业模式 <br>打造跨界的智能互联网全营销平台<br>提供智能硬件+互联网+新媒体的百行百业解决方案</p>
			</div>
			</a>
		</div>
		<div class="float-l bql_main_new">
			<div class="bql_main_new_box">
				<h2 class="cf"><span class="float-l">新闻资讯</span><a href="News.html" class="float-r">查看更多+</a></h2>
				<div class="bql_main_new_thumbnail cf">
					<a class="float-l" href="/NewsContent<{$news_list[0].news_id}>.html">
						<img width="140" height="100" src="http://www.protruly.com.cn/<{$news_list[0].image_path}>" alt="">
					</a>
					<div>
						<h3 class="overflow-nowrap">
							<a href="/NewsContent<{$news_list[0].news_id}>.html">						
								<{$news_list[0].news_title|truncate:42}>
							</a>
						</h3>
						<p class="overflow">
							<a href="/NewsContent<{$news_list[0].news_id}>.html">			
								<{$news_list[0].news_ms|smarty:nodefaults}>
							</a>
						</p>
					</div>
				</div>
				<{section name="loop" loop=$news_list|smarty:nodefaults start='1'}>
				<p class="po-r">
					<a class="display-b overflow-nowrap" href="/NewsContent<{$news_list[loop].news_id}>.html">
						<{$news_list[loop].news_title}>
					</a>
					<span class="po-a"><{$news_list[loop].create_time|date_format:'%Y-%m-%d'}></span>
				</p>
				<{/section}>
			</div>
		</div>
		<div class="float-r bql_main_video" style="background:url(images/video_bag.jpg) center no-repeat;">
			<div id="a"  dateVideo='http://www.protruly.com.cn/upload/flv/bql_image0403.flv' dateImge='' class="video-l" style="display:none;"></div>
			<script src="js/FTMzKDHrEeODISIACusDuQ.js"></script>
			<script>
                $(".bql_main_video").click(function(){
                   setVideo();
                })
               function setVideo(){
                    var skinSrc='js/carbon.xml';
                    $('.video-l').attr('id',"media"+1);
                    var  videoPath=$('.video-l').attr('dateVideo');
                    var  imagePath=$('.video-l').attr('dateImge');
                    var  idName=$('.video-l').attr('id');
                    var swfPlayer='js/player.swf';
                    var thePlayer = null ;
                    thePlayer = jwplayer(idName).setup({
                        autostart:true,
                        stretching: 'exactfit', 
                        skin: skinSrc,
                        image:imagePath,
                        width:"100%",
                        height:"100%",
                        file:videoPath,
                        flashplayer:swfPlayer,
                        ga:{}
                    });
             }
			</script>
		</div>
	</div>
   
	<div class="evolution_ti po-r">
		<h3 class="po-a">硬件产品演化路径</h3>
		<div id="evolution_box_ti" class="evolution_box_ti">
			<ul class="cf">				
				<li class="float-l cur"><span class="display-i">功能硬件</span></li>
				<li class="float-l"><span class="display-i">智能硬件</span></li>
				<li class="float-l"><span class="display-i">平台型智能硬件</span></li>
				<li class="float-l"><span class="display-i">大数据&云计算</span></li>
			</ul>
		</div>
	</div>
	<div id="evolution_content" class="evolution_content">
		<div class="evolution_list evolution_list_4">
			<ul class="cf">
				<li class="float-l">
					<a href="http://www.bqlnv.com.cn" target="_blank" class="display-b">
					    	<h3 class="overflow-nowrap">汽车视像产品</h3>
						     <p class="overflow-nowrap">汽车夜视前装和汽车夜视后装系列产品</p>
						    <img src="images/cp_12.jpg" alt="">
					</a>
				</li>
				<li class="float-l">
					<a href="http://www.toyani.com.cn" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">特种视像产品</h3>
						<p class="overflow-nowrap">肩扛式全高清夜视摄录机、车载/舰船级夜视安全系统、便携式特种夜视仪</p>
						<img src="images/cp_10.jpg" alt="">
					</a>
				</li>
				<li class="float-l">
					<a href="http://www.bqlsx.com.cn" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">商用视像产品</h3>
						<p class="overflow-nowrap">液晶显示屏、壁挂广告机、商用显示产品</p>
						<img src="images/cp_11.jpg" alt="">
					</a>
				</li>
				<li style="margin-right:0;" class="float-l">
					<a href="http://www.bqlaf.com.cn" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">安防视像产品</h3>
						<p class="overflow-nowrap">数字摄像机、模拟摄像机</p>
						<img src="images/cp_9.jpg" alt="">
					</a>
				</li>
			</ul>
		</div>
		<div class="evolution_list evolution_list_3 displayNo">
			<ul class="cf">
				<li class="float-l">
					<a href="http://www.darling.cn/product.php?sid=117" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">民用视像-缤纷魔镜</h3>
						<p class="overflow-nowrap">手机魔镜、手机缤纷等针对移动端高端客户的产品</p>
						<img src="images/cp_6.jpg" alt="">
					</a>
				</li>
				<li class="float-l">
					<a href="http://www.bqlnv.com.cn" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">汽车视像-汽车主动安全系统</h3>
						<p class="overflow-nowrap">汽车夜视主动安全系统应用于汽车夜视民用市场领域</p>
						<img src="images/cp_5.jpg" alt="">
					</a>
				</li>
				<li class="float-l">
					<a href="javascript:void(0);" class="display-b">
						<h3 class="overflow-nowrap">民用视像-夜单</h3>
						<p class="overflow-nowrap">黑夜拍照神器-打令夜单</p>
						<img src="images/cp_8.jpg" alt="">
					</a>
				</li>
				<li style="margin-right:0;" class="float-l">
					<a href="http://www.bqlsx.com.cn/Product_parent214.html" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">智能视讯会议系统</h3>
						<p class="overflow-nowrap">集成多点红外触摸、无线同屏系统、声控交互...</p>
						<img src="images/cp_7.jpg" alt="">
					</a>
				</li>
			</ul>
		</div>
		<div class="evolution_list evolution_list_2 displayNo">
			<ul class="cf">
				<li class="float-l">
					<a href="http://www.zhilianbao.cn/" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">乐摇宝&合众宝</h3>
						<p class="overflow-nowrap">分别基于实体店、公共场所的平台型智能硬件。</p>
						<img src="images/cp_3.jpg" alt="">
					</a>
				</li>
				<li class="float-l">
					<a href="http://www.darling.cn/product.php?sid=114" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">机器人</h3>
						<p class="overflow-nowrap">具备更智能、更应景、互动性更强的产品特性</p>
						<img src="images/cp_1.jpg?v=1" alt="">
					</a>
				</li>
				<li class="float-l">
					<a href="http://www.darling.cn/product.php?sid=132" class="display-b" target="_blank">
						<h3 class="overflow-nowrap">VR手机</h3>
						<p class="overflow-nowrap">360度VR拍摄、十核处理芯片、全网通,双卡双待...</p>
						<img src="images/cp_2.jpg" alt="">
					</a>
				</li>
				<li style="margin-right:0;" class="float-l">
					<a href="http://www.bqlnv.com.cn" class="display-b"  target="_blank">
						<h3 class="overflow-nowrap">智能驾驶</h3>
						<p class="overflow-nowrap">智能驾驶   
疲劳驾驶预警、高级防碰撞预警、车联网系统、智能驾驶辅助系统...</p>
						<img src="images/cp_4.jpg" alt="">
					</a>
				</li>
			</ul>
		</div>
		<div class="evolution_list evolution_list_1 po-r displayNo">
			<dl class="po-a dl_1">
				<dt>ANALYTICS</dt>
				<dd><img src="images/dsj_6.png" alt=""></dd>
			</dl>
			<dl class="po-a dl_2 cf">
				<dt class="float-l"><img src="images/dsj_1.png" alt=""></dt>
				<dd>
					<h3>大数据</h3>
					<p>大数据是需要新处理模式才能具有更强的决策力、洞察发现力和流程优化能力来适应海量、高增长率和多样化的信息资产</p>
				</dd>
			</dl>
			<dl class="po-a dl_3 cf">
				<dt class="float-l"><img src="images/dsj_2.png" alt=""></dt>
				<dd>
					<h3>云计算</h3>
					<p>基于互联网的相关服务的增加、使用和交付模式</p>
				</dd>
			</dl>
			<dl class="po-a dl_4">
				<dt>TECHNOLOGY</dt>
				<dd><img src="images/dsj_4.png" alt=""></dd>
			</dl>
			<dl class="po-a dl_5 cf">
				<dt class="float-l"><img src="images/dsj_3.png" alt=""></dt>
				<dd><p>STORAGE</p></dd>
			</dl>
			<dl class="po-a dl_6">
				<dt>DATA</dt>
				<dd><img src="images/dsj_5.png" alt=""></dd>
			</dl>
		</div>
	</div>
</div>
<!-- main -->