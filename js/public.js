function mySubmit(str,action)
{
	var myform=document.getElementById("myform");
	var mode=document.getElementById("mode");
	if(myform&&mode)
	{
		if(action)
		{
			document.myform.action=action;
		}
		document.myform.mode.value=str;
		document.myform.submit();	
	}
}

function in_array(needle, haystack) {
	if(typeof needle == 'string' || typeof needle == 'number') {
	   for(var i in haystack) {
	    if(haystack[i] == needle) {
	      return true;
	    }
	   }
	}
	return false;
}

//page:当前页码(必需参数) action:提交PHP文件名(可选参数) hidname:同一画面存在多个LIST分页时,记录当前LIST的当前页码的HIDDEN名称(默认为p)(可选参数)
function go2page(page,action,hidname)
{
	if(typeof mygo2page != "undefined")
	{
		mygo2page(page,action,hidname);
		return;
	}
	if(action && action != "")
	{
		document.myform.action = action;
	}
	if(document.myform.currentpage)
		document.myform.currentpage.value = page;
	if(document.myform.currentpage_shop)
		document.myform.currentpage_shop.value = page;
	if(hidname && hidname != "")
		document.getElementsByName(hidname)[0].value = page;
	else
		document.myform.p.value = page;
	document.myform.mode.value = "PAGELIST";
	document.myform.submit();
}

function check_all()
{
	var obj=document.getElementsByName("select_id[]");
	var check_obj=document.myform.checkall;
	$A(obj).each(function(obj2){				
		obj2.checked = check_obj.checked;
	});
}

function listEdit(mode)
{
	var obj=document.getElementsByName("select_id[]");
	var select_num=0;
	if(obj&&obj.length>0)
	{
		for(i=0;i<obj.length;i++)
		{
			if(obj[i].checked==true)
			{
				select_num++;
			}
		}
	}
	if(select_num==0){
		alert("请选择一条要编辑的数据！");
		return false;
	}
	else if(select_num>1)
	{
		alert("只能选择一条要编辑的数据！");
		return false;
	}
	if(mode)
	{
		mySubmit(mode);	
	}
	else
	{
		mySubmit('EDIT');	
	}
}

function listView(mode)
{
	var obj=document.getElementsByName("select_id[]");
	var select_num=0;
	if(obj&&obj.length>0)
	{
		for(i=0;i<obj.length;i++)
		{
			if(obj[i].checked==true)
			{
				select_num++;
			}
		}
	}
	if(select_num==0){
		alert("请选择一条要查看的数据！");
		return false;
	}
	else if(select_num>1)
	{
		alert("只能选择一条要查看的数据！");
		return false;
	}
	if(mode)
	{
		mySubmit(mode);	
	}
	else
	{
		mySubmit('VIEW');	
	}
}

function listDel(mode)
{
	var obj=document.getElementsByName("select_id[]");
	var select_num=0;
	if(obj&&obj.length>0)
	{
		for(i=0;i<obj.length;i++)
		{
			if(obj[i].checked==true)
			{
				select_num++;
			}
		}
	}
	if(select_num==0){
		alert("请选择要删除的数据！");
		return false;
	}
	if(!delConfirm()) return false;
	if(mode)
	{
		mySubmit(mode);	
	}
	else
	{
		mySubmit('DEL');	
	}
}


function setOrderBy(ordfield,mode)
{
	var obj=document.getElementById("ordField");
	if(obj)
	{
		obj.value=ordfield;
		mySubmit('PAGELIST');
	}
}

function delConfirm()
{
	if(!confirm('数据一旦删除则无法恢复！确定要删除所选数据吗?'))
		return false;
	else
		return true;
}

function setReplyConfirm()
{
	if(!confirm('确定要标记为已回复?'))
		return false;
	else
		return true;
}

function listSetReply(mode)
{
	var obj=document.getElementsByName("select_id[]");
	var select_num=0;
	if(obj&&obj.length>0)
	{
		for(i=0;i<obj.length;i++)
		{
			if(obj[i].checked==true)
			{
				select_num++;
			}
		}
	}
	if(select_num==0){
		alert("请选择要设置的数据！");
		return false;
	}
	if(!setReplyConfirm()) return false;
	if(mode)
	{
		mySubmit(mode);	
	}
	else
	{
		mySubmit('SETREPLY');	
	}
}

