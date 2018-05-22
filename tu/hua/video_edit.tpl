<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="video.php" method="POST" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="video_id" name="video_id" value="<{$edit.video_id}>">
    <div id="conts">
      <h2>信息<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.video_title.text}><{if $table.video_title.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="video_title" name="video_title" maxlength="<{$table.video_title.maxlength}>" value="<{$edit.video_title}>">
              <{if $error.video_title ne ''}><span class="error"><{$error.video_title}></span><{/if}>
            </li>
            <li>
              <label><{$table.category_id.text}><{if $table.category_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="category_id" id="category_id" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getVideoCategory selected=$edit.category_id }>				
			  </select>
			  <{if $error.category_id ne ''}><span class="error"><{$error.category_id}></span><{/if}>
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
              <label><{$table.image_path.text}>&nbsp;<font color="#FF0000">*(最佳像素比例:820*480)</font></label>
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
              <label><{$table.video_flv.text}><{if $table.video_flv.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input type="file" id="video_file" name="video_file" />
          	  <input type="hidden" id="video_flv" name="video_flv" value="<{$edit.video_flv}>">&nbsp;&nbsp;<{$edit.video_flv}><br>(格式:flv)
          	  <{if $error.video_flv ne ''}><span class="error"><{$error.video_flv}></span><{/if}>
            </li>
            <li>
              <label><{$table.video_flv.text}><{if $table.video_flv.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="video_flv" name="video_flv" maxlength="<{$table.video_flv.maxlength}>" value="<{$edit.video_flv}>"> <br>(上视频太大请用FTP上传后，在此输入连接。格式为:../upload/flv/bql_20140101111.flv)
              <{if $error.video_flv ne ''}><span class="error"><{$error.video_flv}></span><{/if}>
            </li>
			<li>
              <label><{$table.video_mp4.text}><{if $table.video_mp4.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input type="file" id="video_file2" name="video_file2" />
          	  <input type="hidden" id="video_mp4" name="video_mp4" value="<{$edit.video_mp4}>">&nbsp;&nbsp;<{$edit.video_mp4}><br>(格式:mp4)
          	  <{if $error.video_mp4 ne ''}><span class="error"><{$error.video_mp4}></span><{/if}>
            </li>
            <li>
              <label><{$table.video_mp4.text}><{if $table.video_mp4.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="video_mp4" name="video_mp4" maxlength="<{$table.video_mp4.maxlength}>" value="<{$edit.video_mp4}>"> <br>(上视频太大请用FTP上传后，在此输入连接。格式为:../upload/mp4/2013/bql_20140101111.mp4)
              <{if $error.video_mp4 ne ''}><span class="error"><{$error.video_mp4}></span><{/if}>
            </li>
            <li>
              <label><{$table.video_content.text}><{if $table.video_content.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <textarea class="ckeditor" id="video_content" name="video_content"><{$edit.video_content}></textarea>
              <{if $error.video_content ne ''}><div class="error"><{$error.video_content}></div><{/if}>
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

    CKEDITOR.replace( 'video_content', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });

</script>