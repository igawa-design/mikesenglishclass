<?php /*
Template Name: single-gallery
*/ ?>

<?php get_header('page'); ?>

<main id="single_gallery">
<figure class="fig main_view">
<figcaption class="figcaption">single-gallery</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/GALLERY/gallery_1400x1050.jpg">
<source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/GALLERY/gallery_1920x1440.jpg">
<img alt="英会話スクールでの生徒さんとの写真。マンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/GALLERY/gallery_1400x1050.jpg">
</picture>
</figure>

<section class="section w100">
<h2 class="sec_h2 sec_h2_gallery"><?php echo esc_html(get_post_type_object(get_post_type())->label); ?></h2>
<p class="sec_txt_lead gallery_lead">Gallery</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('gallery'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌の写真ギャラリー" width="50" height="50" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_sec_gallery.svg"></a>
</h3>
</section><!-- section w100 -->

<div class="archive section">
<div class="sec_box sec_box_gallery">
<div class="sec_box_inner">

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<article>
<h4 class="article_h4"><?php echo get_the_title(); ?></h4>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<div class="post">
<?php the_post_thumbnail(); ?>
<?php the_content(); ?>
</div><!--post-->
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
</div><!--sec_box sec_box_gallery-->

<div class="sec_box sec_box_gallery">
<div class="sec_box_inner">
<h2 id="not_found"><em>新しい写真はありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('gallery'); ?>"><span lang="en">Back To Gallery</span> - ギャラリー一覧へ戻る - </a></p>
<?php endif; ?>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_gallery-->
</div><!--archive section-->

<?php get_sidebar('gallery'); ?>

</main><!--single_gallery-->

<?php get_footer(); ?>
