<?php

/* JQUERY */
function jquery_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), '3.6.0', true);
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'jquery_method' );

/**
 * Enqueue scripts and styles.
 */
function eur_ex_scripts() {
    wp_enqueue_style( 'eur_ex-bs-style', get_template_directory_uri() . '/css/bootstrap-grid.css', array(), _S_VERSION );
    wp_enqueue_style( 'eur_ex-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
    wp_enqueue_style( 'eur_ex-fancybox', get_template_directory_uri() . '/css/fancybox-5-0/fancybox.min.css', array(), '5.0' );
    wp_style_add_data( 'eur_ex-style', 'rtl', 'replace' );

    wp_enqueue_script( 'eur_ex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'eur_ex-calc-form', get_template_directory_uri() . '/js/calc-form.js', array( 'jquery' ), _S_VERSION, true );
    //wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/css/jquery-ui.min.css', array(), '3.6.0' );
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array( 'jquery' ), '3.6.0', true );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox-5-0/fancybox.umd.js', array(), '5.0', true );
    wp_enqueue_script( 'eur_ex-main', get_template_directory_uri() . '/js/main.js', array( 'jquery', 'jquery-ui', 'fancybox' ), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'eur_ex_scripts' );