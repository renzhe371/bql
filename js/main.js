
var bql = {

  seek : function ()
  {
    var time = null;
    var but = $("#header .seek-but");
    var div = $("#header .seek-box");

    but[0].onmouseover = div[0].onmouseover= function(){
      window.clearTimeout(time);
      times = window.setTimeout(showes,300)
      
    }
    but[0].onmouseout = div[0].onmouseout = function(){
      window.clearTimeout(times);
      time = window.setTimeout(hides,300)
      
    }
    function showes (){
      div[0].style.display = "block";
      
    }
    function hides (){
      div[0].style.display = "none";
    }
  
  },
  tab : function (even_obj,add_class,obj_list,sibli_tag,time)
  {
    var times = null;

    $(even_obj).on("mouseenter mouseleave",function(event) {
      
      if(event.type == "mouseenter")
      {
        
        _this = $(this);
        bql.num=_this.index(); 


        times = window.setTimeout(function(){

            _this.addClass(add_class).siblings(sibli_tag).removeClass(add_class);
            var index = _this.index();
            $(obj_list).eq(index).show(0).siblings(obj_list).hide(0);
        },time);
       

      }else{
       
         window.clearTimeout(times);
      }
      

    });


  },
  num: 0,
  certificate : function()
  {
    var certificate_img = $("#certificate_img");
    var len = certificate_img.find('img').length;
    var num = 0;
    certificate_img.on('click', "a.po-a", function(event) {
      if($(this).hasClass('next')){
        num--;
        if(num<0){
          num = len-1;
        }
      }else{
        num++;
        if(num>len-1){
          num = 0;
        }
      }

      certificate_img.find('img').eq(num).show(0).siblings('img').hide(0);
      

    });
  }



}
   








$(function(){

      bql.seek();
      bql.certificate();
      bql.tab("#evolution_box_ti li","cur",".evolution_list","li",100);
      function tab_cut(){
        bql.num++;
        if(bql.num>=4){
          bql.num=0;
        }
        $("#evolution_box_ti li").eq(bql.num).mouseenter();
      }
      var times = window.setInterval(tab_cut,4000);


      $("#evolution_content").hover(
        function(){
          window.clearInterval(times);
        },function(){
          times = window.setInterval(tab_cut,4000);
        }
      );

      bql.tab(".new_software div a.float-l","cur",".new_software_list","a",100);
      $('.bql_banner').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dots:true,
            arrows:false,
            draggable:false,
            speed:1200,
            pauseOnHover:true,
            draggable:true
      });
})