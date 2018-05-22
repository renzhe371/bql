<link href="fckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fckeditor/ckeditor.js"></script>
<script src="fckeditor/_samples/sample.js" type="text/javascript"></script>
<div id="main_body">
<form id="myform" name="myform" action="job.php" method="POST" enctype="multipart/form-data">
<input type="hidden" id="mode" name="mode" value="">
<input type="hidden" id="add_flg" name="add_flg" value="<{$edit.add_flg}>">
<input type="hidden" id="job_id" name="job_id" value="<{$edit.job_id}>">
    <div id="conts">
      <h2>信息<{if $edit.add_flg eq '1'}>添加<{else}>编辑<{/if}></h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
            <li>
              <label><{$table.job_jobs.text}><{if $table.job_jobs.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="job_jobs" name="job_jobs" maxlength="<{$table.job_jobs.maxlength}>" value="<{$edit.job_jobs}>">
              <{if $error.job_jobs ne ''}><span class="error"><{$error.job_jobs}></span><{/if}>
            </li>
             <li>
              <label><{$table.category_id.text}><{if $table.category_id.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <select name="category_id" id="category_id" style="width:auot;">
				<{html_options options=""|get_default_option }>
				<{html_options options=""|getJobCategory selected=$edit.category_id }>				
			  </select>
			  <{if $error.category_id ne ''}><span class="error"><{$error.category_id}></span><{/if}>
            </li>
	    <li>
              <label><{$table.place.text}><{if $table.place.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="place" name="place" maxlength="<{$table.place.maxlength}>" value="<{$edit.place}>">
              <{if $error.place ne ''}><span class="error"><{$error.place}></span><{/if}>
            </li>
	     <li>
              <label><{$table.treatment.text}><{if $table.treatment.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="treatment" name="treatment" maxlength="<{$table.treatment.maxlength}>" value="<{$edit.treatment}>">
              <{if $error.treatment ne ''}><span class="error"><{$error.treatment}></span><{/if}>
            </li>
	     <li>
              <label><{$table.gender.text}><{if $table.gender.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="gender" name="gender" maxlength="<{$table.gender.maxlength}>" value="<{$edit.gender}>">
              <{if $error.gender ne ''}><span class="error"><{$error.gender}></span><{/if}>
            </li>
	     <li>
              <label><{$table.age.text}><{if $table.age.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="age" name="age" maxlength="<{$table.age.maxlength}>" value="<{$edit.age}>">
              <{if $error.age ne ''}><span class="error"><{$error.age}></span><{/if}>
            </li>
	      <li>
              <label><{$table.professional.text}><{if $table.professional.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="professional" name="professional" maxlength="<{$table.professional.maxlength}>" value="<{$edit.professional}>">
              <{if $error.professional ne ''}><span class="error"><{$error.professional}></span><{/if}>
            </li>
	      <li>
              <label><{$table.schooling.text}><{if $table.schooling.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="schooling" name="schooling" maxlength="<{$table.schooling.maxlength}>" value="<{$edit.schooling}>">
              <{if $error.schooling ne ''}><span class="error"><{$error.schooling}></span><{/if}>
            </li>
	     <li>
              <label><{$table.number.text}><{if $table.number.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="number" name="number" maxlength="<{$table.number.maxlength}>" value="<{$edit.number}>">
              <{if $error.number ne ''}><span class="error"><{$error.number}></span><{/if}>
            </li>
	     <li>
              <label><{$table.linit.text}><{if $table.linit.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <input class="medium-input" type="text" id="linit" name="linit" maxlength="<{$table.linit.maxlength}>" value="<{$edit.linit}>">
              <{if $error.linit ne ''}><span class="error"><{$error.linit}></span><{/if}>
            </li>

            <li>
              <label><{$table.order_num.text}><{if $table.order_num.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}><font color="#FF0000">(数值越大，排序级别越高)</font></label>
              <input class="small-input" type="text" id="order_num" name="order_num" maxlength="<{$table.order_num.maxlength}>" value="<{$edit.order_num|default:'0'}>" size="5" style="ime-mode: disabled;">
              <{if $error.order_num ne ''}><span class="error"><{$error.order_num}></span><{/if}>
            </li>
	    
            <li>
              <label><{$table.title.text}><{if $table.title.isNull ne ''}>&nbsp;<font color="#FF0000">*</font><{/if}></label>
              <textarea class="ckeditor" id="title" name="title"><{$edit.title}></textarea>
              <{if $error.title ne ''}><div class="error"><{$error.title}></div><{/if}>
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
