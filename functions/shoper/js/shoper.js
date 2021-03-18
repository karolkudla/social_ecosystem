$( document ).ready(function() {
	
	/* Menu Mobile ?????????????*/
	$("body").on('click','.shoper_mobile_menu--btn div', function() {
		$('.shoper_mobile_menu').show();
	})

	/* ????????????????????????? */
	$('body').on('click','.shoper_mobile_menu--btn div', function(e) {
		e.stopPropagation();
	})

	/* ???????????????????????????? */
	$('body').click(function() {
		$(".shoper_mobile_menu").hide();
	});

	$("body").on('click', ".shoper_index_link", function() {
		var shoper_id = $('.shoper_ajax').attr('shoper')
		open_shoper_index(shoper_id)	
	})
	
	/* Otwieranie shopera z menu top */
	$("body").on('click', ".my_shop", function() {
		
		$('.top_user_menu').hide();
		var shoper_id = $(this).attr('url')

		$.when(		 open_shoper(shoper_id)		).done(function() {
			 open_shoper_index(shoper_id)
		});	
			
	})
	
	$("body").on('click', ".product_on_list", function() {
		
		console.log("Product on list")
		
		var shoper_id = $(this).parent(".result_main_list").attr('url')
		var product_id = $(this).parent(".result_main_list").attr('id')

		$.when(		 open_shoper(shoper_id)		).done(function() {
			open_shoper_product(product_id)
		});	
			
	})

	$("body").on('click', ".shoper_offers_link", function() {
		
		var shoper_id = $('.shoper_ajax').attr('shoper')		
		var m1 = $(this).attr('m1') /* Menu Główne */
		var m2 = $(this).attr('m2') /* Menu Sub */
		var num = $(this).attr('i') /* Numer Menu */
		var cats = [m1,m2];
		
		open_shoper_category(shoper_id,cats,num)
		
	})
	
	$("body").on('click', ".shoper_posts_link", function() {
		
		var shoper_id = $('.shoper_ajax').attr('shoper')	
		var device = screen_size();
		open_shoper_posts(shoper_id,device)
		
	})
	
	$("body").on('click', ".shoper_contact", function() {
		
		var shoper_id = $('.shoper_ajax').attr('shoper')	
		open_shoper_contact(shoper_id)
		
	})
	
	$("body").on('click', ".shoper_product_specs_link", function() {
		
		/* jeśli specs są już pobrane, to nie pobieraj ich drugi raz */
		if ( 	$('.shoper_product_specs').length == 1	) {
			$('.shoper_product_card').hide();
			$('.shoper_product_specs').show();
		} else {
			var product_id = $('.user_profile_shoper_banner--links').attr('product_id');
			open_shoper_product_specs(product_id)
		}
		
	})
	
	$("body").on('click', ".shoper_product_multimedia_link", function() {
		
		/* jeśli multimedia są już pobrane, to nie pobieraj ich drugi raz */
		if ( 	$('.shoper_product_multimedia').length == 1	) {
			$('.shoper_product_card').hide();
			$('.shoper_product_multimedia').show();
		} else {
			var product_id = $('.user_profile_shoper_banner--links').attr('product_id');
			open_shoper_product_multimedia(product_id)
		}
		
	})
	
	$("body").on('click', ".shoper_product_desc_link", function() {
		
		$('.shoper_product_card').hide();
		$('.shoper_product_description').show();
		
	})

})	

/* Otwiera shopera bez żadnego modułu wewnątrz, tylko stałe elementy */
/* Bez produktu, bez strony powitalnej */

function open_shoper(shoper_id) {
			
	var deferred = $.Deferred();
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/shoper.php",
        data : {
			shoper_id:shoper_id
				},
		success: function(r) {
			
			$('#ajax').html(r)
			deferred.resolve();
			
		}
	})
	
	return deferred.promise();
}

/* Otwiera sam produkt i wrzuca do środkowego modułu */

