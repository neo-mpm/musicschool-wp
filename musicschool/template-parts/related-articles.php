<?php
$post_type = get_post_type(); // 投稿タイプを取得
$post_id = get_the_ID();

// 投稿タイプに応じて使うタクソノミーを定義（必要に応じて追加可能）
$taxonomy_map = [
  'blog' => 'blog_cate',
  'result' => 'genre',
];

// 投稿タイプに対応するタクソノミーが定義されているか確認
if (!isset($taxonomy_map[$post_type])) {
  return;
}

$taxonomy = $taxonomy_map[$post_type];
$terms = get_the_terms($post_id, $taxonomy);

if (!empty($terms)) :
  $term_ids = wp_list_pluck($terms, 'term_id');

  $args = [
    'posts_per_page' => 3,
    'post_type' => $post_type,
    'post__not_in' => [$post_id],
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => [
      [
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $term_ids,
      ],
    ],
  ];

  $the_query = new WP_Query($args);

  $class_name = null;
  if ($post_type === 'result') {
    $class_name = 'result-details__related ';
  }

  if ($the_query->have_posts()):
?>
    <aside class="<?= $class_name ?>blog-details__related details-related details-aside">
      <h2 class="details-related__head details-aside__title">関連記事</h2>
      <ul class="details-related__list">
        <?php
        while ($the_query->have_posts()):
          $the_query->the_post();
          // 投稿の最初のタームの名前を取得
          $post_terms = get_the_terms(get_the_ID(), $taxonomy);
          $term_name = (!empty($post_terms)) ? $post_terms[0]->name : '';
        ?>
          <li class="details-related__item">
            <a class="details-related__card card" href="<?php the_permalink() ?>">
              <div class="card__image-box">
                <div class="card__image">
                  <?php
                  if (has_post_thumbnail()):
                    the_post_thumbnail();
                  else:
                  ?>
                    <img src="<?= get_template_directory_uri() ?>/images/common/no-image.png" alt="No image">
                  <?php
                  endif;
                  ?>
                </div>
                <p class="card__tag"><?= esc_html($term_name) ?></p>
              </div>
              <h3 class="card__title ellipsis"><?= wp_trim_words(get_the_title(), 32, '...') ?></h3>
              <time class="card__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
            </a>
          </li>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
      </ul>
    </aside>
<?php
  endif;
endif;
?>
