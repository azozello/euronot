<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Системный блок Dell Precision T3500. Evronot.com.ua</title>
	<meta name="description"
	      content="Системный блок Dell Precision T3500, характеристики: Intel Xeon X5660 / 2.8GHz / 4Гб / 500GB"/>
	<meta name="keywords"
	      content="Системный блок Dell Precision T3500, цена, Dell Precision T3500 в Киеве, Dell Precision T3500 бу, Системные блоки Dell."/>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link href="images/favicon.ico" rel="icon" type="image/x-icon">
	<script src="{{ asset('index_app/js/jquery.min.js') }}"></script>
	<link href="{{ asset('index_app/css/main.css') }} " rel="stylesheet"/>
	<link href="{{ asset('index_app/css/bootstrap.min.css') }} " rel="stylesheet"/>
	<!-- End Facebook Pixel Code -->
</head>
@include('layouts.site.header')
		<div class="menu-row row hidden-md-down">
			<nav class="navbar navbar-light bg-faded">
				<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
				        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
				        aria-label="Toggle navigation"></button>
				<div class="collapse navbar-toggleable-md" id="navbarResponsive">
					<ul class="nav nav-bar main-menu">
						<li><a href="products_cat-b_u_noutbuki.html"><span class="sprite sprite-menu-icon-1"></span>Ноутбуки
						                                                                                            б/у</a>
						</li>
						<li><a href="products_cat-sistemnie_bloki.html"><span class="sprite sprite-menu-icon-2"></span>Системные
						                                                                                               блоки
						                                                                                               б/у</a>
						</li>
						<li><a href="products_cat-monitori.html"><span class="sprite sprite-menu-icon-3"></span>Мониторы
						                                                                                        б/у</a>
						</li>
						<li><a href="products_cat-doc_stancii.html"><span class="sprite sprite-menu-icon-4"></span>Принтеры
						                                                                                           (NEW)</a>
						</li>
						<li><a href="products_cat-remont noutbukov.html"><span
								class="sprite sprite-menu-icon-5"></span>Док Станции б/у</a></li>
						<li><a href="#"><span class="sprite sprite-menu-icon-2"></span>Игровые системники</a></li>
					</ul>

				</div>
			</nav>
		</div>
	</div>
