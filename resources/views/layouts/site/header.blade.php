<body id="_body">
<div class="dlb"></div>
<div class="dl">
  <div class="dl__container">
    <div class="dl__corner--top"></div>
    <div class="dl__corner--bottom"></div>
  </div>
  <div class="dl__square"></div>
</div>
<div class="header container-fluid ">
    <div class="container">
        <div class="top-row mob hidden-lg-up row">

            <nav class="navbar menu-mob-1 navbar-light bg-faded">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar"
                        aria-controls="exCollapsingNavbar" aria-expanded="false"
                        aria-label="Toggle navigation"></button>
                <div class="collapse" id="exCollapsingNavbar">
                    <div class="text-muted p-1">
                        <ul class="top-menu mob">
                            <li><a class="" href="">О компании</a></li>
                            <li><a class="" href="">Гарантия</a></li>
                            <li><a class="" href="">Доставка и оплата</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="navbar menu-mob-2 navbar-light bg-faded">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2"
                        aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">Каталог
                </button>
                <div class="collapse" id="exCollapsingNavbar2">
                    <div class="text-muted p-1">
                        <ul class="nav nav-bar main-menu mob">
                            <li><a href="/product-list/noutbuki">Ноутбуки б/у</a></li>
                            <li><a href="/product-list/sistemnie-bloki">Системные блоки б/у</a></li>
                            <li><a href="/product-list/monitory">Мониторы б/у</a></li>
                            <li><a href="/product-list/printery">Принтеры (NEW)</a></li>
                            <li><a href="/product-list/doc-stancii">Док Станции б/у</a></li>
                            <li><a href="/product-list/igrovie-sistemniki">Игровые системники</a></li>
                            @if(isset($show))
                                @if($header != null)
                                    @foreach($header as $item)
                                        @if($item['type'] == 'down')
                                            <li><a class="" href="{{$item['url']}}" style="cursor: pointer">{{$item['name']}}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="basket-mob">
                <a>
                    <div class="button">
                        <div class="count">1</div>
                    </div>
                </a>
            </div>
            <a href="/">
                <div class="logo mob">
                    <img src="../index_app/images/logo-min.png" alt="Евронот" title="Евронот">
                </div>
            </a>
            <div class="clear"></div>
        </div>
        <div class="second-row mob hidden-lg-up row">
            <div class="metka">
                <a href="contact.html"><img src="../index_app/images/metka-mob.png" alt="Евронот" title="Евронот"></a>
            </div>
            <div class="search">
                <img src="../index_app/images/search-mob.png" alt="Евронот" title="Евронот">
            </div>
            <div class="phone-block mob phones" id="phones2">
                <style>

                    .ks, .vf, .life, .city {
                        min-height: 20px;
                    }

                    .ks img, .vf img, .life img, .city img {
                        position: relative;
                        right: 2px;
                        bottom: 3px;
                        float: left;
                    }

                </style>
                <div class="item phone_0 active">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:(096) 508-85-85">{{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_1">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_2">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_3">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_4">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_5">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_6">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_7">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_8">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_9">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_10">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_11">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a
                                href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a></div>
                    <div class="life"><img src="../index_app/images/life.png" style="width:20px;height:20px;"/><a
                                href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a></div>
                    <div class="vf"><img src="../index_app/images/vf.png" style="width:20px;height:20px;"/><a
                                href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a></div>
                    <div class="city"><img src="../index_app/images/city.png" style="width:20px;height:20px;"/><a
                                href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a></div>
                </div>
                <div class="item phone_12">
                    <div class="ks"><img src="../index_app/images/ks.png" style="width:20px;height:20px;"/><a href="tel:"></a></div>
                </div>
            </div>
            <div class="city-select mob">
                <select name="cities" class="cities1" id="cities" onchange="city_change()">
                    @foreach($cities as $index=>$city)
                        <option value="{{$index}}">{{$city['city_name']}}</option>
                    @endforeach
                </select>


            </div>
        </div>
        <div class="top-row row hidden-md-down">
            <ul class="top-menu col-lg-6 col-md-5">
                @if(isset($header))
                    @foreach($header as $item)
                        @if($item['type'] == 'top')
                            <li><a class="" href="{{$item['url']}}" style="cursor: pointer">{{$item['name']}}</a></li>
                        @endif
                    @endforeach
                @endif
             </ul>
            <div class="button col-lg-2 col-md-2">
                <a href="{{route('get_uploaded_pdf')}}" style="cursor: pointer">Партнерские цены</a>
            </div>
            <div class="address col-lg-1 col-md-1">
                <a class="adres" onclick='location.href="{{route('show_contact')}}"' style="cursor: pointer">Адреса магазинов в Украине</a>
            </div>


            <div class="social-block col-lg-1 col-md-1">
                <a onclick='location.href="https://www.facebook.com/evronotshop/"' target="_blank"
                   style="cursor: pointer">
                    <div class="social sprite sprite-fb-icon"></div>
                </a><a onclick='location.href="https://www.youtube.com/channel/UCpeU5nDuzTZgYu0nk0CCglg"'
                       target="_blank" style="cursor: pointer">
                    <div class="social sprite sprite-youtube-icon"></div>
                </a></div>
        </div>
        <div class="second-row row hidden-md-down">
            <div class="logo col-lg-3 col-md-3"><a onclick='location.href="/"' style="cursor: pointer">
                    <img src="../index_app/images/logo.png" alt="Евронот" title="Евронот">
                </a>
                <div class="search">
                    <form id="quick_search" action="{{route('search_products')}}" method="post">
                        {{ csrf_field() }}

                        <input type="text" class="search-input" name="search" size="5" title="Поиск"
                               placeholder="Поиск">
                        <input type="submit" name="sub" class="search-button" value="Поиск"/>

                    </form>
                </div>
            </div>
            <div class="city-select col-lg-2 col-md-2">
                <select name="cities" class="cities1" id="citie" onchange="city_change()">
                    @foreach($cities as $index=>$city)
                        <option value="{{$index}}">{{$city['city_name']}}</option>
                    @endforeach
                </select>

            </div>
            <div class="col-lg-2 col-md-2 phone-block phones" id="phones1">

                <style>

                    .ks-a, .vf-a, .life-a, .city-a {
                        min-height: 35px;
                    }

                    .ks-a img, .vf-a img, .life-a img, .city-a img {
                        position: relative;
                        right: 2px;
                        bottom: 6px;
                        float: left;
                        width: 35px;
                        height: 35px;
                    }

                    .city-a {
                        position: absolute;
                        bottom: 29px;
                        right: 225px;
                        width: 151px;
                    }


                </style>

                <div class="item phone_0 active">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:(096) 508-85-85">{{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_1">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_2">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_3">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_4">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_5">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_6">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_7">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_8">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_9">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_10">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"> {{$organization['phone_number_2']}}</a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_11">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:  (096) 508-85-85"></a>
                    </div>
                    <div class="life-a"><img src="../index_app/images/life.png"/><a href="tel:(073) 508-85-85">{{$organization['phone_number_3']}}</a>
                    </div>
                    <div class="vf-a"><img src="../index_app/images/vf.png"/><a href="tel:(095) 508-85-85">{{$organization['phone_number_4']}}</a>
                    </div>
                    <div class="city-a"><img src="../index_app/images/city.png"/><a href="tel:(044) 383-16-83">{{$organization['phone_number_1']}}</a>
                    </div>
                </div>
                <div class="item phone_12">
                    <div class="ks-a"><img src="../index_app/images/ks.png"/><a href="tel:"></a></div>
                </div>
            </div>

            <div class="col-lg-2 col-md-2 grafik" id="grafik1">

                <div>
                    <div class="title">График работы:</div>
                    <div class="text">
                        <div id="hui_0" class="item grafik_0 active">
                            @if(isset($cities[0]['street']))ул.{{$cities[0]['street']}}<br/>@endif
                            пн.-пт. {{$cities[0]['working_days']}}<br/>
                            сб. {{$cities[0]['saturday']}}<br/>
                            вс. {{$cities[0]['sunday']}}
                        </div>
                        @foreach($cities as $index=>$city)
                            @if($index != 0)
                                <div id="hui_{{$index}}" class="item grafik_{{$index}}">
                                    @if(isset($city['street']))ул.{{$city['street']}}<br/>@endif
                                    пн.-пт. {{$city['working_days']}}<br/>
                                    сб. {{$city['saturday']}}<br/>
                                    вс. {{$city['sunday']}}
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 basket" id="quick_basket">
                @if($items_in_cart > 0)
                        <a href="/cart">
                            <div class="button">
                                <div class="count">{{$items_in_cart}}</div>
                            </div>
                        </a>
                    @else
                    <div class="button">
                        <div class="count">{{$items_in_cart}}</div>
                    </div>
                @endif
                <div class="right">
                    @if($items_in_cart == 0)
                    <label class='empty'>
                        Корзина пуста<div class="clear"></div>начните ваши покупки
                    </label>
                    @else
                    <label class='card11'>
                        <a href="/cart">
                            <div class='text'>Ваши покупки:</div>
                        </a>
                        <div class='price'>
                            <span class="word">товаров </span>
                            <span class="quant">@if(isset($items_in_cart)){{$items_in_cart}}@endif</span>,
                            <span class="price">@if(isset($cart_price)){{$cart_price}}@endif</span> грн
                        </div>
                    </label>
                    @endif
                </div>
            </div>
        </div>

        <script type="text/javascript"
                src="https://maps.google.com/maps/api/js?key=AIzaSyDFZheD4LS-qwom8GeDyp_RMEZvDKcF-ec" async></script>
        <script type="text/javascript">
            var map;

            function city_change() {
                var e = document.getElementById("citie");
                var pizda = "hui_"+e.options[e.selectedIndex].value;

                var children = e.children;
                for (var i = 0; i < +{{count($cities)}}; i++) {
                    var zalupa = "hui_"+i;
                    document.getElementById(zalupa).className = "item grafik_0";
                }
                document.getElementById('hui_0').className = "item grafik_0";
                document.getElementById(pizda).className = document.getElementById(pizda).className+" active";
            }

            function initialize() {
                var bounds = new google.maps.LatLngBounds();
                var loc;
                var myOptions = {
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: {lat: -34.397, lng: 150.644},
                    zoom: 8
                };
                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                loc = new google.maps.LatLng(50.48667499, 30.49943626);
                bounds.extend(loc);
                var marker0 = new google.maps.Marker({
                    position: new google.maps.LatLng(50.48667499, 30.49943626),
                    //icon:"/images/metka.png",
                    content: 'г. Киев, проспект Степана Бандеры, 16 Б, магазин Евронот, (044)383-16-83, (067)239-39-21',
                    map: map
                });
                var infowindow0 = new google.maps.InfoWindow({
                    content: 'г. Киев, проспект Степана Бандеры, 16 Б, магазин Евронот, (044)383-16-83, (067)239-39-21',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker0, 'click', function () {
                    //infowindow0.setContent(this.content);
                    infowindow0.open(map, marker0);
                });
                loc = new google.maps.LatLng(46.4700061, 30.7362838);
                bounds.extend(loc);
                var marker1 = new google.maps.Marker({
                    position: new google.maps.LatLng(46.4700061, 30.7362838),
                    //icon:"/images/metka.png",
                    content: 'г.Одесса, ул. Ришельевская 78, магазин EL_MAG тел. (067)136-78-78, (063)623-78-78',
                    map: map
                });
                var infowindow1 = new google.maps.InfoWindow({
                    content: 'г.Одесса, ул. Ришельевская 78, магазин EL_MAG тел. (067)136-78-78, (063)623-78-78',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker1, 'click', function () {
                    //infowindow1.setContent(this.content);
                    infowindow1.open(map, marker1);
                });
                loc = new google.maps.LatLng(46.4793577, 30.7296966);
                bounds.extend(loc);
                var marker2 = new google.maps.Marker({
                    position: new google.maps.LatLng(46.4793577, 30.7296966),
                    //icon:"/images/metka.png",
                    content: 'г.Одесса, ул.Преображенская,48(Тираспольская пл.)тел.(067) 324-00-86, (073) 155-75-70',
                    map: map
                });
                var infowindow2 = new google.maps.InfoWindow({
                    content: 'г.Одесса, ул.Преображенская,48(Тираспольская пл.)тел.(067) 324-00-86, (073) 155-75-70',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker2, 'click', function () {
                    //infowindow2.setContent(this.content);
                    infowindow2.open(map, marker2);
                });
                loc = new google.maps.LatLng(50.0275774, 36.2184128);
                bounds.extend(loc);
                var marker3 = new google.maps.Marker({
                    position: new google.maps.LatLng(50.0275774, 36.2184128),
                    //icon:"/images/metka.png",
                    content: 'г. Харьков, ул. Отакара Яроша 21, магазин Nokia',
                    map: map
                });
                var infowindow3 = new google.maps.InfoWindow({
                    content: 'г. Харьков, ул. Отакара Яроша 21, магазин Nokia',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker3, 'click', function () {
                    //infowindow3.setContent(this.content);
                    infowindow3.open(map, marker3);
                });
                loc = new google.maps.LatLng(48.5011765, 32.2394543);
                bounds.extend(loc);
                var marker4 = new google.maps.Marker({
                    position: new google.maps.LatLng(48.5011765, 32.2394543),
                    //icon:"/images/metka.png",
                    content: 'г. Кропивницкий, ул.50 лет Октября,27, магазин Евронот',
                    map: map
                });
                var infowindow4 = new google.maps.InfoWindow({
                    content: 'г. Кропивницкий, ул.50 лет Октября,27, магазин Евронот',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker4, 'click', function () {
                    //infowindow4.setContent(this.content);
                    infowindow4.open(map, marker4);
                });
                loc = new google.maps.LatLng(48.5158975, 34.612091);
                bounds.extend(loc);
                var marker5 = new google.maps.Marker({
                    position: new google.maps.LatLng(48.5158975, 34.612091),
                    //icon:"/images/metka.png",
                    content: 'г. Каменское, ул. Ленина 30/1, магазин Кнопка',
                    map: map
                });
                var infowindow5 = new google.maps.InfoWindow({
                    content: 'г. Каменское, ул. Ленина 30/1, магазин Кнопка',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker5, 'click', function () {
                    //infowindow5.setContent(this.content);
                    infowindow5.open(map, marker5);
                });
                loc = new google.maps.LatLng(47.8121539, 35.1903591);
                bounds.extend(loc);
                var marker6 = new google.maps.Marker({
                    position: new google.maps.LatLng(47.8121539, 35.1903591),
                    //icon:"/images/metka.png",
                    content: 'г. Запорожье, ул.Жуковского, 32, магазин Мобільна Країна',
                    map: map
                });
                var infowindow6 = new google.maps.InfoWindow({
                    content: 'г. Запорожье, ул.Жуковского, 32, магазин Мобільна Країна',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker6, 'click', function () {
                    //infowindow6.setContent(this.content);
                    infowindow6.open(map, marker6);
                });
                loc = new google.maps.LatLng(48.9227246, 24.6410768);
                bounds.extend(loc);
                var marker7 = new google.maps.Marker({
                    position: new google.maps.LatLng(48.9227246, 24.6410768),
                    //icon:"/images/metka.png",
                    content: 'г. Ивано-Франковск, ул.Независимости, 83, магазин Медиасофт',
                    map: map
                });
                var infowindow7 = new google.maps.InfoWindow({
                    content: 'г. Ивано-Франковск, ул.Независимости, 83, магазин Медиасофт',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker7, 'click', function () {
                    //infowindow7.setContent(this.content);
                    infowindow7.open(map, marker7);
                });
                loc = new google.maps.LatLng(51.3270349, 26.5979562);
                bounds.extend(loc);
                var marker8 = new google.maps.Marker({
                    position: new google.maps.LatLng(51.3270349, 26.5979562),
                    //icon:"/images/metka.png",
                    content: 'г. Мариуполь',
                    map: map
                });
                var infowindow8 = new google.maps.InfoWindow({
                    content: 'г. Мариуполь',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker8, 'click', function () {
                    //infowindow8.setContent(this.content);
                    infowindow8.open(map, marker8);
                });
                loc = new google.maps.LatLng(50.5098041, 30.7659026);
                bounds.extend(loc);
                var marker9 = new google.maps.Marker({
                    position: new google.maps.LatLng(50.5098041, 30.7659026),
                    //icon:"/images/metka.png",
                    content: 'г. Бровары, ул.Владимира Савченко 1, магазин RC',
                    map: map
                });
                var infowindow9 = new google.maps.InfoWindow({
                    content: 'г. Бровары, ул.Владимира Савченко 1, магазин RC',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker9, 'click', function () {
                    //infowindow9.setContent(this.content);
                    infowindow9.open(map, marker9);
                });
                loc = new google.maps.LatLng(48.4759346, 35.0186108);
                bounds.extend(loc);
                var marker10 = new google.maps.Marker({
                    position: new google.maps.LatLng(48.4759346, 35.0186108),
                    //icon:"/images/metka.png",
                    content: 'г. Сарны, ул.Широкая 14, магазин Смарт',
                    map: map
                });
                var infowindow10 = new google.maps.InfoWindow({
                    content: 'г. Сарны, ул.Широкая 14, магазин Смарт',
                    maxWidth: 200
                });
                google.maps.event.addListener(marker10, 'click', function () {
                    //infowindow10.setContent(this.content);
                    infowindow10.open(map, marker10);
                });
                map.fitBounds(bounds);
                map.panToBounds(bounds);

            }


            $(document).ready(function () {

                $('.map_btn').click(function () {
                    if ($('#map_block').css('display') == 'none') {
                        $('#map_block').stop(true, true).show();
                        initialize();
                    } else {
                        $('#map_block').stop(true, true).hide();
                    }
                });
                $('#map_info .exit').click(function () {
                    $('#map_block').stop(true, true).hide();
                });
            })
        </script>
        <div id="map_block" class="row">
            <div id="map_canvas" style="height: 370px;"></div>
        </div>
        <div class="menu-row row hidden-md-down">
            <nav class="navbar navbar-light bg-faded">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                        aria-label="Toggle navigation"></button>
                <div class="collapse navbar-toggleable-md" id="navbarResponsive">
                    <ul class="nav nav-bar main-menu">
                        @if($header != null)
                            @foreach($header as $index=>$item)
                                @if($item['type'] == 'mid')
                                    @if(isset($hui_pizda) and $hui_pizda < 5)
                                        <li><a href="{{$item['url']}}"><span class="sprite sprite-menu-icon-{{$hui_pizda++}}"></span>{{$item['name']}}</a>
                                        </li>
                                    @else
                                        <li><a href="{{$item['url']}}"><span class="sprite sprite-menu-icon-2"></span>{{$item['name']}}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </ul>
                    <ul class="nav nav-bar main-menu main-menu2">
                        @if(isset($show))
                            @if($header != null and $show == true)
                                @foreach($header as $item)
                                    @if($item['type'] == 'down')
                                        <li><a class="" href="{{$item['url']}}" style="cursor: pointer">{{$item['name']}}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
		<script>
			$(window).on('load', function () {
				var preloader = jQuery('.dl');
				preloader.delay(500).fadeOut('slow');
				$('.dlb').delay(500).fadeOut('slow');
			});
		</script>	
@yield('main_pages')
</body>
</html>