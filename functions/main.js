/*
if ("serviceWorker" in navigator) {
  window.addEventListener("load", function() {
    navigator.serviceWorker
      .register(index+"/serviceWorker.js")
      .then(res => console.log("Service worker registered"))
      .catch(err => console.log("Service worker not registered", err))
  })
}
*/

/* Touch Swipe */
document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);

var xDown = null;                                                        
var yDown = null;

function getTouches(evt) {
  return evt.touches ||             // browser API
         evt.originalEvent.touches; // jQuery
}                                                     

function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];                                      
    xDown = firstTouch.clientX;                                      
    yDown = firstTouch.clientY;                                      
};                                                

function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }

    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;

    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
           console.log("Left Swipe")
		   /* Sprawdza numer karty */
		   /* Odejmuje 1 */
        } else {
           console.log("Right Swipe")
		   /* Sprawdza numer karty */
		   /* Dodaje 1 w zakresie */
        }                       
    } else {
        if ( yDiff > 0 ) {
           console.log("Up Swipe")
        } else { 
           console.log("Down Swipe")
        }                                                                 
    }
    /* reset values */
    xDown = null;
    yDown = null;                                             
};

/* Zwraca mobil albo desktop */
function screen_size() {
	var width = $(window).width(); 

	if (width <= 768) {
		return 'm';
	}
	else {
		return 'd';
	}
}

/* Otwiera podstronę Home (Ikonka Home) i dodaje wpis do historii */
function open_index () {
	
	$('#ajax').load(index+'/functions/indexes/main.php', function() {
		
		var stan = {
			action: "index"
		};
	
		if (history.state) {
			var haction = history.state.action;	
		}
		
		if (haction != stan.action) {	
			history.pushState(stan, "", "/home");
		}	

	})

}

/* Otwiera Ogłoszenia (kolumna lewa i prawa bez środka) i potem moduł, który ma być w nich zawarty */
/* module_to_open = ['co otworzyc','parametr np. offer id'] */
function open_simple_offers(module_to_open) {
	
	$('#ajax').load(index+'/functions/indexes/simple_offers.php', function() {
		$(".loading_main").hide()	
		
		/* Strona główna Ogłoszeń */
		if (module_to_open[0] == 'open_index') {
			open_simple_offers_index()
		}
		
		/* Pojedyncza oferta */
		if (module_to_open[0] == 'open_offer') {
			show_one_offer(module_to_open[1])
		}
		
		/* Moje oferty */
		if (module_to_open[0] == 'my_offers') {
			get_my_simple_products()
		}
		
		/* Banner na firmy */
		if (module_to_open[0] == 'firmy') {
			open_simple_offers_index('firmy')
		}
		
		/* Banner na codzienność */
		if (module_to_open[0] == 'codziennosc') {
			open_simple_offers_index('codziennosc')
		}
		
		/* moduł dodawania reklam ??? */
		
	})
	
}

/* Otwiera stronę główną Ogłoszeń (wnętrze) i dodaje do historii  */
function open_simple_offers_index(menu_slider) {
	
	if (screen_size() == 'd') {
	
		$('.center_panel').load(index+'/functions/ogloszenia/simple_offers_index.php', function() {
			$(".loading_main").hide()
			$(".brazzers").brazzersCarousel();
		
		})
	
	} else {
		
		$('.center_panel').load(index+'/functions/ogloszenia/m_simple_offers_index.php', function() {
			$(".loading_main").hide()
			$(".brazzers").brazzersCarousel();
				
			if (menu_slider == 'firmy') {
				
				/* Ustawia baner po kliknięciu na link /firmy */
				$('.pl-banner').html('<div style="position: absolute; height: 100%; width: 35%; padding-left: 30px; color: white;"><div class="flex-middle h-100">Wspieramy Polskie Firmy</div></div><img class="bckg_test" src="https://vg.wokulski.online/static/img/pomoc/wpf.jpg">')
				$('.sub_top--slogan').html('Wspieramy Polskie Firmy')
			}
			
			if (menu_slider == 'codziennosc') {
				
				/* Ustawia baner po kliknięciu na link /codziennosc */
				$('.pl-banner').html('<img class="bckg_test" src="https://vg.wokulski.online/img/pomoc/codziennosc.jpg">')
				$('.sub_top--slogan').html('Wspieramy Codzienność')
				
			}
			
		})
		
	}
		
	/* Historia */
		var stan = {
			action: "simple_offers"
		};
		
		if (history.state) {
			var haction = history.state.action;	
		}

		if (haction != stan.action) {	
			history.pushState(stan, "", "/ogloszenia");
		}		
		/* Koniec Historii */
	
}

