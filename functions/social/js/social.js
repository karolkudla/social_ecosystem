$(document).ready(function() {
		
	/* Zmień grupę postów */
	$('body').on('click','.menu_top_social', function() {
		var g = $(this).attr('wall');		
		select_group('0','0',g);
	})	
	
	if (screen_size() == 'm') {
				
		$('body').on('click', '.open_post_textarea, .post_add_photos, .post_textarea_container', function(e) {
			e.stopPropagation();

					$('.post_textarea_container').css('display','flex');
					$('.open_post_textarea').addClass('send')
					$('.open_post_textarea span').text('Wyślij')

	
	
		})
		
		$('body').click(function() {
			$('.post_textarea_container').hide();
			$('.open_post_textarea').removeClass('send')
			$('.open_post_textarea span').text('Napisz post')
		});
		
	}
	  	
	$('body').on('click','.send', function() {
		var w = $(this).attr('w');	
		send_post(w);
	})
	
	$('body').on('change','#post_images_btn', function() {
		add_post_images();
	})
	
	$('body').on('click','.kom_comments', function() {		
		expand = $(this).siblings('.kom_comments_expanded')
		expand.fadeIn();	
		var post_id = $(this).closest('.kom_post').attr('post_id');
		show_comments(post_id,expand);
	})
	
	$('body').on('keypress', '.kom_add_comment_input', function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if (keycode == '13'){
			
			var post_id = $(this).closest('.kom_post').attr('post_id');
			var text = $(this).val();
			var comments_list = $(this).parent().siblings('.kom_comments_list');
			var input = $(this)

			add_comment(post_id,text,comments_list,input);
					
			}
	});
	
	$('body').on('click', '.fade_active', function() {
		$(this).css('max-height','100%');
		$(this).children('span').hide();	
		$(this).addClass('fade_inactive').removeClass('fade_active')
	})

	$('body').on('click', '.fade_inactive', function() {
		$(this).css('max-height','3.9em');
		$(this).children('span').show();
		$(this).addClass('fade_active').removeClass('fade_inactive')
	})
	
	$('body').on('click', '.social_one_contact > img, .social_one_contact > span', function() {
		open_profile();
	})
	
	$("body").on('mouseenter','.show_mini_profile', function() {

		myStopFunction();
		show_mini_profile(	  $(this)	 )
	
	}).on('mouseleave','.show_mini_profile', function() {
		
		myStopFunction();
		setTimeout(function() {
			
			var mini = $('.social_one_contact--mini:hover');
			if (mini.length == 0) {
				$('.social_one_contact--mini').remove();
			}
			
		},200)
			
	})

/* Historia i URL Ajax dla grup */

window.addEventListener('popstate', function(event) {	

	if (event.state !== null) {
		
		var action = event.state["action"];	
		var g = event.state["group"];	
		
		if (action == "social_group") {	
			open_social(g)
		}	
		
		if (action == "profile") {	
			open_profile();
		}	
		
	}
	
})

	var path = window.location.href;
	if(path.indexOf("spolecznosc/otwarta") !== -1) {
		open_social("");
	}
	
	if(path.indexOf("spolecznosc/regio") !== -1) {
		open_social("regio");
	}
	
	if(path.indexOf("spolecznosc/advert") !== -1) {
		open_social("advert");
	}
	
	if(path.indexOf("spolecznosc/friends") !== -1) {
		open_social("friends");
	}
	
	if(path.indexOf("spolecznosc/biznes") !== -1) {
		open_social("biznes");
	}

})

var myVar;

function show_mini_profile(t) {
	
	myVar = setTimeout(function() {
			if ( 	t.children('.social_one_contact--mini').length == 0		) {
				
					$('.social_one_contact--mini').remove();
					t.append('<div class="social_one_contact--mini"></div>')
					t.children('.social_one_contact--mini').load(index+'/functions/social/user_profile_mini.php')	
					
			}
	},700)
		
}

function myStopFunction() {
  clearTimeout(myVar);
}

function lazy_loading_social() {

		$(window).on("scroll", function() {
		var scrollHeight = $(document).height();
		var scrollPosition = $(window).height() + $(window).scrollTop();
		if (scrollPosition > (scrollHeight - 100)) {
			
			if ($('.no_more_posts').length == 0) {
			
				var posts_len = $('.kom_post').length
				var group = $('.send').attr('w');
				select_group('1',posts_len,group)
				
				$(window).unbind();
				
				// Call the function after 5 second delay
				setTimeout(function() {
					lazy_loading_social()

				}, 1000);
				
			}
		}
	});
		
}

