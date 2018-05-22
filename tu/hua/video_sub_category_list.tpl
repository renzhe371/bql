<div id="main_body">
<form id="myform" name="myform" action="video_category.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="parent_id" name="parent_id" value="<{$form.parent_id}>">
    <div id="conts">
      <h2><{$form.parent_id|getVideoCategory}></h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="4%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
            <th width="60%"><a href="javascript:setOrderBy('category_name <{if $activeField eq 'category_name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.category_name.text}></a><{if $ordField eq "category_name desc"}>↑<{/if}><{if $ordField eq "category_name asc"}>↓<{/if}></th>
            <th width="14%"><a href="javascript:setOrderBy('order_num <{if $activeField eq 'order_num'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.order_num.text}></a><{if $ordField eq "order_num desc"}>↑<{/if}><{if $ordField eq "order_num asc"}>↓<{/if}></th>
            <th width="10%">产品数</th>
            <th width="12%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td class="td_center"><input type="checkbox" name="select_id[]" value="<{$list[loop].category_id}>"></td>
            <td><{$list[loop].category_name}></td>
            <td><{$list[loop].order_num}></td>
            <td><{$list[loop].video_num}></td>
            <td class="td_center">
            	<a href="?mode=SUBEDIT&category_id=<{$list[loop].category_id}>&parent_id=<{$form.parent_id}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=SUBDEL&category_id=<{$list[loop].category_id}>&parent_id=<{$form.parent_id}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
            </td>
          </tr>
          <{/section}>
        </table>
        <div class="pagination clearFix">
          <div class="bulk-actions">
          	<a class="button" href="javascript:void(0);" onclick="mySubmit('ADDSUB');return false;"><{$smarty.const._ADD}></a>
          	<a class="button" href="javascript:void(0);" onclick="listEdit('SUBEDIT');return false;"><{$smarty.const._EDIT}></a>
            <a class="button" href="javascript:void(0);" onclick="listDel('SUBDEL');return false;"><{$smarty.const._DELETE}></a>
            <a class="button" href="javascript:void(0);" onclick="mySubmit('PAGELIST');return false;"><{$smarty.const._BACK}></a>
          </div>
          <{$pageList|smarty:nodefaults}>
        </div>
        <{else}>
      	<{include file="err_no_data.tpl"}>
        <div class="pagination clearFix">
          <div class="bulk-actions">
          	<a class="button" href="javascript:void(0);" onclick="mySubmit('ADDSUB');return false;"><{$smarty.const._ADD}></a>
          	<a class="button" href="javascript:void(0);" onclick="mySubmit('PAGELIST');return false;"><{$smarty.const._BACK}></a>
          </div>
        </div>
        <{/if}>
      </div>
    </div>
</form>
</div>