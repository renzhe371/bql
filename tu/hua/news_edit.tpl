<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="news.php" method="POST" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="news_id" name="news_id" value="<{$edit.news_id}>">
    <div id="conts">
      <h2>信息<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.news_title.text}><{if $table.news_title.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="news_title" name="news_title" maxlength="<{$table.news_title.maxlength}>" value="<{$edit.news_title}>">
              <{if $error.news_title ne ''}><span class="error"><{$error.news_title}></span><{/if}>
            </li>
			<li>
              <label><{$table.news_title2.text}></label>
              <input class="medium-input" type="text" id="news_title2" name="news_title2" maxlength="<{$table.news_title2.maxlength}>" value="<{$edit.news_title2}>">
              <{if $error.news_title2 ne ''}><span class="error"><{$error.news_title2}></span><{/if}>
            </li>
            <li>
              <label><{$table.category_id.text}><{if $table.category_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="category_id" id="category_id" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getNewsCategory selected=$edit.category_id }>				
			  </select>
			  <{if $error.category_id ne ''}><span class="error"><{$error.category_id}></span><{/if}>
            </li>
			<li>
              <label><{$table.case_status.text}><font color="#FF0000">(默认为0，显示为1)</font></label>
              <input class="medium-input" type="text" id="case_status" name="case_status" maxlength="<{$table.case_status.maxlength}>" value="<{$edit.case_status|default:'0'}>">
              <{if $error.case_status ne ''}><span class="error"><{$error.case_status}></span><{/if}>
            </li>
            <li>
              <label><{$table.case_corp.text}></label>
              <select name="case_corp" id="case_corp" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getCorpCategory selected=$edit.case_corp }>				
			  </select>
			  <{if $error.case_corp ne ''}><span class="error"><{$error.case_corp}></span><{/if}>
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
              <label><{$table.image_path.text}>&nbsp;<font color="#FF0000">*(最佳像素比例:398×280)企业新闻和行业新闻必须上传图片</font></label>
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
              <label><{$table.news_ms.text}><{if $table.news_ms.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <textarea class="ckeditor" id="news_ms" name="news_ms"><{$edit.news_ms}></textarea>
              <{if $error.news_ms ne ''}><div class="error"><{$error.news_ms}></div><{/if}>
            </li>
            <li>
              <label><{$table.news_content.text}><{if $table.news_content.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <textarea class="ckeditor" id="news_content" name="news_content"><{$edit.news_content}></textarea>
              <{if $error.news_content ne ''}><div class="error"><{$error.news_content}></div><{/if}>
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
     CKEDITOR.replace( 'news_ms', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });

    CKEDITOR.replace( 'news_content', {

        filebrowserBrowseUrl        : 'ckfinder/ckfinder.html',

        filebrowserImageBrowseUrl   : 'ckfinder/ckfinder.html?Type=Images',

        filebrowserFlashBrowseUrl   : 'ckfinder/ckfinder.html?Type=Flash',

        filebrowserUploadUrl        : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

        filebrowserImageUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

        filebrowserFlashUploadUrl   : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

    });

</script>

 