function select_group(load_new,skip,group) {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/social/social_choose_group.php",
        data : {
			g:group,
			skip:skip,
			device: screen_size()
				},
		success: function(r) {
					
			if (load_new == '0') {
				
				$('.users_posts').html(r);
				$('.open_post_textarea, .send').attr('w',group);

			} else {
					
				$('.users_posts').append(r);
				
			}

			var stan = {
				action: 'social_group',
				group: group
				};
			
			if (history.state) {
				var haction = history.state.action;	
				var hgroup = history.state.group;
			}

			if (hgroup != stan.group) {	
				if (group == '') {group = 'otwarta'}
				history.pushState(stan, "", "/spolecznosc/"+group);
			}
			
			$(".kom_gallery_slick").not('.slick-initialized').slick({
				lazyLoad: 'ondemand',
				slidesToShow: 1,
				slidesToScroll: 1
			});
			
			
			$.get(index+'/functions/social/generate_new_mongo_id.php', function(data) {
				$('.post_add').attr('post_id',data)
			});
			
			
		return false;					   
        }
	})			
}

function send_post(w) {

	console.log("Send Post")

	var text = $('.post_add').val();	
	var new_id = $('.post_add').attr('post_id');
	
	if ( 	$('.post_mini_gallery img').length > 0		) {
		var imgs = $('.post_mini_gallery').sortable('toArray');
	} else {
		var imgs = [];
	}

	if ( text.length > 4 || $('.post_mini_gallery img').length > 0 ) {

	jQuery.ajax({
        type : "POST",
        url : index+"/functions/social/add_post.php",
        data : {
			w			:	w,
			text		:	text,			
			imgs		:	imgs,
			new_id		:	new_id
				},
		success: function(post_data) {
			
			$('.post_add').val('');
					
			$('.post_mini_gallery img').each(function(k,v) {
				$(v).remove();
			})

			console.log(post_data);

			var data = JSON.parse(post_data);
			show_new_post(data);
				
			/* Wygeneruj nowe Id dla posta, żeby nie korzystać ze starego Id które już zostało właśnie wykorzystane */
			$.get(index+'/functions/social/generate_new_mongo_id.php', function(post_id) {
				$('.post_add').attr('post_id',post_id)
			});
		
			if (screen_size() == 'm') {
				if (confirm('Czy chcesz zobaczyć swój post ?')) {
					$("html, body").animate({ scrollTop: "0" });
				} else {
				
				}
			}
		
			return false;					   
        }
	})		
	} else {
		alert('Post musi mieć minimum 5 znaków.')
	}
}

function open_profile() {
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/social/user_profile.php",
        data : {
			/* id usera */
				},
		success: function(r) {
			
			$('.social_left_panel').hide();
			$('.social_container').css({'width':'80%','display':'flex','justify-content':'center'})
			$('.social_container').html(r)
			$('.user_profile').css('width','75%')
			
			var stan = {
				action: 'profile'
				/* kogo profil */
				};
			
				if (history.state) {
					var haction = history.state.action;	
				}

				if (haction != stan.action) {	
					history.pushState(stan, "", "/profil/jankowalski/");
				}
			
			
			/* jeżeli wchodzę z urla to ładuj kontakty */
			/* jeżeli wchodzę przez kliknięcie to ładuj tylko profil */
			
		return false;					   
        }
	})		
	
}

function show_new_post(data) {

	jQuery.ajax({
        type : "POST",
        url : index+"/functions/social/layouts/post.php",
        data : {
			ajax:'ajax',
			data:data
				},
		success: function(r) {
			
			if (screen_size() == 'd') {
				$('.users_posts--left_col').prepend(r);
			} else {
				$('.users_posts').prepend(r);
			}
			
			$(".kom_gallery_slick").not('.slick-initialized').slick({
				lazyLoad: 'ondemand',
				slidesToShow: 1,
				slidesToScroll: 1
			});
			
		return false;					   
        }
	})		
}

function add_post_images() {
		
	$.when(permission(0)).done(function(v) {
	if (v['status'] == 'ok') {
		
		var send = $('.desktop_social_send, .open_post_textarea')
		var send_items = $('.desktop_social_send *, .open_post_textarea *')
		send_items.hide();
		send.append('<img src="'+index+'/static/img/social/icons/Rolling-1s-200px.svg">')
		send.removeClass('send')
			
		var folder = $('.post_add').attr('post_id');		
        $('#post_images').ajaxForm({           

			data :{
				folder:folder
			},
            success: function(r){	
				
				if (r !== 'nofile') {
					var json = JSON.parse(r);
					$.each(json[1], function(k,v) {
						$('.post_mini_gallery').append('<img src="'+index+users_uploads+json[0]+user_social_post_gallery+folder+'/mini-'+v+'" id="'+v+'">')
					})
					
					$('.post_mini_gallery').sortable();
				} 
				
				$(send).find('img').remove();
				send_items.show();
				send.addClass('send')
				
            },
            error:function(r){
				console.log("error");
            }
        }).submit();
		
	} else {
		alert("Zaloguj się.")
	}
	});		
	
}

