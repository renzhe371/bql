<div id="main_body">
<form id="myform" name="myform" action="experlist.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="" />
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>" />
<input type="hidden" id="id" name="id" value="<{$edit.id}>" /> 
    <div id="conts">
      <h2>公司<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.name.text}><{if $table.name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="name" name="name" maxlength="<{$table.name.maxlength}>" value="<{$edit.name}>" />
              <{if $error.name ne ''}><span class="error"><{$error.name}></span><{/if}>
            </li>
            <li>
              <label><{$table.address.text}><{if $table.address.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="address" name="address" maxlength="<{$table.address.maxlength}>" value="<{$edit.address}>" />
              <{if $error.address ne ''}><span class="error"><{$error.address}></span><{/if}>
            </li>
            <li>
              <label><{$table.c_name.text}><{if $table.c_name.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="c_name" name="c_name" maxlength="<{$table.c_name.maxlength}>" value="<{$edit.c_name}>" />
              <{if $error.c_name ne ''}><span class="error"><{$error.c_name}></span><{/if}>
            </li>
            <li>
              <label><{$table.c_phone.text}><{if $table.c_phone.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="c_phone" name="c_phone" maxlength="<{$table.c_phone.maxlength}>" value="<{$edit.c_phone}>" />
              <{if $error.c_phone ne ''}><span class="error"><{$error.c_phone}></span><{/if}>
            </li>
            <li>
              <label><{$table.c_name2.text}><{if $table.c_name2.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="c_name2" name="c_name2" maxlength="<{$table.c_name2.maxlength}>" value="<{$edit.c_name2}>" />
              <{if $error.c_name2 ne ''}><span class="error"><{$error.c_name2}></span><{/if}>
            </li>
            <li>
              <label><{$table.c_phone2.text}><{if $table.c_phone2.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="c_phone2" name="c_phone2" maxlength="<{$table.c_phone2.maxlength}>" value="<{$edit.c_phone2}>" />
              <{if $error.c_phone2 ne ''}><span class="error"><{$error.c_phone2}></span><{/if}>
            </li>
            <li>
              <label><{$table.postcode.text}><{if $table.postcode.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="small-input" type="text" id="postcode" name="postcode" maxlength="<{$table.postcode.maxlength}>" value="<{$edit.postcode}>" />
              <{if $error.postcode ne ''}><span class="error"><{$error.postcode}></span><{/if}>
            </li>
            <li>
              <label><{$table.jingw.text}>&nbsp;<font color="#FF0000">*(请用逗号隔开，如：113.9308,22.5174)</font></label>
              <input class="small-input" type="text" id="jingw" name="jingw" maxlength="<{$table.jingw.maxlength}>" value="<{$edit.jingw}>" />
              <{if $error.jingw ne ''}><span class="error"><{$error.jingw}></span><{/if}>
            </li>
            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
            <li>
              <label><{$table.category_id.text}><{if $table.category_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="category_id" id="category_id" style="width:auto;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getExperCategory selected=$edit.category_id }>				
			  </select>
			  <{if $error.category_id ne ''}><span class="error"><{$error.category_id}></span><{/if}>
            </li>
			<li>
              <label><{$table.image_path.text}><font color="#FF0000">*(最佳像素比例:284*200)</font></label>
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
              <label><{$table.img_path1.text}><font color="#FF0000">*(最佳像素比例:610*470)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload1" name="img_upload1" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.img_path1 ne ''}><div class="error"><{$error.img_path1}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="img_path1" name="img_path1" value="<{$edit.img_path1}>">
		              <{if $edit.img_path1 ne ''}><a href="<{$edit.img_path1}>" target="_blank"><img src="<{$edit.img_path1}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr1.width}>" height="<{$edit.sizeArr1.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
			<li>
              <label><{$table.img_path2.text}><font color="#FF0000">*(最佳像素比例:610*470)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload2" name="img_upload2" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.img_path2 ne ''}><div class="error"><{$error.img_path2}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="img_path2" name="img_path2" value="<{$edit.img_path2}>">
		              <{if $edit.img_path2 ne ''}><a href="<{$edit.img_path2}>" target="_blank"><img src="<{$edit.img_path2}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr1.width}>" height="<{$edit.sizeArr1.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
			<li>
              <label><{$table.img_path3.text}><font color="#FF0000">*(最佳像素比例:610*470)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload3" name="img_upload3" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.img_path3 ne ''}><div class="error"><{$error.img_path3}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="img_path3" name="img_path3" value="<{$edit.img_path3}>">
		              <{if $edit.img_path3 ne ''}><a href="<{$edit.img_path3}>" target="_blank"><img src="<{$edit.img_path3}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr1.width}>" height="<{$edit.sizeArr1.height}>" alt="" /></a>
					  <{else}>
					  暂无图片
					  <{/if}>
				</td>
              	</tr>
              </table>
            </li>
			<li>
              <label><{$table.img_path4.text}><font color="#FF0000">*(最佳像素比例:610*470)</font></label>
              <table style="border:0;">
              	<tr>
              	<td style="width:30%;vertical-align:middle;border:0;"><input type="file" id="img_upload4" name="img_upload4" /><br>(格式:jpg,jpeg,gif,png,bmp)<{if $error.img_path4 ne ''}><div class="error"><{$error.img_path4}></div><{/if}></td>
              	<td style="width:70%;vertical-align:middle;border:0;"><input type="hidden" id="img_path4" name="img_path4" value="<{$edit.img_path4}>">
		              <{if $edit.img_path4 ne ''}><a href="<{$edit.img_path4}>" target="_blank"><img src="<{$edit.img_path4}><{php}>echo '?'.date('YmdHis');<{/php}>" width="<{$edit.sizeArr1.width}>" height="<{$edit.sizeArr1.height}>" alt="" /></a>
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