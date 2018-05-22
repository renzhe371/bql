<div id="main_body">
<form id="myform" name="myform" action="message.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
    <div id="conts">
      <h2>查看留言</h2>
      <div class="conts_content">
      	<div id="add">
        <ul>
	   <li>
              <label><{$table.create_time.text}></label>
              <{$view.create_time}>
            </li>
            <li>
              <label><{$table.name.text}></label>
              <{$view.name}>
            </li>
            <li>
              <label><{$table.company_name.text}></label>
              <{$view.company_name}>
            </li>
            <li>
              <label><{$table.company_address.text}></label>
              <{$view.company_address}>
            </li>
            <li>
              <label><{$table.company_tel.text}></label>
              <{$view.company_tel}>
            </li>
            <li>
              <label><{$table.company_fax.text}></label>
              <{$view.company_fax}>
            </li>
            <li>
              <label><{$table.content.text}></label>
              <{$view.content}>
            </li>
            <li>
              <label><{$table.reply_state.text}></label>
              <{if $view.reply_state eq '1'}>已回复<{else}>末回复<{/if}>
            </li>
            <li>
              <input class="button" type="button" value="返回" onclick="mySubmit('PAGELIST');" />
            </li>
         </ul>
        </div>
      </div>
    </div>
</form>
</div>