function open_shoper_product(product_id) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/product.php",
        data : {
			product_id:product_id
				},
		success: function(r) {
			
			$('.shoper_ajax').html(r)
			
			$(".shoper_product_gallery").not('.slick-initialized').slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
			});
			
			/* Pokaż linki do edycji produktów */
			
			/* Historia */
			var stan = {
				product_id:product_id,
				shoper_id:$('.shoper_ajax').attr('shoper'),
				action: "open_shoper_product"
			};
			
			if (history.state) {
				var haction = history.state.action;	
				var hproduct_id = history.state.product_id;
			}

			if ((haction != stan.action) || (hproduct_id != stan.product_id)) {	
				history.pushState(stan, "", "/oferta/"+$('.shoper_ajax').attr('shoper')+"/"+product_id);
			}		
			/* Koniec Historii */
		}
	})
}

/* Otwiera stronę główną shopera */

function open_shoper_index(shoper_id) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/index.php",
        data : {
			shoper_id:shoper_id
				},
		success: function(r) {
			
			$('.shoper_ajax').html(r)
			
			/* Galeria JS */
			$(".shoper_gallery").slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
			});
			
			/* Historia */
			var stan = {
				shoper_id:shoper_id,
				action: "open_shoper_index"
			};
			
			if (history.state) {
				var haction = history.state.action;	
				var hshoper_id = history.state.shoper_id;
			}

			if ((haction != stan.action) || (hshoper_id != stan.shoper_id)) {	
				history.pushState(stan, "", "/sklep/"+shoper_id);
			}		
			/* Koniec Historii */
			
		}
	})
	
}

function open_shoper_category(shoper_id,cats,num) {

	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/product_list.php",
        data : {
			shoper_id:shoper_id,
			cats:cats,
			num:num
				},
		success: function(r) {
			
			$('.shoper_ajax').html(r)
			$(".brazzers").brazzersCarousel();
			
			/* Pokazuj linki do edycji jeśli shoper_id zgadza się z tokenem w bazie */
			$.when(		 permission(1,'',shoper_id)		).done(function(v) {
				if (v['status'] == 'ok') {
					$('.search_result--product_links').append('<div class="shoper_edit_prod vg_circle"><img src="'+index+'/img/shoper_product/edit.svg"></div>')
					$('.search_result--product_links').append('<div class="shoper_add_sibling vg_circle"><img src="'+index+'/img/shoper_product/copy.svg"></div>')
					$('.search_result--product_links').append('<div class="shoper_del_prod vg_circle"><img src="'+index+'/img/shoper_product/delete.svg"></div>')
				
					var after = '\
						<div class="result_main_list">\
							<div style="width: 120px;">\
								<div class="pho_click_list">\
									<div style="height: 120px; display: flex; justify-content: center; align-items: center;">\
									<div class="vg_circle add_new_prod_to_menu"><img src="https://vokulsky.pl/img/shoper_product/offer_add.svg" width="30px"></div>\
								</div>\
							</div>\
						</div>\
						<div class="tad_wrap_list" style="display: flex; align-items: center;">\
							<div>\
								<div class="title_wrap_list add_new_prod_to_menu">\
									Dodaj nową ofertę\
								</div>\
								<div class="shoper_editor_additional_info" style="margin-left: 10px;">\
								</div>\
							</div>\
						</div>\
						</div>\
						'
				
					$('.shoper_product_list_under').after(after)
				
				}
			});	

			
			/* Historia */

		}
	})
	
}

function open_shoper_posts(shoper_id,device) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/posts.php",
        data : {
			shoper_id:shoper_id,
			device:device
				},
		success: function(r) {
			
			$('.shoper_ajax').html(r)
			
			/* Galeria JS */
			$(".kom_gallery_slick").slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
			});

			/* Historia */

		}
	})
	
}

function open_shoper_contact(shoper_id) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/contact.php",
        data : {
			shoper_id:shoper_id
				},
		success: function(r) {
			
			$('.shoper_ajax').html(r)
		
			/* Historia */
		
		}
	})
	
}

function open_shoper_product_specs(product_id) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/product_specs.php",
        data : {
			product_id:product_id
				},
		success: function(r) {
			
			$('.shoper_product_card').hide();
			$('.shoper_product_cards_data').prepend(r)
			
		}
	})
}

