$( document ).ready(function() {	
	
	$("body").on('click', ".one_offer_specs_link", function() {
		
		var product_id = $('.user_profile_shoper_banner--links').attr('product_id');
		console.log(product_id)
		open_one_offer_specs(product_id)

	})
	
	$("body").on('click', ".one_offer_multimedia_link", function() {
		
		/* jeśli multimedia są już pobrane, to nie pobieraj ich drugi raz */
		if ( 	$('.one_offer_multimedia').length == 1	) {
			$('.one_offer_card').hide();
			$('.one_offer_multimedia').show();
		} else {
			var product_id = $('.user_profile_shoper_banner--links').attr('product_id');
			open_one_offer_multimedia(product_id)
		}
		
	})
	
	$("body").on('click', ".one_offer_desc_link", function() {
		
		$('.one_offer_card').hide();
		$('.one_offer_description').show();
		
	})
	
})

function open_one_offer_specs(product_id) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/one_offer_specs.php",
        data : {
			product_id:product_id
				},
		success: function(r) {

			$('.one_offer_card').hide();
			$('.one_offer_cards_data').prepend(r)
			
		}
	})
}

function open_one_offer_multimedia(product_id) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/one_offer_multimedia.php",
        data : {
			product_id:product_id
				},
		success: function(r) {
			
			$('.one_offer_card').hide();
			$('.one_offer_cards_data').prepend(r)
			
			/* Galeria JS */
			if ($('.one_offer_multimedia--youtube_slick iframe').length > 0) {
				$(".one_offer_multimedia--youtube_slick").slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
				});
				$('.one_offer_multimedia').append('<div style="height: 35px; width: 100%;">')
			}
		}
	})
	
}