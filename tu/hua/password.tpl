<div id="main_body">
<form id="myform" name="myform" action="password.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="admin_id" name="admin_id" value="<{$edit.admin_id}>">
    <div id="conts">
      <h2>修改登录密码</h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label>管理员名称</label>
              <{$edit.admin_name}><input type="hidden" id="admin_name" name="admin_name" value="<{$edit.admin_name}>">
            </li>
            <li>
              <label>旧密码&nbsp;</label>
              ******
            </li>
            <li>
              <label>新密码&nbsp;<font color="#FF0000">*</font></label>
              <input class="small-input" type="password" id="admin_password" name="admin_password" maxlength="100" value="<{$edit.admin_password}>" size="20" style="ime-mode: disabled;" />
              <{if $error.admin_password ne ''}><span class="error"><{$error.admin_password}></span><{/if}>
            </li>
           <li>
              <label>密码确认&nbsp;<font color="#FF0000">*</font></label>
              <input class="small-input" type="password" id="admin_password_confirm" name="admin_password_confirm" maxlength="100" value="<{$edit.admin_password_confirm}>" size="20" style="ime-mode: disabled;" />
              <{if $error.admin_password_confirm ne ''}><span class="error"><{$error.admin_password_confirm}></span><{/if}>
            </li>
            <{if $msg ne ''}>
            <li>
              <div style="color:#f00"><{$msg}></div>
            </li>
            <{/if}>
            <li>
              <input class="button" type="button" value="保存" onclick="mySubmit('SAVE');" />
            </li>
         </ul>
        </div>
      </div>
    </div>
</form>
</div>