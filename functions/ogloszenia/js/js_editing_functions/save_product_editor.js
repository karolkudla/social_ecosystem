$( document ).ready(function() {
	
	/* Po kliknięciu na wyjście i tak zapisuje jako szkic */
	/* Albo pyta czy zapisać czy nie */
	
	$('body').on('click','#save_one_yt', function() {
		var new_link = $("#add_new_youtube_input").val();	
		append_yt(new_link);
	})
	
	$('body').on('click','#add_new_youtube_input', function() {
			$(".add_new_youtube").css("background","whitesmoke");
			$("#add_new_youtube_input").attr('placeholder','')		
	})
	
	$('body').on('click','.delete_youtube', function() {
	var link = $(this).prev("iframe").attr("src");
	
	if (confirm('Czy napewno chcesz usunąć ten film ?')) {
			$(this).parent().remove();	
		} 	
	})

	$("body").on('click', '.accept_editor', function() {
		
		/* when obowiązkowe done - save data */
		save_prod_data('old');
		$('#modal_overlay').hide();
	})
	
	$("body").on('click', '.accept_editor_szkic_exit', function() {
		save_prod_data('new');

		var offer_type = $(this).attr("ot")

		if (offer_type == 'shoper_offer') {
			alert("Skontaktuj się z administratorem.")
		}
		
		if (offer_type == 'simple_offer') {
			alert("Szkic ogłoszenia został zapisany, możesz powrócić do niego później.")
			open_simple_offers(['my_offers'])
		}

	})
	
	$("body").on('click', '.accept_editor_szkic_no_exit', function() {
		save_prod_data('new');

		var offer_type = $(this).attr("ot")

		if (offer_type == 'shoper_offer') {
			alert("Skontaktuj się z administratorem.")
		}
		
		if (offer_type == 'simple_offer') {
			alert("Szkic ogłoszenia został zapisany.")
		}

	})

	$("body").on('click', '.next_step', function() {	
		var cont = $(".show");
		next_step(cont)
	
	})
	
	$("body").on('click', '.step_enabled', function() {

		var cont = $(".show");
		
		cont.removeClass("show").addClass("hide");
		cont.hide();
		var step = $(this).attr("step");
		$(".step[step='"+step+"']").removeClass("hide").addClass("show");
		$(".step[step='"+step+"']").show();

	})

	/* DODAJ NOWĄ ODPOWIEDŹ DO KONFIGURATORA */

	$("body").on('click', '.add_new_ans', function() {
		add_new_ans( $(this) );
	})
	
	/* USUŃ ODPOWIEDŹ Z KONFIGURATORA */
	
	$("body").on('click', '.del_new_ans', function() {
		var w = $(this).parent().siblings(".ans_wrapper").children(".answer").last();
		var count = $(this).parent().siblings(".ans_wrapper").children(".answer").length;
		if (count > 1) {w.remove()}
	})
	
	/* DODAJ NOWE PYTANIE DO KONFIGURATORA */
	
	$("body").on('click', '.add_new_q', function() {
		add_new_q();
	})
	
	/* USUŃ PYTANIE Z KONFIGURATORA */
	
	$("body").on('click', '.del_new_q', function() {
		if ($('.qa_wrapper').length > 1) {
			$('.qa_wrapper').last().remove();
			var element = $('.qa_wrapper').last();
			scroll(element)
		}
	})
			
	$('body').on('change','.dor_radio', function() {
		dor(	$(this)	   )
	})
	
	$('body').on('input','.dop', function() {
		
		var c = $(this).closest(".doplaty");
		
		if (c.find(".d_per").val() !=='') {	  
			c.find(".d_pln").prop('disabled',true).addClass("disabled");	
		} else {
			c.find(".d_pln").prop('disabled',false).removeClass("disabled");	
		}
		
		if (	  c.find(".d_pln").val() !==''		) {
			c.find(".d_per").prop('disabled',true).addClass("disabled");	
		} else {
			c.find(".d_per").prop('disabled',false).removeClass("disabled");		
		}
		
	})
	
	$('body').on('input','.rab', function() {
		
		var c = $(this).closest(".rabaty");
		
		if (c.find(".r_per").val() !=='') {	  
			c.find(".r_pln").prop('disabled',true).addClass("disabled");		
		} else {
			c.find(".r_pln").prop('disabled',false).removeClass("disabled");		
		}
		
		if (	  c.find(".r_pln").val() !==''		) {
			c.find(".r_per").prop('disabled',true).addClass("disabled");	
		} else {
			c.find(".r_per").prop('disabled',false).removeClass("disabled");		
		}
		
	})
	
	$('body').on('change','#profile_img_btn', function() {
		up_profile_img();
	})

	/* Pokaż podgląd oferty, sprawdzić czy to wystarczy czy inaczej zrobić */
	$("body").on('click','.get_view', function() {
		
		save_prod_data('new')
		
		$('.view_ready').append('<div class="view_ready_loading"><div class="lds-ripple"><div></div><div></div></div></div>')
		$('.view_ready_loading').css('display','flex')
		
		setTimeout(function() {
			var product_id = $('.in_modal_edit').attr('product_id')
			var ot = $('.in_modal_edit').attr('ot')
			get_view_ready(product_id,ot);
		},500)	
		
	})
})

