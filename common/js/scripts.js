// by webcreatorbox.com /////////////////////////////////////////////////////////////
// loading
window.onload = function() {
  const spinner = document.getElementById('loading');
  spinner.classList.add('loaded');
};

// scroll add class arrow /////////////////////////////////////////////////////////////

$(window).scroll(function () {
  if($(window).scrollTop() > 1) {
    $('.arrow_9ineBB').addClass('fade');
  } else {
    $('.arrow_9ineBB').removeClass('fade');
  }
});

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
  $(".section, .sec_box, .nav_local, .sincerely, .info_h3, .info_ul, .info_a_sitemap").each(function(){
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

// Grid rayout //////////////////////////////////////////////////////

let magicGrid = new MagicGrid({
  container: "#container", // Required. Can be a class, id, or an HTMLElement.
  static: true, // Required for static content.
  animate: true, // Optional.
  gutter: 0, // Optional. Space between items. Default: 25(px). *change 25 to 0, applying a css.
});

magicGrid.listen();

// Copyright //////////////////////////////////////////////////////

var date = new Date();
  $('.copyright').text(
    date.getFullYear());
