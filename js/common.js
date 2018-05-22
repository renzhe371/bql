function  goHref(){

	var local= "http://m.protruly.com.cn"+window.location.pathname;  
	window.location.href=local;
}
function IsPC(){  

   var userAgentInfo = navigator.userAgent;  
   var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");  
   var flag = true;  
   for (var v = 0; v < Agents.length; v++) {  
	   if (userAgentInfo.indexOf(Agents[v])>0) {
	   flag = false;
	   goHref();
	  
		break; }  
   }  
   //alert(flag);  
}  


function normalNav_w(){
	var obj = $(".normalNav");
	var len = obj.length;

	for (var i = 0;  i < len; i++) {
		obj.eq(i).width( obj.eq(i).parents("li").innerWidth()-2);
	};
	
}




IsPC();
$(window).resize(function(event) {
	normalNav_w();
});
$(function(){
	normalNav_w();
	if($('.js-slideBar-list li.cur').length>0){
	$('.js-slideBar-list i').css({'left':$('.js-slideBar-list li.cur').offset().left-$('.js-slideBar-list').offset().left}); 
	}
	else{
		$('.js-slideBar-list i').hide();
	}
	
  $("body").on('mouseover','.js-slideBar-list li',function(){
	  var _this=$(this);
      _this.siblings('i').stop();
	     _this.siblings('i').animate({'left':_this.offset().left-$('.js-slideBar-list').offset().left})
	  })	
	  
	$("body").on('mouseout','.js-slideBar-list li',function(){
		var _this=$(this);
		_this.siblings('i').stop();
	      _this.siblings('i').animate({'left':$('.js-slideBar-list li.cur').offset().left-$('.js-slideBar-list').offset().left});   
	 })
	
	
  var slideMenu = $('.js-slideMenu');
  var menuBtn = $('.js-menuBtn');
	menuBtn.hover(function(){
	  var _this=$(this);
	  _this.css({'height':'46px'});
	  $("body").css("overflow-x","hidden");
	  slideMenu.slideDown();
	},function(){
		 var _this=$(this);
		_this.css({'height':'16px'});
	    slideMenu.hide();
		
	})
	
	
   var nav=$('#nav');
   var navTop=nav.offset().top;
   var slideBar=null,slideBarTop=null;
   var navInduOL=$('.navInduOL');
   var navIndu =$(".js_navIndu");
   scrollBar();
   function  scrollBar(){
	  
		if($('.slideBar').length>0)
	   {
			slideBar=$('.slideBar');
			slideBarTop=slideBar.offset().top;  
	   }
	 
   $(window).scroll(function(){
		normalNav_w();	
    })
 }
 
	nav.find('.nav').children('li').each(function(){
  
	var _this=$(this);
	_this.hover(function(){
	   
		_this.css({'background-color':'#00b8ba','color':'#fff'})
		_this.children('a').css({'color':'#fff'})
		
		if(!_this.hasClass('cur')){
			
			_this.children('a').css({'color':'#fff'})
		}else{
		   
			_this.children('a').css({'background-color':'#00b8ba','color':'#fff'});
			
			
		}		
			
	   _this.children('div,em,ol').show();
		   
	    },function(){
		
			_this.children('div,em,ol').hide(); 
			if(!_this.hasClass('cur')){
				if( _this.attr("id")!="on" ){
					_this.children('a').css({'color':'#333'})
					
				}else{
					_this.children('a').css({'color':'#00b8ba'});
				}
				 _this.css({'background-color':'#fff','color':'#333'})
		         
			}else{
				
		         _this.children('a').css({'background-color':'#fff','color':'#008f9a'});
			}
		})
   })
   
 
 

 /*var navProBar=$('.js_navProBar');*/
 var navProList=$('.js_navProList');

   navInduOL.find('li').each(function(){
   
	  var _$this=$(this);
	  _$this.hover(function(){
		   navInduOL.find('h3').removeClass('cur')
		   _$this.find('h3').addClass('cur');
		   navInduOL.find('div').hide();
		   _$this.find('div').show();
           navIndu.height(_$this.height()+_$this.find('div').height()+20);

		  
		  })
	  })


  navInduOL.find("dl").each(function(){
    var _this=$(this);
    
     _this.hover(function(){
        _this.css("background-color","#f0f0f0");
       
     },function(){
        _this.css("background-color","#f8f8f8");
        _this.find("dt").css("background-color","#eee");
     })

  })




  /*var topNum=0;
  var classiNum=0;
  var timerScroll=null;
  var navsiBarT=45;
  var navProListT=112;
  navProList.parent('div').hover(function(){
  
	  $('html,body').bind('mousewheel', function(event, delta) {
	   
	    event.preventDefault();
		clearTimeout(timerScroll);
		timerScroll=setTimeout(scrollNav,50);
		function scrollNav(){
			console.log(event.deltaY)
			if(event.deltaY>0)//鼠标滚轮往上
			{

				if(parseInt(navProList.css('top'))<0){   
				
					console.log(parseInt(navProList.css('top')))
					topNum--;
				}else{
					
					topNum=0;
				}
			 } else{
					   
				if(parseInt(navProList.css('top'))>(-2)*112){
					console.log(1)
					topNum++;
				}else{
					console.log(2)
					topNum=2;
				}		 
			}
			//navProList.stop();
			//navProBar.find('i').stop();
			navProList.css({'top':topNum*navProListT*(-1)});
			navProBar.find('i').css({'top':topNum*navsiBarT});		
		}	
	})
	 
 },function(){

	 $('html,body').unbind('mousewheel');
 })  
 

  navProBar.find('i').mousedown(function(event){
	  var _this=$(this);
	  $('html,body').bind('mousemove');
	   event.preventDefault();
	  $('html,body').mousemove(function(e){
		  _this.css('top',e.pageY-navProBar.offset().top-_this.height()/2);
		  var  navBarT =parseInt(_this.css('top'));
		  if(navBarT>=0&&navBarT<navsiBarT)
		  {
			  topNum=0;
			_this.css('top',topNum*navsiBarT);
			  }
		  else if(navBarT>=navsiBarT&&navBarT<navsiBarT*2)
		  {
			 topNum=1 
		   	_this.css('top',topNum*navsiBarT);
			  }
		  else if(navBarT>=navsiBarT*2&&navBarT<navsiBarT*3)
		   {
			 topNum=2
			 navBarT=navsiBarT*2;
			 _this.css('top',navBarT);
			  }
			 
		  else if(navBarT<0){
			topNum=0;  
			navBarT=0;
			_this.css('top',navBarT);
			 }
			navProList.stop();
			navProList.css({'top':topNum*navProListT*(-1)});
				
		 })
	
  })

   $('html,body').mouseup(function(){
	  $('html,body').unbind('mousemove');
	 })*/
	
	//集团产业中下来菜单主营产品滚动
	
	
	 var honourNav=$(".js_honour_nav");
	 var honourPic=$(".js_honourPic");
	 if(honourNav.length>0&& honourPic.length>0){
	  
		  honourNav.find("li").each(function(index){
		  
			   var _this=$(this);
			   var thisOffsetTop,titOffsetTop;
			  $(window).scroll(function(){
			  
				thisOffsetTop=parseInt(honourNav.find("li").eq(index).offset().top);
				 titOffsetTop=parseInt(honourPic.find("h2").eq(index).offset().top);
				 if(thisOffsetTop>=titOffsetTop){
				 
					_this.addClass("on").siblings().removeClass("on"); 
				 }
					 
				 if($(window).scrollTop()>honourPic.offset().top)
				  {
				  	  honourNav.css({"position":"fixed","top":"88px"});
				  }
				  else{
					   honourNav.css({"position":"absolute","top":"auto"});
				  }

			   })

			    
			   _this.click(function(){
					$('html,body').stop();
					$('html,body').animate({scrollTop:parseInt(honourPic.find("h2").eq(index).offset().top)-100});
					
				})
		   })
	 }//企业历程和荣誉证书

})//预加载












$(window).scroll(function(event) {
	var about_de_r = $(".about_de_r");
	var w_st = $(window).scrollTop();
	var w_t = $(window).width();
	var w_h = $(window).height();
	if(! about_de_r.is(":hidden")){
       if($(".about_main").length>0)
       {
          	if($(".about_main").offset().top < w_st && $(".about_de_l").height() >780 ){
        	    about_de_r.css({"top":88,"position":"fixed","right":(w_t-$(".about_de").width())/2});
                if( $("#footer").offset().top - w_h < w_st){
                    about_de_r.css({"top":w_h-362-about_de_r.height(),"position":"fixed","right":(w_t-$(".about_de").width())/2});
                }
            }else{
                about_de_r.css({"top":0,"position":"relative","right":0});
            }
       }  
	}
});