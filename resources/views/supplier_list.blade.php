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
        <form method="post" action="{{ route('edit_supplier') }}" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="form-button">
                <button type="" class="btn bg-teal-400">Сохранить</button>

            </div>

        <!-- CKEditor default -->
        <div class="panel panel-padding panel-flat">
            <table class=" products-table-list table-lang table-lg">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($suppliers))@foreach($suppliers as $k => $supplier)
                    <tr>
                        <th>
                            {{$k+1}}
                        </th>
                        <th>
                            <input type="text" name="supplier_name[{{$supplier->id}}]" value="{{$supplier->suppliers_name}}" class="form-control" id="old_url" placeholder="Введите название" >
                        </th>
                        <th>
                            <textarea name="suppliers_description[{{$supplier->id}}]" id="editor1">{{$supplier->suppliers_description}}</textarea>
                        </th>
                    </tr>
                @endforeach
                    @endif
                </tbody>
            </table>


        </div>
        </form>

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
