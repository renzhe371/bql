<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="djs.php" method="POST" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="djs_id" name="djs_id" value="<{$edit.djs_id}>">
    <div id="conts">
      <h2>信息<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
	    
              <label><{$table.djs_title.text}><{if $table.djs_title.isNull ne ''}>&nbsp;<{/if}>&nbsp;<font color="#FF0000">大记事年月 例：2013年06月 同一个月内的不需再添写，调一下顺序方可</font></label>
              <input class="medium-input" type="text" id="djs_title" name="djs_title" maxlength="<{$table.djs_title.maxlength}>" value="<{$edit.djs_title}>">
              <{if $error.djs_title ne ''}><span class="error"><{$error.djs_title}></span><{/if}>
            </li>

	    <li>
              <label><{$table.djs_content.text}><{if $table.djs_content.isNull ne ''}>&nbsp;<font color="#FF0000">大记事内容 文字内容不可重复及相同</font><{/if}></label>
              <input class="medium-input" type="text" id="djs_content" name="djs_content" maxlength="<{$table.djs_content.maxlength}>" value="<{$edit.djs_content}>">
              <{if $error.djs_content ne ''}><span class="error"><{$error.djs_content}></span><{/if}>
            </li>

            <li>
              <label><{$table.category_id.text}><{if $table.category_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="category_id" id="category_id" style="width:auot;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getDjsCategory selected=$edit.category_id }>				
			  </select>
			  <{if $error.category_id ne ''}><span class="error"><{$error.category_id}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
	     <li>
              <label><{$table.image_path.text}>&nbsp;<font color="#FF0000">*(最佳像素比例:宽为482px)</font></label>
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
              <input class="button" type="button" value="保存" onclick="mySubmit('SAVE');" />
              <input class="button" type="button" value="返回" onclick="mySubmit('PAGELIST');" />
            </li>
         </ul>
        </div>
      </div>
    </div>
</form>
</div>
