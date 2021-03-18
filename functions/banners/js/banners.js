$( document ).ready(function() {
	
	$('body').on('click','.add_banner', function() {
		$.when(permission('2','banners')).done(function(v) {
			if (v !== null && v['status'] == 'ok') {
				add_banner()
			} else {
				alert('Zarejestruj się jako firma, aby móc wesprzeć nasz serwis')
			}
		});	
	})
	
	/* Przejście do sprawdzenia formularza i płatności */
	$('body').on('click','.pay_for_banner', function() {
		banner_paynow()
	})
	
	/* Wybielaj select po kliknięciu, gdy był zaznaczony na różowo */
	$('body').on('click','.select_wojewodztwa_sr, .select_miasta_gminy_sr, .select_powiaty_sr', function() {
		$(this).css('background','white')
	})
	
	/* Wgrywanie zdjęcia */
	$('body').on('change','.banner_up_button', function() {	
		var form = $(this).parent()
		add_banner_img(form)
	})

	/* Wybór lokalizacji banneru powoduje load i remove pozostałych list regionów */
	$('body').on('click','.lokalizacja_banneru_polska', function() {
		
		$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
		
		$(".banner_powiaty .sr").remove();
		$(".banner_gminy .sr").remove();
		$(".banner_wojewodztwa .sr").remove();
		
		$(".banner_poziomy_wybierz").show();
		$(".banner_pionowy_wybierz").hide();
	})
	
	$('body').on('click','.lokalizacja_banneru_wojewodztwa', function() {	
	
		$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
	
		$(".banner_powiaty .sr").remove();
		$(".banner_gminy .sr").remove();
		$(".banner_wojewodztwa").load(index+'/functions/banners/layouts/select_wojewodztwa.php')
		
		$(".banner_poziomy_wybierz").hide()
		$(".banner_pionowy_wybierz").show()
		
	})
	
	$('body').on('click','.lokalizacja_banneru_powiaty', function() {
		
		$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
		
		$(".banner_wojewodztwa .sr").remove();
		$(".banner_gminy .sr").remove();
		$(".banner_powiaty").load(index+'/functions/banners/layouts/select_powiaty.php')
		
		$(".banner_poziomy_wybierz").hide()
		$(".banner_pionowy_wybierz").show()
		
	})
	
	$('body').on('click','.lokalizacja_banneru_gminy', function() {
		
		$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
		
		$(".banner_powiaty .sr").remove();
		$(".banner_wojewodztwa .sr").remove();
		$(".banner_gminy").load(index+'/functions/banners/layouts/select_gminy.php')
		
		$(".banner_poziomy_wybierz").hide()
		$(".banner_pionowy_wybierz").show()
		
	})
	


	/* Pobieranie odpowiednich powiatów i gmin do selectów */
	$('body').on('change','.select_wojewodztwa_sr', function() {		
		var gmi_select = $(this).parent().find(".select_miasta_gminy_sr")
		gmi_select.html("<option value='' kod='' rodz=''>Miejscowość / Gmina</option>")
		get_terytorium_for_banners(1,0,$(this))
	})	
	
	$('body').on('change','.select_powiaty_sr', function() {	
		get_terytorium_for_banners(0,1,$(this))
	})	
	
	
	
	/* Dodawanie nowych linijek z woj, pow i gmi */
	$('body').on('click','.add_new_woj', function() {
		add_new_woj()
		$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
	})
	
	$('body').on('click','.add_new_pow', function() {
		add_new_pow()
		$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
	})
	
	$('body').on('click','.add_new_gmi', function() {
		add_new_gmi()
		$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
	})
	
	
	
	/* Usuwanie linijek z woj, pow i gmi */ 
	$('body').on('click','.remove_region', function() {
		if (	$(".sr").length > 1	) {		
			$(this).parent().remove()
			$(".podsumowanie_cena").html('<div class="blue_btn check_price">Sprawdź cenę</div>').attr("value","")
		}
	})
	

	/* Sprawdzanie ceny */
	$('body').on('click', '.check_price', function() {
		calculate_price()
	})
	
	
	/* Podgląd banneru */
	$('body').on('click', '.podglad_pion, .podglad_poziom', function() {
		var selector = $(this)
		podglad(selector)
	})
	
})

