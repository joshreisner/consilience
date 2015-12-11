<?php get_header()?>

<div class="page-header">
	<h1>Projects</h1>
</div>

<div class="row projects">
	<div class="filter col-md-2">
		<?php wp_list_categories()?>
	</div>
	<div class="main col-md-10">
		<div class="row">
			<?php
			$projects = get_posts(array('post_type' => 'projects', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => -1));
			foreach ($projects as $project) {?>
				<a class="col-xs-12 col-sm-6 col-md-4 col-lg-3" href="<?php echo get_permalink($project->ID)?>">
					<div<?php 
					$attachments = new Attachments('attachments', $project->ID);
					if ($attachment = $attachments->get_single(0)) {?>
						 style="background-image: url(<?php echo $attachments->src('small', 0)?>);"
					<?php }?>></div>
					<?php echo $project->post_title?>
				</a>
			<?php }?>
		</div>
	</div>
</div>
<?php get_footer();