function getmsg(msg)
{
	var errArr = {
		'search_str_null'		:	'Please enter a search of characters!\n',
		'submit_success'		:	'Submit success!\n',
		'submit_failure'		:	'Submit failure!\n'
	};
	return errArr[msg];
}
