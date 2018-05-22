<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="market_zhibo_h5.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="img_id" name="img_id" value="<{$edit.img_id}>">
    <div id="conts">
      <h2>直播H5<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.img_id.text}><{if $table.img_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="img_id" name="img_id" maxlength="<{$table.img_id.maxlength}>" value="<{$edit.img_id}>" >
              <{if $error.img_id ne ''}><span class="error"><{$error.img_id}></span><{/if}>
            </li>
            <li>
                <label><{$table.img_title.text}></label>
                <input class="medium-input" type="text" id="img_title" name="img_title" maxlength="<{$table.img_title.maxlength}>" value="<{$edit.img_title}>" >
            </li>
            <li>
                <label><{$table.img_url.text}><{if $table.img_url.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
                <input class="medium-input" type="text" id="img_url" name="img_url" maxlength="<{$table.img_url.maxlength}>" value="<{$edit.img_url}>" >
                <{if $error.img_url ne ''}><span class="error"><{$error.img_url}></span><{/if}>
            </li>
            <li>
              <label><{$table.hid.text}><{if $table.hid.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="hid" id="hid" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getH5Category selected=$edit.hid }>				
			  </select>
			  <{if $error.hid ne ''}><span class="error"><{$error.hid}></span><{/if}>
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
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
            <li>
              <label><{$table.img_path.text}><font color="#FF0000">*(最佳像素比例:350×270)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload" name="img_upload" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.img_path ne ''}><div class="error"><{$error.img_path}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="img_path" name="img_path" value="<{$edit.img_path}>">
		              <{if $edit.img_path ne ''}><a href="<{$edit.img_path}>" target="_blank"><img src="<{$edit.img_path}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr.width}>" height="<{$edit.sizeArr.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
            <li>
              <label><{$table.image_path2.text}><font color="#FF0000">*(最佳像素比例:820×355)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload2" name="img_upload2" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.image_path2 ne ''}><div class="error"><{$error.image_path2}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="image_path2" name="image_path2" value="<{$edit.image_path2}>">
		              <{if $edit.image_path2 ne ''}><a href="<{$edit.image_path2}>" target="_blank"><img src="<{$edit.image_path2}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr2.width}>" height="<{$edit.sizeArr2.height}>" alt="" /></a>
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