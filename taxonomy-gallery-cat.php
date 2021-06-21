<?php /*
Template Name: taxonomy-gallery-cat
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption gallery">taxonomy-gallery-cat</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1920x1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
</picture>
</figure>

<?php
$now_id = $cat_now->cat_ID;
$now_slug = $cat_now->slug;
$now_name = $cat_now->cat_name;
$taxonomy = $wp_query->get_queried_object();

$term = array_pop(get_the_terms($post->ID, 'reviews-cat'));
$term_p = $term->parent;
if ( ! $term_p == 0 ){
$term = array_shift(get_the_terms($post->ID, 'reviews-cat'));
}
?>

<section class="section w100">
<h2 class="sec_h2 sec_h2_reviews"><em><?php echo esc_html($term->name); ?>レビュー</em><span><?php echo esc_html($term->slug); ?> reviews</span></h2>
<p class="sec_txt_lead reviews_lead">Reviews</p>
<h3 class="sec_h3 sec_h3_02"><img class="sec_icon" alt="マイク英会話教室札幌のレビュー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_reviews.svg"></h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

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
$terms = get_the_terms($post->ID,'reviews-cat');
foreach( $terms as $term ) {
echo '<a href="'.get_term_link($term->slug, 'reviews-cat').'" class="cat">'.$term->name.'</a>';
}
?>
</small>
</article>

<?php endwhile; ?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</div><!--archive section-->

<?php get_sidebar('reviews'); ?>

</main>

<?php get_footer(); ?>
