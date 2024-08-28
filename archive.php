<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */
$columnsQty = get_field( 'columns_qty', 'option' );
$servicesColumns = get_field( 'desc_columns', 'option' );
$archiveDesc = get_the_archive_description();
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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                            ?>
                        </div>
                    </div>
                </div>
			</header><!-- .page-header -->

            <div class="container">
                <div class="row content-row">
                    <?php
                    /* Start the Loop */
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


            <?php if ( is_tax() || is_category() ): ?>
                <section class="page-content-section archive-desc">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php echo $archiveDesc; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php else: ?>
                <?php if( is_post_type_archive( 'case' ) || $servicesColumns ): ?>
                    <section class="page-content-section services-columns">

                        <div class="container">

                            <div class="row justify-content-center">
                                <?php foreach ( $servicesColumns as $servicesColumn ):
                                    $servColumnLink = $servicesColumn['column_link']; ?>
                                    <div class="col-12 col-md-6 col-lg-<?php echo $columnsQty; ?> flex fd-column content-col">
                                        <h3 class="h6 c-black">
                                            <?php if( $servColumnLink ){
                                                echo '<a class="column-link" href="' . $servColumnLink . '">' . $servicesColumn['column_heading'] . '</a>';
                                            } else {
                                                echo $servicesColumn['column_heading'];
                                            } ?>
                                        </h3>
                                        <div class="column-text">
                                            <?php echo $servicesColumn['desc']; ?>
                                        </div>

                                    </div>
                                <?php endforeach; ?>

                                <?php if( have_rows( 'text_and_button', 'options' ) ): ?>
                                    <div class="col-12">
                                        <?php while( have_rows( 'text_and_button', 'options' ) ): the_row();
                                            $addDesc = get_sub_field( 'add_desc' );
                                            $link = get_sub_field( 'button' );
                                            $link_url = $link['url'];
                                            $link_title = $link['title'];
                                            $link_target = $link['target'] ? $link['target'] : '_self';
                                            if ( $addDesc ){
                                                echo '<div class="add-desc mt-4">' . $addDesc . '</div>';
                                            }
                                            if ( $link ){ ?>
                                                <a class="button inline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>

                    </section>
                <?php endif; ?>
            <?php endif; ?>

		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
        wp_reset_postdata();
		?>

        <?php if ( is_post_type_archive( ) !== 'post' ):
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

        <?php endif;
        endif; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
