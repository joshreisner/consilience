<?php get_header()?>

<div class="content">

	<?php 
	$attachments = new Attachments('attachments');
	if ($attachments->exist()) {?>
	<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="3000">

		<div class="carousel-inner" role="listbox">
			<?php while($index = $attachments->get()) {?>
			<div class="item<?php if ($index->id == $attachments->id(0)) {?> active<?php }?>" data-title="<?php echo sanitize_title($attachments->field('title'))?>" style="background-image:url(<?php echo $attachments->src('full')?>);"></div>
			<?php }?>
		</div>
	
		<h2><?php echo get_bloginfo('description')?></h2>
	
		<div id="keywords">
			<h1 id="reignite" class="active">(re)Ignite</h1>
			<h1 id="align">Align</h1>
			<h1 id="mobilize">Mobilize</h1>
		</div>
	
	</div>
	<?php }?>
	
	<div class="row mission">
		<div class="col-md-12">
			<h3>
				<p>Social sector organizations commit to long-term journeys that help transform lives.</p>
				<p>We join them at pivotal key points with expertise and short-term bandwidth to accelerate their impact.</p>
			</h3>
		</div>
	</div>
	
	<div class="row domain-topics">
		<div class="col-md-4"><a href="/sectors/healthcare-population-health">Silo-busting integrated services for <strong>better healthcare</strong> & <strong>population health</strong></a></div>
		<div class="col-md-4"><a href="/sectors/early-childhood-development">Comprehensive <strong>early childhood development</strong> for the best start in life</a></div>
		<div class="col-md-4"><a href="/sectors/justice-public-safety">Improved <strong>justice</strong> & <strong>public safety</strong> with person-centered solutions</a></div>
	</div>
	
	<div class="row domain-topics">
		<div class="col-md-4"><a href="/sectors/education-workforce">Student- and family-centered support for <strong>education</strong> & <strong>workforce</strong> success</a></div>
		<div class="col-md-4"><a href="/sectors/community-economic-development"><strong>Community</strong> & <strong>economic development</strong> for equitable prosperity and quality of life</a></div>
		<div class="col-md-4"><a href="/sectors/housing-social-services"><strong>Housing</strong>, aging & <strong>social services</strong> for empowered self-sufficiency</a></div>
	</div>
	
	<div class="row about">
		<div class="col-md-4 spotlight">
			<p>Spotlight</p>
			<ul>
				<li>
					<time>11/28</time>
					<p>Read our new <a href="#report">report on Lorem ipsum</a> dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
				</li>
			</ul>
		</div>
		<div class="col-md-8">
			<p>Every child is nurtured physically, emotionally, academically and spiritually. All people enjoy opportunities for physical, social and economic health. Communities thrive with people living into their highest potential.</p>
			<p>Given today’s world, this may seem impossible.  Yet, committed innovators across social agencies, sectors and systems work step-by-step, day-by-day for a more prosperous, sustainable and just society.</p>
			<p>We assist these change-makers to navigate complex, dynamic landscapes by applying the principle of <strong>consilience</strong>. Our services help find and leverage essential connections - person-to-person, organization-to-organization, system-to-system – for practical, comprehensive solutions to help transform lives.</p>

		</div>
	</div>

</div>
	
<?php get_footer()?>