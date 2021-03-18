function get_data(r,step) {

	var deferred = $.Deferred();
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/php_editing_functions/get_product_data.php",
		data : {
			pid: r
		},
		success: function(res) {

			var json = JSON.parse(res)
			deferred.resolve(json);

			$(".in_modal_edit").attr('product_id',r.substring(0,24))
			
		/* Pierwsza karta */
			if (step == 1) {

				if (json['title']) {$(".new_title").val(json['title'])}
				if (json['link']) {$(".link_to_offer").val(json['link'])}
				if (json['cats']) {create_selects(json['cats'])}
				if (json['img']) {create_gallery(folder,json['img'])}
				if (json['yt']) {create_yt(json['yt'])}
			
			}
			
        }	
	})
	return deferred.promise();
}

function create_localisation(localisation) {
	
	$('.select_powiaty').html('<option kod="">Miasto / Powiat</option>')
	$('.select_miasta_gminy').html('<option kod="" rodz="">Miasto / Gmina</option>')
	
	if (localisation['WOJ']) {
	
		var powiaty_get = function() { setTimeout(function() {
				if (	$(".select_wojewodztwa option[kod="+localisation['WOJ']+"]").length == 1   	) {
					get_terytorium(1,0)
				} else {
					powiaty_get()
				}
			},100)
		}
		
		powiaty_get()
		
		if (localisation['POW']) {
		
			var powiaty_select = function() { setTimeout(function() {
					if (	$('.select_powiaty option').length > 1   	) {
						
						$(".select_powiaty option[kod="+localisation['POW']+"]").prop('selected', true);

					} else {
											
						powiaty_select()
					}
				},100)
			}
			
			powiaty_select()
			
			var gminy_get = function() { setTimeout(function() {
					if (	$(".select_powiaty option[kod="+localisation['POW']+"]:selected").length == 1   	) {
						
						get_terytorium(0,1)
					} else {
						gminy_get()
					}
				},100)
			}
			
			gminy_get()
		
		} else {
			console.log("No localisation POW")
		}
		
		if (localisation['GMI']) {
			
			var gminy_select = function() { setTimeout(function() {
					if (	$('.select_miasta_gminy option').length > 1   	) {
						
						$(".select_miasta_gminy option[kod="+localisation['GMI']+"][rodz="+localisation['RODZ']+"]").prop('selected', true);
					} else {
						gminy_select()
					}
				},100)
			}
			
			gminy_select()
		
		} else {
			console.log('No localisation G')
		}
		
	} else {
		console.log("No localisation W")
	}
}

function intelligent_data_getter(json) {

	var product_id = $('.in_modal_edit').attr('product_id')

	$.each(json['product_data'], function(k,v) {

		$.each(v, function(ki,vi) {
			
			if (vi['type'] == 'tick') {
				$('.idg[name='+ki+'][value="'+vi['value']+'"]').prop('checked',true)
			}
			
			if (vi['type'] == 'text' || vi['type'] == 'number') {
				$('.idg[name='+ki+']').val(vi['value'])
			}
			
			if (vi['type'] == 'select' || vi['type'] == 'number') {
				$('.idg[name='+ki+']').val(vi['value'])
			}
			
			if (vi['type'] == 'date') {
				$('.idg[name='+ki+']').val(vi['value'])
			}
			
		})

	})

	/* Zdjęcie profilowe */
	if 	(	check_key_exists(json,['profile']) == '1' && json['profile'] !== null	) {

		$(".profile_img_wrapper").css({"background":"url('"+index+users_uploads+json['url']+user_shoper_offers_gallery+product_id+"/"+json['profile']+"')",'background-size':'cover'});
		$(".add_profile_text").remove();
	} else {

		$(".profile_img_wrapper").css({"background":"url('"+index+users_uploads+json['url']+user_shoper_avatar+json['alternative_profile']+"')",'background-size':'cover'});
		$(".add_profile_text").remove();

	}
	
	/* Alternatywny adres - jeżeli jest jakikolwiek klucz w alternative contact */
	if (	check_key_exists(json,['alternative_contact','city']) == 1	   ) {

		$('.idg[name=opiekun_firma_nazwa]').val(json['alternative_contact']['company_full_name'])
		$('.idg[name=opiekun_firma_ulica]').val(json['alternative_contact']['street'])
		$('.idg[name=opiekun_firma_miasto]').val(json['alternative_contact']['city'])
		$('.idg[name=opiekun_firma_kod_pocztowy]').val(json['alternative_contact']['postal_code'])
		
		$('.idg[name=opiekun_tel]').val(json['alternative_contact']['phone_1'])
		$('.idg[name=opiekun_email]').val(json['alternative_contact']['email'])
		
	}
	
	/* Lokalizacja oferty */
	if (	check_key_exists(json,['product_data','lokalizacja_oferty','lokalizacja_miasto','value']) == '1'	) {
		$('.lokalizacja_mapa').html('<iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q='+json['product_data']['lokalizacja_oferty']['lokalizacja_miasto']['value']+';&amp;ie=UTF8&amp;t=k&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>')
	} else {
		$('.lokalizacja_mapa').html('<iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=World;&amp;ie=UTF8&amp;t=k&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>')
	}
	
	if (	check_key_exists(json,['form']) == '1'   &&   json['form'] !== null && json['form'] !== undefined) {
		/* Jeżeli jest w bazie tylko jeden to uzupełnij go, jeżeli jest więcej to utwórz nowe pola i dopiero uzupełnij */
		if (json['form'].length > 1) {
			add_new_q(json['form'])
		} else {
			/* jeżeli są jakieś odpowiedzi w pierwszym to utwórz je */
			if (json['form'][0]['options'].length > 0) {
				add_new_ans(json['form'])
			}
		}
	}
	
	
			if (check_key_exists(json,['localisation']) == 1 && json['localisation'] !== null && json['localisation'] !== undefined) {
				create_localisation(json['localisation'])
			}
	
}

