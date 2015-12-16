<?php 
get_header();
	
$categories = get_categories();

?>

<div class="page-header">
	<h1>Projects</h1>
</div>

<div class="row projects">
	<div class="filter col-md-2">
		<ul>
			<li class="active">All</li>
		<?php 
			$category_ids = array();
			foreach ($categories as $category) {
				$category_ids[$category->term_id] = $category->slug;
			?>
			<li data-filter="<?php echo $category->slug?>"><?php echo $category->name?></li>
		<?php }?>
		</ul>
	</div>
	<div class="main col-md-10">
		<div class="row">
			<?php
			$projects = get_posts(array('post_type' => 'project', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => -1));
			foreach ($projects as $project) {
				$categories = wp_get_post_categories($project->ID);
				array_walk($categories, function(&$term){
					global $category_ids;
					$term = $category_ids[$term];
				});
				?>
				<a class="col-xs-12 col-sm-6 col-md-4 <?php echo implode(' ', $categories)?>" href="<?php echo get_permalink($project->ID)?>">
					<h4><?php echo $project->post_title?></h4>
					<div<?php 
					$custom = get_post_custom($project->ID);
					$attachments = new Attachments('attachments', $project->ID);
					if ($attachment = $attachments->get_single(0)) {?>
						 style="background-image: url(<?php echo $attachments->src('small', 0)?>);"
					<?php }?>></div>
					<?php echo $custom['question'][0]?>
				</a>
			<?php }?>
		</div>
	</div>
</div>
<?php get_footer();