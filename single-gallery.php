<?php /*
Template Name: single-gallery
*/ ?>

<?php get_header(); ?>

<?php get_template_part('fancy_slider'); ?>
<?php get_template_part('nav_local'); ?>

<main>
<section id="POST" class="box">
<h2><a href="mikes-posts"><em>ギャラリー 一覧 </em><span>Gallery</span></a></h2>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<article>
<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
<time><?php echo get_the_date('Y.m.d'); ?></time>
<div class="post">
<?php the_content(); ?>
<p class="category"><?php the_category(', '); ?></p>
</div><!--post-->
</article>

<?php endwhile; ?>

<?php else : ?>
<h2 id="not_found"><em>新しいお知らせはありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('archive'); ?>"><span lang="en">Back To Information</span> - お知らせ一覧へ戻る</a></p>
<?php endif; ?>

<div id="pagination" class="single">
<a href="<?php echo home_url('mikes-posts'); ?>">Mike’s Posts</a>
<?php previous_post_link('%link', 'Previous', false); ?>
<?php next_post_link('%link', 'Next', false); ?>
</div><!--pagination single-->
</section><!--POST-->

<?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
