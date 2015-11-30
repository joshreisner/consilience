<?php

# Add script and style
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css');
	wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), false, true);
});

# Custom style
add_filter('mce_buttons_2', function($buttons) {
	$buttons[0] = 'styleselect';
	return $buttons;
});

# Init: register main nav menu
add_action('init', function(){
	register_nav_menu('navbar', 'Navbar');
	register_post_type('project',
		array(
			'labels' => array(
				'name'					=> __('Projects'),
				'singular_name'			=> __('Project'),
				'menu_name'				=> _x('Projects', 'admin menu'),
				'name_admin_bar'		=> _x('Project', 'add new on admin bar'),
				'add_new'				=> _x('Add New', 'book'),
				'add_new_item'			=> __('Add New Project'),
				'new_item'				=> __('New Project'),
				'edit_item'				=> __('Edit Project'),
				'view_item'				=> __('View Project'),
				'all_items'				=> __('All Projects'),
				'search_items'			=> __('Search Projects'),
				'parent_item_colon'		=> __('Parent Projects:'),
				'not_found'				=> __('No projects found.'),
				'not_found_in_trash' 	=> __('No projects found in Trash.'),
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-book',
			'hierarchical' => true,
		)
	);	
});

# Customize admin bar
add_action('admin_bar_menu', function($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('customize');
}, 999);

# Admin init: register editor stylesheet
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