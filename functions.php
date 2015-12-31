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
	register_nav_menu('main', 'Main');
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
			'taxonomies' => array('category'),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-book',
			'hierarchical' => true,
			'rewrite' => array('slug'=>'projects'),
		)
	);	
});

# Attachments config
add_filter('attachments_default_instance', '__return_false');
add_action('attachments_register', function($attachments){
	$attachments->register('attachments', array(
		'label'			=> 'Images',
		'post_type'		=> array('project', 'page'),
		//'position'	=> 'side',    //normal, side or advanced
		'priority'		=> 'default', //high, default, low, core
		'filetype'		=> null,      //image|video|text|audio|application
		//'note'		=> 'Attach files here!',
		'append'		=> true,
		'button_text'	=> __( 'Attach', 'attachments' ),
		'modal_text'	=> __( 'Attach', 'attachments' ),
		'router'		=> 'browse',   //browse|upload
		'post_parent'	=> false,      // whether Attachments should set 'Uploaded to' (if not already set)
		'fields'		=> array(
			array(
				'name'	=> 'title',
				'type'	=> 'text',
				'label'	=> __('Title', 'attachments'),
				'default'	=> 'title',
			),
		),
	));
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

# Contact
add_action('wp_ajax_contact', 'deliver_mail');
add_action('wp_ajax_nopriv_contact', 'deliver_mail');
function deliver_mail() {

	if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {

		// sanitize form values
		$name		= sanitize_text_field($_POST['name']);
		$email		= sanitize_email($_POST['email']);
		$message	= nl2br(stripslashes($_POST['message']));
		$to			= get_option('admin_email');
		$headers	= 'From: ' . $name . ' <' . $email . '>' . "\r\n";

		if (wp_mail($to, 'Contact Form', $message, $headers)) {
			echo '<div class="alert alert-warning">Thanks for contacting us, you can expect a response soon.</div>';
		} else {
			echo '<div class="alert alert-danger">An unexpected error occurred!</div>';
		}
		
	} else {
		echo '<div class="alert alert-danger">An unexpected input error occurred!</div>';
	}

	exit;
}

add_shortcode('contact_form', function(){
	return '
		<form method="post" id="contact">
			<input name="action" type="hidden" value="contact">
			<div class="row">
				<div class="col-md-6"><input class="form-control required" name="name" pattern="[a-zA-Z0-9 ]+" type="text" placeholder="Name"></div>
				<div class="col-md-6"><input class="form-control email required" name="email" type="email" placeholder="Email"></div>
			</div>
			<div class="row">
				<div class="col-md-12"><textarea class="form-control required" name="message" placeholder="Message"></textarea></div>
			</div>
			<div class="row">
				<div class="col-md-12"><input class="btn btn-primary form-control" type="submit" value="Send Message"></div>
			</div>
		</form>';
});

# Register menu walker
require_once('wp_bootstrap_navwalker.php');

# Utility functions
function dd($content) {
	echo '<pre>';
	print_r($content);
	exit;
}