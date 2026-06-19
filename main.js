/*!
 * AUREUS GLOBAL — main.js  v2.0
 * Stack: jQuery 3.7 slim + GSAP 3.12 + ScrollTrigger
 * ─────────────────────────────────────────────────────
 * Sections:
 *  1. Config / constants
 *  2. GSAP plugin registration
 *  3. Navbar entrance animation
 *  4. Hero entrance animation
 *  5. ScrollTrigger section animations
 *  6. Stats count-up
 *  7. News slider
 *  8. Sticky header
 *  9. Language dropdown
 * 10. Mobile hamburger
 * 11. Active nav link
 * 12. Smooth scroll
 */

$(function () {
  /* ════════════════════════════════════════════════════
     1. Config / constants
  ════════════════════════════════════════════════════ */
  const EASE_OUT   = 'power3.out';
  const EASE_BACK  = 'back.out(1.5)';
  const ST_SHARED  = { toggleActions: 'play none none none' };

  /* Shared ScrollTrigger factory to avoid repetition */
  function st(trigger, start) {
    return { trigger, start: start || 'top 78%', ...ST_SHARED };
  }

  /* ════════════════════════════════════════════════════
     2. GSAP plugin registration  ← MUST be first
  ════════════════════════════════════════════════════ */
  gsap.registerPlugin(ScrollTrigger);

  /* ════════════════════════════════════════════════════
     3. Navbar entrance animation
  ════════════════════════════════════════════════════ */
  gsap.set('#navbar', { y: -80, opacity: 0 });

  gsap.timeline({ defaults: { ease: EASE_OUT } })
    .to('#navbar',                    { y: 0, opacity: 1, duration: 0.7 })
    .from('#logo',                    { x: -30, opacity: 0, duration: 0.5 }, '-=0.3')
    .from('#desktop-nav .nav-link',   { y: -20, opacity: 0, stagger: 0.07, duration: 0.4 }, '-=0.3')
    .from('#lang-btn',                { x: 20, opacity: 0, duration: 0.4 }, '-=0.3')
    .from('#contact-btn',             { x: 20, opacity: 0, duration: 0.4 }, '-=0.25');

  /* ════════════════════════════════════════════════════
     4. Hero entrance animation
  ════════════════════════════════════════════════════ */
  gsap.timeline({ defaults: { ease: EASE_OUT }, delay: 0.5 })
    .from('#hero-tag',       { y: 24, opacity: 0, duration: 0.55 })
    .from('#hero-title',     { y: 36, opacity: 0, duration: 0.65 }, '-=0.25')
    .from('#hero-desc',      { y: 24, opacity: 0, duration: 0.55 }, '-=0.3')
    .from('#hero-ctas',      { y: 20, opacity: 0, duration: 0.5  }, '-=0.25')
    .from('#hero-scroll',    { y: 16, opacity: 0, duration: 0.4  }, '-=0.2')
    .from('#hero-logo-wrap', { x: 60, opacity: 0, duration: 0.8, ease: 'power2.out' }, '-=1.1')
    .from('#hero-watch',     { y: 20, opacity: 0, duration: 0.45 }, '-=0.3');

  /* Watch intro CTA */
  $('#watch-intro-btn').on('click', function () {
    gsap.fromTo(this, { scale: 0.94 }, { scale: 1, duration: 0.3, ease: 'back.out(2)' });
    alert('Video player coming soon!');
  });

  /* ════════════════════════════════════════════════════
     5. ScrollTrigger section animations
  ════════════════════════════════════════════════════ */

  /* — Ecosystem — */
  gsap.from('.eco-left', { x: -50, opacity: 0, duration: 0.8, scrollTrigger: st('#ecosystem', 'top 75%') });
  
  if (document.querySelector('.network')) {
    const ecoSt = st('#ecosystem', 'top 75%');
    
    gsap.from(".center-node", {
      scale: 0.8, opacity: 0, duration: 1.2, ease: "power2.out",
      scrollTrigger: ecoSt
    });

    gsap.from(".logo-node", {
      scale: 0, opacity: 0, duration: 0.85, delay: 0.35, stagger: 0.12, ease: "back.out(1.8)",
      scrollTrigger: ecoSt
    });

    gsap.from(".line", {
      strokeDasharray: 900, strokeDashoffset: 900, opacity: 0, duration: 1.5, delay: 0.45, ease: "power2.out",
      scrollTrigger: ecoSt
    });

    // Continuous animations
    gsap.to(".logo-node", { y: -7, duration: 2.2, repeat: -1, yoyo: true, ease: "sine.inOut", stagger: 0.18 });
    gsap.to(".center-node", { scale: 1.015, duration: 3, repeat: -1, yoyo: true, ease: "sine.inOut" });
    gsap.to(".ring-1", { rotate: 360, duration: 32, repeat: -1, ease: "none" });
    gsap.to(".ring-2", { rotate: -360, duration: 38, repeat: -1, ease: "none" });
    gsap.to(".dot", { scale: 1.45, opacity: 0.4, duration: 1.2, repeat: -1, yoyo: true, stagger: 0.25, ease: "sine.inOut" });

    // Tooltip logic
    const tooltip = document.getElementById("tooltip");
    const tooltipTitle = document.getElementById("tooltipTitle");
    const tooltipDesc = document.getElementById("tooltipDesc");
    const tooltipTag = document.getElementById("tooltipTag");

    const moveTooltip = (e) => {
      const padding = 18;
      const tooltipWidth = tooltip.offsetWidth;
      const tooltipHeight = tooltip.offsetHeight;
      let x = e.clientX + 22;
      let y = e.clientY + 22;
      if (x + tooltipWidth > window.innerWidth - padding) x = e.clientX - tooltipWidth - 22;
      if (y + tooltipHeight > window.innerHeight - padding) y = e.clientY - tooltipHeight - 22;
      gsap.to(tooltip, { x, y, duration: 0.18, ease: "power2.out" });
    };

    document.querySelectorAll(".node").forEach((node) => {
      node.addEventListener("mouseenter", (e) => {
        if(tooltipTitle) tooltipTitle.textContent = node.dataset.title;
        if(tooltipDesc) tooltipDesc.textContent = node.dataset.desc;
        if(tooltipTag) tooltipTag.textContent = node.dataset.tag;
        gsap.to(node, { scale: 1.08, duration: 0.28, ease: "power2.out" });
        gsap.to(tooltip, { opacity: 1, scale: 1, duration: 0.22, ease: "power2.out" });
        moveTooltip(e);
      });
      node.addEventListener("mousemove", moveTooltip);
      node.addEventListener("mouseleave", () => {
        gsap.to(node, { scale: 1, duration: 0.28, ease: "power2.out" });
        gsap.to(tooltip, { opacity: 0, scale: 0.95, duration: 0.18, ease: "power2.out" });
      });
    });
  }

  /* — Stats Ticker — */
  gsap.from('.ticker-item', { y: 20, opacity: 0, stagger: 0.1, duration: 0.5, ease: 'power2.out', scrollTrigger: st('#stats', 'top 88%') });

  /* — Our Companies — */
  gsap.from('.co-left', { x: -40, opacity: 0, duration: 0.75, scrollTrigger: st('#companies') });
  gsap.from('.co-card',  { y: 36, opacity: 0, scale: 0.96, stagger: 0.12, duration: 0.6, ease: 'power2.out', scrollTrigger: st('#co-cards', 'top 80%') });

  /* — Technology — */
  gsap.from('.tech-header', { y: 30, opacity: 0, duration: 0.7,                           scrollTrigger: st('#technology') });
  gsap.from('.tech-card',   { y: 40, opacity: 0, stagger: 0.15, duration: 0.65,           scrollTrigger: st('#technology', 'top 70%') });

  /* — Investor Relations + News — */
  gsap.from('.ir-left',       { x: -35, opacity: 0, duration: 0.7,  scrollTrigger: st('#investor') });
  gsap.from('.pillar-item',   { y: 24, opacity: 0, stagger: 0.1, duration: 0.55, scrollTrigger: st('#investor', 'top 72%') });
  gsap.from('#ir-news-panel', { x: 35, opacity: 0, duration: 0.7,  scrollTrigger: st('#investor') });

  /* — Investment — */
  gsap.from('.invest-logos', { x: -40, opacity: 0, duration: 0.8, scrollTrigger: st('#investment', 'top 75%') });
  gsap.from('.invest-text',  { x:  40, opacity: 0, duration: 0.8, scrollTrigger: st('#investment', 'top 75%') });
  gsap.from('.logo-card',    { scale: 0.85, opacity: 0, stagger: 0.08, duration: 0.5, ease: 'back.out(1.4)', scrollTrigger: st('.logos-grid', 'top 80%') });

  /* — Global Banner — */
  gsap.from('#gb-text',  { x: -40, opacity: 0, duration: 0.7,  scrollTrigger: st('#global-banner', 'top 88%') });
  gsap.from('.gb-stat',  { y: 20, opacity: 0, stagger: 0.12, duration: 0.55, scrollTrigger: st('#global-banner', 'top 85%') });
  gsap.from('.gb-map',   { x: 60, opacity: 0, duration: 1,    scrollTrigger: st('#global-banner', 'top 88%') });

  /* — Contact — */
  gsap.from('.contact-card', { y: 50, opacity: 0, duration: 0.8, scrollTrigger: st('#contact', 'top 80%') });

  /* ════════════════════════════════════════════════════
     6. Stats count-up  (safe textContent update)
  ════════════════════════════════════════════════════ */
  $('.ticker-num[data-target]').each(function () {
    const $el    = $(this);
    const target = parseInt($el.data('target'), 10);
    if (isNaN(target)) return;

    const proxy = { val: 0 };

    ScrollTrigger.create({
      trigger: this,
      start: 'top 90%',
      once: true,
      onEnter: () => {
        gsap.to(proxy, {
          val: target,
          duration: 1.8,
          ease: 'power2.out',
          snap: { val: 1 },
          onUpdate() { $el.text(Math.round(proxy.val)); },
        });
      },
    });
  });

  /* ════════════════════════════════════════════════════
     7. News slider
  ════════════════════════════════════════════════════ */
  const NEWS_ITEMS = [
    { img: 'aureus_news.png', date: '24 Apr 2024', title: 'AUREUS GLOBAL công bố tầm nhìn chiến lược 2030' },
    { img: 'aureus_lab.png',  date: '10 Mar 2024', title: 'Aureus Lab ra mắt nền tảng AI thế hệ mới cho doanh nghiệp' },
    { img: 'dip_tech.png',    date: '15 Jan 2024', title: 'DIP Tech ký kết hợp tác chiến lược với 5 tập đoàn lớn' },
  ];

  let newsIdx      = 0;
  let newsTimer    = null;       // auto-advance handle
  const $newsDisp  = $('#news-display');
  const $newsImg   = $('#news-img');
  const $newsHead  = $('#news-headline');
  const $newsDots  = $('.news-dot');

  function setNews(idx) {
    newsIdx = ((idx % NEWS_ITEMS.length) + NEWS_ITEMS.length) % NEWS_ITEMS.length;
    const item = NEWS_ITEMS[newsIdx];

    gsap.to($newsDisp[0], {
      opacity: 0, y: 8, duration: 0.2,
      onComplete() {
        $newsImg.attr('src', item.img);
        $newsHead.text(item.title);
        gsap.to($newsDisp[0], { opacity: 1, y: 0, duration: 0.3 });
      },
    });

    $newsDots
      .removeClass('active')
      .attr('aria-selected', 'false')
      .eq(newsIdx)
      .addClass('active')
      .attr('aria-selected', 'true');
  }

  function startAutoplay() {
    stopAutoplay();
    newsTimer = setInterval(() => setNews(newsIdx + 1), 5000);
  }
  function stopAutoplay() {
    if (newsTimer) { clearInterval(newsTimer); newsTimer = null; }
  }

  /* Controls */
  $('#news-prev').on('click', () => { setNews(newsIdx - 1); startAutoplay(); });
  $('#news-next').on('click', () => { setNews(newsIdx + 1); startAutoplay(); });
  $newsDots.each(function (i) {
    $(this).on('click', () => { setNews(i); startAutoplay(); });
  });

  /* Pause on hover */
  $newsDisp.on('mouseenter', stopAutoplay).on('mouseleave', startAutoplay);

  /* Kick off */
  startAutoplay();

  /* ════════════════════════════════════════════════════
     8. Sticky header shadow (optimized via Lodash debounce)
  ════════════════════════════════════════════════════ */
  const $navbar = $('#navbar');

  $(window).on('scroll.aureus', _.debounce(function () {
    $navbar.toggleClass('scrolled', $(window).scrollTop() > 10);
  }, 10, { leading: true, trailing: true, maxWait: 20 }));

  /* ════════════════════════════════════════════════════
     9. Language dropdown
  ════════════════════════════════════════════════════ */
  const $langBtn      = $('#lang-btn');
  const $langDropdown = $('#lang-dropdown');
  const $langChevron  = $('#lang-chevron');
  const $langLabel    = $('#lang-label');

  if ($langBtn.length && $langDropdown.length) {
    $langBtn.on('click', function (e) {
      e.stopPropagation();
      const isOpen = $langDropdown.hasClass('open');

      $langDropdown.toggleClass('open', !isOpen);
      $langChevron.css('transform', !isOpen ? 'rotate(180deg)' : 'rotate(0deg)');
      $langBtn.attr('aria-expanded', !isOpen);

      if (!isOpen) {
        gsap.fromTo($langDropdown[0],
          { y: -8, opacity: 0, scale: 0.97 },
          { y: 0, opacity: 1, scale: 1, duration: 0.2, ease: 'power2.out' }
        );
      }
    });

    $('.lang-option').on('click', function () {
      const selectedLang = $(this).data('lang');
      const langCode = $(this).data('langcode');
      
      $langLabel.text(selectedLang);
      $langDropdown.removeClass('open');
      $langChevron.css('transform', 'rotate(0deg)');
      $langBtn.attr('aria-expanded', 'false');

      // Trigger Google Translate
      const googleSelect = document.querySelector('.goog-te-combo');
      if (googleSelect && langCode) {
        googleSelect.value = langCode;
        googleSelect.dispatchEvent(new Event('change'));
      }
    });

    /* Close on outside click */
    $(document).on('click.lang', () => {
      $langDropdown.removeClass('open');
      $langChevron.css('transform', 'rotate(0deg)');
      $langBtn.attr('aria-expanded', 'false');
    });
  }

  /* ════════════════════════════════════════════════════
     10. Mobile hamburger
  ════════════════════════════════════════════════════ */
  const $hamburger  = $('#hamburger');
  const $mobileMenu = $('#mobile-menu');
  const $ham1 = $('#ham-1');
  const $ham2 = $('#ham-2');
  const $ham3 = $('#ham-3');
  let menuOpen = false;

  function closeMobileMenu() {
    menuOpen = false;
    $mobileMenu.removeClass('open');
    gsap.to([$ham1[0], $ham3[0]], { rotate: 0, y: 0, duration: 0.25 });
    gsap.to($ham2[0], { opacity: 1, scaleX: 1, duration: 0.2 });
  }

  if ($hamburger.length && $mobileMenu.length) {
    $hamburger.on('click', function () {
      menuOpen = !menuOpen;
      $mobileMenu.toggleClass('open', menuOpen);

      if (menuOpen) {
        gsap.to($ham1[0], { rotate:  45, y:  5.5, duration: 0.25 });
        gsap.to($ham2[0], { opacity: 0, scaleX: 0, duration: 0.2 });
        gsap.to($ham3[0], { rotate: -45, y: -5.5, duration: 0.25 });
        gsap.from('#mobile-menu a, #mobile-menu div', {
          x: -20, opacity: 0, stagger: 0.05, duration: 0.3, ease: 'power2.out',
        });
      } else {
        closeMobileMenu();
      }
    });

    /* Close when a mobile link is clicked */
    $mobileMenu.find('a').on('click', closeMobileMenu);
  }

  /* ════════════════════════════════════════════════════
     11. Active nav link  (desktop)
  ════════════════════════════════════════════════════ */
  const $navLinks = $('#desktop-nav .nav-link');

  $navLinks.on('click', function (e) {
    const href = $(this).attr('href');

    // Update active state visually
    $navLinks
      .removeClass('active text-aureus-blue')
      .addClass('text-gray-600');

    $(this)
      .addClass('active text-aureus-blue')
      .removeClass('text-gray-600');

    gsap.fromTo(this, { scale: 0.92 }, { scale: 1, duration: 0.25, ease: 'back.out(2)' });

    // If it's a real page link (not anchor), navigate after brief animation
    if (href && !href.startsWith('#')) {
      e.preventDefault();
      setTimeout(function () { window.location.href = href; }, 180);
    }
    // Anchor links (#something) fall through to smooth scroll handler below
  });

  /* ════════════════════════════════════════════════════
     12. Smooth scroll for anchor links
  ════════════════════════════════════════════════════ */
  $(document).on('click', 'a[href^="#"]', function (e) {
    const href = $(this).attr('href');
    if (href === '#') {
      e.preventDefault();
      return;
    }
    try {
      const $target = $(href);
      if ($target.length) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: $target.offset().top - 80 }, 600);
      }
    } catch (err) {
      // Ignore invalid selectors
    }
  });

}); // end $(function)
