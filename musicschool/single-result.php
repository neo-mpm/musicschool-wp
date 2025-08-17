<?php
require_once get_template_directory() . '/assets/src/config.php';

$title = get_the_title();

get_header();
?>
<main class="result-details">
  <?php
  get_template_part('template-parts/breadcrumbs');
  ?>
  <div class="result-details__inner inner">
    <div class="result-details__container">
      <?php
      if (have_posts()):
        while (have_posts()):
          the_post();
      ?>
          <article class="result-details__content details-content">
            <div class="details-content__inner">
              <div class="details-content__container">
                <div class="details-content__card card">
                  <div class="card__image-box">
                    <div class="card__image">
                      <?php
                      if (has_post_thumbnail()) :
                        the_post_thumbnail('full');
                      else :
                      ?>
                        <img src="<?= NO_IMAGE_URI ?>" alt="No image">
                      <?php
                      endif;
                      ?>
                    </div>
                    <p class="card__tag">
                      <?php
                      $terms = get_the_terms(get_the_ID(), 'genre');
                      if (!empty($terms) && !is_wp_error($terms)) {
                        echo $terms[0]->name;
                      }
                      ?>
                    </p>
                  </div>
                  <h1 class="card__title page-title"><span class="card__title-text"><?= $title ?></span></h1>
                  <time class="card__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
                  <div class="result-details__box">
                    <table class="result-details__table result-details-table">
                      <?php
                      $detail = [
                        '名前' => get_field('name'),
                        '職業' => get_field('job'),
                        'ジャンル' => $terms[0]->name,
                        '実績' => get_field('achievements'),
                        'SNS' => get_field('sns'),
                      ];
                      foreach ($detail as $key => $value) :
                      ?>
                        <tr>
                          <th class="result-details-table__th"><?= $key ?></th>
                          <td class="result-details-table__td"><?= $value ?></td>
                        </tr>
                      <?php
                      endforeach;
                      ?>
                    </table>
                    <div class="result-details__text details-content__text card__text">
                      <?php
                      the_content();
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </article>
      <?php
        endwhile;
      endif;

      get_template_part('template-parts/single-pagination');

      get_template_part('template-parts/related-articles');
      ?>
    </div>
  </div>
</main>
<?php
get_footer();
