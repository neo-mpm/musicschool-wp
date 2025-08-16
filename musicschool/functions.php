<?php
// --------------------------------------------------
// 最初の設定
// --------------------------------------------------
function custom_theme_setup()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script'
        )
    );
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'custom_theme_setup');

// --------------------------------------------------
//ファイル読み込み
// --------------------------------------------------
function add_files()
{
    $now = date('YmdHis');

    // css登録
    wp_register_style('common-style', get_theme_file_uri('/assets/css/style.css'), array(), $now);

    // swiper css
    if (is_front_page()) {
        wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), NULL);
    }

    // 共通のcss
    wp_enqueue_style('common-style');

    // WordPress提供のjquery.jsを読み込まない
    wp_deregister_script('jquery');

    // js登録
    wp_register_script('common-script', get_theme_file_uri('/assets/js/default.js'), array(), $now, true);

    // swiper js
    if (is_front_page()) {
        wp_enqueue_script('swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), NULL, true);
    }

    // 共通のjs
    wp_enqueue_script('common-script');
}
add_action('wp_enqueue_scripts', 'add_files');