function save_prod_data(version) {

		$("body").css("overflow","auto")
		
		var deferred = $.Deferred();
		
		/****************************/
		/* Pozwolenie na brak youtube */
		/****************************/
		
		if (	$(".youtube_edit_iframe").length > 0	   ) {
			var youtube = $(".youtube_edit_wrapper").sortable('toArray')
		} else {
			var youtube = '';
		}
	
		/****************************/
		/* Pozwolenie na brak zdjęć */
		/****************************/
		
		if ( $('.imgs_thumb_img').length > 0 ) {
			var images = $(".imgs_edit_panel").sortable('toArray');
		} else {
			var images = [];
		}
	
		jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/php_editing_functions/save_product_data.php",
        data : {
			pid: $(".in_modal_edit").attr('product_id'),
			version:version,		/* Nowy / Edycja */
			
			title: $(".new_title").val(),			/* Tytuł */
			link: $(".link_to_offer").val(),		/* Link do oferty */
			localisation: get_localisation(),
			cats:get_cats(), 						/* Kategorie */
			img_pos:images,  						/* Zdjęcia */
			yt_pos:youtube,  						/* Youtube */
			menu:get_menu(), 						/* Menu */
			editor:get_editor(), 					/* Konfigurator */
			product_data:intelligent_data_saver(),
			bonus:bonus()							/* Wszystko */
			
				},
		success: function(offer_type) {

			
			if (version == 'old') {
				
				if (offer_type == 'shoper_offer') {
					alert("Skontaktuj się z administratorem.")
				}
				
				if (offer_type == 'simple_offer') {
					alert("Twoja oferta jest w trakcie weryfikacji. Niebawem zostanie opublikowana. Dziękujemy.")
					open_simple_offers(['my_offers'])
				}
			}
			
			deferred.resolve();

        }
		
	})	
	
	return deferred.promise();
	
}

function bonus() {
	
	if (	$(".bonus_checkbox:checked").length == 1	) {
		
		var bonus_name = $(".bonus_name").val();
		var bonus_email = $(".bonus_email").val();
		
		var a = {'bonus_name':bonus_name,'bonus_email':bonus_email};
		return a;
		
	} else {
		
		return 'nb';
	
	}
	
}

function intelligent_data_saver() {
	
	var data_one = {};
	var data_multi = {};
	var containers = [];

	$('.idg').each(function(k,v) {
			
		var container = $(v).closest('.container').attr('container') /* Kontener który chcemy wyświetlać na stronie produktu */
		if (containers.pop() !== container) {data_one = {}}
		
		if (	$(v).parent().siblings('.text_name').text() !== ''	 ) {
			var text_name = $(v).parent().siblings('.text_name').text();
		} else {
			var text_name = $(v).parent().parent().siblings('.text_name').text();
		}
		
		var name = $(v).attr('name')
		var value = $(v).val()
		var text_value = $(v).parent().text()
		
		
		if (value !== '') {
			
			if (	 $(v).prop("checked") === true  ) {
				data_one[name] = {'value':value,'text_value':text_value,'text_name':text_name,'type':'tick'}
			}
		
			if (	$(v).attr('type') == 'number'   ) {
				data_one[name] = {'value':value,'text_name':text_name,'type':'number'}
			}
			
			if (	$(v).attr('type') == 'text'   ) {
				data_one[name] = {'value':value,'text_name':text_name,'type':'text'}
			}
			
			if (	$(v).attr('type') == 'super_text'	) {
				data_one[name] = {'value':value,'text_name':text_value.trim(),'type':'text'}
			}
			
			if (	$(v).attr('type') == 'select'	 ) {
				data_one[name] = {'value':value,'text_name':text_name,'type':'select'}
			}
			
			if (	$(v).attr('type') == 'date'	 ) {
				data_one[name] = {'value':value,'text_name':text_name,'type':'date'}
			}
		
		}
		
		data_multi[container] = data_one
		containers.push(container)

	})

	return data_multi;
	
}


