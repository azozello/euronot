<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    @include('layouts.styles')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Список поставщиков</span>
                </h4>


            </div>
            <button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>
            {{--<button type="" class="btn bg-teal-600 page-header-btn-right">Создать</button>--}}
        </div>

    </div>
    <div class="content">
        <form method="get" action="{{ route('add_supplier') }}" enctype="multipart/form-data">
            <button type="" class="btn bg-teal-400">Добавить</button>
        </form>
        <!-- CKEditor default -->
            <div class="panel panel-white">
                <table class="table tasks-list table-lg">
                    <thead>
                    <tr>
                        <th>Код поставщика</th>
                        <th>Наименование поставщика</th>
                        <th>Телефон основной</th>
                        <th>Телефон дополнительный</th>
                        <th>E-mail</th>
                        <th>Задержка поставки</th>
                        <th>Крайнее время заказа товара</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($suppliers))@foreach($suppliers as $k => $supplier)
                        <tr>
                            <td><a href="{{ route('edit_old_supplier',['id' => $supplier->id]) }}">{{$supplier->traders_id}}</a></td>
                            <td>{{$supplier->traders_name}}</td>
                            <td>{{$supplier->traders_main_phone_number}}</td>
                            <td>{{$supplier->traders_second_phone_number}}</td>
                            <td>{{$supplier->traders_email }}</td>
                            <td>{{$supplier->traders_delay }}</td>
                            <td>{{$supplier->traders_deadline_to_order}}</td>
                        </tr>
                    @endforeach()
                    @endif
                    </tbody>
                </table>
            </div>

        <!-- /CKEditor default -->

        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov"
                                                                     target="_blank">Eugene Kopyov</a>
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
