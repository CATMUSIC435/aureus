<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The header for our theme
 *
 * @package Aureus_Global
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Preconnect for external CDNs (Fonts, jQuery, GSAP) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="preconnect" href="https://code.jquery.com" crossorigin />
  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin />
  <link rel="dns-prefetch" href="https://code.jquery.com" />
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com" />

  <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-50'); ?>>
<?php wp_body_open(); ?>

  <!-- ═══════════════════════════════════════════ NAVBAR ═══════════════════════════════════════════ -->
  <header id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white transition-shadow duration-300">
    <div class="max-w-screen-xl mx-auto px-4 xl:px-6">
      <div class="flex items-center h-16 xl:h-[68px] gap-6 xl:gap-8">

        <!-- ── Logo ── -->
        <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 shrink-0 mr-2 xl:mr-6">
          <img
            src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png"
            alt="<?php bloginfo( 'name' ); ?>"
            class="h-9 xl:h-10 w-auto object-contain"
            onerror="this.style.display='none'; document.getElementById('logo-fallback').style.display='flex';"
          />
          <!-- Fallback SVG logo if image not found -->
          <div id="logo-fallback" style="display:none;" class="flex items-center gap-2">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
              <polygon points="18,2 32,30 4,30" fill="none" stroke="#1a56db" stroke-width="3.5"/>
              <polygon points="18,14 24,26 12,26" fill="#e02424"/>
              <rect x="22" y="10" width="12" height="10" rx="2" fill="#e02424" opacity="0.9"/>
              <rect x="25" y="13" width="6" height="6" rx="1" fill="#fff"/>
            </svg>
            <div class="leading-tight">
              <span class="block text-sm font-bold tracking-wider text-aureus-blue uppercase">Aureus</span>
              <span class="block text-xs font-bold tracking-widest text-aureus-red uppercase">Global</span>
            </div>
          </div>
        </a>

        <!-- ── Desktop Nav Links ── -->
        <?php
        wp_nav_menu( array(
            'theme_location' => 'menu-1',
            'container'      => 'nav',
            'container_id'   => 'desktop-nav',
            'container_class'=> 'hidden xl:flex items-center gap-1 flex-1',
            'menu_class'     => '',
            'fallback_cb'    => false, // Fallback to custom HTML below if no menu assigned
        ) );
        
        // Fallback static menu if wp_nav_menu doesn't output anything (can happen before setup)
        if ( ! has_nav_menu( 'menu-1' ) ) :
        ?>
        <nav id="desktop-nav" class="hidden xl:flex items-center gap-1 flex-1">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-nav="HOME" class="nav-link active text-[11px] font-semibold uppercase text-gray-800 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Trang chủ</a>
          <a href="#ecosystem" data-nav="ECOSYSTEM" class="nav-link text-[11px] font-semibold uppercase text-gray-600 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Hệ Sinh Thái</a>
          <a href="#technology" data-nav="TECHNOLOGY" class="nav-link text-[11px] font-semibold uppercase text-gray-600 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Công Nghệ</a>
          <a href="#investor" data-nav="INVESTMENT" class="nav-link text-[11px] font-semibold uppercase text-gray-600 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Đầu Tư</a>
          <a href="#about" data-nav="ABOUT US" class="nav-link text-[11px] font-semibold uppercase text-gray-600 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Về Chúng Tôi</a>
          <a href="#investor" data-nav="INVESTOR RELATIONS" class="nav-link text-[11px] font-semibold uppercase text-gray-600 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Quan hệ Cổ đông</a>
          <a href="#news" data-nav="NEWS" class="nav-link text-[11px] font-semibold uppercase text-gray-600 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Tin tức</a>
          <a href="#careers" data-nav="CAREERS" class="nav-link text-[11px] font-semibold uppercase text-gray-600 px-2 py-1 hover:text-aureus-blue transition-colors duration-200">Tuyển dụng</a>
        </nav>
        <?php endif; ?>

        <!-- ── Right Actions ── -->
        <div class="hidden xl:flex items-center gap-3 ml-auto shrink-0">

          <!-- Language Selector -->
          <div class="relative" id="lang-wrapper">
            <button
              id="lang-btn"
              class="flex items-center gap-1.5 text-[11px] font-semibold text-gray-600 uppercase hover:text-aureus-blue transition-colors duration-200 px-2 py-1"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <!-- Globe icon -->
              <svg class="w-4 h-4 opacity-70" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
                <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
              </svg>
              <span id="lang-label">EN</span>
              <svg id="lang-chevron" class="w-3 h-3 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path d="M6 9l6 6 6-6"/>
              </svg>
            </button>
            <div id="lang-dropdown" class="lang-dropdown" role="listbox">
              <div class="lang-option" data-lang="EN" data-langcode="en" role="option" tabindex="0">🇺🇸 English</div>
              <div class="lang-option" data-lang="VI" data-langcode="vi" role="option" tabindex="0">🇻🇳 Tiếng Việt</div>
            </div>
          </div>

          <!-- Contact Us Button -->
          <a
            id="contact-btn"
            href="<?php echo function_exists('get_field') && get_field('contact_link', 'option') ? esc_url(get_field('contact_link', 'option')) : '#contact'; ?>"
            class="contact-btn flex items-center gap-2 text-[11px] font-semibold uppercase tracking-wider text-aureus-blue border border-aureus-blue rounded px-4 py-2 hover:bg-aureus-blue hover:text-white transition-all duration-300"
          >
            Liên hệ
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path d="M5 12h14M13 6l6 6-6 6"/>
            </svg>
          </a>
        </div>

        <!-- ── Mobile Hamburger ── -->
        <button
          id="hamburger"
          class="xl:hidden ml-auto flex flex-col justify-center gap-[5px] p-2 rounded"
          aria-label="Toggle menu"
        >
          <span id="ham-1" class="block h-0.5 w-6 bg-gray-700 rounded transition-all duration-300 origin-center"></span>
          <span id="ham-2" class="block h-0.5 w-6 bg-gray-700 rounded transition-all duration-300"></span>
          <span id="ham-3" class="block h-0.5 w-6 bg-gray-700 rounded transition-all duration-300 origin-center"></span>
        </button>
      </div>
    </div>

    <!-- ── Mobile Menu ── -->
    <?php
    wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'container'      => 'nav',
        'container_id'   => 'mobile-menu',
        'container_class'=> 'mobile-menu',
        'menu_class'     => '',
        'fallback_cb'    => false, // Fallback to static below
    ) );
    
    if ( ! has_nav_menu( 'menu-1' ) ) :
    ?>
    <nav id="mobile-menu" class="mobile-menu" aria-label="Mobile navigation">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-xs font-semibold uppercase tracking-wider text-aureus-blue px-6 py-3 border-b border-gray-100">Trang chủ</a>
      <a href="#ecosystem" class="text-xs font-semibold uppercase tracking-wider text-gray-600 px-6 py-3 border-b border-gray-100 hover:text-aureus-blue hover:bg-gray-50 transition-colors">Hệ Sinh Thái</a>
      <a href="#technology" class="text-xs font-semibold uppercase tracking-wider text-gray-600 px-6 py-3 border-b border-gray-100 hover:text-aureus-blue hover:bg-gray-50 transition-colors">Công Nghệ</a>
      <a href="#investor" class="text-xs font-semibold uppercase tracking-wider text-gray-600 px-6 py-3 border-b border-gray-100 hover:text-aureus-blue hover:bg-gray-50 transition-colors">Đầu Tư</a>
      <a href="#about" class="text-xs font-semibold uppercase tracking-wider text-gray-600 px-6 py-3 border-b border-gray-100 hover:text-aureus-blue hover:bg-gray-50 transition-colors">Về Chúng Tôi</a>
      <a href="#investor" class="text-xs font-semibold uppercase tracking-wider text-gray-600 px-6 py-3 border-b border-gray-100 hover:text-aureus-blue hover:bg-gray-50 transition-colors">Quan hệ Cổ đông</a>
      <a href="#news" class="text-xs font-semibold uppercase tracking-wider text-gray-600 px-6 py-3 border-b border-gray-100 hover:text-aureus-blue hover:bg-gray-50 transition-colors">Tin tức</a>
      <a href="#careers" class="text-xs font-semibold uppercase tracking-wider text-gray-600 px-6 py-3 border-b border-gray-100 hover:text-aureus-blue hover:bg-gray-50 transition-colors">Tuyển dụng</a>
      <div class="px-6 pt-4 pb-5 flex items-center justify-between">
        <div class="flex items-center gap-2 text-xs font-semibold text-gray-600">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10"/>
            <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1 4-10z"/>
          </svg>
          EN
        </div>
        <a href="<?php echo function_exists('get_field') && get_field('contact_link', 'option') ? esc_url(get_field('contact_link', 'option')) : '#contact'; ?>" class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-aureus-blue border border-aureus-blue rounded px-4 py-2">
          Contact Us
          <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path d="M5 12h14M13 6l6 6-6 6"/>
          </svg>
        </a>
      </div>
    </nav>
    <?php endif; ?>
  </header>
