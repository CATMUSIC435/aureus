const fs = require('fs');
const path = 'aureus-theme/front-page.php';
let content = fs.readFileSync(path, 'utf8');

const oldFeaturedQuery = `$featured_news = new WP_Query( array(
              'post_type'           => 'post',
              'posts_per_page'      => 1,
              'ignore_sticky_posts' => 1,
          ) );`;

const newFeaturedQuery = `$selected_news = function_exists('get_field') ? get_field('homepage_selected_news') : false;
          
          if ( !empty($selected_news) && is_array($selected_news) ) {
              $featured_news = new WP_Query( array(
                  'post_type'      => 'post',
                  'post__in'       => array( $selected_news[0] ),
                  'posts_per_page' => 1,
                  'orderby'        => 'post__in'
              ) );
          } else {
              $featured_news = new WP_Query( array(
                  'post_type'           => 'post',
                  'posts_per_page'      => 1,
                  'ignore_sticky_posts' => 1,
              ) );
          }`;

content = content.replace(oldFeaturedQuery, newFeaturedQuery);


const oldListQuery = `$list_news = new WP_Query( array(
              'post_type'           => 'post',
              'posts_per_page'      => 4,
              'offset'              => 1, // Skip the first one which is featured
              'ignore_sticky_posts' => 1,
          ) );`;

const newListQuery = `$selected_news = function_exists('get_field') ? get_field('homepage_selected_news') : false;
          
          if ( !empty($selected_news) && is_array($selected_news) && count($selected_news) > 1 ) {
              $list_ids = array_slice($selected_news, 1);
              $list_news = new WP_Query( array(
                  'post_type'      => 'post',
                  'post__in'       => $list_ids,
                  'posts_per_page' => count($list_ids),
                  'orderby'        => 'post__in'
              ) );
          } else {
              $list_news = new WP_Query( array(
                  'post_type'           => 'post',
                  'posts_per_page'      => 4,
                  'offset'              => 1, // Skip the first one which is featured
                  'ignore_sticky_posts' => 1,
              ) );
          }`;

content = content.replace(oldListQuery, newListQuery);

fs.writeFileSync(path, content, 'utf8');
console.log('front-page.php queries updated.');
