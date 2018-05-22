<div id="main_body">
<form id="myform" name="myform" action="corplist.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="" />
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>" />
<input type="hidden" id="corp_id" name="corp_id" value="<{$edit.corp_id}>" /> 
    <div id="conts">
      <h2>公司<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.corp_name.text}><{if $table.corp_name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="corp_name" name="corp_name" maxlength="<{$table.corp_name.maxlength}>" value="<{$edit.corp_name}>" />
              <{if $error.corp_name ne ''}><span class="error"><{$error.corp_name}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
			<li>
              <label><{$table.corp_logo.text}><font color="#FF0000">*(最佳像素比例:112*33)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload" name="img_upload" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.corp_logo ne ''}><div class="error"><{$error.corp_logo}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="corp_logo" name="corp_logo" value="<{$edit.corp_logo}>">
		              <{if $edit.corp_logo ne ''}><a href="<{$edit.corp_logo}>" target="_blank"><img src="<{$edit.corp_logo}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr.width}>" height="<{$edit.sizeArr.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
            <li>
              <input class="button" type="button" value="保存" onclick="mySubmit('SAVE');" />
              <input class="button" type="button" value="返回" onclick="mySubmit('PAGELIST');" />
            </li>
         </ul>
        </div>
      </div>
    </div>
</form>
</div>