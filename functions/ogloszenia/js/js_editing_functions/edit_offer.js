
/*************************************************************************************** DODAJ NOWĄ OFERTĘ ***/

$( document ).ready(function() {
	$('body').on('click','.add_new_offer', function() {
		add_new_prod('simple_offer')
	})
	$('body').on('click','.add_new_shoper_offer', function() {
		add_new_prod('shoper_offer')
	})
})

function add_new_prod(offer_type) {

	jQuery.ajax({
        type : "POST",
		data : {
			offer_type:offer_type
		},
        url : index+"/functions/ogloszenia/php_editing_functions/new_prod.php",
		success : function(r) {

			/* edit panel dla shopera */
			if (offer_type == 'shoper_offer') {
				create_edit_panel(r)
			} 
			
			/* edit panel dla okazjonalnej */
			if (offer_type == 'simple_offer') {
				create_edit_panel_simple(r)
			}
		
		}
	})
}


/*
function wait_for_sel_menu(menu) {
	setTimeout(function() {
		if (	$('.sel_menu').length == 1	  ) {

			setTimeout(function(){
				$('.sel_menu').val(menu['main'])
				$('.sel_submenu').val(menu['sub'])
			},500)
	
		} else {
			console.log('No menu.')
			wait_for_sel_menu()
		}
	},100)
}
*/
/********************************************************* USUŃ CAŁY OEFRTĘ ***/

$( document ).ready(function() {
	$('body').on('click','.shoper_del_prod', function() {
		var product_id = $(this).closest('.result_main_list').attr('id');
		if (confirm('Czy napewno chcesz usunąć tą ofertę ?')) {
				del_product(product_id);
		} 	
	})
	
	$('body').on('click','.shoper_del_prod_in_editor', function() {
		var product_id = $('.in_modal_edit').attr('product_id');
		if (confirm('Czy napewno chcesz usunąć tą ofertę ?')) {
				del_product(product_id);
				
				$("#modal_overlay").hide()
				
				var offer_type = $(this).attr("ot")

				if (offer_type == 'shoper_offer') {
					alert("Skontaktuj się z administratorem.")
				}
				
				if (offer_type == 'simple_offer') {
					alert("Ogłoszenie usunięte pomyślnie.")
					open_simple_offers(['my_offers'])
				}
				
		} 	
	})
	
})

function del_product(pid) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/php_editing_functions/del_product.php",
		data : {
			pid : pid
		},
		success: function(r) {
			
			$(".result_main_list[id='"+pid+"']").remove();
			
		}
	})	
	
}

/*********************************************************************************** DODAJ SIBLING PRODUCT ***/
/*
$( document ).ready(function() {
	
	/* Sibling Opublikuj i Kopiuj *
	
	$('body').on('click','.shoper_editor_add_sibling', function() {
		
		var product_id = $('.in_modal_edit').attr('product_id');
		$.when(	  	save_prod_data()	).done(function() {
			add_new_sibling(product_id)
		});		
		
	})
	
	/* Sibling z listy tylko Kopiuj *

	$('body').on('click','.shoper_add_sibling', function() {
			
			var product_id = $(this).closest('.result_main_list').attr('id');
			add_new_sibling(product_id)	
		
	})
})
*/

/*
function add_new_sibling(product_id) {

	jQuery.ajax({
        type : "POST",
        url : index+"/edit_access/sibling_prod.php",
		data : {
			product_id : product_id
		},
		success : function(new_prod_id) {

			create_edit_panel(new_prod_id);
			
		}
	})
	
}
*/

/*************************************************************/
/* UWAGA, reszta potrzebnych funkcji jest w create_editor.js */
/*************************************************************/

