<div class="about_main about_mains m_auto">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 bql_news_box max_w1388 overflow">
			<div class="content exper_service_content">
				<div class="ExperSerContent overflow">
					<h3 style="margin-left:1%;font-size:19px;color:#333;margin-bottom:19px;"><i style="display:inline-block;width: 5px;height: 15px;background-color: #6dbcbd;vertical-align: bottom;margin-right: 10px;"></i><{$cat_list[0].category_name}></h3>
					<ul class="clearfix js_esBtnList">
						<{section name="loop" loop=$list1|smarty:nodefaults}>
						<li>
							<a href="javascript:void(0);">
							<dl>
								<dt><img src="<{$list1[loop].image_path}>"></dt>
								<dd class="overflow-nowrap"><{$list1[loop].name}></dd>
							</dl>
							</a>
							<input type="hidden" class="hid" name="hid" value="<{$list1[loop].id}>">
						</li>
						<{/section}>
					</ul>
					<h3 style="margin-left:1%;font-size:19px;color:#333;margin-bottom:19px;"><i style="display:inline-block;width: 5px;height: 15px;background-color: #6dbcbd;vertical-align: bottom;margin-right: 10px;"></i><{$cat_list[1].category_name}></h3>
					<ul class="clearfix js_esBtnList">
						<{section name="loop" loop=$list2|smarty:nodefaults}>
						<li>
							<a href="javascript:void(0);">
							<dl>
								<dt><img src="<{$list2[loop].image_path}>"></dt>
								<dd class="overflow-nowrap"><{$list2[loop].name}></dd>
							</dl>
							</a>
							<input type="hidden" class="hid" name="hid" value="<{$list2[loop].id}>">
						</li>
						<{/section}>
					</ul>
					<!--体验店浮窗开始-->
					<div class="shopDetail js_shopDetail">
						<div class="sDbg"></div>
						<div class="shopBox  js_shopBox  absolute overflow">
							<i class="sDClose js_sDClose  displayBlock absolute"></i>
							<div class="msgBox"></div>
						</div>
					</div>
					<!--体验店浮窗结束-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--主体内容结束-->

<script>
var shopDetail=$('.js_shopDetail');
var sDClose=$('.js_sDClose');
$(document).ready(function(){

	sDClose.click(function(){    	
		shopDetail.fadeOut();
	}) 
	 
	$('body').on('click','.js_esBtnList li',function(index){
        
		shopDetail.fadeIn();
		var hid=$(this).find(".hid").val();
		$.post('exper_ajax.php',{'hid':hid}, function(msg){ 
		
			//alert(msg);
			$(".msgBox").html(msg);
		})
	}) 
	
	$('body').on('click','.js_sDimgList li',function(){ 
		var _this=$(this);	
		$('#map_container').html("<img src="+_this.find('img').attr('src')+">")
		
	})
})
</script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=dADdBw9bhUAgaI79f2ZxwZTE6hq3H7SB"></script>
<script type="text/javascript">
    function creatMap(j,w,sDName,sDadd){
		//百度地图API功能
		var map = new BMap.Map("map_container");
		var point = new BMap.Point(j,w);
		map.centerAndZoom(point, 18);
		var marker = new BMap.Marker(point);//创建标注
		map.addOverlay(marker);//将标注添加到地图中
		var opts = {
			width : 200,//信息窗口宽度
			height: 60,//信息窗口高度
			title : sDName//信息窗口标题
		};
		var infoWindow = new BMap.InfoWindow(sDadd, opts);//创建信息窗口对象
		map.openInfoWindow(infoWindow,point);//开启信息窗口
		marker.addEventListener("click", function(){
			map.openInfoWindow(infoWindow,point);//开启信息窗口
		});
		map.enableScrollWheelZoom();//启用滚轮放大缩小，默认禁用
		map.enableContinuousZoom();//启用地图惯性拖拽，默认禁用
		var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});//左上角，添加比例尺
		var top_left_navigation = new BMap.NavigationControl();//左上角，添加默认缩放平移控件
		map.addControl(top_left_control);
		map.addControl(top_left_navigation);
	}
</script>