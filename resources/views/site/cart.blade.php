<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Оформление заказа. Интернет-магазин Evronot.com.ua</title>
	<meta name="description" content="Оформление заказа на компьютерную бу технику в Evronot c доставкой по Украине."/>
	<meta name="keywords" content="Оформления заказа на ноутбук, на системник, на монитор."/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="images/favicon.ico" rel="icon" type="image/x-icon">
	<script src="{{ asset('index_app/js/jquery.min.js') }}"></script>
	<link href="{{ asset('index_app/css/main.css') }} " rel="stylesheet"/>
	<link href="{{ asset('index_app/css/bootstrap.min.css') }} " rel="stylesheet"/>
	
</head>
@include('layouts.site.header')
		<div class="menu-row row hidden-md-down">
			<nav class="navbar navbar-light bg-faded">
				<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
				        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
				        aria-label="Toggle navigation"></button>
				<div class="collapse navbar-toggleable-md" id="navbarResponsive">
					<ul class="nav nav-bar main-menu">
						<li><a href="/product_list/noutbuki"><span class="sprite sprite-menu-icon-1"></span>Ноутбуки
								б/у</a>
						</li>
						<li><a href="/product_list/sistemnie-bloki"><span class="sprite sprite-menu-icon-2"></span>Системные
								блоки
								б/у</a>
						</li>
						<li><a href="/product_list/monitory"><span class="sprite sprite-menu-icon-3"></span>Мониторы
								б/у</a>
						</li>
						<li><a href="/product_list/printery"><span class="sprite sprite-menu-icon-4"></span>Принтеры
								(NEW)</a>
						</li>
						<li><a href="/product_list/doc-stancii"><span
										class="sprite sprite-menu-icon-5"></span>Док Станции б/у</a></li>
						<li><a href="igrovie-sistemniki"><span class="sprite sprite-menu-icon-2"></span>Игровые системники</a></li>
					</ul>
					<ul class="nav nav-bar main-menu main-menu2">
						<li><a href="#">
								<span class="sprite sprite-menu-icon-1"></span>Для навчання</a>
						</li>
						<li><a href="#">
								<span class="sprite sprite-menu-icon-2"></span>Для роботи</a>
						</li>
						<li><a href="#"><span class="sprite sprite-menu-icon-3"></span>Для
								ігор</a>
						</li>
						<li><a href="#"><span class="sprite sprite-menu-icon-4"></span>Для домашнього використання</a>
						</li>

					</ul>

				</div>
			</nav>
		</div>
	</div>
