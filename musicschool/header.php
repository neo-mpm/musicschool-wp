<?php
require_once get_template_directory() . '/assets/src/config.php';

global $navMenu;

?>
<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta content="<?= SERVER_NAME ?>/assets/img/og-image.jpg" property="og:image">
  <meta content="website" property="og:type">
  <meta content="<?= SITE_NAME ?>" property="og:title">
  <?php
  // トップページ（フロントページ）の場合
  if (is_front_page()):
  ?>
    <title><?= SITE_NAME ?> | 「音楽で生きる」を叶える ミュージックスクール</title>
    <meta content="<?= DESCRIPTION ?>" name="description">
  <?php
  // 固定ページの場合
  elseif (is_page()):
  ?>
    <title><?php the_title() ?> | <?= SITE_NAME ?></title>
    <meta content="<?= DESCRIPTION_PREFIX ?><?php the_title() ?>ページです。" name="description">
  <?php
  // 投稿ページの場合
  elseif (is_single()):
  ?>
    <title><?php the_title() ?> | <?= SITE_NAME ?></title>
    <?php
    // 投稿に「抜粋」があるかチェック
    if (has_excerpt()) {
      // 抜粋がある場合はそれを説明文に使う
      $excerpt = get_the_excerpt();
    } else {
      // 抜粋がない場合は本文から120文字を取り出して説明文に使う
      $content = get_the_content();
      $content = strip_tags($content); // HTMLタグを除去
      $content = str_replace(["\r\n", "\r", "\n", "&nbsp;"], '', $content); // 改行や空白を除去
      $excerpt = mb_substr($content, 0, 120, "UTF-8"); // 最初の120文字を取得
    }
    ?>
    <meta content="<?= esc_attr($excerpt) ?>" name="description">
  <?php
  // アーカイブページ（カテゴリ・タグ・カスタム投稿タイプ一覧など）の場合
  elseif (is_archive()):

    // 現在のページ番号を取得（1ページ目は「1」になる）
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    // カテゴリーアーカイブ
    if (is_category()) {
      $term_name = single_cat_title('', false);
    }
    // カスタムタクソノミー
    elseif (is_tax()) {
      $term_name = single_term_title('', false);
    }
    // カスタム投稿タイプのアーカイブ
    elseif (is_post_type_archive()) {
      $post_type_obj = get_post_type_object(get_post_type());
      $term_name = $post_type_obj ? $post_type_obj->labels->name : '一覧';
    }
    // その他のアーカイブ
    else {
      $term_name = '一覧';
    }

    // 2ページ目以降かどうかでタイトルを変える
    if ($paged > 1) {
      $title = $term_name . '一覧ページ ' . $paged . 'ページ目';
      $description = DESCRIPTION_PREFIX . $term_name . '一覧ページ ' . $paged . 'ページ目です。';
    } else {
      $title = $term_name . '一覧ページ';
      $description = DESCRIPTION_PREFIX . $term_name . '一覧ページです。';
    }
  ?>
    <title><?= esc_html($title) ?> | <?= SITE_NAME ?></title>
    <meta content="<?= esc_attr($description) ?>" name="description">
  <?php
  // 検索結果ページの場合
  elseif (is_search()):
  ?>
    <title>検索結果 | <?= SITE_NAME ?></title>
    <meta content="<?= DESCRIPTION_PREFIX ?>検索結果ページです。" name="description">
  <?php
  // 404ページ
  elseif (is_404()):
  ?>
    <title>お探しのページはございません | <?= SITE_NAME ?></title>
    <meta content="<?= DESCRIPTION_PREFIX ?>404ページです。" name="description">
  <?php
  // それ以外のページ
  else:
  ?>
    <title><?php the_title() ?> | <?= SITE_NAME ?></title>
    <meta content="<?= DESCRIPTION_PREFIX ?><?php the_title() ?>ページです。" name="description">
  <?php
  endif;
  ?>
  <meta content="<?= KEYWORDS ?>" name="keywords">
  <meta content="telephone=metaTags" name="format-detection">
  <link rel="icon" href="<?= ASSETS_URI ?>/img/favicon.svg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
  <?php
  wp_head();
  ?>
</head>

<body style="display: none;">
  <header class="header">
    <div class="header__inner inner">
      <?php
      $home_url = esc_url(home_url('/'));
      $logo_element = <<<EOM
      <a class="header__link" href="$home_url">
        <svg class="header__logo">
          <use xlink:href="#logo"></use>
        </svg>
        <span class="header__text"><span class="header__text--large">きたむら</span><br class="br-pc">ミュージックスクール</span>
      </a>

EOM;

      if (is_front_page()) :
      ?>
        <h1 class="header__box">
          <?= $logo_element ?>
        </h1>
      <?php
      else :
      ?>
        <div class="header__box">
          <?= $logo_element ?>
        </div>
      <?php
      endif;
      ?>
      <nav class="header__nav header-nav">
        <div class="header-nav__button">
          <div class="header-nav__box">
            <div class="header-nav__line"></div>
          </div>
        </div>
        <div class="header-nav__container">
          <?php
          wp_nav_menu(
            array(
              'menu_class'     => 'header-nav__list',
              'theme_location' => 'primary',
              'container'      => false,
            )
          );
          ?>
        </div>
      </nav>
    </div>
  </header>
