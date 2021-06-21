<?php /*
Template Name: page-404
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption">404</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1920x1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
</picture>
</figure>

<section class="section error404 w100">
<h2 class="sec_h2 sec_h2_mikes_posts">ページが見つかりませんでした。</h2>
<p class="sec_txt_lead mikes_posts_lead">Sorry we couldn't find that page</p>
<h3 class="sec_h3 sec_h3_02"><img class="sec_icon" alt="マイク英会話教室札幌のブログ" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_mikes_posts.svg"></h3>
</section><!-- section error404 w100 -->

<div class="archive section">
<div class="sec_box sec_box_mikes_posts">
<div class="sec_box_inner">

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<?php the_content(); ?>
<?php endwhile; ?>
<?php else : ?>

<h4 id="not_found"><em>Not Found</em><span> - 表示するページはありませんでした。</span></h4>
<?php endif; ?>

<p><a href="<?php echo home_url(); ?>"><span>Back To Home</span> - ホームへ戻る</a></p>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_mikes_posts-->
</div><!--archive section-->

<?php get_sidebar('404'); ?>

</main>

<?php get_footer(); ?>
