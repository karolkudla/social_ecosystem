$( document ).ready(function() {
/******************************************************************************************* POKAŻ OBSERWOWANE ***/

$('body').on('click','#favourite_click', function() {
	
	$('#panel').css('width','35%');
	$("#panel").animate({
		width: 'toggle'
    });
	
	fav_window();
})

function fav_window() {
	
		jQuery.ajax({
        type : "POST",
        url : index+"/functions/fav_window.php",
        data : {
			
				},
		success: function(r) {
			
			$('#panel').html(r);
			
		return false;					   
        }
	})		
} 

/*************************************************************************************** DODAJ DO OBSERWOWANYCH ***/

$('body').on('click','.nofaved', function() {
	var p = $(this).attr("p");
	$(this).removeClass("nofaved").addClass("faved");
	$(this).find("span").removeClass("icon-star-empty").addClass("icon-star-full");
	add_to_fav(p);
})

$('body').on('click','.faved', function() {
	var p = $(this).attr("p");
	$(this).removeClass("faved").addClass("nofaved");
	$(this).find("span").removeClass("icon-star-full").addClass("icon-star-empty");
	del_from_fav(p);
})

function add_to_fav(p) {
		
		jQuery.ajax({
        type : "POST",
        url : index+"/functions/add_to_fav.php",
        data : {
			p : p
				},
		success: function(r) {
						
		return false;					   
        }
		})		
} 

/************************************************************************************ KASUJ PRODUKTY Z OBSERWOWANYCH ***/
$('body').on('mouseenter','.cart_img_fav_w', function() {
	var hover = $(this).find(".cart_img_fav_hov");
	hover.css('display','flex');
});

$('body').on('mouseleave','.cart_img_fav_w', function() {
	var hover = $(this).find(".cart_img_fav_hov");
	hover.css('display','none');
});

$('body').on('click','.cart_img_fav_hov', function() {
	var p = $(this).attr('p');
	del_from_fav(p);
})

function del_from_fav(p) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/del_from_fav.php",
        data : {
			p : p
				},
		success: function(r) {
			fav_window();			
		return false;					   
        }
		})		
	
}

function get_faved() {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/get_faved.php",
		success: function(r) {
			
			ids = JSON.parse(r);
			
			$.each(ids, function(k,v) {
				$(".nofaved").each(function() {
					if ($(this).attr("p") == v) {
						$(this).addClass("faved").removeClass("nofaved")
						$(this).find("span").removeClass("icon-star-empty").addClass("icon-star-full")
					}
				})
			})
			
			
			
		return false;					   
        }
	})		
	
}

})
