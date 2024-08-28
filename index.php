<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

get_header();
?>

	<main id="primary" class="site-main">

        <div class="breadcrumbs-sp-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<p id="breadcrumbs" class="t-12">','</p>' );
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
                <header class="page-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="h2 page-title"><?php single_post_title(); ?></h1>
                            </div>
                        </div>
                    </div>
                </header>
				<?php
			endif; ?>

            <div class="container">

                <div class="row pb-4">
                    <?php /* Start the Loop */
                    while ( have_posts() ) : ?>
                        <div class="col-12 col-md-6 col-lg-4 content-col">
                            <?php the_post();

                            /*
                             * Include the Post-Type-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_type() ); ?>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="row pb-4">
                    <div class="col-12">
                        <?php the_posts_pagination( array(
                                'prev_text' => __( '<img src="/wp-content/themes/eurex/images/icons/arrw_dwn2.svg">', 'textdomain' ),
                                'next_text' => __( '<img src="/wp-content/themes/eurex/images/icons/arrw_dwn2.svg">', 'textdomain' ),
                            )
                        ); ?>
                    </div>
                </div>

            </div>

            <section class="page-content-section have-questions-section">
                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <h2 class="section-heading h4 t-center c-white"><?php echo pll__('Виникли питання? Напишіть нам' ); ?></h2>
                            <div class="section-text c-white t-12 t-center">
                                <?php echo pll__('Отримайте індивідуальну консультацію по Вашому питанню <br>в зручних для Вас меседжерах' ); ?>
                            </div>
                            <?php echo get_template_part( 'template-parts/content', 'messengers' ); ?>
                        </div>

                    </div>
                </div>
            </section><!-- .have-questions-section -->



		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
        wp_reset_postdata();
        ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
