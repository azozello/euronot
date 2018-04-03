<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>{{$meta_tags->title}}</title>
	<meta name="description" content="{{$meta_tags->description}}"/><meta name="keywords"
	      content="доставка, доставка по Украине, б у, ноутбуки, Киев, самовывоз, курьером, оплата наличными, безналичный расчет, наложенный платеж, evronot"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="images/favicon.ico" rel="icon" type="image/x-icon">
	<script src="{{ asset('index_app/js/jquery.min.js') }}"></script>
	<link href="{{ asset('index_app/css/main.css') }} " rel="stylesheet"/>
	<link href="{{ asset('index_app/css/bootstrap.min.css') }} " rel="stylesheet"/>

</head>
@include('layouts.site.header')
	</div>
</div>
<div class="content container-fluid other">
	<div class="container">
		<div id="breadcrumbs" class="hidden-sm-down">
			<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span
					itemprop="title">Компьютерная техника бу</span></a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>Доставка и оплата</span></span>
		</div>
		<h1 class="page_title">Доставка и оплата</h1>
		@if(isset($text))
			{!! $text !!}
		@endif
	</div>
</div>
<div class="footer container-fluid">
	<div class="container">
		<div class="tags">
			<p style="text-align: center;"><strong>Интернет магазин компьютерной б/у техники "Евронот" в Киеве. Купить
			                                       ноутбуки б/у<strong>,
					<strong><strong>HP</strong>,&nbsp;<strong><strong>Lenovo</strong>,&nbsp;</strong></strong></strong><strong>Apple</strong>,<strong>&nbsp;</strong><strong>Dell</strong>,&nbsp;<strong>Panasonic</strong>,&nbsp;<strong>IBM</strong>,&nbsp;<strong>Fujitsu
			                                                                                                                                                                                                                                                         Siemens</strong></strong>,&nbsp;<strong>планшеты,
			                                                                                                                                                                                                                                                                                                 серверы,
			                                                                                                                                                                                                                                                                                                 мониторы,
			                                                                                                                                                                                                                                                                                                 системные
			                                                                                                                                                                                                                                                                                                 блоки</strong>&nbsp;и
			                                                                                                                                                                                                                                                                                  другое&nbsp;<strong>компьютерное
					<strong>бу&nbsp;</strong>оборудование</strong><strong>. </strong></p>
			<p style="text-align: center;"><strong></strong>Доставка, гарантия, сервис, ремонт.</p></div>
		<hr>
		<br>
		@include('layouts.site.footer')
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){ $('.checkbox').each(function() { if($(this).parent().find('input[type=checkbox]:checked').length==1){$(this).addClass('checked');} });
		$('.checkbox_label').click(function(){
			if($(this).find('.checkbox').hasClass('checked')){
				$(this).find('input[type=checkbox]').attr('checked',false);
				$(this).find('.checkbox').removeClass('checked');
			}else{
				$(this).find('input[type=checkbox]').attr('checked',true);
				$(this).find('.checkbox').addClass('checked');
			} })
		var path = $("#quick_search :input,#quick_search2 :input,#contact_form :input,#cont_data :input,#faq_form :input,#forms input[type=text],.open_blocks input[type=text],.open_blocks input[type=password],.open_blocks textarea, #comments :input");
		path.focusin(function() {
			if($(this).val()==''){
				$(this).parent().find('.help_text').addClass('focus');
			}else{
				$(this).parent().find('.help_text').html('');
			} });
		path.keypress(function() {
			$(this).parent().find('.help_text').html('');
		});
		path.bind('paste', function () {
			setTimeout(function () {
				$(this).parent().find('.help_text').html('');
			}, 250);
		});
		path.keyup(function() {
			if($(this).val()==""){
				$(this).parent().find('.help_text').html($(this).parent().find('.help_text').attr('title'));
				$(this).parent().find('.help_text').addClass('focus');
			}
		});
		path.click(function() {
			if($(this).val()==""){
				$(this).parent().find('.help_text').html($(this).parent().find('.help_text').attr('title'));
			}else{
				$(this).parent().find('.help_text').html('');
			}
		})
		path.focusout(function() {
			if($(this).val()==""){
				$(this).parent().find('.help_text').html($(this).parent().find('.help_text').attr('title'));
				$(this).parent().find('.help_text').removeClass('focus');
			}else{
				$(this).parent().find('.help_text').html('');
			}
		});
		$('#go_top').click(function(e){
			go_top();
		})})
	function help_input_add(path){
		$.each(path, function(index){
			var inp = $(this);
			var help_text = inp.attr("title");
			inp.attr("title",'');
			if(help_text!=''&&help_text!=null){
				inp.wrap('<span class="help_out"></span>');
				var parent = inp.parent();
				if(inp.attr('type')==null){
					parent.addClass('textarea_out'); }
				parent.width(inp.width());
				parent.height(inp.height());
				parent.prepend('<span class="help_in"><span class="help_text" title="'+help_text+'"></span></span>');
				var span = parent.find('.help_text');
				span.width(inp.width());
				span.height(inp.height());
				if($(this).val()==""){span.html(help_text);}
				var styles = ['margin-top','margin-bottom','margin-left','margin-right','padding-top','padding-bottom','padding-left','padding-right','font-size',
					'border-left-width','border-left-style','border-left-style','border-left-color','border-right-width','border-right-style','border-right-style','border-right-color',
					'border-top-width','border-top-style','border-top-style','border-top-color','border-bottom-width','border-bottom-style','border-bottom-style','border-bottom-color',];
				$.each(styles,function(key,value){
					if(inp.css(value)!=''){
						var value2 = value.split('-',2);
						var value1 = value2[0];
						if(value1=='padding'){
							if(inp.css(value)!=''){
								value2[0]='margin';
								value2 = value2.join('-');
								inp.css(value2, '-'+inp.css(value));
							}
						}
						if(value1!='border'){
							span.css(value,inp.css(value));
						}
						parent.css(value,inp.css(value));
					}
				});
				parent.css({'background-color':inp.css("background-color"),'background-image':inp.css("background-image"),'background-repeat':inp.css("background-repeat"),'background-position':inp.css("background-position")});
				inp.css({'background':'none','border':0});
			}
		});
	}
	function check_fill(obj){
		$(obj+" :input").each(function(index){
			if($(this).val()!=""&&$(this).val()!=$(this).attr("title")){
				if(!$(this).parent().hasClass('help_out')){
					$(this).removeClass("not_fill");
				}else{
					$(this).parent().removeClass("not_fill");
				}
			}
		});
	}
	function check_empty(obj){
		return_value = true;
		$(obj+" .req").each(function(index){
			if($(this).hasClass('cusel')){
				if($(this).find('input').val()==''){$(this).addClass("not_fill");return_value = false;$(this).focus();}
			}else if(($(this).val()==""||$(this).val()==$(this).attr("title"))&&$(this).hasClass("req")){
				if(!$(this).parent().hasClass('help_out')){
					$(this).addClass("not_fill");
				}else{
					$(this).parent().addClass("not_fill");
				}
				return_value = false;
				if($(obj+" .not_fill:first input").length!=0){
					$(obj+" .not_fill:first input").focus();
				}else{
					$(obj+" .not_fill:first").focus();
				}
			}
		});
		if($(obj+" input[name=email]").length!=0&&!/^([a-zA-Z--0-9_\.\-])+\@(([a-zA-Z--0-9\-])+\.)+([a-zA-Z--0-9]{2,4})+$/.test($(obj+" input[name=email]").val())){
			if(!$(obj+" input[name=email]").parent().hasClass('help_out')){
				$(obj+" input[name=email]").addClass("not_fill");
			}else{
				$(obj+" input[name=email]").parent().addClass("not_fill");
			}
			return_value = false;
		}
		return return_value;
	}
	function strip_tags(input, allowed) {
		allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
		var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
			commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
		input=input.replace(/&nbsp;/gi, '');
		return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {        return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';});
	}
	function get_cookie(name){
		cookie_name = name + "=";
		cookie_length = document.cookie.length;
		cookie_begin = 0;
		while (cookie_begin < cookie_length){
			value_begin = cookie_begin + cookie_name.length;
			if (document.cookie.substring(cookie_begin, value_begin) == cookie_name){
				var value_end = document.cookie.indexOf (";", value_begin);
				if (value_end == -1){value_end = cookie_length;}
				return unescape(document.cookie.substring(value_begin, value_end));
			}
			cookie_begin = document.cookie.indexOf(" ", cookie_begin) + 1;
			if (cookie_begin == 0){break;}
		}
		return null;
	}
	function setCookie(name, value){
		var expiresDate = new Date();
		expiresDate.setTime(expiresDate.getTime() + 30 * 24 * 60 * 60 * 1000);
		var expires = expiresDate.toGMTString();
		var newCookie = name + "=" + value + "; path=/; expires=" + expires;
		document.cookie = newCookie + ";";
	}
	function card_add(obj,price,type){
		if($("#add_quant_inp").length==0){var quant = 1;}
		else{var quant = parseInt($("#add_quant_inp").val());}
		if($('#products_sub input:checked').length==0){
			var sub = 0;
			price = parseInt(price);
		}else{
			var sub = $('#products_sub input:checked').val();
			price = parseInt($('.text_td .price span').text());
		}
		if(quant!=0&&quant!=null){
			var cooker;
			if(sub==0){var obj_val = obj;}
			else{var obj_val = obj+'-'+sub;}
			for(var i=1; i<=quant; i++) {
				var cook = get_cookie("basket");
				if(cook!=null&&cook!=""){cooker=cook+","+obj_val;}
				else{cooker=obj_val;}
				setCookie("basket",cooker);
			}
			var cook = get_cookie("basket_price");
			if(cook!=null&&cook!=""){cook=parseInt(cook);var pricer=(price*quant)+cook;}
			else{var pricer=price*quant;}
			var total_count = get_cookie("basket").split(',').length;
			$("#quick_basket .count").text(total_count);
			if( $("#quick_basket").find('.empty').length != 0)
			{
				$("#quick_basket .empty").hide();
				$("#quick_basket .card11").show();
				$("#quick_basket .quant").text(total_count);
				$("#quick_basket .price .price").text(pricer);
				setCookie("basket_price",pricer);
			}
			else
			{
				$("#quick_basket .quant").text(total_count);
				$("#quick_basket .price .price").text(pricer);
				setCookie("basket_price",pricer);
			}
			var count_all = $("#quick_basket .text .quant").text();
			$("#quick_basket .text .word").text(word_end(count_all));
			$("#quick_basket .bask_img").attr('href','/basket.html');
			var final_t = Math.ceil($('#quick_basket').offset().top);
			var final_l = Math.ceil($('#quick_basket').offset().left);
			$("#prod_"+obj).stop(true,true).fadeOut(0).fadeIn();
			$("#prod_"+obj+" .go_basket").stop(true,true).fadeIn();
			if(type==1){
				var anim_obj = $("#prod_"+obj+" .pict");
			}
			else if(type==2){
				var anim_obj = $("#pict_box img");
			}
			else if(type==3){
				var anim_obj = $("#special_"+obj);
			}
			if(anim_obj.length!=0 /*&& type!=3*/){
				anim_obj.clone()
					.appendTo("body")
					.addClass('anim_pict')
					.css({position:'absolute','z-index':50,opacity:0.6,top:Math.ceil($(anim_obj).offset().top),left:Math.ceil($(anim_obj).offset().left)})
					.animate({top:final_t,left:final_l,width:0,height:0},500,function(){$(this).remove();});
			}
		}
	}
	function word_end(counted_word){
		var word_lenght=counted_word.length;
		var last1 = counted_word.substring(word_lenght-1, word_lenght);
		var last2 = counted_word.substring(word_lenght-2, word_lenght);
		var last3 = counted_word.substring(word_lenght-3, word_lenght);
		var word = '';
		if((word_lenght !=1 && counted_word.substring(0, 1) == '1') || last1 >= '5' || last3 == '000' || last1 == '0') {word = '';}
		else if(last1 == 1){word = '';}
		else{word = '';}
		return word;
	}

	$(document).ready(function(){$('#go_top').click(function(){$(window).scrollTop(0);})})
	$(window).scroll(function(){go_top();})
	$(window).resize(function(){go_top();})
	function go_top(){
		var top_pos = $(this).scrollTop();
		var bot_pos = $(document).height()-$(window).height()-top_pos;
		var bot_val;
		if(top_pos>100){$('#go_top').stop(true,true).fadeIn();}else{$('#go_top').stop(true,true).fadeOut();}
		if(bot_pos<=130){bot_val=130-bot_pos;if(bot_val<10){bot_val=10;}$('#go_top').css('bottom',bot_val+'px');}
		else{$('#go_top').css('bottom','10px');}
	}
</script>
<link href="{{ asset('index_app/css/main2.css') }} " rel="stylesheet"/>
<script src="{{ asset('index_app/plugins/cusel.js') }}"></script>
<script src="{{ asset('index_app/plugins/jScrollPane.js') }}"></script>
<script src="{{ asset('index_app/plugins/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('index_app/js/jquery.formstyler.min.js') }}"></script>
<script src="{{ asset('index_app/js/owl.carousel.min.js') }}"></script>

<script async src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
        integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK"
        crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#prod_tabs .block_title').click(function () {
			var bl_id = $(this).attr('id');
			$('#prod_tabs .block_title').removeClass('active');
			$(this).addClass('active');
			$('#prod_tabs .blocks').stop(true, true).hide();
			//var path = $("#comments input");
			$('#prod_tabs #' + bl_id + '_block').stop(true, true).show(/*10, help_input_add(path)*/);
			//help_input_add(path);
		});
	});
	$('select#type_ch').styler();
	$('select').styler();
</script>
<script>
	$('.owl-carousel1').owlCarousel({
		items: 1,
		autoplay: true,
		loop: true
	});
</script>
</body>
</html>
