<?php
require_once get_template_directory() . '/assets/src/config.php';

$title = get_the_title();

get_header();
?>
<main class="blog-details">
  <?php
  get_template_part('template-parts/breadcrumbs');
  ?>
  <div class="blog-details__inner inner">
    <div class="blog-details__container">
      <div class="blog-details__main">
        <?php
        if (have_posts()):
          while (have_posts()):
            the_post();
        ?>
            <article class="blog-details__content details-content">
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
                        $terms = get_the_terms(get_the_ID(), 'blog_cate');
                        if (!empty($terms) && !is_wp_error($terms)) {
                          echo esc_html($terms[0]->name);
                        }
                        ?>
                      </p>
                    </div>
                    <h1 class="card__title page-title">
                      <span class="card__title-text"><?= $title ?></span>
                    </h1>
                    <time class="card__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
                    <nav class="details-content__sns blog-details-sns">
                      <ul class="blog-details-sns__list">
                        <?php
                        $url = urlencode(get_permalink());
                        $title = urlencode(get_the_title());

                        $sns = [
                          [
                            'text' => 'facebook',
                            'url' => 'https://www.facebook.com/share.php?u=' . $url
                          ],
                          [
                            'text' => 'Twitter',
                            'url' => 'https://x.com/share?url=' . $url . '&text=' . $title
                          ],
                          [
                            'text' => 'Hatena',
                            'url' => 'http://b.hatena.ne.jp/add?mode=confirm&url=' . $url . '&title=' . $title
                          ],
                          [
                            'text' => 'LINE',
                            'url' => 'https://social-plugins.line.me/lineit/share?url=' . $url
                          ],
                          [
                            'text' => 'Pocket',
                            'url' => 'https://getpocket.com/edit?url=' . $url . '&title=' . $title
                          ],
                        ];
                        foreach ($sns as $value) :
                          $lower_name = strtolower($value['text']);
                          $class_name = ' ' . $lower_name;
                          $file_name = $lower_name . '.svg';
                          $image_name = '/img/blog/icon/' . $file_name;
                          $image_path = ASSETS . $image_name;
                          $svg = simplexml_load_file($image_path);
                          $width = (string)$svg['width'];
                          $height = (string)$svg['height'];
                        ?>
                          <li class="blog-details-sns__item<?= $class_name ?>">
                            <a class="blog-details-sns__link" href="<?= esc_url($value['url']) ?>" target="_blank" rel="noreferrer">
                              <div class="blog-details-sns__image"><img class="img-w-100" alt="<?= $value['text'] ?>" src="<?= ASSETS_URI . $image_name ?>" width="<?= $width ?>" height="<?= $height ?>" loading="lazy"></div>
                              <p class="blog-details-sns__text"><?= $value['text'] ?></p>
                            </a>
                          </li>
                        <?php
                        endforeach;
                        ?>
                      </ul>
                    </nav>
                  </div>
                </div>
                <div class="details-content__body">
                  <?php the_content() ?>
                </div>
              </div>
              <?php
              $prev_post = get_previous_post();
              $next_post = get_next_post();
              ?>
              <div class="details-content__bottom details-bottom">
                <div class="details-bottom__box">
                  <?php
                  if (!empty($prev_post)):
                  ?>
                    <a class="details-bottom__link" href="<?= get_permalink($prev_post->ID) ?>">
                      <p class="details-bottom__prev">◀︎ 前の記事</p>
                      <div class="details-bottom__image">
                        <?php
                        if (has_post_thumbnail($prev_post->ID)):
                          echo get_the_post_thumbnail($prev_post->ID);
                        else:
                        ?>
                          <img src="<?= NO_IMAGE_URI ?>" alt="No image">
                        <?php
                        endif;
                        ?>
                      </div>
                      <p class="details-bottom__title ellipsis"><?= wp_trim_words($prev_post->post_title, 25, '...') ?></p>
                    </a>
                  <?php
                  endif;
                  ?>
                </div>
                <div class="details-bottom__box">
                  <?php
                  if (!empty($next_post)):
                  ?>
                    <a class="details-bottom__link" href="<?= get_permalink($next_post->ID) ?>">
                      <p class="details-bottom__next">次の記事 ▶︎</p>
                      <div class="details-bottom__image">
                        <?php
                        if (has_post_thumbnail($next_post->ID)):
                          echo get_the_post_thumbnail($next_post->ID);
                        else:
                        ?>
                          <img src="<?= NO_IMAGE_URI ?>" alt="No image">
                        <?php
                        endif;
                        ?>
                      </div>
                      <p class="details-bottom__title ellipsis"><?= wp_trim_words($next_post->post_title, 25, '...') ?></p>
                    </a>
                  <?php
                  endif;
                  ?>
                </div>
              </div>
            </article>
        <?php
          endwhile;
        endif;

        get_template_part('template-parts/related-articles');
        ?>
      </div>
      <?php
      get_sidebar();
      ?>
    </div>
  </div>
</main>

<?php
get_footer();
