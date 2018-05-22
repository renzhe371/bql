<div class="about_main about_mains m_auto market_main">
	<div class="max_w1750 min_w1200 cf about_de m_auto">
		<div class="about_de_l min_w1200 max_w1388 float-l about_hr_l">
			<div class="contact_us_l_t">
				<div class="contact_us_l po-r">
					<h1 class="title_h1">我要留言</h1>
					<p>我们的网站改版，我们的进步与发展，都离不开您宝贵的建议和意见，如果您有什么好的建议或意见，请给我们留言，衷心感谢您对本保千里的关心和支持，我们将为您提供更加优质的产品和服务。</p>
					<form id="myform" name="myform" action="" method="post">
						<input type="hidden" id="mode" name="mode" value="" />
						<div class="contact_form cf">
							<div class="contact_form_list po-r float-l">
								<label class="po-a" for="user_name">您的姓名：</label>
								<span class="display-b"><input name="name" id="name" type="text"></span>
							</div>
							<div class="contact_form_list po-r float-r">
								<label class="po-a" for="suggest">咨询建议：</label>
								<span class="display-b"><input name="company_name" id="cname" type="text"></span>
							</div>
							<div class="contact_form_list po-r float-l">
								<label class="po-a" for="tel">手机号码：</label>
								<span class="display-b"><input name="company_tel" id="tel" type="text"></span>
							</div>
							<div class="contact_form_list po-r float-r">
								<label class="po-a" for="site">公司地址：</label>
								<span class="display-b"><input name="company_address" id="address" type="text"></span>
							</div>
							<div class="contact_form_list po-r float-l contact_form_list_last">
								<label class="po-a" for="describe">详情描述：</label>
								<span class="display-b">
									<textarea name="content" id="content" cols="30" rows="10"></textarea>
								</span>
							</div>
							<div class="contact_form_list po-r float-l contact_form_list_last">
								<span class="display-i">
									<input id="con_submit" value="提交" onclick="checkSave()" type="button">
									<input value="重置" id="con_reset" type="reset">
								</span>
							</div>
						</div>
					</form>
					<div class="po-a contact_dz">
					<h1 class="title_h1 contact_way_ti">联系方式</h1>
					<{$contact_content|smarty:nodefaults}>
					</div>
				</div>
				
				
				<div class="map_contact">
						<div id="container" class="map"></div>
						<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
						<script type="text/javascript" src="js/map.js"></script>
				</div>
			</div>
		</div>
		<{include file='alone.tpl'}>
	</div>
</div>

<script type="text/javascript" src="include/rec/cn/alertmsg.js"></script>