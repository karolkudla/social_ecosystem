$( document ).ready(function() {
/****************************************************************************************************** PANEL ***/

$('body').on('click','#cart_click', function() {

	$('#panel').css('width','50%');
    $("#panel").animate({
		width: 'toggle'
    });

})

$('body').click(function(e) {
    if ($(e.target).closest('#panel, #cart_click, #favourite_click').length === 0) {
        $("#panel").fadeOut();
    }
});


/************************************************************************************************** KOSZYK SHOW ***/

$('body').on('click','#cart_click', function() {
	koszyk();
})

function koszyk() {
	
		jQuery.ajax({
        type : "POST",
        url : index+"/functions/my_cart.php",
        data : {
			
				},
		success: function(r) {
			
			$('#panel').html(r);
			
		return false;					   
        }
	})		
} 

/******************************************************************************************** OTWÓRZ KONFIGURATOR ***/

$('body').on('click','.p_add_to_cart, .p_buy_now', function() {
	var pid = $(this).attr("pid");
	product_config(pid,'1');
})

$('body').on('click','.l_add_to_cart, .l_buy_now', function() {
	var pid = $(this).attr("pid");
	product_config(pid,1);
})

$('body').on('click','.fav_add_to_cart, .fav_buy_now', function() {
	var pid = $(this).attr("pid");
	product_config(pid,1);
	$("#panel").hide();
})

function product_config(pid,count) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/modal_conf.php",
        data : {
			pid:pid,
			count:count
				},
		success: function(r) {
			
			$("#modal_overlay").show();
			$("#modal").html(r);
			
		return false;					   
        }
	})		
}

/***************************************************************************************** ZBIERZ DANE Z KONFIGURATORA ***/

$('body').on('change','.conf_count', function() {
	if ($(".conf_count").val() == '') {
		$(".conf_count").val(1)
		get_conf_data();
	}
})

$('body').on('input','.form_line input, .conf_count', function() {	
	get_conf_data();
})

function get_conf_data() {
	if (	$('input:checked').length > 0) 	 {
	
		$(".price_math").show();
		$(".conf_accept_buttons").css('display','flex');
	
	var checked = [];
	$('input:checked').each(function(k,v) {
		var name = $(v).attr('n');
		var label = $(v).attr('l');		
		line = {name:name,label:label}
		checked.push(line)
	})
	
	var pid = $("#conf_pid").text();
	var count = $(".conf_count").val();
	
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/modal_calc.php",
        data : {
			pid:pid,
			count:count,
			calc:checked
				},
		success: function(r) {
			
			var json = JSON.parse(r);
			$(".pln_math").html(json['pln']);
			$(".zln_pln_math").html(json['zln_pln']);
			$(".zln_zln_math").html(json['zln_zln']);
			
		return false;					   
        }
	})		
	
	}
}

/************************************************************************************ DO KOSZYKA CLICK ***/

$('body').on('click','.conf_add_to_cart', function() {
	$(".pln_or_zln").remove();
	if (	$(this).find(".pln_or_zln").length == 0		) {
		$(this).append("<div class='pln_or_zln'><div class='atc_title'>Dodaj do koszyka w:</div><div style='width: 100%'><button class='atc_btn atc_btn--zln atc_btn--cart' c='zln'>zielonych (ZLN)</button><button class='atc_btn atc_btn--pln atc_btn--cart' c='pln'>złotówkach (PLN)</button></div></div>");
	} 
	$(".price_math").addClass('blur');
})

$('body').on('click','.conf_buy_now', function() {
	$(".pln_or_zln").remove();
	if (	$(this).find(".pln_or_zln").length == 0		) {
		$(this).append("<div class='pln_or_zln'><div class='atc_title'>Kupuję w:</div><div style='width: 100%'><button class='atc_btn atc_btn--zln atc_btn--bn'>zielonych (ZLN)</button><button class='atc_btn atc_btn--pln atc_btn--bn'>złotówkach (PLN)</button></div></div>");
	} 
	$(".price_math").addClass('blur');
})

$('body').click(function(e) {
    if ($(e.target).closest('.pln_or_zln, .conf_add_to_cart, .conf_buy_now').length === 0) {
        $(".pln_or_zln").remove();
		$(".price_math").removeClass('blur');
    }	
});

$('body').on('click','.atc_btn--cart, .atc_btn--cart', function() {
	var c = $(this).attr('c');
	add_to_cart(c);
})

function add_to_cart(c) {
	
	if (	$('input:checked').length > 0) 	 {
	
		$(".price_math").show();
		$(".conf_accept_buttons").css('display','flex');
	
	var checked = [];
	$('input:checked').each(function(k,v) {
		var name = $(v).attr('n');
		var label = $(v).attr('l');		
		line = {name:name,label:label}
		checked.push(line)
	})
	
	var pid = $("#conf_pid").text();
	var count = $(".conf_count").val();

	jQuery.ajax({
        type : "POST",
        url : index+"/functions/add_to_cart.php",
        data : {
			pid:pid,
			count:count,
			currency:c,
			calc:checked
				},
		success: function(r) {
			
			$("#panel").animate({
				width: 'toggle'
			});
			
			koszyk();
			
			
		return false;					   
        }
	})		
	
}}

