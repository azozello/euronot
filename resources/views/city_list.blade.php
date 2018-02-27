<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

@include('layouts.styles')
<!-- Main navbar -->
    <!-- /page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Организация</span></h4>
            </div>
            <!--<div class="view_page"><button class="btn btn-primary" onclick="window.open('http://restoran-elit.com.ua/galereya')">Подивитись сторінку</button></div>
-->
            <form role="form" method="get" action="{{ route('city_add') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
        </div>
    </div>
    <div class="content">
        <h6 class="content-group text-semibold">
            Отделения по городам
        </h6>
        <div class="form-content">
            @foreach($cities as $city)
                <h6 class="content-group text-semibold">
                    <label><a onclick='location.href="{{route('edit_city')}}"+"/"+"{{$city['city_name']}}"'>{{$city['city_name']}}</a></label>
                </h6>
                <form role="form" method="post" action="{{route('city_delete')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="city_id" value="{{$city['id']}}">
                    <button type="submit" class="btn bg-teal-400">Удалить</button>
                </form>
                <br/>
            @endforeach

        </div>

    </div>
    </div>
    <script>
        var editor = CKEDITOR.replace('editor1');
    </script>
    <!-- /panel heading options --

<!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017. by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
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
