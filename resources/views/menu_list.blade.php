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
                <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Список меню</span>
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
        <h6 class="panel-title">Список меню</h6>
        <form action="" id="form1">
            <div class="form-button">
                <input type="checkbox" data-name='1' hidden>
                <input type="checkbox" data-name='2' hidden>
                <button type="" class="btn bg-teal-400">Сохранить</button>

            </div>
        </form>

        <!-- CKEditor default -->

        <div class="tab-content" style="padding:0 50px;">
            <div role="tabpanel" class="tab-pane fade in active " id="ru">
                <table class="  table-lang table-lg " style="margin: 50px auto;">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Создано</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="input-group input-number" data-trigger="spinner">
                                <input type="text" class="form-control text-center" value="1" data-rule="quantity">
                                <div class="input-group-addon">
                                    <a href="javascript:;" class="spin-up" data-spin="up"><i
                                                class="fa fa-caret-up"></i></a>
                                    <a href="javascript:;" class="spin-down" data-spin="down"><i
                                                class="fa fa-caret-down"></i></a>
                                </div>
                            </div>
                        </td>
                        <td><a href="menu/about_us/" style="text-decoration: underline">О компании</a></td>
                        <td>О компании</td>
                        <td>2017-11-12 00:00:00</td>

                        <td>
                            <form method="get" action="{{ route('menu_redirect') }}" enctype="multipart/form-data">
                                <input name="type" type="hidden" value='about_us'>
                                <!--
                                <button type="" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span>
                                </button>
                                -->
                                <button type="" class="btn bg-teal-400"><span
                                            class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="input-group input-number" data-trigger="spinner">
                                <input type="text" class="form-control text-center" value="1" data-rule="quantity">
                                <div class="input-group-addon">
                                    <a href="javascript:;" class="spin-up" data-spin="up"><i
                                                class="fa fa-caret-up"></i></a>
                                    <a href="javascript:;" class="spin-down" data-spin="down"><i
                                                class="fa fa-caret-down"></i></a>
                                </div>
                            </div>
                        </td>
                        <td><a href="menu/pages/" style="text-decoration: underline">Услуги</a></td>
                        <td>Услуги</td>
                        <td>2017-11-12 00:00:00</td>

                        <td>
                            <form method="get" action="{{ route('menu_redirect') }}" enctype="multipart/form-data">
                                <input name="type" type="hidden" value='pages'>
                                <!--
                                <button type="" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"></span>
                                </button>
                                -->
                                <button type="" class="btn bg-teal-400"><span
                                            class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </form>
                        </td>
                    </tr>


                    </tbody>
                </table>
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
