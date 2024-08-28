<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

?>

<section class="no-results not-found">
	<header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title"><?php echo pll__( 'Нічого не знайдено' ); ?></h1>
                </div>
            </div>
        </div>
	</header><!-- .page-header -->

	<div class="page-content py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p><?php echo pll__( 'Спробуйте пошук' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
