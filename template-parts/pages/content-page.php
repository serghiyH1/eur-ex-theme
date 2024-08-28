<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_title( '<h1 class="h3 entry-title">', '</h1>' ); ?>
                </div>
            </div>
        </div>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php eur_ex_post_thumbnail(); ?>
                    <?php the_content(); ?>
                </div>
                <div class="col-12">
                    <?php wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eur_ex' ),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
	</div><!-- .entry-content -->

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

<?php $args_posts = new WP_Query( array(
      'posts_per_page' => 3,
    ));
    if ( $args_posts->have_posts() ) : ?>
        <div class="last-articles-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <span class="h3 t-center"><?php echo pll__('Актуальні статті для Вас' ); ?></span>
                    </div>
                    <?php while ( $args_posts->have_posts() ) : $args_posts->the_post();
                        echo '<div class="col-12 col-md-6 col-lg-4 content-col">';
                        get_template_part( 'template-parts/content' );
                        echo '</div>';
                    endwhile; ?>
                </div>
            </div>
            <?php wp_reset_postdata(); ?>
        </div>

    <?php
endif; ?>
