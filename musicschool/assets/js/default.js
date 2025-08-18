const breakpoint = 768;

// body style is set to 'display: none;' to prevent flash of unstyled content
document.addEventListener('DOMContentLoaded', (e) => {
  document.body.style.display = 'block';
});

// Nav Toggle Button
const navToggle = document.querySelector('.header-nav__button');
const navContainer = document.querySelector('.header-nav__container');

function toggleNav() {
  if (window.innerWidth >= breakpoint) return;

  if (navToggle && navContainer) {
    navToggle.classList.toggle('open');
    navContainer.classList.toggle('open');
  }
}

if (navToggle) {
  navToggle.addEventListener('click', toggleNav);
}

// top-voice
const voiceSwiperBlock = '.top-voice';
const voiceSwiperElement = document.querySelector(voiceSwiperBlock);
if (voiceSwiperElement) {
  const voiceSwiper = new Swiper(voiceSwiperBlock + ' .swiper', {
    navigation: {
      nextEl: voiceSwiperBlock + ' .swiper-button-next',
      prevEl: voiceSwiperBlock + ' .swiper-button-prev',
    },
    slidesPerView: 'auto',
  });
}

// top-faq
function accordions() {
  const accordions = document.querySelectorAll('.top-faq__list');

  accordions.forEach(function (accordion) {
    const accordionBtn = accordion.querySelector('.top-faq__question');
    const accordionTarget = accordion.querySelector('.top-faq__answer');

    accordionBtn.addEventListener('click', function () {
      const isOpen = accordion.classList.contains('is-open');

      if (isOpen) {
        accordionTarget.style.height = '0px';
      } else {
        const scrollHeight = accordionTarget.scrollHeight;
        accordionTarget.style.height = scrollHeight + 'px';
      }

      accordion.classList.toggle('is-open');
      accordionTarget.classList.toggle('is-open');
    });

    accordionTarget.addEventListener('click', function () {
      accordionTarget.style.height = '0px';

      accordion.classList.toggle('is-open');
      accordionTarget.classList.toggle('is-open');
    });
  });
}

document.addEventListener('DOMContentLoaded', accordions);

// back-to-top
function handleScrollTopBtn() {
  const SCROLL_THRESHOLD = 100;
  const scrollTopBtn = document.querySelector('.links');

  if (scrollY > SCROLL_THRESHOLD) {
    scrollTopBtn.classList.add('active');
  } else {
    scrollTopBtn.classList.remove('active');
  }
}

window.addEventListener('scroll', handleScrollTopBtn, { passive: true });
window.addEventListener('resize', handleScrollTopBtn);
window.addEventListener('DOMContentLoaded', handleScrollTopBtn);

if (window.visualViewport) {
  window.visualViewport.addEventListener('resize', handleScrollTopBtn);
}

document.addEventListener('DOMContentLoaded', function () {
  const scrollTopBtn = document.querySelector('.links__to-top');
  if (scrollTopBtn) {
    scrollTopBtn.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
});
