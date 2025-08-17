<?php
require_once get_template_directory() . '/assets/src/config.php';

$post_type = get_post_type();
$title = get_post_type_object($post_type)->labels->name;

get_header();
?>
<main class="blog">
  <section class="blog__hero blog-hero hero">
    <div class="index-hero__image hero__image">
      <picture>
        <source srcset="<?= ASSETS_URI ?>/img/blog/hero-pc.jpg" media="(min-width: 768px)">
        <img class="img-w-100" src="<?= ASSETS_URI ?>/img/blog/hero-sp.jpg" alt="<?= $title ?>" width="1125" height="1650">
      </picture>
    </div>
    <h1 class="hero__head"><?= $title ?></h1>
  </section>
  <?php
  get_template_part('template-parts/breadcrumbs');
  ?>
  <section class="blog__content blog-content">
    <div class="blog__inner inner">
      <h2 class="blog-content__head page-title">ブログ一覧</h2>
      <div class="blog-content__container">
        <?php
        if (have_posts()):
          while (have_posts()):
            the_post();
        ?>
            <article class="blog-content__item">
              <a class="blog-content__card card" href="<?php the_permalink() ?>">
                <div class="card__image-box">
                  <div class="card__image">
                    <?php
                    if (has_post_thumbnail()) :
                      the_post_thumbnail();
                    else :
                    ?>
                      <img src="<?= NO_IMAGE_URI ?>" alt="No image">
                    <?php
                    endif;
                    ?>
                  </div>
                  <p class="card__tag">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'blog_cate');
                    if (!empty($terms) && !is_wp_error($terms)) {
                      echo esc_html($terms[0]->name);
                    }
                    ?>
                  </p>
                </div>
                <h3 class="card__title ellipsis"><?= wp_trim_words(get_the_title(), 26, '...') ?></h3>
                <time class="card__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
                <p class="card__text card__text--list ellipsis"><?= wp_trim_words(get_the_content(), 120, '...') ?></p>
              </a>
            </article>
        <?php
          endwhile;
        endif;
        ?>
      </div>
      <nav class="blog__pager pager">
        <?php
        wp_pagenavi();
        ?>
      </nav>
    </div>
  </section>
</main>
<?php
get_footer();
