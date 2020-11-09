/*price range*/

 //$('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	var mypop = $(".pop-up"),
		bool = true;
	$(".sell-product .button a").click(function (e) {
		e.preventDefault();
		mypop.fadeIn(800);
	});


	$(".pop-up .data .margin").click(function () {
		mypop.fadeOut(800);
	});

	function validate(){

		$(".pop-up .data .row .form-one input").each(function () {
				if ($(this).val() === "") {
					$(this).next("span").fadeIn(600);
					$(this).next("span").text("Please Fill Out This Field");
					bool = false;
				}
			});

			if($(".pop-up .data .row .form-two textarea").val() === ""){
					$(this).next("span").fadeIn(600);
					$(this).next("span").text("Please Fill Out This Field");
					bool = false;
			}

			$(".pop-up .data .row .form-one input").keyup(function () {
				$(this).next("span").fadeOut(600);
				bool = true;
			});

			if (bool) {
				mypop.fadeOut(800);
				$(".pop-up .data .row .form-one input").each(function () {
					$(this).val("");
				});
			}
			return bool;
	}

	$('#addComment').click(function (e) {
		e.preventDefault();
		var comment = $('#commentBox').val(),
			productId = $('#commentBox').data('id');

		if(comment === "" ){
			$('#commentBox').next("span").text("Please enter a comment");
			return false
		}

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		jQuery.ajax({
			url:"/blog/product/addComment",
			data:{"id":productId,"comment":comment},
			type:"post",
			success:function(data){
				$(".media-list").append('<li class="media">'+
					'<a class="pull-left" href="#">'+
					'<img class="media-object" src="\'frontend/images/blog/man-four.jpg\'">'+
					'</a>'+
					'<div class="media-body">'+
					'<ul class="sinlge-post-meta">'+
				        '<li><i class="fa fa-user name"></i>'+data.user_name+'</li>'+
						'<li><i class="fa fa-clock-o time"></i>'+ data.created_at+'</li>'+
				     '</ul>'+
				     '<p class="commentBody">'+data.comment+'</p>'+
				    '</div>'+
				'</li>');
				$('#commentBox').val("");
			},
			error:function (){
				console.log('error');
			}
		});
	});

	$('#searchBox').keyup(function (event) {
		event.preventDefault();
		if(event.which == 13){
			$('#searchForm').submit();
		}
	});


});
