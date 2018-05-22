<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="corp_category.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="category_id" name="category_id" value="<{$edit.category_id}>">
    <div id="conts">
      <h2>信息<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.category_name.text}><{if $table.category_name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="category_name" name="category_name" maxlength="<{$table.category_name.maxlength}>" value="<{$edit.category_name}>">
              <{if $error.category_name ne ''}><span class="error"><{$error.category_name}></span><{/if}>
            </li>
            <li>
              <label><{$table.parent_id.text}><{if $table.parent_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="parent_id" id="parent_id" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getCorpCategory selected=$edit.parent_id }>				
			  </select>
			  <{if $error.parent_id ne ''}><span class="error"><{$error.parent_id}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
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