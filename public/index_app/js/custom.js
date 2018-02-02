jQuery(document).ready(function () {
	jQuery('.m-checkbox-unchecked').click(function (e) {
		e.preventDefault();
		if (jQuery(this).hasClass('m-checkbox-checked')){
			jQuery(this).removeClass('m-checkbox-checked');
			jQuery(this).parent().children('input[type=checkbox]').click();
		}
		else{
			jQuery(this).addClass('m-checkbox-checked');
			jQuery(this).parent().children('input[type=checkbox]').click();
		}
	});




	jQuery('.popup-with-zoom-anim').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,

		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});

	$('.jq-number__spin.minus').click(function (e) {
		e.preventDefault();
		var a =  $(this).parent().children('.jq-number__field input').value();
		console.log(a);
	});
	
});