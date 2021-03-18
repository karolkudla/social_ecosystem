function get_banners(e) {
	
	var cat = e.attr("f");

	jQuery.ajax({
		type : "POST",
		url : index+"/functions/banners/get_banners.php",
		data : {
			cat:cat
		},
		success: function(r) {

			var json = JSON.parse(r)
			/* pl */
			
			if (json['pl'] !== null) {
				$(".pl-banner").html('<div id="pl-lightSlider"></div>')
				$.each(json['pl'], function(k,v) {
					var display = '<div class="lslide"><a href="'+v['url']+'"><img src="'+v['img']+'"/></a></div>'
					$("#pl-lightSlider").append(display)
				})
				
				var pl_slider = $('#pl-lightSlider').lightSlider({
					item:1,
					loop:true,
					auto:true,
					speed:2000,
					pause:4000,
					slideMargin: 0,
					controls: false,
					enableTouch:false,
					enableDrag:false,
					freeMove:false
				});
			} else {
				$(".pl-banner").html('<img src="'+index+'/static/img/pomoc/500n.jpg">')
			}
			
			/* woj */
			
			if (json['woj'] !== null) {
				$(".woj-banner").html('<div id="woj-lightSlider"></div>')
				$.each(json['woj'], function(k,v) {
					var display = '<div class="lslide"><a href="'+v['url']+'"><img class="simple_offers_left_banner_desktop" src="'+v['img']+'"/></a></div>'
					$("#woj-lightSlider").append(display)
				})
				
				var woj_slider = $('#woj-lightSlider').lightSlider({
					item:1,
					loop:true,
					auto:true,
					speed:2000,
					pause:4000,
					slideMargin: 0,
					controls: false,
					enableTouch:false,
					enableDrag:false,
					freeMove:false
				});
				
			} else {
				$(".woj-banner").html('<a href="https://bytom.com.pl"><img src="'+index+'/static/img/wojpowgmi/1.jpg"></a>')
			}
			/* pow */
			
			if (json['pow'] !== null) {
				$(".pow-banner").html('<div id="pow-lightSlider"></div>')
				$.each(json['pow'], function(k,v) {
					var display = '<div class="lslide"><a href="'+v['url']+'"><img class="simple_offers_left_banner_desktop" src="'+v['img']+'"/></a></div>'
					$("#pow-lightSlider").append(display)
				})
				
				var pow_slider = $('#pow-lightSlider').lightSlider({
					item:1,
					loop:true,
					auto:true,
					speed:2000,
					pause:4000,
					slideMargin: 0,
					controls: false,
					enableTouch:false,
					enableDrag:false,
					freeMove:false
				});
				
			} else {
				$(".pow-banner").html('<a href="https://vistula.pl"><img src="'+index+'/static/img/wojpowgmi/2.jpg"></a>')
			}
			
			/* gmi */
			
			if (json['gmi'] !== null) {
				$(".gmi-banner").html('<div id="gmi-lightSlider"></div>')
				$.each(json['gmi'], function(k,v) {
					var display = '<div class="lslide"><a href="'+v['url']+'"><img class="simple_offers_left_banner_desktop" src="'+v['img']+'"/></a></div>'
					$("#gmi-lightSlider").append(display)
				})
				
				var gmi_slider = $('#gmi-lightSlider').lightSlider({
					item:1,
					loop:true,
					auto:true,
					speed:2000,
					pause:4000,
					slideMargin: 0,
					controls: false,
					enableTouch:false,
					enableDrag:false,
					freeMove:false
				});
				
			} else {
				$(".gmi-banner").html('<a href="https://wolczanka.pl"><img src="'+index+'/static/img/wojpowgmi/3.png"></a>')
			}
			
			$(".lSPager").css("margin-top","-35px")

			return false;					   
		}
	})	
	
}