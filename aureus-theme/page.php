<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The template for displaying all pages
 *
 * @package Aureus_Global
 */

get_header();

// Get the featured image URL or use a fallback gradient class
$bg_style = '';
$bg_class = 'bg-gradient-to-r from-[#1a56db] to-[#1e3a8a]'; // Fallback solid background
if ( has_post_thumbnail() ) {
    $bg_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    $bg_style = 'background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.8)), url(' . esc_url( $bg_image_url ) . '); background-size: cover; background-position: center;';
    $bg_class = ''; // Remove default bg class
} else {
    // Check if there is a global fallback in ACF Options
    $fallback_img = function_exists('get_field') ? get_field('default_hero_image', 'option') : false;
    if ( $fallback_img ) {
        $bg_style = 'background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.8)), url(' . esc_url( $fallback_img['url'] ) . '); background-size: cover; background-position: center;';
        $bg_class = '';
    }
}
?>

<main id="primary" class="site-main pt-[64px] xl:pt-[68px]">
    <?php while ( have_posts() ) : the_post(); ?>
    
    <!-- ── Page Hero ── -->
    <header class="page-hero relative py-16 xl:py-24 flex items-center justify-center <?php echo esc_attr($bg_class); ?>" style="<?php echo esc_attr($bg_style); ?>">
        <div class="max-w-screen-md mx-auto px-6 xl:px-10 text-center relative z-10">
            <?php the_title( '<h1 class="text-3xl xl:text-5xl font-extrabold text-white leading-tight mb-4 tracking-tight">', '</h1>' ); ?>
            
            <?php 
            // Optional subtitle via ACF for the page
            $subtitle = function_exists('get_field') ? get_field('page_subtitle') : ''; 
            if ( $subtitle ) : 
            ?>
                <p class="text-lg xl:text-xl text-blue-100 font-medium"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>
        </div>
    </header>

    <!-- ── Breadcrumbs ── -->
    <?php if ( function_exists('yoast_breadcrumb') ) { ?>
        <div class="max-w-screen-md mx-auto px-6 xl:px-10 pt-8 pb-0">
            <?php yoast_breadcrumb( '<p id="breadcrumbs" class="text-sm text-gray-500 font-medium">','</p>' ); ?>
        </div>
    <?php } ?>

    <!-- ── Page Content ── -->
    <div class="max-w-screen-md mx-auto px-6 xl:px-10 py-16 xl:py-24">
        <div class="entry-content">
            <?php
            the_content();
            
            wp_link_pages( array(
                'before' => '<div class="page-links mt-8"><span class="font-bold mr-2">' . esc_html__( 'Pages:', 'aureus' ) . '</span>',
                'after'  => '</div>',
                'link_before' => '<span class="inline-block px-3 py-1 border border-gray-200 rounded text-sm hover:bg-gray-50 mx-1">',
                'link_after' => '</span>'
            ) );
            ?>
        </div>
    </div>
    
    <?php endwhile; ?>
</main>

<?php
get_footer();