function listAddSub()
{
	var obj=document.getElementsByName("select_id[]");
	var select_num=0;
	if(obj&&obj.length>0)
	{
		for(i=0;i<obj.length;i++)
		{
			if(obj[i].checked==true)
			{
				select_num++;
			}
		}
	}
	if(select_num==0){
		alert("请选择一条数据！");
		return false;
	}
	else if(select_num>1)
	{
		alert("只能选择一条数据！");
		return false;
	}
	
	mySubmit('LISTADDSUB');
}

function myReset()
{
	document.getElementById('loginName').value='';
	document.getElementById('loginPassword').value='';
	document.getElementById('loginName').focus();
	return false;
}


function LTrim(str)
{
    var i;
    for(i=0;i<str.length;i++)
    {
        if(str.charAt(i)!=" "&&str.charAt(i)!=" ")break;
    }
    str=str.substring(i,str.length);
    return str;
}
function RTrim(str)
{
    var i;
    for(i=str.length-1;i>=0;i--)
    {
        if(str.charAt(i)!=" "&&str.charAt(i)!=" ")break;
    }
    str=str.substring(0,i+1);
    return str;
}
function Trim(str)
{
    return LTrim(RTrim(str));
}

/*----header.js----*/
function searchAll(search_str)
{
	search_str=Trim(search_str);
	if(search_str)
	{
		url='searchAll.php?mode=SEARCH&search_str='+search_str;
		window.open(url,"_self");
	}
	else
	{
		alert(getmsg('search_str_null'));
		return false;
	}
}

function search(){
	
	if($("#keyword").val()==''){
	
		alert('请输入您要搜索的关键字');
		return false;
	}
}
/*------*/
//留言提交验证

function checkSave()
{
	if($("#name").val()=='')
	{
		alert(getmsg('name_null'));
		$("#name").focus();
		return false;
	}
	if($("#cname").val()=='')
	{
		alert(getmsg('company_name_null'));
		$("#cname").focus();
		return false;
	}
	if($("#address").val()=='')
	{
		alert(getmsg('address_null'));
		$("#address").focus();
		return false;
	}
	if($("#tel").val()==''){
		
		alert(getmsg('tel_null'));
		$("#tel").focus();
		return false;
	}
	var regexp=/^[1][3-8]\d{9}/;
	if(!regexp.test($("#tel").val())){
	
		alert('您输入的电话号码格式有误，请重新输入');
		$("#tel").focus();
		return false;
	}
	
	if($("#content").val()=='')
	{
		alert(getmsg('content_null'));
		$("#content").focus();
		return false;
	}
	submitSave();
}

$('#nick,#content,#tel,#randcode,#code').click(function(){
	 $(this).focus();
	
})

function submitSave()
{		
	$.ajax({
		
		type:"get",
		url:"message.php",
		data:'mode=SAVE'+'&name='+$("#name").val()+'&company_name='+$("#cname").val()+
			'&company_address='+$("#address").val()+'&company_tel='+$("#tel").val()+
			'&company_fax='+$("#fax").val()+'&content='+$("#content").val(),
		success: function(m){
			
			alert(getmsg('submit_success'));
			window.location.replace(location.href);
		},
		error:function(){
			
			alert(getmsg('submit_failure'));	
		}
	})	
}

//验证图形验证码，手机格式及获取短信验证码
var  yazhengNum;
function huoqu(){

	if(Trim($("#randcode").val())==''){
	
		alert('图片验证码不能为空!');
		return false;
	}
	var regexp=/^[1][3-8]\d{9}/;
	if(!regexp.test($("#tel").val())){
	
		alert('手机号码格式有误');
		$("#tel").focus();
		return false;
	}
	$.ajax({  
	
		type: "post",  
		url: 'findajax.php',  
		data: {tel:$("#tel").val(),randcode:$("#randcode").val()},
		success: function(msg){
		   
            var arr=msg.split('-');
			
			if(arr[1]){
			
				$(".live_code i").text(arr[1]);
		    }else{
			
				$(".live_code i").text(msg);
			}

		    if(msg.match('图形验证码错误')||msg.match('手机号码格式错误')){
			  
			  return false;
			}else{
			
			    if(arr[1]){
				
					yazhengNum=arr[0];
				}
			}
		},
		error: function(msg){
		
			$(".live_code i").text(msg);
			return false;
		}
	}); 
}


