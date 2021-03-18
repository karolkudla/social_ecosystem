$( document ).ready(function() {
			
	$('body').on('click','.user_profile_phone_click', function() {		
		$('.user_profile_phone').css('display','flex')
		/* get_phone_or_email('tel') */
	})	
	
	$('body').on('click','.user_profile_email_click', function() {		
		$('.user_profile_email').css('display','flex')
		/* get_phone_or_email('email') */
	})	
	
	$('body').on('click','.hide_user_data', function() {		
		$('.user_profile_email').hide()
		$('.user_profile_phone').hide()
	})	
	
	$('body').on('click','.search_simple_offers', function() {
		search_simple_offers()
	})
	
	$('body').on('click', '.woj_search', function() {
		var woj = $('.woj_search').attr("woj")
		var localisation = {'WOJ':woj,'POW':'','GMI':'','RODZ':''}

		$('.select_wojewodztwa option[kod='+woj+']').prop('selected',true)
		create_localisation(localisation)
		wait_for_my_territory(localisation)
	})
	
	$('body').on('click', '.pow_search', function() {
		var woj = $('.woj_search').attr("woj")
		var pow = $('.pow_search').attr("pow")
		var localisation = {'WOJ':woj,'POW':pow,'GMI':'','RODZ':''}
	
		$('.select_wojewodztwa option[kod='+woj+']').prop('selected',true)
		create_localisation(localisation)
		wait_for_my_territory(localisation)

	})
	
	$('body').on('click', '.gmi_search', function() {
		var woj = $('.woj_search').attr("woj")
		var pow = $('.pow_search').attr("pow")
		var gmi = $('.gmi_search').attr("gmi")
		var rodz = $('.gmi_search').attr("rodz")
		var localisation = {'WOJ':woj,'POW':pow,'GMI':gmi,'RODZ':rodz}

		$('.select_wojewodztwa option[kod='+woj+']').prop('selected',true)
		create_localisation(localisation)
		wait_for_my_territory(localisation)
		
	})
	
	$('body').on('click','.erase_pomoc_filters', function(e) {
		$(".imp_type").prop("checked",false)
		/* Wyczyść wszystko */
	})
	
	/********************************** Mobi ************************************/
	
	/* Zamykaj mobile menu */
	$('body').on('click', '.top_user_menu--item', function(e) {
		$(".top_user_menu").fadeOut();
	})
	
	$('body').on('click', '.simple_offers_bottom_menu--btn', function(e) {
		$(".simple_offers_bottom_menu--card").hide();
		$(".simple_offers_bottom_menu--opened").show()
		$(".top_user_menu").fadeOut();
	})
	
	$('body').on('click', '.simple_offers_bottom_menu--btn_search', function(e) {
		$(".simple_offers_bottom_menu--opened_search").show()
		e.stopPropagation();
	})
	
	$('body').on('click', '.simple_offers_bottom_menu--btn_region', function(e) {
		$(".simple_offers_bottom_menu--opened_region").show()
		e.stopPropagation();
	})
	
	$('body').on('click', '.simple_offers_bottom_menu--btn_cats', function(e) {
		$(".simple_offers_bottom_menu--opened_cats").show()
		$(".bottom_main_categories").show()
		$(".mobile_choose_cat_button").hide()
		e.stopPropagation();
	})
	
	$('body').on('click', '.close_mobile_menu_card', function(e) {
		$(".simple_offers_bottom_menu--card").hide();
		e.stopPropagation();
	})
	
	$('body').click(function() {
		$(".simple_offers_bottom_menu--card").hide();
		$(".mobile_choose_cat_button").hide()
	});
	
	$('body').on('click','.simple_offers_bottom_menu--card div', function(e) {
		e.stopPropagation();
	})
	
	$('body').on('click','.hide_bottom_menu', function(e) {
		$(".simple_offers_bottom_menu--card").hide();
	})
	
	$('body').on('click','.bottom_menu_item', function(e) {
		$(".bottom_main_categories").hide();
		$(".mobile_choose_cat_button").css("display","flex")
	})
	
	/* Po kliknięciu na kategorię daje napis do przycisku */
	$('body').on('click','.menu_item--item, .bottom_menu_item', function(e) {
		var cat_name = $(this).text()
		$(".mobile_choose_cat_name").html("&nbsp - "+cat_name)
	})
	
	$('body').on('click','.mobile_choose_cat_button', function(e) {
		$(".simple_offers_bottom_menu--card").hide();
	})
	
	$('body').on('click','.sliding_menu--item', function(e) {
		$(".sliding_menu--item").css("border-top","3px solid white")
		$(this).css("border-top","3px solid rgb(109, 35, 251)")
	})

	/* Pomocne filtry Mobil */
	$('body').on('click','.pf_mobil', function(e) {
		
		$('html,body').animate({
			scrollTop: $(".main_mobi_menu").offset().top
		}, 'slow');	
		
		setTimeout(function() {
			search_simple_offers()
		},100)	
		
	})	
	
	/* Pomocne filtry Desktop */
	$('body').on('click','.pf_desktop', function(e) {	
		setTimeout(function() {
			search_simple_offers()
		},100)		
	})	
	
	/* Banner i wyświetlanie filtrów Desktop */
	$('body').on('click','.helper_filters_click', function(e) {
		var filter = $(this).attr("filter")
		$(".helper_filters").load(index+"/functions/ogloszenia/pomoc/"+filter+".php")		
		$(".helper_filters_click").css("border-top","4px solid white")
		$(this).css("border-top","4px solid rgb(24, 119, 242")
		
		if (filter == 'covid') {
			$('.pl-banner').html('<div style="position: absolute; height: 100%; width: 30%; padding-left: 70px;"><div class="flex-middle fs-30 h-100">Wspieramy walkę z COVID-19</div></div><img class="bckg_test" src="https://vg.wokulski.online/static/img/pomoc/wspieramy_clean.jpg">')
			$('.sub_top--slogan').html('Wspieramy walkę z COVID-19')
		}
		
		if (filter == 'firmy') {
			$('.pl-banner').html('<div style="position: absolute; height: 100%; width: 25%; padding-left: 70px; color: white;"><div class="flex-middle fs-30 h-100">Wspieramy Polskie Firmy</div></div><img class="bckg_test" src="https://vg.wokulski.online/static/img/pomoc/wpf.jpg">')
			$('.sub_top--slogan').html('Wspieramy Polskie Firmy')
		}
		
		if (filter == 'codziennosc') {
			$('.pl-banner').html('<img class="bckg_test" src="'+index+'/static/img/pomoc/codziennosc.jpeg">')
			$('.sub_top--slogan').html('Wspieramy Codzienność')
		}
		
		if (filter == '500b') {
			$('.pl-banner').html('<img class="bckg_test" src="'+index+'/static/img/pomoc/500nos.jpg">')
			$('.sub_top--slogan').html('500 bezpłatnych ogłoszeń')
		}
		
	})

	/* Oznaczaj że kategoria / filtr kliknięty - Desktop */
	$('body').on('click','.desktop_cat', function(e) {
		$('.desktop_cat').css({'border-bottom': '4px solid white','box-shadow': 'none'})
		$(this).css({'border-bottom': '4px solid #1877f2','box-shadow': '0 2px 4px 0 rgba(38,38,38,.08)'})
	})

	/* Banner i menu pomocne filtry Mobil */
	$('body').on('click','.banner_covid', function(e) {
		$('.pl-banner').html('<div style="position: absolute; height: 100%; width: 35%; padding-left: 30px; font-size: 20px;"><div class="flex-middle h-100">Wspieramy walkę z COVID-19</div></div><img class="bckg_test" src="https://vg.wokulski.online/static/img/pomoc/wspieramy_clean.jpg">')
		$('.sliding_menu').hide()
		$('.covid_mobi_menu').css("display","flex")
		$('.sub_top--slogan').html('Wspieramy walkę z COVID-19')
	})
	
	$('body').on('click','.banner_firmy', function(e) {
		$('.pl-banner').html('<div style="position: absolute; height: 100%; width: 30%; padding-left: 30px; color: white; font-size: 20px;"><div class="flex-middle h-100">Wspieramy Polskie Firmy</div></div><img class="bckg_test" src="https://vg.wokulski.online/static/img/pomoc/wpf.jpg">')
		$('.sliding_menu').hide()
		$('.firmy_mobi_menu').css("display","flex")
		$('.sub_top--slogan').html('Wspieramy Polskie Firmy')
	})
	
	$('body').on('click','.banner_codziennosc', function(e) {
		$('.pl-banner').html('<img class="bckg_test" src="https://vg.wokulski.online/img/pomoc/codziennosc.jpg">')
		$('.sliding_menu').hide()
		$('.codziennosc_mobi_menu').css("display","flex")
		$('.sub_top--slogan').html('Wspieramy Codzienność')
	})

	$('body').on('click','.banner_500', function(e) {
		$('.pl-banner').html('<img class="bckg_test" src="https://vg.wokulski.online/img/pomoc/500n.jpg">')
		$('.sliding_menu').hide()
		$('.standard_mobi_menu').css("display","flex")
		$('.sub_top--slogan').html('500 bezpłatnych ogłoszeń')
	})


})

