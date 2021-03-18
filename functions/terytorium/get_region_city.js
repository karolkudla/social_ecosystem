$( document ).ready(function() {
			
	$('body').on('change','.select_wojewodztwa', function() {		
		$('.select_miasta_gminy').html('<option kod="" rodz="">Miasto / Gmina</option>')
		get_terytorium(1,0)
	})	
	
	$('body').on('change','.select_powiaty', function() {		
		get_terytorium(0,1)
	})	
	
	$('body').on('change','.select_miasta_gminy', function() {
		var loc = $(this).val().split(',');
		$('.lokalizacja_mapa').html('<iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q='+loc[0]+';&amp;ie=UTF8&amp;t=k&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>')
	})	
})

function get_terytorium(get_powiaty,get_mg) {
	
	var woj_kod = $('.select_wojewodztwa option:selected').attr("kod")
	var pow_kod = $('.select_powiaty option:selected').attr("kod")
	
	if (woj_kod !== '00') {
		jQuery.ajax({
			type : "POST",
			url : index+"/functions/terytorium/data_from_province.php",
			data : {
				woj_kod:woj_kod,
				pow_kod:pow_kod,
				get_powiaty:get_powiaty,
				get_mg:get_mg
			},
			success: function(data) {
				
				var json = JSON.parse(data)

				if (get_powiaty == 1) {
					$('.select_powiaty').html("<option value='' kod=''>Miasto / Powiat</option>")
					
					$.each(json['miasta'], function(k,v) {
						$('.select_powiaty').append("<option kod='"+v['kod']+"'>"+v['nazwa']+"</option>")
					})
					
					$.each(json['powiaty'], function(k,v) {
						
						if (v['dopisek'][0] !== null) {var dop_0 = " - "+v['dopisek'][0]} else {dop_0 = ''}
						if (v['dopisek'][1] !== null) {var dop_1 = ", "+v['dopisek'][1]} else {dop_1 = ''}
						
						$('.select_powiaty').append("<option kod='"+v['kod']+"'>"+v['nazwa']+dop_0+dop_1+"</option>")
					})
				}
			
				if (get_mg == 1) {
					$('.select_miasta_gminy').html("<option value='' kod='' rodz=''>Miasto / Gmina</option>")
					$.each(json, function(k,v) {
						$('.select_miasta_gminy').append("<option kod='"+v['kod']+"' rodz='"+v['rodz']+"'>"+v['nazwa']+", "+v['dopisek']+"</option>")
					})
				}

				
			return false;					   
			}
		})	
	}
}