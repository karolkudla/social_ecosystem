$( document ).ready(function() {
	
	$('body').on('click','.shoper_edit_prod', function() {
		var product_id = $(this).closest('.result_main_list').attr('id');
		create_edit_panel(product_id);
	})

	$('body').on('click','.first_step', function() {
		
			/* jeżeli jest tylko jeden step to znaczy że to nowa oferta */
			if (	$(".step").length == 1	) {
			
				if (	$('.sel_cat[d=0]').val() !== 'Wybierz'	) {
			
					var editor_num = $('.sel_cat[d=0] option:selected').attr('f')
					
					if (editor_num == 0) {var category = 'sprzedaz';}
					if (editor_num == 1) {var category = 'uslugi';}
					if (editor_num == 2) {var category = 'moto';}
					if (editor_num == 3) {var category = 'nieruchomosci';}
					if (editor_num == 4) {var category = 'hotel';}
					if (editor_num == 5) {var category = 'praca';}
					if (editor_num == 6) {var category = 'bilety';}
			
					var product_id = $('.in_modal_edit').attr('product_id')
					$.when(	 get_data(product_id)	).done(function(json) {
						create_category_edit_panel(category,json,'first')
						
					})
			
				} else {	alert('Wybierz kategorię')		}
				
			} else {
				var cont = $(".show");
				next_step(cont)
			}
	})

	/* zmienić na klika rodzaj umowy/obiektu */
	$('body').on('click','.check_nieruchomosci', function() {
		
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

			get_step('4',json)
			get_step('5',json)
			
			$('.umowy_line').append('<div class="cats_already_choosed flex-center-middle">Rodzaj umowy i rodzaj obiektu zostały już wybrane</div>')
			
		}
		
		} else {
			
			alert("Najpierw wybierz rodzaj obiektu i rodzaj umowy w Etapie 2")
			
		}
	
	})

	$('body').on('click', 'input[type=checkbox]', function() {
		block_inputs()
	})
	
	$('body').on('click', 'input[type=radio]', function() {
		block_inputs()
	})

	$('body').on('click', 'input[type=super_text], input[type=text]', function() {
		$(this).css({'background':'white','color':'black'})
	})

})

/* wyświetla tylko pierwszą stronę */
function create_edit_panel(product_id) {

	$.ajax({ type: "GET",   
			url: index+"/functions/shoper/offer_editors/edit_panel.php",   
			success : function(answer)
			{	
				$("#modal_overlay").show();
				$("#modal").html(answer)
		
				$.when(	 get_data(product_id)	).done(function(json) {

					/* Pobieraj edytor kategorii dopiero, gdy istnieje coś w 'product_data' */
					if (json['product_data'] !== null) {
						function wait_for_cat() {
			
							if (	$('.sel_cat[d=0] option').val() !== 'Wybierz'	 ) {
								
								var editor_num = $('.sel_cat option:selected').attr('f')
								
								if (editor_num == 0) {var category = 'sprzedaz';}
								if (editor_num == 1) {var category = 'uslugi';}
								if (editor_num == 2) {var category = 'moto';}
								if (editor_num == 3) {var category = 'nieruchomosci';}
								if (editor_num == 4) {var category = 'hotel';}
								if (editor_num == 5) {var category = 'praca';}
								if (editor_num == 6) {var category = 'bilety';}
							
								create_category_edit_panel(category,json)

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

function create_category_edit_panel(category,json,step) {
	
	$.ajax({ type: "GET",   
		 url: index+'/functions/shoper/offer_editors/'+category+'.php',
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
						get_step('4',json) 
						get_step('5',json) 
						
						/* usuwanie pól dla zwykłej oferty */
						
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

function check_key_exists(object,keys) {

	var flaga = ['1'];
	var arr = [];
	arr.push('object')
	var str = 'object';
	$.each(keys, function(k,v) {
		str += '["'+v+'"]'
		arr.push(str)

		if (flaga.pop() == 1) {
			if (eval(arr[k])) {
				flaga.push('1')
			} else {
				flaga.push('0')
			}
		}
	})
	
	return flaga.pop()

}

function check_required() {
	
	var flag = []
	
	$('.required').each(function(k,v) {
		
		if (	$(v).children().length > 0   ) {
			/* required dla radio i checkbox */
			var checked = $(v).find('input:checked')
			if (	checked.length != 1 	) {		
				flag.push('0')
				$(v).css({'background':'#F44336','color':'white'})
			} 
			
		} else {
			/* required dla pojedyńczych text i select */
			flag.push('0')
			$(v).css({'background':'#F44336','color':'white'})
			
		}

	})
	
	if (flag.length > 0) {
		console.log('deny')
	} else {
		console.log('allow')
	}

}

function get_step(step_num,json) {
	
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
			url: index+"/functions/shoper/offer_editors/"+eval(step)+".php",
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

function next_step(cont) {
	
		var first_disabled = $(".step_disabled:first");
		first_disabled.removeClass("step_disabled").addClass("step_enabled");
		
		cont.removeClass("show").addClass("hide")
		cont.next().removeClass("hide").addClass("show")
		
		cont.hide()
		cont.next().show()

}

function block_inputs() {
		
		/* Sprawdza czy poprzedni check/radio jest zaznaczony przy tekstowym inpucie, jeśli nie to czyści i blokuje go */
		
		$('input[type=text]').each(function(k,v) {
			var tick = $(v).parent().prev('label').children('input')

			if (tick.prop('checked') == false) {
				$(v).prop('disabled',true)
		
			} else {
				$(v).prop('disabled',false)
			
			}
		})
		
		$('input[type=number]').each(function(k,v) {
			var tick = $(v).parent().prev('label').children('input')
			if (tick.prop('checked') == false) {
				$(v).prop('disabled',true)
			
			} else {
				$(v).prop('disabled',false)
			
			}
		})
		
		$('select').each(function(k,v) {
			var tick = $(v).parent().prev('label').children('input')
			if (tick.prop('checked') == false) {
				$(v).prop('disabled',true)
				$(v).val('')
				$(v).css('background','#ececec')
			} else {
				$(v).prop('disabled',false)
				$(v).css('background','white')
			}
		})
		
		$('input[type=date]').each(function(k,v) {
			var tick = $(v).parent().prev('label').children('input')
			if (tick.prop('checked') == false) {
				$(v).prop('disabled',true)
				$(v).val('')
				$(v).css('background','#ececec')
			} else {
				$(v).prop('disabled',false)
				$(v).css('background','white')
			}
		})		
}
