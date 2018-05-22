 $(document).ready(function(){
	 
	   $(".JS_market_btn li").each(function(index){
		   $(this).click(function(){
			   $(this).addClass("current").siblings().removeClass("current");
			   $(".childCon_list").eq(index).addClass("current_con").siblings().removeClass("current_con");
			})
		   
		 })


     $(".tongjiPic acronym").text($(".JS_picReport_S  li").length);
     $(".JS_picReport_S  li").each(function(index){
         $(this).click(function(){
             $(".market_picReport_L img").attr("src",$(".market_picReport_S ol").find("li").eq(index).find("img").attr("src"));
             $(".market_picReport_L span").text(
			     $(".market_picReport_S ol").find("li").eq(index).find("span").text()
			 
			 );
             $(".tongjiPic abbr").text(index+1);
             $(".pic_report_intro span").eq(index).addClass('cur').siblings().removeClass('cur');
         })

     })

	 
	  $(".JS_picReport_S").height(
	      ($(".JS_picReport_S").find("li").height()+10)*$(".JS_picReport_S").find("li").length

	    )
		

       var leftNum=0;
	  $(".scroll_R").click(function(){
		  
		  leftNum=leftNum+(($(".JS_picReport_S").find("li").height()+10)*(-1)); 
		  if(leftNum>($(".picReport_S_list").height()-$(".JS_picReport_S").height()-10)&&leftNum<=0)
		   {
              
			   $(".JS_picReport_S").animate({
					top:leftNum
					},200)

		    }
			else
			{
				
				leftNum=0;
				
				$(".JS_picReport_S").animate({
					top:leftNum
					},200)
				//leftNum=leftNum-(($(".JS_picReport_S").find("li").width()+14)*(-1)); 
				
		 	}

		 })
		 
	   $(".scroll_L").click(function(){
		    leftNum=leftNum+(($(".JS_picReport_S").find("li").height()+10));
		     if(leftNum>=($(".picReport_S_list").height()-$(".JS_picReport_S").height()-10)&&leftNum<=0)
		   {
		     $(".JS_picReport_S").animate({
					top:leftNum
					},200)

		    }
		    else{
				
				leftNum=$(".picReport_S_list").height()-$(".JS_picReport_S").height();
				$(".JS_picReport_S").animate({
					top:leftNum
					},200)
				//leftNum=leftNum-(($(".JS_picReport_S").find("li").width()+14));
				
				}
		
		 })
 





     $(".video_collect_tit span").each(function(index){
		 $(this).click(function(){
			 $(this).addClass("cur").siblings().removeClass("cur");
			 $(".video_collect_con ul").eq(index).addClass("cur").siblings().removeClass("cur");
			 
			 })
		 
		 })

     $(".market_tit h2").each(function(index){
         $(this).click(function(){
             $(this).addClass("cur").siblings().removeClass("cur");
             $(".makert_list").eq(index).addClass("cur").siblings().removeClass("cur");

         })

     })











 })