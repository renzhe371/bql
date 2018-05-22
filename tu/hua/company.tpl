<div id="main_body">
<form id="myform" name="myform" action="company.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="admin_id" name="admin_id" value="<{$edit.admin_id}>">
    <div id="conts">
      <h2>修改基本信息</h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
        	<{if $msg ne ''}>
            <li>
              <div style="color:#f00"><{$msg}></div>
            </li>
            <{/if}>
        	<li>
              <label><{$table.company_name.text}><{if $table.company_name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="company_name" name="company_name" maxlength="<{$table.company_name.maxlength}>" value="<{$edit.company_name}>">
              <{if $error.company_name ne ''}><span class="error"><{$error.company_name}></span><{/if}>
            </li>
            <li>
              <label><{$table.keywords.text}><{if $table.keywords.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="keywords" name="keywords" maxlength="<{$table.keywords.maxlength}>" value="<{$edit.keywords}>">
              <{if $error.keywords ne ''}><span class="error"><{$error.keywords}></span><{/if}>
            </li>
            <li>
              <label><{$table.description.text}><{if $table.description.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="description" name="description" maxlength="<{$table.description.maxlength}>" value="<{$edit.description}>">
              <{if $error.description ne ''}><span class="error"><{$error.description}></span><{/if}>
            </li>
            <li>
              <label><{$table.title.text}><{if $table.title.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="title" name="title" maxlength="<{$table.title.maxlength}>" value="<{$edit.title}>">
              <{if $error.title ne ''}><span class="error"><{$error.title}></span><{/if}>
            </li>
            <li>
              <input class="button" type="button" value="保存" onclick="mySubmit('SAVE');" />
            </li>
         </ul>
        </div>
      </div>
    </div>
</form>
</div>