// scroll add class   /////////////////////////////////////////////////////////////

$(window).scroll(function(){
  if ($(window).scrollTop() > 400) {
    $('header').addClass('scroll');
  } else {
    $('header').removeClass('scroll');
  }
});

$(window).scroll(function(){
  if ($(window).scrollTop() > 500) {
    $('header').addClass('fade');
  } else {
    $('header').removeClass('fade');
  }
});

$(window).scroll(function () {
  if($(window).scrollTop() > 1) {
    $('.arrow_9ineBB').addClass('fade');
  } else {
    $('.arrow_9ineBB').removeClass('fade');
  }
});

// scroll add class   /////////////////////////////////////////////////////////////

$(window).scroll(function (){
 $(".logo, .sec_icon, .sec_img, .info_h2_logo, .rainbow").each(function(){
    var hit		= $(this).offset().top;
    var scroll	= $(window).scrollTop();
    var wHeight	= $(window).height();

    if (scroll > hit - wHeight + wHeight/100){
      $(this).addClass("scale");
    } else {
     $(this).removeClass("scale");
    }
  }),
  $(".sec_txt_lead").each(function(){
     var hit		= $(this).offset().top;
     var scroll	= $(window).scrollTop();
     var wHeight	= $(window).height();

     if (scroll > hit - wHeight + wHeight/100){
       $(this).addClass("background");
     } else {
      $(this).removeClass("background");
     }
   }),
  $(".career, .sec_h3_lead, .sec_box_a, .sincerely, .info_h3, .info_ul, .info_a_sitemap, .link_cat").each(function(){
     var hit		= $(this).offset().top;
     var scroll	= $(window).scrollTop();
     var wHeight	= $(window).height();

     if (scroll > hit - wHeight + wHeight/100){
       $(this).addClass("slide");
     } else {
      $(this).removeClass("slide");
     }
    }),
   $(".section, .sec_box, .nav_local, .info_a_sitemap, .rainbow, .link_cat").each(function(){
     var hit		= $(this).offset().top;
     var scroll	= $(window).scrollTop();
     var wHeight	= $(window).height();

     if (scroll > hit - wHeight + wHeight/100){
       $(this).addClass("fade");
     } else {
      $(this).removeClass("fade");
     }
   });
});

// scroll add class   /////////////////////////////////////////////////////////////

$(function(){
	$(window).on('load scroll resize', function(){
		const scrollTop = $(window).scrollTop();
		const scrollMax = $(document).height() - window.innerHeight;

		if(scrollTop >= scrollMax){
			$('.topcontrol').addClass("position");
		}else{
			$('.topcontrol').removeClass("position");
		}
	});
});

// click add class   /////////////////////////////////////////////////////////////

$(".hamburger-menu, .close-btn").click(function(){
  if($(".circles").hasClass("clicked")){ // クリックされた要素がclickedクラスだったら
    $(".circles").removeClass("clicked");
  }else{
    $(".circles").addClass("clicked");
  }
});

// masonry //////////////////////////////////////////////////////
$(window).on('load',function(){
 $('#masonry').masonry({
  itemSelector: 'article',
 })
});

// Copyright //////////////////////////////////////////////////////

var date = new Date();
  $('.copyright').text(
    date.getFullYear());
