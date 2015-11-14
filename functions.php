<?php

# Add script and style
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), false, true);
});

# Custom style
// Register our callback to the appropriate filter
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
			'block' => 'p',  
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

# Register menu and custom post type
require_once('wp_bootstrap_navwalker.php');
add_action('init', function(){
	register_nav_menu('navbar', 'Navbar');
	register_post_type('case-studies',
		array(
			'labels'		=> array(
				'name'			=>	'Case Studies',
				'singular_name'	=>	'Case Study',
				'not_found'		=>	'No case studies added yet.',
				'add_new_item'	=>	'Add New Case Study',
				'search_items'	=>	'Search Case Studies',
				'edit_item'		=>	'Edit Case Study',
				'view_item'		=>	'View Case Study',
			),
			'supports'		=> array('title', 'editor', 'revisions', 'thumbnail', 'excerpt'),
			'public'		=> true,
			'has_archive'	=> true,
			'menu_icon'		=> 'dashicons-clipboard',
		)
	);
	flush_rewrite_rules();
});

function dd($content) {
	echo '<pre>';
	echo print_r($content);
	exit;
}