/* Otwiera Portal Społecznościowy */
function open_social(g) {

	if (screen_size() == 'd') {

		$('#ajax').load(index+'/functions/indexes/social.php', function() {
			
				select_group('0','0',g); /* Nie rób lazy loading, Nie pomijaj postów, Która grupa */
				lazy_loading_social()
			
				$('.post_add').autoResize();
				
				var avatar = $(".top_avatar img").attr("src");
				var user_name = $(".fb_name").text();
				
				$(".add_post_user_logo").html("<img src='"+avatar+"'>")
				
				$(".post_add").attr("placeholder","Co słychać, "+user_name.charAt(0).toUpperCase() + user_name.slice(1)+" ?")
				$(".send").attr("w",g)
			
		})
	
	} else {
		
		$('#ajax').load(index+'/functions/social/m_social.php', function() {
			
				select_group('0','0',g); /* Nie rób lazy loading, Nie pomijaj postów, Która grupa */
				lazy_loading_social()
			
				$('.post_add').autoResize();
				
				var avatar = $(".top_avatar img").attr("src");
				var user_name = $(".fb_name").text();
				
				$(".add_post_user_logo").html("<img src='"+avatar+"'>")
				
				$(".post_add").attr("placeholder","Co słychać, "+user_name.charAt(0).toUpperCase() + user_name.slice(1)+" ?")
				$(".send").attr("w",g)
			
		})
		
	}
	
}

/* Otwiera sklepy */
function open_marketplace() {
	
	/* Wersja PC lub wersja Mobile */
	
	$('#ajax').load(index+'/functions/indexes/shop.php', function() {
		
		$(".brazzers").brazzersCarousel();
		
		var stan = {
			action: "marketplace"
		};
	
		if (history.state) {
			var haction = history.state.action;	
		}

		if (haction != stan.action) {	
			history.pushState(stan, "", "/sklepy");
		}		
	})
	
}


