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
				<?php
				consilience_gallery($attachments);
				the_content();
				?>
			</div>
			<div class="col-md-4 side">
				<?php
				consilience_gallery_controls($attachments);
				consilience_sidebar();
				consilience_related_projects();
				?>
			</div>
		</div>
	
	</div>
</main>

<?php
get_footer();