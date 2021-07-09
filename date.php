<?php /*
Template Name: date-mikes_posts
*/ ?>
<?php get_header('page'); ?>

<main id="date">
<figure class="fig main_view">
<figcaption class="figcaption">date</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/REVIEWS/reviews_01_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/REVIEWS/reviews_01_1920×1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/REVIEWS/reviews_01_1400x1050.jpg">
</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_mikes_posts"><?php echo get_the_date('Y年n月'); ?></h2>
<p class="sec_txt_lead mikes_posts_lead">Mike's Posts</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('mikes-posts'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌のブログ" width="50" height="50" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_sec_mikes_posts.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_mikes_posts">
<div class="sec_box_inner">

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<article>
<h4 class="article_h4"><?php echo get_the_title(); ?></h4>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<a href="<?php the_permalink(); ?>">
<div class="post">
<?php the_post_thumbnail(); ?>
<?php the_excerpt(); ?>
</div><!--post-->
</a>
<small class="article_cat">
<?php
$category = get_the_category();
if ( $category[0] ) {
echo '<a href="' . get_category_link( $category[0]->term_id ) . '" class="cat">' . $category[0]->cat_name . '</a>';
}
?>
</small>
</article>

<?php endwhile; endif; ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_mikes_posts-->
</div><!--archive section-->

<?php get_sidebar(); ?>

</main><!--date-->

<?php get_footer(); ?>
