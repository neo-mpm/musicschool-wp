<div class="blog-details__extra">
  <aside class="blog-details__magazine blog-details-magazine details-aside">
    <h4 class="blog-details-magazine__head details-aside__title">無料メールマガジン</h4>
    <div class="blog-details-magazine__container">
      <a href="details.php" class="blog-details-magazine__link">
        <p class="blog-details-magazine__image">バナー広告</p>
      </a>
    </div>
  </aside>
  <aside class="blog-details__search blog-details-search details-aside">
    <h4 class="blog-details-search__head details-aside__title">ブログ内を検索</h4>
    <div class="blog-details-search__container">
      <form action="../search/" method="post" class="blog-details-search__form">
        <input type="search" name="search" class="blog-details-search__input" placeholder="" value="">
        <button type="submit" class="blog-details-search__button"><img src="<?= ASSETS_URI ?>/img/blog/icon/search.svg" alt="" width="24" height="24" loading="lazy"></button>
      </form>
    </div>
  </aside>
  <aside class="blog-details__recommend blog-details-recommend details-aside">
    <h4 class="blog-details-recommend__head details-aside__title">おすすめの記事</h4>
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
            <a class="blog-details-recommend__card card" href="<?php the_permalink(); ?>">
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
              <h5 class="card__title ellipsis"><?php echo wp_trim_words(get_the_title(), 15, '...'); ?></h5>
            </a>
          </li>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </ul>
  </aside>
  <aside class="blog-details__category blog-details-category details-aside">
    <h4 class="blog-details-category__head details-aside__title">カテゴリー</h4>
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
            <a class="blog-details-category__link" href="<?php echo esc_url($term_link); ?>"><?php echo esc_html($term->name); ?></a>
          </li>
      <?php
        endforeach;
      endif;
      ?>
    </ul>
  </aside>
</div>
