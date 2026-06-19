<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The template for displaying 404 pages (not found)
 *
 * @package Aureus_Global
 */

get_header();
?>

<main id="primary" class="site-main pt-[64px] xl:pt-[68px] min-h-[70vh] flex items-center justify-center bg-gray-50">
    <section class="error-404 not-found text-center px-6 py-20">
        <div class="max-w-screen-sm mx-auto">
            <h1 class="text-9xl font-black text-blue-600 mb-4 tracking-tighter">404</h1>
            <h2 class="text-3xl font-bold text-gray-900 mb-6"><?php esc_html_e( 'Oops! Không tìm thấy trang này.', 'aureus' ); ?></h2>
            <p class="text-gray-500 mb-10 text-lg">
                <?php esc_html_e( 'Có vẻ như liên kết bạn truy cập đã bị hỏng hoặc trang này đã bị xóa. Vui lòng quay lại trang chủ hoặc sử dụng công cụ tìm kiếm.', 'aureus' ); ?>
            </p>
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider text-white bg-blue-600 rounded px-8 py-3.5 hover:bg-blue-700 transition-colors shadow-lg shadow-blue-600/20">
                <?php esc_html_e( 'Về trang chủ', 'aureus' ); ?>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
