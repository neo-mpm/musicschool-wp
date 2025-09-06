<aside class="blog-details__aside">
  <div class="blog-details__magazine blog-details-magazine details-aside">
    <p class="blog-details-magazine__head details-aside__title">無料メールマガジン</p>
    <div class="blog-details-magazine__container">
      <a href="<?= esc_url(home_url('/')) ?>" class="blog-details-magazine__link">
        <p class="blog-details-magazine__image">バナー広告</p>
      </a>
    </div>
  </div>
  <div class="blog-details__search blog-details-search details-aside">
    <p class="blog-details-search__head details-aside__title">ブログ内を検索</p>
    <div class="blog-details-search__container">
      <?php
      get_search_form();
      ?>
    </div>
  </div>
  <div class="blog-details__recommend blog-details-recommend details-aside">
    <p class="blog-details-recommend__head details-aside__title">おすすめの記事</p>
    <ul class="blog-details-recommend__list">
      <?php
      $args = array(
        'posts_per_page' => 3,
        'post_type' => 'blog',
        'taxonomy' => 'blog_recommend',
        'term' => 'recommend',
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()):
        while ($the_query->have_posts()): $the_query->the_post();
      ?>
          <li class="blog-details-recommend__item">
            <a class="blog-details-recommend__card card" href="<?php the_permalink() ?>">
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
              </div>
              <p class="card__title ellipsis"><?= wp_trim_words(get_the_title(), 15, '...') ?></p>
            </a>
          </li>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </ul>
  </div>
  <div class="blog-details__category blog-details-category details-aside">
    <p class="blog-details-category__head details-aside__title">カテゴリー</p>
    <ul class="blog-details-category__list">
      <?php
      $terms = get_terms([
        'taxonomy' => 'blog_cate',
        'hide_empty' => true,
      ]);
      if (!is_wp_error($terms) && !empty($terms)) :
        foreach ($terms as $term):
          $term_link = get_term_link($term->term_id);
      ?>
          <li class="blog-details-category__item">
            <a class="blog-details-category__link" href="<?= esc_url($term_link) ?>"><?= esc_html($term->name) ?></a>
          </li>
      <?php
        endforeach;
      endif;
      ?>
    </ul>
  </div>
</aside>