function get_terytorium_for_banners(get_powiaty,get_mg,this_select) {
	
	var woj_select = this_select.parent().find(".select_wojewodztwa_sr")
	var pow_select = this_select.parent().find(".select_powiaty_sr")
	var gmi_select = this_select.parent().find(".select_miasta_gminy_sr")
	
	var woj_kod = woj_select.find("option:selected").attr("kod")
	var pow_kod = pow_select.find("option:selected").attr("kod")

	if (woj_kod !== '00') {
		jQuery.ajax({
			type : "POST",
			url : index+"/functions/terytorium/data_from_province.php",
			data : {
				woj_kod:woj_kod,
				pow_kod:pow_kod,
				get_powiaty:get_powiaty,
				get_mg:get_mg
			},
			success: function(data) {
				
				
				
				var json = JSON.parse(data)

				if (get_powiaty == 1) {
					
					pow_select.html("<option value='' kod=''>Miasto / Powiat</option>")
					$.each(json['miasta'], function(k,v) {
						pow_select.append("<option kod='"+v['kod']+"'>"+v['nazwa']+"</option>")
					})
					
					$.each(json['powiaty'], function(k,v) {
						
						if (v['dopisek'][0] !== null) {var dop_0 = " - "+v['dopisek'][0]} else {dop_0 = ''}
						if (v['dopisek'][1] !== null) {var dop_1 = ", "+v['dopisek'][1]} else {dop_1 = ''}
						
						pow_select.append("<option kod='"+v['kod']+"'>"+v['nazwa']+dop_0+dop_1+"</option>")
					})
				}
			
				if (get_mg == 1) {
					
					gmi_select.html("<option value='' kod='' rodz=''>Miasto / Gmina</option>")
					$.each(json, function(k,v) {
						gmi_select.append("<option kod='"+v['kod']+"' rodz='"+v['rodz']+"'>"+v['nazwa']+", "+v['dopisek']+"</option>")
					})
				}

				
			return false;					   
			}
		})	
	}
	
}

function add_new_woj() {
	
	if ($(".sr").length < 10) {
	
		jQuery.ajax({
			type : "POST",
			url : index+'/functions/banners/layouts/select_wojewodztwa.php',
			success: function(wojewodztwa_select) {
				
				$(".banner_wojewodztwa").append(wojewodztwa_select)

			return false;					   
			}
		})	
		
	} else {
		alert("Można prowadzić kampanię maksymalnie w 10 województwach.")
	}
}

function add_new_pow() {
	
	if ($(".sr").length < 6) {
	
	jQuery.ajax({
		type : "POST",
		url : index+'/functions/banners/layouts/select_powiaty.php',
		success: function(powiaty_select) {
			
			$(".banner_powiaty").append(powiaty_select)

		return false;					   
		}
	})	
	
	} else {
		alert("Można prowadzić kampanię maksymalnie w 6 powiatach.")
	}
}

function add_new_gmi() {
	
	if ($(".sr").length < 5) {
	
	jQuery.ajax({
		type : "POST",
		url : index+'/functions/banners/layouts/select_gminy.php',
		success: function(gminy_select) {
			
			$(".banner_gminy").append(gminy_select)

		return false;					   
		}
	})	
	
	} else {
		alert("Można prowadzić kampanię maksymalnie w 5 gminach.")
	}
	
}


function add_banner() {
	
	if (	$('.result_list').length == 1	) {
		$('.result_list').load(index+'/functions/banners/layout_add_banners.php', function() {
		
		})
	} else {
		open_simple_offers(["open_index"])
		
		setTimeout(function() {
			$('.result_list').load(index+'/functions/banners/layout_add_banners.php', function() {
		
			})

		},100)		
	}

}

