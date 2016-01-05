<?php get_header()?>

<div class="content">

	<?php 
	$attachments = new Attachments('attachments');
	if ($attachments->exist()) {?>
	<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3500" data-pause="false">

		<div class="carousel-inner" role="listbox">
			<?php while($index = $attachments->get()) {?>
			<div class="item<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>" data-title="<?php echo sanitize_title($attachments->field('title'))?>" style="background-image:url(<?php echo $attachments->src('full')?>);"></div>
			<?php }?>
		</div>
	
		<h2><?php echo get_bloginfo('description')?></h2>
	
		<div id="keywords">
			<h1 id="reignite">(re)Ignite</h1>
			<h1 id="align">Align</h1>
			<h1 id="mobilize">Mobilize</h1>
		</div>
	
	</div>
	<?php }?>
	
	<div class="row mission">
		<div class="col-md-12">
			<h3>
				<p>Social sector organizations commit to long-term journeys that help transform lives.</p>
				<p>We join at key points with expertise and short-term bandwidth to accelerate impact.</p>
			</h3>
		</div>
	</div>
	
	<div class="row domain-topics">
		<div class="col-md-4"><a href="/sectors/healthcare-population-health">People-, family-, and community-centered services for better <strong>healthcare</strong> & <strong>population health</strong></a></div>
		<div class="col-md-4"><a href="/sectors/early-childhood-development">Comprehensive <strong>early childhood</strong> & <strong>maternal health</strong> systems and services for the best start in life</a></div>
		<div class="col-md-4"><a href="/sectors/justice-public-safety">Improved <strong>justice</strong> & <strong>public safety</strong> with people-centered crime prevention and intervention</a></div>
	</div>
	
	<div class="row domain-topics">
		<div class="col-md-4"><a href="/sectors/education-workforce">Learner-centered solutions and innovative partnerships for <strong>academic</strong> & <strong>workforce</strong> success</a></div>
		<div class="col-md-4"><a href="/sectors/community-economic-development"><strong>Community</strong> & <strong>economic development</strong> for equitable prosperity and quality of life</a></div>
		<div class="col-md-4"><a href="/sectors/housing-social-services">Holistic <strong>housing</strong>, <strong>aging</strong> & <strong>social services</strong> to foster empowered, sustained self-sufficiency</a></div>
	</div>
	
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
			<p>Every child is nurtured physically, emotionally, academically and spiritually. All people enjoy opportunities for physical, social and economic health. Communities thrive with people living into their highest potential.</p>
			<p>Given today’s world, this may seem impossible.  Yet, committed innovators across social agencies, sectors and systems work step-by-step, day-by-day for a more prosperous, sustainable and just society.</p>
			<p>We assist these change-makers to navigate complex, dynamic landscapes by operationalizing the principle of <strong>consilience</strong>. Our services help find and leverage essential connections - person-to-person, organization-to-organization, system-to-system – for practical, comprehensive solutions to help transform lives.</p>
		</div>
	</div>

</div>
	
<?php get_footer()?>