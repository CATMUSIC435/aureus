<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The template for displaying search results pages
 *
 * @package Aureus_Global
 */

get_header();

$bg_class = 'bg-gradient-to-r from-[#1a56db] to-[#1e3a8a]';
?>

<main id="primary" class="site-main pt-[64px] xl:pt-[68px]">
    
    <!-- ── Search Hero ── -->
    <header class="archive-hero relative py-16 xl:py-24 flex items-center justify-center <?php echo esc_attr($bg_class); ?>">
        <div class="max-w-screen-md mx-auto px-6 xl:px-10 text-center relative z-10">
            <h1 class="text-3xl xl:text-5xl font-extrabold text-white leading-tight tracking-tight mb-4">
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Kết quả tìm kiếm cho: %s', 'aureus' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h1>
            <div class="text-lg xl:text-xl text-blue-100 font-medium">
                <?php esc_html_e('Dưới đây là các kết quả phù hợp với nội dung bạn tìm kiếm.', 'aureus'); ?>
            </div>
        </div>
    </header>

    <!-- ── Search Content ── -->
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
                            
                            <!-- Post Type Badge -->
                            <div class="absolute top-3 left-3">
                                <?php
                                $pt = get_post_type();
                                $badge = ($pt == 'page') ? 'Trang' : 'Tin tức';
                                echo '<span class="inline-block bg-blue-600 text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow">' . esc_html( $badge ) . '</span>';
                                ?>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            <h2 class="text-lg font-bold text-gray-900 leading-snug mb-3 line-clamp-3">
                                <a href="<?php the_permalink(); ?>" class="hover:text-blue-600 transition-colors"><?php the_title(); ?></a>
                            </h2>
                            <p class="text-sm text-gray-500 mb-6 line-clamp-3 flex-1"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                            
                            <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Đọc chi tiết: %s', 'aureus' ), get_the_title() ) ); ?>" class="mt-auto inline-flex items-center gap-1 text-[11px] font-bold uppercase tracking-wider text-blue-600 hover:gap-2 transition-all">
                                Xem chi tiết <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
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
            
            <div class="text-center py-20 max-w-lg mx-auto">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                <h2 class="text-2xl font-bold text-gray-900 mb-4"><?php esc_html_e( 'Không tìm thấy kết quả nào.', 'aureus' ); ?></h2>
                <p class="text-gray-500 mb-8"><?php esc_html_e( 'Xin lỗi, không có bài viết hay trang nào khớp với từ khóa của bạn. Vui lòng thử tìm kiếm với từ khóa khác.', 'aureus' ); ?></p>
                
                <form role="search" method="get" class="search-form flex relative" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label class="w-full">
                        <span class="sr-only"><?php esc_html_e( 'Tìm kiếm cho:', 'aureus' ); ?></span>
                        <input type="search" class="search-field w-full rounded-md border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="<?php echo esc_attr_e( 'Nhập từ khóa tìm kiếm &hellip;', 'aureus' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    </label>
                    <button type="submit" class="absolute right-0 top-0 bottom-0 px-4 text-gray-500 hover:text-blue-600" aria-label="<?php esc_attr_e( 'Submit', 'aureus' ); ?>">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg>
                    </button>
                </form>
            </div>

        <?php endif; ?>
        
    </div>
</main>

<style>
.aureus-pagination .nav-links { display: inline-flex; gap: 0.5rem; align-items: center; justify-content: center; }
.aureus-pagination .page-numbers { display: inline-flex; align-items: center; justify-content: center; min-width: 2.5rem; height: 2.5rem; padding: 0 0.5rem; border-radius: 0.375rem; background: var(--color-gray-100); color: var(--color-gray-700); font-weight: 600; font-size: 0.875rem; transition: all 0.2s; text-decoration: none; }
.aureus-pagination .page-numbers:hover { background: var(--color-blue-100); color: var(--color-primary); }
.aureus-pagination .page-numbers.current { background: var(--color-primary); color: #fff; }
</style>

<?php
get_footer();
