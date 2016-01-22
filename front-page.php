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
			<div class="row"
				<div class="col-md-12">
					<h3><?php echo get_bloginfo('description')?></h3>
				</div>
			</div>
		</div>
	</div>

	<div class="domains">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/healthcare-population-health"><h4>Community & Population Health</h4></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/early-childhood-development"><h4>Early Childhood Development</h4></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/justice-public-safety"><h4>Justice & Public Safety</h4></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/education-workforce"><h4>Education & Workforce</h4></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/community-economic-development"><h4>Economic Development</h4></a></div>
				<div class="col-xs-12 col-sm-6 col-md-4"><a href="/sectors/housing-social-services"><h4>Housing, Aging & Social Services</h4></a></div>
			</div>
		</div>
	</div>
		
	<div class="container">
		<div class="row about">
			<div class="col-md-4 spotlight">
				<small>Spotlight</small>
				<h3>NAS Baby Model featured at ACHI 2016 Conference</h3>
				<p>
					<a href="http://www.healthycommunities.org/Conference/index.shtml" target="_blank"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/placeholder-report.jpg" width="240" height="311"></a>
					The TN NAS Collaborative used Consilience by Design&trade; for its innovation model to be highlighted at the <a href="http://www.healthycommunities.org/Conference/index.shtml" target="_blank">ACHI From Health Care to Healthy Communities 2016 Conference</a>.
				</p>
			</div>
			<div class="col-md-8">
				<p>Social sector organizations commit to long-term journeys that help transform lives.</p>
				<p>We join at key points with expertise and short-term bandwidth to accelerate impact.</p>
				<!--
				<p>Every child is nurtured physically, emotionally, academically and spiritually. All people enjoy opportunities for physical, social and economic health. Communities thrive with people living into their highest potential.</p>
				<p>Given today’s world, this may seem impossible.  Yet, committed innovators across social agencies, sectors and systems work step-by-step, day-by-day for a more prosperous, sustainable and just society.</p>
				<p>We assist these change-makers to navigate complex, dynamic landscapes by operationalizing the principle of <strong>consilience</strong>. Our services help find and leverage essential connections - person-to-person, organization-to-organization, system-to-system – for practical, comprehensive solutions to help transform lives.</p>
				-->
			</div>
		</div>
	</div>
</main>

<?php get_footer()?>