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
            Отделения
        </h6>
        <div class="form-content">
            <form method="post" action="{{ route('city_edit') }}" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="city_id" value="{{$city['id']}}">
                <h6 class="content-group text-semibold">
                    <label>Город</label>
                    <input type="text" name="city_name" placeholder="Введите название города*" value="@if(isset($city['city_name'])){{$city['city_name']}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Улица</label>
                    <input type="text" name="street" placeholder="Введите улицу*" value="@if(isset($city['street'])){{$city['street']}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Рабочие дни</label>
                    <input type="text" name="working_days" placeholder="Часы работы по будням*" value="@if(isset($city['working_days'])){{$city['working_days']}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Суббота</label>
                    <input type="text" name="saturday" placeholder="Часы работы в субботу*" value="@if(isset($city['saturday'])){{$city['saturday']}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Воскресенье</label>
                    <input type="text" name="sunday" placeholder="Часы работы в воскресенье*" value="@if(isset($city['sunday'])){{$city['sunday']}}@endif">
                </h6>
                <button type="submit" class="btn btn-success">Обновить</button>
            </form>
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
