<?php /*
Template Name: page
*/ ?>

<?php get_header(); ?>

<body id="PAGE">

<header id="header">
<div class="flex">
<h1><a href="<?php echo home_url(); ?>"><img alt="英会話＆英語教室 マイク英会話教室札幌" src="<?php echo get_template_directory_uri(); ?>/common/img/logo.png"></a></h1>
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
<section>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<h2><?php echo get_the_title(); ?></h2>
<div class="post">
<?php the_content(); ?>
</div><!--post-->

<?php endwhile; ?>

<?php else : ?>
<h2 id="not_found"><em>ページが見つかりません。</em><span lang="en">Not Found</span></h2>
<p><a href="<?php echo home_url(); ?>"><span lang="en">Back To HOME</span> - TOPページへ戻る</a></p>
<?php endif; ?>

</section>
</main>

<?php get_footer(); ?>