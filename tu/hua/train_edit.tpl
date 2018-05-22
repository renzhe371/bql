<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="trainlist.php" method="post">
<input type="hidden" id="mode" name="mode" value="" />
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>" />
<input type="hidden" id="train_id" name="train_id" value="<{$edit.train_id}>" /> 
    <div id="conts">
      <h2>培训<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.train_corp.text}><{if $table.train_corp.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="train_corp" name="train_corp" maxlength="<{$table.train_corp.maxlength}>" value="<{$edit.train_corp}>" />
              <{if $error.train_corp ne ''}><span class="error"><{$error.train_corp}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
            <li>
              <label><{$table.train_content.text}><{if $table.train_content.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <textarea class="ckeditor" id="train_content" name="train_content"><{$edit.train_content}></textarea>
              <{if $error.train_content ne ''}><div class="error"><{$error.train_content}></div><{/if}>
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
<script type="text/javascript">

    // 启用 CKEitor 的上传功能，使用了 CKFinder 插件

    CKEDITOR.replace( 'train_content', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });
</script>