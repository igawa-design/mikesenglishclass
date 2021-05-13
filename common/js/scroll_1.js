//https://www.omakase.net/blog
//https:design-remarks.com/window-width-branch/

$windowWidth = window.innerWidth;

$breakPointA = 480;
$breakPointB = 768;

isMobileSize = ($windowWidth < $breakPointA);
isTabletSize = ($windowWidth <= $breakPointB) && ($windowWidth > $breakPointA);
isPcSize = ($windowWidth > $breakPointB);

if(isMobileSize){
//モバイルサイズの場合の記述
$(function() {
  var headerHeight = 10;//固定ヘッダーの高さを入れる
  $('[href^="#anchor_"]').click(function(){
    var href= $(this).attr("href");
    var target = $(href == "#anchor_" || href == "" ? 'html' : href);
    var position = target.offset().top-headerHeight;
    $("html, body").animate({scrollTop:position}, 1000, "swing");//200はスクロールの移動スピードです
    return false;
  });
});
}

if(isTabletSize){
//タブレットサイズの場合の記述
$(function() {
  var headerHeight = 90;//固定ヘッダーの高さを入れる
  $('[href^="#anchor_"]').click(function(){
    var href= $(this).attr("href");
    var target = $(href == "#anchor_" || href == "" ? 'html' : href);
    var position = target.offset().top-headerHeight;
    $("html, body").animate({scrollTop:position}, 1000, "swing");//200はスクロールの移動スピードです
    return false;
  });
});
}

if(isPcSize){
//PCサイズの場合の記述
$(function() {
  var headerHeight = 140;//固定ヘッダーの高さを入れる
  $('[href^="#anchor_"]').click(function(){
    var href= $(this).attr("href");
    var target = $(href == "#anchor_" || href == "" ? 'html' : href);
    var position = target.offset().top-headerHeight;
    $("html, body").animate({scrollTop:position}, 1000, "swing");//200はスクロールの移動スピードです
    return false;
  });
});
}
