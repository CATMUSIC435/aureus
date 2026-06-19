const fs = require('fs');
const path = 'aureus-theme/front-page.php';
let content = fs.readFileSync(path, 'utf8');

// Replace get_field('xxx') with get_field('xxx', 'option')
// But ignore get_field('xxx', 'option') if it already exists
content = content.replace(/get_field\(\s*'([^']+)'\s*\)/g, "get_field('$1', 'option')");
content = content.replace(/get_field\(\s*"([^"]+)"\s*\)/g, "get_field('$1', 'option')");

// Replace have_rows('xxx') with have_rows('xxx', 'option')
content = content.replace(/have_rows\(\s*'([^']+)'\s*\)/g, "have_rows('$1', 'option')");
content = content.replace(/have_rows\(\s*"([^"]+)"\s*\)/g, "have_rows('$1', 'option')");

// Note: get_sub_field should NOT be changed.
// Let's make sure we didn't accidentally mess up anything else.
// The regex looks for exactly one string argument. If it had two arguments, it wouldn't match.

fs.writeFileSync(path, content, 'utf8');
console.log('front-page.php updated to use options page.');
