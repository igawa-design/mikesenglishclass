<div id="sidebar">

<section id="csategories" class="section">
<div class="sec_box sec_box_gallery">
<div class="sec_box_inner">
<h2>Categories</h2>
<ul>
 <?php wp_list_categories(
  array(
   'title_li' => '',
   'order'    => 'ID',
   'taxonomy' => 'gallery-cat'));
  ?>
</ul>
</div><!--sec_box_inner-->
</div><!--sec_box sec_box_gallery-->
</section><!--categories section-->

<section id="tags" class="section">
<div class="sec_box sec_box_gallery">
<div class="sec_box_inner">
<h2>Tags</h2>
 <?php wp_tag_cloud(
  array(
   'taxonomy' => 'gallery-cat'));
 ?>
</div><!--sec_box_inner-->
</div><!--sec_box sec_box_gallery-->
</section><!--tags section-->

<section id="archives" class="section">
<div class="sec_box sec_box_gallery">
<div class="sec_box_inner">
<h2>Archives</h2>
<ul>
 <?php wp_get_archives(
  'type=monthly&post_type=gallery');
  ?>
</ul>
</div><!--sec_box_inner-->
</div><!--sec_box sec_box_gallery-->
</section><!--archives section-->

</div><!--sidebar-->
