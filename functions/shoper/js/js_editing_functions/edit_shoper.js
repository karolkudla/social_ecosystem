$( document ).ready(function() {

	$('body').on('click','.my_shop_edit', function() {
			create_edit_user();
	})

})

function create_edit_user() {
	
	$.ajax({ type: "GET",   
			url: index+"/functions/shoper/php_editing_functions/edit_user.php",   
			success : function(answer)
			{
				$("#modal").html(answer)
				$(".loading").css("display","flex");
				
				/* rekurencja wait */
				setTimeout(function() {
					get_user_data();
				},500)
				
			}
			})
		
		$("#modal_overlay").show();
	
}

/*************************************************************************************** MENU POSITION ***/

function save_sortable() {

	var whole = [];
	
	$('.create_menu').each(function(k,v) {
		var name = $(v).find('.menu_name').val();
		var subs = $(v).find('.menu_subname');
		
			var subsn = [];
			var one = {};
		
			$.each(subs,function(ke,ve) {
				subsn.push($(ve).val())
			})
			
			one = {'name':name,'subs':subsn}
			
		whole.push(one)
	})
	
	return whole;

}

/******************************************************************************************** FROM DB TO MODAL ***/

function get_user_data() {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/php_editing_functions/get_user_data.php",
		success: function(r) {
			
			console.log()
			
			var json = JSON.parse(r)
			console.log(json)
			
			if (json['logo']) {
				$(".add_logo_text").remove();
				$(".logo_img_wrapper").css({'background':'url("'+index+users_uploads+json['uid']+user_shoper_avatar+"mini-"+json['logo']+'")','background-size':'cover'});
			}
			
			if (json['nazwa']) {
				$("#logo_text").val(json['nazwa'])
			}
			
			if (json['slogan']) {
				$("#slogan_text").val(json['slogan'])
			}
			
			if (json['background']) {
				$(".add_big_logo_text").remove();
				$(".shoper_editor_banner_img_wrapper").css({'background':'url("'+index+users_uploads+json['uid']+user_shoper_bckg+"big-"+json['background']+'")','background-size':'cover','background-position':'center'});
			}
			
			if (json['gallery']) {
				create_user_gallery(json['uid'],json['gallery'])
			}
			
			if (json['wiz_youtube']) {
				create_wiz_yt(json['wiz_youtube'])
			}
			
			if (json['desc']) {
				$(".desc").val(json['desc'])
			}
			
			if (json['contact']) {
				$.each(json['contact'],function(k,v) {
					$("#"+k+"").val(v);
				})
			}
			
			if (json['menu']) {
				$('.menu_wrapper').html('');
				
				$.each(json['menu'], function(k,v) {
					
					var menu = '\
					<div class="create_menu">\
							<div class="del_menu_wrapper">\
								<span class="icon-cross del_menu"></span> Usuń menu wraz ze wszystkimi podmenu\
							</div>\
							<div class="create_menu_col_1">\
								<div class="menu_grid">\
									<label class="inp">\
										<input class="menu_name" placeholder="&nbsp;" value="'+v['name']+'">\
										<span class="label">Nazwa menu</span>\
										<span class="border"></span>\
									</label>\
								</div>\
							</div>\
							<div class="create_menu_col_2">\
								<div class="create_menu_img">\
									<div class="create_menu_img--info">Dodaj banner menu</div>\
									<form method="post" name="menu_img" class="menu_img" enctype="multipart/form-data" action="'+index+'/functions/shoper/php_editing_functions/up_menu_img.php">\
										<input type="file" name="menu_img[]" class="menu_img_btn"/>\
									</form>\
								</div>\
							</div>\
							<div class="create_menu_col_3">\
								<textarea class="shoper_editor_menu_desc"></textarea>\
							</div>\
							<div class="menu_creator" id="'+k+'"></div>\
							<div class="add_submenu">\
								<span class="icon-plus" style="font-size: 10px;"></span>\
								&nbsp Dodaj submenu\
							</div>\
						</div>\
					'
					
					$('.menu_wrapper').append(menu)
					
					$.each(v['subs'], function(ke,ve) {
						
						var submenu = '\
						<div class="created_submenu">\
							<span class="icon-cross del_submenu"></span>\
							<div class="create_menu_col_1">\
								<div class="menu_grid">\
									<label class="inp">\
										<input class="menu_subname" placeholder="&nbsp;" value="'+ve+'">\
										<span class="label">Nazwa podmenu</span>\
										<span class="border"></span>\
									</label>\
								</div>\
							</div>\
							<div class="create_menu_col_2">\
								<div class="create_menu_img">\
									<div class="create_menu_img--info">Dodaj banner menu</div>\
									<form method="post" name="menu_img" class="menu_img" enctype="multipart/form-data" action="'+index+'/functions/shoper/php_editing_functions/up_menu_img.php">\
										<input type="file" name="menu_img[]" class="menu_img_btn"/>\
									</form>\
								</div>\
							</div>\
							<div class="create_menu_col_3">\
								<textarea class="shoper_editor_menu_desc"></textarea>\
							</div>\
						</div>\
						'
						
						$(".menu_creator[id='"+k+"']").append(submenu)
					})
				})
				
				$('.menu_wrapper').sortable();
				$('.menu_creator').sortable();
				
			}
			
			if (json['menu_images']) {
				
				$('.create_menu_img').each(function(k,v) {
					if (  json['menu_images'][k] !== ''  &&  json['menu_images'][k] !== undefined  ) {
						$(v).css({'background':'url('+index+users_uploads+json['uid']+user_shoper_menu+json['menu_images'][k]+')','background-size':'cover','background-position': 'center'})
						$(v).attr('img',json['menu_images'][k])
						$(v).children('.create_menu_img--info').remove()
					}
				})
				
				/* odrazu opisy dodaj */
				
				$('.shoper_editor_menu_desc').each(function(k,v) {
					$(v).val(json['menu_desc'][k])
				})
				
			}
			
			$(".loading").css("display","none");
			
		return false;					   
        }
	})	
}

