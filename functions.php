<?php

//Remove head - wp_head不要部分削除//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );

function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

//Remove foot - wp_footer不要部分削除//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function register_javascript() {
	wp_deregister_script('wp-embed');
	wp_deregister_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'register_javascript');

//post_has_archive ブログ投稿のアーカイブページ作成 ///////////////////////////////////////////////////////////////////////////////////////

function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true; // リライトを有効にする
    $args['has_archive'] = 'mikes-posts'; // 任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//add_theme_support アイキャッチ画像の表示//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_theme_support( 'post-thumbnails' );

function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

if(empty($first_img)){ //Defines a default image
	  $first_img = "https://mikesenglishclass.jp/wp-content/themes/mikesenglishclass/common/img/logo.svg";
	 }
	 return $first_img;
}

//custom_excerpt_length - 抜粋文字数の指定//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function custom_excerpt_length( $length ) {
     return 200;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//custom_excerpt_length - 文末表記の指定//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function custom_excerpt_more($more) {
        return ' ... ';
}
add_filter('excerpt_more', 'custom_excerpt_more');

//disable wpautop - 自動pタグ無効化//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_action('init', function() {
remove_filter('the_excerpt', 'wpautop');
remove_filter('the_content', 'wpautop');
});
add_filter('tiny_mce_before_init', function($init) {
$init['wpautop'] = false;
$init[‘apply_source_formatting’] = true;
return $init;
});

// Custom Post Type - カスタム投稿タイプ /////////////////////////////////////////////////////////////////////////////
register_post_type(
	'reviews',
	array(
		'label' => '生徒さんの声',
		'description' => '生徒さんの声',
		'menu_position' => 5,
		'hierarchical' => false,
		'public' => true,
		'query_var' => false,
		'has_archive' => true,
		'rewrite' => true,
		'yarpp_support' => true,
		'supports' => array(
		'title',
		'editor',
		'excerpt',
		'thumbnail',
		)
	)
);

register_post_type(
	'gallery',
	array(
		'label' => 'フォトギャラリー',
		'description' => 'フォトギャラリー',
		'menu_position' => 6,
		'hierarchical' => false,
		'public' => true,
		'query_var' => false,
		'has_archive' => true,
		'rewrite' => true,
		'yarpp_support' => true,
		'supports' => array(
		'title',
		'editor',
		'excerpt',
		'thumbnail',
		)
	)
);

// Custom Taxonomies - カスタムタクソノミー /////////////////////////////////////////////////////////////////////////////
register_taxonomy(
 'reviews-cat',
 'reviews',
 array(
		'hierarchical' => true,
		'label' => 'カテゴリ',
		'singular_label' => '生徒さんの声カテゴリ',
		'show_admin_column' => true
 )
);

register_taxonomy(
 'gallery-cat',
 'gallery',
 array(
	 'hierarchical' => true,
		'rewrite' => array('slug' => 'gallery'),
	 'label' => 'カテゴリ',
	 'singular_label' => 'フォトギャラリーカテゴリ',
	 'show_admin_column' => true
 )
);

//custom_search 投稿タイプ内のみの検索//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function custom_search_template($template){
  if (is_search()){
    $post_types = get_query_var('post_type');
    foreach ( (array) $post_types as $post_type )
      $templates[] = "search-{$post_type}.php";
      $templates[] = 'search.php';
      $template = get_query_template('search',$templates);
     }
  return $template;
}
add_filter('template_include','custom_search_template');

//wps_highlight_results 検索結果でのキーワードのハイライト//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function wps_highlight_results($text) {
if(is_search()){
	$sr = get_query_var('s');
	$keys = explode(" ",$sr);
	$text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">'.$sr.'</span>', $text);
}
	return $text;
}
add_filter('the_title', 'wps_highlight_results');
add_filter('the_excerpt', 'wps_highlight_results');
add_filter('the_content', 'wps_highlight_results');

//hide admin_bar - WP管理画面ログイン時ツールバー非表示//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter( 'show_admin_bar', '__return_false' );

//disable Gutenberg - Gutenberg（ブロックエディタ）無効化//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter( 'use_block_editor_for_post', '__return_false' );

//hide visual editor - ビジュアルエディタ非表示//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function my_admin_style() {
 echo '<style>
 .wp-editor-tabs {
		display: none;
	}
 </style>'.PHP_EOL;
}
add_action('admin_print_styles', 'my_admin_style');

//add_shortcode, include php file - ショートコードでphpファイルを読み込み//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function sc_php($atts = array()) {
 shortcode_atts(array(   /* shortcode_atts でショートコードの属性名を指定 */
   'file' => 'default'   /* 属性名とデフォルトの値 */
 ), $atts);   /* 属性を格納する変数 */
 ob_start();   /* バッファリング */
 include(STYLESHEETPATH . "/$atts[file].php");  /* CSSのあるパス = 子テーマのパスを指定 */
 return ob_get_clean();  /* バッファの内容取得、出力バッファを削除 */
}

// ショートコード作成（sc というショートコードは、sc_php()という関数を呼び出すという意味）
add_shortcode('sc', 'sc_php');
