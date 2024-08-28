<?php
$office1 = get_field( 'oficce_1', 'options' );

if ( function_exists('pll_register_string') ){
    pll_register_string('copyright_info', get_theme_mod( 'copyright_info' ), true);
    // Home page
    pll_register_string('delivery_direction', 'Напрямок доставки' );
    pll_register_string('delivery_from', 'Доставка з' );
    pll_register_string('delivery_to', 'Доставка в' );
    pll_register_string('downloading', 'Завантаження' );
    pll_register_string('palets', 'Палети' );
    pll_register_string('boxes', 'Коробки' );
    pll_register_string('ftl', 'FTL' );
    pll_register_string('sea', 'Море' );
    pll_register_string('avia', 'Авіа' );
    pll_register_string('train', 'ЖД' );
    pll_register_string('delivery_cost', 'Вартість доставки: ' );
    pll_register_string('delivery_info_contacts_text', 'Щоб отримати точну вартість доставки зв’яжіться з нами за допомогою форми або месенджерів, або по телефону' );
    pll_register_string('private_person', 'Приватна особа' );
    pll_register_string('company', 'Компанія' );

    // Footer
    pll_register_string('footer_ready_to_begin_delivery', 'Готові розпочати доставку?' );
    pll_register_string('footer_calculate_delivery', 'Розрахувати' );
    pll_register_string('terms_of_use', get_theme_mod( 'footer_terms_text' ) );
    pll_register_string('politics', get_theme_mod( 'footer_politics_text' ) );
    pll_register_string('website_development', 'Створення сайту:' );
    pll_register_string('address', $office1[ 'address' ]  );

    // 404
    pll_register_string('404_heading', 'Ой, цієї сторінки не знайдено. Можливо вона була видалена' );
    pll_register_string('404_text', 'Схоже нічого не знайдено. Спробуйте пошук' );
}