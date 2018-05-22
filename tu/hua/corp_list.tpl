<div id="main_body">
<form id="myform" name="myform" action="corplist.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" name="p" value="">
<input type="hidden" name="ordField" id="ordField" value="">
    <div id="conts">
      <h2>公司列表</h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="4%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
            <th width="40%"><a href="javascript:setOrderBy('corp_name <{if $activeField eq 'corp_name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.corp_name.text}></a><{if $ordField eq "corp_name desc"}>↑<{/if}><{if $ordField eq "corp_name asc"}>↓<{/if}></th>
			<th width="30%"><a href="javascript:setOrderBy('corp_logo <{if $activeField eq 'corp_logo'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.corp_logo.text}></a><{if $ordField eq "corp_logo desc"}>↑<{/if}><{if $ordField eq "corp_logo asc"}>↓<{/if}></th>
            <th width="14%"><a href="javascript:setOrderBy('order_num <{if $activeField eq 'order_num'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.order_num.text}></a><{if $ordField eq "order_num desc"}>↑<{/if}><{if $ordField eq "order_num asc"}>↓<{/if}></th>
            <th width="12%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td class="td_center"><input type="checkbox" name="select_id[]" value="<{$list[loop].corp_id}>"></td>
            <td><{$list[loop].corp_name}></td>
			<td><{$list[loop].corp_logo}></td>
            <td><{$list[loop].order_num}></td>
            <td class="td_center">
            	<a href="?mode=EDIT&corp_id=<{$list[loop].corp_id}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=DEL&corp_id=<{$list[loop].corp_id}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
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