<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */
$permalink = get_permalink( get_the_ID() );
$title = get_the_title( get_the_ID() );
$image = get_the_post_thumbnail( get_the_ID(), 'medium' );
$excerpt = get_the_excerpt( get_the_ID() );
$shortDesc = get_the_content( get_the_ID() );
$postDate = get_the_date('d F Y');
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
}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('card h-100 post-preview-wrap flex fd-column align-items-center'); ?>>
    <div class="card-image-wrap post-preview-image-wrap">
        <a class="post-preview-image-link" href="<?php echo esc_url( $permalink ); ?>"><?php echo $image; ?></a>
    </div>

    <div class="card-content-wrap">
        <div class="card-content">
            <div class="card-date post-date t-12"><?php echo $postDate; ?></div>
            <span class="h5 card-title"><a class="post-preview-link" href="<?php echo esc_url( $permalink ); ?>"><?php echo $title; ?></a></span>
        </div>
    </div>
</div><!-- #post-<?php the_ID(); ?> -->
