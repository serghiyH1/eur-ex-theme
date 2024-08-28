<?php
/**
 * Template part for displaying modals content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

$contactModalHeading = pll__( 'Бажаєте замовити доставку?' );
$contactModalSubheading = pll__( 'Вкажіть ім\'я та телефон і ми з Вами зв\'яжемось' );
if( pll_current_language() == 'uk' ){
    $contactModalCfShortcode = get_field( 'contact_modal_cf_shortcode', 'options' );
}elseif( pll_current_language() == 'ru' ){
    $contactModalCfShortcode = get_field( 'contact_modal_cf_shortcode_ru', 'options' );
}elseif( pll_current_language() == 'en' ){
    $contactModalCfShortcode = get_field( 'contact_modal_cf_shortcode_en', 'options' );
}else{
    $contactModalCfShortcode = get_field( 'contact_modal_cf_shortcode_en', 'options' );
}
?>

<div class="modal modal-contact-us" id="modal-contact-us">
    <div class="form-wrap">
        <?php if ( $contactModalHeading ){
            echo '<h3 class="section-heading h5 t-center">' . $contactModalHeading . '</h3>';
        } ?>
        <?php if ( $contactModalSubheading ){
            echo '<div class="subheading t-center">' . $contactModalSubheading . '</div>';
        } ?>
        <?php if ( $contactModalCfShortcode ){
            echo '<div class="c-white t-center">' . do_shortcode($contactModalCfShortcode) . '</div>';
        } ?>
    </div>
</div>

<div id="modal-lang" class="modal modal-lang">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'lang-menu-modal',
        'menu_id'        => 'language-menu-modal',
        'menu_class'     => 'language-menu-modal no-style-list',
    ));
    ?>
</div>
