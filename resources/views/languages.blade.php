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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Создание страниц</span>
                </h4>
            </div>
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
        </div>

    </div>
    <div class="content">
        <h6 class="panel-title">Языки</h6>
        <form action="languages_set_condition" id="form1">
            <div class="form-button">
                @foreach($languages as $k => $language)
                    <input type="checkbox" name="checkbox{{$k}}" data-name='{{$k}}' hidden>
                @endforeach
                <button type="" class="btn bg-teal-400">Сохранить</button>
            </div>
        </form>

        <!-- CKEditor default -->
        <div class="panel panel-padding panel-flat">
            <table class="table table-lang table-lg">
                <thead>
                <tr>
                    <th><span class="checkall"><input type="checkbox" name="total"></span></th>
                    <th>Флаг</th>
                    <th>Язык</th>
                    <th>URL</th>
                    <th>Сортировка</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($languages as $k => $language)
                    <tr>
                        <th class="text-center"><input data-name='{{$k}}' @if($language->active == 1)checked @endif type="checkbox"></th>
                        <th class="text-center">{!!  Html::image($language->icon,'pic',array('height'=>'20px', 'width'=>'20px'))  !!}</th>
                        <th>{{$language->language_name}}</th>
                        <th>{{$language->language_url}}</th>
                        <th>{{$language->sort}}</th>
                        <th class="text-center">
                            <form method="get" action="{{route('languages_edit')}}" enctype="multipart/form-data">
                                <input name="id" type="hidden" value='{{$language->id}}'>
                                <button type="" class="btn bg-teal-400"><span class="glyphicon glyphicon-pencil"></span></button>
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
            &copy; 2017.  by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
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
