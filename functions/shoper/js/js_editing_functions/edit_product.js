/********************/
/* Dopłaty i rabaty */
/********************/

function create_menu(state,menu) {
		
		$.ajax({ type: "GET",   
		url: index+"/functions/shoper/php_editing_functions/get_user_menu.php",   
		success : function(r)
		{
			
			console.log(r)
			
			var json = JSON.parse(r);

			$.each(json, function(k,v) {
				$('.sel_menu').append('<option k="'+k+'">'+v['name']+'</option>')
			})

			if (state == 'old') {
				
				$('.sel_menu').val(menu['main'])
				
				if (menu['sub']) {
					$('.sel_menu_wrapper').append('<select class="sel_submenu"></select>')
					var m = $('.sel_menu option:selected').attr('k');
					
						$.each(json[m]['subs'], function(k,v) {
							$('.sel_submenu').append('<option>'+v+'</option>')
						})

				}
		
				setTimeout(function(){
					$('.sel_submenu').val(menu['sub'])
				},500)

			}
			
			$('body').on('change','.sel_menu', function() {
				
				var m1 = $('option:selected',this).attr('k');

				if ($('.sel_submenu').length <= 1 ) {
					$('.sel_submenu').remove();
					
					if (json[m1]['subs']) {
						$('.sel_menu_wrapper').append('<select class="sel_submenu"></select>')
						$.each(json[m1]['subs'], function(k,v) {
							$('.sel_submenu').append('<option>'+v+'</option>')
						})
					}
					
				}
			})	
		}
		})
		
}


function add_new_q(form) {

		$.ajax({ type: "GET",   
			url: index+"/functions/shoper/php_editing_functions/layouts/new_question.php",   
			success : function(new_question) {	
			
					var a = [];
					$(".qa_wrapper").each(function() {
						var id = $(this).attr("id");
						a.push(id)
					})
					
					var next = parseInt(a.pop())+1;
					$('.questions').append(new_question);
					$("#x").attr("id",next);
					
					$("#"+next).find(".moro_radio").attr("name","moro_"+next);
					$("#"+next).find(".dor_radio").attr("name","dor_"+next+"_1");
					$("#"+next).find(".counter").text(next);
					
					if ($.isArray(form)) {
						var questions_length = form.length;
						if (	$('.qa_wrapper').length < questions_length  	) {
							add_new_q(form)
						} else {	add_new_ans(form)	}
					}
			}
		});	
	
}

function add_new_ans(form) {

		$.ajax({ type: "GET",   
		url: index+"/functions/shoper/php_editing_functions/layouts/answer.php",   
		success : function(answer)
			{
				if (form[0]['localName'] == 'div') {
					
					var name = $(form[0]['offsetParent']).find('.answer').last().find('.dor_radio').attr('name');
					$(form[0]['offsetParent']).find('.ans_wrapper').append(answer)
					
					var s = name.split('_')
					var k = s[1]
					var i = parseInt(s[2]) + 1
					
					$(form[0]['offsetParent']).find('.answer').last().find('.dor_radio').attr('name','dor_'+k+'_'+i);
					
				} else {

					var answers_length = [];
					$.each(form, function(k,v) {
						answers_length.push(  v['options'].length  )
					})
	
					$.each(answers_length, function(k,v) {
						var id = k+1;
						if (	$('.qa_wrapper[id='+id+']').find('.answer').length < v	) {
							$('.qa_wrapper[id='+id+']').children('.ans_wrapper').append(answer)
						} 
					})	
					
					var jest_tyle = $('.qa_wrapper').find('.answer').length
					var ma_byc = answers_length.reduce((a, b) => a + b, 0)

					if (jest_tyle !== ma_byc) {
						add_new_ans(form)
					} else {		
						dor(form)
					}
				}
			}
		})
}