/* Lazy loading 
function lazy_load_offers() {
	
	if (	($('.this_is_the_end').length == 0)  &&  ($('.tad_wrap_list').length > 0)   	) {
		
		$(window).on("scroll", function() {
			var scrollHeight = $(document).height();
			var scrollPosition = $(window).height() + $(window).scrollTop();
			if (scrollPosition > (scrollHeight - 200)) {
				
					search_simple_offers('skip');
					$(window).unbind()
						
					setTimeout(function() {
						lazy_load_offers()
						console.log("Set Timeout")
					},1000)	

			}
		});
	
	} else {console.log("Już nie włączam LL")}
	
}
*/

function wait_for_my_territory(loc) {
	
	setTimeout(function() {
		
		if (loc['WOJ'] !== '') {
			var woj_len = $('.select_wojewodztwa option[kod='+loc['WOJ']+']:selected').length
			
			if (woj_len == 1) {
				search_simple_offers()
			} else {
				wait_for_my_territory(loc)
			
			}
		}
		
		if (loc['POW'] !== '') {
			var woj_len = $('.select_wojewodztwa option[kod='+loc['WOJ']+']:selected').length
			var pow_len = $('.select_powiaty option[kod='+loc['POW']+']:selected').length 
			
			if (pow_len == 1 && woj_len == 1) {
				search_simple_offers()
			} else {
				wait_for_my_territory(loc)
			
			}
		}
		
		if (loc['GMI'] !== '') {
			var woj_len = $('.select_wojewodztwa option[kod='+loc['WOJ']+']:selected').length
			var pow_len = $('.select_powiaty option[kod='+loc['POW']+']:selected').length 
			var gmi_len = $('.select_miasta_gminy option[kod='+loc['GMI']+']:selected').length 
			
			if (gmi_len == 1 && pow_len == 1 && woj_len == 1) {
				search_simple_offers()
			} else {
				wait_for_my_territory(loc)
				
			}
		}
		
	},100)
	
}

