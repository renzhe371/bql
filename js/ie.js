
var links = '<link id="ies" rel="stylesheet" type="text/css" href="css/ie.css">';
var links1 = '<link id="ies1" rel="stylesheet" type="text/css" href="css/ie2.css">';
var noew = true;
var noew1 = true;
function reSize(){

	var w = $(window).width();
	var h5_ul = $(".bql_h5_main ul.h5_main");
	var news_de_bottm = $(".news_de_bottm");

	if(w<1750){
		if(noew){
			noew=false;
			$("head").append(links);
		}
		
		if(w<1500){
			news_de_bottm.width(1136);
		}
	}else{
		noew=true;
		$("#ies").remove();
	};


	if(w<=1438){
		if(noew1){
			noew1=false;
			$("head").append(links1);
		}
		
	}else{
		noew1=true;
		$("#ies1").remove();
	};

	
}
reSize();

$(window).resize(function(event) {
	reSize();
});