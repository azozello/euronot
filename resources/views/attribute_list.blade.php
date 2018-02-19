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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Список атрибутов</span>
                </h4>
                <button type="" class="btn bg-teal-400" style="margin-left: 30px">Создать атрибут</button>

            </div>

            <form class="page-header-btn-right" action="" id="form1">
                    <input type="checkbox" data-name='1' hidden>
                    <input type="checkbox" data-name='2' hidden>
                    <button type="" class="btn bg-teal-400">Сохранить</button>
            </form>
            {{--<button type="" class="btn bg-teal-600 page-header-btn-right">Создать</button>--}}
        </div>

    </div>
    <div class="content">
        <h6 class="panel-title">Список атрибутов</h6>


        <!-- CKEditor default -->
        <div class="panel panel-padding panel-flat">
            <table class=" products-table-list table-lang table-lg">
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Название фильтров</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>
                        <form method="get" action="{{ route('attributes_search') }}" enctype="multipart/form-data">
                            <div class="input-group" style="margin: 0 auto; width: 100%;">
                                <input type="text" class="form-control" name="attribute_name" placeholder="Впишите название*" >
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span
                                                    class="glyphicon glyphicon-search"
                                                    aria-hidden="true"></span></button>
                                    </span>
                            </div>
                        </form>
                    </th>
                    <th>
                        <form method="get" action="{{route('attributes_search_by_filter')}}" enctype="multipart/form-data">
                            <select class="selectpicker" name="filter" data-show-subtext="true" data-live-search="true">
                                <option></option>
                                @foreach($filters as $filter)
                                    <option>{{$filter->name}}</option>
                                @endforeach
                            </select>
                            <span class="input-group-btn">
                                        <button type="" class="btn bg-teal-400"><span title="save"
                                                                                      class="	glyphicon glyphicon-floppy-disk"></span>
                                    </button>
                                    </span>
                        </form>
                    </th>
                    <th></th>

                </tr>
                @foreach($attributes as $attribute)
                    <tr>
                        <th><div class="product-text">{{$attribute->attributes_name}}</div>
                        </th>
                        <th>{{$attribute->name}}</th>
                        <th>
                            <form class="products-search-btn" method="get" action="{{route('attributes_delete')}}" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="attributes_id" type="hidden" value="{{$attribute->attributes_id}}">
                                <button type="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </form>
                            <form class="products-search-btn" method="post" action="{{route('attributes_show_editor')}}" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="attributes_id" type="hidden" value="{{$attribute->attributes_id}}">
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