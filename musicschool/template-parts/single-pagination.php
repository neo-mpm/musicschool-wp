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