/* przy przewijaniu sprawdzaj wyszukiwarkę i filtry */

function search_simple_offers(skip) {
	
	if (skip !== undefined) {
		var to_skip = $('.tad_wrap_list').length
	}
	
	var cat = $('.cat_phrase').attr('cat_phrase')
	var cat_deep = $('.cat_phrase').attr('cat_deep')
	
	var phrase = 		$('.search_phrase').val();
	var price_from = 	$('.price_from').val();
	var price_to = 		$('.price_to').val();

	var woj = $('.select_wojewodztwa option:selected').attr("kod")
	var pow = $('.select_powiaty option:selected').attr("kod")
	var gmi = $('.select_miasta_gminy option:selected').attr("kod")
	var rodz = $('.select_miasta_gminy option:selected').attr("rodz")
	
	if (phrase.length > 2) {var fraza = $('.search_phrase').val()} else {var fraza = '';}
	
	jQuery.ajax({
			type : "POST",
			url : index+"/functions/ogloszenia/search.php",
			data : {
				phrase:fraza,
				price_from:price_from,
				price_to:price_to,
				woj:woj,
				pow:pow,
				gmi:gmi,
				rodz:rodz,
				cat:cat,
				cat_deep:cat_deep,
				pomoc:$(".imp_type:checked").val(),
				skip:to_skip
			},
			success: function(results) {
				
			if (skip !== undefined) {
				$('.result_list').append(results)
			} else {
				$('.result_list').html(results)
			}

			/* tam gdzie nie ma brazzers carouseli */
			$(".brazzers").not(".brazzers-daddy").brazzersCarousel();
				
			return false;					   
			}
		})

}

