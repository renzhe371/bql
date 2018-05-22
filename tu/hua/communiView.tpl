<div id="main_body">
<form id="myform" name="myform" action="communication.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
    <div id="conts">
      <h2>查看话题</h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
	   <li>
              <label><{$table.creat_time.text}></label>
              <{$view.creat_time}>
            </li>
            <li>
              <label><{$table.nick_name.text}></label>
              <{$view.nick_name}>
            </li>
            <li>
              <label><{$table.tel.text}></label>
              <{$view.tel}>
            </li>
            <li>
              <label><{$table.content.text}></label>
              <{$view.content}>
            </li>
            <li>
              <label><{$table.status.text}></label>
              <{if $view.status eq '1'}>已回复<{else}>末回复<{/if}>
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