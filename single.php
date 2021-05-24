<?php /*
Template Name: single
*/ ?>

<?php get_header(); ?>

<body id="SINGLE">

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
<section id="POST" class="box">
<h2><a href="mikes-posts"><em>ブログ </em><span>Mike’s Posts</span></a></h2>

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