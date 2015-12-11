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
	register_post_type('projects',
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
		)
	);	
});

# Attachments config
add_filter('attachments_default_instance', '__return_false');
add_action('attachments_register', function($attachments){
	$attachments->register('attachments', array(
		'label'			=> 'Project Images',
		'post_type'		=> array('projects', 'page'),
		'position'		=> 'side',    //normal, side or advanced
		'priority'		=> 'default', //high, default, low, core
		'filetype'		=> null,      //image|video|text|audio|application
		//'note'			=> 'Attach files here!',
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

# Add meta box for testimonial to project edit page
$nonce_action = 'project_custom';
$nonce_name = $nonce_action . '_nonce';
add_action('add_meta_boxes', function() use ($nonce_action, $nonce_name) {
	add_meta_box(
		'project_testimonial',
		'Custom Fields',
		function($post) use ($nonce_action, $nonce_name) {
			wp_nonce_field($nonce_action, $nonce_name);
			$custom = get_post_custom($post->ID);
			echo '<label for="question">Question</label><textarea name="question" style="width:100%;height:160px" placeholder="Design Question">' . $custom['question'][0] . '</textarea>';
			echo '<label for="testimonial">Testimonial</label><textarea name="testimonial" style="width:100%;height:160px" placeholder="Testimonial">' . $custom['testimonial'][0] . '</textarea>';
		},
		'projects',
		'side'
	);
});

# Save testimonial
add_action('save_post', function($post_id) use ($nonce_action, $nonce_name) {
	if (!isset($_POST[$nonce_name])) return;
	if (!wp_verify_nonce($_POST[$nonce_name], $nonce_action)) return;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;
	if (!isset($_POST['testimonial']) && !isset($_POST['question'])) return;
	$_POST['testimonial'] = implode("\n", array_map('sanitize_text_field', explode("\n", $_POST['testimonial'])));
	$_POST['question'] = implode("\n", array_map('sanitize_text_field', explode("\n", $_POST['question'])));

	update_post_meta($post_id, 'testimonial', $_POST['testimonial']);
	update_post_meta($post_id, 'question', $_POST['question']);
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