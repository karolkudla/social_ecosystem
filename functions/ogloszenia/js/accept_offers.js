$( document ).ready(function() {
	
	/* Akceptacja ofert */
	
	$('body').on('click','.offer_acceptance', function() {		
		accept_offers_view()
	})	
	
	$('body').on('click','.accept_this_offer', function() {	
		var offer_id = $(this).attr('pid')
		accept_offer(offer_id,'accept')
	})	
	
	$('body').on('click','.reject_this_offer', function() {	
		var offer_id = $(this).attr('pid')
		accept_offer(offer_id,'reject')
	})	
	
	/* Weryfikacja firm */
	
	$('body').on('click','.companys_verify', function() {		
		verify_companys()
	})
	
	
})

function accept_offers_view() {
	
	$('#ajax').load(index+'/functions/ogloszenia/acceptance.php',function(){
		$(".shoper_product_gallery").not('.slick-initialized').slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
		});
	})	
}


function accept_offer(offer_id,acre) {
	
	var why = $(".why_rejected").val();
	
	if (	$(".imp_type:checked").length = 1    ) {
		var imp_type = $(".imp_type:checked").val();
	}
	
	$.ajax({ 
			type: "POST",   
			url: index+"/functions/ogloszenia/accept_offer_db.php",   
			data : {
				offer_id:offer_id,
				acre:acre,
				why:why,
				imp_type:imp_type
			},
			success : function(r) {

				console.log(r)
				accept_offers_view()
				
			}
	})
}


/*****************************************************************************************************/

function verify_companys() {
	
	$('#ajax').load(index+'/functions/authorization/accept_companys.php',function(){
		
	})	
}