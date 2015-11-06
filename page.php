<?php
get_header();
the_post();
?>

<div class="row">
	<div class="col-md-10 col-md-offset-2">
		<div class="page-header">
			<h1><?php the_title()?></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		<ul class="nav nav-stacked">
			<li class="active"><a href="">Sidebar</a></li>
			<li><a href="">Sidebar</a></li>
			<li><a href="">Sidebar</a></li>
			<li><a href="">Sidebar</a></li>
		</ul>
	</div>
	<div class="col-md-7 content">
		<?php the_content()?>
	</div>
	<div class="col-md-3 side">
		Right side content goes here.
	</div>
</div>

<?php get_footer()?>