function dor(form) {

	if ($.isArray(form)) {
		
		var dop_type = [];
		$.each(form, function(k,v) {		
			$.each (v['options'], function(ki,vi) {
				dop_type.push(vi['type'])
			})
		})
		
		$('.dop_or_rab').each(function(k,v) {
			if (dop_type[k] == 'doplaty') {
				if (	$(v).find(".doplaty").length == 0	) {
					$(v).load(index+'/functions/shoper/php_editing_functions/layouts/doplata.php');
				} else {console.log('Zaladowane przy: '+dop_type[k])}
			}
			if (dop_type[k] == 'rabaty') {
				if (	$(v).find(".rabaty").length == 0	) {
					$(v).load(index+'/functions/shoper/php_editing_functions/layouts/rabat.php');
				} else {console.log('Zaladowane przy: '+dop_type[k])}
			}
			if (dop_type[k] == 'no_change') {
				$(v).append('<div class="no_change"></div>')
			}	
		})
		
		var sT = function() {setTimeout(function() {
			
			var dop = $('.doplaty').length
			var rab = $('.rabaty').length
			var noch = $('.no_change').length
			var all = dop+rab+noch
			
			console.log('------------ Znalazlem ------------')
			console.log('Doplaty: '+dop)
			console.log('Rabaty: '+rab)
			console.log('No Change: '+noch)
			
			console.log('------------ Z bazy ---------------')
			console.log(form)
			
				if (all !== dop_type.length) {
					console.log('Rozruch Timeoutu jeszcze raz')
					sT()
				} else {		
					get_form_data(form)
				}
			
			},1000)
		}
		
		sT(); /* Sprawdza co 1000 ms czy wszystkie się już załadowały */
		
	} else {
		
		var space = form.closest('.dor_radio_wrapper').siblings('.dop_or_rab');
		if (form.val() == 'doplaty') {space.load(index+'/functions/shoper/php_editing_functions/layouts/doplata.php')};
		if (form.val() == 'rabaty') {space.load(index+'/functions/shoper/php_editing_functions/layouts/rabat.php')};
		if (form.val() == 'no_change') {space.html('')};
		
	}
}

function get_form_data(form) {
	
	$('.qa_wrapper').each(function(k,v) {
		
		/* Pytania */
		$(v).find('.q').val(	form[k]['q']	) 
		/* Jedna czy wiele odpowiedzi */
		$(v).find('.moro_radio[value='+		form[k]['mo']	+']').prop('checked',true) 
		
		$(v).find('.answer').each(function(ki,vi) { 
			/* Odpowiedzi */
			$(vi).find('.a').val(	form[k]['options'][ki]['name']  	) 
			/* Dopłaty/ Rabaty checkbox */
			$(vi).find('.dor_radio[value='+		form[k]['options'][ki]['type']  	+']').prop('checked',true) 
			/* Name dla dor_radio */
			$(vi).find('.dor_radio').attr('name','dor_'+(k+1)+'_'+(ki+1)) 
			/* Dopłaty i rabaty */
			if (	form[k]['options'][ki]['values']['per'] !== ''	) {$(vi).find('.d_per').val(	form[k]['options'][ki]['values']['per']	  )} else {	   $(vi).find('.d_per').prop('disabled',true)		}
			if (	form[k]['options'][ki]['values']['pln'] !== ''	) {$(vi).find('.d_pln').val(	form[k]['options'][ki]['values']['pln']	  )} else {	   $(vi).find('.d_pln').prop('disabled',true)		}
			if (	form[k]['options'][ki]['values']['per'] !== ''	) {$(vi).find('.r_per').val(	form[k]['options'][ki]['values']['per']	  )} else {	   $(vi).find('.r_per').prop('disabled',true)		}
			if (	form[k]['options'][ki]['values']['pln'] !== ''	) {$(vi).find('.r_pln').val(	form[k]['options'][ki]['values']['pln']	  )} else {	   $(vi).find('.r_pln').prop('disabled',true)		}

		})
	})	
	
}
