<?php
require_once get_template_directory() . '/assets/src/config.php';

$title = get_the_title();

get_header();
?>
<main class="search">
  <?php
  get_template_part('template-parts/breadcrumbs');
  ?>
  <section class="search__content search-content blog-content">
    <div class="search__inner inner">
      <?php
      if (!empty(get_search_query())):
        if (have_posts()):
          $total_posts = $wp_query->found_posts;
      ?>
          <div class="search-content__head search-content-head blog-content__head">
            <h1 class="search-content-head__text">「<span class="search-content-head__text--bold"><?= get_search_query() ?></span>」の検索結果</h1>
            <p class="search-content-head__text"><?= $total_posts ?>件</p>
          </div>
          <div class="search-content__container blog-content__container">
            <?php
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
                  <h2 class="card__title ellipsis"><?= wp_trim_words(get_the_title(), 26, '...') ?></h2>
                  <time class="card__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
                  <p class="card__text card__text--list ellipsis"><?= wp_trim_words(get_the_content(), 120, '...') ?></p>
                </a>
              </article>
            <?php
            endwhile;
            ?>
          </div>
          <nav class="blog__pager pager">
            <?php
            wp_pagenavi();
            ?>
          </nav>
        <?php
        else :
        ?>
          <div class="search-content__no-result">
            <p>検索されたキーワードにマッチする<br class="br-sp">記事はありませんでした。</p>
            <a onclick="history.back()" class="contact__button contact-button contact-button--send button">戻る</a>
          </div>
        <?php
        endif;
      else:
        ?>
        <div class="search-content__no-result">
          <p>検索キーワードが未入力です。</p>
          <a onclick="history.back()" class="contact__button contact-button contact-button--send button">戻る</a>
        </div>
      <?php
      endif;
      ?>
    </div>
  </section>
</main>
<?php
get_footer();
