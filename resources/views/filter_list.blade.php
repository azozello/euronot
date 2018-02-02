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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Список фильтров</span>
                </h4>


            </div>
            <button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>
            {{--<button type="" class="btn bg-teal-600 page-header-btn-right">Создать</button>--}}
        </div>

    </div>
    <div class="content">
        <h6 class="panel-title">Список фильтров</h6>
        <form action="" id="form1">
            <div class="form-button">
                <input type="checkbox" data-name='1' hidden>
                <input type="checkbox" data-name='2' hidden>
                <button type="" class="btn bg-teal-400">Сохранить</button>

            </div>
        </form>

        <!-- CKEditor default -->
        <div class="panel panel-padding panel-flat">
            <table class=" products-table-list table-lang table-lg">
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Отображение</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>
                        <form method="get" action="{{ route('search_filter') }}" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="input-group" style="margin: 0 auto; width: 100%;">
                                <input type="text" name="filter_name" class="form-control" placeholder="Впишите название*" >
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span
                                                    class="glyphicon glyphicon-search"
                                                    aria-hidden="true"></span></button>
                                    </span>
                            </div>
                        </form>
                    </th>
                    <th>
                    <th>
                    </th>

                    </th>

                </tr>
                @foreach($filters as $filter)
                    <tr>
                        <th><div class="product-text">{{$filter->name}}</div>
                        </th>
                        <th><label class="switch">
                                @if($filter->is_view == 1)
                                <input type="checkbox" checked>
                                @else
                                    <input type="checkbox">
                                @endif
                                <span class="slider"></span>
                            </label></th>
                        <th>
                            <form method="get" action="{{ route('delete_filter') }}" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="filter_id" type="hidden" value="{{$filter->filter_id}}">
                                <button type="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                            <form method="get" action="{{ route('edit_filter_show') }}" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="filter_id" type="hidden" value="{{$filter->filter_id}}">
                                <button type="" class="btn bg-teal-400"><span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
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
        <script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace('editor1');
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor1
			});
        </script>


    </div>
    <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->
