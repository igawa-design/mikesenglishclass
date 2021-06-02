<?php /*
Template Name: taxonomy-reviews-cat
*/ ?>

<?php get_header(); ?>

<?php get_template_part('fancy_slider'); ?>
<?php get_template_part('nav_local'); ?>

<main>
<section id="ARCHIVE" class="box">
<h2><em><?php echo esc_html($term->name); ?>レビューの一覧</em><span><?php echo esc_html($term->slug); ?> reviews</span></h2>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article>
<h3><?php the_title(); ?></h3>
<div class="post">
<?php the_content(); ?>
<p class="category">
<?php
$terms = get_the_terms($post->ID,'reviews-cat');
foreach( $terms as $term ) {
echo $term->name;
}
?>
</p>
</div><!--post-->
</article>

<?php endwhile; ?>

<div id="pagination" class="archive">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div><!--pagination archive-->
</section><!--ARCHIVE-->

<?php get_sidebar('reviews'); ?>

</main>

<?php get_footer(); ?>
