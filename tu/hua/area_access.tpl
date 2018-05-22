<div id="main_body">
<form id="myform" name="myform" action="access.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="type" name="type" value="area">
	<div id="search">
      <h2>自定义统计时间</h2>
      <div class="conts_content">
        <ul>
        	<li>
              <a class="button" href="javascript:void(0);" onclick="mySubmit('MONTH');return false;">按月分统计</a>
              <a class="button" href="javascript:void(0);" onclick="mySubmit('AREA');return false;">按地区统计</a>
            </li>
            <li>
              <input id="search_start" name="search_start" type="text" value="<{$search.search_start}>" readonly=true style="width:75px;">
              <img onclick="WdatePicker({el:'search_start',dateFmt:'yyyy-MM-dd'})" src="/js/skin/datePicker.gif" style="cursor: pointer;" width="16" height="22" align="absmiddle">
              ～
              <input id="search_end" name="search_end" type="text" value="<{$search.search_end}>" readonly=true style="width:75px;"> <img onclick="WdatePicker({el:'search_end',dateFmt:'yyyy-MM-dd'})" src="/js/skin/datePicker.gif" style="cursor: pointer;" width="16" height="22" align="absmiddle">
            </li>
            <li>
              <input class="button" type="button" value="统计" onclick="mySubmit('AREA_SEARCH');" />
            </li>
         </ul>
       </div>
    </div>
    <{if $search.mode eq 'AREA_SEARCH'}>
    <div id="conts">
      <h2>访问者地区分布</h2>
      <div class="conts_content">
      	<div id="add">
      	<table cellpadding="0" cellspacing="0" class="table_view">
		  	<tr>
				<th width="10%">总访问量</th>
				<th width="20%" style="color:#f00"><{$total|default:'0'}></th>
				<th width="10%">统计时间</th>
				<th width="60%" style="color:#f00"><{$search.search_start}> ～ <{$search.search_end}></th>
	        </tr>
		  </table>
        <table cellpadding="0" cellspacing="0" class="table_view">
		  	<tr>
				<th width="10%">地区</th>
				<th width="20%">访问量</th>
				<th width="10%">比率</th>
				<th width="60%"></th>
	        </tr>
		   <{foreach name=loop key=key item=item from=""|getProvinceCode|smarty:nodefaults}>
		   <tr>
				<td class="td_left"><{$item}></td>
				<td class="td_left"><{$rate.$key.count|default:'0'}></td>
				<td class="td_left"><{$rate.$key.rate|string_format:'%.2f'}>%</td>
				<td class="td_left">
				<{if $rate.$key.rate ne ''}>
				<span><img src="common/images/stat.gif" width="<{$rate.$key.rate}>%" height="10" style="display:inline;"></span>
				<{/if}>
				</td>
	       </tr>
	        <{/foreach}>
		  </table>
		  <table cellpadding="0" cellspacing="0" class="table_view">
		  	<tr>
				<th width="10%">总访问量</th>
				<th width="20%" style="color:#f00"><{$total|default:'0'}></th>
				<th width="10%">统计时间</th>
				<th width="60%" style="color:#f00"><{$search.search_start}> ～ <{$search.search_end}></th>
	        </tr>
		  </table>
        <ul>
            <li>
              <input class="button" type="button" value="下载" onclick="mySubmit('AREA_DOWNLOAD');" />
            </li>
         </ul>
        </div>
      </div>
    </div>
    <{/if}>
</form>
</div>
