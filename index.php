<?php
get_header();
?>
<main>
	<div class="container">
	
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div class="page-header">
					<h1><?php echo single_post_title()?></h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2 side-nav hidden-xs">

			</div>
			<div class="col-md-10 content">
				<?php while (have_posts()) {
					the_post();
					?>
					<div class="post">
						<h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
						<div><?php the_content()?></div>
						<a href="<?php the_permalink()?>" class="btn btn-default">Read more</a>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();