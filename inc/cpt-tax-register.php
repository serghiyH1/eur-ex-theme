<?php
// Custom Taxonomies
add_action( 'init', 'create_my_taxonomies', 0 );

function create_my_taxonomies() {
    $args_locations_cat = array(
        'show_ui' => true,
        'labels' => array(
            'name' => esc_html__('Категорії локацій' ),
            'add_new_item' => esc_html__('Додати нову Категорію локацій' ),
            'new_item_name' => esc_html__('Нова Категорія локацій' )
        ),
        'show_tagcloud' => true,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => true
    );
    register_taxonomy( 'location-categories', array( 'location' ), $args_locations_cat );

    $args_cases_cat = array(
        'show_ui' => true,
        'labels' => array(
            'name' => esc_html__('Категорія Кейсів'),
            'add_new_item' => esc_html__('Додати нову Категорію кейсів'),
            'new_item_name' => esc_html__('Нова Категорію кейсів')
        ),
        'show_tagcloud' => true,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => true
    );
    register_taxonomy( 'cases', array( 'case' ), $args_cases_cat );
}

// POST TYPE LOCATION
add_action( 'init', 'location_register_post_type_init' );
function location_register_post_type_init() {
    $labels = array(
        'name'                 => esc_html__('Location', 'eur_ex' ),
        'singular_name'        => esc_html__('Location object'),
        'add_new'              => esc_html__('add Location object'),
        'add_new_item'         => esc_html__('add new Location object'),
        'edit_item'            => esc_html__('edit Location object'),
        'new_item'             => esc_html__('new Location object'),
        'all_items'            => esc_html__('all Location objects'),
        'view_item'            => esc_html__('view Location objects'),
        'search_items'         => esc_html__('search Location objects'),
        'not_found'            => esc_html__('Location objects not found'),
        'not_found_in_trash'   => esc_html__('Location object not found in trash'),
        'menu_name'           => 'Locations',
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'has_archive' => true,
        // 'rewrite' => array( 'slug' => 'location' ),
        'menu_icon' => 'dashicons-location',
        'menu_position' => 4,
        'supports'  => array( 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes' ), //'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    );
    register_post_type('location', $args);
}

// POST TYPE Cases
add_action( 'init', 'cases_register_post_type_init' );
function cases_register_post_type_init() {
    $labels = array(
        'name'                 => esc_html__('Кейси', 'eur_ex' ),
        'singular_name'        => esc_html__('Кейси'),
        'add_new'              => esc_html__('Додати Кейс'),
        'add_new_item'         => esc_html__('Додати новий Кейс'),
        'edit_item'            => esc_html__('Редагувати Кейс'),
        'new_item'             => esc_html__('Новий Кейс'),
        'all_items'            => esc_html__('Всі Кейси'),
        'view_item'            => esc_html__('Дивитись всі Кейси'),
        'search_items'         => esc_html__('Шукати Кейси'),
        'not_found'            => esc_html__('Кейси не знайдені'),
        'not_found_in_trash'   => esc_html__('Кейси не знайдені в кошику'),
        'menu_name'           => 'Кейси',
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-slides',
        'menu_position' => 5,
        'supports'  => array( 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes' ), //'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    );
    register_post_type('case', $args);
}