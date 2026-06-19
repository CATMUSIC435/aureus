<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The template for displaying archive pages
 *
 * @package Aureus_Global
 */

get_header();

// Get the fallback background
$bg_style = '';
$bg_class = 'bg-gradient-to-r from-[#1a56db] to-[#1e3a8a]';
$fallback_img = function_exists('get_field') ? get_field('default_archive_image', 'option') : false;
if ( $fallback_img ) {
    $bg_style = 'background-image: linear-gradient(rgba(17, 24, 39, 0.7), rgba(17, 24, 39, 0.85)), url(' . esc_url( $fallback_img['url'] ) . '); background-size: cover; background-position: center;';
    $bg_class = '';
}
?>

<main id="primary" class="site-main pt-[64px] xl:pt-[68px]">
    
    <!-- ── Archive Hero ── -->
    <header class="archive-hero relative py-16 xl:py-24 flex items-center justify-center <?php echo esc_attr($bg_class); ?>" style="<?php echo esc_attr($bg_style); ?>">
        <div class="max-w-screen-md mx-auto px-6 xl:px-10 text-center relative z-10">
            <?php if ( is_home() && ! is_front_page() ) : ?>
                <h1 class="text-3xl xl:text-5xl font-extrabold text-white leading-tight tracking-tight">
                    <?php 
                    $blog_title = function_exists('get_field') && get_field('blog_page_title', 'option') ? get_field('blog_page_title', 'option') : single_post_title( '', false ); 
                    echo esc_html($blog_title ?: 'Tin tức & Sự kiện');
                    ?>
                </h1>
            <?php else : ?>
                <?php
                the_archive_title( '<h1 class="text-3xl xl:text-5xl font-extrabold text-white leading-tight tracking-tight mb-4">', '</h1>' );
                the_archive_description( '<div class="text-lg xl:text-xl text-blue-100 font-medium">', '</div>' );
                ?>
            <?php endif; ?>
        </div>
    </header>

    <!-- ── Archive Content ── -->
    <div class="max-w-screen-xl mx-auto px-6 xl:px-10 py-16 xl:py-24">
        
        <?php if ( have_posts() ) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 xl:gap-8">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-xl overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 flex flex-col'); ?>>
                        <div class="aspect-[16/10] overflow-hidden bg-gray-200 relative">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/aureus_news.png" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover" loading="lazy" />
                            <?php endif; ?>
                            
                            <!-- Category Badge inside image -->
                            <div class="absolute top-3 left-3">
                                <?php
                                $categories = get_the_category();
                                if ( ! empty( $categories ) ) {
                                    echo '<span class="inline-block bg-blue-600 text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow">' . esc_html( $categories[0]->name ) . '</span>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-2 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                                <?php echo get_the_date(); ?>
                            </p>
                            <h2 class="text-lg font-bold text-gray-900 leading-snug mb-3 line-clamp-3">
                                <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition-colors"><?php the_title(); ?></a>
                            </h2>
                            <p class="text-sm text-gray-500 mb-6 line-clamp-3 flex-1"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                            
                            <a href="<?php the_permalink(); ?>" class="mt-auto inline-flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-blue-600 hover:gap-2 transition-all">
                                Đọc bài viết <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-16 text-center">
                <?php
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => '<span class="text-sm font-bold uppercase tracking-wider text-gray-600 hover:text-blue-600">&laquo; Prev</span>',
                    'next_text' => '<span class="text-sm font-bold uppercase tracking-wider text-gray-600 hover:text-blue-600">Next &raquo;</span>',
                    'class'     => 'aureus-pagination',
                ) );
                ?>
            </div>

        <?php else : ?>
            
            <div class="text-center py-20">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Không tìm thấy bài viết nào.</h2>
                <p class="text-gray-500 mb-8">Xin lỗi, nội dung bạn đang tìm kiếm hiện không có sẵn.</p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider text-white bg-blue-600 rounded px-6 py-3 hover:bg-blue-700 transition-colors">
                    Về trang chủ
                </a>
            </div>

        <?php endif; ?>
        
    </div>
</main>

<!-- Add basic pagination styles directly to ensure it works nicely with Tailwind -->
<style>
.aureus-pagination .nav-links { display: inline-flex; gap: 0.5rem; align-items: center; justify-content: center; }
.aureus-pagination .page-numbers { display: inline-flex; align-items: center; justify-content: center; min-width: 2.5rem; height: 2.5rem; padding: 0 0.5rem; border-radius: 0.375rem; background: var(--color-gray-100); color: var(--color-gray-700); font-weight: 600; font-size: 0.875rem; transition: all 0.2s; text-decoration: none; }
.aureus-pagination .page-numbers:hover { background: var(--color-blue-100); color: var(--color-primary); }
.aureus-pagination .page-numbers.current { background: var(--color-primary); color: #fff; }
</style>

<?php
get_footer();
