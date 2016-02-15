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
				<a href="<?php echo get_permalink(get_option('page_for_posts'))?>" class="back">
					<i class="glyphicon glyphicon-chevron-left"></i> 
					<span>Back to Insights</span>
				</a>
			</div>
			<div class="col-md-10 content">
				<?php while (have_posts()) {
					the_post();
					?>
					<div class="row post">
						<div class="col-md-7">
							<div><?php the_content()?></div>
								<small>Posted on <?php the_date()?></small>
						</div>
						<div class="col-md-5">
							<?php if ($thumbnail = get_the_post_thumbnail($post, 'large')) echo $thumbnail?>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</main>
<?php
get_footer();