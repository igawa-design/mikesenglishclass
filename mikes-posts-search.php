<?php /*
Template Name: search-mikes-posts
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption">Mike's Posts</figcaption>
<picture>
	<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
	<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1920x1440.jpg">
	<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/REVIEWS/reviews_1400x1050.jpg">
	</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2">検索結果：「<span><?php the_search_query(); ?></span>」</h2>
<p class="sec_txt_lead reviews_lead">Reviews</p>
<h3 class="sec_h3 sec_h3_02"><img class="sec_icon" alt="マイク英会話教室札幌のレビュー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_reviews.svg"></h3>
</section><!-- section w100 -->

<div class="archive search section">
<div class="sec_box sec_box_mikes_posts">
<div class="sec_box_inner">

	<?php
	global $wp_query;
	$total_results = $wp_query->found_posts;
	$search_query = get_search_query();
	?>
	<h2>「<?php echo $search_query; ?>」の検索結果<span>（<?php echo $total_results; ?>件）</span></h2>

	<?php if( $total_results >0 ): ?>
	<?php if(have_posts()):	while(have_posts()): the_post(); ?>
	<h4 class="article_h4"><?php echo get_the_title(); ?></h4>
	<?php endwhile; endif; ?>

	<?php if(function_exists('wp_pagenavi')){
	wp_pagenavi(array('query'=>$wp_query));
	}
	?>
	<?php wp_reset_postdata(); ?>

	<?php else: ?>
	<p><?php echo $search_query; ?> に一致する情報は見つかりませんでした。</p>

	<?php endif; ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_mikes_posts-->
</div><!--archive search section-->

<?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
