jQuery(document).ready(function($) {

	//home page carousel
	$('#carousel').on('slide.bs.carousel', function(event){
		var title = $(event.relatedTarget).attr('data-title');
		
		//parse reignite-1 to reignite
		var dashPosition = title.indexOf('-');
		if (dashPosition !== -1) title = title.substr(0, dashPosition);
		
		//if last slide, hide all
		if ($(event.relatedTarget).index() == 0) {
			$('#carousel h1 span').removeClass('active');		
		}
		
		//wait 1s to make changes
		setTimeout(function(){
			$('#carousel h1 span#' + title).addClass('active');
		}, 1000);
	});
	
	setTimeout(function(){
		$('#carousel h1 span#reignite').addClass('active');
	}, 1000);

	//inside page carousels
	$('#gallery').on('slide.bs.carousel', function(event){
		$('#gallery-controls > div').removeClass('active');
		$('#gallery-controls > div').eq($(event.relatedTarget).index()).addClass('active');
	});
	
	$('#gallery-controls > div').on('click', function() {
		console.log('going to ' + $(this).index());
	    $('#gallery').carousel($(this).index());
	});
	
	//people page expanded text
	$('body.page-template-page-people .content').on('click', '.info', function(){
		$(this).toggleClass('expanded');
	});
	
	//projects page isotope
	$grid = $('.post-type-archive-project .content .row');
	$grid.isotope({
		itemSelector: 'a',
		layoutMode: 'fitRows',
	});

	$('.post-type-archive-project .side-nav').on('click', 'a', function(){
		$('.post-type-archive-project .side-nav li').removeClass('active');
		$(this).parent().addClass('active');
		$grid.isotope({ filter: $(this).attr('data-filter') });
	});

	//contact form
	$('form#contact').validate({
		errorElement:"span",
		errorClass:"help-inline",
		onfocusout:false,
    	onkeyup: function(element) { },
		errorPlacement: function(error, element) {},
		highlight: function(element, errorClass, validClass) {
			$(element).parent().addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parent().removeClass("has-error");
		},
		invalidHandler: function(event, validator) {
			//
		},
		submitHandler: function(form){
			var $form = $(form);
			$.post('/wp-admin/admin-ajax.php', $form.serialize(), function(data) {
				$form.css({ height: $form.height() }).html(data);
			});
			return false;
		}
	});

});
