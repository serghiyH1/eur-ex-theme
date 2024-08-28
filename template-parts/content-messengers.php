<?php
/**
 * Template part for displaying messangers list content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eurex
 */

$whatsapp_link = get_theme_mod('whatsapp_link');
$viber_link = get_theme_mod('viber_link');
$telegram_link = get_theme_mod('telegram_link');
if ( $viber_link || $whatsapp_link || $telegram_link ): ?>
    <ul class="messengers-list no-style-list">
        <?php if ( $viber_link ): ?>
            <li class="list-item">
                <a href="<?php echo $viber_link; ?>" class="link viber-link">
                    <span class="img-wrap"><img src="<?php echo get_template_directory_uri() . '/images/icons/viber.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в Viber' ); ?>"></span>
                    <span class="messenger-text t-center block"><?php echo pll__('Viber'); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ( $whatsapp_link ): ?>
            <li class="list-item">
                <a href="<?php echo $whatsapp_link; ?>" class="link whatsapp-link">
                    <span class="img-wrap"><img src="<?php echo get_template_directory_uri() . '/images/icons/whatsapp.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в WhatsApp' ); ?>"></span>
                    <span class="messenger-text t-center block"><?php echo pll__('WhatsApp'); ?></span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ( $telegram_link ): ?>
            <li class="list-item">
                <a href="<?php echo $telegram_link; ?>" class="link telegram-link">
                    <span class="img-wrap"><img src="<?php echo get_template_directory_uri() . '/images/icons/telegram.svg'; ?>" alt="<?php echo pll__( 'Зв\'яжіться з нами в Telegram' ); ?>"></span>
                    <span class="messenger-text t-center block"><?php echo pll__('Telegram'); ?></span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>