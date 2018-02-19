<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

@include('layouts.styles')

<!-- Main navbar -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Список акций</span></h4>
            </div>
            <!--<button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>-->
            <form role="form" method="get" action="{{ route('object_editor_vent') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="" class="btn bg-teal-600 page-header-btn-right">Создать</button>
            </form>
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
        </div>

    </div>


    <!-- Content area -->
    <div class="content">
        <h6 class="content-group text-semibold">
            Список cтраниц
            <small class="display-block">Список cтраниц</small>
            <form role="form" method="get" action="{{ route('make_new_non_standart_page') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Создать новую</button>
                </div>
            </form>
        </h6>

        <div class="list-page">
            <div class="panel panel-flat">
                Главная страница
                        <div class="row">
                            <div class="navbar-button">
                                <div class="navbar-edit">
                                    <form role="form" method="get" action="{{ route('page_1') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="id" class="form-control" id="id" value="">
                                            <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                        </div>
                                        <button type="submit" class="btn btn-success">Редактировать</button>
                                    </form>
                                </div>
                                <div class="navbar-edit">
                                    <form role="form" method="get" action="{{ route('page_1') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="id" class="form-control" id="id" value="">
                                            <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                        </div>
                                    </form>
                                </div>
                                <div  class="navbar-trash">
                                    <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="1">
                                        </div>
                                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="panel panel-flat">
                Страница CMS
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('cms_14') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_1') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="1">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 2
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_2') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="2">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 3
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_3') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="3">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 4
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_4') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="4">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 5
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_5') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="5">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 6
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_6') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="6">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 7
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_7') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="7">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 8
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_8') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="8">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 9
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_9') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="9">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 10
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_10') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="10">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 11
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_11') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="11">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 12
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_12') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="12">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-flat">
                Страница 13
                <div class="row">
                    <div class="navbar-button">
                        <div class="navbar-edit">
                            <form role="form" method="get" action="{{ route('page_13') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id" class="form-control" id="id" value="">
                                    <input type="hidden" name="object_id" class="form-control" id="obj_id" value="">
                                </div>
                                <button type="submit" class="btn btn-success">Редактировать</button>
                            </form>
                        </div>
                        <div  class="navbar-trash">
                            <form role="form" method="post" action="{{ route('display_non_standart_page') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="non_standart_page_id" class="form-control" id="non_standart_page_id" value="13">
                                </div>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /panel heading options --

					<!-- Footer -->
            <div class="footer text-muted">
                &copy; 2017.  by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
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