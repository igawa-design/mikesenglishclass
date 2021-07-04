<?php /*
Template Name: date-reviews
*/ ?>

<?php get_header('page'); ?>

<main id="date_reviews">
<figure class="fig main_view">
<figcaption class="figcaption">date-reviews</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1920x1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_reviews"><?php echo get_the_date('Y年n月'); ?></h2>
<p class="sec_txt_lead reviews_lead">Reviews</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('reviews'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌のレビュー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_reviews.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<article>
<h4 class="article_h4"><?php echo get_the_title(); ?></h4>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<a href="<?php the_permalink(); ?>">
<div class="post">
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
<?php else : ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->

<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">
<h2 id="not_found"><em>新しいレビューはありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('reviews'); ?>"><span lang="en">Back To Reviews</span> - レビュー一覧へ戻る - </a></p>
<?php endif; ?>

<div class="pagination">
<?php previous_post_link('%link', '< PREV'); ?>
<?php next_post_link('%link', 'NEXT >'); ?>
</div><!--pagination-->

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</div><!--archive section-->

<?php get_sidebar('reviews'); ?>

</main><!--date_reviews-->

<?php get_footer(); ?>
