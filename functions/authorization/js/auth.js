$( document ).ready(function() {
	
	/* Przejdź do strony z rejestracją, jeśli nie zalogowany */	
	$('body').on('click',".register", function() {
		
		$.when(permission(0)).done(function(v) {
			if (v['status'] == 'ok') {
				$('.top_user_menu').show();
			} else {
				$('#ajax').load(index+'/functions/authorization/layout_register.php')
			}
		});	

	})
	
	/* Wybierz sposób rejestracji */
	$('body').on('click',".reg_by_email", function() {
		$(".for_email").show();
		$(".for_both").show();
		$(".for_fb").hide()
	})
	
	$('body').on('click',".reg_by_facebook", function() {
		$(".for_fb").show();
		$(".for_both").show();
		$(".for_email").hide();
	})

	
	$('body').on('click',".fb_register", function() {
		user_register_fb();
	})
	
	$('body').on('click',".email_register", function() {
		user_register_email();
	})

	/* Przejdź do strony z logowaniem, jeśli nie zalogowany */	
	$('body').on('click',".login", function() {
		$.when(permission(0)).done(function(v) {
			if (v['status'] == 'ok') {
				$('.top_user_menu').show();
			} else {
				$('#ajax').load(index+'/functions/authorization/layout_login.php')
			}
		});	
	})
		
	$('body').on('click',".fb_login", function() {
		user_login_fb();
	})
	
	$('body').on('click',".email_login", function() {
		user_login_email();
	})
	
	/* Wyloguj */

	$('body').on('click', '.log_out', function() {
		log_out();
	})
	
	$(".top_avatar").click(function(e) {
		
		$.when(permission(0)).done(function(v) {
			if (v['status'] == 'ok') {
				$('.top_user_menu').show();
			} else {
				$('#ajax').load(index+'/functions/authorization/layout_login.php')
			}
		});	

	})
	
	$('body').on('click','.top_avatar, .top_user_menu', function(e) {
		e.stopPropagation();
	})
	
	$('body').click(function() {
		$(".top_user_menu").hide();
	});

	$('body').on('click','.register_province, .register_region, .register_accept_reg_label, .register_name, .register_email, .register_password, .ver', function() {
		$(this).css('background','white')
	})
	
	/* Formularz rejestracji dla firm */	
	
	$('body').on('click','.register_as_company', function(e) {
		user_register_as_company()
	})
	
	$('body').on('click','.company_verification', function(e) {
		user_register_as_company_save_data_step_1()
	})
	
})

function user_register_email() {
	
	var name = $('.register_name').val()
	var email = $('.register_email').val()
	var password = $('.register_password').val()
	var province = $('.register_province option:selected').attr("kod")
	var region = $('.register_region option:selected').attr("kod")
	var gmina = $('.register_miasto_gmina option:selected').attr("kod")
	var rodz = $('.register_miasto_gmina option:selected').attr("rodz")
	var accepted = $('.register_accept_reg:checked').length
	
	var woj_name = $('.register_province option:selected').val()
	var pow_name = $('.register_region option:selected').val()
	var gmi_name = $('.register_miasto_gmina option:selected').val()
		
	if (
	
		name !== '' &&
		email !== '' &&
		email.includes("@") &&
		email.length > 8 &&
		password !== '' &&
		password.length > 6 &&
		province !== '' &&
		region !== '' &&
		gmina !== '' &&
		accepted == 1
	
	) {
	
		jQuery.ajax({
			type : "POST",
			url : index+"/functions/authorization/register_email.php",
			data : {
				name:name,
				email:email,
				password:password,
				province:province,
				region:region,
				gmina:gmina,
				rodz:rodz,
				woj_name:woj_name,
				pow_name:pow_name,
				gmi_name:gmi_name
			},
			success: function(r) {
				
				if (r == 'already_registered') {
					alert("Użytkownik z takim adresem email, jest już zarejestrowany.")
				} else {

					location.reload()
				}

			return false;					   
			}
		})	
	
	} else {
		
		
		if (	name == ""	) 				  {		$('.register_name').css('background','pink')   				}
		if (	email == ""	) 				  {		$('.register_email').css('background','pink')   			}
		if (	password == ""	) 			  {		$('.register_password').css('background','pink')  		 	}		
		if (	province == ""	) 			  {		$('.register_province').css('background','pink')   			}
		if (	region   == ""	) 	 		  {		$('.register_region').css('background','pink')				}
		if (	gmina   == ""	) 	 		  {		$('.register_miasto_gmina').css('background','pink')	    }
		if (	accepted == 0	) 			  {		$('.register_accept_reg_label').css('background','pink')	}
		
		alert("Wypełnij zaznaczone pola")
		
	}
}

