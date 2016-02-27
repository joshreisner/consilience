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

# Customizing read more link
add_filter('the_content_more_link', function() {
	return '<a class="btn btn-default" href="' . get_permalink() . '">Read more</a>';
});

# Init: register menus, custom objects, and taxonomies
add_action('init', function(){
	
	//register nav menu
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
	
	//people
	register_post_type('person',
		array(
			'labels' => array(
				'name'					=> __('People'),
				'singular_name'			=> __('Person'),
				'menu_name'				=> _x('People', 'admin menu'),
				'name_admin_bar'		=> _x('Person', 'add new on admin bar'),
				'add_new'				=> _x('Add New', 'book'),
				'add_new_item'			=> __('Add New Person'),
				'new_item'				=> __('New Person'),
				'edit_item'				=> __('Edit Person'),
				'view_item'				=> __('View Person'),
				'all_items'				=> __('All People'),
				'search_items'			=> __('Search People'),
				'parent_item_colon'		=> __('Parent People:'),
				'not_found'				=> __('No people found.'),
				'not_found_in_trash' 	=> __('No people found in Trash.'),
			),
			'supports' => array('title', 'editor', 'thumbnail'),
			'taxonomies' => array('team'),
			'public' => false,
			'show_ui' => true,
			'has_archive' => false,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-admin-users',
			'hierarchical' => true,
			'rewrite' => array('slug'=>'people'),
		)
	);	
	register_taxonomy('team', array('person'), array(
		'hierarchical'      => true,
		'labels'            => array(
			'name'              => _x('Teams', 'taxonomy general name'),
			'singular_name'     => _x('Team', 'taxonomy singular name'),
			'search_items'      => __('Search Teams'),
			'all_items'         => __('All Teams'),
			'parent_item'       => __('Parent Team'),
			'parent_item_colon' => __('Parent Team:'),
			'edit_item'         => __('Edit Team'),
			'update_item'       => __('Update Team'),
			'add_new_item'      => __('Add New Team'),
			'new_item_name'     => __('New Team Name'),
			'menu_name'         => __('Teams'),
		),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'team'),
	));
	add_theme_support('post-thumbnails', array('person', 'post'));
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
			/* array(
				'name'	=> 'title',
				'type'	=> 'text',
				'label'	=> __('Title', 'attachments'),
				'default'	=> 'title',
			),*/
			array(
				'name'	=> 'caption',
				'type'	=> 'text',
				'label'	=> __('Caption', 'attachments'),
				'default'	=> 'caption',
			),
		),
	));
});

# Excerpt
add_filter('excerpt_more', function($more) {
	return '&hellip;';
});

function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}


# Customize admin bar
add_action('admin_bar_menu', function($wp_admin_bar) {
	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('customize');
}, 999);

# Admin init: register editor stylesheet
add_action('admin_init', function(){
	add_editor_style('assets/css/editor-style.css');
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
			'block' => 'div',  
			'wrapper' => true,
			'classes' => 'h2',
		),  
		array(  
			'title' => 'Heading 3',  
			'block' => 'div',  
			'wrapper' => true,
			'classes' => 'h3',
		),  
		array(  
			'title' => 'Heading 4',  
			'block' => 'div',  
			'wrapper' => true,
			'classes' => 'h4',
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

# Register menu walker
require_once('wp_bootstrap_navwalker.php');

# Utility functions
function dd($content) {
	echo '<pre>';
	print_r($content);
	exit;
}

function consilience_image($attachments) {
	if ($attachments->exist()) {?>
		<div id="gallery">
			<?php echo $attachments->image('large', 0)?>
			<?php if ($caption = $attachments->field('caption', 0)) {?><div class="caption"><?php echo $caption?></div><?php }?>
		</div>
	<?php }
}

/*
function consilience_gallery($attachments) {
	if ($attachments->exist()) {?>
		<div id="gallery" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
			<?php while($index = $attachments->get()) {?>
				<div class="item<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>" style="background-image:url(<?php echo $attachments->src('full')?>)">
					<div class="carousel-caption">
						<?php echo $attachments->field('caption')?>
					</div>
				</div>
			<?php }?>
			</div>
		</div>
	<?php 
	}
}

function consilience_gallery_controls($attachments) {
	if ($attachments->exist() && $attachments->total() > 1) {
		$attachments->rewind();
		?>
	<div class="row block" id="gallery-controls">
		<?php while($index = $attachments->get()) {?>
			<div class="col-md-6<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>">
				<div class="thumbnail<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>" style="background-image:url(<?php echo $attachments->src('medium')?>)"></div>
			</div>
		<?php }?>
	</div>
	<?php }
}
*/

function consilience_sidebar() {
	if ($sidebar = get_field('sidebar')) {
		?>
		<div class="block sidebar">
			<?php echo apply_filters('the_content', $sidebar)?>
		</div>
		<?php 
	}
}

function consilience_side_lower() {
	if ($sidebar = get_field('side_lower')) {
		?>
		<div class="block sidebar">
			<?php echo apply_filters('the_content', $sidebar)?>
		</div>
		<?php 
	}
}

function consilience_related_projects() {
	if ($related_projects = get_field('related_posts')) {?>
		<h3>Related Projects</h3>
		<div class="block related">
			<ul>
		<?php 
		$related_projects = get_posts(array(
			'post_type'		=> 'project', 
			'include'		=> $related_projects, 
			'numberposts'	=> -1, 
			'orderby'		=> 'post__in',
		));
		foreach ($related_projects as $related_project) {?>
			<li><a href="<?php echo get_permalink($related_project->ID)?>"><?php echo $related_project->post_title?></a></li>
		<?php }?>
			</ul>
		</div>
	<?php }	
}

function consilience_side_nav() {
	global $post;
	
	//get the nav menu
	$items = wp_get_nav_menu_items('main');

	//loop through and find the ancestor of the current item, or return false	
	$ancestor = false;
	foreach ($items as $item) {
		if ($item->object_id == $post->ID) {
			$ancestor = $item->menu_item_parent;
		}
	}
	if (!$ancestor) return false;
	
	foreach ($items as $item) {
		if ($item->ID == $ancestor) {
			$ancestor = $item->title;
		}
	}
	
	//return nav menu HTML
	return '<strong>' . $ancestor . '</strong>' . wp_nav_menu(array(
	    'menu' => 'main',
	    'level' => 2,
	    'child_of' => $ancestor,
	    'container' => false,
	    'menu_class' => 'nav nav-stacked',
	    'echo' => false,
	));	
}