//写cookies
//getCookie('IN');
/* function setCookie(name,value){

    var Days = 30;
    var exp = new Date();
    exp.setTime(exp.getTime() + Days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();	
}


//读取cookies
function getCookie(name){

    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
 
        return unescape(arr[2]);
    else
        return null;
} 
 */
/* $("#tel").keyup(function(){

	//var  telCooki=getCookie('tel');
	var  telVal=$("#tel").val();
	if(!telVal.match(telCooki)){
	
		if(Trim($("#randcode").val())==''){
			
			// alert('图片验证码不能为空!');
			return false;
		}
		if(Trim($("#code").val())==''){
				
			// alert('请输入短信验证码!');
			return false;
		}
 	}else{
		   
		$('.live_yanzheng').hide(); 
		$('.live_code').hide(); 
	}	
})
 */
//发布评论验证
function checkSave3(){
	
	if(Trim($("#nick").val())==''){
	
		alert('昵称不能为空！!');
		$("#nick").focus();
		return false;
	}
	if(Trim($("#content").val()).length <8||Trim($("#content").val()).length >150){
	
		alert('内容要有8~150个字之间！');
		$("#content").focus();
		return false;
	}
	
	var regexp=/^[1][3-8]\d{9}/;
	if(!regexp.test($("#tel").val())){
	
		alert('手机号码格式有误');
		$("#tel").focus();
		return false;
	}
	 submitSave3();
	/* var  telCooki=getCookie('tel');
	var  telVal=$("#tel").val();
	if(!telVal.match(telCooki)){
	
		if(Trim($("#randcode").val())==''){
		
		    alert('图形验证码不能为空!');
			return false;
		}else if(Trim($("#code").val())==''){
		
		    alert('请输入短信验证码!');
			return false;
		}else if(parseInt($("#code").val())!=parseInt(yazhengNum)){   
		
		    //alert($("#code").val()+'------'+yazhengNum);
		    alert('短信验证码错误!');
			return false;
		}else{
		
		    submitSave3();
		}
	} 
	else{
	
	   submitSave3();
	}*/
}
//提交评论
function submitSave3(){	

	$.ajax({
		
		type:"post",
		url:"zhibo_ajax.php",
		data:'mode=SAVE'+'&nick_name='+$("#nick").val()+'&category_id='+$("#mid").val()+'&tel='+$("#tel").val()+
		'&content='+$("#content").val(),
		success: function(m){
		
			alert(getmsg('submit_success'));
			//setCookie('tel',$("#tel").val());
			$('.js_liveComment').hide();
			
			/* var  telCooki=getCookie('tel');
			var  telVal=$("#tel").val();
			if(!telVal.match(telCooki)){
			
				if(m.match('短信验证码错误')){
				
					$(".live_code i").text(m);
					return false;
				}else{
					
					alert(getmsg('submit_success'));
					setCookie('tel',$("#tel").val());
					$('.js_liveComment').hide();
					$('#content').text('');
					window.location.replace(location.href);
					//$('.js_commonList li').first().before('<li>'+m+"</li>");
				}
			}else{
			
				alert(getmsg('submit_success'));
				setCookie('tel',$("#tel").val());
				
				window.location.replace(location.href);
			} */
		},
		error:function(){
		
			alert(getmsg('submit_failure'));	
		}
	})	
}


//供应商提交验证
function checkSave1()
{
	if($("#gy_name").val()=='')
	{
		alert(getmsg('name_null'));
		$("#gy_name").focus();
		return false;
	}
	if($("#gy_cname").val()=='')
	{
		alert(getmsg('company_name_null'));
		$("#gy_cname").focus();
		return false;
	}
	if($("#gy_address").val()=='')
	{
		alert(getmsg('address_null'));
		$("#gy_address").focus();
		return false;
	}
	if($("#gy_tel").val()=='')
	{
		alert(getmsg('tel_null'));
		$("#gy_tel").focus();
		return false;
	}
	if($("#gy_content").val()=='')
	{
		alert(getmsg('content_null'));
		$("#gy_content").focus();
		return false;
	}
	submitSave1();
}

