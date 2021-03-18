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