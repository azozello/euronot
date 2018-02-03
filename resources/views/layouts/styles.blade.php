<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="{{ asset('css/icons/icomoon/styles.css') }} " rel="stylesheet"/>

<link href="{{ asset('css/buts_trap.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/main.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/main2.css')}}" rel="stylesheet"/>
<link href="{{ asset('css/bootstrap.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/bootstrap-select.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/font-awesome.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/kendo.common.min.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/kendo.default.min.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/kendo.default.mobile.min.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/kendo.material.min.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/kendo.common-material.min.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/dropzone/basic.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/dropzone/dropzone.css') }} " rel="stylesheet"/>


<link href="{{ asset('css/core.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/components.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/colors.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/bootstrap-treefy.css') }} " rel="stylesheet"/>
<link href="{{ asset('css/bootstrap-spinner.css') }} " rel="stylesheet"/>

<!-- /global stylesheets -->
<link rel="canonical" href="{{ URL::current() }}"/>
<!-- Core JS files -->
<script src="{{ asset('AjexFileManager/ajex.js') }}"></script>
<script src="{{ asset('AjexFileManager/ajex.js') }}"></script>
<script src="{{ asset('js/plugins/loaders/pace.min.js') }}"></script>

<script src="{{ asset('js/core/libraries/jquery.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-ui.min.js') }}"></script>


<script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>

<script src="{{ asset('js/core/libraries/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->
<script src="{{ asset('js/plugins/spinner/jquery.spinner.js') }}"></script>
<!-- Theme JS files -->
<script src="{{ asset('js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ asset('js/plugins/treefy/bootstrap-treefy.js') }}"></script>

<script src="{{ asset('js/plugins/kendo/kendo.all.min.js') }}"></script>

<script src="{{ asset('js/core/app.js') }}"></script>
<!-- /theme JS files -->
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8"></script>


<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css"/>
<!-- optionally uncomment line below if using a theme or icon set like font awesome (note that default icons used are glyphicons and `fa` theme can override it) -->
<!-- link https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css media="all" rel="stylesheet" type="text/css" /-->
<!-- piexif.min.js is only needed for restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<!-- optionally uncomment line below for loading your theme assets for a theme like Font Awesome (`fa`) -->
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->

</head>

<body>

<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- User menu -->

                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <div class="navigation-logo"><img src="../../public/images/logo.png" alt="logo"></div>
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Страницы</span></a>
                                <ul>
                                    <li><a href="{{route('show_editor')}}">Создать новую страницу</a></li>
                                    <li><a href="{{route('pages_list')}}">Список страниц</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Новости</span></a>
                                <ul>
                                    <li><a href="{{route('news_editor')}}">Создать новость</a></li>
                                    <li><a href="{{route('show_news')}}">Список новостей</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Журналы</span></a>
                                <ul>
                                    <li><a href="{{route('show_client_book')}}">Журнал заказов клиентов</a></li>
                                    <li><a href="{{route('show_supplier_book')}}">Журнал заказов поставщикам</a></li>
                                    <li><a href="{{route('show_shipment_book')}}">Журнал отгрузок товара</a></li>
                                    <li><a href="{{route('show_remainder_book')}}">Журнал остатков товара</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{route('photos')}}"><i class="icon-pencil3"></i> <span>Галерея</span></a>
                            <li>
                            <li>
                                <a href="{{route('reviews')}}"><i class="icon-pencil3"></i> <span>Отзывы</span></a>
                            <li>

                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Клиенты</span></a>
                                <ul>
                                    <li><a href="{{route('post')}}"></i>Почта</a></li>
                                    <li><a href="{{route('subscription')}}">Подписки</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Глобальные настройки</span></a>
                                <ul>
                                    <li><a href="{{route('organization')}}">Про организацию</a></li>
                                    <li><a href="{{route('sliders')}}">Слайдер </a></li>
                                    <li><a href="{{route('text_blocks')}}">Текстовые блоки</a></li>
                                    <li><a href="{{route('feedback')}}">Форма обратной связи</a></li>
                                    <li><a href="{{route('languages')}}">Языки</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>СЕО</span></a>
                                <ul>
                                    <li><a href="{{route('site_map')}}">Карта сайта</a></li>
                                    <li><a href="{{route('robots')}}">robots.txt</a></li>
                                    <li><a href="{{route('analytics')}}">Аналитика</a></li>
                                    <li><a href="{{route('images_zip')}}">Сжатие изображений</a></li>
                                    <li><a href="{{route('redirect')}}">Перенаправление</a></li>
                                    <li><a href="{{route('cache')}}">Кеширование</a></li>
                                    <li><a href="{{route('meta_tags')}}">Настройки мета-тегов</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{route('admin_list')}}">
                                    <span>Пользователи</span></a>
                            </li>
                            <li>
                                <a href="{{route('menu_list')}}"><i class="icon-pencil3"></i>
                                    <span>Список меню</span></a>
                            <li>
                            <li>
                                <a href="{{route('menu')}}"><i class="icon-pencil3"></i>
                                    <span>Меню</span></a>
                            <li>
                            <li>
                                <a href="{{route('supplier_list')}}"><i class="icon-pencil3"></i>
                                    <span>Список поставщиков</span></a>
                            <li>
                            <li>
                                <a href="{{route('product_list')}}"><i class="icon-pencil3"></i>
                                    <span>Список товаров</span></a>
                            <li>
                            <li>
                                <a href="{{route('attribute_list')}}"><i class="icon-pencil3"></i>
                                    <span>Список атрибутов</span></a>
                            <li>
                            <li>
                                <a href="{{route('filter_list')}}"><i class="icon-pencil3"></i>
                                    <span>Список фильтров</span></a>
                            <li>
                            <li>
                                <a href="{{route('categories_editor')}}"><i class="icon-pencil3"></i>
                                    <span>Создание категории</span></a>
                            <li>
                            <li>
                                <a href="{{route('product_categories')}}"><i class="icon-pencil3"></i>
                                    <span>Категории товаров</span></a>
                            <li>
                            <li>
                                <a href="{{route('filter_editor')}}"><i class="icon-pencil3"></i>
                                    <span>Редактор фильтров</span></a>
                            <li>
                            <li>
                                <a href="{{route('attribute_editor')}}"><i class="icon-pencil3"></i>
                                    <span>Редактор атрибутов</span></a>
                            <li>
                            <li>
                                <a href="{{route('product_card')}}"><i class="icon-pencil3"></i>
                                    <span>Карта товара</span></a>
                            <li>



                            <!-- Forms -->
                            <!-- /forms -->

                            <!-- Appearance -->

                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->

            <!-- /page header -->
@yield('editor')
@yield('pages_list')
</body>
</html>