$( document ).ready(function() {
	
	/*
	$('body').on('click','.paynow', function() {
		var doladowanie = $('.doladowanie_val:checked').val()
		paynow(doladowanie);
	})
	
	$('body').on('click','.doladowanie', function() {
		buy_more();
	})
	
	$('body').on('click','#close_buy_more_modal', function() {
		$('.buy_more_offers_modal').html('')
		$('.buy_more_offers_modal').hide()
	})
	
	$('body').on('change','.simple_offers_sel_cat', function() {
		
		var text = $('.sel_cat[d=0] option:selected').val()
		$('.how_many_free_offers').html(text)
		
	})
	*/
	$('body').on('click','.edit_simple_offer', function() {
		var product_id = $(this).closest('.result_main_list').attr('id');
		create_edit_panel_simple(product_id);
	})

	$('body').on('click','.first_step_simple', function() {
		
			if (	$(".sel_cat[d=0]").val() !== 'Wybierz') {
				$('.cats_line').append('<div class="cats_already_choosed flex-center-middle">Kategorie zostały już wybrane</div>')
			}
			
			/* jeżeli jest tylko jeden step to znaczy że to nowa oferta */
			/* i trzeba dopasować edytor kategorii */
			if (	$(".step").length == 1	) {
			
				if (	$('.sel_cat[d=0]').val() !== 'Wybierz'	) {
			
					var editor_num = $('.sel_cat[d=0] option:selected').attr('f')
					var text = $('.sel_cat[d=0] option:selected').val()
					
					if (editor_num == 0) {var category = 'sprzedaz';}
					if (editor_num == 1) {var category = 'uslugi';}
					if (editor_num == 2) {var category = 'moto';}
					if (editor_num == 3) {var category = 'nieruchomosci';}
					if (editor_num == 5) {var category = 'praca';}
				
					/* sprawdzamy ile wolnych ogloszen jest do wykorzystania */
					$.when(	    check_offer_limit(text)   	).done(function(ans) {
						
						if (ans == 'nolimit') {
							var product_id = $('.in_modal_edit').attr('product_id')
							$.when(	 get_data(product_id,2)	).done(function(json) {
								create_category_edit_panel_simple(category,json,'first')
					
							})
						}
						
						if (ans == 'limit') {
							
							$.when( 	save_prod_data('new')   	).done(function(ans) {
								alert('Wyczerpałeś limit ofert w tej kategorii.')
							})
							
						}

					})
					
				} else {	alert('Wybierz kategorię')	   }
				
			/* więcej stepów oznacza że to edycja, a nie nowa oferta */
			} else {
				var cont = $(".show");
				next_step(cont)
			}
	})

	$('body').on('click','.check_nieruchomosci_simple', function() {
		
		var ru = $('.idg[name=rodzaj_umowy]:checked').length
		var ro = $('.idg[name=rodzaj_obiektu]:checked').length
		
		if (	ru == 1 && ro == 1  	) {
		
		if ($('.step[step=4]').is(':empty')){

			var rodzaj_umowy = $('.idg[name=rodzaj_umowy]:checked').val()
			var rodzaj_obiektu = $('.idg[name=rodzaj_obiektu]:checked').val()

			var json = {
				'product_data':{
					'specyfikacja_oferty':{
						'rodzaj_umowy':{
							'value':rodzaj_umowy
						},
						'rodzaj_obiektu': {
							'value':rodzaj_obiektu
						}
					}
				}
			}

			get_step_simple('4',json)
			get_step_simple('5',json)
			
			$('.umowy_line').append('<div class="cats_already_choosed flex-center-middle">Rodzaj umowy i rodzaj obiektu zostały już wybrane</div>')
			
		}
		
		} else {
			
			alert("Najpierw wybierz rodzaj obiektu i rodzaj umowy w Etapie 2")
			
		}
	
	})

})

function check_offer_limit(cat) {
	
	var deferred = $.Deferred();
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/check_offer_limit.php",
		data : {
			cat:cat
		},
		success : function(r) {

			console.log(r)
			deferred.resolve(r)
		
		}
	})

	return deferred.promise();

}

/*
function paynow(doladowanie) {
	
	$.ajax({ 
			type: "POST",   
			url: index+"/functions/ogloszenia/paynow.php",   
			data : {
				amount:doladowanie
			},
			success : function(response) {
				console.log(response)
			}
	})
	
}

function buy_more() {
	
	$.ajax({ 
			type: "POST",   
			url: index+"/functions/ogloszenia/layouts/buy_more_modal.php", 
			success : function(response) {
				$('.center_panel').html(response)
			}
	})
	
}
*/

