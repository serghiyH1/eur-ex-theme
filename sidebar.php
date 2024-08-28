<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eurex
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}

$address = get_theme_mod( 'address' );
$address2 = get_theme_mod( 'address2' );
$phone = get_theme_mod( 'phone_number' );
$phone_2 = get_theme_mod( 'phone_number_2' );
$email = get_theme_mod( 'contacts_e_mail' );
$fb_link = get_theme_mod( 'facebook_link' );
$inst_link = get_theme_mod( 'instagram_link' );
$whatsapp_link = get_theme_mod( 'whatsapp_link' );
$viber_link = get_theme_mod( 'viber_link' );
$telegram_link = get_theme_mod( 'telegram_link' );

?>

<aside id="secondary" class="pre-footer widget-area">
    <div class="container">
        <div class="row">

            <div class="col-auto footer-menu-col footer-menu-col-1">
                <?php
                $menuName1 = wp_get_nav_menu_name( 'footer-menu-1' );
                echo '<span class="h6 footer-menu-heading t-16">' . $menuName1 . '</span>';
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu-1',
                    'menu_id'        => 'footer-menu-1',
                    'menu_class'     => 'footer-menu no-style-list t-12',
                    'container'      => '',
                ));
                ?>
            </div>

            <div class="col-auto footer-menu-col footer-menu-col-2">
                <?php
                $menuName2 = wp_get_nav_menu_name( 'footer-menu-2' );
                echo '<span class="h6 footer-menu-heading t-16">' . $menuName2 . '</span>';
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu-2',
                    'menu_id'        => 'footer-menu-2',
                    'menu_class'     => 'footer-menu no-style-list t-12',
                    'container'      => '',
                ));
                ?>
            </div>

            <div class="col-auto footer-menu-col footer-menu-col-3">
                <?php
                $menuName3 = wp_get_nav_menu_name( 'footer-menu-3' );
                echo '<span class="h6 footer-menu-heading t-16">' . $menuName3 . '</span>';
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu-3',
                    'menu_id'        => 'footer-menu-3',
                    'menu_class'     => 'footer-menu no-style-list t-12',
                    'container'      => '',
                ));
                ?>
            </div>

            <div class="col-auto footer-menu-col footer-menu-col-4">
                <?php
                $menuName4 = wp_get_nav_menu_name( 'footer-menu-4' );
                echo '<span class="h6 footer-menu-heading t-16">' . $menuName4 . '</span>';
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu-4',
                    'menu_id'        => 'footer-menu-4',
                    'menu_class'     => 'footer-menu no-style-list t-12',
                    'container'      => '',
                ));
                ?>
            </div>

            <div class="col-auto footer-menu-col form-button-col">
                <div>
                    <span class="h6 t-center form-button-col-heading"><?php echo pll__( 'Готові розпочати доставку?' ); ?></span>
                    <a href="#calculation-form-main" class="calculate button"><?php echo pll__('Розрахувати' ); ?></a>
                </div>

                <div class="contacts-wrap">
                    <?php if ( $phone ){
                        echo '<div class="phone-wrap py-1"><a class="footer-link phone t-12 ph-phone1" href="tel:' . $phone . '">' . $phone . '</a></div>';
                    } ?>
                    <?php if ( $phone_2 ){
                        // echo '<div class="phone-wrap py-1"><a class="footer-link phone t-12" href="tel:' . $phone_2 . '">' . $phone_2 . '</a></div>';
                    } ?>
                    <?php if ( $email ){
                        echo '<div class="phone-wrap py-1"><a class="footer-link phone t-12" href="tel:' . $email . '">' . $email . '</a></div>';
                    } ?>
                    <?php if ( $address ){
                        echo '<div class="address-1-wrap py-1"><p class="address t-12">' . pll__( 'Українa, 03124, м. Київ, провулок Юрія Матущака, д3, оф. 219' ) . '</p></div>';
                    } ?>
                </div>


                <?php echo get_template_part('template-parts/content', 'all-messengers' ); ?>
            </div>

        </div>

    </div>
</aside><!-- #secondary -->
