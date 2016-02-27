<?php
get_header();
the_post();

$attachments = new Attachments('attachments', $post->ID);
?>

<main>
	<div class="container">
	
		<div class="row">
			<div class="col-md-10 col-md-offset-2 nospace">
				<div class="page-header">
					<h1><?php the_title()?></h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2 side-nav">
				<a href="<?php echo get_post_type_archive_link('project')?>" class="back">
					<i class="glyphicon glyphicon-chevron-left"></i> 
					<span>Back to Projects</span>
				</a>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-8 content">
						<?php
						consilience_image($attachments);
						//consilience_gallery($attachments);
						the_content();
						?>
					</div>
					<div class="col-md-4 side">
						<?php
						//consilience_gallery_controls($attachments);
						consilience_sidebar();
						consilience_related_projects();
						consilience_side_lower();
						?>
					</div>
				</div>
			</div>
		</div>
	
	</div>
</main>

<?php
get_footer();