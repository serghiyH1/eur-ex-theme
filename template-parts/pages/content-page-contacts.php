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
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </div>
            </div>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="container">

            <?php if( have_rows( 'oficce_1', 'options' ) ): ?>
                <div class="row">
                    <?php while( have_rows( 'oficce_1', 'options' ) ): the_row();
                        $heading = get_sub_field('heading');
                        $desc = get_sub_field('desc');
                        $phone_1 = get_sub_field('phone_1');
                        $phone_2 = get_sub_field('phone_2');
                        $email = get_sub_field('email');
                        $address = get_sub_field('address');
                        $map = get_sub_field('map');
                        ?>
                        <div class="col-12 col-lg-6">
                            <?php if( $heading ){
                                echo '<h3 class="h5 contacts-heading">' . $heading . '</h3>';
                            } if( $desc ) {
                                echo '<div class="contact-wrap contacts-desc">' . $desc . '</div>';
                            } if( $phone_1 || $phone_2 ){ ?>
                                <div class="contact-wrap phones-wrap">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/contacts/Phone.svg" alt="<?php echo pll__('Телефонуйте нам'); ?>" class="icon-phone">
                                    <?php if( $phone_1 ): ?>
                                        <a class="phone phone-1 ph-phone1" href="tel:<?php echo str_replace(' ', '', $phone_1); ?>"><?php echo $phone_1; ?></a><?php if( $phone_1 && $phone_2 ): ?>,&nbsp<?php endif; ?>
                                    <?php endif; ?>
                                    <?php if( $phone_2 ): ?>
                                        <a class="phone phone-2 ph-phone1" href="tel:<?php echo str_replace(' ', '', $phone_2); ?>"><?php echo $phone_2; ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                            <?php if( $email ): ?>
                                <div class="contact-wrap mail-wrap">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/contacts/EnvelopeSimpleOpen.svg" alt="<?php echo pll__('Пишіть нам'); ?>" class="icon-mail">
                                    <a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if( $address ): ?>
                                <div class="contact-wrap address-wrap">
                                    <p class="address">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/contacts/MapPin.svg" alt="<?php echo pll__('Наша адреса'); ?>" class="icon-address">
                                        <?php echo $address; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-lg-6">
                            <?php if( $map ): ?>
                                <div class="contact-wrap map-wrap">
                                    <?php echo $map; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <?php if( have_rows( 'oficce_2', 'options' ) ): ?>
                <div class="row">
                    <?php while( have_rows( 'oficce_2', 'options' ) ): the_row();
                        $heading = get_sub_field('heading');
                        $desc = get_sub_field('desc');
                        $phone_1 = get_sub_field('phone_1');
                        $phone_2 = get_sub_field('phone_2');
                        $email = get_sub_field('email');
                        $address = get_sub_field('address');
                        $map = get_sub_field('map');
                        ?>
                        <div class="col-12 col-lg-6">
                            <?php if( $heading ){
                                echo '<h3 class="h5 contacts-heading">' . $heading . '</h3>';
                            } if( $desc ) {
                                echo '<div class="contact-wrap contacts-desc">' . $desc . '</div>';
                            } if( $phone_1 || $phone_2 ){ ?>
                                <div class="contact-wrap phones-wrap">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/contacts/Phone.svg" alt="<?php echo pll__('Телефонуйте нам'); ?>" class="icon-phone">
                                    <?php if( $phone_1 ): ?>
                                        <a class="phone phone-1 ph-phone1" href="tel:<?php echo str_replace(' ', '', $phone_1); ?>"><?php echo $phone_1; ?></a><?php if( $phone_1 && $phone_2 ): ?>,&nbsp<?php endif; ?>
                                    <?php endif; ?>
                                    <?php if( $phone_2 ): ?>
                                        <a class="phone phone-2 ph-phone1" href="tel:<?php echo str_replace(' ', '', $phone_2); ?>"><?php echo $phone_2; ?></a>
                                    <?php endif; ?>
                                </div>
                            <?php } ?>
                            <?php if( $email ): ?>
                                <div class="contact-wrap mail-wrap">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/icons/contacts/EnvelopeSimpleOpen.svg" alt="<?php echo pll__('Пишіть нам'); ?>" class="icon-mail">
                                    <a class="email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                </div>
                            <?php endif; ?>
                            <?php if( $address ): ?>
                                <div class="contact-wrap address-wrap">
                                    <p class="address">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/contacts/MapPin.svg" alt="<?php echo pll__('Наша адреса'); ?>" class="icon-address">
                                        <?php echo $address; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-lg-6">
                            <?php if( $map ): ?>
                                <div class="contact-wrap map-wrap">
                                    <?php echo $map; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
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
