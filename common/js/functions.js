// scroll add class   /////////////////////////////////////////////////////////////

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

// scroll add class /////////////////////////////////////////////////////////////

$(window).scroll(function () {
  if($(window).scrollTop() > 1) {
    $('.arrow_9ineBB').addClass('fade');
  } else {
    $('.arrow_9ineBB').removeClass('fade');
  }
});

// scroll add class  /////////////////////////////////////////////////////////////

$(window).scroll(function (){
 $(".sec_icon, .sec_img, .info_h2_logo, .rainbow").each(function(){
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

// scroll add class  /////////////////////////////////////////////////////////////

$(window).scroll(function (){
 $(".career, .sec_h3_lead, .sincerely, .info_h3, .info_ul, .info_a_sitemap").each(function(){
    var hit		= $(this).offset().top;
    var scroll	= $(window).scrollTop();
    var wHeight	= $(window).height();

    if (scroll > hit - wHeight + wHeight/100){
      $(this).addClass("slide");
    } else {
     $(this).removeClass("slide");
    }
  });
});

// scroll add class   /////////////////////////////////////////////////////////////

$(window).scroll(function (){
  $(".section, .sec_box, .nav_local, .info_a_sitemap, .rainbow").each(function(){
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

// click add class   /////////////////////////////////////////////////////////////

$(".hamburger-menu, .close-btn").click(function(){
  if($(".circles").hasClass("clicked")){ // クリックされた要素がclickedクラスだったら
    $(".circles").removeClass("clicked");
  }else{
    $(".circles").addClass("clicked");
  }
});

// Copyright //////////////////////////////////////////////////////

var date = new Date();
  $('.copyright').text(
    date.getFullYear());
