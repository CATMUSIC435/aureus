<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The template for displaying all single posts
 *
 * @package Aureus_Global
 */

get_header();

$bg_style = '';
$bg_class = 'bg-gradient-to-r from-[#1a56db] to-[#1e3a8a]';
if ( has_post_thumbnail() ) {
    $bg_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    $bg_style = 'background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.85)), url(' . esc_url( $bg_image_url ) . '); background-size: cover; background-position: center;';
    $bg_class = '';
} else {
    $fallback_img = function_exists('get_field') ? get_field('default_hero_image', 'option') : false;
    if ( $fallback_img ) {
        $bg_style = 'background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.85)), url(' . esc_url( $fallback_img['url'] ) . '); background-size: cover; background-position: center;';
        $bg_class = '';
    }
}
?>

<main id="primary" class="site-main pt-[64px] xl:pt-[68px]">
    <?php while ( have_posts() ) : the_post(); ?>
    
    <!-- ── Article Hero ── -->
    <header class="article-hero relative py-16 xl:py-28 flex items-center justify-center <?php echo esc_attr($bg_class); ?>" style="<?php echo esc_attr($bg_style); ?>">
        <div class="max-w-screen-md mx-auto px-6 xl:px-10 text-center relative z-10">
            <!-- Category Badge -->
            <div class="mb-6">
                <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<span class="inline-block bg-blue-600 text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">' . esc_html( $categories[0]->name ) . '</span>';
                }
                ?>
            </div>
            
            <?php the_title( '<h1 class="text-3xl xl:text-4xl font-extrabold text-white leading-tight mb-6">', '</h1>' ); ?>
            
            <!-- Meta Data -->
            <div class="flex items-center justify-center gap-4 text-xs font-semibold text-gray-300 uppercase tracking-wider">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <?php echo esc_html( get_the_author() ); ?>
                </span>
                <span class="w-1 h-1 rounded-full bg-gray-500"></span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    <?php echo get_the_date(); ?>
                </span>
            </div>
        </div>
    </header>

    <!-- ── Breadcrumbs ── -->
    <?php if ( function_exists('yoast_breadcrumb') ) { ?>
        <div class="max-w-screen-md mx-auto px-6 xl:px-10 pt-8 pb-0">
            <?php yoast_breadcrumb( '<p id="breadcrumbs" class="text-sm text-gray-500 font-medium">','</p>' ); ?>
        </div>
    <?php } ?>

    <!-- ── Article Content ── -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-screen-md mx-auto px-6 xl:px-10 py-16 xl:py-20'); ?>>
        <div class="entry-content">
            <?php
            the_content();
            
            wp_link_pages( array(
                'before' => '<div class="page-links mt-8"><span class="font-bold mr-2">' . esc_html__( 'Pages:', 'aureus' ) . '</span>',
                'after'  => '</div>',
            ) );
            ?>
        </div>
        
        <!-- Tags -->
        <?php
        $tags_list = get_the_tag_list( '', ' ' );
        if ( $tags_list ) {
            echo '<div class="mt-12 pt-6 border-t border-gray-100 flex flex-wrap gap-2">';
            echo '<span class="text-xs font-bold uppercase tracking-wider text-gray-500 mt-1 mr-2">Tags:</span>';
            // Need to style standard WP tags
            echo str_replace('<a ', '<a class="text-xs font-medium bg-gray-100 hover:bg-blue-50 text-gray-700 hover:text-blue-700 px-3 py-1 rounded transition-colors" ', $tags_list);
            echo '</div>';
        }
        ?>
    </article>
    
    <!-- ── Related Posts ── -->
    <?php
    // Get related posts by category
    if ( ! empty( $categories ) ) {
        $category_ids = array();
        foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

        $args = array(
            'category__in'     => $category_ids,
            'post__not_in'     => array( get_the_ID() ),
            'posts_per_page'   => 3,
            'ignore_sticky_posts' => 1,
            'orderby'          => 'date',
        );

        $related_query = new WP_Query( $args );

        if ( $related_query->have_posts() ) {
            $related_title = function_exists('get_field') && get_field('related_posts_title', 'option') ? get_field('related_posts_title', 'option') : 'Bài viết liên quan';
            ?>
            <section class="bg-gray-50 py-16 xl:py-20 border-t border-gray-100">
                <div class="max-w-screen-xl mx-auto px-6 xl:px-10">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8"><?php echo esc_html($related_title); ?></h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
                        <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                        <div class="bg-white rounded-xl overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                            <div class="aspect-[16/10] overflow-hidden bg-gray-200">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_news.png" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover" loading="lazy" />
                                <?php endif; ?>
                            </div>
                            <div class="p-6">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-2"><?php echo get_the_date(); ?></p>
                                <h4 class="text-base font-bold text-gray-900 leading-snug mb-3 line-clamp-2">
                                    <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition-colors"><?php the_title(); ?></a>
                                </h4>
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-blue-600 hover:gap-2 transition-all">
                                    Đọc bài viết <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                                </a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
            <?php
        }
        wp_reset_postdata();
    }
    ?>
    
    <?php endwhile; ?>
</main>

<?php
get_footer();
