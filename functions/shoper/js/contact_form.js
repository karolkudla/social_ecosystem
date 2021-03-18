function send_contact_form() {
	
	$(".loading_main").css("display","flex");
	
	var flaga = [];
	
	var region = $('.choose_region').val()
	var client_email = $('.client_email').val()
	var client_is = $('.client_is').val()
	var client_question_is = $('.client_question_is').val()
	var client_question = $('.client_question').val()
	var client_tel = $('.client_tel').val()
	var client_name = $('.client_name').val()
	
	if (	region 			   == ''	) {		flaga.push('region')				}
	if (	client_email 	   == ''	) {		flaga.push('client_email')			}
	if (	client_is 		   == ''	) {		flaga.push('client_is')				}
	if (	client_question_is == ''	) {		flaga.push('client_question_is')	}
	if (	client_question    == ''	) {		flaga.push('client_question')		}
	if (	client_tel   	   == ''	) {		flaga.push('client_tel')			}
	if (	client_name        == ''	) {		flaga.push('client_name')			}
	
	if (flaga.length > 0) {
		
		$(".loading_main").css("display","none");
		alert('Nie uzupełniłeś wszystkich pól.')
		
		
	} else {
		
		jQuery.ajax({
			type : "POST",
			url : index+"/functions/contact_form.php",
			data : {
				r     : region,
				ce    : client_email,
				cis   : client_is,
				cqis  : client_question_is,
				cq    : client_question,
				ctel  : client_tel,
				cname : client_name
				
			},
			success: function(r) {
				
				$('.choose_region').val('')
				$('.client_email').val('')
				$('.client_is').val('')
				$('.client_question_is').val('')
				$('.client_question').val('')
				$('.client_tel').val('')
				$('.client_name').val('')
				
				alert('Twoja wiadomość została wysłana.')
				
				$(".loading_main").css("display","none");
				/* zabezpiecz przed botami */
				
			return false;					   
			}
		})		
		
	}
	
}

$( document ).ready(function() {
	
	
	$('body').on('click', '.send_contact_form', function() {
		
		send_contact_form();
		
	})
	
	
})