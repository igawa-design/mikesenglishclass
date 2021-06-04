<?php /*
Template Name: taxonomy-gallery-cat
*/ ?>

<?php get_header(); ?>

<?php get_template_part('fancy_slider'); ?>
<?php get_template_part('nav_local'); ?>

<main>
<section id="ARCHIVE" class="box">
<h2><em><?php echo esc_html($term->name); ?></em><span>Mike's <?php echo esc_html($term->slug); ?></span></h2>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="pic">
<div class="post">
<?php the_content(); ?>
<?php if($dis=get_post_meta($post->ID,"画像1",true)){ ?>
<img src="<?php $Image = wp_get_attachment_image_src(get_post_meta($post->ID, '画像1', true), 'slide-img'); echo $Image[0]; ?>">
<?php }else{ ?>
<?php } ?>
</div><!--post-->
</div><!--pic-->

<?php endwhile; ?>

<div id="pagination" class="archive">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div><!--pagination archive-->
</section><!--ARCHIVE-->

<?php get_sidebar('gallery'); ?>

</main>

<?php get_footer(); ?>
