<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
$current_url = get_permalink( get_the_ID() );
?>

<article id="post-<?php the_ID(); ?>">
	<header class="entry-header page-content-section bg-cover" <?php if ( $featured_img_url ): ?>style="background-image: url(<?php echo $featured_img_url; ?>)"<?php endif; ?>>
		<div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6 <?php if ( $featured_img_url ): ?>c-white<?php endif; ?>">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="row justify-content-md-center negative-margin-bottom-cont--form-calc">
                <div class="col-12 col-lg-8 py-3">
                    <?php get_template_part( 'template-parts/content', 'calculation-form' ); ?>
                </div>
            </div>
        </div>
	</header><!-- .entry-header -->

    <?php $content = get_field( 'main_content' );
        if ($content):
    ?>

        <div class="entry-content page-content-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div><!-- .entry-content -->

    <?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                /* translators: %s: Name of current post. Only visible to screen readers */
                                    __( 'Edit <span class="screen-reader-text">%s</span>', 'eur_ex' ),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                wp_kses_post( get_the_title() )
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </div>
                </div>
            </div>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

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
