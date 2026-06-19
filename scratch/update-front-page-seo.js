const fs = require('fs');
const path = 'aureus-theme/front-page.php';
let content = fs.readFileSync(path, 'utf8');

// 1. Change <p> to <h3> in Company Cards
content = content.replace(
  /<p class="text-\[0\.6875rem\] font-extrabold uppercase tracking-\[0\.08em\] text-\[#1e3a8a\] whitespace-nowrap">(.*?)<\/p>/g,
  '<h3 class="text-[0.6875rem] font-extrabold uppercase tracking-[0.08em] text-[#1e3a8a] whitespace-nowrap">$1</h3>'
);

// 2. Change <h4> to <h3> in News List (right column)
content = content.replace(
  /<h4 class="news-list-title"><a href="<\?php the_permalink\(\); \?>"><\?php the_title\(\); \?><\/a><\/h4>/g,
  '<h3 class="news-list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>'
);

// 3. Add aria-label to ecosystem "Khám phá thêm"
content = content.replace(
  /class="eco-discover inline-flex items-center/g,
  'aria-label="<?php esc_attr_e(\'Khám phá thêm về Hệ Sinh Thái Aureus Global\', \'aureus\'); ?>" class="eco-discover inline-flex items-center'
);

// 4. Add aria-label to Company "View All"
content = content.replace(
  /<a href="#ecosystem" class="inline-flex items-center gap-2 text-\[10px\]/g,
  '<a href="#ecosystem" aria-label="<?php esc_attr_e(\'Xem tất cả các công ty thành viên\', \'aureus\'); ?>" class="inline-flex items-center gap-2 text-[10px]'
);

// 5. Add aria-label to Company "Learn More"
content = content.replace(
  /<a href="<\?php echo esc_url\(\$link\['url'\]\); \?>" target="<\?php echo esc_attr\(\$link\['target'\] \? \$link\['target'\] : '_self'\); \?>" class="text-\[0\.6875rem\] font-bold text-\[#1a56db\] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2\.5">/g,
  '<a href="<?php echo esc_url($link[\'url\']); ?>" target="<?php echo esc_attr($link[\'target\'] ? $link[\'target\'] : \'_self\'); ?>" aria-label="<?php echo esc_attr($link[\'title\'] ? $link[\'title\'] : \'Tìm hiểu thêm về công ty này\'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">'
);
content = content.replace(
  /<a href="#" class="text-\[0\.6875rem\] font-bold text-\[#1a56db\] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2\.5">/g,
  '<a href="#" aria-label="<?php esc_attr_e(\'Tìm hiểu thêm về công ty này\', \'aureus\'); ?>" class="text-[0.6875rem] font-bold text-[#1a56db] inline-flex items-center gap-1 transition-all duration-300 hover:gap-2.5">'
);

// 6. Add aria-label to Investor "Tìm hiểu thêm"
content = content.replace(
  /<a href="#investment" class="btn-primary inline-flex items-center/g,
  '<a href="#investment" aria-label="<?php esc_attr_e(\'Tìm hiểu thêm về Quan hệ Cổ đông\', \'aureus\'); ?>" class="btn-primary inline-flex items-center'
);

// 7. Add aria-label to News Featured CTA
content = content.replace(
  /<a href="<\?php the_permalink\(\); \?>" class="news-featured-cta">/g,
  '<a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( \'Đọc bài viết: %s\', \'aureus\' ), get_the_title() ) ); ?>" class="news-featured-cta">'
);

fs.writeFileSync(path, content, 'utf8');
console.log('front-page.php SEO attributes updated.');