function create_user_gallery(url,imgs) {
	
	$.each(imgs, function(k,v) {
		$(".wiz_imgs_edit_panel").append("<div class='imgs_thumb' id='"+v+"'><img class='imgs_thumb_img' src='"+index+users_uploads+url+user_shoper_gallery+"mini-"+v+"'></div>")
	})
	
	$(".wiz_imgs_edit_panel").sortable();
	
	$(".imgs_thumb").each(function() {
		$(this).append("<div class='delete_wiz_img'><span class='icon-cross'></span></div>");
	})
	
}

function create_wiz_yt(yt) {
	
	$.each(yt, function(k,v) {	
		$(".youtube_edit_wrapper").append('<div class="youtube_edit_iframe" id="'+v+'"><iframe src="https://www.youtube.com/embed/'+v+'?loop=1&modestbranding=1" width=280 height=190 frameborder=0 allowfullscreen srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/'+v+'?autoplay=1><img src=https://img.youtube.com/vi/'+v+'/hqdefault.jpg><span>▶</span></a>" frameborder=0 allowfullscreen width="300" height="200" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe></div>')		
	})
	
	$('.youtube_edit_iframe').each(function() {
			$(this).append('<div class="delete_youtube"><span class="icon-cross"></span></div>')
			$(this).append('<div class="drag_drop"><span class="icon-drag_indicator"></span></div>')
	})	
		
	$(".youtube_edit_wrapper").sortable();
	
}

/************************************************************************** FROM MODAL TO DB ***/

