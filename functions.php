<?php

# Add script and style
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), false, true);
});

# Register menu
require_once('wp_bootstrap_navwalker.php');
add_action('init', function(){
	register_nav_menu('navbar', 'Navbar');
});
