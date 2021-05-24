<?php /*
Template Name: archive
*/ ?>

<?php get_header(); ?>

<body id="SINGLE" class="archive MIKES_POSTS">

<header id="header">
<div class="flex">
<h1><a href="<?php echo home_url(); ?>"><img alt="札幌英会話＆英語教室 Mike’s Posts" src="<?php echo get_template_directory_uri(); ?>/common/img/logo.png"></a></h1>
<div class="box facebook">
<a href="https://www.facebook.com/mikesenglishclass" target="_blank">
<img alt="マイク英会話教室札幌 facebook" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_facebook.svg" class="icon_facebook"></a>
</div><!--box-->
<div class="box youtube">
<a href="https://www.youtube.com/channel/UCxV2V8PO1QbFdeQOODeeyXw" target="_blank">
<img alt="
マイク英会話教室札幌 YouTube" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_youtube.svg" class="icon_youtube"></a>
</div><!--box-->
</div><!--flex-->

<?php get_template_part('nav'); ?>

</header>

<main>
<section id="ARCHIVE" class="box">
<h2><em>ブログ一覧 </em><span lang="en">Mike’s Posts</span></h2>

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
<?php echo custom_excerpt(150); ?>... <a href="<?php the_permalink(); ?>">続きを読む</a>
<p class="category"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
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