$( document ).ready(function() {
	
	$('body').on('change','#wiz_imgs_up_button', function() {
		add_wiz_images();
	})
	
	$('body').on('click','#add_new_wiz_youtube_input', function() {
		$("#add_new_wiz_youtube_input").attr("placeholder","")		
	})

	$('body').on('click','#save_one_wiz_yt', function() {
		var new_link = $("#add_new_wiz_youtube_input").val();	
		save_one_wiz_yt(new_link);
	})

	$('body').on('click','.delete_wiz_youtube', function() {
		var link = $(this).prev("iframe").attr("src");	
		if (confirm('Czy napewno chcesz usunąć ten film ?')) {
				del_wiz_youtube(link);
				$(this).parent().remove();	
			} 	
	})
	
	$('body').on('change','#logo_img_btn', function() {
		edit_logo();
	})
	
	$('body').on('change','#big_logo_img_btn', function() {
		edit_big_logo();
	})
	
	$('body').on('click','.delete_wiz_img', function() {
		var src = $(this).prev().attr("src");
		var div = $(this).parent().attr("id");

			if (confirm('Czy napewno chcesz usunąć to zdjęcie ?')) {
				del_wiz_photos(src,div); 
			}
	})
	
		$('body').on('change','.menu_img_btn', function() {
		var this_window = $(this).parent()
		add_menu_images(this_window);
	})
	
	
	
	$('body').on('click', '.add_menu', function() {

		var append = '\
			<div class="create_menu">\
					<div class="del_menu_wrapper">\
						<span class="icon-cross del_menu"></span> Usuń menu wraz ze wszystkimi podmenu\
					</div>\
					<div class="create_menu_col_1">\
						<div class="menu_grid">\
							<label class="inp">\
								<input class="menu_name" placeholder="&nbsp;">\
								<span class="label">Nazwa menu</span>\
								<span class="border"></span>\
							</label>\
						</div>\
					</div>\
					<div class="create_menu_col_2">\
						<div class="create_menu_img">\
							<div class="create_menu_img--info">Dodaj banner menu</div>\
							<form method="post" name="menu_img" class="menu_img" enctype="multipart/form-data" action="'+index+'/functions/shoper/php_editing_functions/up_menu_img.php">\
								<input type="file" name="menu_img[]" class="menu_img_btn"/>\
							</form>\
						</div>\
					</div>\
					<div class="create_menu_col_3">\
						<textarea class="shoper_editor_menu_desc" placeholder="Opis"></textarea>\
					</div>\
					<div class="menu_creator"></div>\
					<div class="add_submenu">\
						<span class="icon-plus" style="font-size: 10px;"></span>\
						&nbsp Dodaj submenu\
					</div>\
				</div>\
		'
		
		$('.menu_wrapper').append(append)
		$('.menu_wrapper').sortable();
	})

	$('body').on('click', '.add_submenu', function() {

		var append = '\
		<div class="created_submenu">\
			<span class="icon-cross del_submenu"></span>\
			<div class="create_menu_col_1">\
				<div class="menu_grid">\
					<label class="inp">\
						<input class="menu_subname" placeholder="&nbsp;">\
						<span class="label">Nazwa podmenu</span>\
						<span class="border"></span>\
					</label>\
				</div>\
			</div>\
			<div class="create_menu_col_2">\
				<div class="create_menu_img">\
					<div class="create_menu_img--info">Dodaj banner menu</div>\
					<form method="post" name="menu_img" class="menu_img" enctype="multipart/form-data" action="'+index+'/functions/shoper/php_editing_functions/up_menu_img.php">\
						<input type="file" name="menu_img[]" class="menu_img_btn"/>\
					</form>\
				</div>\
			</div>\
			<div class="create_menu_col_3">\
				<textarea class="shoper_editor_menu_desc" placeholder="Opis"></textarea>\
			</div>\
		</div>\
		'
		
		$(this).siblings('.menu_creator').append(append)
		$('.menu_creator').sortable();
	})
	
	$('body').on('click', '.del_submenu', function() {
		$(this).parent().remove();
		/* kasuj też obrazek */
	})
	
	$('body').on('click', '.del_menu', function() {
		$(this).closest('.create_menu').remove();
		/* kasuj też obrazek */
	})

	
	$("body").on('click', '.accept_wiz_editor', function() {
		accept_wiz_editor();
	})
	
})

function edit_logo() {	

		console.log("Edit Logo")

        $('#logo_img').ajaxForm({
			success: function(r) {

				console.log(r)

				$(".add_logo_text").remove();
				$(".logo_img_wrapper").css('background','url("'+r+'")');

			},
            error:function(r){
				console.log("error");
            }
        }).submit();
}

function edit_big_logo() {	

        $('#big_logo_img').ajaxForm({
			success: function(r) {
				
				console.log(r)
				
				$(".add_big_logo_text").remove();
				$(".shoper_editor_banner_img_wrapper").css({'background':'url("'+r+'")','background-size':'cover','background-position':'center'});
							
			},
            error:function(r){
				console.log("error");
            }
        }).submit();
}


function add_wiz_images() {
			
        $('#wiz_imgs_up').ajaxForm({           
            success: function(r){			
				
				console.log(r);
				var json = JSON.parse(r);
				
				$('.imgs_thumb').each(function(){
					$(this).remove();
				})
				
				console.log(json)
				
				create_user_gallery(json[0],json[1]);
				
            },
            error:function(r){
				console.log("error");
            }
        }).submit();
}


