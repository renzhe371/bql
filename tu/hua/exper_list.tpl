<div id="main_body">
<form id="myform" name="myform" action="experlist.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" name="p" value="">
<input type="hidden" name="ordField" id="ordField" value="">
    <div id="conts">
      <h2>体验店列表</h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="4%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
            <th width="18%"><a href="javascript:setOrderBy('name <{if $activeField eq 'name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.name.text}></a><{if $ordField eq "name desc"}>↑<{/if}><{if $ordField eq "name asc"}>↓<{/if}></th>
            <th width="18%"><a href="javascript:setOrderBy('address <{if $activeField eq 'address'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.address.text}></a><{if $ordField eq "address desc"}>↑<{/if}><{if $ordField eq "address asc"}>↓<{/if}></th>
            <th width="10%"><a href="javascript:setOrderBy('postcode <{if $activeField eq 'postcode'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.postcode.text}></a><{if $ordField eq "postcode desc"}>↑<{/if}><{if $ordField eq "postcode asc"}>↓<{/if}></th>
            <th width="14%"><a href="javascript:setOrderBy('category_id <{if $activeField eq 'category_id'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.category_id.text}></a><{if $ordField eq "category_id desc"}>↑<{/if}><{if $ordField eq "category_id asc"}>↓<{/if}></th>
			<th width="18%"><a href="javascript:setOrderBy('image_path <{if $activeField eq 'image_path'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.image_path.text}></a><{if $ordField eq "image_path desc"}>↑<{/if}><{if $ordField eq "image_path asc"}>↓<{/if}></th>
            <th width="6%"><a href="javascript:setOrderBy('order_num <{if $activeField eq 'order_num'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.order_num.text}></a><{if $ordField eq "order_num desc"}>↑<{/if}><{if $ordField eq "order_num asc"}>↓<{/if}></th>
            <th width="12%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td class="td_center"><input type="checkbox" name="select_id[]" value="<{$list[loop].id}>"></td>
            <td><{$list[loop].name}></td>
			<td><{$list[loop].address}></td>
			<td><{$list[loop].postcode}></td>
          	<td class="td_left"><{if $list[loop].category_id eq '' or $list[loop].category_id eq '0'}>未设置<{else}><{$list[loop].category_id|getExperCategory}><{/if}></td>
			<td><{$list[loop].image_path}></td>
            <td><{$list[loop].order_num}></td>
            <td class="td_center">
            	<a href="?mode=EDIT&id=<{$list[loop].id}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=DEL&id=<{$list[loop].id}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
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