function user_register_fb() {
	
	var province = $('.register_province option:selected').attr("kod")
	var region = $('.register_region option:selected').attr("kod")
	var gmina = $('.register_miasto_gmina option:selected').attr("kod")
	var rodz = $('.register_miasto_gmina option:selected').attr("rodz")
	var accepted = $('.register_accept_reg:checked').length
	
	var woj_name = $('.register_province option:selected').val()
	var pow_name = $('.register_region option:selected').val()
	var gmi_name = $('.register_miasto_gmina option:selected').val()
	
	if (	
		province !== "" &&
		region !== "" &&
		gmina !== "" &&
		accepted == 1
	) {
	
		FB.login(function(response){
			user_register_fb_continue(response,province,region,gmina,rodz,woj_name,pow_name,gmi_name)
		}, {scope: 'public_profile,email'});

	} else {
		
		if (	province == ""	) {		$('.register_province').css('background','pink')   	}
		if (	region   == ""	) 	  {		$('.register_region').css('background','pink')	    }
		if (	gmina   == ""	) 	  {		$('.register_miasto_gmina').css('background','pink')	    }
		if (	accepted == 0	) 			  {		$('.register_accept_reg_label').css('background','pink')	}
		
		alert("Wypełnij zaznaczone pola")
		
	}
}

function user_register_fb_continue(response,province,region,gmina,rodz,woj_name,pow_name,gmi_name) {

	if (response.status === "connected") {
		
		jQuery.ajax({
			type : "POST",
			url : index+"/functions/authorization/register_fb.php",
			data : {
				fbid:response.authResponse.userID,
				province:province,
				region:region,
				gmina:gmina,
				rodz:rodz,
				woj_name:woj_name,
				pow_name:pow_name,
				gmi_name:gmi_name,
				fbatoken:response.authResponse.accessToken
			},
			success: function(fb_string) {
				
				var fb_data = JSON.parse(fb_string)
				
				/* Jeśli w bazie nie ma nazwy i maila, to zapisz je */
				if (fb_data.fb_name == null || fb_data.fb_email == null) {
					FB.api('/me?fields=name,email', function(resp) {
						
						jQuery.ajax({
							type : "POST",
							url : index+"/functions/authorization/fb_save.php",
							data : {
								name:resp.name,
								email:resp.email
							},
							success: function() {
								
								location.reload()
								
							}
						});
					})
						
				} else {
					
					location.reload()
					
				}

			

			return false;					   
			}
		})	

	} else {
		
		console.log(response)
		
	}

}


function user_login_email() {

	var l = $('.login_email').val();
	var p = $('.login_password').val();
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/authorization/login_email.php",
		data : {
			l : l,
			p : p
		},
		success: function(r) {
			
			var dec = JSON.parse(r);

				if (dec[0] == 'logged') {
					
					location.reload()
					
				}
				else {
					alert(dec[0])				
				}

		return false;					   
        }
	})	

}

function user_login_fb() {
	
	FB.login(function(response){
		
		if (response.status === "connected") {

			jQuery.ajax({
				type : "POST",
				url : index+"/functions/authorization/login_fb.php",
				data : {
					fbid:response.authResponse.userID,
					fbatoken:response.authResponse.accessToken
				},
				success : function(r) {
					
				if (r == 'logged') { 
					location.reload()
				} 
				
				if (r == 'no_account') {
					$('#ajax').load(index+'/functions/authorization/layout_register.php')
				}
				
				}
			})

		} else {
			
		}
			
	}, {scope: 'public_profile,email'});
	
}


