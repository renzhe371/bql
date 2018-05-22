function getmsg(msg)
{
	var errArr = {
		'search_str_null'		:	'请输入要搜索的字符！\n',
		
		//contact
		'name_null'				:	'请输入您的姓名！\n',
		'title_null'			:	'请输入话题标题！\n',
		'content_null'			:	'请输入话题内容！\n',
		'company_name_null'		:	'请输入您的咨询或建议！\n',
		'address_null'			:	'请输入公司地址！\n',
		'tel_null'				:	'请输入您的电话号码！\n',
		'email_null'			:	'请输入您联系邮箱！\n',
		'fax_null'				:	'请输入您的传真号码！\n',
		'content_null'			:	'请输入详细需求描述！\n',
		'submit_failure'		:	'提交失败！\n',
		'submit_success'		:	'提交成功！感谢您的留言！\n',
		'no'					:	'提交失败！\n',
		'ok'					:	'提交成功！待审核！\n'
	};
	return errArr[msg];
}