<?php get_header()?>

<div class="tagline"><?php echo get_bloginfo('description')?></div>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>

	<div class="carousel-inner" role="listbox">
		<div class="item active">
			<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/home/CHC-Full-Design-Session.jpg" alt="Test content text">
			<!--<div class="carousel-caption"></div>-->
		</div>
		<div class="item">
			<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/home/CHC-Review-Drawings-2.jpg" alt="Test content text">
			<!--<div class="carousel-caption"></div>-->
		</div>
		<div class="item">
			<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/home/dreamstime_6279565.jpg" alt="Test content text">
			<!--<div class="carousel-caption"></div>-->
		</div>
	</div>

	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>

	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="row mission">
	<div class="col-md-12">
		<p>Social enterprises work to foster positive change for people, families and communities.</p>
		<p>We help them get better results by building transformative people-centered solutions and effective collective impact.</p>
	</div>
</div>

<div class="row sectors">
	<div class="col-md-3"><a href="/sectors/healthcare-population-health">Silo-busting integrated services for <strong>better healthcare</strong> & <strong>population health</strong></a></div>
	<div class="col-md-3"><a href="/sectors/early-childhood-development">Comprehensive <strong>early childhood development</strong> for the best start in life</a></div>
	<div class="col-md-3"><a href="/sectors/justice-public-safety">Improved <strong>justice</strong> & <strong>public safety</strong> with person-centered solutions</a></div>
	<div class="col-md-3"><a href="/sectors/education-workforce">Student- and family-centered support for <strong>education</strong> & <strong>workforce</strong> success</a></div>
</div>

<div class="row sectors">
	<div class="col-md-3"><a href="/sectors/collective-impact"><strong>Collective impact</strong> for prosperous, healthy people & communities</a></div>
	<div class="col-md-3"><a href="/sectors/community-economic-development">Inside-out <strong>community</strong> & <strong>economic development</strong> for equitable opportunity</a></div>
	<div class="col-md-3"><a href="/sectors/housing-social-services">Client-centered, holistic <strong>housing</strong> & <strong>social services</strong> for self-sufficiency</a></div>
	<div class="col-md-3"><a href="/sectors/faith-based-enterprises"><strong>Faith-based enterprises</strong> serving body, mind and soul</a></div>
</div>

<div class="secondary">

<?php get_footer()?>