/*
function get_phone_or_email(param) {
	
	var pid = $(".user_profile_shoper_banner--links").attr("product_id")
	
	jQuery.ajax({
		type : "POST",
		url : index+"/functions/ogloszenia/get_phone_or_email.php",
		data : {
			param:param,
			pid:pid
		},
		success: function(results) {
			
			

		return false;					   
		}
	})
	
}
*/


function get_categories(e) {
			
			$('.select_wojewodztwa option[value="0"]').prop("selected",true)
			$('.select_powiaty').html('<option kod="" rodz="">Miasto / Powiat</option>')
			$('.select_miasta_gminy').html('<option kod="" rodz="">Miejscowość / Gmina</option>')
			
			var f = $(e).attr('f');
			var d = $(e).attr('d');
			var k = $(e).attr('k');

			if (k !== undefined && k !== 'back') {
				if ($('.cat').last().text() !== k) {
					$('.categories_string').append('<div class="flex cat_hide"><div class="sep">&nbsp/</div><div class="cat">'+k+'</div></div>');
				}
			} 

			if (k == 'back') {
				$('.categories_string .flex').last().remove()
			}
			
			var keys = [];
			$('.cat').each(function(k,v) {
				keys.push($(v).text())
			})

			jQuery.ajax({
			type : "POST",
			url : index+"/functions/ogloszenia/choose_cat.php",
			data : {
				f:f,
				d:d,
				k:keys
					},
			success: function(r) {
							
				var json = JSON.parse(r);		
			
				var cats = json[0];
				var set = json[1];
				var deep = parseInt(set[1])+1;
				var back = parseInt(set[1])-1;
				var file = set[0];

				if (cats !== '' && cats.length > 0) {
					
					$('.categories_list').html('')
					$('.cat_hide').css('display','flex')

					$.each(cats, function(k,v) {
						$(".categories_list").append('<div class="menu_item--item" f="'+file+'" d="'+deep+'" k="'+v+'">'+v+'</div>');
					})
					
					if (d>0) {
						$('.menu_back_wrapper').html('<span class="icon-arrow-left2 menu_back" f="'+file+'" d="'+back+'" k="back"></span>');
					} else {
						$('.menu_back_wrapper').html('')
					}
					
					if (screen_size() == 'd') {
					
						var c = $('.menu_item--item').length;
						if (c < 10 ) {$('.categories_list').css('column-count','4')} 
						if (c > 10 ) {$('.categories_list').css('column-count','3')} 
						if (c > 20 ) {$('.categories_list').css('column-count','4')} 
						if (c > 30 ) {$('.categories_list').css('column-count','5')} 
						if (c > 40 ) {$('.categories_list').css('column-count','6')} 
						if (c > 50 ) {$('.categories_list').css('column-count','7')} 
					
					}
					
					$(".categories_list").css({'padding':'10px 20px'})
					
				} else {
				
					$('.categories_string .flex').last().remove()
					
				}
				
				if (d == 0 && cats == '') {
					$('.categories_list').html('')
					$(".categories_list").css({'padding':'0px'})
				}
								
				return false;					   
			}
			})
		}

function get_simple_products(e) {
		
	if (e.text() !== '') {
		var f = e.text()
	} else {
		var f = $(".cat_0").text()
	}
	
		var d = e.attr('d');
		var img = e.attr('f')
		var ot = e.attr('ot')

		$('.in_categories').html('Szukaj w kategorii <span class="cat_phrase" cat_deep="'+d+'" cat_phrase="'+f+'">'+f+'</span>')

		jQuery.ajax({
		type : "POST",
		url : index+"/functions/ogloszenia/get_simple_products.php",
		data : {
			d:d,
			f:f,
			ot:ot
		},
		success: function(r) {

			$('.result_list').html(r)

			$(".brazzers").brazzersCarousel();
			
			var i = parseInt(img) + 2;
			
			$('.shop_banner').css({
				'background':'url(http://vg.wokulski.online/img/shop/'+i+'.jpeg)',
				'background-size': 'cover',
				'background-position': 'center',
				'background-repeat': 'no-repeat'
			})

			
	return false;					   
	}
	})		
		
}

