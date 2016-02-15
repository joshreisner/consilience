<?php
/**
 * Template Name: Double-Column Image
 */

get_header();
the_post();

$attachments = new Attachments('attachments');
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
			<div class="col-md-2 side-nav hidden-xs">
				<?php echo consilience_side_nav()?>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<?php echo $attachments->image('full', 0)?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 content">
						<?php the_content()?>
					</div>
					<div class="col-md-4 side">
						<?php
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

<?php get_footer()?>