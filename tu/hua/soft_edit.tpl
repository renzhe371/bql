<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="softlist.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="soft_id" name="soft_id" value="<{$edit.soft_id}>">
    <div id="conts">
      <h2>软件<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.soft_name.text}><{if $table.soft_name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="soft_name" name="soft_name" maxlength="<{$table.soft_name.maxlength}>" value="<{$edit.soft_name}>" >
              <{if $error.soft_name ne ''}><span class="error"><{$error.soft_name}></span><{/if}>
            </li>
            <li>
              <label><{$table.soft_cid.text}><{if $table.soft_cid.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="soft_cid" id="soft_cid" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getSoftCategory selected=$edit.soft_cid }>				
			  </select>
			  <{if $error.soft_cid ne ''}><span class="error"><{$error.soft_cid}></span><{/if}>
            </li>
			
            <li>
              <label><{$table.create_time.text}><{if $table.create_time.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="create_time"  onfocus="WdatePicker({dateFmt:'yyyy-M-d H:mm:ss'})" name="create_time" maxlength="<{$table.create_time.maxlength}>" value="<{$edit.create_time}>" >
              <{if $error.create_time ne ''}><span class="error"><{$error.create_time}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
			<li>
              <label><{$table.soft_url.text}></label>
              	<input type="file" id="pdf_upload" name="pdf_upload" /><br>(格式:pdf,zip)
				<input class="small-input" type="text" id="soft_url" name="soft_url" maxlength="<{$table.soft_url.maxlength}>" value="<{$edit.soft_url}>"> <br>(在此输入连接)
				<{if $error.soft_url ne ''}><div class="error"><{$error.soft_url}></div><{else}><{/if}>
            </li>
            <li>
              <label><{$table.soft_sys.text}><{if $table.soft_sys.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(软件支持系统)</font></label>
              <input class="small-input" type="text" id="soft_sys" name="soft_sys" maxlength="<{$table.soft_sys.maxlength}>" value="<{$edit.soft_sys}>" size="5" style="ime-mode: disabled;">
              <{if $error.soft_sys ne ''}><span class="error"><{$error.soft_sys}></span><{/if}>
            </li>
            <li>
              <label><{$table.soft_size.text}><{if $table.soft_size.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(软件大小)</font></label>
              <input class="small-input" type="text" id="soft_size" name="soft_size" maxlength="<{$table.soft_size.maxlength}>" value="<{$edit.soft_size}>" size="5" style="ime-mode: disabled;">
              <{if $error.soft_size ne ''}><span class="error"><{$error.soft_size}></span><{/if}>
            </li>
            <li>
              <label><{$table.soft_img.text}><font color="#FF0000">*(最佳像素比例:200×200)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload" name="img_upload" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.soft_img ne ''}><div class="error"><{$error.soft_img}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="soft_img" name="soft_img" value="<{$edit.soft_img}>">
		              <{if $edit.soft_img ne ''}><a href="<{$edit.soft_img}>" target="_blank"><img src="<{$edit.soft_img}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr.width}>" height="<{$edit.sizeArr.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
            <li>
              <label><{$table.description.text}>&nbsp;<font color="#FF0000">*(软件描述)</font></label>
              <textarea class="ckeditor" id="description" name="description"><{$edit.description}></textarea>
              <{if $error.description ne ''}><div class="error"><{$error.description}></div><{/if}>
            </li>
            <li>
              <label><{$table.content.text}>&nbsp;<font color="#FF0000">*(软件详情)</font></label>
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
	
	CKEDITOR.replace( 'description', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });

    CKEDITOR.replace( 'content', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });

</script>