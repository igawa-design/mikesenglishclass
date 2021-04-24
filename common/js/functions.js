// scroll add class scroll   /////////////////////////////////////////////////////////////

$(window).scroll(function(){
  if ($(window).scrollTop() > 500) {
    $('header').addClass('scroll');
  } else {
    $('header').removeClass('scroll');
  }
});

$(window).scroll(function(){
  if ($(window).scrollTop() > 668) {
    $('header').addClass('fade');
  } else {
    $('header').removeClass('fade');
  }
});

// scroll add class scale  /////////////////////////////////////////////////////////////

$(window).scroll(function (){
  $(".sec_icon, .sec_img, .info_h2_logo").each(function(){
    var hit		= $(this).offset().top;
    var scroll	= $(window).scrollTop();
    var wHeight	= $(window).height();

    if (scroll > hit - wHeight + wHeight/100){
      $(this).addClass("scale");
    } else {
     $(this).removeClass("scale");
    }
  });
});

// scroll add class fade   /////////////////////////////////////////////////////////////

$(window).scroll(function (){
  $(".section, .sec_box, .nav_local, .sincerely, .info_h3, .info_ul, .info_a_sitemap, .rainbow").each(function(){
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

// Copyright //////////////////////////////////////////////////////

var date = new Date();
  $('.copyright').text(
    date.getFullYear());
