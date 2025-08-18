<?php
require_once get_template_directory() . '/assets/src/config.php';

$title = get_the_title();

get_header();
?>
<main class="contact">
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
      <p class="contact__text">当校に関するご質問・ご相談・資料請求は下記のフォームからお気軽にお問い合わせください。<br>
        通常３営業日以内にメールにてご連絡させていただきます。</p>
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          remove_filter('the_content', 'wpautop');
          the_content();
        endwhile;
      endif;
      ?>
    </div>
  </div>
</main>
<?php
get_footer();
