<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Ноутбуки б/у из Германии. Купить ноутбук бу в магазине Evronot.com.ua (044) 383 16 83</title>
	<meta name="description"
	      content="Ноутбуки б/у бизнес класса из Германии с высоким качеством и производительностью. Гарантия на все модели. Evronot.com.ua"/>
	<meta name="keywords"
	      content="Ноутбуки б/у Киев, купить бу ноутбук Петровка, ноутбук бу Днепр, доставка по Украине, наличный расчет, безналичный расчет,"/>
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
		<script type="text/javascript">
			$(document).ready(function () {
				$("#type_ch").change(function () {
					if ($(this).val() != 0) {
						location.replace("/products_cat-b_u_noutbuki-az" + $(this).val() + ".html");
					}
					else {
						location.replace("/products_cat-b_u_noutbuki.html");
					}
				})
				$("#num_select span:not(.active)").click(function () {
					setCookie('num', $(this).attr('alt'));
					location.reload();
				})
			})
		</script>
		<div id="products" class="products_list">
			<div class="main_tbl table row">
				<div class="filter-button">Фильтр</div>
				<div class="left_side col-lg-3 filter-block">

					<script type="text/javascript">
						$(document).ready(function () {
							$(".filter_btn").click(function () {

								if ($(this).find('input').attr('checked')) {
									$(this).find('input').removeAttr('checked');
								} else {
									$(this).find('input').attr('checked', 'checked');
								}
								var link = '';
								var i = 1;
								var arr = $('.filter_btn :checked');
								if (arr.length > 0) {
									arr.each(function () {
										link += $(this).val();
										if (i < arr.length) {
											link += ',';
										}
										i++;
									});
									link = '-fltr_' + link;
								}

								$('#products .products_box').html('<div class="loader" style="display:block!important;"><img alt="" title="" src="../index_app/images/loader.gif"/></div>');


								location.replace("/products_cat-b_u_noutbuki" + link + ".html");
							})
						})
					</script>
					<div class="left_block filter">
						<div class="filter_title">Цена:</div>
						<div class="filter_list">
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="1:14"/>до 1000грн. <span
									class="cnt">(1)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="1:13"/>от 1000 до 2000 <span
									class="cnt">(1)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="1:12"/>от 2000 до 3000грн. <span
									class="cnt">(3)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="1:11"/>от 3000 до 5000грн. <span
									class="cnt">(28)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="1:10"/>от 5000грн. и более <span
									class="cnt">(87)</span></div></span></div>
						</div>
					</div>
					<div class="left_block filter">
						<div class="filter_title">Производитель:</div>
						<div class="filter_list">
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="2:50"/>Fujitsu <span
									class="cnt">(6)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="2:49"/>Getac <span class="cnt">(1)</span></div></span>
							</div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="2:24"/>Dell <span class="cnt">(26)</span></div></span>
							</div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="2:34"/>Fujitsu-Siemens <span
									class="cnt">(12)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="2:3"/>HP <span
									class="cnt">(26)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="2:25"/>IBM / Lenovo <span
									class="cnt">(27)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="2:1"/>Panasonic <span
									class="cnt">(16)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="2:43"/>Samsung <span
									class="cnt">(1)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="2:26"/>Toshiba <span
									class="cnt">(4)</span></div></span></div>
						</div>
					</div>
					<div class="left_block filter">
						<div class="filter_title">Диагональ экрана:</div>
						<div class="filter_list">
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="3:15"/>10&quot;-12,5&quot; <span
									class="cnt">(20)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="3:16"/>12,5&quot;-13,5&quot; <span
									class="cnt">(15)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="3:17"/>14&quot;-15,6&quot; <span
									class="cnt">(79)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="3:27"/>16&quot;-17,5&quot; <span
									class="cnt">(2)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="3:28"/>18&quot;-22&quot; <span
									class="cnt">(1)</span></div></span></div>
						</div>
					</div>
					<div class="left_block filter">
						<div class="filter_title">Процессор:</div>
						<div class="filter_list">
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="5:30"/>Intel Core i3 <span
									class="cnt">(7)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="5:45"/>Intel Core i5 <span
									class="cnt">(55)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="5:46"/>Intel Core i7 <span
									class="cnt">(14)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="5:33"/>AMD <span
									class="cnt">(1)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="5:32"/>Intel Pentium M/Core Solo <span
									class="cnt">(3)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="5:29"/>Intel Core Duo/Core2 Duo <span
									class="cnt">(36)</span></div></span></div>
						</div>
					</div>
					<div class="left_block filter">
						<div class="filter_title">Количество ядер:</div>
						<div class="filter_list">
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="4:48"/>2 ядра / 4 потока <span
									class="cnt">(67)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="4:47"/>4 ядра 8 потоков <span
									class="cnt">(8)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="4:18"/>1 <span
									class="cnt">(3)</span></div></span></div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox" value="4:19"/>2 <span
									class="cnt">(39)</span></div></span></div>
						</div>
					</div>
					<div class="left_block filter">
						<div class="filter_title">Объем памяти:</div>
						<div class="filter_list">
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="6:35"/>1 ГБ <span class="cnt">(5)</span></div></span>
							</div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="6:36"/>2 ГБ <span class="cnt">(20)</span></div></span>
							</div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="6:38"/>4 ГБ <span class="cnt">(67)</span></div></span>
							</div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="6:42"/>6 ГБ <span class="cnt">(2)</span></div></span>
							</div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="6:39"/>8 ГБ <span class="cnt">(18)</span></div></span>
							</div>
							<div class="check_block"><span class="checkbox_label filter_btn"><span
									class="checkbox"></span><div><input name="br" type="checkbox"
							                                            value="6:40"/>16 ГБ <span class="cnt">(4)</span></div></span>
							</div>
						</div>
					</div>
					<div class="clear"></div>

				</div>


				<div class="right_side col-lg-9 col-xs-12">
					<div class="hidden-md-down">
						<div id="breadcrumbs" class="hidden-sm-down">
							<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/" itemprop="url"><span
									itemprop="title">Компьютерная техника бу</span></a>&nbsp;&nbsp;>&nbsp;&nbsp;<span>Ноутбуки б/у</span></span>
						</div>
					</div>
					<h1 class="page_title">Ноутбуки б/у</h1>
					<div class="page_text"><p>Продаём пост лизинговые ноутбуки из европы по очень выгодным ценам, с
					                          гарантией и доставкой без предоплаты. Все ноутбуки прошли тестирование и
					                          проверку, кроме того их качество значительно выше чем у новых ноутбуков
					                          продаваемых в магазинах Украины.</p>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
					<div class="second_line">

						<select id="type_ch" name="type_ch">
							<option value="0">Сортировка по умолчанию</option>
							<option value="1">Сортировка по цене (0-9)</option>
							<option value="2">Сортировка по цене (9-0)</option>
							<option value="3">Сортировка по названию (а-я)</option>
							<option value="4">Сортировка по названию (я-а)</option>
						</select>
						<div class="founded hidden-md-down">Найдено:
							<span>120 товаров</span>
						</div>
						<div id="num_select" class="hidden-md-down">Товаров на странице:&nbsp;
							<span class="active" alt="12">12</span>&nbsp;&nbsp;<span alt="24">24</span>&nbsp;&nbsp;<span
									alt="48">48</span></div>
						<div class="clear"></div>
					</div>
					<div class="products_box products">

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-306.html">
										<div class="label-block">
											<div class="label-prod super">Суперцена</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
										     title="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
										     src="../index_app/images/pictures/products/20171120174051535.jpg"/>
									</a>

								</div>
								<a href="products-306.html">
									<div class="name">Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)
									</div>
								</a>
								<div class="line"></div>
								<div class="price">3'900 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-306.html">
										<div class="label-block">
											<div class="label-prod super">Суперцена</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
										     title="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
										     src="../index_app/images/pictures/products/20171120174051535.jpg"/>
									</a>

								</div>
								<a href="products-306.html">
									<div class="name">Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)
									</div>
								</a>
								<div class="line"></div>
								<div class="price">3'900 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box306">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star"></div>
												<div class="star5 star"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">13.3&quot; / (1280 x 800) / Core 2 Duo P8700 2530 MHz/ 4096Mb /
								                       120Gb / Wi-Fi / DVD-RW / Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">Core2Duo</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">4096 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">120 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-301.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук Fujitsu E753" title="Ноутбук Fujitsu E753"
										     src="../index_app/images/pictures/products/20171018105032805.jpg"/>
									</a>

								</div>
								<a href="products-301.html">
									<div class="name">Ноутбук Fujitsu E753</div>
								</a>
								<div class="line"></div>
								<div class="price">14'050 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-301.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук Fujitsu E753" title="Ноутбук Fujitsu E753"
										     src="../index_app/images/pictures/products/20171018105032805.jpg"/>
									</a>

								</div>
								<a href="products-301.html">
									<div class="name">Ноутбук Fujitsu E753</div>
								</a>
								<div class="line"></div>
								<div class="price">14'050 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box301">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
												<div class="star5 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">15,6&quot; WXGA 1920x1080 Full HD / Intel Core i5-3340M 2,7 ГГц /
								                       RAM 8 ГБ /256 SSD ГБ /Intel HD Graphics 4000/ Wi-Fi / Bluetooth /
								                       Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">8192 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/ssd.png">
										<div class="text">256</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-300.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук HP 2570p" title="Ноутбук HP 2570p"
										     src="../index_app/images/pictures/products/20171011121324735.jpg"/>
									</a>

								</div>
								<a href="products-300.html">
									<div class="name">Ноутбук HP 2570p</div>
								</a>
								<div class="line"></div>
								<div class="price">8'350 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-300.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук HP 2570p" title="Ноутбук HP 2570p"
										     src="../index_app/images/pictures/products/20171011121324735.jpg"/>
									</a>

								</div>
								<a href="products-300.html">
									<div class="name">Ноутбук HP 2570p</div>
								</a>
								<div class="line"></div>
								<div class="price">8'350 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box300">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star"></div>
												<div class="star5 star"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">12.5&quot; WXGA 1366x768 HD LED / Intel Core i5-3320M 2,6 ГГц /
								                       RAM 4 ГБ /500 HDD ГБ /Intel® HD Graphics 4000/ Wi-Fi / Bluetooth
								                       / Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">4096 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">500 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-299.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук HP 8540W" title="Ноутбук HP 8540W"
										     src="../index_app/images/pictures/products/20171011104242453.jpg"/>
									</a>

								</div>
								<a href="products-299.html">
									<div class="name">Ноутбук HP 8540W</div>
								</a>
								<div class="line"></div>
								<div class="price">9'300 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-299.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук HP 8540W" title="Ноутбук HP 8540W"
										     src="../index_app/images/pictures/products/20171011104242453.jpg"/>
									</a>

								</div>
								<a href="products-299.html">
									<div class="name">Ноутбук HP 8540W</div>
								</a>
								<div class="line"></div>
								<div class="price">9'300 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box299">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
												<div class="star5 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">15,6&quot; WXGA 1920x1080 HD LED / Intel Core i5-M540 2,53 ГГц /
								                       RAM 8 ГБ /500 HDD ГБ /Nvidia Quadro FX880m 1Gb 128 bit/ Wi-Fi /
								                       Bluetooth / Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">8192 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">500 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-298.html">
										<div class="label-block">
											<div class="label-prod prodano">Продано</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук Fujitsu E782" title="Ноутбук Fujitsu E782"
										     src="../index_app/images/pictures/products/20171011102915652.jpg"/>
									</a>

								</div>
								<a href="products-298.html">
									<div class="name">Ноутбук Fujitsu E782</div>
								</a>
								<div class="line"></div>
								<div class="price">10'400 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-298.html">
										<div class="label-block">
											<div class="label-prod prodano">Продано</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук Fujitsu E782" title="Ноутбук Fujitsu E782"
										     src="../index_app/images/pictures/products/20171011102915652.jpg"/>
									</a>

								</div>
								<a href="products-298.html">
									<div class="name">Ноутбук Fujitsu E782</div>
								</a>
								<div class="line"></div>
								<div class="price">10'400 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box298">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">15,6&quot; WXGA 1366x768 HD LED / Intel Core i7-3520M 2,9 ГГц /
								                       RAM 8 ГБ /500 HDD ГБ /Intel HD Graphics 4000/ Wi-Fi / Bluetooth /
								                       Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i7</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">8192 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">500 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-297.html">
										<div class="label-block">
											<div class="label-prod prodano">Продано</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук Fujitsu E752" title="Ноутбук Fujitsu E752"
										     src="../index_app/images/pictures/products/20171011100750539.jpg"/>
									</a>

								</div>
								<a href="products-297.html">
									<div class="name">Ноутбук Fujitsu E752</div>
								</a>
								<div class="line"></div>
								<div class="price">9'599 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-297.html">
										<div class="label-block">
											<div class="label-prod prodano">Продано</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук Fujitsu E752" title="Ноутбук Fujitsu E752"
										     src="../index_app/images/pictures/products/20171011100750539.jpg"/>
									</a>

								</div>
								<a href="products-297.html">
									<div class="name">Ноутбук Fujitsu E752</div>
								</a>
								<div class="line"></div>
								<div class="price">9'599 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box297">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
												<div class="star5 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">15,6&quot; WXGA 1600x900 HD LED / Intel Core i5-3230M 2,6 ГГц /
								                       RAM 4 ГБ /500 HDD ГБ /Intel HD Graphics 4000/ Wi-Fi / Bluetooth /
								                       Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">4096 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">500 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-296.html">
										<div class="label-block">
											<div class="label-prod super">Суперцена</div>
											<div class="clear"></div>
										</div>
										<img alt="Ультрабук Dell Latitude E7440" title="Ультрабук Dell Latitude E7440"
										     src="../index_app/images/pictures/products/20171009103031141.jpg"/>
									</a>

								</div>
								<a href="products-296.html">
									<div class="name">Ультрабук Dell Latitude E7440</div>
								</a>
								<div class="line"></div>
								<div class="price">14'100 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-296.html">
										<div class="label-block">
											<div class="label-prod super">Суперцена</div>
											<div class="clear"></div>
										</div>

										<img alt="Ультрабук Dell Latitude E7440" title="Ультрабук Dell Latitude E7440"
										     src="../index_app/images/pictures/products/20171009103031141.jpg"/>
									</a>

								</div>
								<a href="products-296.html">
									<div class="name">Ультрабук Dell Latitude E7440</div>
								</a>
								<div class="line"></div>
								<div class="price">14'100 грн</div>
								<div class="title_dop">14&quot; WXGA 1366x768 HD LED / Intel Core i5-4310U 2,0 ГГц / RAM
								                       8 ГБ /256SSD ГБ /Intel® HD Graphics 4400/ Wi-Fi / Bluetooth / Win
								                       7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">8192 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/ssd.png">
										<div class="text">256</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-295.html">
										<div class="label-block">
											<div class="label-prod prodano">Продано</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук Lenovo ThinkPad L412" title="Ноутбук Lenovo ThinkPad L412"
										     src="../index_app/images/pictures/products/20171009190011581.jpg"/>
									</a>

								</div>
								<a href="products-295.html">
									<div class="name">Ноутбук Lenovo ThinkPad L412</div>
								</a>
								<div class="line"></div>
								<div class="price">5'500 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-295.html">
										<div class="label-block">
											<div class="label-prod prodano">Продано</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук Lenovo ThinkPad L412" title="Ноутбук Lenovo ThinkPad L412"
										     src="../index_app/images/pictures/products/20171009190011581.jpg"/>
									</a>

								</div>
								<a href="products-295.html">
									<div class="name">Ноутбук Lenovo ThinkPad L412</div>
								</a>
								<div class="line"></div>
								<div class="price">5'500 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box295">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">14&quot; WXGA 1366x768 HD LED / Intel Core i5-M520 2,4 ГГц / RAM
								                       4 ГБ /160 HDD ГБ /Intel HD Graphics / Wi-Fi / Bluetooth / Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">4096 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">160 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-294.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук Dell Latitude E6320" title="Ноутбук Dell Latitude E6320"
										     src="../index_app/images/pictures/products/20171007114818601.jpg"/>
									</a>

								</div>
								<a href="products-294.html">
									<div class="name">Ноутбук Dell Latitude E6320</div>
								</a>
								<div class="line"></div>
								<div class="price">6'200 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-294.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук Dell Latitude E6320" title="Ноутбук Dell Latitude E6320"
										     src="../index_app/images/pictures/products/20171007114818601.jpg"/>
									</a>

								</div>
								<a href="products-294.html">
									<div class="name">Ноутбук Dell Latitude E6320</div>
								</a>
								<div class="line"></div>
								<div class="price">6'200 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box294">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">13,3&quot;(1366x768) HD LED / Intel Core i5-2520M 2,5 ГГц / RAM 4
								                       ГБ /320HDD ГБ /Intel HD Graphics 3000/ Wi-Fi / Bluetooth / Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">4096 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">320 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-292.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>
										<img alt="Ноутбук Dell Latitude E6430U (1,8 ГГц, 8 Гб, 128SSD Гб)"
										     title="Ноутбук Dell Latitude E6430U (1,8 ГГц, 8 Гб, 128SSD Гб)"
										     src="../index_app/images/pictures/products/20170829160612307.png"/>
									</a>

								</div>
								<a href="products-292.html">
									<div class="name">Ноутбук Dell Latitude E6430U (1,8 ГГц, 8 Гб, 128SSD Гб)</div>
								</a>
								<div class="line"></div>
								<div class="price">9'290 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-292.html">
										<div class="label-block">
											<div class="label-prod top">Хит продаж</div>
											<div class="clear"></div>
										</div>

										<img alt="Ноутбук Dell Latitude E6430U (1,8 ГГц, 8 Гб, 128SSD Гб)"
										     title="Ноутбук Dell Latitude E6430U (1,8 ГГц, 8 Гб, 128SSD Гб)"
										     src="../index_app/images/pictures/products/20170829160612307.png"/>
									</a>

								</div>
								<a href="products-292.html">
									<div class="name">Ноутбук Dell Latitude E6430U (1,8 ГГц, 8 Гб, 128SSD Гб)</div>
								</a>
								<div class="line"></div>
								<div class="price">9'290 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box292">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">14&quot; WXGA 1366x768 HD LED / Intel Core i5-3427U 1,8 ГГц / RAM
								                       8 ГБ /128SSD ГБ / Wi-Fi / Bluetooth / Win 7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">8192 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/ssd.png">
										<div class="text">128 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-291.html">
										<img alt="Ноутбук Dell Latitude E6440 (2,5 ГГц, 4 Гб, 320 Гб)"
										     title="Ноутбук Dell Latitude E6440 (2,5 ГГц, 4 Гб, 320 Гб)"
										     src="../index_app/images/pictures/products/20170703145019784.jpg"/>
									</a>

								</div>
								<a href="products-291.html">
									<div class="name">Ноутбук Dell Latitude E6440 (2,5 ГГц, 4 Гб, 320 Гб)</div>
								</a>
								<div class="line"></div>
								<div class="price">11'050 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-291.html">

										<img alt="Ноутбук Dell Latitude E6440 (2,5 ГГц, 4 Гб, 320 Гб)"
										     title="Ноутбук Dell Latitude E6440 (2,5 ГГц, 4 Гб, 320 Гб)"
										     src="../index_app/images/pictures/products/20170703145019784.jpg"/>
									</a>

								</div>
								<a href="products-291.html">
									<div class="name">Ноутбук Dell Latitude E6440 (2,5 ГГц, 4 Гб, 320 Гб)</div>
								</a>
								<div class="line"></div>
								<div class="price">11'050 грн</div>
								<div class="rating_block">
									<div class="rating">
										<div class="star_box not_rated" id="star_box291">
											<div class="rate_hide">
												<div class="star1 star active"></div>
												<div class="star2 star active"></div>
												<div class="star3 star active"></div>
												<div class="star4 star active"></div>
												<div class="star5 star active"></div>
											</div>
										</div>

										<div class="clear"></div>
									</div>
								</div>
								<div class="title_dop">14&quot; / 1366x768 / Core i5-4200M 2.5GHz / 4096Mb /320Gb /
								                       DVD-RW / Wi-Fi, Bluetooth / Win7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">I5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">4096 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">320 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-xs-6">
							<div class="product ">
								<div class="image">

									<a href="products-290.html">
										<img alt="Ноутбук Dell Latitude E6540 (2,6 ГГц, 4 Гб, 320 Гб)"
										     title="Ноутбук Dell Latitude E6540 (2,6 ГГц, 4 Гб, 320 Гб)"
										     src="../index_app/images/pictures/products/20171018164001652.jpg"/>
									</a>

								</div>
								<a href="products-290.html">
									<div class="name">Ноутбук Dell Latitude E6540 (2,6 ГГц, 4 Гб, 320 Гб)</div>
								</a>
								<div class="line"></div>
								<div class="price">14'200 грн</div>
							</div>
							<div class="product product-hover">
								<div class="image">

									<a href="products-290.html">

										<img alt="Ноутбук Dell Latitude E6540 (2,6 ГГц, 4 Гб, 320 Гб)"
										     title="Ноутбук Dell Latitude E6540 (2,6 ГГц, 4 Гб, 320 Гб)"
										     src="../index_app/images/pictures/products/20171018164001652.jpg"/>
									</a>

								</div>
								<a href="products-290.html">
									<div class="name">Ноутбук Dell Latitude E6540 (2,6 ГГц, 4 Гб, 320 Гб)</div>
								</a>
								<div class="line"></div>
								<div class="price">14'200 грн</div>
								<div class="title_dop">15,6&quot; / 1920x1080 / Core i5-4300M 2.6GHz / 4096Mb /320Gb /
								                       DVD-RW / Wi-Fi, Bluetooth / Win7
								</div>
								<div class="haract-block">
									<div>
										<img src="../index_app/images/cpu.png">
										<div class="text">i5</div>
									</div>
									<div>
										<img src="../index_app/images/ozu.png">
										<div class="text">4096 Mb</div>
									</div>
									<div>
										<img src="../index_app/images/hdd.png">
										<div class="text">320 Gb</div>
									</div>
									<div>
										<img src="../index_app/images/win.png">
										<div class="text">Win7</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pagination col-xs-12" align="center" style="padding-right: 0;"><span
							class="active">1</span>&nbsp;&nbsp;<a href="products_cat-b_u_noutbuki-p2.html">2</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p3.html">3</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p4.html">4</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p5.html">5</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p6.html">6</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p7.html">7</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p8.html">8</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p9.html">9</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p10.html">10</a>&nbsp;&nbsp;<a
							href="products_cat-b_u_noutbuki-p2.html" class="nxt_prv">Следующая &raquo;</a></div>
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
		<div class="push"></div>
		<div id="footer" class="inner"></div>
	</div>