function open_shoper_product_multimedia(product_id) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/product_multimedia.php",
        data : {
			product_id:product_id
				},
		success: function(r) {
			
			$('.shoper_product_card').hide();
			$('.shoper_product_cards_data').prepend(r)
			
			/* Galeria JS */
			if ($('.shoper_product_multimedia--youtube_slick iframe').length > 0) {
				$(".shoper_product_multimedia--youtube_slick").slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
				});
				$('.shoper_product_multimedia').append('<div style="height: 35px; width: 100%;">')
			}
		}
	})
	
}

function shoper_lazy_loading_posts() {
	
	
	
}

/* Odtwarzanie historii */

window.addEventListener('popstate', function(event) {
		
	if (event.state !== null) {
	
		/* Historia produkt */
		var action = event.state["action"];		
		if (action == "open_shoper_product") {	
			
			var shoper_id = event.state["shoper_id"];
			var product_id = event.state["product_id"];
			
			$.when(		 open_shoper(shoper_id)		).done(function() {
				open_shoper_product(product_id)
			});	
			
			}	
			
		/* Historia Shoper */
		
		if (action == "open_shoper_index") {	
			var shoper_id = event.state["shoper_id"];
			open_shoper(shoper_id)
		}	
		
	}
	
})

/* Odtwarzanie z linków */

var path = window.location.href;
var split = path.split('/');

/* Shoper */

	if (path.indexOf("/sklep") !== -1) {
		if (split[3] == 'sklep') {
			$.when(		 open_shoper(	split[4]	)		).done(function() {
				open_shoper_index(	split[4]	)
			});	
		}		
	}	

/* Oferta */
	
	if(path.indexOf("/oferta/") !== -1) {
		
		$.when(		 open_shoper(split[4])		).done(function() {
			 open_shoper_product(split[5])
		});	
		
	}	
	
/* Kolejne linki */























































/* Stare 

function product(id,name) {
			
	window.fbAsyncInit = function() {
    FB.init({
      appId            : '803056166759107',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v4.0'
    });
	};	
		
	var stan = {
		id: id,
		name: name,
		action: "product"
	};
	
	if (history.state) {
		var haction = history.state.action;	
		var hname = history.state.name;
	}

	if ((haction != stan.action) || (hname != stan.name)) {	
		history.pushState(stan, "", "/produkt/"+name+"&"+id+"/");
	}		
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/product.php",
        data : {
			id : id
				},
		success: function(r) {
								
				$("#ajax").html(r);
				var url = $('#p_url').text();
				logo(url);
			
				$(".gallery").slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
				});

				facebook();	
				get_faved();
				
				$.when(permission(1,'',url)).done(function(v) {
					if (v['status'] == 'ok') {
						show_user_editor_links(v['state'])
					}
				});	
				
				$.getScript( "https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v3.0", function( data, textStatus, jqxhr ) {
					FB.XFBML.parse();
				});	
				
				yt_existence();
				yt_count();
				
				if ($('.ll-skin-melon').length > 0) {
					
					$.getScript( index+'/js/calendar_ts.js' )
					  .done(function( script, textStatus ) {
						$('.ll-skin-melon').datepicker()
					  })
					  .fail(function( jqxhr, settings, exception ) {
						console.log( "Triggered ajaxError handler." );
					});
	
				}
				
		return false;					   
        }
	})		
}

function yt_existence() {
	if ($(".youtube_iframe").length > 0) {
		$("#yt_show").css("display","flex");
	}
}

function yt_count() {
	if ($(".youtube_iframe").length > 4) {
		$("#youtube_wrapper, #youtube_wiz_wrapper").css("justify-content","flex-start");
	}
}

function facebook() {
	var url = window.location.href;
	$(".fb-share-button").attr("data-href",url)
}
	
window.addEventListener('popstate', function(event) {
		
		if (event.state !== null) {
		
			var action = event.state["action"];
					
			if (action == "product") {	
				var id = event.state["id"];
				var name = event.state["name"];
				product(id,name);	
				}	
		}
})

	var path = window.location.href;
	if(path.indexOf("/produkt/") !== -1) {
		var lastword = path.split("/produkt/").pop();
		var url_array = lastword.split("&");
		var id_2 = url_array[1].replace(/\//g, '');		
		var name = url_array[0].replace(/\//g, '');			
		var sub = id_2.substr(0,24);	
		
			if (sub.length == 24) {
				product(sub,name);
			} else {
				window.location.href = index;
			
			}
			
	}	
*/