function get_view_ready(product_id,offer_type) {
	
	if (offer_type == 'simple_offer') {var file = '/functions/ogloszenia/one_offer.php'}
	/* if (offer_type == 'shoper_offer') {var file = '/funtions/shoper/product.php'} */
	
	jQuery.ajax({
        type : "POST",
        url : index+file,
        data : {
			offer_id:product_id
				},
		success: function(r) {
			
			$('.view_ready').html(r)
			
			$(".shoper_product_gallery").not('.slick-initialized').slick({
					lazyLoad: 'ondemand',
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: true
			});
			
		$('.view_ready_loading').hide();
			
		}
	})
}

function get_localisation() {
	
	var woj_kod = $('.select_wojewodztwa option:selected').attr("kod")
	var pow_kod = $('.select_powiaty option:selected').attr("kod")
	var gmi_kod = $('.select_miasta_gminy option:selected').attr("kod")
	var rodz_kod = $('.select_miasta_gminy option:selected').attr("rodz")
	
	var localisation = {'WOJ':woj_kod,'POW':pow_kod,'GMI':gmi_kod,'RODZ':rodz_kod}
	
	return localisation
	
}

function get_cats() {
	cats = [];
	$(".sel_cat option:selected").each(function(k,v) {
		cats.push($(this).val())
	})
	return cats
}

function get_menu() {
	menu = {'main':$('.sel_menu').val(),'sub':$('.sel_submenu').val()}
	return menu
}

/* Konfigurator */
	
function get_editor() {
	question_data = {};
	data = [];

	$(".qa_wrapper").each(function() {
		var q = $(this).find(".q").val();
		var mo = $(this).find(".moro_radio:checked").val();
		var options_data = $(this).find(".ans_wrapper").children();
		
		option = {};
		options = [];
		values = {};
		
		$.each(options_data, function(k,v) {
		
			var option_name = $(this).find(".a").val();
			var type = $(this).find(".dor_radio:checked").val();
							
			if (type == 'doplaty') {
				var inputs = $(this).find(".dop");
				var per = $(inputs[0]).val();
				var pln = $(inputs[1]).val();

				if (per !== '') {math = 'per'} else {math = 'add'}
				values = {"per":per,"pln":pln};
			}
			if (type == 'rabaty') {
				var inputs = $(this).find(".rab");
				var per = $(inputs[0]).val();
				var pln = $(inputs[1]).val();

				if (per !== '') {math = 'per'} else {math = 'add'}
				values = {"per":per,"pln":pln};
			}
			if (type == 'no_change') {
				var math = '';
				var values = '';
			}
			
			option = {"name":option_name,"type":type,"math":math,"values":values}
			options.push(option)
		})
		
		question_data = {"q":q,"mo":mo,"options":options}
		data.push(question_data)	
	})
	return data;
}


function up_profile_img() {	
		var pid = $(".in_modal_edit").attr('product_id');
		
        $('#profile_img').ajaxForm({
			data : {
				pid:pid
			},
			success: function(r) {
				
				var i = JSON.parse(r);
				$(".profile_img_wrapper").css("background-image","url('"+index+users_uploads+i[0]+user_shoper_offers_gallery+pid+"/"+i[1]+"')");

				$(".add_profile_text").remove();
			},
            error:function(r){
				console.log("error");
            }
        }).submit();
}

function append_yt(new_link) {

	if (new_link.includes("youtu") && new_link.includes(".com") && new_link !== '') {
		
		function YouTubeGetID(new_link){		
			url = new_link.split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
			return (url[2] !== undefined) ? url[2].split(/[^0-9a-z_\-]/i)[0] : url[0];
		}
		
		var parsed_yt = YouTubeGetID(new_link)

		$("#add_new_youtube_input").val("");	
		$(".youtube_edit_wrapper").prepend('<div class="youtube_edit_iframe" id="'+parsed_yt+'"><iframe src="https://www.youtube.com/embed/'+parsed_yt+'?loop=1&modestbranding=1" frameborder=0 width=256 height=144  allowfullscreen srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/'+parsed_yt+'?autoplay=1><img src=https://img.youtube.com/vi/'+parsed_yt+'/hqdefault.jpg><span>▶</span></a>" frameborder=0 allowfullscreen width="300" height="200" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe></div>')
		$('.youtube_edit_iframe').each(function() {
			$(this).append('<div class="delete_youtube"><span class="icon-cross"></span></div>')
			$(this).append('<div class="drag_drop"><span class="icon-drag_indicator"></span></div>')
		})	
		$(".youtube_edit_wrapper").sortable();
		
	} else {	 

		$(".add_new_youtube").css("background","#f44336");
		$("#add_new_youtube_input").val("");
			
	}
}

