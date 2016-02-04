<?php
get_header();
?>
<main>
	<div class="container">
	
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div class="page-header">
					<h1><?php post_type_archive_title()?></h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2 side-nav hidden-xs">
				<strong>About Us</strong>
			    <?php wp_nav_menu(array(
				    'menu' => 'main',
				    'level' => 2,
				    'child_of' => 'About Us',
				    'container' => false,
				    'menu_class' => 'nav nav-stacked',
				))?>
			</div>
			<div class="col-md-10 content">
				<?php
				$teams = get_categories(array('taxonomy' => 'team'));
				foreach ($teams as $team) {?>
				<div class="row">
					<div class="col-md-12">
						<h3><?php echo $team->name?></h3>
						<?php if (!empty($team->description)) {?>
						<p><?php echo $team->description?></p>
						<?php }?>
						<div class="row">
							<?php
							$people = get_posts(array(
								'post_type' => 'person',
								'team' => $team->slug,
								'numberposts' => -1,
								'orderby' => 'menu_order',
								'order' => 'ASC',
							));
		
							//dd($people);
							
							foreach ($people as $person) {
								?>
								<div class="col-md-4 person">
									<a href="<?php echo get_permalink($person->ID)?>">
										<?php if ($thumbnail = get_the_post_thumbnail($person->ID)) echo $thumbnail?>
										<h4><?php echo $person->post_title?></h4>
									</a>
									<?php if ($title = get_field('title', $person->ID)) {?><h5><?php echo $title?></h5><?php }?>
									<div class="excerpt"><?php echo get_excerpt_by_id($person->ID)?></div>
									<a href="<?php echo get_permalink($person->ID)?>" class="btn btn-default">Read Bio</a>
								</div>
							<?php }?>
						</div>
					</div>
				</div>
				<?php }?>
				</div>
			</div>
		</div>
		
	</div>
</main>

<?php get_footer()?>