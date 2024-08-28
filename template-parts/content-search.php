<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                    <?php if ( 'post' === get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php
                            eur_ex_posted_on();
                            eur_ex_posted_by();
                            ?>
                        </div><!-- .entry-meta -->
                    <?php endif; ?>
                </div>
            </div>
        </div>
	</header><!-- .entry-header -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php eur_ex_post_thumbnail(); ?>
            </div>
        </div>
    </div>

	<div class="entry-summary py-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php eur_ex_entry_footer(); ?>
                </div>
            </div>
        </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
