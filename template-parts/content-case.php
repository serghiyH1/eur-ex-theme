<?php
/**
 * Template part for displaying posts type Case
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

$title = get_the_title( get_the_ID() );
$permalink = get_permalink( get_the_ID() );
$excerpt = esc_html( get_the_excerpt( get_the_ID() ) );
$shortDesc = get_the_content( get_the_ID() );
if ( $excerpt ){
    if ( strlen( $excerpt ) >= 170 ) {
        $desc = mb_substr( $excerpt, 0, 170 ). ' ... ';
    }
    else {
        $desc = $excerpt;
    }
}else{
    if ( strlen( $shortDesc ) >= 170 ) {
        $desc = mb_substr( $shortDesc, 0, 170 ). ' ... ';
    }
    else {
        $desc = $shortDesc;
    }
} ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="card post-preview-wrap flex fd-column align-items-center justify-content-sb">

        <div class="card-image-wrap post-preview-image-wrap case-image-wrap">
            <a class="post-preview-image-link" href="<?php echo esc_url( $permalink ); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        </div>
    </div>

    <header class="entry-header">
        <?php the_title( '<h2 class="entry-title h5 card-title ellipsis one-line"><a class="post-preview-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    </header>

	<div class="entry-content card-content mt-4">

        <?php echo $desc; ?>
	</div><!-- .entry-content -->

	<!--<footer class="entry-footer py-5">
        <?php /* eur_ex_entry_footer(); */ ?>
	</footer>--><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
