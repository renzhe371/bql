<div id="main_body">
<form id="myform" name="myform" action="index.php" method="POST">
<input type="hidden" id="mode" name="mode" value="">
    <div id="conts">
      <h2>系统信息</h2>
      <div class="conts_content">
      	<div id="add">
        <table cellpadding="0" cellspacing="0" class="table_view">
            <tr>
              <th>PHP版本</th>
              <td class="td_index"><{$form.phpinfo}></td>
            </tr>
            <tr>
              <th>MYSQL版本</th>
              <td class="td_index"><{$form.mysqlinfo}></td>
            </tr>
            <tr>
              <th>服务器端信息</th>
              <td class="td_index"><{$form.osinfo}></td>
            </tr>
            <tr>
              <th>最大上传限制</th>
              <td class="td_index"><{$form.max_upload}></td>
            </tr>
            <tr>
              <th>最大执行时间</th>
              <td class="td_index"><{$form.max_ex_time}></td>
            </tr>
            <tr>
              <th>邮件支持模式</th>
              <td class="td_index"><{$form.sys_mail}></td>
            </tr>
            <tr>
              <th>Cookie测试</th>
              <td class="td_index"><{$form.ifcookie}></td>
            </tr>
            <tr>
              <th>服务器所在时间</th>
              <td class="td_index"><{$form.systemtime}></td>
            </tr>
            <tr>
              <th>开发者</th>
              <td class="td_index"><{$smarty.const._DEVELOPMENT_COMPANY}></td>
            </tr>
          </table>
         </div>
      </div>
    </div>
</form>
</div>