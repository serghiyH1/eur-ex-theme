<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eurex
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found page-content-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header class="page-header">
                            <h1 class="h3 page-title t-center"><?php echo pll__( 'Ой, цієї сторінки не знайдено. Можливо вона була видалена' ); ?></h1>
                        </header><!-- .page-header -->
                    </div>
                </div>
            </div>


			<div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p><?php echo pll__( 'Схоже нічого не знайдено. Спробуйте пошук' ); ?></p>

                            <?php
                            get_search_form();
                            ?>
                        </div>
                    </div>
                </div>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