</div>
</div>
<div class="footer container-fluid">
	<div class="container">
		<div class="tags">
			<h2 class="m-6118681663910343888xfmc5" style="text-align: center;">Качественные ноутбуки из
			                                                                   Германии&nbsp;</h2>
			<p class="m-6118681663910343888xfmc5">Компания &laquo;Евронот&raquo; уже более пяти лет специализируется на
			                                      продаже пост лизинговой техники из Европы. Однако слово &laquo;пост
			                                      лизинг&raquo;, знакомо далеко не всем пользователям. &laquo;Лизинг&raquo;
			                                      &mdash; это&nbsp;аренда техники с последующим правом ее выкупа. Срок
			                                      аренды составляет от одного до трех лет. Арендаторы - крупные компании
			                                      или предприятия. Не редко за все время эксплуатации, техника выполняет
			                                      автоматические задачи, практически без участия пользователя.</p>
			<p class="m-6118681663910343888xfmc5">Так как же все происходит? Крупным компаниям или предприятиям покупать
			                                      компьютерную технику, как правило, не выгодно. Договор &laquo;лизинга&raquo;/аренды
			                                      решает эту проблему. Компьютерная техника берется в аренду&nbsp;и по
			                                      истечению срока аренды возвращается производителю, в том случае если
			                                      соблюдались условия эксплуатации и техника является полностью
			                                      работоспособной. В зависимости от ее состояния, технике присваиваются
			                                      категории:&nbsp;A,&nbsp;B&nbsp;и С.</p>
			<p class="m-6118681663910343888xfmc5">В продажу поступают только первые две категории. Категория А: Ноутбуки
			                                      в отличном состоянии, без видимых следов использования и внешне как
			                                      новые. Категория В: Ноутбуки в хорошем состоянии, с минимальными
			                                      следами использования, небольшими потёртостями и микро царапинами,&nbsp;однако
			                                      полностью работоспособные. После того как категория присвоена, техника
			                                      попадает к дилерам, которые так же проводят тесты и выставляют технику
			                                      на продажу.</p>
			<p class="m-6118681663910343888xfmc5">Наша компания покупает технику <strong>исключительно категории
			                                                                             А</strong>, непосредственно у
			                                      дилеров, после чего инженеры проводят тесты и аппаратную профилактику.
			                                      Таким образом перед поступлением в продажу, наша техника проходит 3
			                                      стадии тестирования в Европе и одну в Украине, а потому мы уверены в
			                                      ее качестве.&nbsp;</p>
			<p><strong>1. Какие ноутбуки мы предлагаем?</strong></p>
			<p class="m-6118681663910343888xfmc5">Компания &laquo;Евронот&raquo; занимается реализацией ноутбуков
			                                      &laquo;бизнес класса&raquo;. Их отличительные особенности это:</p>
			<ul>
				<li>высокое качество сборки</li>
				<li>усиленный корпус</li>
				<li>достаточное количество портов даже в моделях с диагональю экрана 11 и 12 дюймов</li>
				<li>возможность подключения к док станции</li>
				<li>возможность установки дополнительной батареи</li>
				<li>устойчивость к падениям, воздействию влаги и пыли</li>
			</ul>
			<p>Большинство моделей имеют сканер отпечатка пальца и подсветку клавиатуры, а также соответствуют&nbsp;военному
			   стандарту США&nbsp;MIL&nbsp;STD&nbsp;810g. Это целый комплекс проверок техники на работоспособность в
			   нестандартных условиях. Проходят тесты таких факторов как падение, вибрация, воздействие воды и пыли,
			   резкие перепады температур и т.д.&nbsp;Техника которая соответствует такому стандарту используется в
			   армии и полиции США.</p>
			<p class="m-6118681663910343888xfmc5"><strong>2. Линейки наших ноутбуков:</strong></p>
			<p class="m-6118681663910343888xfmc5">В нашем ассортименте представлена техника от всемирно известных
			                                      производителей, репутация которых говорит сама за себя.</p>
			<ul>
				<li>Lenovo&nbsp;ThinkPad. Линейка ноутбуков известная устойчивостью к воде и падениям. Именно эти
				    ноутбуки используются на МКС (Международной Космической Станции).
				</li>
				<li><a title="HP Elitebook" href="products_cat-b_u_noutbuki-fltr_2:3.html">HP&nbsp;Elitebook.</a>
					Название линейки говорит само за себя. Металлический корпус, сканер отпечатка пальца, подсветка
					клавиатуры и строгий, но в то же время, приятный дизайн, делают эти ноутбуки отличным выбором, как
					для офиса, так и для домашнего использования.
				</li>
				<li>Dell&nbsp;Latitude. Линейка бизнес класса от американской корпорации&nbsp;Dell. Идеальный вариант
				    для работы и деловых поездок.
				</li>
				<li>Fujitsu&nbsp;(S&nbsp;серия). Малоизвестная в Украине, но не в мире линейка ноутбуков бизнес класса.
				    Отличаются простотой дизайна и высокой надежностью. Немаловажным фактом является место производства
				    &ndash; Япония.
				</li>
				<li>Panasonic&nbsp;Toughbook.&nbsp;&nbsp;Ноутбуки этой серии по праву считаются одними из самых
				    защищенных в мире. Выдерживают сильные удары, падения и погружение в воду. Широко используются в
				    туризме и на производстве.
				</li>
			</ul>
			<p><strong>3. &nbsp;Классификация производительности нашей техники.</strong></p>
			<p class="m-6118681663910343888xfmc8">Как гласит девиз компании &laquo;Интел&raquo;, &laquo;Важно то, что
			                                      внутри&raquo; и хотя уточнения этого слогана не было ни в одной
			                                      рекламной компании всем понятно, что речь идет о процессорах. Все наши
			                                      ноутбуки работают на базе процессора&nbsp;Intel, и нам есть что
			                                      предложить любому пользователю, независимо от задач, которые стоят
			                                      перед ним.</p>
			<ul>
				<li>Intel Core 2 Duo - ноутбуки на базе этого процессора подойдут пользователям, которым не требуется
				    высокая производительность. Хороший выбор для студентов и школьников, торговых объектов,
				    автосервисов.
				</li>
				<li>Intel&nbsp;Core&nbsp;I3 - ноутбуки отличаются многозадачностью. Справляются с графическими
				    редакторами и программами для обработки видео. Сфера применения помимо бытовой, как правило офисы
				    или производство.
				</li>
				<li>Intel&nbsp;Core&nbsp;I5 - ноутбуки с процессорами этого семейства придутся по душе геймерам. Однако
				    это не исключает их применения для работы. Они способны справляться с требовательными программами,
				    например, 3dмоделирование.
				</li>
				<li>Intel&nbsp;Core&nbsp;I7 - новейшее семейство процессоров, которое отличается высокой
				    производительностью. Подходит для любых задач: работа, учеба, мультимедиа, игры, графика, видео и
				    многое другое.
				</li>
			</ul>
			<p class="m-6118681663910343888xfmc8">Так же при выборе устройства мы можем установить необходимый для
			                                      пользователя объём жесткого диска и оперативной памяти. В наличии
			                                      множество моделей разных размеров, а потому независимо от того где и
			                                      как вы собираетесь использовать устройство, мы сможем предоставить вам
			                                      широкий выбор.</p>
			<p class="m-6118681663910343888xfmc8"><strong>4. Гарантия.</strong></p>
			<p class="m-6118681663910343888xfmc8">Гарантию на всю технику предоставляет сервисный центр <strong>EvronotService</strong>.
			                                      Срок гарантии составляет <strong>до 2х лет</strong>.&nbsp; Гарантийное
			                                      обслуживание входит в стоимость, мы не требуем дополнительной платы.
			</p>
			<p><strong>5. Почему стоит покупать у нас?</strong></p>
			<ul>
				<li>Вся наша техника проходит три предпродажных теста в Европе и один в Украине, а потому мы уверены в
				    ее качестве и надежности.
				</li>
				<li>Мы занимаемся реализацией и обслуживанием пост лизинговой техники более 5ти лет и имеем опыт работы
				    в этой сфере.
				</li>
				<li>Предоставляется гарантия срок которой намного дольше чем у аналогичных компаний и составляет до 2
				    лет.
				</li>
				<li>Наши магазины представлены в крупных городах Украины. В случае если нашего магазина нет в вашем
				    городе, мы отправим вам товар в день заказа. Мы не требуем авансов или предоплату. Оплатить товар вы
				    сможете после проверки на отделении или точке выдачи перевозчика.
				</li>
				<li>В числе наших клиентов как частные лица, так и представители малого и среднего бизнеса по всей
				    Украине. За годы нашей работы мы завоевали репутацию компании достойной доверия.
				</li>
			</ul>
		</div>
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
