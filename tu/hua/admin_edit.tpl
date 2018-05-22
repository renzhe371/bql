<div id="main_body">
<form id="myform" name="myform" action="admin.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="admin_id" name="admin_id" value="<{$edit.admin_id}>">
    <div id="conts">
      <h2>管理员<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.admin_name.text}><{if $table.admin_name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="admin_name" name="admin_name" maxlength="<{$table.admin_name.maxlength}>" value="<{$edit.admin_name}>" />
              <{if $error.admin_name ne ''}><span class="error"><{$error.admin_name}></span><{/if}>
            </li>
            <{if $edit.add_flg eq '1'}>
            <li>
              <label><{$table.admin_password.text}><{if $table.admin_password.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="password" id="admin_password" name="admin_password" maxlength="<{$table.admin_password.maxlength}>" value="<{$edit.admin_password}>" style="ime-mode: disabled;" />
              <{if $error.admin_password ne ''}><span class="error"><{$error.admin_password}></span><{/if}>
            </li>
            <li>
              <label>密码确认&nbsp;<font color="#FF0000">*</font></label>
              <input class="small-input" type="password" id="admin_password_confirm" name="admin_password_confirm" maxlength="<{$table.admin_password.maxlength}>" value="<{$edit.admin_password_confirm}>" style="ime-mode: disabled;" />
              <{if $error.admin_password_confirm ne ''}><span class="error"><{$error.admin_password_confirm}></span><{/if}>
            </li>
            <{else}>
            <li>
              <label>旧密码&nbsp;</label>
              ******<input type="hidden" id="admin_password" name="admin_password" value="<{$edit.admin_password}>">
            </li>
            <li>
              <label>新密码&nbsp;<font color="#FF0000">*</font></label>
              <input class="small-input" type="password" id="admin_password_new" name="admin_password_new" maxlength="<{$table.admin_password.maxlength}>" value="<{$edit.admin_password_new}>" style="ime-mode: disabled;" />
              <{if $error.admin_password_new ne ''}><span class="error"><{$error.admin_password_new}></span><{/if}>
            </li>
           <li>
              <label>密码确认&nbsp;<font color="#FF0000">*</font></label>
              <input class="small-input" type="password" id="admin_password_confirm" name="admin_password_confirm" maxlength="<{$table.admin_password.maxlength}>" value="<{$edit.admin_password_confirm}>" style="ime-mode: disabled;" />
              <{if $error.admin_password_confirm ne ''}><span class="error"><{$error.admin_password_confirm}></span><{/if}>
            </li>
            <{/if}>
            <li>
               <label><{$table.permission.text}><{if $table.permission.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
               <select name="permission" id="permission">
                    <{html_options options=""|get_default_option }>
                    <{html_options options=""|getPermission selected=$edit.permission }>				
               </select>
               <{if $error.permission ne ''}><span class="error"><{$error.permission}></span><{/if}>
            </li>
            <li>
              <input class="button" type="button" value="保存" onclick="mySubmit('SAVE');" />
              <input class="button" type="button" value="返回" onclick="mySubmit('INDEX');" />
            </li>
         </ul>
        
        </div>
      </div>
    </div>
</form>
</div>