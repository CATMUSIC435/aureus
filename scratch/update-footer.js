const fs = require('fs');
const path = 'aureus-theme/footer.php';
let content = fs.readFileSync(path, 'utf8');

// Replace Social Links
const oldSocials = `<div class="flex gap-2.5" aria-label="Social media links">
              <a href="#" class="footer-social" aria-label="LinkedIn">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
              </a>
              <a href="#" class="footer-social" aria-label="Twitter/X">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
              </a>
              <a href="#" class="footer-social" aria-label="Facebook">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
              </a>
            </div>`;

const newSocials = `<div class="flex gap-2.5" aria-label="Social media links">
            <?php if( function_exists('have_rows') && have_rows('footer_socials', 'option') ): ?>
                <?php while( have_rows('footer_socials', 'option') ): the_row(); ?>
                    <a href="<?php echo esc_url(get_sub_field('link')); ?>" target="_blank" class="footer-social" aria-label="Social Link">
                        <?php echo get_sub_field('icon_svg'); ?>
                    </a>
                <?php endwhile; ?>
            <?php else: ?>
              <a href="#" class="footer-social" aria-label="LinkedIn">
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
              </a>
            <?php endif; ?>
            </div>`;
content = content.replace(oldSocials, newSocials);

// Replace Column Titles
content = content.replace(
    '<p class="footer-col-head">Hệ Sinh Thái</p>',
    '<p class="footer-col-head"><?php echo function_exists(\'get_field\') && get_field(\'footer_col_1_title\', \'option\') ? esc_html(get_field(\'footer_col_1_title\', \'option\')) : \'Hệ Sinh Thái\'; ?></p>'
);
content = content.replace(
    '<p class="footer-col-head">Công nghệ</p>',
    '<p class="footer-col-head"><?php echo function_exists(\'get_field\') && get_field(\'footer_col_2_title\', \'option\') ? esc_html(get_field(\'footer_col_2_title\', \'option\')) : \'Công nghệ\'; ?></p>'
);
content = content.replace(
    '<p class="footer-col-head">Đầu tư</p>',
    '<p class="footer-col-head"><?php echo function_exists(\'get_field\') && get_field(\'footer_col_3_title\', \'option\') ? esc_html(get_field(\'footer_col_3_title\', \'option\')) : \'Đầu tư\'; ?></p>'
);
content = content.replace(
    '<p class="footer-col-head">Quan hệ Cổ đông</p>',
    '<p class="footer-col-head"><?php echo function_exists(\'get_field\') && get_field(\'footer_col_4_title\', \'option\') ? esc_html(get_field(\'footer_col_4_title\', \'option\')) : \'Quan hệ Cổ đông\'; ?></p>'
);
content = content.replace(
    '<p class="footer-col-head">Về Chúng Tôi</p>',
    '<p class="footer-col-head"><?php echo function_exists(\'get_field\') && get_field(\'footer_col_5_title\', \'option\') ? esc_html(get_field(\'footer_col_5_title\', \'option\')) : \'Về Chúng Tôi\'; ?></p>'
);
content = content.replace(
    '<p class="footer-col-head">Tuyển dụng</p>',
    '<p class="footer-col-head"><?php echo function_exists(\'get_field\') && get_field(\'footer_col_6_title\', \'option\') ? esc_html(get_field(\'footer_col_6_title\', \'option\')) : \'Tuyển dụng\'; ?></p>'
);

// Replace Copyright
const oldCopyright = `© <?php echo date('Y'); ?> AUREUS GLOBAL. All rights reserved.`;
const newCopyright = `<?php echo function_exists('get_field') && get_field('footer_copyright', 'option') ? str_replace('{year}', date('Y'), get_field('footer_copyright', 'option')) : '© ' . date('Y') . ' AUREUS GLOBAL. All rights reserved.'; ?>`;
content = content.replace(oldCopyright, newCopyright);

// Replace Legal Links
const oldLegalLinks = `<div class="flex items-center gap-4 order-1 lg:order-2">
            <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Chính sách Bảo mật</a>
            <span class="text-gray-300 text-xs">|</span>
            <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Điều khoản Sử dụng</a>
            <span class="text-gray-300 text-xs">|</span>
            <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Chính sách Cookie</a>
          </div>`;
          
const newLegalLinks = `<div class="flex items-center gap-4 order-1 lg:order-2">
            <?php if( function_exists('have_rows') && have_rows('footer_legal_links', 'option') ): ?>
                <?php $count = 0; while( have_rows('footer_legal_links', 'option') ): the_row(); $count++; ?>
                    <?php if($count > 1): ?><span class="text-gray-300 text-xs">|</span><?php endif; ?>
                    <a href="<?php echo esc_url(get_sub_field('url')); ?>" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors"><?php echo esc_html(get_sub_field('title')); ?></a>
                <?php endwhile; ?>
            <?php else: ?>
                <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Chính sách Bảo mật</a>
                <span class="text-gray-300 text-xs">|</span>
                <a href="#" class="text-[11px] text-gray-400 hover:text-[#1a56db] transition-colors">Điều khoản Sử dụng</a>
            <?php endif; ?>
          </div>`;

content = content.replace(oldLegalLinks, newLegalLinks);

fs.writeFileSync(path, content, 'utf8');
console.log('footer.php updated for options page.');
