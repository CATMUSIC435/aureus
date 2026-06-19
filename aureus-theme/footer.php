<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The template for displaying the footer
 *
 * @package Aureus_Global
 */
?>

    <!-- ═══════════════════ FOOTER ═══════════════════ -->
    <footer class="footer-section pt-14 pb-0" id="footer" aria-label="Site footer">
      <div class="max-w-screen-xl mx-auto px-6 xl:px-10">

        <!-- Main grid: brand + 6 columns -->
        <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-[220px_1fr_1fr_1fr_1fr_1fr_1fr] gap-x-6 gap-y-10 pb-12">

          <!-- Brand Column -->
          <div class="col-span-2 md:col-span-4 xl:col-span-1">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-aureus-global.png" alt="Aureus Global" style="height:52px; mix-blend-mode:multiply; margin-bottom:14px;" />
            <p class="text-[12px] text-gray-500 leading-relaxed mb-6 max-w-[190px]">
              <?php echo function_exists('get_field') && get_field('footer_description', 'option') ? get_field('footer_description', 'option') : 'Building the future ecosystem through technology, data and sustainable investments.'; ?>
            </p>
            <!-- Social icons -->
            <div class="flex gap-2.5" aria-label="Social media links">
              <a href="#" class="footer-social" aria-label="LinkedIn">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
              </a>
              <a href="#" class="footer-social" aria-label="Twitter/X">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
              </a>
              <a href="#" class="footer-social" aria-label="Facebook">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
              </a>
            </div>
          </div>

          <!-- Col 1: ECOSYSTEM -->
          <div>
            <p class="footer-col-head"><?php echo function_exists('get_field') && get_field('footer_col_1_title', 'option') ? esc_html(get_field('footer_col_1_title', 'option')) : 'Hệ Sinh Thái'; ?></p>
            <?php
            if (has_nav_menu('footer-1')) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-1',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 footer-nav',
                    'fallback_cb'    => false,
                ) );
            } else {
            ?>
            <ul class="space-y-2.5">
              <li><a href="#companies" class="footer-link">Aureus Lab</a></li>
              <li><a href="#companies" class="footer-link">DIP Tech</a></li>
              <li><a href="#companies" class="footer-link">Aureus Digital</a></li>
              <li><a href="#companies" class="footer-link">Aureus Ventures</a></li>
            </ul>
            <?php } ?>
          </div>

          <!-- Col 2: TECHNOLOGY -->
          <div>
            <p class="footer-col-head"><?php echo function_exists('get_field') && get_field('footer_col_2_title', 'option') ? esc_html(get_field('footer_col_2_title', 'option')) : 'Công nghệ'; ?></p>
            <?php
            if (has_nav_menu('footer-2')) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-2',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 footer-nav',
                    'fallback_cb'    => false,
                ) );
            } else {
            ?>
            <ul class="space-y-2.5">
              <li><a href="#technology" class="footer-link">AI &amp; Dữ liệu</a></li>
              <li><a href="#technology" class="footer-link">Nghiên cứu &amp; Đổi mới</a></li>
              <li><a href="#technology" class="footer-link">Giải pháp</a></li>
              <li><a href="#technology" class="footer-link">Nền tảng</a></li>
            </ul>
            <?php } ?>
          </div>

          <!-- Col 3: INVESTMENT -->
          <div>
            <p class="footer-col-head"><?php echo function_exists('get_field') && get_field('footer_col_3_title', 'option') ? esc_html(get_field('footer_col_3_title', 'option')) : 'Đầu tư'; ?></p>
            <?php
            if (has_nav_menu('footer-3')) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-3',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 footer-nav',
                    'fallback_cb'    => false,
                ) );
            } else {
            ?>
            <ul class="space-y-2.5">
              <li><a href="#investment" class="footer-link">Vốn Đầu tư Mạo hiểm</a></li>
              <li><a href="#investment" class="footer-link">Danh mục Đầu tư</a></li>
              <li><a href="#investment" class="footer-link">Tiêu chí Đầu tư</a></li>
            </ul>
            <?php } ?>
          </div>

          <!-- Col 4: INVESTOR RELATIONS -->
          <div>
            <p class="footer-col-head"><?php echo function_exists('get_field') && get_field('footer_col_4_title', 'option') ? esc_html(get_field('footer_col_4_title', 'option')) : 'Quan hệ Cổ đông'; ?></p>
            <?php
            if (has_nav_menu('footer-4')) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-4',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 footer-nav',
                    'fallback_cb'    => false,
                ) );
            } else {
            ?>
            <ul class="space-y-2.5">
              <li><a href="#investor" class="footer-link">Tổng quan</a></li>
              <li><a href="#investor" class="footer-link">Báo cáo Tài chính</a></li>
              <li><a href="#investor" class="footer-link">Thuyết trình</a></li>
              <li><a href="#investor" class="footer-link">ESG &amp; Phát triển Bền vững</a></li>
            </ul>
            <?php } ?>
          </div>

          <!-- Col 5: ABOUT US -->
          <div>
            <p class="footer-col-head"><?php echo function_exists('get_field') && get_field('footer_col_5_title', 'option') ? esc_html(get_field('footer_col_5_title', 'option')) : 'Về Chúng Tôi'; ?></p>
            <?php
            if (has_nav_menu('footer-5')) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-5',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 footer-nav',
                    'fallback_cb'    => false,
                ) );
            } else {
            ?>
            <ul class="space-y-2.5">
              <li><a href="#" class="footer-link">Về chúng tôi</a></li>
              <li><a href="#" class="footer-link">Tầm nhìn &amp; Sứ mệnh</a></li>
              <li><a href="#" class="footer-link">Giá trị cốt lõi</a></li>
              <li><a href="#" class="footer-link">Ban lãnh đạo</a></li>
            </ul>
            <?php } ?>
          </div>

          <!-- Col 6: CAREERS -->
          <div>
            <p class="footer-col-head"><?php echo function_exists('get_field') && get_field('footer_col_6_title', 'option') ? esc_html(get_field('footer_col_6_title', 'option')) : 'Tuyển dụng'; ?></p>
            <?php
            if (has_nav_menu('footer-6')) {
                wp_nav_menu( array(
                    'theme_location' => 'footer-6',
                    'container'      => false,
                    'menu_class'     => 'space-y-2.5 footer-nav',
                    'fallback_cb'    => false,
                ) );
            } else {
            ?>
            <ul class="space-y-2.5">
              <li><a href="#" class="footer-link">Văn hóa</a></li>
              <li><a href="#" class="footer-link">Cơ hội nghề nghiệp</a></li>
              <li><a href="#" class="footer-link">Phát triển sự nghiệp</a></li>
            </ul>
            <?php } ?>
          </div>

        </div><!-- /main grid -->

        <!-- Bottom bar -->
        <div class="border-t border-gray-200 py-5 flex flex-col lg:flex-row items-center justify-between gap-3">
          <!-- Left: copyright -->
          <p class="text-[11px] text-gray-400 order-2 lg:order-1">
            <?php echo function_exists('get_field') && get_field('footer_copyright', 'option') ? str_replace('{year}', date('Y'), get_field('footer_copyright', 'option')) : '© ' . date('Y') . ' AUREUS GLOBAL. All rights reserved.'; ?>
          </p>
          <!-- Center: legal links -->
          <div class="flex items-center gap-4 order-1 lg:order-2">
            <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Chính sách Bảo mật</a>
            <span class="text-gray-300 text-xs">|</span>
            <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Điều khoản Sử dụng</a>
            <span class="text-gray-300 text-xs">|</span>
            <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Chính sách Cookie</a>
          </div>
          <!-- Right: contact info -->
          <div class="flex items-center gap-4 order-3">
            <?php $email = function_exists('get_field') && get_field('contact_email', 'option') ? get_field('contact_email', 'option') : 'contact@aureus.global'; ?>
            <a href="mailto:<?php echo esc_attr($email); ?>" class="text-[11px] text-gray-500 hover:text-[#1a56db] transition-colors flex items-center gap-1.5">
              <svg class="w-3 h-3 text-[#1a56db]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <?php echo esc_html($email); ?>
            </a>
            <?php $phone = function_exists('get_field') && get_field('contact_phone', 'option') ? get_field('contact_phone', 'option') : '+84 28 7310 8888'; ?>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="text-[11px] text-gray-500 hover:text-[#1a56db] transition-colors flex items-center gap-1.5">
              <svg class="w-3 h-3 text-[#1a56db]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.61 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.09 6.09l.94-.94a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <?php echo esc_html($phone); ?>
            </a>
          </div>
        </div>

      </div>
    </footer>

  <!-- External JS (deferred — runs after DOM ready) -->
  <!-- Note: scripts are enqueued via wp_footer() in WordPress -->

  <!-- Google Translate -->
  <div id="google_translate_element" style="display: none;"></div>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'auto',
        includedLanguages: 'en,vi',
        autoDisplay: false
      }, 'google_translate_element');
    }
  </script>
  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" defer></script>

<?php wp_footer(); ?>
</body>
</html>
