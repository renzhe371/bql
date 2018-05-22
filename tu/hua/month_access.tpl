<script>
function gotopage(year)
{
	document.getElementById('year').value=year;
	mySubmit('MONTH_SEARCH');
}
</script>
<div id="main_body">
<form id="myform" name="myform" action="access.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="type" name="type" value="month">
<input type="hidden" id="year" name="year" value="">
	<div id="search">
      <h2>自定义统计时间</h2>
      <div class="conts_content">
        <ul>
        	<li>
              <a class="button" href="javascript:void(0);" onclick="mySubmit('MONTH');return false;">按月分统计</a>
              <a class="button" href="javascript:void(0);" onclick="mySubmit('AREA');return false;">按地区统计</a>
            </li>
            <li>
              <input id="search_start" name="search_start" type="text" value="<{$search.search_start}>" readonly=true style="width:35px;">
              <img onclick="WdatePicker({el:'search_start',dateFmt:'yyyy'})" src="/js/skin/datePicker.gif" style="cursor: pointer;" width="16" height="22" align="absmiddle">
              ～
              <input id="search_end" name="search_end" type="text" value="<{$search.search_end}>" readonly=true style="width:35px;"> <img onclick="WdatePicker({el:'search_end',dateFmt:'yyyy'})" src="/js/skin/datePicker.gif" style="cursor: pointer;" width="16" height="22" align="absmiddle">
            </li>
            <li>
              <input class="button" type="button" value="统计" onclick="mySubmit('MONTH_SEARCH');" />
            </li>
         </ul>
       </div>
    </div>
    <{if $search.mode eq 'MONTH_SEARCH'}>
    <{if $total ne '0'}>
    <div id="conts">
      <h2>每月累计访问量</h2>
      <div class="conts_content">
      	<div id="add">
      	<table cellpadding="0" cellspacing="0" class="table_view">
		  	<tr>
				<th width="10%">年访问量</th>
				<th width="20%" style="color:#f00"><{$y_total|default:'0'}></th>
				<th width="10%">统计时间</th>
				<th width="60%" style="color:#f00"><{$search.year}></th>
	        </tr>
		  </table>
        <table cellpadding="0" cellspacing="0" class="table_view">
		  	<tr>
				<th width="10%">月份</th>
				<th width="20%">访问量</th>
				<th width="10%">比率</th>
				<th width="60%"></th>
	        </tr>
		   <{section name=loop loop=12}>
		   <{assign var="month" value=$smarty.section.loop.index+1}>
		   <tr>
				<td class="td_left"><{$month}>月</td>
				<td class="td_left"><{$rate.$month.count|default:'0'}></td>
				<td class="td_left"><{$rate.$month.rate|string_format:'%.2f'}>%</td>
				<td class="td_left">
				<{if $rate.$month.rate ne ''}>
				<span><img src="common/images/stat.gif" width="<{$rate.$month.rate}>%" height="10" style="display:inline;"></span>
				<{/if}>
				</td>
	       </tr>
	        <{/section}>
		  </table>
		  <table cellpadding="0" cellspacing="0" class="table_view">
		  	<tr>
				<th width="10%">年访问量</th>
				<th width="20%" style="color:#f00"><{$y_total|default:'0'}></th>
				<th width="10%">统计时间</th>
				<th width="60%" style="color:#f00"><{$search.year}></th>
	        </tr>
		  </table>
        <ul>
            <li>
              <input class="button" type="button" value="下载" onclick="mySubmit('MONTH_DOWNLOAD');" />
            </li>
         </ul>
         <div id="pages" style="padding:0;margin-top:-20px;">
         	<{if $search.year lte $search.search_start}>« 上一年
         	<{else}><a href="javascript:gotopage('<{$search.year-1}>');">« 上一年</a><{/if}>
         	<{if $search.year gte $search.search_end}>下一年 »
         	<{else}><a href="javascript:gotopage('<{$search.year+1}>');">下一年 »</a><{/if}>
        </div>
      </div>
    </div>
     <{else}>
      	<{include file="err_no_data.tpl"}>
    <{/if}>
    <{/if}>
</form>
</div>
