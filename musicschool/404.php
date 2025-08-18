<?php
require_once get_template_directory() . '/assets/src/config.php';

$title = '404 not fonud';

get_header();
?>
<main class="page404">
  <section class="page404__hero page404-hero hero">
    <div class="index-hero__image hero__image">
      <picture>
        <source srcset="<?= ASSETS_URI ?>/img/404/hero-pc.jpg" media="(min-width: 768px)">
        <img class="img-w-100" src="<?= ASSETS_URI ?>/img/404/hero-sp.jpg" alt="<?= $title ?>" width="1125" height="1650">
      </picture>
    </div>
    <h1 class="hero__head"><?= $title ?></h1>
  </section>
  <div class="page404__inner inner">
    <div class="page404__container">
      <p class="page404__text">申し訳ございませんが、お探しのページが見つかりませんでした。<br>
        お探しのページは一時的に表示ができない状態にあるか、移動または削除された可能性があります。</p>
      <a class="contact__button contact-button button page404__button" href="<?= esc_url(home_url()) ?>">ホームへ戻る</a>
    </div>
  </div>
</main>
<?php
get_footer();
