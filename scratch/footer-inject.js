const fs = require('fs');
const path = 'aureus-theme/footer.php';
let content = fs.readFileSync(path, 'utf8');

const replacements = [
  {
    target: `<p class="text-[12px] text-gray-500 leading-relaxed mb-6 max-w-[190px]">\n              Building the future ecosystem through technology, data and sustainable investments.\n            </p>`,
    replacement: `<p class="text-[12px] text-gray-500 leading-relaxed mb-6 max-w-[190px]">\n              <?php echo function_exists('get_field') && get_field('footer_description', 'option') ? get_field('footer_description', 'option') : 'Building the future ecosystem through technology, data and sustainable investments.'; ?>\n            </p>`
  },
  {
    target: `<a href="mailto:contact@aureus.global" class="text-[11px] text-gray-500 hover:text-[#1a56db] transition-colors flex items-center gap-1.5">\n              <svg class="w-3 h-3 text-[#1a56db]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>\n              contact@aureus.global\n            </a>`,
    replacement: `<?php $email = function_exists('get_field') && get_field('contact_email', 'option') ? get_field('contact_email', 'option') : 'contact@aureus.global'; ?>\n            <a href="mailto:<?php echo esc_attr($email); ?>" class="text-[11px] text-gray-500 hover:text-[#1a56db] transition-colors flex items-center gap-1.5">\n              <svg class="w-3 h-3 text-[#1a56db]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>\n              <?php echo esc_html($email); ?>\n            </a>`
  },
  {
    target: `<a href="tel:+842873108888" class="text-[11px] text-gray-500 hover:text-[#1a56db] transition-colors flex items-center gap-1.5">\n              <svg class="w-3 h-3 text-[#1a56db]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.61 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.09 6.09l.94-.94a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>\n              +84 28 7310 8888\n            </a>`,
    replacement: `<?php $phone = function_exists('get_field') && get_field('contact_phone', 'option') ? get_field('contact_phone', 'option') : '+84 28 7310 8888'; ?>\n            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="text-[11px] text-gray-500 hover:text-[#1a56db] transition-colors flex items-center gap-1.5">\n              <svg class="w-3 h-3 text-[#1a56db]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.61 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.09 6.09l.94-.94a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>\n              <?php echo esc_html($phone); ?>\n            </a>`
  }
];

replacements.forEach(r => {
  content = content.replace(r.target, r.replacement);
});

// For menus:
const menuMap = {
  'footer-1': `            <ul class="space-y-2.5">\n              <li><a href="#companies" class="footer-link">Aureus Lab</a></li>\n              <li><a href="#companies" class="footer-link">DIP Tech</a></li>\n              <li><a href="#companies" class="footer-link">Aureus Digital</a></li>\n              <li><a href="#companies" class="footer-link">Aureus Ventures</a></li>\n            </ul>`,
  'footer-2': `            <ul class="space-y-2.5">\n              <li><a href="#technology" class="footer-link">AI &amp; Dữ liệu</a></li>\n              <li><a href="#technology" class="footer-link">Nghiên cứu &amp; Đổi mới</a></li>\n              <li><a href="#technology" class="footer-link">Giải pháp</a></li>\n              <li><a href="#technology" class="footer-link">Nền tảng</a></li>\n            </ul>`,
  'footer-3': `            <ul class="space-y-2.5">\n              <li><a href="#investment" class="footer-link">Vốn Đầu tư Mạo hiểm</a></li>\n              <li><a href="#investment" class="footer-link">Danh mục Đầu tư</a></li>\n              <li><a href="#investment" class="footer-link">Tiêu chí Đầu tư</a></li>\n            </ul>`,
  'footer-4': `            <ul class="space-y-2.5">\n              <li><a href="#investor" class="footer-link">Tổng quan</a></li>\n              <li><a href="#investor" class="footer-link">Báo cáo Tài chính</a></li>\n              <li><a href="#investor" class="footer-link">Thuyết trình</a></li>\n              <li><a href="#investor" class="footer-link">ESG &amp; Phát triển Bền vững</a></li>\n            </ul>`,
  'footer-5': `            <ul class="space-y-2.5">\n              <li><a href="#" class="footer-link">Về chúng tôi</a></li>\n              <li><a href="#" class="footer-link">Tầm nhìn &amp; Sứ mệnh</a></li>\n              <li><a href="#" class="footer-link">Giá trị cốt lõi</a></li>\n              <li><a href="#" class="footer-link">Ban lãnh đạo</a></li>\n            </ul>`,
  'footer-6': `            <ul class="space-y-2.5">\n              <li><a href="#" class="footer-link">Văn hóa</a></li>\n              <li><a href="#" class="footer-link">Cơ hội nghề nghiệp</a></li>\n              <li><a href="#" class="footer-link">Phát triển sự nghiệp</a></li>\n            </ul>`
};

for (const [loc, html] of Object.entries(menuMap)) {
  const dynamicCode = `            <?php\n            if (has_nav_menu('${loc}')) {\n                wp_nav_menu( array(\n                    'theme_location' => '${loc}',\n                    'container'      => false,\n                    'menu_class'     => 'space-y-2.5 footer-nav',\n                    'fallback_cb'    => false,\n                ) );\n            } else {\n            ?>\n${html}\n            <?php } ?>`;
  content = content.replace(html, dynamicCode);
}

fs.writeFileSync(path, content, 'utf8');
console.log('Footer replacements applied');
