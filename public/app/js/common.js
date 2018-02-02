$(document).ready(function () {
	$(window).on('load', function () {
		var $preloader = $('#page-preloader'),
			$loading   = $preloader.find('.loading');
		$loading.delay(500).fadeOut();
		$preloader.delay(1000).fadeOut('slow');

	});
	$('body').mCustomScrollbar({
		theme:"minimal-dark",
		autoExpandScrollbar: true,
		autoHideScrollbar: true,
		mouseWheel:{ deltaFactor: "auto"},
		scrollInertia: "400",
		contentTouchScroll: 25,
		documentTouchScroll: true

	});
	var location = window.location.href;
	var cur_url =  location.split('/').pop();


	$('.menu .cool-link').each(function () {
		var link = $(this).find('a').attr('href');
		if (cur_url == link)
		{
			$(this).addClass('cool-link--active');
		}
	});

	$('.no-drag').each(function (){
		$(this).bind('dragstart', function(e) {
			if (window.event) event.preventDefault();
			e.cancelBubble = true; return false;
		});
	});

	$('.theme-color').attr('content',$('.theme-color').css('color'));

	// $('ul.navbar-nav').responsiveCollapse({
	// 	breakPoint: 767,
	// 	overflowItemText: '<i class="fa fa-bars"></i> More <b class="caret"></b>'
	// });

	$('#sliderRange').on('slideStop', function () {
		console.log(1);
		
	});

	$('ul.nav li.dropdown').hover(function () {
		$(this).addClass('open');
	}, function () {
		$(this).removeClass('open');
	});


	var max = 0;
	$(".steps__item-title").each(function () {
		if ($(this).height() > max)
			max = $(this).height();
	}).height(max);

	$('.slider-tick-label-container .slider-tick-label').eq(1).css({
		'position': 'absolute',
		'top': '-30px'
	});
	$('.slider-tick-label-container .slider-tick-label').eq(2).css({
		'position': 'absolute',
		'bottom': '-30px'
	});





	$('.calc-block__radio').zInput();


	$('.selectpicker').selectpicker();



	$(window).resize(function () {
		if ($(window).outerWidth() > 1000){
			$(".other-services__item:nth-child(4n)").find('.other-services-bg').removeClass('other-services-bg--odd').addClass('other-services-bg--even');
			$(".other-services__item:nth-child(4n+1)").find('.other-services-bg').removeClass('other-services-bg--odd').addClass('other-services-bg--even');
			$(".other-services__item:nth-child(4n+2)").find('.other-services-bg').removeClass('other-services-bg--even').addClass('other-services-bg--odd');
			$(".other-services__item:nth-child(4n+3)").find('.other-services-bg').removeClass('other-services-bg--even').addClass('other-services-bg--odd');
		}
		if ($(window).outerWidth() < 1000){
			$(".other-services__item:nth-child(odd)").find('.other-services-bg').removeClass('other-services-bg--odd').addClass('other-services-bg--even');
			$(".other-services__item:nth-child(even)").find('.other-services-bg').removeClass('other-services-bg--even').addClass('other-services-bg--odd');
		}

		if ($(window).outerWidth() < 768){
			var phone = $('.top-line__item .fa-phone').parent().text();
			var posComma = phone.indexOf(',');
			var newArray = phone.replace(phone[posComma],",<br/>");
			$('.top-line__item .fa-phone').parent().html('<i class="fa fa-phone" aria-hidden="true"></i><br/>'+newArray);
		}
	});
	$(window).resize();
});
