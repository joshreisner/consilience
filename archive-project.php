<?php 
get_header();
	
$categories = get_categories();

?>

<main>
	
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1>Projects</h1>
				</div>
			</div>
		</div>
		
		<div class="row projects">
			<div class="col-md-2 side-nav hidden-xs">
				<ul class="nav nav-stacked">
					<li class="active"><a data-filter="*">All</a></li>
				<?php 
					$category_ids = array();
					foreach ($categories as $category) {
						$category_ids[$category->term_id] = $category->slug;
					?>
					<li><a data-filter=".<?php echo $category->slug?>"><?php echo $category->name?></a></li>
				<?php }?>
				</ul>
			</div>
			<div class="col-md-10 content">
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
						<a class="col-sm-6 col-md-4 <?php echo implode(' ', $categories)?>" href="<?php echo get_permalink($project->ID)?>">
							<h4><?php echo $project->post_title?></h4>
							<div class="image"<?php 
							$custom = get_post_custom($project->ID);
							$attachments = new Attachments('attachments', $project->ID);
							if ($attachment = $attachments->get_single(0)) {?>
								 style="background-image: url(<?php echo $attachments->src('small', 0)?>);"
							<?php }?>></div>
							<div class="question"><?php echo $custom['question'][0]?></div>
						</a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer();