<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="customerlist.php" method="post">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="id" name="id" value="<{$edit.id}>">
    <div id="conts">
      <h2>说明<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.name.text}><{if $table.name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="name" name="name" maxlength="<{$table.name.maxlength}>" value="<{$edit.name}>" >
              <{if $error.name ne ''}><span class="error"><{$error.name}></span><{/if}>
            </li>
            <li>
              <label><{$table.category_id.text}><{if $table.category_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="category_id" id="category_id" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getCorpCategory selected=$edit.category_id }>				
			  </select>
			  <{if $error.category_id ne ''}><span class="error"><{$error.category_id}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
            <li>
              <label><{$table.content.text}>&nbsp;<font color="#FF0000">*(说明详情)</font></label>
              <textarea class="ckeditor" id="content" name="content"><{$edit.content}></textarea>
              <{if $error.content ne ''}><div class="error"><{$error.content}></div><{/if}>
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
    CKEDITOR.replace( 'content', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });

</script>