jQuery(document).ready(function($) {

	//inside page carousels
	$('#gallery').on('slide.bs.carousel', function(event){
		$('#gallery-controls div').removeClass('active');
		$('#gallery-controls div').eq($(event.relatedTarget).index()).addClass('active');
	});
	
	$('#gallery-controls div').on('click', function() {
	    $('#gallery').carousel($(this).index());
	});

});
