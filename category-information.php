<?php /*
Template Name: category-information
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption mikes_posts">category-information</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1920x1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_mikes_posts"><?php single_cat_title(); ?></h2>
<p class="sec_txt_lead mikes_posts_lead">Mike’s Posts</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('mikes-posts'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌のブログ" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_mikes_posts.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_mikes_posts">
<div class="sec_box_inner">

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<article>
<h4 class="article_h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<a href="<?php the_permalink(); ?>">
<div class="post">
<p class="category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
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
