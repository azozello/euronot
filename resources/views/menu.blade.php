<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    @include('layouts.styles')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Меню</span>
                </h4>


            </div>
            <button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
        </div>

    </div>
    <div class="content">

            {{--<input type="hidden" name="menu" class="form-control" id="id" value="{{$menu}}">--}}
            <!-- CKEditor default -->

            <div class="tab-content" style="padding:0 50px;">
                <div role="tabpanel" class="tab-pane fade in active " id="ru">
                    <table class="  table-lang table-lg " style="margin: 50px auto;">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th style="min-width: 310px;">Наименование</th>
                            <th>URL</th>
                            <th>Тип</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>
                                    <p>@if(isset($page->position)){{$page->position}}@endif</p>
                                </td>
                                <td>
                                    <p>@if(isset($page->name)){{$page->name}}@endif</p>
                                </td>
                                <td>
                                    <p>@if(isset($page->url)){{$page->url}}@endif</p>
                                </td>
                                <td>
                                    <p>
                                        @if(isset($page->type))
                                            @if($page->type == 'top')Верхнее меню@endif
                                            @if($page->type == 'down')Нижнее меню@endif
                                            @if($page->type == 'mid')Среднее меню@endif
                                        @endif
                                    </p>
                                </td>
                                <td>
                                    <form method="get" role="form" action="{{route('edit_menu_list')}}">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <input name="menu_id" type="hidden" value="{{$page->id}}"/>
                                        <button type="submit">Редактировать</button>
                                    </form>
                                </td>
                                <td>
                                    <form method="post" role="form" action="{{route('menu_list_delete')}}">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <input name="menu_id" type="hidden" value="{{$page->id}}"/>
                                        <button type="submit">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>


    </div>

                <h3><a href="{{route('menu_add')}}">Добавить</a></h3>



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
