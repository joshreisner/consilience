<?php
get_header();
the_post();

$attachments = new Attachments('attachments', $post->ID);
?>

<main>
	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1><?php the_title()?></h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-8 content">
				<?php if ($attachments->exist()) {?>
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
				<?php }
				the_content();
				?>
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
				<?php }
		
				$custom = get_post_custom($post->ID);
				if (!empty($custom['sidebar'][0])) {
					?>
					<div class="block sidebar">
						<?php echo nl2br($custom['sidebar'][0])?>
					</div>
					<?php 
				}	
				if (!empty($custom['related_posts'])) {?>
					<h3>Selected Related Projects</h3>
					<div class="block related">
					<?php 
					$related_projects = get_posts(array('post_type'=>'project', 'include'=>unserialize($custom['related_posts'][0]), 'numberposts' => -1, 'orderby' => 'post__in'));
					foreach ($related_projects as $related_project) {?>
						<a href="<?php echo get_permalink($related_project->id)?>"><?php echo $related_project->post_title?></a><br>
					<?php }?>
					</div>
				<?php }?>
			</div>
		</div>
	
	</div>
</main>

<?php get_footer()?>