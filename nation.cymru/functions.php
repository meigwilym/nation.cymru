<?php

// nation cymru
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'domino', get_template_directory_uri() . '/style.css' );

}
function nc_add_google_fonts() {
    wp_enqueue_style('nc-google-fonts', 'https://fonts.googleapis.com/css?family=Merriweather:300|Montserrat:700', false);
}
add_action('wp_enqueue_scripts', 'nc_add_google_fonts');