/* wyświetla tylko pierwszą stronę w ofertach okazjonalnych */
function create_edit_panel_simple(product_id) {

	$("body").css("overflow","hidden")

	$.ajax({ type: "GET",   
			url: index+"/functions/ogloszenia/offer_editors_simple/edit_panel_simple.php",   
			success : function(answer)
			{	
				$("#modal_overlay").show();
				$("#modal").html(answer)
		
				$.when(	 get_data(product_id,1)	).done(function(json) {

					/* Pobieraj edytor kategorii dopiero, gdy istnieje coś w 'product_data' */
					if (json['product_data'] !== null) {
						function wait_for_cat() {
			
							if (	$('.sel_cat[d=0] option').val() !== 'Wybierz'	 ) {
							
								var editor_num = $('.sel_cat option:selected').attr('f')
								
								if (editor_num == 0) {var category = 'sprzedaz';}
								if (editor_num == 1) {var category = 'uslugi';}
								if (editor_num == 2) {var category = 'moto';}
								if (editor_num == 3) {var category = 'nieruchomosci';}
								if (editor_num == 5) {var category = 'praca';}
					
								create_category_edit_panel_simple(category,json)

							} else {
								setTimeout(function() {
									wait_for_cat()
							
								}, 100)
							}
						}

						wait_for_cat()
					} else {
					
					}
					
				});		
			}
	})
}

/* Wykreuj panel dla kategorii */
function create_category_edit_panel_simple(category,json,step) {
		
	$.ajax({ type: "GET",   
		 url: index+'/functions/ogloszenia/offer_editors_simple/'+category+'.php',
		 success : function(category_editor)
		 {
			$('.edit_panel_inner').append(category_editor)
		
			var steps_length = 	$('.step').length
			for (i=2;i <= steps_length;i++) {
				$('.steps').append('\
					<div class="step_enabled" step="'+i+'">Etap '+i+'</div>\
					<i class="a-right"></i>\
				')
			}
			
			if (category == 'nieruchomosci') {
				$('.step_enabled[step=4]').addClass("check_nieruchomosci_simple")
				$('.step_enabled[step=5]').addClass("check_nieruchomosci_simple")
			}
			
			/* różna liczba stepów, więc trzeba nadać get_view dynamicznie */
			$('.step_enabled').last().addClass('get_view')

			/* jeżeli był klikniety first step */
			if (step == 'first') {
				$('.step[step=1]').hide().removeClass("show").addClass("hide")
				$('.step[step=2]').show().removeClass("hide").addClass("show")
			}
			
			/* jeżeli są to nieruchomości,
			/* to najpierw pobierz odpowiedni panel
			/* i dopiero data getter
			/* jeśli nie to poprostu data getter */
			if (json['cats']) {
				var kategoria = json['cats']['0']
			}
			
			if (kategoria == 'Nieruchomości') {
				
				var key_string_1 = ['product_data','specyfikacja_oferty','rodzaj_umowy','value'];
				var key_string_2 = ['product_data','specyfikacja_oferty','rodzaj_obiektu','value'];
				
				if (check_key_exists(json,key_string_1) == 1 && check_key_exists(json,key_string_2) == 1) {
						get_step_simple('4',json) 
						get_step_simple('5',json) 
						
						$('.umowy_line').append('<div class="cats_already_choosed flex-center-middle">Rodzaj umowy i rodzaj obiektu zostały już wybrane</div>')

				} else {
					intelligent_data_getter(json)
				}
				
			} else {
				intelligent_data_getter(json)
				block_inputs()
			}
		 }
	});
	
}


