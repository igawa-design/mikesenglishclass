<div id="sidebar">

<section id="csategories" class="section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">
<h2>Categories</h2>
<ul>
 <?php wp_list_categories(
  array('title_li' => '',
   'taxonomy' => 'reviews-cat',
   'orderby' => 'ID'));
  ?>
</ul>
</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</section><!--categories section-->

<section id="tags" class="section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">
<h2>Tags</h2>
 <?php wp_tag_cloud(
  array(
   'taxonomy' => 'reviews-cat'));
  ?>
</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</section><!--tags section-->

<div id="search" class="section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">
<?php get_search_form(); ?>
</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</div><!--search section-->

<section id="archives" class="section">
<div class="sec_box sec_box_reviews">
<div class="sec_box_inner">
<h2>Archives</h2>
<ul>
 <?php wp_get_archives(
  'type=monthly&post_type=reviews');
  ?>
</ul>
</div><!--sec_box_inner-->
</div><!--sec_box sec_box_reviews-->
</section><!--archives section-->

</div><!--sidebar-->