</div>
<div class="content container-fluid other">
	<div class="container">
		<script type="text/javascript" src="plugins/mousewheel.js"></script>
		<script type="text/javascript" src="plugins/fancybox.js"></script>
		<script type="text/javascript" src="plugins/fancybox-thumbs.js"></script>
		<link href="css/fancybox.css" rel="stylesheet" type="text/css" media="screen"/>
		<script type="text/javascript">
			$(document).ready(function () {
				$("#buy_block .quant_down").click(function () {
					var inp_val = parseInt($(this).parent().find('input').val());
					if (inp_val != 0 && inp_val != null) {
						$(this).parent().find('input').val(--inp_val);
					}
				})
				$("#buy_block .quant_up").click(function () {
					var inp_val = parseInt($(this).parent().find('input').val());
					if (inp_val == null) {
						$(this).parent().find('input').val(1);
					}
					else {
						$(this).parent().find('input').val(++inp_val);
					}
				})
				$('#products_sub input:checked').removeAttr('checked');
				$('#products_sub input').change(function () {
					$('#chose_msg').slideUp();
					$('#buy_block').slideDown();
					var sub_pr = $(this).parents('tr').find('.sub_price').text();
					$('.text_td .price').html('<span>' + sub_pr + '</span> грн&nbsp<span class="skidka" style="margin-bottom:-4px;"> </span>');
				})

				$('#products_in .pict').fancybox({
					openEffect: 'elastic',
					openSpeed: 150,
					closeEffect: 'elastic',
					closeSpeed: 150,
					helpers: {
						title: {type: 'outside'},
						overlay: {
							speedIn: 500,
							opacity: 0.8
						}
					}
				});

				$('#products_in .text_block table tr').first().addClass('first_tr');
				$('#products_in .text_block table tr').last().addClass('last_tr');
				var i = 1;
				$('#products_in .text_block table tr').each(function () {
					$(this).find('td').first().addClass('left_pr_td');
					$(this).find('td').last().addClass('right_pr_td');
					if (i % 2 == 0) {
						$(this).find('td').last().addClass('orange');
					}
					i++;
				});


			})
		</script>
		<div id="products_in" itemscope itemtype="http://schema.org/Product">
			<div id="breadcrumbs" class="hidden-sm-down">
				<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span
						itemprop="title">Компьютерная техника бу</span></a>&nbsp;&nbsp;>&nbsp;&nbsp;<span
						itemprop="child" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a
						href="products_cat-sistemnie_bloki.html" class="last" itemprop="url"><span itemprop="title">Системные блоки б/у</span></a></span></span>
			</div>
			<div class="clear"></div>
			<div class="row">
				<div class="col-lg-6 pict-block">
						@if(isset($images[0]))
							<div id="pict_box" class="pict" href="../product_images/{{$images[0]->image}}"
								 data-fancybox-group="gallery" title="">
								<div class="varanty">
									@if($product[0]->product_garanty == '3 месяца')
									<img src="../index_app/images/varanty-3.png" title="гарантия" alt="гарантия"/>
									@endif
										@if($product[0]->product_garanty == '6 месяцев')
											<img src="../index_app/images/varanty-6.png" title="гарантия" alt="гарантия"/>
										@endif
										@if($product[0]->product_garanty == '12 месяцев')
											<img src="../index_app/images/varanty-12.png" title="гарантия" alt="гарантия"/>
										@endif
								</div>
								<img alt="" title="" src="../product_images/{{$images[0]->image}}"/>

							</div>
						@endif
						<div id="pict_line">
							@foreach($images as $k=>$image)
								@if($k!=0)
									<div class="block pict" href="../product_images/{{$image->image}}"
										 data-fancybox-group="gallery" title="">
										<div class="in_block">
											<img alt="" title="" src="../product_images/{{$image->image}}"/>
										</div>
									</div>
								@endif
							@endforeach
							<div class="clear"></div>
						</div>

					<!-- <div id="specblock">

	 <div class="clear"></div>
	 </div> -->
				</div>
				<div class="col-lg-6">
					<div class="label-block">
						@if(!is_null($product[0]->product_status))
						<div class="label-prod top">{{$product[0]->product_status}}</div>
						@endif
						<div class="clear"></div>
					</div>
					<h1 class="prod_title" itemprop="name">{{$product[0]->name}}</h1>
					<div class="row prod-block-2">
						<div class="col-lg-6 block-left">
							<div class="avail">{{$product[0]->product_isset}}</div>
							<div class="rating_block">
								<div class="rating_title"> Оценка пользователей:</div>
								<div class="rating">
									<script type="text/javascript">
										$(document).ready(function () {
											$(".rating").on("mouseover", "div.not_rated", function () {
												var hide_id = $(this).attr("id");
												if ($("#" + hide_id).hasClass("not_rated")) {
													$("#" + hide_id + " .rate_hide").hide();
													$("#" + hide_id + " .rate").show();

													$("#" + hide_id + " .rate .star5").hover(
														function () {
															var str = $(this).attr("id");
															var fields = $("#" + hide_id + " .rate .star5");
															$.each(fields, function (index) {
																if ($(this).attr("id") < str) {
																	$(this).addClass(" active");
																}
																else {
																	$(this).removeClass(" active");
																}
															});
															$(this).addClass(" active");
														});
												}
											})

											$(".rating").on("mouseout", "div.not_rated", function () {
												var hide_id = $(this).attr("id");
												$("#" + hide_id + " .rate_hide").show();
												$("#" + hide_id + " .rate").hide();
											})
										});

										function rate_it(val, obj) {
											$("#star_box" + obj).removeClass("not_rated");
											$("#star_box" + obj + " .rate").remove();
											$("#star_box" + obj + " .rate_hide").show();
										}
									</script>
									<div class="star_box not_rated" id="star_box263">
										<div class="rate_hide">
											@if($product[0]->product_stars == '5 звезд')
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
												<div class="star5 star active"></div>
											@endif
											@if($product[0]->product_stars == '4 звезды')
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
												<div class="star5 star"></div>
											@endif
											@if($product[0]->product_stars == '3 звезды')
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star"></div>
												<div class="star5 star"></div>
											@endif
											@if($product[0]->product_stars == '2 звезды')
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star"></div>
												<div class="star4 star"></div>
												<div class="star5 star"></div>
											@endif
											@if($product[0]->product_stars == '1 звезда')
												<div class="star1 star active"></div>
												<div class="star2 star"></div>
												<div class="star3 star"></div>
												<div class="star4 star"></div>
												<div class="star5 star"></div>
											@endif
										</div>
										<div class="rate" style="display:none;">
											<div class="star5" id="1" onclick="rate_it('1','263')"></div>
											<div class="star5" id="2" onclick="rate_it('2','263')"></div>
											<div class="star5" id="3" onclick="rate_it('3','263')"></div>
											<div class="star5" id="4" onclick="rate_it('4','263')"></div>
											<div class="star5" id="5" onclick="rate_it('5','263')"></div>
										</div>
									</div>

									<div class="clear"></div>
								</div>
							</div>
						</div>
						@if(!is_null($product_gift[0]))
						<div class="col-lg-8 action_block">
							<div class="action_product">
								<img src="../product_images/{{$product_gift[0]->image}}">
								<p>{{$product[0]->product_gift_text}}</p>
							</div>
							<div class="time_produkt">
								<span class="text_time">До конца осталось:</span>
								<span class="time_time_pr">
									<span class="dey_prod">{{$timer_days}} :
										<p class="text_pod">Дни</p>
									</span>

									<span class="dey_prod">{{$timer_hours}} :
										<p class="text_pod">Часы</p>
									</span>
									<span class="dey_prod">{{$timer_minutes}} :
										<p class="text_pod">Мин</p>
									</span>
									<span class="dey_prod">{{$timer_seconds}}
										<p class="text_pod">Сек</p>
									</span>
								</span>

							</div>
						</div>
						@endif
						<div class="haract-block">
							@if(!is_null($proc))
								<div class="block_flex_pr">
									<div>
										<img src="../index_app/images/cpu.png">
									</div>
									<div class="text-flex"><span class="hover_block_pr">Процесор:
								<p class="hidden_text_pr">{{$product[0]->proc}}</p>
								</span>
										<select>
											@foreach($proc as $proc_item)
												@if(!is_null($proc_item->configuration))
											<option value="{{$proc_item->configuration_price}}">{{$proc_item->configuration}}</option>
												@endif
											@endforeach
										</select>
									</div>
								</div>
							@endif
							@if(!is_null($op_memory))
								<div class="block_flex_pr">
									<div>
										<img src="../index_app/images/ozu.png">
									</div>
									<div class="text-flex"><span class="hover_block_pr">Оперативна пам’ять:
								<p class="hidden_text_pr">{{$product[0]->op_memory}}</p>
								 </span>
										<select>
											@foreach($op_memory as $op_memory_item)
												@if(!is_null($op_memory_item->configuration))
												<option value="{{$op_memory_item->configuration_price}}">{{$op_memory_item->configuration}}</option>
												@endif
													@endforeach
										</select>
									</div>

								</div>
							@endif
							@if(!is_null($hard))
								<div class="block_flex_pr">
									<div>
										<img src="../index_app/images/ssd.png">
									</div>
									<div class="text-flex"><span  class="hover_block_pr">Жорсткий диск:
								<p class="hidden_text_pr">{{$product[0]->hard_memory}}</p>
								</span>
										<select onchange="city_change();">
											@foreach($hard as $hard_item)
												@if(!is_null($hard_item->configuration))
												<option value="{{$hard_item->configuration_price}}">{{$hard_item->configuration}}</option>
												@endif
													@endforeach
										</select>
									</div>

								</div>
							@endif
								@if(!is_null($product[0]->op_system_description))
								<div class="block_flex_pr">
									<div>
										<img src="../index_app/images/win.png">
									</div>
									<div class="text-flex"><span class="hover_block_pr">Windows:
									<p class="hidden_text_pr">{{$product[0]->op_system_description}}</p>
									 </span>{{$product[0]->op_system}}</div>

								</div>
									@endif

						</div>

					</div>
					<div class="buy_line" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						<div class="price"><span itemprop="price">
                        {{$product[0]->price}}</span> <span itemprop="priceCurrency" content="UAH">грн</span></div>
						<div id="buy_block">
							<div class="quant_block">
								<input type="text" size="3" value="1" id="add_quant_inp"/>
							</div>
							<div class="clear"></div>
						</div>
						<div class="buy_button_block">
							<div class="add_to_basket_btn" onclick="card_add('263','{{$product[0]->price}}','2')">Купить</div>


						</div>
						<div>


							<div class="buy_button_block">
								<div id="rassrochka"><img src="../index_app/images/privat.png" alt="privatbank"/>Доступна <u>«Оплата
									</u>
								</div>
								<div id="kredit">


								<a href="javascript:void(0)" class="" type="button"
								   onclick="if (typeof(kreditmarket_popup_win)!='undefined') kreditmarket_popup_win.close(); kreditmarket_popup_win=window.open('https://agents.kreditmarket.ua/partners/_general/v01/?uid=napm2454576505379&product_id=263&product_name=%D0%A1%D0%B8%D1%81%D1%82%D0%B5%D0%BC%D0%BD%D1%8B%D0%B9+%D0%B1%D0%BB%D0%BE%D0%BA+Dell+Precision+T3500&product_price=8400&product_url=https%3A%2F%2Fevronot.com.ua%2Fproducts-263.html', 'gener','width=780,height=360,top='+((screen.height-360)/2)+',left='+((screen.width-780)/2)+',toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no'); ga('send', 'event', 'Forma1', 'Podtverdit');"
								   style="margin: 5px 50px 0px 0px; text-decoration: inherit;">Выбрать кредит или
								                                                               рассрочку</a>
							</div>

						</div>
						<div class="clear"></div>
						<div class="block-metki clear row">
							<div class="col-sm-3 col-xs-6">
								<img src="../index_app/images/gal_1.png"/>
								<div class="text">Тест от
								                  независимого
								                  сервис-центра
								                  лизингодержателя
								</div>
							</div>
							<div class="col-sm-3 col-xs-6">
								<img src="../index_app/images/gal_2.png"/>
								<div class="text">
									Тест от
									производителя
									на всю технику
								</div>
							</div>
							<div class="col-sm-3 col-xs-6">
								<img src="../index_app/images/gal_3.png"/>
								<div class="text">
									Европейский
									тест сервис-центра дистрибьютора
								</div>
							</div>
							<div class="col-sm-3 col-xs-6">
								<img src="../index_app/images/gal_4.png"/>
								<div class="text">
									Предпродажный
									тест в
									Украине
								</div>
							</div>
						</div>


						<div class="clear"></div>
						<!--- kredit --->

						<div class="clear"></div>
						<!--- //kredit --->

					</div>

				</div>
			</div>
			<div class="row">

				<div id="prod_tabs">
					<div class="bl_titles">
						<a class="block_title t_1 active" id="tab_1"><span>Информация о товаре</span></a>
						<a class="block_title t_2" id="tab_2"><span>Доставка</span></a>
						<a class="block_title t_3 last" id="tab_3"><span>Комментарии</span></a>
						<div class="clear"></div>
					</div>
					<div class="bl_blocks">
						<div class="blocks text_block bl_1 active" id="tab_1_block" itemprop="description">
							<div class="col-lg-6">
								<table border="0" cellspacing="0" cellpadding="0">
									<tbody>
									@foreach($texts as $k=>$text)
										@if(!is_null($text->first_text))
									<tr>
										<td width="193">
											<p><span>{!! $text->first_text !!}</span></p>
										</td>
										<td width="433">
											<p><span>{!! $text->second_text !!}</span></p>
										</td>
									</tr>
									@endif
										@endforeach
									</tbody>
								</table>
							</div>
							<div class="col-lg-6">

								<p>&nbsp;</p>
								<p>Подробную конфигурацию уточняйте у менеджера. Характеристики могут отличаться от
								   представленных на сайте.</p></div>
							<div class="clear"></div>
						</div>
						<div class="blocks text_block bl_2" id="tab_2_block">
							<p>Варианты доставки:</p>
							<ul>
								<li><span style="font-family: 'arial black', 'avant garde';"><strong>Самовывоз</strong></span>
								</li>
							</ul>
							<p><span style="font-family: arial, helvetica, sans-serif;">Самовывоз производится из магазина нашей сети, по адресу: г.Киев, Московский проспект16а (при предварительном согласовании с менеджером).&nbsp;</span>
							</p>
							<ul>
								<li><span
										style="font-family: 'arial black', 'avant garde';"><strong>Доставка курьером</strong></span>
								</li>
							</ul>
							<p><span style="font-family: arial, helvetica, sans-serif;">Доставка осуществляется только по г. Киев. Стоимость доставки 100 грн.</span>
							</p>
							<ul>
								<li><span
										style="font-family: 'arial black', 'avant garde';"><strong>Доставка по Украине</strong></span>
								</li>
							</ul>
							<p><span style="font-family: arial, helvetica, sans-serif;">Доставка осуществляется&nbsp;транспортной компанией "<a
									href="http://novaposhta.ua/" target="_blank">Новая почта</a>".</span></p>
							<div class="clear"></div>
						</div>
						<div class="blocks bl_3" id="tab_3_block">
							<script type="text/javascript">
								$(document).ready(function () {
									$(".add_block :input").keyup(function () {
										check_fill(".add_block");
									})
									$(".add_block :input").focusout(function () {
										check_fill(".add_block");
									})


								})

								function sender(obj_id) {
									var obj = ".add_block";
									var return_value = true;
									return_value = check_empty("." + obj + ".bl" + obj_id);
									var text = $("." + obj + ".bl" + obj_id + " textarea").val();
									text = strip_tags(text);
									text = text.trim();
									if (text == '') {
										$("." + obj + ".bl" + obj_id + " textarea").addClass("not_fill");
										return_value = false;
									}
									if (return_value == true) {
										var data = $(obj + " :input").serialize();
										$.ajax({
											type: "POST",
											url: "parts/handler.php?" + data,
											dataType: 'text',
											cache: false,
											data: {
												ev: "comment_add",
												text: text,
												type: 'products',
												obj: '263',
												answ: obj_id
											},
											beforeSend: function () {
												$("." + obj + ".bl" + obj_id + ' .send').hide();
											},
											success: function (res) {
												if (res == 'Успешно добавлено') {
													$("." + obj + ".bl" + obj_id).html('<div class="tnx_msg">Спасибо. После проверки модеротором, ваш комментарий появится на сайте</div>');
												} else {
													alert('Произошла ошибка, обратитесь к администратору');
												}
											}
										});
									}
								}

								function hider_com(obj) {
									if ($("#comments .hide.bl" + obj).css('display') == 'none') {
										$("#comments .hide.bl" + obj).slideDown("slow");
										$("#comments .ans" + obj).text('скрыть');
									}
									else {
										$("#comments .hide.bl" + obj).slideUp("slow");
										$("#comments .ans" + obj).text('ответить');
									}
								}

								function open_com(obj) {
									$("#comments .hide.bl" + obj).show();
								}
							</script>
							<div id="comments" class="comments_blocks">
								<div class="first_line">
									<div class="right"><a href="#comment_place">Добавить</a></div>
									Комментарии ({{$comment_count}})
								</div>
								<div class="list">
									@if(count($comments) !=0 )
										@foreach($comments as $comment)
									<div class="block tr1 txtbl35" style="margin-left: 0px;" itemprop="review" itemscope="" itemtype="http://schema.org/Review">
										<div class="first">
											<span class="name" itemprop="author">{{$comment->comment_name}}</span>,
											<span class="date" itemprop="datePublished">{{$comment->comment_date}} {{$comment->comment_time}}</span>
										</div>
										<div class="text" itemprop="description">{!! $comment->comment !!}</div>
										<div class="clear"></div>
									</div>
										@endforeach
										@endif
								</div>
								<div class="add_block bl0 botter">
									<a id="comment_place"></a>
									<div class="main">
										<form role="form" method="post" action="{{ route('add_comment') }}" enctype="multipart/form-data">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<input name="product_id" type="hidden" value="{{ $product[0]->product_id }}">
										<div class="comment_title">Добавить комментарий</div>
										<div class="row comments-row">
											<div class="col-md-6 col-xs-12">
												<input type="text" class="req" name="name" title="Имя" placeholder="Имя"
												       value=""/><br/>
											</div>
											<div class="col-md-6 col-xs-12">
												<input type="text" class="req" name="email" title="E-mail"
												       placeholder="E-mail" value=""/>
											</div>
											<div class="col-xs-12">
												<textarea title="Ваш комментарий" name="comment" placeholder="Ваш комментарий"
												          class="req"></textarea>
											</div>
											<div class="col-xs-12">
												<button type="submit" class="send">Отправить</button>
											</div>
										</div>
										</form>

										<div class="clear"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
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
			<div class="similar_title inner">Похожие товары:</div>
			<div id="product_similar" class="products_list inner products row">
               @foreach($same_products as $same_product)
				   @foreach($same_product as $product)
				<div class="col-lg-3 col-md-4 col-xs-6">
					<div class="product ">
						<div class="image">

							<a href="/products/{{$product->url}}">
								<img alt="Системный блок HP USDT dc7700" title="Системный блок HP USDT dc7700"
								     src="../product_images/{{$product->image}}"/>
							</a>

						</div>
						<a href="/products/{{$product->url}}">
							<div class="name">{{$product->name}}</div>
						</a>
						<div class="line"></div>
						<div class="price">{{$product->price}} грн</div>
					</div>
					<div class="product product-hover">
						<div class="image">

							<a href="/products/{{$product->url}}">
								<img alt="Системный блок HP USDT dc7700" title="Системный блок HP USDT dc7700"
								     src="../product_images/{{$product->image}}"/>
							</a>

						</div>
						<a href="/products/{{$product->url}}">
							<div class="name">{{$product->name}}</div>
						</a>
						<div class="line"></div>
						<div class="price">{{$product->price}} грн</div>
						<div class="rating_block">
							<div class="rating">
								<div class="star_box not_rated" id="star_box192">
									<div class="rate_hide">
										@if($product->product_stars == '5 звезд')
											<div class="star1 star active"></div>
											<div class="star2 star active"></div>
											<div class="star3 star active"></div>
											<div class="star4 star active"></div>
											<div class="star5 star active"></div>
										@endif
										@if($product->product_stars == '4 звезды')
											<div class="star1 star active"></div>
											<div class="star2 star active"></div>
											<div class="star3 star active"></div>
											<div class="star4 star active"></div>
											<div class="star5 star"></div>
										@endif
										@if($product->product_stars == '3 звезды')
											<div class="star1 star active"></div>
											<div class="star2 star active"></div>
											<div class="star3 star active"></div>
											<div class="star4 star"></div>
											<div class="star5 star"></div>
										@endif
										@if($product->product_stars == '2 звезды')
											<div class="star1 star active"></div>
											<div class="star2 star active"></div>
											<div class="star3 star"></div>
											<div class="star4 star"></div>
											<div class="star5 star"></div>
										@endif
										@if($product->product_stars == '1 звезда')
											<div class="star1 star active"></div>
											<div class="star2 star"></div>
											<div class="star3 star"></div>
											<div class="star4 star"></div>
											<div class="star5 star"></div>
										@endif
									</div>
								</div>

								<div class="clear"></div>
							</div>
						</div>
						<div class="title_dop">{{$product->short_description}}
						</div>
					</div>
				</div>
					@endforeach
				   @endforeach
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
	$(window).scroll(function(){go_top();});
	$(window).resize(function(){go_top();});
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
