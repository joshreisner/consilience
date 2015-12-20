jQuery(document).ready(function($) {

	//inside page carousels
	$('#gallery').on('slide.bs.carousel', function(event){
		$('#gallery-controls > div').removeClass('active');
		$('#gallery-controls > div').eq($(event.relatedTarget).index()).addClass('active');
	});
	
	$('#gallery-controls > div').on('click', function() {
		console.log('going to ' + $(this).index());
	    $('#gallery').carousel($(this).index());
	});
	
	//isotope
	$grid = $('.post-type-archive-project .row.projects .main .row');
	$grid.isotope({
		itemSelector: 'a',
		layoutMode: 'masonry',
	});

	$('.post-type-archive-project .row.projects .filter li').click(function(){
		$('.post-type-archive-project .row.projects .filter li').removeClass('active');
		$(this).addClass('active');
		var filter = $(this).attr('data-filter') ? '.' + $(this).attr('data-filter') : '*';
		$grid.isotope({ filter: filter });
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
