<?php /*
Template Name: archive-gallery
*/ ?>

<?php get_header('page'); ?>

<main id="archive_gallery">
<figure class="fig main_view">
<figcaption class="figcaption">Gallery</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/GALLERY/gallery_01_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/GALLERY/gallery_01_1920x1440.jpg">
<img alt="英会話スクールの生徒さんたちと教師マイク先生との写真。マンツーマンでの英語・英会話コーチングをしています。" width="1400" height="1050" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/GALLERY/gallery_01_1400x1050.jpg">
</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_gallery"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h2>
<p class="sec_txt_lead gallery_lead"><a href="<?php echo home_url('gallery'); ?>">Photo Gallery</a></p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('gallery'); ?>"><img class="sec_icon" alt="生徒さんたちと教師マイク先生との写真。マイク英会話教室札幌のギャラリー" width="50" height="50" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_sec_gallery.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_garelly">
<div class="sec_box_inner">

<div id="masonry">
<?php
$args = array(
	'post_type' => array('gallery'),
 'paged' => $paged
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

</main><!--archive_gallery-->

<?php get_footer(); ?>
