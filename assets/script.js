jQuery(document).ready(function($) {

	//inside page carousels
	$('#gallery').on('slide.bs.carousel', function(event){
		$('#gallery-controls div').removeClass('active');
		$('#gallery-controls div').eq($(event.relatedTarget).index()).addClass('active');
	});
	
	$('#gallery-controls > div').on('click', function() {
		console.log('going to ' + $(this).index());
	    $('#gallery').carousel($(this).index());
	});
	
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

});
