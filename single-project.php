<?php
get_header();
the_post();

$ancestor_id = $post->post_parent ? get_post_ancestors($post->ID)[0] : $post->ID;

?>

<div class="row">
	<div class="col-md-10 col-md-offset-2">
		<div class="page-header">
			<h1><?php the_title()?></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<ul class="nav nav-stacked">
		    <?php wp_list_pages(array('title_li'=>'', 'include'=>$ancestor_id))?>
		    <?php wp_list_pages(array('title_li'=>'', 'depth'=>1, 'child_of'=>$ancestor_id))?>
		</ul>
	</div>
	<div class="col-md-7 content">
		<?php the_content()?>
	</div>
	<div class="col-md-3 side">
		Right side content goes here.
	</div>
</div>

<?php get_footer()?>