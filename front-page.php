<?php get_header()?>

<main>
	<?php 
	$attachments = new Attachments('attachments');
	if ($attachments->exist()) {?>
	<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3500" data-pause="false">

		<div class="carousel-inner" role="listbox">
			<?php while($index = $attachments->get()) {?>
			<div class="item<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>" data-title="<?php echo sanitize_title($attachments->field('title'))?>" style="background-image:url(<?php echo $attachments->src('full')?>);"></div>
			<?php }?>
		</div>
	
		<h1 id="keywords">
			<span id="reignite">(re)Ignite.</span>
			<span id="align">Align.</span>
			<span id="mobilize">Mobilize.</span>
		</h1>
	
	</div>
	<?php }?>

	<div class="mission">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3><?php echo get_bloginfo('description')?></h3>
				</div>
			</div>
		</div>
	</div>

	<div class="sectors">
		<div class="container">
			<div class="inner">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/healthcare-population-health"><h4>Healthcare & Population Health</h4></a></div>
					<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/early-childhood-development"><h4>Early Childhood Development</h4></a></div>
					<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/justice-public-safety"><h4>Justice & Public Safety</h4></a></div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/education-workforce"><h4>Education & Workforce</h4></a></div>
					<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/community-economic-development"><h4>Community & Economic Development</h4></a></div>
					<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/housing-social-services"><h4>Housing, Aging & Social Services</h4></a></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="about">
		<div class="headings">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						Spotlight
					</div>
					<div class="col-md-8">
						What's New
					</div>
				</div>
			</div>
		</div>
		<div class="stories">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h3>NAS Baby Model featured at ACHI 2016 Conference</h3>
						<p>
							<a href="http://www.healthycommunities.org/Conference/index.shtml" target="_blank"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/placeholder-report.jpg" width="240" height="311"></a>
							The TN NAS Collaborative used Consilience by Design&trade; for its innovation model to be highlighted at the <a href="http://www.healthycommunities.org/Conference/index.shtml" target="_blank">ACHI From Health Care to Healthy Communities 2016 Conference</a>.
						</p>
					</div>
					<div class="col-md-4">
						<h3>Insights Post #1</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam augue leo, pulvinar eget convallis ac, pulvinar sit amet lectus. Nam rutrum massa a tempus gravida. Fusce vitae justo mauris. Morbi imperdiet et ligula non dignissim. Pellentesque ac condimentum nisl, a malesuada nisi.</p>
						<p><a href="#">Read more &gt;</a></p>
					</div>
					<div class="col-md-4">
						<h3>Insights Post #2</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam augue leo, pulvinar eget convallis ac, pulvinar sit amet lectus. Nam rutrum massa a tempus gravida. Fusce vitae justo mauris. Morbi imperdiet et ligula non dignissim. Pellentesque ac condimentum nisl, a malesuada nisi.</p>
						<p><a href="#">Read more &gt;</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php get_footer()?>