function get_my_simple_products() {
	
	jQuery.ajax({
		type : "POST",
		url : index+"/functions/ogloszenia/get_my_simple_products.php",
		success: function(r) {
		
			$(".center_panel").html(r)
			$(".brazzers").brazzersCarousel();
			
			var login = $('.my_simple_offers').attr('me');
			$.when(		 permission(3,'',login)		).done(function(v) {
				if (v['status'] == 'ok') {
					$('.search_result--product_links').append('<div class="edit_simple_offer vg_circle"><img src="'+index+'/static/img/shoper_product/edit.svg"></div>')
					$('.search_result--product_links').append('<div class="shoper_del_prod vg_circle"><img src="'+index+'/static/img/shoper_product/delete.svg"></div>')
				}
			})
			
			return false;					   
	}
	})		
	
}

function show_one_offer(offer_id) {

	jQuery.ajax({
		type : "POST",
		url : index+"/functions/ogloszenia/one_offer.php",
		data : {
			offer_id:offer_id
		},
		success: function(r) {
	
			$('.center_panel').html(r)
			
			$(".shoper_product_gallery").not('.slick-initialized').slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
			});
			
			/* Pokaż linki do edycji produktów */
			
			/* Historia */
			var stan = {
				offer_id:offer_id,
				action: "open_simple_offer"
			};
			
			if (history.state) {
				var haction = history.state.action;	
				var hoffer_id = history.state.offer_id;
			}

			if ((haction != stan.action) || (hoffer_id != stan.offer_id)) {	
				history.pushState(stan, "", "/ogloszenie/"+offer_id);
			}		
			/* Koniec Historii */

			return false;					   
	}
	})		
	
}

$( document ).ready(function() {

	/* Zjeżdżaj na dół na tel */
	$('body').on('click','.standard_mobi_menu .menu_item_cat_simple', function() {
		$('html,body').animate({
			scrollTop: $(".main_mobi_menu").offset().top
		}, 'slow');	
	})

	$('body').on('click','.menu_item_cat_simple', function() {
				
		var fcat = $(this).text();
		var e = $(this)
	
		$('.fcat').html('<div class="flex cat_hide"><div class="cat_0">'+fcat+'</div></div>')
		$('.categories_string').html('');
			
		get_categories(e);
		get_simple_products(e);
		get_banners(e);

	})
		
	$('body').on('click', '.menu_back', function() {
		var e = $(this)
		get_categories(e);	
		get_simple_products(e)

	})
		
	$('body').on('click', '.menu_item--item', function() {
		
		var e = $(this)		
		get_categories(e);
		get_simple_products(e);
		
		$(".menu_item--item").css({'color':'black','font-weight':'300'})
		$(this).css({'color': '#1877f2','font-weight':'600'})
		
	})

	$('body').on('click','.my_offers', function() {	
	
		if (	$('.main_display').attr('service') == 'simple_offers'	) {
			get_my_simple_products()
		} else {
			var module_to_open = ['my_offers']		
			open_simple_offers(module_to_open)
		}	
	
	})	
		
	$("body").on('click', ".product_on_list_simple", function() {

		var offer_id = $(this).closest(".result_main_list").attr('id')
		
		$('html,body').animate({
			scrollTop: $(".top").offset().top
		}, 'slow');		
		
		if (	$('.main_display').attr('service') == 'simple_offers'	) {
			show_one_offer(offer_id)
		} else {
			var module_to_open = ['open_offer',offer_id]
			open_simple_offers(module_to_open)
		}	
		
	})

})

window.addEventListener('popstate', function(event) {
		
	if (event.state !== null) {
	
		/* Historia produkt */
		var action = event.state["action"];		
		if (action == "open_simple_offer") {	
			
			var offer_id = event.state["offer_id"];
			var module_to_open = ['open_offer',offer_id]		
			open_simple_offers(module_to_open)
			
		}
	}
	
})

/* Odtwarzanie z linków */

var path = window.location.href;
var split = path.split('/');

/* Oferta */
	
	if(path.indexOf("/ogloszenie/") !== -1) {
		
		$( document ).ready(function() {
			
			var module_to_open = ['open_offer',split[4]]		
			open_simple_offers(module_to_open)
			
		})
		
	}	