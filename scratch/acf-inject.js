const fs = require('fs');
const path = 'aureus-theme/front-page.php';
let content = fs.readFileSync(path, 'utf8');

const replacements = [
  {
    target: `Building The<br />\n              Future <span style="color:#1a56db;">Ecosystem</span>`,
    replacement: `<?php echo function_exists('get_field') && get_field('hero_title') ? get_field('hero_title') : 'Building The<br />\n              Future <span style="color:#1a56db;">Ecosystem</span>'; ?>`
  },
  {
    target: `AUREUS GLOBAL kiến tạo và vận hành hệ sinh thái công nghệ\n              toàn diện dựa trên trí tuệ nhân tạo, dữ liệu và đổi mới sáng tạo,\n              mang lại giá trị bền vững cho doanh nghiệp và xã hội.`,
    replacement: `<?php echo function_exists('get_field') && get_field('hero_description') ? get_field('hero_description') : 'AUREUS GLOBAL kiến tạo và vận hành hệ sinh thái công nghệ\n              toàn diện dựa trên trí tuệ nhân tạo, dữ liệu và đổi mới sáng tạo,\n              mang lại giá trị bền vững cho doanh nghiệp và xã hội.'; ?>`
  },
  {
    target: `Một Tầm Nhìn.<br />Đa Sức Mạnh.`,
    replacement: `<?php echo function_exists('get_field') && get_field('eco_title') ? get_field('eco_title') : 'Một Tầm Nhìn.<br />Đa Sức Mạnh.'; ?>`
  },
  {
    target: `Hệ sinh thái được vận hành như một cơ thể\n              thống nhất, kết nối dữ liệu, công nghệ, con người\n              và vốn để tạo ra giá trị đột phá.`,
    replacement: `<?php echo function_exists('get_field') && get_field('eco_description') ? get_field('eco_description') : 'Hệ sinh thái được vận hành như một cơ thể\n              thống nhất, kết nối dữ liệu, công nghệ, con người\n              và vốn để tạo ra giá trị đột phá.'; ?>`
  },
  {
    target: `Four Core Pillars. One Strong Ecosystem.`,
    replacement: `<?php echo function_exists('get_field') && get_field('companies_title') ? get_field('companies_title') : 'Four Core Pillars. One Strong Ecosystem.'; ?>`
  },
  {
    target: `Bốn công ty thành viên – bốn năng lực cốt lõi –\n              một hệ sinh thái hợp lực để dẫn dắt tương lai.`,
    replacement: `<?php echo function_exists('get_field') && get_field('companies_description') ? get_field('companies_description') : 'Bốn công ty thành viên – bốn năng lực cốt lõi –\n              một hệ sinh thái hợp lực để dẫn dắt tương lai.'; ?>`
  },
  {
    target: `Tầm nhìn Dài hạn. Tăng trưởng Bền vững.`,
    replacement: `<?php echo function_exists('get_field') && get_field('investor_title') ? get_field('investor_title') : 'Tầm nhìn Dài hạn. Tăng trưởng Bền vững.'; ?>`
  },
  {
    target: `Chiến lược dài hạn dựa trên quản trị minh bạch,\n              tài chính vững mạnh và đổi mới không ngừng.`,
    replacement: `<?php echo function_exists('get_field') && get_field('investor_description') ? get_field('investor_description') : 'Chiến lược dài hạn dựa trên quản trị minh bạch,\n              tài chính vững mạnh và đổi mới không ngừng.'; ?>`
  }
];

replacements.forEach(r => {
  content = content.replace(r.target, r.replacement);
});

fs.writeFileSync(path, content, 'utf8');
console.log('ACF fields injected');
