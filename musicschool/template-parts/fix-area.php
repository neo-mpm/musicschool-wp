<div class="links">
  <div class="links__inner inner">
    <a class="links__to-top" href="javascript:void(0);">
      <svg viewBox="0 0 68 68">
        <circle cx="34" cy="34" r="34" />
        <path d="M45.6527 42.2031L34.0764 26.4995L22.5 42.2031" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </a>
    <?php if (!is_page('contact')) : ?>
      <a class="links__to-contact links-to-contact button" href="<?= esc_url(home_url('contact')); ?>"><span class="links-to-contact__span">お問い合わせ</span></a>
    <?php endif; ?>
  </div>
</div>
