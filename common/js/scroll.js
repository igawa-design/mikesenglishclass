//https://www.omakase.net/blog
$(function() {
  var headerHeight = 140;//固定ヘッダーの高さを入れる
  $('[href^="#"]').click(function(){
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top-headerHeight;
    $("html, body").animate({scrollTop:position}, 1000, "swing");//200はスクロールの移動スピードです
    return false;
  });
});