function calculate_price() {
	
	if (	$(".lokalizacja_banneru:checked").val() == 'polska'	) {
		var cp = "30'000 PLN"
		var val = 3000000
		$(".podsumowanie_cena").html(cp).attr("value",val)
	}
	if (	$(".lokalizacja_banneru:checked").val() == 'wojewodztwo'	) {
		
		var len = $('.sr').length
		if (len == 1) {cp = "3'000 PLN"; val = 300000}
		if (len == 2) {cp = "6'000 PLN"; val = 600000}
		if (len == 3) {cp = "9'000 PLN"; val = 900000}
		if (len == 4) {cp = "11'000 PLN"; val = 1100000}
		if (len == 5) {cp = "13'000 PLN"; val = 1300000}
		if (len == 6) {cp = "15'000 PLN"; val = 1500000}
		if (len == 7) {cp = "16'000 PLN"; val = 1600000}
		if (len == 8) {cp = "17'000 PLN"; val = 1700000}
		if (len == 9) {cp = "18'000 PLN"; val = 1800000}
		
		$(".podsumowanie_cena").html(cp).attr("value",val)
	}
	if (	$(".lokalizacja_banneru:checked").val() == 'powiat'	) {
		
		var len = $('.sr').length
		if (len == 1) {cp = "500 PLN"; val = 50000}
		if (len == 2) {cp = "1'000 PLN"; val = 100000}
		if (len == 3) {cp = "1'500 PLN"; val = 150000}
		if (len == 4) {cp = "1'750 PLN"; val = 175000}
		if (len == 5) {cp = "2'000 PLN"; val = 200000}
		
		$(".podsumowanie_cena").html(cp).attr("value",val)
	}

	if (	$(".lokalizacja_banneru:checked").val() == 'gmina'	) {
		
		var len = $('.sr').length
		var pcp = 500
		var pval = 50000
		
		var cp = len*pcp;
		var val = len*pval;
		
		$(".podsumowanie_cena").html(cp+" PLN").attr("value",val)
	}

	if (	$(".lokalizacja_banneru:checked").length == 0	) {
		alert("Wybierz lokalizacje reklamy")
	}
	
	return val;

}

function add_banner_img(form) {

	var typ = form.attr("typ")

	form.ajaxForm({ 
		success: function(r){			
			
			var json = JSON.parse(r)
			if (json[0] !== 'niezalogowany') {
				
				if (typ == 'pion') {
					$(".podglad_pion").attr("url",index+users_uploads+json[0]+user_company_banners+json[1])
				}
				
				if (typ == 'poziom') {
					$(".podglad_poziom").attr("url",index+users_uploads+json[0]+user_company_banners+json[1])
				}
				
			}
			
		},
		error:function(r){
			console.log("error");
		}
	}).submit();

}

function podglad(selector) {
	
	var url = selector.attr("url")
	var img_reklamy_pionowy = $(".podglad_pion").attr("url")
	var img_reklamy_poziomy = $(".podglad_poziom").attr("url")
	
	if (	$(".lokalizacja_banneru:checked").val() == 'polska' 	) {	
		if (img_reklamy_poziomy !== '') {
			$(".pl-banner").html('<img class="banner_for_woj" src="'+url+'">')
			$('html,body').animate({
				scrollTop: $(".center_panel").offset().top
			}, 'slow');				
		} else {alert("Wgraj obraz, aby zobaczyć podgląd")}
	}
	if (	$(".lokalizacja_banneru:checked").val() == 'wojewodztwo'    ) {
		if (img_reklamy_pionowy !== '') {
			$(".woj-banner").html('<img class="banner_for_pow" src="'+url+'">')
			$('html,body').animate({
				scrollTop: $(".woj_scroll").offset().top
			}, 'slow');
		} else {alert("Wgraj obraz, aby zobaczyć podgląd")}
	}
	if (	$(".lokalizacja_banneru:checked").val() == 'powiat'	   ) {
		if (img_reklamy_pionowy !== '') {
			$(".pow-banner").html('<img class="banner_for_pow" src="'+url+'">')
			$('html,body').animate({
				scrollTop: $(".pow_scroll").offset().top
			}, 'slow');
		} else {alert("Wgraj obraz, aby zobaczyć podgląd")}
	}
	if (	$(".lokalizacja_banneru:checked").val() == 'gmina'	   ) {
		if (img_reklamy_pionowy !== '') {
			$(".gmi-banner").html('<img class="banner_for_gmi" src="'+url+'">')
			$('html,body').animate({
				scrollTop: $(".gmi_scroll").offset().top
			}, 'slow');
		} else {alert("Wgraj obraz, aby zobaczyć podgląd")}
	}
	
}


