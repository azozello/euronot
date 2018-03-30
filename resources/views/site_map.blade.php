<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

    @include('layouts.styles')

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Карта сайта</span></h4>
            </div>
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
            <!--<div class="view_page"><button class="btn btn-primary" onclick="window.open('http://restoran-elit.com.ua/galereya')">Подивитись сторінку</button></div>
-->
        </div>
    </div>
    <div class="content">
        <form method="post" action="{{ route('site_map_generate') }}" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            Частота обновлений
            <select name="select">
                <option>hourly</option>
                <option>daily</option>
                <option>weekly</option>
                <option>monthly</option>
                <option>yearly</option>
            </select>
            <button type="submit" class="btn bg-teal-400">Сгенерировать<i class="icon-arrow-right14 position-right"></i></button>
        </form>

        @if(isset($select))
            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('site_map_objects')}}"><i class="icon-pencil3"></i> <span>Обьекты</span></a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('site_map_pages')}}"><i class="icon-pencil3"></i> <span>Страницы</span></a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('site_map_news')}}"><i class="icon-pencil3"></i> <span>Новости</span></a>
                </div>
            </div>
        @endif
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017.  by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->

    </body>
</html>
