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
  <meta content="<?= KEYWORDS ?>" name="keywords">
  <meta content="<?= DESCRIPTION ?>" name="description">
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

      if (is_front_page() || is_search()) :
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
