<?php /*
Template Name: search-post
*/ ?>

<?php get_header(); ?>

<body id="SINGLE" class="search">

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
<div class="box google_plus">
<a href="https://www.google.co.jp/search?q=705+%E5%8F%B7+%E3%83%9E%E3%82%A4%E3%82%AF%E8%8B%B1%E4%BC%9A%E8%A9%B1%E6%95%99%E5%AE%A4%E6%9C%AD%E5%B9%8C+Mike%27s+English+Class+Sapporo,+%E3%83%9E%E3%82%B8%E3%82%BD%E3%83%B3%E3%83%8F%E3%82%A4%E3%83%84+%EF%BC%93%E4%B8%81%E7%9B%AE-%EF%BC%92-%EF%BC%91+%E5%8D%97%EF%BC%99%E6%9D%A1%E8%A5%BF+%E6%9C%AD%E5%B9%8C%E5%B8%82%E4%B8%AD%E5%A4%AE%E5%8C%BA+%E5%8C%97%E6%B5%B7%E9%81%93+064-0809&ludocid=12909556242763201950&gws_rd=ssl#lrd=0x5f0b2a27fb5aaaab:0xb327f50149d3bd9e,1" target="_blank">
<img alt="マイク英会話教室札幌 Google Plus" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_gplus_head.png" class="icon_gplus_head"></a>
</div><!--box-->
</div><!--flex-->

<?php get_template_part('nav'); ?>

</header>

<main>

<section id="ARCHIVE" class="box">
<?php query_posts($query_string.'&posts_per_page=20'); ?>
<?php if(have_posts()): ?>
<h2>検索結果：「<span><?php the_search_query(); ?></span>」</h2>
 
<?php while(have_posts()): the_post(); ?>

<article>
<h3><?php the_title(); ?></h3>
<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
<div class="post">
<?php the_content(); ?>
</div><!--post-->
</article>

<?php endwhile; ?>
 
<?php else: ?>
<h2>「<span><?php the_search_query(); ?></span>」の検索結果が見つかりませんでした。</h2>
<p class="note">別のキーワードでお試しください。</p>
<?php get_search_form(); ?>
<?php endif;  ?>
 
</section><!--ARCHIVE-->

<?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>