<?php /*
Template Name: taxonomy-gallery-cat
*/ ?>

<?php get_header('page'); ?>

<main>
<figure class="fig main_view">
<figcaption class="figcaption gallery">taxonomy-gallery-cat</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1920x1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/GALLERY/gallery_1400x1050.jpg">
</picture>
</figure>

<?php
$now_id = $cat_now->cat_ID;
$now_slug = $cat_now->slug;
$now_name = $cat_now->cat_name;
$taxonomy = $wp_query->get_queried_object();

$term = array_pop(get_the_terms($post->ID, 'gallery-cat'));
$term_p = $term->parent;
if ( ! $term_p == 0 ){
$term = array_shift(get_the_terms($post->ID, 'gallery-cat'));
}
?>

<section class="section w100">
<h2 class="sec_h2 sec_h2_gallery"><em><?php echo esc_html($term->name); ?></em><span><?php echo esc_html($term->slug); ?></span></h2>
<p class="sec_txt_lead gallery_lead">gallery</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('gallery'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌の写真ギャラリー" width="50" height="50" loading="lazy" src="https://igawa.co/mikesenglishclass/wp-content/themes/mikesenglishclass/common/img/icon_sec_gallery.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_gallery">
<div class="sec_box_inner">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<p><?php the_content(); ?></p>
<?php if($dis=get_post_meta($post->ID,"画像1",true)){ ?>
<img src="<?php $Image = wp_get_attachment_image_src(get_post_meta($post->ID, '画像1', true), 'slide-img'); echo $Image[0]; ?>">
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

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_gallery-->
</div><!--archive section-->

<?php get_sidebar('gallery'); ?>

</main>

<?php get_footer(); ?>