</div>
<div class="content container-fluid other">
	<div class="container">
		<script>
			$(document).ready(function () {
				delivery_check();
				check_sum();

				$("#basket .quant_up,#basket .quant_down").click(function () {
					var inp_val = parseInt($(this).parent().find('input').val());
					console.log('inp_val = ' + inp_val);
					console.log('minus1 = ' + (inp_val - 1));
					var price_t = parseInt(get_cookie("basket_price"));
					if (inp_val == null) {
						$(this).parent().find('input').val(1);
					}
					else {
						if ($(this).hasClass('quant_up')) {
							$(this).parent().find('input').val(++inp_val);
							price_t = price_t + parseInt($(this).parent().parent().parent().find('.price').find('label').text());
							$("#quick_basket .price .price").text(price_t);
							setCookie("basket_price", price_t);
						} else {
							if ((inp_val - 1) >= 1) {
								$(this).parent().find('input').val(--inp_val);
								price_t = price_t - parseInt($(this).parent().parent().parent().find('.price').find('label').text());
								$("#quick_basket .price .price").text(price_t);
								setCookie("basket_price", price_t);
							}
						}
					}
					var quant = inp_val;
					if (quant == '') {
						quant = 0;
					}
					var price = $(this).parents("tr").find(".price label").text();
					var sum = parseInt(price) * parseInt(quant);
					$(this).parents("tr").find(".sum label").text(sum);
					var fields = $("#basket tr.other"), qq, data = '', t = 0;
					$.each(fields, function (index) {
						qq = $(this).find(".quantity input").val();
						for (var i = 1; i <= qq; i++) {
							if (data != '') {
								data += ",";
							}
							data += $(this).attr('id');
							t++;
						}
					});
					setCookie("basket", data);
					if (t != 0) {
						$("#quick_basket .count").text(t);
						$("#quick_basket .quant").text(t);
						var count_all = $("#quick_basket .text .quant").text();
						$("#quick_basket .text .word").text(word_end(count_all));
					}
					else {
						$("#quick_basket .empty").show();
						$("#quick_basket .card11").hide();
					}
					check_sum();
				});

				$("#basket .quantity input").keyup(function () {
					var quant = $(this).val();
					if (quant == '') {
						quant = 0;
					}
					var price = $(this).parents("tr").find(".price label").text();
					var sum = parseInt(price) * parseInt(quant);
					$(this).parents("tr").find(".sum label").text(sum);
					var fields = $("tr.other"), qq, data = '', t = 0;
					$.each(fields, function (index) {
						qq = $(this).find(".quantity input").val();
						for (var i = 1; i <= qq; i++) {
							if (data != '') {
								data += ",";
							}
							data += $(this).attr('id');
							t++;
						}
					});
					setCookie("basket", data);
					if (t != 0) {
						$("#quick_basket .quant").text(t);
						var count_all = $("#quick_basket .text .quant").text();
						$("#quick_basket .text .word").text(word_end(count_all));
					}
					else {
						$("#quick_basket .text").html("<label><a href=\"basket.html\">Корзина пуста</a><br />начните ваши покупки</label>");
						$("#head_order_btn").addClass('empty');
					}
					check_sum();
				})

				$("#delivery input").change(function () {
					delivery_check();
					check_sum();
					$('input[name="adres"]').removeAttr('disabled').addClass('req');
					var radioId =$(this).attr('id');
					if(radioId=='dlv_3' || radioId =='dlv_1'){
						console.log('2');
						$('input[name="adres"]').attr('disabled', 'disabled').removeClass('req not_fill');
					}
				});

				$("#order_but").click(function () {
					var obj_path = "#data_info";
					var return_value = true;
					return_value = check_empty(obj_path);
					if (return_value == true) {
						var data = $(obj_path + " :input").serialize();
						$.ajax({
							type: "POST",
							url: "parts/order.php",
							dataType: 'text',
							cache: false,
							data: data,
							beforeSend: function () {
								$('#after_ord_block').slideUp('fast', function () {
									$(this).remove();
								})
								$('html,body').animate({scrollTop: 0}, 'fast', 'swing');
								$(obj_path).html('<div class="loader"><img src="images/loader.gif" alt="loader"/></div>');
							},
							success: function (res) {
								$(obj_path).html(res);
								setCookie("basket", "");
								setCookie("basket_price", "");
							}
						});
					}
				})

				$("#cont_data :input").keyup(function () {
					check_fill("#cont_data");
				})
				$("#cont_data :input").focusout(function () {
					check_fill("#cont_data");
				})
			})

			function check_sum() {
				data = 0;
				fields = $("#basket tr.other .sum label");
				$.each(fields, function () {
					data = data + parseInt($(this).text());
				});
				$("#sum_prev label").text(data);
				discount_it();
				delivery_check();
				var min_order = parseInt($("#min_order").val());
				var free_delivery = parseInt($("#free_delivery").val());
				var delivery = parseInt($("#delivery_viz label").text());
				var delivery_type = $("#delivery input:checked").val();
				$("#sum_all label").text(data + delivery);
				if (data < min_order) {
					$("#order_but").stop(true, true).hide();
					$("#order_desc").stop(true, true).fadeIn("fast");
				} else if (data >= free_delivery && delivery_type == 2) {
					$("#order_desc").stop(true, true).hide();
					$("#order_but").stop(true, true).fadeIn("fast");
					$("#sum_all label").text(data);
				} else {
					$("#order_desc").stop(true, true).hide();
					$("#order_but").stop(true, true).fadeIn("slow");
				}
				basket_price_check();
				if ($("#basket tr.other").length == 0) {
					$("#basket").html('<div class="imp_info2">В Вашей корзине нет товаров</div>');
				}
			}

			function discount_it() {
				var sum_prev = parseInt($("#sum_prev label").text());
				var all_orders = parseInt($("#all_orders").val());
				var sum = parseInt(sum_prev + all_orders);
				var discounter = 0;
				var porog;
				$(".discounts").each(function () {
					porog = parseInt($(this).val());
					if (sum > porog) {
						discounter = parseInt($(this).attr("name"));
					}
				});
				if (discounter != 0) {
					var discounter_val = sum_prev * (discounter / 100);
					discounter_val = Math.floor(discounter_val);
					$("#discounter label.val").text(discounter_val);
					$("#discounter label.proc").text(discounter);
					$("#sum_all label").text(sum_prev - discounter_val);
					$(".disc").fadeIn("slow");
				} else {
					$(".disc").hide();
					$("#discounter label.val").text('');
					$("#discounter label.proc").text('');
					$("#sum_all label").text(sum_prev);
				}
				$("#discount").val(discounter);
			}

			function delivery_check() {
				var delivery_val;
				var sum_prev = parseInt($("#sum_prev label").text());
				var free_delivery = parseInt($("#free_delivery").val());
				var delivery = parseInt($("#delivery input:checked").parent().parent().find('.delivery_val').text());
				var delivery_type = $("#delivery input:checked").val();
				delivery_val = delivery;
				if (delivery_type == 2 && sum_prev >= free_delivery) {
					delivery_val = 0;
				}
				$("#delivery_viz label").text(delivery_val);
			}

			function del_it(obj) {
				var delivery = parseInt($("#delivery input:checked").parent().parent().find('.delivery_val').text());
				var cook = get_cookie("basket");
				var tt = 0;
				var price_cook = get_cookie("basket_price");
				var del_price = $('tr#' + obj).find('.sum').find('label').text();
				if (cook != null && cook != "") {
					var arr = cook.split(",");
					var data = "";
					$.each(arr, function (key, value) {
						if (value != obj) {
							if (key != 0 && arr.length > 2 && data != '') {
								data += ',';
							}
							data += value;
						} else {
							tt++;
						}
					});
				}
				setCookie("basket", data);
				var quant = parseInt($("#quick_basket .quant").text());
				quant = quant - tt;
				if (quant != 0) {
					$("#quick_basket .quant").text(quant);
					$("#quick_basket .count").text(quant);
					$("#quick_basket .price .price").text((parseInt(price_cook) - parseInt(del_price)));
					setCookie("basket_price", (parseInt(price_cook) - parseInt(del_price)));
					/* var count_all = $("#quick_basket .text .quant").text();
					 $("#quick_basket .text .word").text(word_end(count_all));*/
				}
				else {
					$("#quick_basket .count").text('0');
					$("#quick_basket .empty").show();
					$("#quick_basket .card11").hide();
					/* $("#quick_basket .text").html("<label><a href=\"basket.html\">Корзина пуста</a><br />начните ваши покупки</label>");
					 $("#head_order_btn").addClass('empty');*/
				}
				$("#" + obj).remove();
				check_sum();
			}

			function basket_price_check() {
				var fields = $("#basket tr.other");
				var data = 0;
				$.each(fields, function () {
					var quant = parseInt($(this).find('.quantity input').val());
					var price = parseInt($(this).find('.price label').text());
					if (quant != 0 && quant != '') {
						data = (price * quant) + data;
					}
				});
				setCookie("basket_price", data);
				$("#quick_basket .text .price").text(data);
			}
		</script>
		<div id="basket">
			<div id="breadcrumbs" class="hidden-sm-down">
				<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span
						itemprop="title">Компьютерная техника бу</span></a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>Оформление заказа</span></span>
			</div>
			<h1 class="page_title">Оформление заказа</h1>
			<div id="after_ord_block">
				<table class="prod_card table">
					<tr>
						<th>Товар</th>
						<th>Название</th>
						<th>Количество</th>
						<th>Цена</th>
						<th>Итого</th>
						<th class="last">Удалить</th>
					</tr>
					<tr class="row6 other last" id="315">
						@if(isset($cart))
							@foreach($cart as $item)
								<tr>
								<td class="pict">
									<a href="products-315.html"><img alt="Ноутбук HP Compaq 6730b"
																	 src="images/pictures/products/20170427131100387.jpg"/></a>
								</td>
								<td class="title">
									<a href="products-315.html">
										{{$item['item_name']}}</a>
								</td>
								<td class="quantity">
									<div class="quant_block">
										<div class="quant_down">-</div>
										<input type="text" size="3" value="1"/>
										<div class="quant_up">+</div>
									</div>
								</td>
								<td class="price">
									<label>{{$item['item_price']}}</label>&nbsp;<span>грн</span>
								</td>
								<td class="sum"><label>{{$item['item_price']}}</label>&nbsp;<span>грн</span></td>
								<td class="remove">
									<form method="post" action="{{route('delete_item_from_cart')}}" enctype="multipart/form-data" class="form-inline">
										<input name="_token" type="hidden" value="{{ csrf_token() }}">
										<input name="item_id" type="hidden" value="{{$item['item_id']}}">
										<div class="add_to_basket_btn"><button type="submit">Удалить</button></div>
									</form>
								</td>
								</tr>
							@endforeach
						@endif
					</tr>
					<tr style="display: none;" class="disc">
						<td colspan="3"></td>
						<td style="color:#464646;font-size:12px;white-space:nowrap;padding: 5px 2px 10px 2px;text-align: center;"
						    class="orange">Скидка:
						</td>
						<td colspan="2" id="discounter" align="center" style="padding: 5px 2px 10px 2px;">

							<label class="val"></label><span> грн</span> (<label class="proc"></label>%)
						</td>
					</tr>
				</table>
				<div id="sum_prev_line" class="right_sum_line">
					Товаров на сумму:
					<div id="sum_prev" class="right_sum"><label>4300</label> грн</div>
				</div>
				<div id="delivery_line" class="right_sum_line" style="">
					Доставка:
					<div id="delivery_viz" class="right_sum"><label>100</label> грн</div>
				</div>
				<div id="sum_all_line" class="right_sum_line">
					Всего к оплате:
					<div id="sum_all" class="right_sum"><label>
							@if(isset($item)){{$item['item_price']}}@endif</label> грн
					</div>
				</div>
			</div>

			<div class="data_block row" id="data_info">

				<div class="col-lg-6 col-xs-12" id="cont_data">
					<div class="out">
						<div class="block_title">Контактная информация</div>
						<div class="line">
							<input type="text" name="name" value="" class="req" placeholder="ФИО" title="ФИО"/>
						</div>
						<div class="line">
							<input type="text" name="tel" value="" class="req" placeholder="Телефон" title="Телефон"/>
						</div>
						<div class="line">
							<input type="text" name="email" value="" placeholder="E-mail" class="req" title="E-mail"/>
						</div>
						<div class="line">
							<input type="text" name="adres" value="" placeholder="Адрес доставки" class="req"
							       title="Адрес доставки"/>
						</div>
						<div class="line">
							<textarea name="text" placeholder="Примечание" title="Примечание"></textarea>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				<div class="col-lg-6 col-xs-12" id="delivery_block">
					<div class="out">
						<div class="block_title">Выберите способ доставки</div>
						<table id="delivery" class="table">
							<tr>
								<td><input type="radio" name="delivery" id="dlv_5" value="5"/></td>
								<td class="dlv_name"><label for="dlv_5"><span>Новая почта</span>
									<div>Стоимость доставки согласно тарифов компании &quot;Новая Почта&quot;</div>
								</label></td>
								<td><label for="dlv_5"><span class="delivery_val">0</span> грн</label></td>
							</tr>
							<tr>
								<td><input type="radio" name="delivery" id="dlv_2" value="2" checked=""/></td>
								<td class="dlv_name"><label for="dlv_2"><span>Курьерская доставка</span>
									<div>Для жителей Киева</div>
								</label></td>
								<td><label for="dlv_2"><span class="delivery_val">100</span> грн</label></td>
							</tr>
							<tr>
								<td><input type="radio" name="delivery" id="dlv_3" value="3"/></td>
								<td class="dlv_name"><label for="dlv_3"><span>Самовывоз из магазина &quot;Евронот&quot; в ТЦ &quot;Городок&quot;</span>
									<div>г. Киев, проспект Степана Бандеры 23а</div>
								</label></td>
								<td><label for="dlv_3"><span class="delivery_val">0</span> грн</label></td>
							</tr>
							<tr>
								<td><input type="radio" name="delivery" id="dlv_1" value="1"/></td>
								<td class="dlv_name"><label
										for="dlv_1"><span>Самовывоз из магазина &quot;Евронот&quot;</span>
									<div>г. Киев, проспект Степана Бандеры 16Б</div>
								</label></td>
								<td><label for="dlv_1"><span class="delivery_val">0</span> грн</label></td>
							</tr>
						</table>
						<div class="line">
							<div id="order_but" class="send"
							     onsubmit="ga('send', 'event', 'Forma', 'Podtverdit');return true;">Оформить заказ
							</div>
							<div id="order_desc" style="display:none;">Минимальная сумма заказа грн (без учёта
							                                           доставки)
							</div>
						</div>
					</div>
				</div>
			</div>


			<input type="hidden" name="discount" id="discount"/>
			<input type="hidden" name="all_orders" id="all_orders" value="0"/>
			<input type="hidden" name="min_order" id="min_order" value=""/>
			<input type="hidden" name="free_delivery" id="free_delivery" value=""/>


			<div class="page_text">
				<div style="max-width: 600px; margin: 0 auto; font-size: 20px; text-align: center;">Оператор перезвонит
				                                                                                    Вам в ближайшее
				                                                                                    время для
				                                                                                    подтверждения заказа
				                                                                                    в рабочие дни с
				                                                                                    10.00 до 19.00, а
				                                                                                    если Вы оформляете
				                                                                                    заказ в выходные, то
				                                                                                    в ближайший рабочий
				                                                                                    день.
				</div>
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
		</div>
		<hr>
		<br>
		@include('layouts.site.footer')
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function () {
		$('.checkbox').each(function () {
			if ($(this).parent().find('input[type=checkbox]:checked').length == 1) {
				$(this).addClass('checked');
			}
		});
		$('.checkbox_label').click(function () {
			if ($(this).find('.checkbox').hasClass('checked')) {
				$(this).find('input[type=checkbox]').attr('checked', false);
				$(this).find('.checkbox').removeClass('checked');
			} else {
				$(this).find('input[type=checkbox]').attr('checked', true);
				$(this).find('.checkbox').addClass('checked');
			}
		})
		var path = $("#quick_search :input,#quick_search2 :input,#contact_form :input,#cont_data :input,#faq_form :input,#forms input[type=text],.open_blocks input[type=text],.open_blocks input[type=password],.open_blocks textarea, #comments :input");
		path.focusin(function () {
			if ($(this).val() == '') {
				$(this).parent().find('.help_text').addClass('focus');
			} else {
				$(this).parent().find('.help_text').html('');
			}
		});
		path.keypress(function () {
			$(this).parent().find('.help_text').html('');
		});
		path.bind('paste', function () {
			setTimeout(function () {
				$(this).parent().find('.help_text').html('');
			}, 250);
		});
		path.keyup(function () {
			if ($(this).val() == "") {
				$(this).parent().find('.help_text').html($(this).parent().find('.help_text').attr('title'));
				$(this).parent().find('.help_text').addClass('focus');
			}
		});
		path.click(function () {
			if ($(this).val() == "") {
				$(this).parent().find('.help_text').html($(this).parent().find('.help_text').attr('title'));
			} else {
				$(this).parent().find('.help_text').html('');
			}
		})
		path.focusout(function () {
			if ($(this).val() == "") {
				$(this).parent().find('.help_text').html($(this).parent().find('.help_text').attr('title'));
				$(this).parent().find('.help_text').removeClass('focus');
			} else {
				$(this).parent().find('.help_text').html('');
			}
		});
		$('#go_top').click(function (e) {
			go_top();
		})
	})

	function help_input_add(path) {
		$.each(path, function (index) {
			var inp = $(this);
			var help_text = inp.attr("title");
			inp.attr("title", '');
			if (help_text != '' && help_text != null) {
				inp.wrap('<span class="help_out"></span>');
				var parent = inp.parent();
				if (inp.attr('type') == null) {
					parent.addClass('textarea_out');
				}
				parent.width(inp.width());
				parent.height(inp.height());
				parent.prepend('<span class="help_in"><span class="help_text" title="' + help_text + '"></span></span>');
				var span = parent.find('.help_text');
				span.width(inp.width());
				span.height(inp.height());
				if ($(this).val() == "") {
					span.html(help_text);
				}
				var styles = ['margin-top', 'margin-bottom', 'margin-left', 'margin-right', 'padding-top', 'padding-bottom', 'padding-left', 'padding-right', 'font-size',
					'border-left-width', 'border-left-style', 'border-left-style', 'border-left-color', 'border-right-width', 'border-right-style', 'border-right-style', 'border-right-color',
					'border-top-width', 'border-top-style', 'border-top-style', 'border-top-color', 'border-bottom-width', 'border-bottom-style', 'border-bottom-style', 'border-bottom-color',];
				$.each(styles, function (key, value) {
					if (inp.css(value) != '') {
						var value2 = value.split('-', 2);
						var value1 = value2[0];
						if (value1 == 'padding') {
							if (inp.css(value) != '') {
								value2[0] = 'margin';
								value2 = value2.join('-');
								inp.css(value2, '-' + inp.css(value));
							}
						}
						if (value1 != 'border') {
							span.css(value, inp.css(value));
						}
						parent.css(value, inp.css(value));
					}
				});
				parent.css({
					'background-color': inp.css("background-color"),
					'background-image': inp.css("background-image"),
					'background-repeat': inp.css("background-repeat"),
					'background-position': inp.css("background-position")
				});
				inp.css({'background': 'none', 'border': 0});
			}
		});
	}

	function check_fill(obj) {
		$(obj + " :input").each(function (index) {
			if ($(this).val() != "" && $(this).val() != $(this).attr("title")) {
				if (!$(this).parent().hasClass('help_out')) {
					$(this).removeClass("not_fill");
				} else {
					$(this).parent().removeClass("not_fill");
				}
			}
		});
	}

	function check_empty(obj) {
		return_value = true;
		$(obj + " .req").each(function (index) {
			if ($(this).hasClass('cusel')) {
				if ($(this).find('input').val() == '') {
					$(this).addClass("not_fill");
					return_value = false;
					$(this).focus();
				}
			} else if (($(this).val() == "" || $(this).val() == $(this).attr("title")) && $(this).hasClass("req")) {
				if (!$(this).parent().hasClass('help_out')) {
					$(this).addClass("not_fill");
				} else {
					$(this).parent().addClass("not_fill");
				}
				return_value = false;
				if ($(obj + " .not_fill:first input").length != 0) {
					$(obj + " .not_fill:first input").focus();
				} else {
					$(obj + " .not_fill:first").focus();
				}
			}
		});
		if ($(obj + " input[name=email]").length != 0 && !/^([a-zA-Z--0-9_\.\-])+\@(([a-zA-Z--0-9\-])+\.)+([a-zA-Z--0-9]{2,4})+$/.test($(obj + " input[name=email]").val())) {
			if (!$(obj + " input[name=email]").parent().hasClass('help_out')) {
				$(obj + " input[name=email]").addClass("not_fill");
			} else {
				$(obj + " input[name=email]").parent().addClass("not_fill");
			}
			return_value = false;
		}
		return return_value;
	}

	function strip_tags(input, allowed) {
		allowed = (((allowed || "") + "").toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join('');
		var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
			commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
		input = input.replace(/&nbsp;/gi, '');
		return input.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) {
			return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
		});
	}

	function get_cookie(name) {
		cookie_name = name + "=";
		cookie_length = document.cookie.length;
		cookie_begin = 0;
		while (cookie_begin < cookie_length) {
			value_begin = cookie_begin + cookie_name.length;
			if (document.cookie.substring(cookie_begin, value_begin) == cookie_name) {
				var value_end = document.cookie.indexOf(";", value_begin);
				if (value_end == -1) {
					value_end = cookie_length;
				}
				return unescape(document.cookie.substring(value_begin, value_end));
			}
			cookie_begin = document.cookie.indexOf(" ", cookie_begin) + 1;
			if (cookie_begin == 0) {
				break;
			}
		}
		return null;
	}

	function setCookie(name, value) {
		var expiresDate = new Date();
		expiresDate.setTime(expiresDate.getTime() + 30 * 24 * 60 * 60 * 1000);
		var expires = expiresDate.toGMTString();
		var newCookie = name + "=" + value + "; path=/; expires=" + expires;
		document.cookie = newCookie + ";";
	}

	function card_add(obj, price, type) {
		if ($("#add_quant_inp").length == 0) {
			var quant = 1;
		}
		else {
			var quant = parseInt($("#add_quant_inp").val());
		}
		if ($('#products_sub input:checked').length == 0) {
			var sub = 0;
			price = parseInt(price);
		} else {
			var sub = $('#products_sub input:checked').val();
			price = parseInt($('.text_td .price span').text());
		}
		if (quant != 0 && quant != null) {
			var cooker;
			if (sub == 0) {
				var obj_val = obj;
			}
			else {
				var obj_val = obj + '-' + sub;
			}
			for (var i = 1; i <= quant; i++) {
				var cook = get_cookie("basket");
				if (cook != null && cook != "") {
					cooker = cook + "," + obj_val;
				}
				else {
					cooker = obj_val;
				}
				setCookie("basket", cooker);
			}
			var cook = get_cookie("basket_price");
			if (cook != null && cook != "") {
				cook = parseInt(cook);
				var pricer = (price * quant) + cook;
			}
			else {
				var pricer = price * quant;
			}
			var total_count = get_cookie("basket").split(',').length;
			$("#quick_basket .count").text(total_count);
			if ($("#quick_basket").find('.empty').length != 0) {
				$("#quick_basket .empty").hide();
				$("#quick_basket .card11").show();
				$("#quick_basket .quant").text(total_count);
				$("#quick_basket .price .price").text(pricer);
				setCookie("basket_price", pricer);
			}
			else {
				$("#quick_basket .quant").text(total_count);
				$("#quick_basket .price .price").text(pricer);
				setCookie("basket_price", pricer);
			}
			var count_all = $("#quick_basket .text .quant").text();
			$("#quick_basket .text .word").text(word_end(count_all));
			$("#quick_basket .bask_img").attr('href', 'basket.html');
			var final_t = Math.ceil($('#quick_basket').offset().top);
			var final_l = Math.ceil($('#quick_basket').offset().left);
			$("#prod_" + obj).stop(true, true).fadeOut(0).fadeIn();
			$("#prod_" + obj + " .go_basket").stop(true, true).fadeIn();
			if (type == 1) {
				var anim_obj = $("#prod_" + obj + " .pict");
			}
			else if (type == 2) {
				var anim_obj = $("#pict_box img");
			}
			else if (type == 3) {
				var anim_obj = $("#special_" + obj);
			}
			if (anim_obj.length != 0 /*&& type!=3*/) {
				anim_obj.clone()
					.appendTo("body")
					.addClass('anim_pict')
					.css({
						position: 'absolute',
						'z-index': 50,
						opacity: 0.6,
						top: Math.ceil($(anim_obj).offset().top),
						left: Math.ceil($(anim_obj).offset().left)
					})
					.animate({top: final_t, left: final_l, width: 0, height: 0}, 500, function () {
						$(this).remove();
					});
			}
		}
	}

	function word_end(counted_word) {
		var word_lenght = counted_word.length;
		var last1 = counted_word.substring(word_lenght - 1, word_lenght);
		var last2 = counted_word.substring(word_lenght - 2, word_lenght);
		var last3 = counted_word.substring(word_lenght - 3, word_lenght);
		var word = '';
		if ((word_lenght != 1 && counted_word.substring(0, 1) == '1') || last1 >= '5' || last3 == '000' || last1 == '0') {
			word = '';
		}
		else if (last1 == 1) {
			word = '';
		}
		else {
			word = '';
		}
		return word;
	}

	function city_change() {
		var city = parseInt($('.cities1#cities').val());
		setCookie("city", city);
		$('.phones#phones1 .active, .grafik#grafik1 .active').removeClass('active');
		$('.phones#phones1 .phone_' + city + ', .grafik#grafik1 .grafik_' + city).addClass('active');
	}

	function city_change2() {
		var city = parseInt($('#cities.cities2').val());
		setCookie("city", city);
		$('.phones#phones2 .active, .grafik#grafik2 .active').removeClass('active');
		$('.phones#phones2 .phone_' + city + ', .grafik#grafik2 .grafik_' + city).addClass('active');

	}

	$(document).ready(function () {
		$('#go_top').click(function () {
			$(window).scrollTop(0);
		})
	})
	$(window).scroll(function () {
		go_top();
	})
	$(window).resize(function () {
		go_top();
	})

	function go_top() {
		var top_pos = $(this).scrollTop();
		var bot_pos = $(document).height() - $(window).height() - top_pos;
		var bot_val;
		if (top_pos > 100) {
			$('#go_top').stop(true, true).fadeIn();
		} else {
			$('#go_top').stop(true, true).fadeOut();
		}
		if (bot_pos <= 130) {
			bot_val = 130 - bot_pos;
			if (bot_val < 10) {
				bot_val = 10;
			}
			$('#go_top').css('bottom', bot_val + 'px');
		}
		else {
			$('#go_top').css('bottom', '10px');
		}
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