$( document ).ready(function() {

	$('body').on('change','#imgs_up_button', function() {
		add_images();
	})

	$('body').on('click','.delete_img', function() {
		var src = $(this).prev().attr("src");
		var div = $(this).parent().attr("id");
			if (confirm('Czy napewno chcesz usunąć to zdjęcie ?')) {
				del_photos(src,div);
			} 
	})

})

function add_images() {
	
		var id =  $(".in_modal_edit").attr('product_id');
		$('.imgs_edit_panel').append('<div class="imgs_thumb imgs_percent"></div>')
		
        $('#imgs_up').ajaxForm({   

			xhr: function()
			{
				var xhr = new window.XMLHttpRequest();
				//Upload progress
				xhr.upload.addEventListener("progress", function(evt){
				  if (evt.lengthComputable) {
					var percentComplete = evt.loaded / evt.total;
					
						var n = (percentComplete*100).toFixed(2);
					
						if (n < 99) {
							$('.imgs_percent').html(n+'%')
						}
					
				  }
				}, false);
				return xhr;
			},
        
			data: {
				id: id,
			}, 
            success: function(r){	
				imgs = JSON.parse(r)
				
				console.log(imgs)
				
				$('.imgs_thumb').remove();
			
				create_gallery(imgs[0],imgs[1])
            },
            error:function(r){
				console.log("error");
            }
        }).submit();
}

function del_photos(src,div) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/php_editing_functions/del_images.php",
		data : {
			pid : $(".in_modal_edit").attr('product_id'),
			src : src
		},
		success : function(r) {
				
			$(".imgs_thumb[id='"+div+"']").remove();
			console.log(r);
			
		}
	})	
	
}

$( document ).ready(function() {
	
	$("body").on('change','.sel_cat', function() {
		var file = $(this).find("option:selected").attr("f");
		var deep = $(this).attr("d");
		choose_cat(file,deep);	
	})
	
})

/* Pobieranie kategorii do selectów z plików */
function choose_cat(file,deep) {
			
		var a = [1,2,3,4];
		$.each(a,function(k,v) {
			var which = parseInt(deep)+v;
			$(".sel_cat[d='"+which+"']").remove();
		})
		
		var keys = [];
		$.each(		$(".sel_cat"), function() {
			var k = $(this).find("option:selected").attr("k");
			keys.push(k);
		}) 
		keys.shift();
		
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/ogloszenia/php_editing_functions/choose_cat.php",
		data : {
			f:file,
			d:deep,
			k:keys
		},
		success: function(r) {
		
		var json = JSON.parse(r);
		var j = json[0];
		new_d = parseInt(deep) + 1;
				
		if (j.length > 0) {

			if (	$(".sel_cat[d='"+new_d+"']").length == 0	) {
				$(".categories_string").append("<select class='sel_cat' d='"+new_d+"'></select>");		
				$(".sel_cat[d='"+new_d+"']").append('<option k="null">Wybierz</option>');				
				$.each(j, function(k,v) {
					$(".sel_cat[d='"+new_d+"']").append('<option f="'+file+'" k="'+v+'">'+v+'</option>');
				})
			} else {
				$(".sel_cat[d='"+new_d+"']").html('');
				$(".sel_cat[d='"+new_d+"']").append('<option k="null">Wybierz</option>');
				$.each(j, function(k,v) {
					$(".sel_cat[d='"+new_d+"']").append('<option f="'+file+'" k="'+v+'">'+v+'</option>');
				})			
			}
		} else {
			$(".sel_cat[d='"+new_d+"']").remove();
		}
		
		/*
		if (file == '2') {
			$(".tags").load(index+'/edit_access/layouts/tagi_moto.php');
		} else {
			$(".tags").html('<div style="font-size: 22px; font-weight: 400; margin: 5px;">Brak tagów do dodania.</div>')
		}
		
		if (file == '4') {
			$(".tags").load(index+'/edit_access/layouts/tagi_hotel.php');
		} else {
			$(".tags").html('<div style="font-size: 22px; font-weight: 400; margin: 5px;">Brak tagów do dodania.</div>')
		}
		*/
		
		return false;					   
        }
	})	
}


