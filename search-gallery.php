<?php /*
Template Name: search-gallery
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption gallery">search-gallery</figcaption>
<picture>
	<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
	<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1920x1440.jpg">
	<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
	</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_gallery">検索結果：「<span><?php the_search_query(); ?></span>」</h2>
<p class="sec_txt_lead gallery_lead">Gallery</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('gallery'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌の写真ギャラリー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_gallery.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive search section">
<div class="sec_box sec_box_gallery">
<div class="sec_box_inner">

<?php
global $wp_query;
$total_results = $wp_query->found_posts;
$search_query = get_search_query();
?>
<h2>「<?php echo $search_query; ?>」の検索結果<span>（<?php echo $total_results; ?>件）</span></h2>

<?php if( $total_results >0 ): ?>
<?php if(have_posts()):	while(have_posts()): the_post(); ?>

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
$terms = get_the_terms($post->ID,'gallery-cat');
foreach( $terms as $term ) {
echo '<a href="'.get_term_link($term->slug, 'gallery-cat').'" class="cat">'.$term->name.'</a>';
}
?>
</small>
</article>

<?php endwhile; endif; ?>

<?php if(function_exists('wp_pagenavi')){
wp_pagenavi(array('query'=>$wp_query));
}
?>
<?php wp_reset_postdata(); ?>

<?php else: ?>
<p>レビュー 一覧では、「<?php echo $search_query; ?> 」に一致する情報は見つかりませんでした。</p>

<?php endif; ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_gallery-->
</div><!--archive search section-->

<?php get_sidebar('gallery'); ?>

</main>

<?php get_footer(); ?>
