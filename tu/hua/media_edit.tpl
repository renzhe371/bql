<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="market_media.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="media_id" name="media_id" value="<{$edit.media_id}>">
    <div id="conts">
      <h2>视频<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.media_title.text}><{if $table.media_title.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="media_title" name="media_title" maxlength="<{$table.media_title.maxlength}>" value="<{$edit.media_title}>" >
              <{if $error.media_title ne ''}><span class="error"><{$error.media_title}></span><{/if}>
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
              <label><{$table.cate_id.text}><{if $table.cate_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="cate_id" id="cate_id" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getMediaCategory selected=$edit.cate_id }>				
			  </select>
			  <{if $error.cate_id ne ''}><span class="error"><{$error.cate_id}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
            <li>
              <label><{$table.image_path.text}><font color="#FF0000">*(最佳像素比例:551*384)</font></label>
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
              <label><{$table.media_news.text}><{if $table.media_news.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input type="file" id="video_file" name="video_file" />
          	  <input type="hidden" id="media_news" name="media_news" value="<{$edit.media_news}>">&nbsp;&nbsp;<{$edit.media_news}><br>(格式:flv)
          	  <{if $error.media_news ne ''}><span class="error"><{$error.media_news}></span><{/if}>
            </li>
            <li>
              <label><{$table.media_news.text}><{if $table.media_news.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="media_news" name="media_news" maxlength="<{$table.media_news.maxlength}>" value="<{$edit.media_news}>"> <br>(上视频太大请用FTP上传后，在此输入连接。格式为:../upload/mp4/2013/bql_20140101111.mp4)
              <{if $error.media_news ne ''}><span class="error"><{$error.media_news}></span><{/if}>
            </li>
			<li>
              <label><{$table.media_mp4.text}><{if $table.media_mp4.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input type="file" id="video_file2" name="video_file2" />
          	  <input type="hidden" id="media_mp4" name="media_mp4" value="<{$edit.media_mp4}>">&nbsp;&nbsp;<{$edit.media_mp4}><br>(格式:mp4)
          	  <{if $error.media_mp4 ne ''}><span class="error"><{$error.media_mp4}></span><{/if}>
            </li>
            <li>
              <label><{$table.media_mp4.text}><{if $table.media_mp4.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="media_mp4" name="media_mp4" maxlength="<{$table.media_mp4.maxlength}>" value="<{$edit.media_mp4}>"> <br>(上视频太大请用FTP上传后，在此输入连接。格式为:../upload/mp4/2013/bql_20140101111.mp4)
              <{if $error.media_mp4 ne ''}><span class="error"><{$error.media_mp4}></span><{/if}>
            </li>
            <li>
              <label><{$table.description.text}>&nbsp;<font color="#FF0000">*(标题及简介)</font></label>
              <textarea class="ckeditor" id="description" name="description"><{$edit.description}></textarea>
              <{if $error.description ne ''}><div class="error"><{$error.description}></div><{/if}>
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

</script>