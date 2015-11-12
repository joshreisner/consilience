<?php get_header()?>

<div class="content">

	<div id="carousel" class="carousel slide" data-ride="carousel">
		<!--
		<ol class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></li>
			<li data-target="#carousel" data-slide-to="1"></li>
			<li data-target="#carousel" data-slide-to="2"></li>
		</ol>
		-->
	
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/home/dreamstime_6279565.jpg" alt="Test content text">
				<div class="carousel-caption">
					<h1>(re)Ignite</h1>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/home/CHC-Review-Drawings-2.jpg" alt="Test content text">
				<div class="carousel-caption">
					<h1>Align</h1>
				</div>
			</div>
			<div class="item">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/home/CHC-Full-Design-Session.jpg" alt="Test content text">
				<div class="carousel-caption">
					<h1>Mobilize</h1>
				</div>
			</div>
		</div>
	
		<div class="tagline"><?php echo get_bloginfo('description')?></div>
	
		<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
	
		<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	<div class="row mission">
		<div class="col-md-10 col-md-offset-1">
			<p>Social sector organizations commit to long-term missions that foster transformational change for people and communities.</p>
			<p>We join them at strategic points on the journey with expertise and bandwidth to accelerate change, from high level strategy to on-the-ground implementation.</p>
		</div>
	</div>
	
	<div class="row domain-topics">
		<div class="col-md-3"><a href="/sectors/healthcare-population-health">Silo-busting integrated services for <strong>better healthcare</strong> & <strong>population health</strong></a></div>
		<div class="col-md-3"><a href="/sectors/early-childhood-development">Comprehensive <strong>early childhood development</strong> for the best start in life</a></div>
		<div class="col-md-3"><a href="/sectors/justice-public-safety">Improved <strong>justice</strong> & <strong>public safety</strong> with person-centered solutions</a></div>
		<div class="col-md-3"><a href="/sectors/education-workforce">Student- and family-centered support for <strong>education</strong> & <strong>workforce</strong> success</a></div>
	</div>
	
	<div class="row domain-topics">
		<div class="col-md-3"><a href="/sectors/collective-impact"><strong>Collective impact</strong> for prosperous, healthy people & communities</a></div>
		<div class="col-md-3"><a href="/sectors/community-economic-development">Inside-out <strong>community</strong> & <strong>economic development</strong> for equitable opportunity</a></div>
		<div class="col-md-3"><a href="/sectors/housing-social-services">Client-centered, holistic <strong>housing</strong> & <strong>social services</strong> for self-sufficiency</a></div>
		<div class="col-md-3"><a href="/sectors/faith-based-enterprises"><strong>Faith-based enterprises</strong> serving body, mind and soul</a></div>
	</div>
	
	<div class="row about">
		<div class="col-md-6 left">
			<p>Consilience: Finding common essence among disparate elements</p>
			<ul>
				<li><strong>16</strong> years in business</li>
				<li><strong>250+</strong> loyal clients</li>
				<li><strong>400+</strong> innovation projects</li>
			</ul>
		</div>
		<div class="col-md-6 right">
			<p><strong>We</strong> provide human-centered strategy, planning and design services to help our clients build transformative people-centered solutions and effective collective impact.</p>
			<p><strong>Our clients</strong> are innovators and change agents in healthcare, education & workforce development, criminal justice, faith-enterprise and other social sectors, primarily focused on serving people facing social and economic disadvantage.</p>
			<p><strong>Our approach</strong> mobilizes the power of consilience – finding and forging connection, person-to-person, organization-to-organization, system-to-system – to build integrated, comprehensive approaches that break through complex social barriers.</p>
		</div>
	</div>

</div>
	
<?php get_footer()?>