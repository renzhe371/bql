<div id="main_body">
<form id="myform" name="myform" action="djs.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" name="p" value="">
<input type="hidden" name="ordField" id="ordField" value="">
	<div id="conts">
      <h2>信息列表</h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="4%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
	    <th width="7%"><a href="javascript:setOrderBy('djs_title <{if $activeField eq 'djs_title'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.djs_title.text}></a><{if $ordField eq "djs_title desc"}>↑<{/if}><{if $ordField eq "djs_title asc"}>↓<{/if}></th>
            <th width="55%"><a href="javascript:setOrderBy('djs_content <{if $activeField eq 'djs_content'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.djs_content.text}></a><{if $ordField eq "djs_content desc"}>↑<{/if}><{if $ordField eq "djs_content asc"}>↓<{/if}></th>
            <th width="6%"><a href="javascript:setOrderBy('category_id <{if $activeField eq 'category_id'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.category_id.text}></a><{if $ordField eq "category_id desc"}>↑<{/if}><{if $ordField eq "category_id asc"}>↓<{/if}></th>
            <th width="12%"><a href="javascript:setOrderBy('update_time <{if $activeField eq 'update_time'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.update_time.text}></a><{if $ordField eq "update_time desc"}>↑<{/if}><{if $ordField eq "update_time asc"}>↓<{/if}></th>
            <th width="6%"><a href="javascript:setOrderBy('order_num <{if $activeField eq 'order_num'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.order_num.text}></a><{if $ordField eq "order_num desc"}>↑<{/if}><{if $ordField eq "order_num asc"}>↓<{/if}></th>
            <th width="10%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td><input type="checkbox" name="select_id[]" value="<{$list[loop].djs_id}>"></td>
            <td class="td_left"><{$list[loop].djs_title}></td>
	    <td class="td_left"><{$list[loop].djs_content}></td>
          	<td class="td_left"><{if $list[loop].category_id eq '' or $list[loop].category_id eq '0'}>未设置<{else}><{$list[loop].category_id|getDjsCategory}><{/if}></td>
          	<td class="td_center"><{$list[loop].update_time}></td>
          	<td class="td_center"><{$list[loop].order_num}></td>
            <td class="td_center">
            	<a href="?mode=EDIT&djs_id=<{$list[loop].djs_id}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=DEL&djs_id=<{$list[loop].djs_id}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
            </td>
          </tr>
          <{/section}>
        </table>
        <div class="pagination clearFix">
          <div class="bulk-actions">
          	<a class="button" href="javascript:void(0);" onclick="mySubmit('ADD');return false;"><{$smarty.const._ADD}></a>
            <a class="button" href="javascript:void(0);" onclick="listEdit();return false;"><{$smarty.const._EDIT}></a>
            <a class="button" href="javascript:void(0);" onclick="listDel();return false;"><{$smarty.const._DELETE}></a>
          </div>
          <{$pageList|smarty:nodefaults}>
        </div>
        <{else}>
      	<{include file="err_no_data.tpl"}>
        <div class="pagination clearFix">
          <div class="bulk-actions">
          	<a class="button" href="javascript:void(0);" onclick="mySubmit('ADD');return false;"><{$smarty.const._ADD}></a>
          </div>
        </div>
        <{/if}>
      </div>
    </div>
</form>
</div>