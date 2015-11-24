<?php

# Add script and style
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), false, true);
});

# Gallery shortcode
add_filter('post_gallery', function($output){
	return $output;
}, 10, 2);

# Custom style
add_filter('mce_buttons_2', function($buttons) {
	$buttons[0] = 'styleselect';
	return $buttons;
});

add_action('admin_init', function(){
	add_editor_style('/assets/css/editor-style.css');
});

add_filter('tiny_mce_before_init', function($array) {  
	$array['style_formats'] = json_encode(array(  
		array(  
			'title' => 'Lead',  
			'block' => 'div',  
			'wrapper' => true,
			'classes' => 'lead',
		),  
		array(  
			'title' => 'Heading 2',  
			'block' => 'h2',  
			'wrapper' => true,
		),  
		array(  
			'title' => 'Heading 3',  
			'block' => 'h3',  
			'wrapper' => true,
		),  
		array(  
			'title' => 'Heading 4',  
			'block' => 'h4',  
			'wrapper' => true,
		),  
		array(  
			'title' => 'Blockquote',  
			'block' => 'blockquote',  
			'wrapper' => true,
		),  
	));  
	return $array;  
});

# Register menu walker
require_once('wp_bootstrap_navwalker.php');

# Utility functions
function dd($content) {
	echo '<pre>';
	print_r($content);
	exit;
}