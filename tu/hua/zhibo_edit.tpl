<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="market_zhibo.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="zb_id" name="zb_id" value="<{$edit.zb_id}>">
    <div id="conts">
      <h2>专题<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.zb_title.text}><{if $table.zb_title.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="zb_title" name="zb_title" maxlength="<{$table.zb_title.maxlength}>" value="<{$edit.zb_title}>" >
              <{if $error.zb_title ne ''}><span class="error"><{$error.zb_title}></span><{/if}>
            </li>
			 <li>
              <label><{$table.zb_url.text}></label>
              <input class="medium-input" type="text" id="zb_url" name="zb_url" maxlength="<{$table.zb_url.maxlength}>" value="<{$edit.zb_url}>" >
              <{if $error.zb_url ne ''}><span class="error"><{$error.zb_url}></span><{/if}>
            </li>
			<li>
              <label><{$table.zb_status.text}><font color="#FF0000">*(2为直播前，1为直播中，默认0为直播后)</font></label>
              <input class="medium-input" type="text" id="zb_status" name="zb_status" maxlength="<{$table.zb_status.maxlength}>" value="<{$edit.zb_status}>" >
              <{if $error.zb_status ne ''}><span class="error"><{$error.zb_status}></span><{/if}>
            </li>
            <li>
              <label><{$table.category_id.text}><{if $table.category_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="category_id" id="category_id" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getSpecialCategory selected=$edit.category_id }>				
			  </select>
			  <{if $error.category_id ne ''}><span class="error"><{$error.category_id}></span><{/if}>
            </li>
            <li>
              <label><{$table.create_time.text}><{if $table.create_time.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="create_time"  onfocus="WdatePicker({dateFmt:'yyyy-M-d H:mm:ss'})" name="create_time" maxlength="<{$table.create_time.maxlength}>" value="<{$edit.create_time}>" >
              <{if $error.create_time ne ''}><span class="error"><{$error.create_time}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(观看直播网友数量)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
            <li>
              <label><{$table.image_path.text}><font color="#FF0000">*(最佳像素比例:1920×437)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload" name="img_upload" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.image_path ne ''}><div class="error"><{$error.image_path}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="image_path" name="image_path" value="<{$edit.image_path}>">
		              <{if $edit.image_path ne ''}><a href="<{$edit.image_path}>" target="_blank"><img src="<{$edit.image_path}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr.width}>" height="<{$edit.sizeArr.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
			<li>
              <label><{$table.image_path2.text}><font color="#FF0000">*(最佳像素比例:276*276)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;">
					<input type="file" id="img_upload2" name="img_upload2" /><br>(格式:jpg,jpeg,gif,png,bmp)
					<{if $error.image_path2 ne ''}><div class="error"><{$error.image_path2}></div><{/if}>
				</td>
              	<td style="width:70%;vertical-align:middle;border:0;">
				<input type="hidden" id="image_path2" name="image_path2" value="<{$edit.image_path2}>">
		              <{if $edit.image_path2 ne ''}><a href="<{$edit.image_path2}>" target="_blank"><img src="<{$edit.image_path2}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr2.width}>" height="<{$edit.sizeArr2.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
            <li>
              <label><{$table.image_path3.text}><font color="#FF0000">*(最佳像素比例:820*300)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;">
					<input type="file" id="img_upload3" name="img_upload3" /><br>(格式:jpg,jpeg,gif,png,bmp)
					<{if $error.image_path3 ne ''}><div class="error"><{$error.image_path3}></div><{/if}>
				</td>
              	<td style="width:70%;vertical-align:middle;border:0;">
				<input type="hidden" id="image_path3" name="image_path3" value="<{$edit.image_path3}>">
		              <{if $edit.image_path3 ne ''}><a href="<{$edit.image_path3}>" target="_blank"><img src="<{$edit.image_path3}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr3.width}>" height="<{$edit.sizeArr3.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
            <li>
              <label><{$table.content.text}>&nbsp;<font color="#FF0000">*(标题及简介)</font></label>
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