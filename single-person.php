<?php
get_header();
the_post();

$attachments = new Attachments('attachments', $post->ID);
?>

<main>
	<div class="container">
	
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
				<div class="page-header">
					<h1><?php the_title()?>
					<?php if ($title = get_field('title')) {?>
						<small><?php echo $title?></small>
					<?php }?>
					</h1>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-2 side-nav hidden-xs">
				<strong>About Us</strong>
			    <?php wp_nav_menu(array(
				    'menu' => 'main',
				    'level' => 2,
				    'child_of' => 'About Us',
				    'container' => false,
				    'menu_class' => 'nav nav-stacked',
				))?>
			</div>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-8 content">
						<?php
						the_content();
						?>
					</div>
					<div class="col-md-4 side">
						<?php echo the_post_thumbnail('large')?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer()?>