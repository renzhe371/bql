<div id="main_body">
<form id="myform" name="myform" action="communiReply.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
    <div id="conts">
      <h2>查看回复</h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
	   <li>
              <label><{$table.r_creat_time.text}></label>
              <{$view.r_creat_time}>
            </li>
            <li>
              <label><{$table.r_nick_name.text}></label>
              <{$view.r_nick_name}>
            </li>
            <li>
              <label><{$table.r_email.text}></label>
              <{$view.r_email}>
            </li>
            <li>
              <label><{$table.r_content.text}></label>
              <{$view.r_content}>
            </li>
            <li>
              <label><{$table.r_status.text}></label>
              <{if $view.r_status eq '1'}>已回复<{else}>末回复<{/if}>
            </li>
            <li>
              <input class="button" type="button" value="返回" onclick="javascript:window.history.go(-1);" />
            </li>
         </ul>
        </div>
      </div>
    </div>
</form>
</div>