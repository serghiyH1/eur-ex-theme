<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content-single', get_post_type() ); ?>


            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php /* the_post_navigation(
                            array(
                                'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'eur_ex' ) . '</span> <span class="nav-title">%title</span>',
                                'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'eur_ex' ) . '</span> <span class="nav-title">%title</span>',
                            )
                        ); */ ?>
                    </div>
                </div>
            </div>


            <?php // If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/ ?>

		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
