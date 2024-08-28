<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

$postDate = get_the_date('d F Y');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    if ( is_singular() ) :
                        the_title( '<h1 class="entry-title c-black">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    if ( 'post' === get_post_type() ) :
                        ?>
                        <div class="entry-meta">
                            <div class="card-date post-date t-12"><?php echo $postDate; ?></div>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>

                </div>
            </div>
        </div>
	</header><!-- .entry-header -->

	<div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php eur_ex_post_thumbnail(); ?>
                    <?php if ( 'case' === get_post_type() ) :
                        $challenge = get_field( 'challenge' );
                        $solution = get_field( 'solution' );?>
                        <?php if( $challenge ): ?>
                            <div class="challenge">
                                <p><b><?php echo pll__( 'Виклик:' ); ?></b></p>
                                <div class="challenge-content">
                                    <?php echo $challenge; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if( $solution ): ?>
                            <div class="solution">
                                <p><b><?php echo pll__( 'Рішення:' ); ?></b></p>
                                <div class="solution-content">
                                    <?php echo $solution; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'eur_ex' ),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post( get_the_title() )
                        )
                    ); ?>

                </div>
            </div>
        </div>

	</div><!-- .entry-content -->

    <section class="page-content-section have-questions-section entry-footer">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h2 class="section-heading h4 t-center c-white"><?php echo pll__('Виникли питання? Напишіть нам' ); ?></h2>
                    <div class="section-text c-white t-12 t-center">
                        <?php echo pll__('Отримайте індивідуальну консультацію по Вашому питанню <br>в зручних для Вас меседжерах' ); ?>
                    </div>
                    <?php echo get_template_part( 'template-parts/content', 'messengers' ); ?>
                    <?php /*eur_ex_entry_footer();*/ ?>
                </div>

            </div>
        </div>
    </section><!-- .entry-footer -->

    <?php
    $args_posts = new WP_Query( array(
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
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
