<?php /* Smarty version 2.6.18, created on 2018-05-17 22:33:42
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'getMarketCategory', 'footer.tpl', 30, false),array('modifier', 'escape', 'footer.tpl', 31, false),)), $this); ?>
<!-- footer -->
<div class="min_w1200" id="footer">
	<div class="footer_t max_width1270 m_auto min_w1200 po-r cf">
		<div class="footer_t_nav float-l">
			<dl class="float-l">
				<dt><a href="Introduction.html">关于我们</a></dt>
				<dd><a href="CEO_Speech.html">董事长致辞</a></dd>
				<dd><a href="Organization.html">企业架构</a></dd>
				<dd><a href="Culture.html">企业文化</a></dd>
				<dd><a href="About.html">企业介绍</a></dd>
				<!-- <dd><a href="Image.html">企业形象</a></dd>
				<dd><a href="Certification.html">荣誉证书</a></dd>
				<dd><a href="History.html">企业历程</a></dd> -->
				<dd><a href="JobList.html">人力资源</a></dd>
				<dd><a href="ContactUs.html">联系我们</a></dd>
			
			</dl>
			<dl class="float-l">
				<dt><a href="News.html">新闻资讯</a></dt>
				
				<dd><a href="News_category2.html">企业新闻</a></dd>
				<dd><a href="News_category4.html">行业新闻</a></dd>
				<dd><a href="News_category1.html">媒体新闻</a></dd>
				<dd><a href="Video.html">视频中心</a></dd>
				<dd><a href="PicNews.html">图片新闻</a></dd>
				
			</dl>
			<dl class="float-l">
				<dt><a href="Market.html">专题活动</a></dt>
				<?php $_from = ((is_array($_tmp="")) ? $this->_run_mod_handler('getMarketCategory', true, $_tmp) : $this->_plugins['modifier']['getMarketCategory'][0][0]->getMarketCategory($_tmp)); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
				<dd><a href="/Market_category<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
.html"><?php echo ((is_array($_tmp=$this->_tpl_vars['item'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a></dd>
				<?php endforeach; endif; unset($_from); ?>
				<dd><a href="H5list.html">活动 H 5</a></dd>
			</dl>
			<dl class="float-l">
				<dt><a href="Develop.html">投资者关系</a></dt>
				<dd><a href="Develop.html">企业发展</a></dd>
				<dd><a href="Notice.html">公司公告</a></dd>
				<dd><a href="Report.html">分析报告</a></dd>
				<dd><a href="Way.html">联系方式</a></dd>
			</dl>
			<dl class="float-l footWeb">
				<dt><a href="javascript:void(0);">集团成员平台</a></dt>
				<dd ><a href="http://www.darling.cn/" target="_blank">打令智能官网</a></dd>
                <dd><a href="http://www.zhilianbao.cn" target="_blank" style="width:95px">智联宝官网</a></dd>
                <dd><a href="http://www.laomamaicai.com/" target="_blank">生鲜网</a></dd>

                <dd><a href="http://www.szxiaodou.com/" target="_blank">小豆科技官网</a></dd>
                <dd><a href="http://www.p2n.com" target="_blank" style="width:95px">彼图恩官网</a></dd>
                <dd><a href="http://www.hzw.com.cn/" target="_blank">合众网</a></dd>
                
                 <dd><a href="http://www.aierbeite.com/" target="_blank">爱尔贝特官网</a></dd>
				<dd><a href="http://www.toyani.com.cn" target="_blank" style="width:95px">图雅丽官网</a></dd>
				<dd><a href="javascript:void(0);" target="_blank">乐摇网</a></dd>
				

                <dd><a href="http://www.bqlnv.com.cn/" target="_blank">汽车视像官网</a></dd>
                <dd><a href="http://www.plcscm.com.cn/" target="_blank" style="width:95px">鹏隆成官网</a></dd>
                <dd><a href="http://www.gy.protruly.com.cn/" target="_blank">公益网</a></dd>

                 <dd><a href="http://www.bqlsx.com.cn/" target="_blank">商显视像官网</a></dd>
                 <dd><a href="http://mall.darling.cn/" target="_blank" style="width:95px">打令商城网</a></dd>
                 <dd><a href="http://bqlsxy.protruly.com.cn/" target="_blank">学院网</a></dd>

                <dd><a href="http://www.bqlafcom.cn/" target="_blank">安防视像官网</a></dd>
                <dd><a href="http://www.bqlzl.com.cn/" target="_blank" style="width:95px">租赁视像网</a></dd>

                
                
			</dl>
			
		</div>
		<div class="float-r bql_ewm">
			<div class="float-r">
				<img src="images/ewm_2.jpg" alt=""><p>保千里集团订阅号</p>
			</div>
			<div class="float-r bql_ewm_div">
				<img src="images/ewm_1.jpg" alt=""><p>保千里集团服务号</p>
			</div>
			<div  class="clear footContact" >
				<p><span>总</span>机：0755-29672038</p>
                <p><span>邮</span>箱：pr@proturly.com.cn</p>
				<p class="cf">
					<span class="float-l">分</span><i class="float-l">享：</i>
					<a style="margin-right:10px;" class="jiathis_button_tsina" href="javascript:void(0);">
						<img src="images/wb_ico.jpg" alt="">
					</a>
					<a class="jiathis_button_weixin" href="javascript:void(0);"><img src="images/wx_ico.jpg" alt=""></a>
				</p>
				          	
				 <script src="http://v3.jiathis.com/code/jia.js"></script>
			    <script type="text/javascript" >
			   
			        var jiathis_config={
			          summary:"",
			          shortUrl:false,
			          hideMore:false
			        }
			    </script>

			</div>
		</div>
	</div>
	<div class="footer_b min_w1200">Copyright©2006-2016保千里视像科技集团股份有限公司版权所有&nbsp;&nbsp;|<span>
	<!-- <a href="http://new.cnzz.com/v1/login.php?siteid=2424188">站长统计</a>
	<script type="text/javascript" src="http://s17.cnzz.com/stat.php?id=2424188&web_id=2424188"></script> -->
	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261132966'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1261132966' type='text/javascript'%3E%3C/script%3E"));</script>
	</span>&nbsp;&nbsp;粤ICP备12042144号</div>
 </div> 
 <!-- footer --> 