/*
$('body').on('click','.atc_btn--pln', function() {
	var id = $(this).parents(".add_to_cart").attr("pid");
	var c = 'pln';
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/add_to_cart.php",
        data : {
			id:id,
			c:c
				},
		success: function(r) {
			$(".pln_or_zln").html("Dodano do koszyka w złotówkach");
			setTimeout(function(){ $(".add_to_cart[pid="+id+"]").find(".pln_or_zln").fadeOut() }, 1000);
			setTimeout(function(){ $(".add_to_cart[pid="+id+"]").find(".pln_or_zln").remove() }, 1300);
		return false;					   
        }
	})		
	
})

$('body').on('click','.atc_btn--zln', function() {
	var id = $(this).parents(".add_to_cart").attr("pid");
	var c = 'zln';
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/add_to_cart.php",
        data : {
			id:id,
			c:c
				},
		success: function(r) {
			$(".pln_or_zln").html("Dodano do koszyka w zielonych");
			setTimeout(function(){ $(".add_to_cart[pid="+id+"]").find(".pln_or_zln").fadeOut() }, 1000);
			setTimeout(function(){ $(".add_to_cart[pid="+id+"]").find(".pln_or_zln").remove() }, 1300);
		return false;					   
        }
	})		
	
})
*/
/********************************************************************************************** ZMIANA KOSZYKA ***/

$('body').on('click','.change_cart', function() {
	var sid = $(this).attr('sid')
	var w = $(this).attr('which')
	change_cart(sid,w)
})

function change_cart(sid,w) {
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/change_cart.php",
        data : {
			sid:sid,
			w:w
				},
		success: function(r) {
						
			koszyk();
			
		return false;					   
        }
	})		
}

/************************************************************************************************** PLUS MINUS ***/

$('body').on('input','.cart_prod_count', function() {
	
	var cart = $(this).siblings().attr('cart');
	var sid = $(this).siblings().attr('sid');
	var nc = $(this).val();
			
	change_prices(cart,sid,nc);	
	
})

$('body').on('click','.cart_minus, .cart_plus', function() {
	
	var pm = $(this).attr('pm');
	
	if (pm == 'down') {
		var now = parseInt($(this).siblings(".cart_prod_count").val());
		var new_ = now-1;
		if (now >= 1) {
			$(this).siblings(".cart_prod_count").val(new_);
		}
	}
	
	if (pm == 'up') {
		var now = parseInt($(this).siblings(".cart_prod_count").val());
		var new_ = now+1;
		if (now >=0) {
			$(this).siblings(".cart_prod_count").val(new_);
		}
	}
	
	var cart = $(this).attr('cart');
	var sid = $(this).attr('sid');
	var nc = $(this).siblings(".cart_prod_count").val();
		
	change_prices(cart,sid,nc);	
})

function change_prices(cart,sid,nc) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/change_cart_count.php",
        data : {
			cart:cart,
			sid:sid,
			nc:nc
				},
		success: function(r) {
			
			koszyk();
			/*
			var json = JSON.parse(r)
			if (div['pln']) {$(div['pln']).html(json['pln'])}
			if (div['zln_pln']) {$(div['zln_pln']).html(json['zln_pln'])}
			if (div['zln_zln']) {$(div['zln_zln']).html(json['zln_zln'])}
			*/
			
		return false;					   
        }
	})	
	
}

/************************************************************************************ KASUJ PRODUKTY Z KOSZYKA ***/
$('body').on('mouseenter','.cart_img_w', function() {
	var hover = $(this).find(".cart_img_hov");
	hover.css('display','flex');
});

$('body').on('mouseleave','.cart_img_w', function() {
	var hover = $(this).find(".cart_img_hov");
	hover.css('display','none');
});

$('body').on('click','.cart_img_hov', function() {
	var cart = $(this).attr('cart');
	var sid = $(this).attr('sid');
	del_cart_product(cart,sid);
})

function del_cart_product(cart,sid) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/del_cart_prod.php",
        data : {
			cart:cart,
			sid:sid
				},
		success: function(r) {
			
			koszyk();
			
		return false;					   
        }
	})		
	
}

/************************************************************************************************ KASUJ KOSZYK ***/

$('body').on('click','.delete_cart', function() {
	var w = $(this).attr('w');
	del_cart(w);
})

function del_cart(w) {
	
		jQuery.ajax({
        type : "POST",
        url : index+"/functions/del_cart.php",
        data : {
			w:w
				},
		success: function(r) {
			
			koszyk();
			
		return false;					   
        }
	})		
} 
/***********************/
})