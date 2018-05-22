<div id="main_body">
<form id="myform" name="myform" action="communication.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" name="p" value="">
<input type="hidden" name="status" id="status" value="<{$form.status}>">
<input type="hidden" name="ordField" id="ordField" value="">
    <div id="conts">
      <h2>直播评论列表</h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="5%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
            <th width="15%"><a href="javascript:setOrderBy('nick_name <{if $activeField eq 'nick_name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.nick_name.text}></a><{if $ordField eq "nick_name desc"}>↑<{/if}><{if $ordField eq "nick_name asc"}>↓<{/if}></th>
			<th width="15%"><a href="javascript:setOrderBy('category_id <{if $activeField eq 'category_id'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.category_id.text}></a><{if $ordField eq "category_id desc"}>↑<{/if}><{if $ordField eq "category_id asc"}>↓<{/if}></th>
			<th width="20%"><a href="javascript:setOrderBy('content <{if $activeField eq 'content'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.content.text}></a><{if $ordField eq "content desc"}>↑<{/if}><{if $ordField eq "content asc"}>↓<{/if}></th>
            <th width="10%"><a href="javascript:setOrderBy('status <{if $activeField eq 'status'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.status.text}></a><{if $ordField eq "status desc"}>↑<{/if}><{if $ordField eq "status asc"}>↓<{/if}></th>
            <th width="20%"><a href="javascript:setOrderBy('creat_time <{if $activeField eq 'creat_time'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.creat_time.text}></a><{if $ordField eq "creat_time desc"}>↑<{/if}><{if $ordField eq "creat_time asc"}>↓<{/if}></th>
            <th width="10%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td class="td_center"><input type="checkbox" name="select_id[]" value="<{$list[loop].pid}>"></td>
            <td><{$list[loop].nick_name}></td>
			<td><{$list[loop].category_id}></td>
            <td title="<{$list[loop].content|smarty:nodefaults}>"><{$list[loop].content|smarty:nodefaults|truncate:"28"}></td>
            <td class="td_center"><{if $list[loop].status eq '1'}>已审核<{else}><a href="?mode=SETREPLY&&pid=<{$list[loop].pid}>"  onclick="if(!setReplyConfirm()) return false;">未审核</a><{/if}></td>
            <td class="td_center"><{$list[loop].creat_time}></td>
            <td class="td_center">
            	<a href="?mode=VIEW&pid=<{$list[loop].pid}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=DEL&pid=<{$list[loop].pid}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
            </td>
          </tr>
          <{/section}>
        </table>
        <div class="pagination clearFix">
          <div class="bulk-actions">
          	<a class="button" href="javascript:void(0);" onclick="listView();return false;">查看</a>
            <a class="button" href="javascript:void(0);" onclick="listSetReply();return false;">设置审核状态</a>
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