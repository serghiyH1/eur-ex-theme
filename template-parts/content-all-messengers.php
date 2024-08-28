<?php
/**
 * Template part for displaying messangers list content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

$fb_link = get_theme_mod( 'facebook_link' );
$inst_link = get_theme_mod( 'instagram_link' );
$whatsapp_link = get_theme_mod( 'whatsapp_link' );
$viber_link = get_theme_mod( 'viber_link' );
$telegram_link = get_theme_mod( 'telegram_link' );
if ( $fb_link || $inst_link || $viber_link || $whatsapp_link || $telegram_link ): ?>
    <ul class="messengers-list icons-change-color no-style-list">
        <?php if ( $viber_link ): ?>
            <li class="list-item">
                <a href="<?php echo $viber_link; ?>" class="link viber-link">
                    <img src="<?php echo get_template_directory_uri() . '/images/icons/orange/viber.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в Viber' ); ?>">
                    <span class="messenger-text t-center block"><?php echo pll__('Viber'); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ( $whatsapp_link ): ?>
            <li class="list-item">
                <a href="<?php echo $whatsapp_link; ?>" class="link whatsapp-link">
                    <img src="<?php echo get_template_directory_uri() . '/images/icons/orange/whatsapp.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в WhatsApp' ); ?>">
                    <span class="messenger-text t-center block"><?php echo pll__('WhatsApp'); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ( $telegram_link ): ?>
            <li class="list-item">
                <a href="<?php echo $telegram_link; ?>" class="link telegram-link">
                    <img src="<?php echo get_template_directory_uri() . '/images/icons/orange/telegram.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в Telegram' ); ?>">
                    <span class="messenger-text t-center block"><?php echo pll__('Telegram'); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ( $fb_link ): ?>
            <li class="list-item">
                <a href="<?php echo $fb_link; ?>" class="link fb-link">
                    <img src="<?php echo get_template_directory_uri() . '/images/icons/orange/facebook.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в Facebook' ); ?>">
                    <span class="messenger-text t-center block"><?php echo pll__('Facebook'); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ( $inst_link ): ?>
            <li class="list-item">
                <a href="<?php echo $inst_link; ?>" class="link inst-link">
                    <img src="<?php echo get_template_directory_uri() . '/images/icons/orange/instagram.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в Instagram' ); ?>">
                    <span class="messenger-text t-center block"><?php echo pll__('Instagram'); ?></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>