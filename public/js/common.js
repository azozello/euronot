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
		scrollInertia: "1000"
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
		$('input[data-name="one"]').parent().prepend('<svg xmlns="http://www.w3.org/2000/svg" id="svg8" viewBox="0 0 27.3303 27.3246" width="76" height="76" style="display: inline-block; vertical-align: middle; margin-right:15px" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" sodipodi:docname="radio1.svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" inkscape:version="0.92.2 (5c3e80d, 2017-08-06)" version="1.1">\n' +
			'  <defs id="defs2" />\n' +
			'  <sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="-9" inkscape:window-x="-9" inkscape:window-height="1001" inkscape:window-width="1920" units="px" fit-margin-bottom="0" fit-margin-right="0" fit-margin-left="0" fit-margin-top="0" showgrid="false" inkscape:current-layer="layer1" inkscape:document-units="mm" inkscape:cy="259.33858" inkscape:cx="-138.71912" inkscape:zoom="0.98994949" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base" />\n' +
			'  <metadata id="metadata5">\n' +
			'    <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">\n' +
			'      <cc:Work xmlns:cc="http://creativecommons.org/ns#" rdf:about="">\n' +
			'        <dc:format xmlns:dc="http://purl.org/dc/elements/1.1/">image/svg+xml</dc:format>\n' +
			'        <dc:type xmlns:dc="http://purl.org/dc/elements/1.1/" rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n' +
			'        <dc:title xmlns:dc="http://purl.org/dc/elements/1.1/" />\n' +
			'      </cc:Work>\n' +
			'    </rdf:RDF>\n' +
			'  </metadata>\n' +
			'  <g id="layer1" transform="translate(-126.693 -180.676)" inkscape:groupmode="layer" inkscape:label="Layer 1">\n' +
			'    <g id="g4794" transform="matrix(0.0576468 0 0 0.0576468 125.597 179.581)">\n' +
			'      <path class="st0" id="path4784" style="fill: #ffffff;" d="m 307.7 336 v -23.4 c 12.4 -14.4 27.1 -56.7 29.5 -63.9 l 10.1 -10.1 l 0.3 -1 c 0.4 -1.1 8.8 -26.7 8.8 -40.1 c 0 -10.3 -5.5 -14.7 -10.1 -16.4 V 150 c 0 -64.6 -60.7 -81.7 -66.1 -83.1 c -7 -2.9 -14.8 -4.3 -23.1 -4.3 c -13.1 0 -23.3 3.6 -25.2 4.3 c -5.2 1.3 -66.2 18.3 -66.2 83.1 v 31.1 c -4.5 1.6 -10.1 6 -10.1 16.4 c 0 13.5 8.5 39.1 8.8 40.1 l 0.3 1 l 10.1 10.1 c 2.4 7.1 17.1 49.4 29.4 63.8 V 336 l -116 36.8 l -25.7 20.2 l 2.4 3.3 c 44.5 60.6 116 96.7 191 96.7 c 75.1 0 146.5 -36.2 191.1 -96.8 l 2.4 -3.3 l -25.7 -20.1 Z m -125.1 -90.9 l -0.3 -1 l -10.1 -10 c -1.5 -4.7 -8.1 -25.8 -8.1 -36.5 c 0 -7.9 4.5 -8.6 5.8 -8.7 h 4.2 v -38.7 c 0 -60.4 57.5 -74.3 59.9 -74.9 l 0.6 -0.2 c 0.1 0 9.7 -3.8 22.3 -3.8 c 7.3 0 14.1 1.3 20.2 3.8 l 0.7 0.2 c 2.4 0.6 59.9 14.5 59.9 74.9 v 38.7 h 4.2 c 0.6 0 5.8 0.2 5.8 8.7 c 0 10.8 -6.6 31.8 -8.1 36.5 l -10 10 l -0.3 1 c -4.7 14.1 -19.1 53 -29.2 63 c -11.2 11.2 -32.8 13 -34.5 13.1 h -19.5 c -0.2 0 -23 -1.5 -34.6 -13.1 c -9.7 -10 -24.2 -48.9 -28.9 -63 Z M 256 484.5 C 185 484.5 117.4 451 74.3 394.6 l 18 -14.1 l 120.5 -38.2 v -22.6 c 14 8.8 32.2 10 33.3 10.1 h 20 h 0.1 c 0.9 0 19 -1.3 33 -10 v 22.6 l 120.6 38.2 l 18 14.1 C 394.7 450.9 327 484.5 256 484.5 Z" inkscape:connector-curvature="0" />\n' +
			'      <path class="st0" id="path4786" style="fill: #ffffff;" d="M 256 19 C 125.3 19 19 125.3 19 256 h 8.5 C 27.5 130 130 27.5 256 27.5 c 78.4 0 150.4 39.5 192.7 105.6 l 7.2 -4.6 C 412 59.9 337.3 19 256 19 Z" inkscape:connector-curvature="0" />\n' +
			'      <path class="st0" id="path4788" style="fill: #ffffff;" d="m 475.6 166.7 l -7.9 3.2 c 3.4 8.5 6.4 17.2 8.8 26 l 8.2 -2.2 c -2.5 -9.2 -5.5 -18.3 -9.1 -27 Z" inkscape:connector-curvature="0" />\n' +
			'      <path class="st0" id="path4790" style="fill: #ffffff;" d="m 488.8 211.4 l -8.3 1.6 c 2.7 14.1 4.1 28.6 4.1 43 h 8.5 c -0.1 -15 -1.5 -30 -4.3 -44.6 Z" inkscape:connector-curvature="0" />\n' +
			'      <rect class="st0" id="rect4792" style="fill: #ffffff;" x="19" y="278" width="8.5" height="23.1" />\n' +
			'    </g>\n' +
			'  </g>\n' +
			'  <style id="style10" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style41" type="text/css">\n' +
			'\t.st0{fill:#FFFFFF;}\n' +
			'</style>\n' +
			'  <style id="style81" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style10-2" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style41-1" type="text/css">\n' +
			'\t.st0{fill:#FFFFFF;}\n' +
			'</style>\n' +
			'  <style id="style10-3" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style41-3" type="text/css">\n' +
			'\t.st0{fill:#FFFFFF;}\n' +
			'</style>\n' +
			'  <style id="style4760" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style4782" type="text/css">\n' +
			'\t.st0{fill:#FFFFFF;}\n' +
			'</style>\n' +
			'</svg>');
		$('input[data-name="two"]').parent().prepend('<svg xmlns="http://www.w3.org/2000/svg" id="svg8" viewBox="0 0 32.7199 31.043" width="78" height="70" style="display: inline-block;\n' +
			'    vertical-align: middle; margin-right:15px" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" sodipodi:docname="radio2.svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" inkscape:version="0.92.2 (5c3e80d, 2017-08-06)" version="1.1">\n' +
			'  <defs id="defs2" />\n' +
			'  <sodipodi:namedview inkscape:window-maximized="1" inkscape:window-y="-9" inkscape:window-x="-9" inkscape:window-height="1001" inkscape:window-width="1920" units="px" fit-margin-bottom="0" fit-margin-right="0" fit-margin-left="0" fit-margin-top="0" showgrid="false" inkscape:current-layer="layer1" inkscape:document-units="mm" inkscape:cy="50.622836" inkscape:cx="89.989409" inkscape:zoom="0.98994949" inkscape:pageshadow="2" inkscape:pageopacity="0.0" borderopacity="1.0" bordercolor="#666666" pagecolor="#ffffff" id="base" />\n' +
			'  <metadata id="metadata5">\n' +
			'    <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">\n' +
			'      <cc:Work xmlns:cc="http://creativecommons.org/ns#" rdf:about="">\n' +
			'        <dc:format xmlns:dc="http://purl.org/dc/elements/1.1/">image/svg+xml</dc:format>\n' +
			'        <dc:type xmlns:dc="http://purl.org/dc/elements/1.1/" rdf:resource="http://purl.org/dc/dcmitype/StillImage" />\n' +
			'        <dc:title xmlns:dc="http://purl.org/dc/elements/1.1/" />\n' +
			'      </cc:Work>\n' +
			'    </rdf:RDF>\n' +
			'  </metadata>\n' +
			'  <g id="layer1" transform="translate(-66.1801 -121.735)" inkscape:groupmode="layer" inkscape:label="Layer 1">\n' +
			'    <g id="g4768" transform="matrix(0.0670765 0 0 0.0670765 65.3617 120.085)">\n' +
			'      <path class="st0" id="path4762" style="fill: #121212;" d="m 487.1 433.3 l -46.5 -14.7 v -7 c 5 -6.4 10.2 -21 11.8 -25.8 l 4.1 -4.1 l 0.3 -0.9 c 0.4 -1.2 3.8 -11.5 3.8 -17.3 c 0 -4.3 -1.9 -6.9 -4.1 -8.3 V 344 c 0 -23.4 -18.7 -34 -28.9 -36.5 c -3.1 -1.2 -6.6 -1.9 -10.2 -1.9 c -5.4 0 -9.8 1.4 -11 1.9 c -10.2 2.4 -29 13.1 -29 36.5 v 11.2 c -2.2 1.4 -4.1 4 -4.1 8.3 c 0 5.8 3.4 16.1 3.8 17.3 l 0.3 0.9 l 4.1 4.1 c 1.6 4.8 6.8 19.3 11.8 25.8 v 7 l -46.5 14.7 l -9.9 7.8 l -9.9 -7.8 l -46.5 -14.7 v -7 c 5 -6.4 10.2 -21 11.8 -25.8 l 4.1 -4.1 l 0.3 -0.9 c 0.4 -1.2 3.8 -11.5 3.8 -17.3 c 0 -4.3 -1.9 -6.9 -4.1 -8.3 V 344 c 0 -23.4 -18.7 -34 -28.9 -36.5 c -3.1 -1.2 -6.6 -1.9 -10.2 -1.9 c -5.4 0 -9.8 1.4 -11 1.9 c -10.2 2.4 -29 13.1 -29 36.5 v 11.2 c -2.2 1.4 -4.1 4 -4.1 8.3 c 0 5.8 3.4 16.1 3.8 17.3 l 0.3 0.9 l 4.1 4.1 c 1.6 4.8 6.8 19.3 11.8 25.8 v 7 l -46.5 14.7 l -10.7 8.4 l -10.7 -8.4 l -46.5 -14.7 v -7 c 5 -6.4 10.2 -21 11.8 -25.8 l 4.1 -4.1 l 0.3 -0.9 c 0.4 -1.2 3.8 -11.5 3.8 -17.3 c 0 -4.3 -1.9 -6.9 -4.1 -8.3 V 344 c 0 -23.4 -18.7 -34 -28.9 -36.5 c -3.1 -1.2 -6.6 -1.9 -10.2 -1.9 c -5.4 0 -9.8 1.4 -11 1.9 c -10.2 2.4 -29 13.1 -29 36.5 v 11.2 c -2.2 1.4 -4.1 4 -4.1 8.3 c 0 5.8 3.4 16.1 3.8 17.3 l 0.3 0.9 l 4.1 4.1 c 1.6 4.8 6.8 19.3 11.8 25.8 v 7 l -46.5 14.7 l -12.8 10 l 2.4 3.3 c 18.8 25.5 48.9 40.8 80.5 40.8 c 31.7 0 61.8 -15.2 80.6 -40.8 l 0.3 -0.4 l 0.3 0.4 c 18.8 25.5 48.9 40.8 80.5 40.8 c 31.4 0 61.3 -15 80.1 -40.2 c 18.8 25.2 48.7 40.2 80.1 40.2 c 31.7 0 61.8 -15.2 80.6 -40.8 l 2.4 -3.3 Z m -419.9 -51.1 l -0.3 -0.9 l -4.1 -4.1 c -1.3 -4 -3 -10.6 -3 -13.7 c 0 -0.7 0.1 -1.1 0 -1.1 l 4.1 0.7 v -19 c 0 -22.9 21.8 -28.2 22.8 -28.4 l 0.6 -0.2 c 0 0 3.7 -1.4 8.3 -1.4 c 2.7 0 5.2 0.5 7.4 1.4 l 0.7 0.2 c 0.9 0.2 22.8 5.4 22.8 28.4 v 14.2 l -0.9 4.9 l 4.8 -0.7 c 0 0 0.2 0.3 0.2 1.2 c 0 3.4 -2 10.4 -3 13.7 l -4.1 4.1 l -0.3 0.9 c -2.6 7.9 -8 21.6 -11.4 25 c -3.4 3.4 -10.1 4.5 -12.6 4.7 h -7.8 c -0.1 0 -8.6 -0.6 -12.7 -4.7 c -3.5 -3.6 -8.9 -17.3 -11.5 -25.2 Z M 95 479 C 67.3 479 41 466.3 23.6 444.8 l 5.1 -4 l 50.9 -16.1 v -7.1 c 5.2 2.2 10.3 2.5 11.3 2.6 h 8.3 h 0.1 c 0.8 0 5.9 -0.4 11 -2.6 v 7.1 l 50.9 16.1 l 5.1 4 C 149.1 466.3 122.7 479 95 479 Z m 133.9 -96.8 l -0.3 -0.9 l -4.1 -4.1 c -1.1 -3.3 -3 -10.3 -3 -13.7 c 0 -0.7 0.1 -1.1 0.1 -1.1 l 4.1 0.7 v -19 c 0 -22.9 21.8 -28.2 22.8 -28.4 l 0.6 -0.2 c 0 0 3.7 -1.4 8.3 -1.4 c 2.7 0 5.2 0.5 7.4 1.4 l 0.7 0.2 c 0.9 0.2 22.8 5.4 22.8 28.4 v 14.2 l -0.2 4.1 h 4.2 c 0 0 0.2 0.3 0.2 1.2 c 0 3.4 -2 10.4 -3 13.7 l -4.1 4.1 l -0.3 0.9 c -2.6 7.9 -8 21.6 -11.4 25 c -3.4 3.4 -10.1 4.5 -12.6 4.7 h -7.8 c -0.1 0 -8.6 -0.6 -12.7 -4.7 c -3.7 -3.5 -9.1 -17.2 -11.7 -25.1 Z m 27.9 96.8 c -27.7 0 -54 -12.7 -71.4 -34.2 l 5.1 -4 l 50.9 -16.1 v -7.1 c 5.2 2.2 10.3 2.5 11.3 2.6 h 8.3 h 0.1 c 0.8 0 5.9 -0.4 11 -2.6 v 7.1 l 50.9 16.1 l 5.1 4 C 310.8 466.3 284.4 479 256.8 479 Z m 132.2 -96.8 l -0.3 -0.9 l -4.1 -4.1 c -1.3 -4 -3 -10.6 -3 -13.7 c 0 -0.7 0.1 -1.1 0 -1.1 l 4.1 0.7 v -19 c 0 -22.9 21.8 -28.2 22.8 -28.4 l 0.6 -0.2 c 0 0 3.6 -1.4 8.3 -1.4 c 2.7 0 5.2 0.5 7.4 1.4 l 0.7 0.2 c 0.9 0.2 22.8 5.4 22.8 28.4 v 14.2 l -0.2 4.1 h 4.2 c 0 0 0.2 0.3 0.2 1.2 c 0 3.4 -2 10.4 -3 13.7 l -4.1 4.1 l -0.3 0.9 c -2.6 7.9 -8 21.6 -11.4 25 c -3.4 3.4 -10.1 4.5 -12.6 4.7 h -7.8 c -2.4 -0.1 -9.3 -1.3 -12.7 -4.7 c -3.5 -3.5 -8.9 -17.2 -11.6 -25.1 Z m 27.9 96.8 c -27.7 0 -54 -12.7 -71.4 -34.2 l 5.1 -4 l 50.9 -16.1 v -7.1 c 5.2 2.2 10.3 2.5 11.3 2.6 h 8.3 h 0.1 c 0.8 0 5.9 -0.4 11 -2.6 v 7.1 l 50.9 16.1 l 5.1 4 C 471 466.3 444.6 479 416.9 479 Z" inkscape:connector-curvature="0" />\n' +
			'      <path class="st0" id="path4764" style="fill: #121212;" d="m 99.2 255.8 h 313.5 v 42.1 H 421 V 247.5 H 261 v -19.9 c 33.5 -1.5 65.1 -18.2 85 -45.4 l 2.4 -3.3 L 334.5 168 L 282 151.4 V 143 c 5.7 -7.2 11.8 -24.4 13.3 -29.1 l 4.7 -4.7 l 0.3 -0.9 c 0.4 -1.3 4.2 -12.8 4.2 -19.2 c 0 -4.8 -2.2 -7.6 -4.6 -9 V 67.2 c 0 -30.8 -28.3 -39.5 -32.1 -40.5 c -3.5 -1.4 -7.3 -2.1 -11.4 -2.1 c -6.2 0 -11.1 1.6 -12.3 2.1 c -3.5 0.9 -32.1 9.5 -32.1 40.5 v 12.9 c -2.5 1.4 -4.6 4.2 -4.6 9 c 0 6.5 3.8 17.9 4.2 19.2 l 0.3 0.9 l 4.7 4.7 c 1.6 4.6 7.7 21.8 13.3 29 v 8.5 l -52.5 16.6 l -13.8 11 l 2.4 3.3 c 20.3 27.6 52.5 44.4 86.7 45.5 v 19.8 H 90.9 V 298 h 8.3 c 0 -0.1 0 -42.2 0 -42.2 Z m 125 -145.4 l -0.3 -0.9 l -4.6 -4.6 c -1.2 -3.7 -3.5 -11.7 -3.5 -15.7 c 0 -1.1 0.2 -1.8 0.5 -1.8 l 4.2 0.5 V 67.2 c 0 -26.1 24.9 -32.2 26 -32.4 l 0.6 -0.2 c 0 0 4.2 -1.6 9.5 -1.6 c 3.1 0 5.9 0.5 8.5 1.6 l 0.7 0.2 c 1.1 0.2 26 6.2 26 32.4 v 20.1 h 4.2 c 0.1 0 0.5 0.4 0.5 1.8 c 0 4 -2.3 11.9 -3.5 15.7 l -4.6 4.6 l -0.3 0.9 c -3 8.9 -9.1 24.4 -12.9 28.2 c -3.9 3.9 -11.6 5.2 -14.4 5.4 H 252 c -2.7 -0.2 -10.6 -1.5 -14.6 -5.4 c -4.1 -3.7 -10.3 -19.3 -13.2 -28.1 Z m -49.1 70.1 l 6.3 -4.9 l 56.8 -18 v -8.4 c 6.2 2.8 12.6 3.2 13.2 3.2 h 9.3 h 0.1 c 0.4 0 6.7 -0.4 12.9 -3.2 v 8.4 l 56.8 18 l 6.2 4.9 c -19.5 24.5 -49.5 39 -80.9 39 c -31.2 -0.1 -61.1 -14.5 -80.7 -39 Z" inkscape:connector-curvature="0" />\n' +
			'      <rect class="st0" id="rect4766" style="fill: #121212;" x="251.8" y="261.4" width="8.3" height="36.6" />\n' +
			'    </g>\n' +
			'  </g>\n' +
			'  <style id="style10" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style41" type="text/css">\n' +
			'\t.st0{fill:#FFFFFF;}\n' +
			'</style>\n' +
			'  <style id="style81" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style10-2" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style41-1" type="text/css">\n' +
			'\t.st0{fill:#FFFFFF;}\n' +
			'</style>\n' +
			'  <style id="style10-3" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'  <style id="style41-3" type="text/css">\n' +
			'\t.st0{fill:#FFFFFF;}\n' +
			'</style>\n' +
			'  <style id="style4760" type="text/css">\n' +
			'\t.st0{fill:#121212;}\n' +
			'</style>\n' +
			'</svg>');


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
