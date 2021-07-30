<?php /*
Template Name: page-coming-soon
*/ ?>

<?php get_header('page'); ?>

<main id="page404">
<figure class="fig main_view">
<figcaption class="figcaption">Coming Soon</figcaption>
<picture>
<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/404/404_01_1280x853.jpg">
<source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/common/img/404/404_01_1920x1280.jpg">
<img alt="このページはただいま準備中です。札幌やオンラインでマンツーマンでの英語・英会話のコーチングをしています。" width="1400" height="1050" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/404/404_01_1280x853.jpg">
</picture>
</figure>

<section class="section error404 w100">
<h2 class="sec_h2 sec_h2_mikes_posts">このページは近日公開予定です。</h2>
<p class="sec_txt_lead mikes_posts_lead">We're Coming Soon</p>
<h3 class="sec_h3 sec_h3_02">
<a href="<?php echo home_url('mikes-posts'); ?>"><img class="sec_icon" alt="マイク英会話教室札幌のブログ" width="50" height="50" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/common/img/icon_sec_mikes_posts.svg"></a>
</h3>
</section><!-- section error404 w100 -->

<div class="archive section">
<div class="sec_box sec_box_mikes_posts">
<div class="sec_box_inner">

<?php if(have_posts()): while(have_posts()):the_post(); ?>

<?php the_content(); ?>
<?php endwhile; ?>
<?php else : ?>

<h4 id="not_found"><em>Not Found</em><span> - 表示するページはありませんでした。</span></h4>
<p>このページはただいま準備中です。もうしばらくお待ちください。🌈</p>
<?php endif; ?>

<p><a href="<?php echo home_url(); ?>"><span>Back To Home</span> - ホームへ戻る</a></p>

</div><!--sec_box_inner-->
</div><!--sec_box sec_box_mikes_posts-->
</div><!--archive section-->

<?php get_sidebar('404'); ?>

</main><!--page404-->

<?php get_footer(); ?>
