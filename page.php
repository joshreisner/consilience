<?php
get_header();
the_post();

$ancestor_id = $post->post_parent ? get_post_ancestors($post->ID)[0] : $post->ID;
$attachments = new Attachments('attachments');
?>

<div class="row">
	<div class="col-md-10 col-md-offset-2">
		<div class="page-header">
			<h1><?php the_title()?></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2 hidden-xs">
		<ul class="nav nav-stacked">
		    <?php wp_list_pages(array('title_li'=>'', 'include'=>$ancestor_id))?>
		    <?php wp_list_pages(array('title_li'=>'', 'depth'=>1, 'child_of'=>$ancestor_id))?>
		</ul>
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
				Right side content goes here.
			</div>
		</div>
	</div>
</div>

<?php get_footer()?>