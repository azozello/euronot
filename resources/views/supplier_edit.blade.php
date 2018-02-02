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
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
        </div>
    </div>
    <div class="content">
        <h6 class="content-group text-semibold">
            Карта поставщика
        </h6>
        <div class="form-content">
            <form method="post" action="{{ route('edit_supplier') }}" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input name="id" type="hidden" value="{{$supplier[0]->id}}">
                <h6 class="content-group text-semibold">
                    <label>Код поставщика</label>
                    <input type="text" name="traders_id" placeholder="Введите Код поставщика*"
                           value="@if(isset($supplier[0]->traders_id)){{$supplier[0]->traders_id}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Наименование поставщика</label>
                    <input type="text" name="traders_name" placeholder="Введите Наименование поставщика*"
                           value="@if(isset($supplier[0]->traders_name)){{$supplier[0]->traders_name}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Телефон основной</label>
                    <input type="text" name="traders_main_phone_number" placeholder="Введите Телефон основной*"
                           value="@if(isset($supplier[0]->traders_main_phone_number)){{$supplier[0]->traders_main_phone_number}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Телефон дополнительный</label>
                    <input type="text" name="traders_second_phone_number" placeholder="Введите Телефон дополнительный*"
                           value="@if(isset($supplier[0]->traders_second_phone_number)){{$supplier[0]->traders_second_phone_number}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>E-mail</label>
                    <input type="text" name="traders_email" placeholder="Введите Email*"
                           value="@if(isset($supplier[0]->traders_email)){{$supplier[0]->traders_email}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Задержка поставки</label>
                    <input type="text" name="traders_delay" placeholder="Введите Задержка поставки*"
                           value="@if(isset($supplier[0]->traders_delay)){{$supplier[0]->traders_delay}}@endif">
                </h6>
                <h6 class="content-group text-semibold">
                    <label>Крайнее время заказа товара</label>
                    <input type="text" name="traders_deadline_to_order" placeholder="Введите Крайнее время заказа товара*"
                           value="@if(isset($supplier[0]->traders_deadline_to_order)){{$supplier[0]->traders_deadline_to_order}}@endif">
                </h6>
                <button type="submit" class="btn btn-success">Сохранить</button>
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
