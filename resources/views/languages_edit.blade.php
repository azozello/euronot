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
        <h6 class="content-group text-semibold">
            Языки
            <small class="display-block">Редактирование</small>
        </h6>
    {{ csrf_field() }}
    <!-- CKEditor default -->
        <div class="panel panel-flat">
            <div>
                <!-- Nav tabs -->
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="panel-heading">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>{{$errors->first()}}</strong>
                            </div>
                        @endif

                        <div class="form-lang-edit">
                            <div class="form-content">
                                <form method="post" action="{{ route('languages_edit_make') }}"
                                      enctype="multipart/form-data">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input name="id" type="hidden" value="{{$language[0]->id}}">
                                    <div class="form-button">
                                        <button type="submit" class="btn bg-teal-400">Сохранить</button>
                                        <button type="" class="btn btn-default"><span
                                                    class="glyphicon glyphicon-arrow-left"></span></button>
                                    </div>
                                    <div class="form-group">
                                        <label>Название*</label>
                                        <input name="name" type="text" id="name" placeholder="Введіть назву*"
                                               value="{{$language[0]->name}}">
                                    </div>
                                    <div class="form-group ">
                                        <label>URL*</label>
                                        <input name="url" type="text" id="url" placeholder="Введіть URL*"
                                               value="{{$language[0]->url}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Изображение*</label>
                                        <div class="file-upload">



                                            <input type="file" name="file" onchange="getFileName ();"
                                                   id="uploaded-file">

                                            <span>Выбрать изображение</span>


                                        </div>

                                        <div id="file-name"></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Сортировка*</label>
                                        <input name="sort" type="text" id="sort"
                                               placeholder="Введіть description*" value="{{$language[0]->sort}}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


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
