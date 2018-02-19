<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Контактная информация. Интернет-магазин Evronot.com.ua</title>
	<meta name="description"
	      content="Контактная информация в Киеве, Проспект Степана Бандеры 16Б магазин Евронот, Днепр ул. Пастера, 6а, магазин &amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;quot;Евронот&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;quot;"/>
	<meta name="keywords" content="Контактная информация, Киев, Днепр, Одесса, Харьков"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="images/favicon.ico" rel="icon" type="image/x-icon">
	<script src="{{ asset('index_app/js/jquery.min.js') }}"></script>
	<link href="{{ asset('index_app/css/main.css') }} " rel="stylesheet"/>
	<link href="{{ asset('index_app/css/bootstrap.min.css') }} " rel="stylesheet"/>

</head>
@include('layouts.site.header')

		<div id="contact" class="row">
			<script type="text/javascript">
				//function ch_select(){$(".cusel").removeClass("not_fill");}
				$(document).ready(function () {
					$("#contact_form :input").keyup(function () {
						check_fill("#contact_form");
					});
					$("#contact_form :input").focusout(function () {
						check_fill("#contact_form");
					});
					$("#contact_form .send").click(function () {
						var obj_path = "#contact_form";
						var return_value = true;
						return_value = check_empty(obj_path);
						if (return_value == true) {
							var data = $(obj_path + " :input").serialize();
							$.ajax({
								type: "POST",
								url: "parts/handler.php",
								dataType: 'text',
								cache: false,
								data: "ev=contact_form&" + data + "",
								beforeSend: function () {
									$(obj_path).slideUp("fast");
									$(".loader").slideDown("fast");
								},
								success: function () {
									$(".loader").slideUp("fast");
									//<![CDATA[
									$(obj_path).html('<div class="tnx_msg">Спасибо, ' + $(obj_path + " input[name=name]").val() + '. Ваше сообщение успешно отправлено.</div>').slideDown("fast");
									//]]>
								}
							});
						}
					})
				})
			</script>
			<div id="breadcrumbs" class="hidden-sm-down">
				<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span
						itemprop="title">Компьютерная техника бу</span></a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>Контакты</span></span>
			</div>
			<h1 class="page_title">Контактная информация</h1>
			<div class="page_text">
				<div id="goroda">
					<p><strong>Компания "Евронот"</strong> - адреса магазинов б/у техники из Германии.</p>
					<br/><br/>
					<div class="row">
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img
									src="upload/image/%D0%95%D0%B2%D1%80%D0%BE%D0%BD%D0%BE%D1%82.jpg" alt=""
									width="170" height="130"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Киев</strong>, проспект Степана Бандеры, 16 Б,<br/>магазин
								                                             "Евронот"
								</div>
								<div class="phones row">
									<div class="col-md-4">044 383 16 83<br/>099 100 25 66<br/>067 239 39 21<br/>073 451
									                      52 66<br/>095 317 42 38&nbsp;
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img
									src="upload/image/%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%B0(1).png" alt="Одесса 1"
									width="170" height="130"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Одесса</strong>, ул. Ришельевская 78, Магазин "EL_MAG"
								</div>
								<div class="phones row">
									<div class="col-md-4">067 136 78 78<br/>063 623 78 78</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img src="upload/image/IMG_6399.JPG" alt="" width="170"
							                                    height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Одесса</strong>, ул. Преображенская, 48<br/>(Тираспольская
								                                               пл.), магазин "Евронот"
								</div>
								<div class="phones row">
									<div class="col-md-4">073 155 75 70<br/>067 324 00 86</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img
									src="upload/image/%D0%A5%D0%B0%D1%80%D1%8C%D0%BA%D0%BE%D0%B2.png" alt=""
									width="170" height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Харьков</strong>, ул. Отакара Яроша 21,<br/>магазин
								                                                "Nokia"
								</div>
								<div class="phones row">
									<div class="col-md-4">067 324 00 68<br/>073 155 75 35<br/>050 326 27 07</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img src="upload/image/office_4.jpg" alt="" width="170"
							                                    height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Кропивницкий (Кировоград)</strong>,<br/>ул. 50 Лет
								                                                                  октября 27, магазин
								                                                                  "Евронот"
								</div>
								<div class="phones row">
									<div class="col-md-4">050 608 17 54<br/>068 143 03 29</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img src="upload/image/office_5.jpg" alt="" width="170"
							                                    height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Каменское (Днепродзержинск)</strong>,<br/>ул. Ленина
								                                                                    (Проспект Свободы),
								                                                                    30/1,<br/>магазин
								                                                                    "Кнопка"
								</div>
								<div class="phones row">
									<div class="col-md-4">067 959 05 59<br/>063 519 29 40&nbsp;</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img
									src="upload/image/%D0%97%D0%B0%D0%BF%D0%BE%D1%80%D0%BE%D0%B6%D1%8C%D0%B5.png"
									alt="" width="170" height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Запорожье</strong>, ул.Жуковского, 32,<br/> магазин
								                                                  "Мобільна Країна"
								</div>
								<div class="phones row">
									<div class="col-md-4">095 744 53 55<br/>067 353 13 90</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img
									src="upload/image/%D0%98%D0%B2%D0%B0%D0%BD%D0%BE-%D0%A4%D1%80%D0%B0%D0%BD%D0%BA%D0%BE%D0%B2%D1%81%D0%BA.png"
									alt="" width="170" height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Ивано-Франковск</strong>, ул.Независимости, 83,<br/>магазин
								                                                        "Медиасофт"
								</div>
								<div class="phones row">
									<div class="col-md-4">050 337 1000</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img src="upload/image/office_9.jpg" alt="" width="170"
							                                    height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Сарны</strong>, ул. Широкая 14,<br/>магазин "Смарт"
								</div>
								<div class="phones row">
									<div class="col-md-4">097 330 29 80&nbsp;</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img
									src="upload/image/%D0%91%D1%80%D0%BE%D0%B2%D0%B0%D1%80%D1%8B.png" alt=""
									width="170" height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address"><strong>г. Бровары</strong>, ул. Владимира Савченко 1,<br/>магазин
								                                                "RC"
								</div>
								<div class="phones row">
									<div class="col-md-4">050 771 33 57<br/>093 202 96 11<br/>098 514 20 45</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xs-12">
							<div class="col-lg-4 col-xs-4"><img
									src="upload/image/%D0%94%D0%BD%D0%B5%D0%BF%D1%80(1).png" alt="" width="170"
									height="135"/></div>
							<div class="col-md-8 col-xs-8">
								<div class="address">Днепр, ул.Пастера, 6а (ТК на Пастера)</div>
								<div class="phones row">
									<div class="col-md-4">050 363 45 53<br/>067 326 72 05</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			Наши странички в социальных сетях
			<div class="social-block">
				<a href="https://www.facebook.com/evronotshop/" target="_blank">
					<div class="social sprite sprite-fb-icon"></div>
				</a><a href="https://www.youtube.com/channel/UCpeU5nDuzTZgYu0nk0CCglg" target="_blank">
				<div class="social sprite sprite-youtube-icon"></div>
			</a></div>
			<br><br>
			<hr>
			<div class="right" id="cont_right">
				<div class="cont_text">
					Обратитесь к нам и мы в ближайшее время дадим Вам ответ.
					<div>Пишите нам и мы ответим в кратчайшие сроки.</div>
				</div>
				<div class="last_lev row" id="contact_form">
					<div class="col-md-6 col-xs-12" style="text-align: right;">
						<input type="text" name="name" class="req" maxlength="255" placeholder="ФИО" title="ФИО"/>
						<input type="text" name="email" class="req" maxlength="255" placeholder="Email" title="E-mail"/>
						<input type="text" name="tel" class="req" maxlength="255" placeholder="Номер телефона"
						       title="Номер телефона"/>
					</div>
					<div class="col-md-6 col-xs-12">
						<textarea name="text" class="req" cols="" rows="" placeholder="Сообщение" title="Сообщение"
						          maxlength="3000" style="margin-bottom: 3px;"></textarea>
						<div class="send">Отправить</div>
					</div>

				</div>
				<div class="loader"><img src="images/loader.gif" alt="loader"/></div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div id="wrap_out" class="row">
			<div id="header" class="inner"></div>
			<div class="clear"></div>
			<div id="wrapper" class="inner">
				<div id="content"></div>
				<div class="clear"></div>
			</div>
			<div class="push"></div>
			<div id="footer" class="inner"></div>
		</div>
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
		<a href="contact.html" alt="Адреса магазинов Евронот" title="Адреса магазинов Евронот">Адреса магазинов
		                                                                                       Евронот</a> | <a
			href="delivery.html" alt="Доставка и оплата" title="Доставка и оплата">Доставка и оплата</a> | <a
			href="warranty.html" alt="Гарантия и сервис" title="Гарантия и сервис">Гарантия и сервис</a> | <a
			href="about.html" alt="О компании Евронот" title="О компании Евронот">О компании Евронот</a> | <a
			href="news.html" alt="Новости компании" title="Новости компании">Новости компании</a>
		<div class="copyrights">
			© 2012 - 2018 Евронот. Большие бренды, маленькие цены. Все права защищены. При использовании материалов
			ссылка на сайт обязательна.
		</div>
		<div class="developer">
			<a onclick='location.href="http://www.s-tet.com.ua/"' style="cursor: pointer">Разработка сайта</a>: Estet
			                                                                                                  Design
			                                                                                                  Group
			<span class="sprite sprite-stet"></span>
		</div>


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
			$("#quick_basket .bask_img").attr('href','basket.html');
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
	function city_change(){
		var city = parseInt($('.cities1#cities').val());
		setCookie("city", city);
		$('.phones#phones1 .active, .grafik#grafik1 .active').removeClass('active');
		$('.phones#phones1 .phone_'+city+', .grafik#grafik1 .grafik_'+city).addClass('active');
	}
	function city_change2(){
		var city = parseInt($('#cities.cities2').val());
		setCookie("city", city);
		$('.phones#phones2 .active, .grafik#grafik2 .active').removeClass('active');
		$('.phones#phones2 .phone_'+city+', .grafik#grafik2 .grafik_'+city).addClass('active');

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
