<?php
require_once get_template_directory() . '/assets/src/config.php';

get_header();
?>
<main class="top">
  <section class="top__hero top-hero hero">
    <div class="top-hero__image hero__image">
      <picture>
        <source srcset="<?= ASSETS_URI ?>/img/top/hero-pc.jpg" media="(min-width: 768px)">
        <img class="img-w-100" src="<?= ASSETS_URI ?>/img/top/hero-sp.jpg" alt="「音楽で生きる」を叶えるミュージックスクール" width="1125" height="1650">
      </picture>
    </div>
    <h2 class="top-hero__head hero__head">「音楽で生きる」<br class="br-sp">を叶える<br>
      ミュージックスクール</h2>
  </section>
  <section class="top__topic top-topic">
    <div class="top-topic__inner inner">
      <h2 class="top-topic__head title">全人類、<br class="br-sp">ミュージシャン計画。</h2>
      <p class="top-topic__text">私たちは音楽を愛するすべての人が、音楽に熱狂できる世界を目指しています。</p>
      <div class="top-topic__semicircle">
        <picture>
          <source srcset="<?= ASSETS_URI ?>/img/top/semicircle-pc.svg" media="(min-width: 768px)">
          <img class="img-w-100" src="<?= ASSETS_URI ?>/img/top/semicircle-sp.svg" alt="" width="335" height="37" loading="lazy">
        </picture>
      </div>
      <div class="top-topic__table">
        <p class="top-topic__data top-topic__data--left">Enthusiasm</p>
        <p class="top-topic__data top-topic__data--circle"></p>
        <p class="top-topic__data top-topic__data--right">熱狂し</p>
        <p class="top-topic__data top-topic__data--left">Envision</p>
        <p class="top-topic__data top-topic__data--circle"></p>
        <p class="top-topic__data top-topic__data--right">想像し</p>
        <p class="top-topic__data top-topic__data--left top-topic__data--bottom">Effulgent</p>
        <p class="top-topic__data top-topic__data--circle"></p>
        <p class="top-topic__data top-topic__data--right top-topic__data--bottom">輝く存在へ</p>
      </div>
    </div>
  </section>
  <section class="top__about top-about">
    <h2 class="top-about__head title">音楽業界初！<br>
      収益化までサポートする<br class="br-sp">ミュージックスクール</h2>
    <p class="top-about__text">楽器や作詞作曲などの<br class="br-sp">技術・知識はもちろんのこと<br>
      自分で稼ぎつづけるための<br class="br-sp">ビジネス面もサポートします！</p>
  </section>
  <section class="top__reason top-reason">
    <div class="top-reason__inner inner">
      <h2 class="top-reason__head title">きたむらミュージック<br class="br-sp">スクールが選ばれる理由</h2>
      <ul class="top-reason__list">
        <?php
        $reason = [
          [
            'src'  => '01',
            'title' => '技術面はプロによるマンツーマン授業！',
            'text' => '第一線で活躍するプロによるマンツーマン授業で、きめ細かな技術指導が受けられます。',
          ],
          [
            'src'  => '02',
            'title' => '収益化するためのビジネスサポート！',
            'text' => 'コンセプト設計や集客方法、マーケティングリサーチなど、音楽で稼ぎつづけるための方法やマインドセットをサポートするクラスをご用意。',
          ],
          [
            'src'  => '03',
            'title' => '24時間365日使える練習ROOMを完備！',
            'text' => '一年中使える個室の練習ROOMを完備しているため、お仕事帰りや合間の時間も自由に練習が可能です。　（アプリで予約が必要です）',
          ],
        ];
        foreach ($reason as $value) :
        ?>
          <li class="top-reason__item">
            <div class="top-reason__image">
              <picture>
                <source srcset="<?= ASSETS_URI ?>/img/top/reason/<?= $value['src'] ?>-pc.jpg" media="(min-width: 768px)">
                <img class="top-reason__img img-100" src="<?= ASSETS_URI ?>/img/top/reason/<?= $value['src'] ?>-sp.jpg" alt="" width="335" height="200" loading="lazy">
              </picture>
            </div>
            <div class="top-reason__box">
              <h3 class="top-reason__title"><?= $value['title'] ?></h3>
              <div class="top-reason__content">
                <p class="top-reason__text"><?= $value['text'] ?></p>
              </div>
            </div>
          </li>
        <?php
        endforeach;
        ?>
      </ul>
    </div>
  </section>
  <section class="top__voice top-voice">
    <div class="top-voice__inner inner">
      <h2 class="top-voice__head title">生徒さんたちの声</h2>
      <div class="top-voice__container">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php
            $args = array(
              'post_type' => 'result',
              'posts_per_page' => 6,
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
              while ($the_query->have_posts()) :
                $the_query->the_post();
            ?>
                <div class="swiper-slide">
                  <a class="top-voice__link" href="<?php the_permalink() ?>">
                    <div class="top-voice__image">
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
                    <h3 class="top-voice__title ellipsis"><span class="top-voice__job"><?php the_field('job') ?></span><?php the_field('name') ?>さん</h3>
                    <p class="top-voice__text ellipsis"><?= wp_trim_words(get_the_content(), 42, '...') ?></p>
                  </a>
                </div>
            <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>
          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </section>
  <section class="top__guide top-guide">
    <div class="top-guide__inner inner">
      <h2 class="top-guide__head title">ご利用の流れ</h2>
      <div class="top-guide__container">
        <ul class="top-guide__list">
          <?php
          $guide = [
            [
              'title' => 'お問い合わせ',
              'text' => 'まずはフォームまたはメールにてお問い合わせください。<br>ヒアリングの日程を調整します。',
            ],
            [
              'title' => 'ヒアリング',
              'text' => '現在の技術面や将来の目標などをお伺いします。<br>悩みや不安な事もお気軽にご相談ください。',
            ],
            [
              'title' => 'プランのご提案',
              'text' => 'ライフスタイルや目標によって最適なプランをご提案します。<br>継続できるようサポートいたします。',
            ],
            [
              'title' => 'ご入学',
              'text' => 'お申し込み完了後、レッスンがスタートします。<br>マンツーマン指導なので、いつからでもスタートが可能です。',
            ],
          ];
          foreach ($guide as $value) :
          ?>
            <li class="top-guide__item">
              <p class="top-guide__circle"></p>
              <h3 class="top-guide__title"><?= $value['title'] ?></h3>
              <p class="top-guide__text"><?= $value['text'] ?></p>
            </li>
          <?php
          endforeach;
          ?>
        </ul>
        <p class="top-guide__line"></p>
      </div>
    </div>
  </section>
  <section class="top__faq top-faq">
    <div class="top-faq__inner inner">
      <h2 class="top-faq__head title">よくあるご質問</h2>
      <div class="top-faq__container">
        <?php
        $faq = [
          [
            'question' => 'どのような生徒さんがどれぐらいの期間で稼いでいますか？',
            'answer' => '途中でプラン変更も可能です。毎月15日までに申請すれば翌月からプランが変更となります。',
          ],
          [
            'question' => '途中でプランを変更することは可能ですか？',
            'answer' => '途中でプラン変更も可能です。毎月15日までに申請すれば翌月からプランが変更となります。',
          ],
          [
            'question' => '入学金などの分割払いはできますか？',
            'answer' => '途中でプラン変更も可能です。毎月15日までに申請すれば翌月からプランが変更となります。',
          ],
          [
            'question' => '休学することも可能ですか？',
            'answer' => '途中でプラン変更も可能です。毎月15日までに申請すれば翌月からプランが変更となります。',
          ],
        ];
        foreach ($faq as $value) :
        ?>
          <dl class="top-faq__list">
            <dt class="top-faq__question">
              <div class="top-faq__box">
                <p class="top-faq__text"><?= $value['question'] ?></p>
                <div class="top-faq__arrow"><img class="img-w-100" src="<?= ASSETS_URI ?>/img/top/faq-arrow-sp.svg" alt="" width="15" height="11" loading="lazy"></div>
              </div>
            </dt>
            <dd class="top-faq__answer">
              <div class="top-faq__box">
                <p class="top-faq__text"><?= $value['answer'] ?></p>
              </div>
            </dd>
          </dl>
        <?php
        endforeach;
        ?>
      </div>
    </div>
  </section>
  <section class="top__blog top-blog">
    <div class="top-blog__inner inner">
      <h2 class="top-blog__head title">ブログ</h2>
      <ul class="top-blog__list">
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
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) :
            $the_query->the_post();
        ?>
            <li class="top-blog__item">
              <a class="top-blog__card card" href="<?php the_permalink() ?>">
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
                <h3 class="card__title ellipsis"><?= wp_trim_words(get_the_title(), 20, '...') ?></h3>
                <time class="card__date" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('Y.m.d') ?></time>
              </a>
            </li>
        <?php
          endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </ul>
      <a class="top-blog__link" href="<?= esc_url(home_url('blog')) ?>">ブログ一覧へ</a>
    </div>
  </section>
</main>
<?php
get_footer();
