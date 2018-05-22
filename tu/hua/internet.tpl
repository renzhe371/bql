<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="internet.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
    <div id="conts">
      <h2><{$table.internet.text}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <{if $msg ne ''}>
            <li>
              <div style="color:#f00"><{$msg}></div>
            </li>
            <{/if}>
            <li>
              <textarea class="ckeditor" id="internet" name="internet"><{$edit.internet}></textarea>
              <{if $error.internet ne ''}><div class="error"><{$error.internet}></div><{/if}>
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
<script type="text/javascript">

    // 启用 CKEitor 的上传功能，使用了 CKFinder 插件

    CKEDITOR.replace( 'internet', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });

</script>