function del_wiz_photos(src,div) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/php_editing_functions/del_wiz_images.php",
		data : {
			src : src
		},
		success : function(r) {
				
			$(".imgs_thumb[id='"+div+"']").remove();
			console.log(r);
			
		}
	})
}	


function save_one_wiz_yt(new_link) {

if (new_link.includes("youtu") && new_link.includes(".com") && new_link !== '') {
	
	function YouTubeGetID(new_link){		
			url = new_link.split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
			return (url[2] !== undefined) ? url[2].split(/[^0-9a-z_\-]/i)[0] : url[0];
	}
		
	var parsed_yt = YouTubeGetID(new_link);		
					
	$("#add_new_wiz_youtube_input").val("");	
	$(".youtube_edit_wrapper").prepend('<div class="youtube_edit_iframe" id="'+parsed_yt+'"><iframe src="https://www.youtube.com/embed/'+parsed_yt+'?loop=1&modestbranding=1" frameborder=0 width=256 height=144  allowfullscreen srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/'+parsed_yt+'?autoplay=1><img src=https://img.youtube.com/vi/'+parsed_yt+'/hqdefault.jpg><span>▶</span></a>" frameborder=0 allowfullscreen width="256" height="144" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe></div>')
	$(".delete_wiz_youtube").remove();
	$('.youtube_edit_iframe').each(function() {
		$(this).append('<div class="delete_wiz_youtube"><span class="icon-cross"></span></div>')
		$(this).append('<div class="drag_drop"><span class="icon-drag_indicator"></span></div>')
	})

	$('.youtube_edit_wrapper').sortable();

}	else  {	 
			$(".add_new_wiz_youtube").css("background","#f44336")
			$("#add_new_wiz_youtube_input").val("");
			$("#add_new_wiz_youtube_input").attr("placeholder","To nie jest link youtube!")		
	}
}

function del_wiz_youtube(link) {

	function YouTubeGetID(link){		
			url = link.split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
			return (url[2] !== undefined) ? url[2].split(/[^0-9a-z_\-]/i)[0] : url[0];
	}
	
	var del = YouTubeGetID(link);

	jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/php_editing_functions/del_wiz_youtube.php",
		data : {
			del : del
		}
	})	
	
}

function add_menu_images(this_window) {	

		this_window.ajaxForm({
			success: function(r) {

				console.log(r)
				var json = JSON.parse(r)
				
				this_window.parent().css({'background':'url("'+json[0]+'")','background-size':'cover','background-position':'center'})
				this_window.parent().attr('img',json[1])
				this_window.siblings('.create_menu_img--info').remove();
				
			},
            error:function(r){
				console.log("error");
            }
        }).submit();
	}

function save_menu_images() {
	
	var imgs = [];
	$('.create_menu_img').each( function(k,v) {
		imgs.push(	  $(v).attr('img')	  )
	})
	
	return imgs;
	
}

function save_menu_desc() {
	
	var descs = [];
	$('.shoper_editor_menu_desc').each( function(k,v) {
		descs.push(	    $(v).val()	   )
	})
	
	return descs;
}

function accept_wiz_editor() {
				
		if (	$(".youtube_edit_iframe").length > 0	   ) {
			var youtube = $(".youtube_edit_wrapper").sortable('toArray')
		} else {
			var youtube = '';
		}
		
		if (	$(".imgs_thumb_img").length > 0	   ) {
			var images = $(".wiz_imgs_edit_panel").sortable('toArray')
		} else {
			var images = '';
		}
		
		var contact = {};
		$(".contact_data").each(function() {
			var cd = $(this).val();
			var label = $(this).attr("id");			
			contact[label] = cd
		})
				
		jQuery.ajax({
        type : "POST",
        url : index+"/functions/shoper/php_editing_functions/save_user_data.php",
        data : {
			logo_text : $('#logo_text').val(),
			slogan : $('#slogan_text').val(),
			images : images,
			youtube : youtube,
			desc : $('.desc_1').val(),
			contact : contact,
			menu : save_sortable(),
			menu_images : save_menu_images(),
			menu_desc : save_menu_desc()
				},
		success: function(r) {
			
			console.log(r)
			
			alert("Zmiany zostały zapisane")
		
		/* url z modala 
		$.when(		 open_shoper(shoper_id)		).done(function() {
			 open_shoper_index(shoper_id)
		});	
		*/
		
		return false;					   
        }
	})	
}

