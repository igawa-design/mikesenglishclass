<?php /*
Template Name: archive-reviews
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
<h2 class="sec_h2 sec_h2_reviews">レビュー 一覧</h2>
<p class="sec_txt_lead reviews_lead">Reviews</p>
<h3 class="sec_h3 sec_h3_02"><img class="sec_icon" alt="マイク英会話教室札幌のレビュー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_reviews.svg"></h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">

<?php
$args = array(
	'post_type' => array('reviews'),
 'paged' => $paged,
 'posts_per_page' => 10
 );
?>

<?php $loop = new WP_Query($args); ?>
<?php if($loop->have_posts()): ?>
<?php while($loop->have_posts()) : $loop->the_post(); ?>

<article>
<h4 class="article_h4"><?php echo get_the_title(); ?></h4>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<p><?php the_content(); ?></p>
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
<?php else : ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->

<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">
<h2 id="not_found"><em>新しいレビューはありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('reviews'); ?>"><span lang="en">Back To Reviews</span> - レビュー一覧へ戻る - </a></p>
<?php endif; ?>

<?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $loop)); ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</div><!--archive section-->

<?php get_sidebar('reviews'); ?>

</main>

<?php get_footer(); ?>
