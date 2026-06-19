const fs = require('fs');
const path = 'aureus-theme/header.php';
let content = fs.readFileSync(path, 'utf8');

const oldSearch = `placeholder="<?php echo esc_attr_e( 'Tìm kiếm...', 'aureus' ); ?>"`;
const newSearch = `placeholder="<?php echo function_exists('get_field') && get_field('header_search_placeholder', 'option') ? esc_attr(get_field('header_search_placeholder', 'option')) : esc_attr__('Tìm kiếm...', 'aureus'); ?>"`;

content = content.replace(oldSearch, newSearch);

fs.writeFileSync(path, content, 'utf8');
console.log('header.php search placeholder updated.');
