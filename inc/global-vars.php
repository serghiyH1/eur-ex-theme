<?php
/*
 * CUSTOM GLOBAL VARIABLES
 */
function contacts_global_vars()
{
    global $contacts;
    $contacts = array(
        $contacts['phone'] = get_theme_mod('phone_number'),
        $contacts['phone_2'] = get_theme_mod('phone_number_2'),
        $contacts['email'] = get_theme_mod('contacts_e_mail'),
        $contacts['fb_link'] = get_theme_mod('facebook_link'),
        $contacts['inst_link'] = get_theme_mod('instagram_link'),
        $contacts['whatsapp_link'] = get_theme_mod('whatsapp_link'),
        $contacts['viber_link'] = get_theme_mod('viber_link'),
        $contacts['telegram_link'] = get_theme_mod('telegram_link'),
    );
}
add_action('init', 'contacts_global_vars');