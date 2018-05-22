function checkMobile(){
	var isiPad = navigator.userAgent.match(/iPad/i) != null;
	if(isiPad){
		return false;
	}
	var isMobile=navigator.userAgent.match(/iphone|android|phone|mobile|wap|netfront|x11|java|opera mobi|opera mini|ucweb|windows ce|symbian|symbianos|series|webos|sony|blackberry|dopod|nokia|samsung|palmsource|xda|pieplus|meizu|midp|cldc|motorola|foma|docomo|up.browser|up.link|blazer|helio|hosin|huawei|novarra|coolpad|webos|techfaith|palmsource|alcatel|amoi|ktouch|nexian|ericsson|philips|sagem|wellcom|bunjalloo|maui|smartphone|iemobile|spice|bird|zte-|longcos|pantech|gionee|portalmmm|jig browser|hiptop|benq|haier|^lct|320x320|240x320|176x220/i)!= null;
	if(isMobile){
	  	return true;
	}
	return false;
}
function _getCookie(cname){
	var cookieStr = document.cookie.match("(?:^|;)\\s*" + cname + "=([^;]*)");
	return cookieStr ? unescape(cookieStr[1]) : "";
}
var URL_MAP = [
    ["invogue/style-pk/", "invogue/"],
    ["invogue/dream-ticket/", "invogue/"],
    ["invogue/high-street/", "invogue/"],
    ["invogue/vogue-style/", "invogue/"],
    ["invogue/dress-q/", "invogue/"],
    ["invogue/accessory/", "invogue/"],
    ["invogue/brand-journey/", "invogue/"],
    ["invogue/industry/", "invogue/"],
    ["invogue/brand-news/", "invogue/"],
    ["invogue/vogue-office/", "invogue/"],
    ["invogue/street-chic/", "street-chic/"],
    ["invogue/image-mania/", "image-mania/"],
    ["beauty/makeup/", "beauty/"],
    ["beauty/new-in-store/", "beauty/"],
    ["beauty/howto/", "beauty/"],
    ["beauty/celeb-beauty/", "beauty/"],
    ["beauty/skincare/", "beauty/"],
    ["beauty/fitness/", "beauty/"],
    ["beauty/hair/", "beauty/"],
    ["beauty/editor-pick/", "beauty/"],
    ["beauty/brand-news/", "beauty/"],
    ["beauty/fragrance/", "beauty/"],
    ["beauty/street-styling/", "street-chic/"],
    ["people/celeb-style/", "people/"],
    ["people/best-worst/", "people/"],
    ["people/party/", "people/"],
    ["people/icons/", "people/"],
    ["people/red-carpet/", "people/"],
    ["people/talk-of-town/", "people/"],
    ["people/models/", "people/"],
    ["people/star-spot/", "street-chic/"],
    ["shoes-bags/", "shoes-bags/"],
    ["jewelry-watch/season-jewelry/", "jewelry/"],
    ["jewelry-watch/season-watch/", "watch/"],
    ["magazine/current-issue/", "magazine/"]
];
function _getCookie(cname){
  var cookieStr = document.cookie.match("(?:^|;)\\s*" + cname + "=([^;]*)");
  return cookieStr ? unescape(cookieStr[1]) : "";
}
(function(){
	if(checkMobile()){
		if( _getCookie("visitWWW")!=="visited" ){
			var thisHost = "http://"+location.hostname;
			var thisHREF = document.URL, request_uri = thisHREF.substr(thisHost.length+1), reg;

			if(thisHREF=="http://www.protruly.com.cn"||thisHREF=="http://www.protruly.com.cn/"||thisHREF=="http://z.protruly.com.cn/"||thisHREF=="http://z.protruly.com.cn/?from=timeline&isappinstalled=0"||thisHREF=="http://protruly.com.cn/"){
			    window.location.href="http://m.protruly.com.cn/";
			}else{
			 	for(var i=0; i<URL_MAP.length-1; i++){
			 		reg = new RegExp("^" + URL_MAP[i][0], "i");

                    console.log(reg.test(request_uri))
			 		if(reg.test(request_uri)){
			 			request_uri = request_uri.replace(URL_MAP[i][0], URL_MAP[i][1]);
			 			window.location.href = "http://m.protruly.com.cn/" + request_uri;
			 		}
			 	}
			}			
		}
	}
})();
