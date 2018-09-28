
/**********************************************************
			======================================
			JQUERY FILE FOR SEMPLE THEME
			======================================

***********************************************************/

$(".site-header").css("display","none");
$(".slidebox").css("display","none");
$(".parent").css("display","none");
$("#footer-text-area").css("display","none");
$(".footer-area").css("display","none");
 

$(document).ready(function(){
	$("#footer-text-area").delay(500).slideDown("slow");
	$(".footer-area").delay(500).slideDown("slow");
	$(".parent").delay(500).slideDown("slow");
	$(".slidebox").delay(500).slideDown("slow");
	$(".site-header").delay(500).slideDown("slow");
	
});






$(document).ready(function(){


//-----------------FOR STAY IN TOUCH WIDGET----------------------	
	
	var def_class = [ "1","facebook", "twitter", "linkdin", "RSS" ];
	var hover_class = [ "1","fb","tw","ld","RS" ];
	var x,y;
	function icon_mouseenter(x){
		return function(){
		$(".image-"+x+"> img").removeClass(def_class[x]);
		$(".image-"+x+"> img").addClass(hover_class[x]);
		};
	}
	function icon_mouseleave(y){
		return function(){
		$(".image-"+y+"> img").removeClass(hover_class[y]);
		$(".image-"+y+"> img").addClass(def_class[y]);
		};
	}
	
	for(var i=1; i<=4; i++){
		$(".image-"+i).mouseenter( icon_mouseenter(i) );
		$(".image-"+i).mouseleave( icon_mouseleave(i) );
	}
	
	
	$('.display_sub_pages').hide();
	

	
	
});
	//-----------------HOVER EFFECT OF CHILD PAGES----------------------
	
	$(document).ready(function(){

	
		function generator(m){
			return function(){
			
			$(".content-holder").stop().hide('slow');
			$(".display"+m).stop().show('slow');
			
			};
		}
		function generator2(n){
			return function(){
				
				$(".content-holder").stop().show('slow');
				$(".display"+ n).stop().hide('slow');
			};
		}
	
	for(var i=0 ;i<$('.chiled-pages li').length ;i++)
	{
		
		
		$(".child-"+i).mouseenter(generator(i));
		
		$(".child-"+i).mouseleave(generator2(i));	
	}
	
	
	});
		

//******************jquery for slider******************

$(document).ready( function(){
	$('.post_content div:first').addClass('top_post_data');
	$('.slider_images img:first').addClass('top');
	$('.bubbles div:first').addClass('current_bubble');
	
	if($('.slider_images img').length==1)
		return;
	var forward = function(){
		//for bubbles
		var circle_curr = $('.bubbles div.current_bubble');
		var curr_next = circle_curr.next();
		
		//for images
		var curr = $('.slider_images img.top');
		var next= curr.next(".slider_images img");
		
		//for post data
		var post_curr=$('.post_content div.top_post_data');
		var post_next= post_curr.next();
		
		if(next.length)
		{
			//for images
			next.addClass('top');
			curr.removeClass('top');
			
			//for bubbles
			curr_next.addClass('current_bubble');
			circle_curr.removeClass('current_bubble');
			
			//for post data
			post_next.addClass('top_post_data');
			post_curr.removeClass('top_post_data');
			
			 
		}
		else
		{
			next= $('.slider_images img:first');
			next.addClass('top');
			curr.removeClass('top');
			
			curr_next= $('.bubbles div:first');
			curr_next.addClass('current_bubble');
			circle_curr.removeClass('current_bubble');
			
			post_next= $('.post_content div:first');
			post_next.addClass('top_post_data');
			post_curr.removeClass('top_post_data');
			
		}
	}	
	
	var backward = function(){
		//for bubbles
		var circle_curr = $('.bubbles div.current_bubble');
		var curr_next = circle_curr.prev();
		
		//for images
		var curr = $('.slider_images img.top');
		var next= curr.prev(".slider_images img");
		
		//for post data
		var post_curr=$('.post_content div.top_post_data');
		var post_next= post_curr.prev();
		
		
		if(next.length)
		{
			//for images
			next.addClass('top');
			curr.removeClass('top');
			
			//for bubbles
			curr_next.addClass('current_bubble');
			circle_curr.removeClass('current_bubble');
			
			//for post data
			post_next.addClass('top_post_data');
			post_curr.removeClass('top_post_data');
			
			
			
		}
		else
		{
			next= $('.slider_images img:last');
			next.addClass('top');
			curr.removeClass('top');
			
			curr_next=$('.bubbles div:last');
			curr_next.addClass('current_bubble');
			circle_curr.removeClass('current_bubble');
			
			post_next= $('.post_content div:last');
			post_next.addClass('top_post_data');
			post_curr.removeClass('top_post_data');
		}
	}	
	
	
	var start1,reset1;
	var start=function(){
		start1= setInterval(forward,3000);
	}
	var pause=function(){
		clearInterval(start1);
		clearInterval(reset1);
	}
	var reset=function(){
		reset1=setTimeout(start,3000);
	}
	
	start();
	
	$('.next').click(function(){
		forward();
		pause();
		reset();
	});
	
	$('.prev').click(function(){
		backward();
		pause();
		reset();
	});
	
	function bubbles_click(n){
	return function(){
		var bubble_curr = $('.slider_images img.top');
		var bubble_show = $('.image' + n);
		var circle_curr = $('.bubbles div.current_bubble');
		var circle_show = $('.circle' + n);
		var post_curr = $('.post_content div.top_post_data');
		var post_curr_show = $('.post_data' + n);
		
		bubble_show.addClass('top');
		bubble_curr.removeClass('top');
		
		circle_show.addClass('current_bubble');
		circle_curr.removeClass('current_bubble');
		
		post_curr_show.addClass('top_post_data');
		post_curr.removeClass('top_post_data');
			
		pause();
		reset();
	};
	}
	
	for(var i=1; i<=$(".sub_slide_image img").length ;i++)
	{
	$('.circle'+i).click(bubbles_click(i));
	}
});	
	
	
/********************SLIDER PREV & NEXT BUTTON HOVER EFECT********************/

$(document).ready(function(){
	var directory = php_var.get_directory ;
	console.log(directory);
	$(".next").mouseenter(function(){
		$(this).attr("src",directory + "/images/slider-bottom.png" );
	});
	
	$(".prev").mouseenter(function(){
		$(this).attr("src",directory + "/images/slider-top.png");
	});
	
	$(".next").mouseleave(function(){
		$(this).attr("src",directory + "/images/slider-bottom-pagination.png");
	});
	
	$(".prev").mouseleave(function(){
		$(this).attr("src",directory + "/images/slider-top-pagination.png");
	});
});
	
/********************SIDEBAR NAV BUTTON********************/	

$(document).ready(function(){
$(".menu_btn").click(function(){
	$(".div_over-blur").fadeToggle(400);
	$(".sidebar_nav").css({"width":"250px"});
});

	
$(".closebtn").click(function(){
	$(".sidebar_nav").css("width","0px");
	$(".div_over-blur").fadeToggle(400);
});
});

        
/********************SIDEBAR CHILD MENUS********************/	

$(".sidebar_nav ul li").click(function(){
	$(this).children('ul').css("display","block");
});	
	
	
	
	
	
	
	
	
	
	
	
	