<?php /*
Template Name: archive
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption">Reviews</figcaption>
<picture>
	<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
	<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1920x1440.jpg">
	<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
	</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_mikes_posts">ブログ 一覧</h2>
<p class="sec_txt_lead mikes_posts_lead">Mike’s Posts</p>
<h3 class="sec_h3 sec_h3_02"><img class="sec_icon" alt="マイク英会話教室札幌のブログ" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_mikes_posts.svg"></h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_mikes_posts">
<div class="sec_box_inner">

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<article>
<h4 class="article_h4"><?php echo get_the_title(); ?></h4>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<p><?php the_content(); ?></p>
</article>

<?php endwhile; ?>
<?php else : ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_mikes_posts-->

<div class="sec_box sec_box_mikes_posts">
<div class="sec_box_inner">
<h2 id="not_found"><em>新しいポストはありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('mikes-posts'); ?>"><span lang="en">Back To Mikes Posts</span> - ブログ一覧へ戻る - </a></p>
<?php endif; ?>

<?php wp_pagenavi(); ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_mikes_posts-->
</div><!--archive section-->

<?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
