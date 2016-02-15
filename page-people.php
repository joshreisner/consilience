<?php
/**
 * Template Name: People Page
 */

get_header();
the_post();

?>

<main>
	<div class="container">
	
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div class="page-header">
					<h1><?php the_title()?></h1>
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
			<div class="col-md-8 content">
				<?php
					
				the_content();
				
				$teams = get_categories(array('taxonomy' => 'team'));
				foreach ($teams as $team) {?>
					<h2><?php echo $team->name?></h2>
					<?php if (!empty($team->description)) {?>
					<p><?php echo $team->description?></p>
					<?php }
						
					$people = get_posts(array(
						'post_type' => 'person',
						'team' => $team->slug,
						'numberposts' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
					));
	
					if ($team->slug == 'consilience-group-principals') {
						foreach ($people as $person) {?>
							<div class="row <?php echo $team->slug?>">
								<div class="col-sm-4">
									<?php if ($thumbnail = get_the_post_thumbnail($person, 'large')) echo $thumbnail?>
								</div>
								<div class="col-sm-8">
									<div class="info">
										<h3>
											<?php echo $person->post_title?>
											<?php if ($title = get_field('title', $person->ID)) {?><small><?php echo $title?></small><?php }?>
										</h3>
										<?php echo apply_filters('the_content', $person->post_content)?>
									</div>
								</div>
							</div>
						<?php }
					} elseif ($team->slug == 'core-team') {
						foreach ($people as $person) {?>
							<div class="row <?php echo $team->slug?>">
								<div class="col-sm-3">
									<?php if ($thumbnail = get_the_post_thumbnail($person->ID)) echo $thumbnail?>
								</div>
								<div class="col-sm-9">
									<div class="info">
										<h3>
											<?php echo $person->post_title?>
											<?php if ($title = get_field('title', $person->ID)) {?><small><?php echo $title?></small><?php }?>
										</h3>
										<?php echo apply_filters('the_content', $person->post_content)?>
									</div>
								</div>
							</div>
						<?php }
					} else {?>
						<div class="row <?php echo $team->slug?>">
						<?php
						foreach ($people as $person) {?>
							<div class="col-sm-6">
								<div class="info">
									<h3>
										<?php echo $person->post_title?>
										<?php if ($title = get_field('title', $person->ID)) {?><small><?php echo $title?></small><?php }?>
									</h3>
									<?php echo apply_filters('the_content', $person->post_content)?>
								</div>
							</div>
						<?php }?>
						</div>
					<?php }
				}?>
			</div>
		</div>
	</div>
</main>

<?php get_footer()?>