<?php
get_header();
?>
<main>
	<div class="container">
	
		<div class="row">
			<div class="col-md-10 col-md-offset-2 nospace">
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
					<div class="row post">
						<div class="col-md-5">
							<?php if ($thumbnail = get_the_post_thumbnail($post, 'large')) echo $thumbnail?>
						</div>
						<div class="col-md-7">
							<h3>
								<a href="<?php the_permalink()?>"><?php the_title()?></a><br>
								<small>Posted on <?php the_date()?></small>
							</h3>
							<div><?php the_content()?></div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();