function show_comments(post_id,space) {

	var logo = $('.top_avatar img').attr('src');

	jQuery.ajax({
        type : "POST",
        url : index+"/functions/social/layouts/comments.php",
        data : {
			post_id:post_id,
			logo:logo
				},
		success: function(r) {
			
			space.html(r);
			
			setTimeout(function() {
				var list = space.find('.kom_comments_list')
				var height = list[0].scrollHeight;
				list.animate({scrollTop:height}, '500');
			},300)
			
		return false;					   
        }
	})		
	
}

function add_comment(post_id,text,comments_list,input) {
	
	var user_avatar_link = $('.top_avatar img').attr('src').split('/');	
	var user_avatar = user_avatar_link[5];
	var user_login = user_avatar_link[4];
	var user_name = $('.sub_top--right--user_name').text();
	
	jQuery.ajax({
        type : "POST",
        url : index+"/functions/social/add_comment.php",
        data : {
			post_id : post_id,
			text : text,
			user_avatar:user_avatar,
			user_name:user_name,
			user_login:user_login
				},
		success: function(r) {
						
			var no_comments = comments_list.find('.no_comments')
			if (no_comments.length == 1) {
				no_comments.fadeOut();
			}
			
			input.val('')
			
			setTimeout(function() {
				var height = comments_list[0].scrollHeight;
				comments_list.animate({scrollTop:height}, '500');
			},200)
			
			comments_list.append('<div class="kom_one_comment"> 			<div class="kom_logo"><img src="'+index+'/static/img/av.png"></div> 			<div class="kom_one_comment--text"> 				<div>'+user_name+'</div> 				<div>'+text+'</div> 			</div> 		</div>')
			
		return false;					   
        }
	})		
	
}

/*
 * jQuery autoResize (textarea auto-resizer)
 * @copyright James Padolsey http://james.padolsey.com
 * @version 1.04
 */

(function($){
    
    $.fn.autoResize = function(options) {
        
        // Just some abstracted details,
        // to make plugin users happy:
        var settings = $.extend({
            onResize : function(){},
            animate : true,
            animateDuration : 150,
            animateCallback : function(){},
            extraSpace : 20,
            limit: 1000
        }, options);
        
        // Only textarea's auto-resize:
        this.filter('textarea').each(function(){
            
                // Get rid of scrollbars and disable WebKit resizing:
            var textarea = $(this).css({resize:'none','overflow-y':'hidden'}),
            
                // Cache original height, for use later:
                origHeight = textarea.height(),
                
                // Need clone of textarea, hidden off screen:
                clone = (function(){
                    
                    // Properties which may effect space taken up by chracters:
                    var props = ['height','width','lineHeight','textDecoration','letterSpacing'],
                        propOb = {};
                        
                    // Create object of styles to apply:
                    $.each(props, function(i, prop){
                        propOb[prop] = textarea.css(prop);
                    });
                    
                    // Clone the actual textarea removing unique properties
                    // and insert before original textarea:
                    return textarea.clone().removeAttr('id').removeAttr('name').css({
                        position: 'absolute',
                        top: 0,
                        left: -9999
                    }).css(propOb).attr('tabIndex','-1').insertBefore(textarea);
					
                })(),
                lastScrollTop = null,
                updateSize = function() {
					
                    // Prepare the clone:
                    clone.height(0).val($(this).val()).scrollTop(10000);
					
                    // Find the height of text:
                    var scrollTop = Math.max(clone.scrollTop(), origHeight) + settings.extraSpace,
                        toChange = $(this).add(clone);
						
                    // Don't do anything if scrollTip hasen't changed:
                    if (lastScrollTop === scrollTop) { return; }
                    lastScrollTop = scrollTop;
					
                    // Check for limit:
                    if ( scrollTop >= settings.limit ) {
                        $(this).css('overflow-y','');
                        return;
                    }
                    // Fire off callback:
                    settings.onResize.call(this);
					
                    // Either animate or directly apply height:
                    settings.animate && textarea.css('display') === 'block' ?
                        toChange.stop().animate({height:scrollTop}, settings.animateDuration, settings.animateCallback)
                        : toChange.height(scrollTop);
                };
            
            // Bind namespaced handlers to appropriate events:
            textarea
                .unbind('.dynSiz')
                .bind('keyup.dynSiz', updateSize)
                .bind('keydown.dynSiz', updateSize)
                .bind('change.dynSiz', updateSize);
            
        });
        
        // Chain:
        return this;
        
    };
    
    
    
})(jQuery);