function submitSave1()
{		
	$.ajax({
		
		type:"get",
		url:"supplier.php",
		data:'mode=SAVE'+'&gyCname='+$("#gy_cname").val()+'&gyAddress='+$("#gy_address").val()+'&gyName='+$("#gy_name").val()+
		'&gyTel='+$("#gy_tel").val()+'&gyEmail='+$("#gy_email").val()+'&gyProduct='+$("#gy_product").val()+'&gyNum='+$("#gy_num").val()+
		'&gyPrice='+$("#gy_price").val()+'&gyLevel='+$("#gy_level").val()+'&gyRegist='+$("#gy_regist").val()+
		'&gySale='+$("#gy_sale").val()+'&gyCooper='+$("#gy_cooper").val()+'&gyContent='+$("#gy_content").val(),
		success: function(m){
			
			alert(getmsg('submit_success'));
			resetSave();
		},
		error:function(){
			
			alert(getmsg('submit_failure'));	
		}
	})	
}

//经销商提交验证
function checkSave2()
{
	if($("#jx_name").val()=='')
	{
		alert(getmsg('name_null'));
		$("#jx_name").focus();
		return false;
	}
	if($("#jx_cname").val()=='')
	{
		alert(getmsg('company_name_null'));
		$("#jx_cname").focus();
		return false;
	}
	if($("#jx_address").val()=='')
	{
		alert(getmsg('address_null'));
		$("#jx_address").focus();
		return false;
	}
	if($("#jx_tel").val()=='')
	{
		alert(getmsg('tel_null'));
		$("#jx_tel").focus();
		return false;
	}
	if($("#jx_content").val()=='')
	{
		alert(getmsg('content_null'));
		$("#jx_content").focus();
		return false;
	}
	submitSave2();
}

function submitSave2()
{		
	$.ajax({
		
		type:"get",
		url:"sales.php",
		data:'mode=SAVE'+'&jxCname='+$("#jx_cname").val()+'&jxAddress='+$("#jx_address").val()+'&jxName='+$("#jx_name").val()+
		'&jxTel='+$("#jx_tel").val()+'&jxEmail='+$("#jx_email").val()+'&jxProduct='+$("#jx_product").val()+'&jxNum='+$("#jx_num").val()+
		'&jxPrice='+$("#jx_price").val()+'&jxLevel='+$("#jx_level").val()+'&jxRegist='+$("#jx_regist").val()+
		'&jxSale='+$("#jx_sale").val()+'&jxCooper='+$("#jx_cooper").val()+'&jxContent='+$("#jx_content").val(),
		success: function(m){
			
			alert(getmsg('submit_success'));
			resetSave();
		},
		error:function(){
			
			alert(getmsg('submit_failure'));	
		}
	})	
}

function checkSave4()
{
	if(Trim($("#nick").val())==''){
		 alert('昵称不能为空!');
		 return false;
	 }
	 if(!checkEmail(Trim($("#email").val()))){
		 alert('您输入的邮件地址非法!');
		 return false;
	 }
	 if(Trim($("#content").val()).length <15){
		 alert('内容至少要有十五个字符！');
		 return false;
	 }
	submitSave4();
}

function submitSave4()
{		
	$.ajax({
		
		type:"get",
		url:"communiReply.php",
		data:'mode=SAVE'+'&pid='+$("#pid").val()+'&r_nick_name='+$("#nick").val()+'&r_email='+$("#email").val()+
		'&r_content='+$("#content").val()+'&r_status=1',
		success: function(m){
			window.location.reload();
			resetSave();
		},
		error:function(){
			
			alert(getmsg('no'));			
		}
	})	
}

function resetSave()
{
	$("#name").val("");
	$("#cname").val("");
	$("#address").val('');
	$("#tel").val('');
	$("#fax").val('');
	$("#content").val('');
	$("#title").val('');
	 $("#nick").val('');
    $("#email").val('');
	$("#content").val('');
	
}

function checkEmail(e)
{
	var ok = "1234567890qwertyuiop[]asdfghjklzxcvbnm.+@-_QWERTYUIOPASDFGHJKLZXCVBNM";
	for(var i=0; i<e.length; i++)
	{
		if (ok.indexOf(e.charAt(i))<0) 
		{
			return false;
		}
	}
	if(e.indexOf("@")<=0)
	{
		return false;
	}
	if(e.indexOf(".")<=0)
	{
		return false;
	}	
	return true;
}