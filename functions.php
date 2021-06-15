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
add_action( 'init', 'disable_emojis' );
function disable_emojis() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' );
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}

//Remove foot - wp_footer不要部分削除//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function register_javascript() {
wp_deregister_script('wp-embed');
wp_deregister_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'register_javascript');

// enable Custom Post Type - カスタム投稿タイプ有効化 /////////////////////////////////////////////////////////////////////////////
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

// enable Custom Taxonomies - カスタムタクソノミー有効化 /////////////////////////////////////////////////////////////////////////////
register_taxonomy(
 'reviews-cat',
 'reviews',
 array(
		'hierarchical' => true,
		'rewrite' => array('slug' => 'reviews'),
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

// 検索対象をカスタム投稿タイプで絞り込む（管理画面とメインクエリと検索結果を除外） /////////////////////////////////////////////////////////////////////////////

function my_pre_get_posts($query) {
  if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
    $query->set( 'post_type', array('post','page','reviews') );
  }
}
add_action( 'pre_get_posts','my_pre_get_posts' );

//画像サイズ//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_theme_support( 'post-thumbnails' );

//hide admin_bar - WP管理画面ログイン時ツールバー非表示//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter( 'show_admin_bar', '__return_false' );
//disable Gutenberg - Gutenberg（ブロックエディタ）無効化//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter( 'use_block_editor_for_post', '__return_false' );

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