$( document ).ready(function() {

	/* Zamyka modale */
	$("body").on('click', "#close", function() {
		$("#modal_overlay").hide();
	})

	$('body').on('click','.hover_to_read_about_media, .hover_to_read_about_shop, .hover_to_read_about_simple_offers, .hover_to_read_about_social', function(e) {
		var t = $(this).find(".more_info_about")
		console.log(t)
		$('.more_info_about').not(t).fadeOut()
	})

	$('body').on('mouseenter','.hover_to_read_about_social', function(e) {
		if (	$('.more_info_about_social').css('display') == 'none'	) {
		
			/* desktop przesuń mobil tylko pokaż */
		
			if (screen_size() == 'd') { 
		
				$('.more_info_about_social').fadeIn().animate({left: '-100%'});
				function wait() {setTimeout(function() {
						if (	$('.more_info_about_social:hover').length != 0	 ||   $('.hover_to_read_about_social:hover').length != 0		) {
							wait()
						} else {
							$('.more_info_about_social').animate({left: '0%'}).fadeOut()
						}
					},1000)
				}
				wait()
			
			} else {
				
				$('.more_info_about_social').fadeIn()
				
			}
			
		}
	})

	$('body').on('mouseenter','.hover_to_read_about_media', function(e) {
		if (	$('.more_info_about_media').css('display') == 'none'	) {
		
			/* desktop przesuń mobil tylko pokaż */
		
			if (screen_size() == 'd') { 
		
				$('.more_info_about_media').fadeIn().animate({left: '100%'});
				function wait() {setTimeout(function() {
						if (	$('.more_info_about_media:hover').length != 0	 ||   $('.hover_to_read_about_media:hover').length != 0		) {
							wait()
						} else {
							$('.more_info_about_media').animate({left: '0%'}).fadeOut()
						}
					},1000)
				}
				wait()
				
			} else {
				
				$('.more_info_about_media').fadeIn()
				
			}
		}
	})
	
	$('body').on('mouseenter','.hover_to_read_about_simple_offers', function(e) {
		if (	$('.more_info_about_simple_offers').css('display') == 'none'	) {
		
			/* desktop przesuń mobil tylko pokaż */
		
			if (screen_size() == 'd') { 
		
			$('.more_info_about_simple_offers').fadeIn().animate({left: '100%'});
			function wait() {setTimeout(function() {
					if (	$('.more_info_about_simple_offers:hover').length != 0	 ||   $('.hover_to_read_about_simple_offers:hover').length != 0		) {
						wait()
					} else {
						$('.more_info_about_simple_offers').animate({left: '0%'}).fadeOut()
					}
				},1000)
			}
			wait()
			
			} else {
				
				$('.more_info_about_simple_offers').fadeIn()
				
			}
		}
	})

	$('body').on('mouseenter','.hover_to_read_about_shop', function(e) {
		if (	$('.more_info_about_shop').css('display') == 'none'	) {
		
				/* desktop przesuń mobil tylko pokaż */
			
				if (screen_size() == 'd') { 
			
				$('.more_info_about_shop').fadeIn().animate({left: '-100%'});
				function wait() {setTimeout(function() {
						if (	$('.more_info_about_shop:hover').length != 0	 ||   $('.hover_to_read_about_shop:hover').length != 0		) {
							wait()
						} else {
							$('.more_info_about_shop').animate({left: '0%'}).fadeOut()
						}
					},1000)
				}
				wait()
			
			} else {
				
				$('.more_info_about_shop').fadeIn()
				
			}
		}
	})


	/* Główne serwisy Click */
	$('.main_page').click(function() {
		open_index()	
	})

	$('.portal_simple_offers').click(function() {
		open_simple_offers(['open_index'])	
	})
	
	$('.portal_social').click(function() {
		open_social("")
	})
	
	$('.portal_marketplace').click(function() {
		open_marketplace();
	})

	/* Testowanie banerów 
	$('body').on('click', '.bckg_ok', function() {
		var bckg_url = $('.bckg').val();
		$('.bckg_test').attr('src',bckg_url)
	})
	*/
	
	/* Odtwarzanie z URLa */
	var path = window.location.href;
	var split = path.split('/');

	if (path.indexOf("/home") !== -1) {
		open_index()
	}	

	if(split[3] == '') {
		open_simple_offers(['open_index'])
	}

	if(split[3].indexOf("?fbclid=") !== -1) {
		open_simple_offers(['open_index'])
	}

	if(path.indexOf("/ogloszenia") !== -1) {
		open_simple_offers(["open_index"])	
	}	

	if(path.indexOf("/firmy") !== -1) {
		open_simple_offers(["firmy"])	
	}	

	if(path.indexOf("/codziennosc") !== -1) {
		open_simple_offers(["codziennosc"])		
	}	
	
	if(path.indexOf("/sklepy") !== -1) {
		open_marketplace()
	}

	/* Odtwarzanie z historii */
	window.addEventListener('popstate', function(event) {
			
		if (event.state !== null) {
		
			var action = event.state["action"];		
			if (action == "index") {	
				open_index();
			}	
			
			if (action == "simple_offers") {	
				open_simple_offers(["open_index"])
			}	
			
			if (action == "marketplace") {	
				open_marketplace();
			}	

		}

	})

})