<?php /*
Template Name: archive-reviews
*/ ?>

<?php get_header('page'); ?>

<main id="archive_reviews">
<figure class="fig main_view">
<figcaption class="figcaption">Reviews</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/REVIEWS/reviews_01_1400x1623.jpg">
<source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/REVIEWS/reviews_01_1920x2227.jpg">
<img alt="札幌。英会話スクールの生徒さんからのレビュー。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/REVIEWS/reviews_01_1400x1623.jpg">
</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_reviews"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h2>
<p class="sec_txt_lead reviews_lead"><a href="<?php echo home_url('reviews'); ?>">Reviews</a></p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('reviews'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌のレビュー" width="50" height="50" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_sec_reviews.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">

<?php
$args = array(
'post_type' => array('reviews'),
'paged' => $paged
);
?>

<?php $loop = new WP_Query($args); ?>
<?php if($loop->have_posts()): ?>
<?php while($loop->have_posts()) : $loop->the_post(); ?>

<article>
<h4 class="article_h4"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<a href="<?php the_permalink(); ?>">
<div class="post">
<h5 class="article_cat">
<small class="cat">
<?php
$terms = get_the_terms($post->ID,'reviews-cat');
foreach( $terms as $term ) {
echo '<a href="'.get_term_link($term->slug, 'reviews-cat').'">'.$term->name.'</a>';
}
?>
</small>
</h5>
<?php the_excerpt(); ?>
</div><!--post-->
</a>
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

</main><!--archive_reviews-->

<?php get_footer(); ?>