/* Pobierz odpowiedni edytor dla Nieruchomości */
function get_step_simple(step_num,json) {
	
	var ru = json['product_data']['specyfikacja_oferty']['rodzaj_umowy']['value'];
	var ro = json['product_data']['specyfikacja_oferty']['rodzaj_obiektu']['value'];
		
	if ((ru == 'odstapienie' || ru == 'najem' || ru == 'najem_okazjonalny') && ro == 'dom') 			{var step_5 = 'nieruchomosci_2_w_domy';	 	var step_4 = 'nieruchomosci_1_wynajem_male'	}
	if ((ru == 'odstapienie' || ru == 'najem' || ru == 'najem_okazjonalny') && ro == 'mieszkanie') 		{var step_5 = 'nieruchomosci_2_w_mip';	 	var step_4 = 'nieruchomosci_1_wynajem_male'	}
	if ((ru == 'odstapienie' || ru == 'najem' || ru == 'najem_okazjonalny') && ro == 'pokoje')			{var step_5 = 'nieruchomosci_2_w_mip';	 	var step_4 = 'nieruchomosci_1_wynajem_male'	}
	if ((ru == 'odstapienie' || ru == 'najem' || ru == 'najem_okazjonalny') && ro == 'lokale_uzytkowe')	{var step_5 = 'nieruchomosci_2_w_lokale';	var step_4 = 'nieruchomosci_1_wynajem_male'	}
	if ((ru == 'odstapienie' || ru == 'najem' || ru == 'najem_okazjonalny') && ro == 'dzialki') 		{var step_5 = 'nieruchomosci_2_sw_dzialka';	var step_4 = 'nieruchomosci_1_wynajem_duze'	}
	if ((ru == 'odstapienie' || ru == 'najem' || ru == 'najem_okazjonalny') && ro == 'hale_magazyny') 	{var step_5 = 'nieruchomosci_2_sw_hala';	var step_4 = 'nieruchomosci_1_wynajem_duze'	}
	if ((ru == 'odstapienie' || ru == 'najem' || ru == 'najem_okazjonalny') && ro == 'garaze') 			{var step_5 = 'nieruchomosci_2_sw_garaz';	var step_4 = 'nieruchomosci_1_wynajem_duze'	}

	if (ru == 'kupno-sprzedaz' && ro == 'dom') 				{var step_5 = 'nieruchomosci_2_s_domy'; 	var step_4 = 'nieruchomosci_1_sprzedaz';}
	if (ru == 'kupno-sprzedaz' && ro == 'mieszkanie') 		{var step_5 = 'nieruchomosci_2_s_mip'; 		var step_4 = 'nieruchomosci_1_sprzedaz';}
	if (ru == 'kupno-sprzedaz' && ro == 'pokoje') 			{var step_5 = 'nieruchomosci_2_s_mip'; 		var step_4 = 'nieruchomosci_1_sprzedaz';}
	if (ru == 'kupno-sprzedaz' && ro == 'lokale_uzytkowe') 	{var step_5 = 'nieruchomosci_2_s_lokale'; 	var step_4 = 'nieruchomosci_1_sprzedaz';}
	if (ru == 'kupno-sprzedaz' && ro == 'dzialki') 			{var step_5 = 'nieruchomosci_2_sw_dzialka'; var step_4 = 'nieruchomosci_1_sprzedaz';}
	if (ru == 'kupno-sprzedaz' && ro == 'hale_magazyny') 	{var step_5 = 'nieruchomosci_2_sw_hala'; 	var step_4 = 'nieruchomosci_1_sprzedaz';}
	if (ru == 'kupno-sprzedaz' && ro == 'garaze') 			{var step_5 = 'nieruchomosci_2_sw_garaz'; 	var step_4 = 'nieruchomosci_1_sprzedaz';}

	var step = 'step_'+step_num

	$.ajax({ type: "GET",   
			url: index+"/functions/ogloszenia/offer_editors_simple/"+eval(step)+".php",
			success : function(answer)
			{	

				$('.step[step='+step_num+']').html(answer)
				
				if (	$('.step[step=4]').children().length > 0  &&  $('.step[step=5]').children().length > 0 ) {
					intelligent_data_getter(json)
					block_inputs()
				} 

			}
	})
}


