<?php
get_header();
the_post();

$attachments = new Attachments('attachments', $post->ID);
?>

<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h1><?php the_title()?></h1>
		</div>
	</div>
</div>

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
	<div class="col-md-7 content">
		<?php the_content()?>
	</div>
	<div class="col-md-5 side">
		<?php if ($attachments->exist() && $attachments->total() > 1) {
			$attachments->rewind();
			?>
		<div class="row" id="gallery-controls">
			<?php while($index = $attachments->get()) {?>
				<div class="col-md-6<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>"><?php echo $attachments->image('small')?></div>
			<?php }?>
			<div class="col-md-12"><hr></div>
		</div>
		<?php }
			
		$custom = get_post_custom($post->ID);
		if (!empty($custom['testimonial'][0])) {
			?>
			<h3>Testimonial</h3>
			<div class="block testimonial">
				<?php echo nl2br($custom['testimonial'][0])?>
			</div>
			<?php 
		}	
		if ($related_pages = get_post_meta(get_the_ID(), 'related_posts', true)) {?>
			<h3>Selected Related Projects</h3>
			<div class="block related">
			<?php 
			$related_pages = get_posts(array('post_type'=>'project', 'include'=>$related_pages));
			foreach ($related_pages as $related_page) {?>
				<a href="<?php echo get_permalink($related_page->id)?>"><?php echo $related_page->post_title?></a><br>
			<?php }?>
			</div>
		<?php }?>
	</div>
</div>

<?php get_footer()?>