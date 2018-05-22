<div id="main_body">
<form id="myform" name="myform" action="message.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" name="p" value="">
<input type="hidden" name="read_state" id="read_state" value="<{$form.read_state}>">
<input type="hidden" name="ordField" id="ordField" value="">
    <div id="conts">
      <h2>留言列表</h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="4%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
            <th width="15%"><a href="javascript:setOrderBy('name <{if $activeField eq 'name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.name.text}></a><{if $ordField eq "name desc"}>↑<{/if}><{if $ordField eq "name asc"}>↓<{/if}></th>
            <th width="31%"><a href="javascript:setOrderBy('company_name <{if $activeField eq 'company_name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.company_name.text}></a><{if $ordField eq "company_name desc"}>↑<{/if}><{if $ordField eq "company_name asc"}>↓<{/if}></th>
            <{if $form.read_state ne '1' }>
            <th width="15%"><a href="javascript:setOrderBy('create_time <{if $activeField eq 'create_time'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.create_time.text}></a><{if $ordField eq "create_time desc"}>↑<{/if}><{if $ordField eq "create_time asc"}>↓<{/if}></th>
            <{else}>
            <th width="15%"><a href="javascript:setOrderBy('reply_state <{if $activeField eq 'reply_state'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.reply_state.text}></a><{if $ordField eq "reply_state desc"}>↑<{/if}><{if $ordField eq "reply_state asc"}>↓<{/if}></th>
            <{/if}>
            <th width="10%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td class="td_center"><input type="checkbox" name="select_id[]" value="<{$list[loop].message_id}>"></td>
            <td><{$list[loop].name}></td>
            <td><{$list[loop].company_name}></td>
            <{if $form.read_state ne '1' }>
            <td class="td_center"><{$list[loop].create_time}></td>
            <{else}>
            <td class="td_center"><{if $list[loop].reply_state eq '1'}>已回复<{else}><a href="?mode=SETREPLY&&message_id=<{$list[loop].message_id}>"  onclick="if(!setReplyConfirm()) return false;">未回复</a><{/if}></td>
            <{/if}>
            <td class="td_center">
            	<a href="?mode=VIEW&message_id=<{$list[loop].message_id}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=DEL&message_id=<{$list[loop].message_id}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
            </td>
          </tr>
          <{/section}>
        </table>
        <div class="pagination clearFix">
          <div class="bulk-actions">
          	<a class="button" href="javascript:void(0);" onclick="listView();return false;">查看</a>
            <{if $form.read_state eq '1' }>
            <a class="button" href="javascript:void(0);" onclick="listSetReply();return false;">设置回复状态</a>
            <{/if}>
            <a class="button" href="javascript:void(0);" onclick="listDel();return false;">删除</a>
          </div>
          <{$pageList|smarty:nodefaults}>
        </div>
        <{else}>
      	<{include file="err_no_data.tpl"}>
        <{/if}>
      </div>
    </div>
</form>
</div>