function log_out() {

	 FB.getLoginStatus(function(response) {
	
        if (response && response.status === 'connected') {
            FB.logout(function(response) {
                
				jQuery.ajax({
					type : "POST",
					url : index+"/functions/authorization/logout.php",
					success: function(r) {
						
							window.location.href=index;

					return false;					   
					}
				})	
				
            });
        } else {
			
			jQuery.ajax({
				type : "POST",
				url : index+"/functions/authorization/logout.php",
				success: function(r) {
					
						window.location.href=index;

				return false;					   
				}
			})	
			
		}
    });

}

function user_register_as_company() {
	
	$('#modal_overlay').show()
	$('#modal').load(index+'/functions/authorization/register_as_company.php')

}

function user_register_as_company_save_data_step_1() {
	
	/* sprawdź czy wszystko uzupełnione */
	/* typ weryfikacji */
	/* zapisz do bazy */
	/* po płatności jeszcze czeka na naszą weryfikację */
	
	var veri = []
	$('.ver').each(function(k,v) {
		if (	$(v).val() == ''    ) {	 
			$(v).css("background","pink") 	
			veri.push('1')
		}
	})
	
	var email_str = $('.company_register_contact_email').val()
	if (	(email_str.indexOf("@") != -1) && (email_str.length > 7) 	) {
		
	} else {
		$('.company_register_contact_email').css("background","pink") 
		veri.push('1')
	}

	if (veri.length == 0) {
		
		var company_data = {}
		company_data['verification_type'] = $('.verification_type:checked').val()
		
		$('.ver').each(function(k,v) {
			
			var key = $(v).attr("name")
			var value = $(v).val()
			
			company_data[key] = value
		})
		
		user_register_as_company_save_data_step_2(company_data)

	} else {
		alert("Uzupełnij poprawnie wszystkie pola.")
	}
	
}

function user_register_as_company_save_data_step_2(company_data) {
	
	jQuery.ajax({
		type : "POST",
		url : index+"/functions/authorization/register_as_company_save_data.php",
		data : {
			company_data:company_data
		},
		success: function(r) {
			
			if (	company_data['verification_type'] == 'transfer'	) {
				user_register_as_company_paynow(company_data)
			}
			
			if (	company_data['verification_type'] == 'private'	) {
				$(".company_data_container").html("<div class='flex-center-middle' style='height: 100%'><div class='flex-center-column'><div class='about_info'>Dziękujemy za przesłane zgłoszenie,</div><div class='shoper_editor_additional_info'>nasz konsultant skontaktuje się z Państwem w celu ustalenia terminu spotkania w siedzibie Państwa Firmy.</div><div id='close' clas='blue_btn'>Zakończ</div></div></div>")
			}

		return false;					   
		}
	})	
	
}

function user_register_as_company_paynow(company_data) {
	
	jQuery.ajax({
		type : "POST",
		url : index+"/functions/authorization/register_as_company_paynow.php",
		data : {
			company_data:company_data
		},
		success: function(r) {

			console.log(r)
			var transfer_data = JSON.parse(r)

			$.when(		user_register_as_company_paynow_save_transfer_data(transfer_data)	 ).done(function() {

				location.href = transfer_data['redirectUrl']
				
			});	

		return false;					   
		}
	})	
	
}

function user_register_as_company_paynow_save_transfer_data(transfer_data) {
	
	var deferred = $.Deferred();
	
	jQuery.ajax({
		type : "POST",
		url : index+"/functions/authorization/register_as_company_paynow_transfer_data.php",
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

function permission(x,y,l) {
	
	var deferred = $.Deferred();
	
	var a = [x,y,l];
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/authorization/permission.php",
        data : {
			f: 'y',
			action: a
				},
		success: function(r) {

			var json = JSON.parse(r)
			deferred.resolve(json);

        }
	})		
	
	return deferred.promise();
	
}