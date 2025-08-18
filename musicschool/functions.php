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
// ファイル読み込み
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

    // simplebar css
    if (is_page('plan')) {
        wp_enqueue_style('simplebar-style', 'https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.5/simplebar.min.css', array(), NULL);
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

    if (is_page('plan')) {
        wp_enqueue_script('simplebar-script', 'https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.5/simplebar.min.js', array(), NULL, true);
    }

    // 共通のjs
    wp_enqueue_script('common-script');
}
add_action('wp_enqueue_scripts', 'add_files');

// --------------------------------------------------
// 1ページに表示する記事数を指定
// --------------------------------------------------
function my_page_conditions($query)
{
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿のスラッグを記述
        if (is_post_type_archive('blog', 'result')) {
            // 表示件数を指定
            $query->set('posts_per_page', 10);
        }
    }
}
add_action('pre_get_posts', 'my_page_conditions');

// --------------------------------------------------
// 管理画面で 投稿メニュー を非表示
// --------------------------------------------------
function remove_menus()
{
    global $menu;
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_menus');

// --------------------------------------------------
// Contact Form 7で自動挿入されるPタグ、brタグを削除
// --------------------------------------------------
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false()
{
    return false;
}
