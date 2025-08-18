<form action="<?= esc_url(home_url('/')) ?>" method="get" class="blog-details-search__form">
  <input type="search" name="s" class="blog-details-search__input" placeholder="検索ワード" value="">
  <button type="submit" class="blog-details-search__button"><img src="<?= ASSETS_URI ?>/img/blog/icon/search.svg" alt="検索" width="24" height="24" loading="lazy"></button>
</form>
