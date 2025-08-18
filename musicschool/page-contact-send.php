<?php
require_once get_template_directory() . '/assets/src/config.php';

$title = 'お問い合わせ';

get_header();
?>
<main class="contact contact--send">
  <section class="contact__hero contact-hero hero">
    <div class="index-hero__image hero__image">
      <picture>
        <source srcset="<?= ASSETS_URI ?>/img/contact/hero-pc.jpg" media="(min-width: 768px)">
        <img class="img-w-100" src="<?= ASSETS_URI ?>/img/contact/hero-sp.jpg" alt="<?= $title ?>" width="1125" height="1650">
      </picture>
    </div>
    <h1 class="hero__head"><?= $title ?></h1>
  </section>
  <?php
  get_template_part('template-parts/breadcrumbs');
  ?>
  <div class="contact__container">
    <div class="contact__inner inner">
      <p class="contact__text">お問い合わせいただきありがとうございました。<br>
        内容確認後、担当者よりメールにてご連絡いたします。</p>
      <a class="contact__button contact-button contact-button--send button" href="<?= esc_url(home_url('/')) ?>">ホームへ戻る</a>
    </div>
  </div>
</main>
<?php
get_footer();
