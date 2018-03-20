<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>{{$meta_tags->title}}</title>
	<meta name="description" content="{{$meta_tags->description}}"/>
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
			<div id="products" class="products_list">
				<div class="main_tbl table row">
					<div class="filter-button">Фильтр</div>
					<div class="left_side col-lg-3 filter-block">

						<script type="text/javascript">
                            $(document).ready(function () {
                                $(".filter_btn").click(function () {

                                    $('foo').submit();
                                })
                            })
						</script>
						@foreach($filters as $filter)
							<div class="left_block filter">
								<div class="filter_title">{{$filter->name}}</div>
								<div class="filter_list">
									@foreach($attributes as $attribute)
										@if(isset($attributes_count[$attribute->attributes_id]))
											@if($attribute->attributes_parent_filter == $filter->filter_id)
												<div class="check_block" ><span  onclick="Refresh()" class="checkbox_label filter_btn"><span
																class="checkbox" ></span><div><input name="attributes_id[{{$attribute->attributes_id}}]" @foreach($url_attributes as $url_attribute) @if($url_attribute == $attribute->attributes_id) checked @endif @endforeach type="checkbox" >{{$attribute->attributes_name}}<span
																	class="cnt">({{$attributes_count[$attribute->attributes_id]}})</span></div></span></div>
											@endif
										@endif
									@endforeach
								</div>
							</div>
						@endforeach



						<div class="clear"></div>

					</div>

					<form id="foo" role="form" method="get" action="{{ route('refresh_search_page') }}" enctype="multipart/form-data">
						<input type="hidden" name="search" value="{{$search}}">
						<button type="" class="btn bg-teal-400 ">Button</button>
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

							<select id="type_ch" name="sort_type">
								<option value="0">Сортировка по умолчанию</option>
								<option value="1">Сортировка по цене (0-9)</option>
								<option value="2">Сортировка по цене (9-0)</option>
								<option value="3">Сортировка по названию (а-я)</option>
								<option value="4">Сортировка по названию (я-а)</option>
							</select>
							<div class="founded hidden-md-down">Найдено:
								<span>{{$products->total()}} товаров</span>
							</div>
							<div id="num_select" class="hidden-md-down">Товаров на странице:&nbsp;
								<span class="active" alt="12">12</span>&nbsp;&nbsp;<span alt="24">24</span>&nbsp;&nbsp;<span
										alt="48">48</span></div>
							<select name="product_at_page">
								<option value="12">12</option>
								<option value="24">24</option>
								<option value="48">48</option>
							</select>
							<div class="clear"></div>
						</div>
		</form>
		<div class="products_box products">
			@foreach($products as $product)
				<div class="col-md-4 col-xs-6">
					<div class="product ">
						<div class="image">

							<a href="/products/{{$product->url}}">
								<div class="label-block">
									@if(!is_null($product->product_status))
										<div class="label-prod super">{{$product->product_status}}</div>
									@endif
									<div class="clear"></div>
								</div>
								<img alt="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
									 title="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
									 src="../../product_images/{{$product->image}}"/>
							</a>

						</div>
						<a href="/products/{{$product->url}}">
							<div class="name">{{$product->name}}
							</div>
						</a>
						<div class="line"></div>
						<div class="price">{{$product->price}} грн</div>
					</div>

					<div class="product product-hover">
						<div class="image">

							<a href="/products/{{$product->url}}">
								<div class="label-block">
									@if(!is_null($product->product_status))
										<div class="label-prod super">{{$product->product_status}}</div>
									@endif
									<div class="clear"></div>
								</div>

								<img alt="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
									 title="Ноутбук Fujitsu Siemens Lifebook S6420 (2,53 ГГц, 4 Гб, 120 Гб)"
									 src="../../product_images/{{$product->image}}"/>
							</a>

						</div>
						<a href="/products/{{$product->url}}">
							<div class="name">{{$product->name}}
							</div>
						</a>
						<div class="line"></div>
						<div class="price">{{$product->price}} грн</div>
						<div class="rating_block">
							<div class="rating">
								<div class="star_box not_rated" id="star_box306">
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
						<div class="haract-block">
							@if(!is_null($product->proc))
								<div>
									<img src="../index_app/images/cpu.png">
									<div class="text">{{$product->proc}}</div>
								</div>
							@endif
							@if(!is_null($product->op_memory))
								<div>
									<img src="../index_app/images/ozu.png">
									<div class="text">{{$product->op_memory}}</div>
								</div>
							@endif
							@if(!is_null($product->hard_memory))
								<div>
									@if($product->type_memory == 'HDD')
										<img src="../index_app/images/hdd.png">
									@endif
									@if($product->type_memory == 'SSD')
										<img src="../index_app/images/ssd.png">
									@endif
									<div class="text">{{$product->hard_memory}}</div>
								</div>
							@endif
							@if(!is_null($product->op_system))
								<div>
									<img src="../index_app/images/win.png">
									<div class="text">{{$product->op_system}}</div>
								</div>
							@endif
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<div class="pagination col-xs-12" align="center" style="padding-right: 0;">{{ $products->links() }}</div>
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
			{{$foot}}
			@include('layouts.site.footer')
		</div>
	</div>
	<script type="text/javascript">
        function Refresh () {

            $('#foo').submit();
            console.log(1);
        }
	</script>
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
