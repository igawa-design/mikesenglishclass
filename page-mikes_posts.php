<?php /*
Template Name: page-mikes_posts
*/ ?>

<?php get_header('page'); ?>

<main>
<section id="ARCHIVE" class="box">
<h2><em>ブログ 一覧 </em><span lang="en">Mike’s Posts</span></h2>

<?php
$args = array(
    'paged' => $paged,
    'posts_per_page' => 10
    );
?>

<?php $loop = new WP_Query($args); ?>
<?php if($loop->have_posts()): ?>
<?php while($loop->have_posts()) : $loop->the_post(); ?>

<article>
<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
<time><?php echo get_the_date('Y.m.d'); ?></time>
<div class="post">
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
<?php echo custom_excerpt(150); ?>... <a href="<?php the_permalink(); ?>">続きを読む</a>
<p class="category"><?php the_category(', '); ?></p>
</div><!--post-->
</article>

<?php endwhile; ?>

<?php else : ?>
<h2 id="not_found"><em>新しいお知らせはありません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url('mikes-posts'); ?>"><span lang="en">Back To Mike’s Posts</span> - ブログ一覧へ戻る - </a></p>
<?php endif; ?>

<div id="pagination" class="archive">
<?php if(function_exists('wp_pagenavi')) wp_pagenavi(array('query' => $loop)); ?>
</div><!--pagination archive-->
</section><!--ARCHIVE-->

<?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>
