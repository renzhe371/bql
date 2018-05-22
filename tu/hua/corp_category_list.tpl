<div id="main_body">
<form id="myform" name="myform" action="corp_category.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" name="p" value="">
<input type="hidden" name="ordField" id="ordField" value="">
	<div id="conts">
      <h2>分类列表</h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="4%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
			 <th width="16%"><a href="javascript:setOrderBy('category_id <{if $activeField eq 'category_id'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.category_id.text}></a><{if $ordField eq "category_id desc"}>↑<{/if}><{if $ordField eq "category_id asc"}>↓<{/if}></th>
            <th width="40%"><a href="javascript:setOrderBy('category_name <{if $activeField eq 'category_name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.category_name.text}></a><{if $ordField eq "category_name desc"}>↑<{/if}><{if $ordField eq "category_name asc"}>↓<{/if}></th>
			<th width="20%"><a href="javascript:setOrderBy('parent_id <{if $activeField eq 'parent_id'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.parent_id.text}></a><{if $ordField eq "parent_id desc"}>↑<{/if}><{if $ordField eq "parent_id asc"}>↓<{/if}></th>
            <th width="10%"><a href="javascript:setOrderBy('order_num <{if $activeField eq 'order_num'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.order_num.text}></a><{if $ordField eq "order_num desc"}>↑<{/if}><{if $ordField eq "order_num asc"}>↓<{/if}></th>
            <th width="10%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td><input type="checkbox" name="select_id[]" value="<{$list[loop].category_id}>"></td>
          	<td class="td_left"><{$list[loop].category_id}></td>
            <td class="td_left"><{$list[loop].category_name}></td>
			<td class="td_left"><{if $list[loop].parent_id eq '' or $list[loop].parent_id eq '0'}>未设置<{else}><{$list[loop].parent_id|getCorpCategory}><{/if}></td>
          	<td class="td_center"><{$list[loop].order_num}></td>
            <td class="td_center">
            	<a href="?mode=EDIT&category_id=<{$list[loop].category_id}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=DEL&category_id=<{$list[loop].category_id}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
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