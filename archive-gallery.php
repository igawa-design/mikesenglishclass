<?php /*
Template Name: archive-gallery
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption gallery">archive-gallery</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1920x1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_gallery"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h2>
<p class="sec_txt_lead gallery_lead">Photo Gallery</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('gallery'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌のギャラリー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_gallery.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_garelly">
<div class="sec_box_inner">

<div id="masonry">
<?php
$args = array(
	'post_type' => array('gallery'),
 'paged' => $paged,
 'posts_per_page' => 10
 );
?>

<?php $loop = new WP_Query($args); ?>
<?php if($loop->have_posts()): ?>
<?php while($loop->have_posts()) : $loop->the_post(); ?>

<article>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<?php the_content(); ?>
<?php if($dis=get_post_meta($post->ID,"画像1",true)){ ?>
<img src="<?php $Image = wp_get_attachment_image_src(get_post_meta($post->ID, '画像1', true),'large'); echo $Image[0]; ?>" alt="">
<?php }else{ ?>
<?php } ?>
<small class="article_cat">
<?php
$terms = get_the_terms($post->ID,'gallery-cat');
foreach( $terms as $term ) {
echo '<a href="'.get_term_link($term->slug, 'gallery-cat').'" class="cat">'.$term->name.'</a>';
}
?>
</small>
</article>


<?php endwhile; ?>
<?php else : ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_garelly-->

<div class="sec_box sec_box_garelly">
<div class="sec_box_inner">
<h2 id="not_found"><em>新しい写真はありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('gallery'); ?>"><span lang="en">Back To Photo Gallery</span> - ギャラリー一覧へ戻る - </a></p>
<?php endif; ?>
</div><!--masonry-->

<?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $loop)); ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_garelly-->
</div><!--archive section-->

<?php get_sidebar('gallery'); ?>

</main>

<?php get_footer(); ?>
