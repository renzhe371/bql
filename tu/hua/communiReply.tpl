<div id="main_body">
<form id="myform" name="myform" action="communiReply.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" name="p" value="">
<input type="hidden" name="r_status" id="r_status" value="<{$form.r_status}>">
<input type="hidden" name="ordField" id="ordField" value="">
    <div id="conts">
      <h2>回复列表</h2>
      <div class="conts_content">
      <{if $list|smarty:nodefaults|@count ne '0'}>
        <table cellpadding="0" cellspacing="0">
          <tr>
            <th width="5%"><input type="checkbox" id="checkall" name="checkall" onclick="check_all()"></th>
            <th width="15%"><a href="javascript:setOrderBy('r_nick_name <{if $activeField eq 'r_nick_name'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.r_nick_name.text}></a><{if $ordField eq "r_nick_name desc"}>↑<{/if}><{if $ordField eq "r_nick_name asc"}>↓<{/if}></th>
			<th width="20%"><a href="javascript:setOrderBy('r_email <{if $activeField eq 'r_email'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.r_email.text}></a><{if $ordField eq "r_email desc"}>↑<{/if}><{if $ordField eq "r_email asc"}>↓<{/if}></th>
            <th width="10%"><a href="javascript:setOrderBy('r_status <{if $activeField eq 'r_status'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.r_status.text}></a><{if $ordField eq "r_status desc"}>↑<{/if}><{if $ordField eq "r_status asc"}>↓<{/if}></th>
            <th width="20%"><a href="javascript:setOrderBy('r_creat_time <{if $activeField eq 'r_creat_time'}><{$ascdesc}><{else}><{$sortAD}><{/if}>');"><{$table.r_creat_time.text}></a><{if $ordField eq "r_creat_time desc"}>↑<{/if}><{if $ordField eq "r_creat_time asc"}>↓<{/if}></th>
            <th width="10%"><{$smarty.const._OPERATE}></th>
          </tr>
          <{section name="loop" loop=$list|smarty:nodefaults}>
          <tr <{if $smarty.section.loop.index%2 eq 1}>class="even"<{else}>class="odd"<{/if}>>
            <td class="td_center"><input type="checkbox" name="select_id[]" value="<{$list[loop].rid}>"></td>
            <td><{$list[loop].r_nick_name}></td>
            <td><{$list[loop].r_email}></td>
            <td class="td_center"><{if $list[loop].r_status eq '1'}>已审核<{else}><a href="?mode=SETREPLY&&rid=<{$list[loop].rid}>"  onclick="if(!setReplyConfirm()) return false;">未审核</a><{/if}></td>
            <td class="td_center"><{$list[loop].r_creat_time}></td>
            <td class="td_center">
            	<a href="?mode=VIEW&rid=<{$list[loop].rid}>"><img src="common/images/icons/pencil.png" alt="Edit" /></a> 
            	<a href="?mode=DEL&rid=<{$list[loop].rid}>" onclick="if(!delConfirm()) return false;"><img src="common/images/icons/cross.png" alt="Delete" /></a>
            </td>
          </tr>
          <{/section}>
        </table>
        <div class="pagination clearFix">
          <div class="bulk-actions">
          	<a class="button" href="javascript:void(0);" onclick="listView();return false;">查看</a>
            <a class="button" href="javascript:void(0);" onclick="listSetReply();return false;">设置回复状态</a>
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