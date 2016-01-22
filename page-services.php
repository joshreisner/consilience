<?php
/**
 * Template Name: Services Page
 */

get_header();
the_post();

$ancestor_id = $post->post_parent ? get_post_ancestors($post->ID)[0] : $post->ID;
$attachments = new Attachments('attachments');
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
				<strong>Services</strong>
			    <?php wp_nav_menu(array(
				    'menu' => 'main',
				    'level' => 2,
				    'child_of' => 'Services',
				    'container' => false,
				    'menu_class' => 'nav nav-stacked',
				))?>
			</div>
			<div class="col-md-10">
				<?php if ($attachments->exist()) {?>
				<div class="row">
					<div class="col-md-12 gallery">
						<div id="gallery" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
							<?php while($index = $attachments->get()) {?>
								<div class="item<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>">
									<?php echo $attachments->image('full')?>
									<div class="carousel-caption">
										<?php echo $attachments->field('caption')?>
									</div>
								</div>
							<?php }?>
							</div>
						</div>
					</div>
				</div>
				<?php }?>
				<div class="row">
					<div class="col-md-8 content">
						<?php the_content()?>
					</div>
					<div class="col-md-4 side">
						<?php if ($attachments->exist() && $attachments->total() > 1) {
							$attachments->rewind();
							?>
						<div class="row" id="gallery-controls">
							<?php while($index = $attachments->get()) {?>
								<div class="col-md-6<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>">
									<div class="thumbnail<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>" style="background-image:url(<?php echo $attachments->src('medium')?>)"></div>
								</div>
							<?php }?>
							<!-- <div class="col-md-12"><hr></div> -->
						</div>
						<?php }?>
						
						<?php if ($related_projects = get_post_meta(get_the_ID(), 'related_posts', true)) {?>
							<h3>Selected Related Projects</h3>
							<?php 
							$related_projects = get_posts(array('post_type'=>'project', 'include'=>$related_projects, 'numberposts' => -1, 'orderby' => 'post__in'));
							foreach ($related_projects as $related_project) {?>
								<a href="<?php echo get_permalink($related_project->id)?>"><?php echo $related_project->post_title?></a><br>
							<?php }
						}?>
					</div>
				</div>
			</div>
		</div>
	
	</div>
</main>

<?php get_footer()?>