function create_selects(cats) {
	
		jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/php_editing_functions/create_selects.php",
        data : {
			cats:cats
				},
		success: function(r) {

			var json = JSON.parse(r)	
			var cs = $(".categories_string")
								
			cs.html('');
			$.each(cats, function(key,val) {
				cs.append('<select class="sel_cat to_block" d="'+key+'"></select>')
				$.each(json[key], function(k,v) {
					$(".sel_cat[d='"+key+"']").append("<option k='"+v+"'>"+v+"</option>");
					$(".sel_cat[d='"+key+"']").val(val)
				})
			})
			
			var first = $(".sel_cat[d='0']").children("option");
			$.each(first, function(k,v) {
				$(v).attr("f",k)
			})
			
			var selected = $(".sel_cat[d='0'] option:selected").attr("f");
			var nums = [1,2,3,4];
			$.each(nums, function(k,v) {
				$(".sel_cat[d='"+v+"'] option").attr("f",selected)
			})
	
			$('.cats_line').append('<div class="cats_already_choosed flex-center-middle">Kategorie zostały już wybrane</div>')
			
		return false;					   
        }
	})
}


function create_gallery(uid,imgs) {
	
	console.log("Create gallery");
	
	var pid = $(".in_modal_edit").attr('product_id');
	
	$.each(imgs, function(k,v) {
		$(".imgs_edit_panel").append("<div class='imgs_thumb' id='"+v+"'><img class='imgs_thumb_img' src='"+index+users_uploads+uid+user_simple_offers_gallery+pid+"/mini-"+v+"'></div>")
	})
	
	$(".imgs_edit_panel").sortable();
	
	$(".imgs_thumb").each(function() {
		$(this).append("<div class='delete_img'><span class='icon-cross'></span></div>");
	})
	
}

function create_yt(yt) {
	
	$.each(yt, function(k,v) {	
		$(".youtube_edit_wrapper").append('<div class="youtube_edit_iframe" id="'+v+'"><iframe src="https://www.youtube.com/embed/'+v+'?loop=1&modestbranding=1" width=256 height=144 frameborder=0 allowfullscreen srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/'+v+'?autoplay=1><img src=https://img.youtube.com/vi/'+v+'/hqdefault.jpg><span>▶</span></a>" frameborder=0 allowfullscreen width="300" height="200" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe></div>')		
	})
	
	$('.youtube_edit_iframe').each(function() {
			$(this).append('<div class="delete_youtube"><span class="icon-cross"></span></div>')
			$(this).append('<div class="drag_drop"><span class="icon-drag_indicator"></span></div>')
	})	
		
	$(".youtube_edit_wrapper").sortable();
	
}
