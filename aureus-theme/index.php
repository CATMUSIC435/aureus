<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * The main template file
 *
 * @package Aureus_Global
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="max-w-screen-xl mx-auto px-6 xl:px-10 py-20">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-10'); ?>>
                    <header class="entry-header mb-4">
                        <?php the_title( '<h1 class="entry-title text-3xl font-bold">', '</h1>' ); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content text-gray-700 leading-relaxed">
                        <?php
                        the_content();
                        ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
            endwhile;
            the_posts_navigation();
        else :
            ?>
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title text-3xl font-bold"><?php esc_html_e( 'Nothing Found', 'aureus' ); ?></h1>
                </header><!-- .page-header -->

                <div class="page-content mt-4">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'aureus' ); ?></p>
                    <?php get_search_form(); ?>
                </div><!-- .page-content -->
            </section><!-- .no-results -->
            <?php
        endif;
        ?>
    </div>
</main>

<?php
get_footer();
