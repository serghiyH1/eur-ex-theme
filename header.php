<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eurex
 */

$phone = get_theme_mod( 'phone_number' );
$phone_2 = get_theme_mod( 'phone_number_2' );
$email = get_theme_mod( 'contacts_e_mail' );
$fb_link = get_theme_mod( 'facebook_link' );
$inst_link = get_theme_mod( 'instagram_link' );
$whatsapp_link = get_theme_mod( 'whatsapp_link' );
$viber_link = get_theme_mod( 'viber_link' );
$telegram_link = get_theme_mod( 'telegram_link' );

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body id="site-body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'eur_ex' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="row site-header--row">

                <div class="site-branding col-5 col-md-4 col-lg-3 col-xl-2">
                    <?php
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo_img = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    if ( is_home() || is_front_page() ): ?>
                        <span class="custom-logo-link">
                            <?php if( $custom_logo_id ): ?>
                                <img src="<?php echo $logo_img[0]; ?>" height="<?php echo $logo_img[2]; ?>" width="<?php echo $logo_img[1]; ?>" alt="<?php bloginfo( 'name' ); ?>">
                            <?php else: ?>
                                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                            <?php endif; ?>
                        </span>
                    <?php else : ?>
                        <?php if( $custom_logo_id ): ?>
                            <a class="custom-logo-link" href="<?php echo home_url(); ?>" rel="home" itemprop="url">
                                <img src="<?php echo $logo_img[0]; ?>" height="<?php echo $logo_img[2]; ?>" width="<?php echo $logo_img[1]; ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        <?php else: ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php endif; ?>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <div class="header-navigation-col col-7 col-md-8 col-lg-9 col-xl-10">

                    <nav id="site-navigation" class="main-navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        ));
                        ?>
                    </nav><!-- #site-navigation -->

                    <?php if( $phone || $phone_2 ){ ?>
                        <div class="col-auto contacts-col header-phones">
                            <ul class="header-dropdown-menu header-phones-menu no-style-list">
                                <li class="list-item">
                                    <a class="contacts-tel phone-main ph-phone1" href="tel:<?php echo $phone; ?>">
                                        <i class="dropdown phone-icon icon"></i>
                                        <span class="phone-main-1"><?php echo $phone; ?></span>
                                        <i class="dropdown dropdown-icon icon"></i>
                                    </a>
                                    <!--<?php if( $phone_2 ){ ?>
                                        <ul class="sub-menu">
                                            <li class="list-item phone-main-2">
                                                <a class="contacts-tel" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                                            </li>
                                            <li class="list-item">
                                                <a class="contacts-tel" href="tel:<?php echo $phone_2; ?>"><?php echo $phone_2; ?></a>
                                            </li>
                                        </ul>
                                    <?php } ?>-->
                                </li>
                            </ul>
                        </div>
                    <?php } ?>

                    <!-- Languages -->
                    <div class="col-auto header-lang">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'lang-menu',
                            'menu_id'        => 'language-menu',
                            'menu_class'     => 'language-menu header-dropdown-menu no-style-list',
                        ));
                        ?>
                    </div>

                    <div class="col-auto col-menu-mobile">
                        <nav id="site-navigation-mobile" class="main-navigation-mobile">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                                <span class="button-text"><?php echo __('Menu')?></span>
                                <span class="burger-line burger-line-1"></span>
                                <span class="burger-line burger-line-2"></span>
                                <span class="burger-line burger-line-3"></span>
                            </button>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu-mobile',
                                'container_class' => 'main-menu-mobile-cont',
                            ));
                            ?>
                        </nav><!-- #site-navigation -->
                    </div>

                </div>

            </div><!-- .row -->
        </div><!-- .container -->
    </header><!-- #masthead -->