function banner_paynow() {
	
	/* Sprawdzanie uzupełnienia pól */
	var ogolna = [];
	var flagi = [];
	var cala_lista = [];
	var powtorzenia = [];
	var is_lokalizacja_checked = $(".lokalizacja_banneru:checked").length
	var which_lokalizacja = $(".lokalizacja_banneru:checked").val()
	
	var url_reklamy_pionowy = $(".banner_pionowy")
	var url_reklamy_poziomy = $(".banner_poziomy")
	var img_reklamy_pionowy = $(".podglad_pion").attr("url")
	var img_reklamy_poziomy = $(".podglad_poziom").attr("url")
	
	var kategoria = $(".select_banner_category option:selected").attr("f")
	var faktura = $(".rodzaj_faktury:checked").val()
	var email = $(".email_input_for_faktura")
	
	if (which_lokalizacja == 'polska') {
		
		if (url_reklamy_poziomy.val().includes("http") && url_reklamy_poziomy.val().length > 12 ) {} else {
			ogolna.push("- Podaj poprawny link do przekierowania.\n")
			url_reklamy_poziomy.css("background","pink")
		}
		
		if (img_reklamy_poziomy == '') {
			ogolna.push("- Wgraj obraz dla banneru.\n")
		}
		
		var url = url_reklamy_poziomy.val()
		var img = img_reklamy_poziomy
		
	}
	
	if (which_lokalizacja == 'wojewodztwo') {
		$(".select_wojewodztwa_sr").each(function(k,v) {
			
			/* Czy są nie wypełnione ?*/
			if ($(v).val() == '') {
				flagi.push(		$(v)	)
			}
			
			/* Czy są powtórzenia ?*/
			if ($(v).val() !== '') {
				cala_lista.push(	$(v).val()	)
			}
			
		})
		
		if (url_reklamy_pionowy.val().includes("http") && url_reklamy_pionowy.val().length > 12 ) {} else {
			ogolna.push("- Podaj poprawny link do przekierowania.\n")
			url_reklamy_pionowy.css("background","pink")
		}
		
		if (img_reklamy_pionowy == '') {
			ogolna.push("- Wgraj obraz dla banneru.\n")
		}
		
		var url = url_reklamy_pionowy.val()
		var img = img_reklamy_pionowy
		
	}
	
	if (which_lokalizacja == 'powiat') {
		$(".select_powiaty_sr").each(function(k,v) {
			
			/* Czy są nie wypełnione ?*/
			if ($(v).val() == '') {
				flagi.push(		$(v)	)
			}
			
			/* Czy są powtórzenia ?*/
			if ($(v).val() !== '') {
				cala_lista.push(	$(v).val()	)
			}
			
		})
		
		if (url_reklamy_pionowy.val().includes("http") && url_reklamy_pionowy.val().length > 12 ) {} else {
			ogolna.push("- Podaj poprawny link do przekierowania.\n")
			url_reklamy_pionowy.css("background","pink")
		}
		
		if (img_reklamy_pionowy == '') {
			ogolna.push("- Wgraj obraz dla banneru.\n")
		}
		
		var url = url_reklamy_pionowy.val()
		var img = img_reklamy_pionowy
		
	}
	
	if (which_lokalizacja == 'gmina') {
		$(".select_miasta_gminy_sr").each(function(k,v) {
			
			/* Czy są nie wypełnione ?*/
			if ($(v).val() == '') {
				flagi.push(		$(v)	)
			}
			
			/* Czy są powtórzenia ?*/
			if ($(v).val() !== '') {
				cala_lista.push(	$(v).val()	)
			}
			
		})
		
		if (url_reklamy_pionowy.val().includes("http") && url_reklamy_pionowy.val().length > 12 ) {} else {
			ogolna.push("- Podaj poprawny link do przekierowania.\n")
			url_reklamy_pionowy.css("background","pink")
		}
		
		if (img_reklamy_pionowy == '') {
			ogolna.push("- Wgraj obraz dla banneru.\n")
		}
		
		var url = url_reklamy_pionowy.val()
		var img = img_reklamy_pionowy
		
	}
	
	var cala_lista_sorted = cala_lista.sort(); 
	var powtorzenia = [];
	for (var i = 0; i < cala_lista_sorted.length - 1; i++) {
		if (cala_lista_sorted[i + 1] == cala_lista_sorted[i]) {
			powtorzenia.push("⏺"+cala_lista_sorted[i]+"\n");
		}
	}
	
	if (is_lokalizacja_checked == 0) {
		ogolna.push("- Wybierz lokalizację reklamy.\n")
	}
	
	if (flagi.length > 0) {
		$.each(flagi, function(k,v) {
			$(v).css('background','pink')
		})
		ogolna.push("- Nie uzupełniłeś "+flagi.length+" regionów wyświetlania reklamy.\n")
	}
	
	if (powtorzenia.length > 0) {		
		ogolna.push("- Wybrane regiony się powtarzają:\n "+powtorzenia+"\n zmień region na inny.\n")
	} 
	
	if (kategoria == 'brak') {
		ogolna.push("- Wybierz kategorię, w której reklama będzie się wyświetlać.\n")
		$(".select_banner_category option:selected").css("background","pink")
	}
	
	if (faktura == 'efaktura') {
		if (email.val().includes("@") && email.val().length > 7) {} else {
			ogolna.push("- Podaj poprawny adres email.\n")
			email.css("background","pink")
		}
	}
	
	var save_regions = {}
	$(".sr").each(function(k,v) {
		var woj = $(v).find(".select_wojewodztwa_sr option:selected").attr("kod")
		var pow = $(v).find(".select_powiaty_sr option:selected").attr("kod")
		var gmi = $(v).find(".select_miasta_gminy_sr option:selected").attr("kod")
		var rodz = $(v).find(".select_miasta_gminy_sr option:selected").attr("rodz")
		
		if (pow == undefined) {pow = ''}
		if (gmi == undefined) {gmi = ''}
		if (rodz == undefined) {rodz = ''}
		
		var key = woj+pow+gmi+rodz
		save_regions[key] = '1'

	})
	
	if (ogolna.length == 0) {
		
		jQuery.ajax({
			type : "POST",
			url : index+'/functions/banners/save_campaign_data.php',
			data : {
				type: which_lokalizacja,
				regions:save_regions,
				cat:kategoria,
				img:img,
				url:url,
				email:email.val(),
				p:calculate_price()
			},
			success: function(r) {
				
				console.log(r)
				var transfer_data = JSON.parse(r)
				console.log(transfer_data)
				$.when(		user_banner_paynow_save_transfer_data(transfer_data)	 ).done(function() {
					location.href = transfer_data['redirectUrl']
				});	

			return false;					   
			}
		})	
		
	} else {
		alert(ogolna.join(" "))
	}
	
}

function user_banner_paynow_save_transfer_data(transfer_data) {
	
	var deferred = $.Deferred();
	
	jQuery.ajax({
		type : "POST",
		url : index+"/functions/banners/save_banner_transfer_data.php",
		data : {
			transfer_data:transfer_data
		},
		success: function(r) {
		
			console.log(r)
			deferred.resolve();

		return false;					   
		}
	})	
	
	return deferred.promise();
	
}