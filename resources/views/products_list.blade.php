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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Список товаров</span>
                </h4>


            </div>
            <button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>
        </div>

    </div>
    <div class="content">
        <h6 class="panel-title">Список товаров</h6>
        <form action="" id="form1">
            <div class="form-button">
                <input type="checkbox" data-name='1' hidden>
                <input type="checkbox" data-name='2' hidden>
                <button type="" class="btn bg-teal-400">Сохранить</button>

            </div>
        </form>

        <!-- CKEditor default -->
        <div class="panel panel-padding panel-flat">
            <table class="table products-table-list table-lang table-lg">
                <thead>
                <tr>
                    <th>Артикул</th>
                    <th>Товар</th>
                    <th>Категрии</th>
                    <th>Количество</th>
                    <th>Вкл/Выкл</th>
                    <th>Цена</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>
                        <form class="products-search-form" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder=".....">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span
                                                    class="glyphicon glyphicon-search"
                                                    aria-hidden="true"></span></button>
                                    </span>
                            </div>
                        </form>
                    </th>
                    <th>
                        <form class="products-search-form" action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Впишите название*">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span
                                                    class="glyphicon glyphicon-search"
                                                    aria-hidden="true"></span></button>
                                    </span>
                            </div>
                        </form>
                    </th>
                    <th>
                        <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                            <option>Все</option>
                            <option>Бойлеры комбинированные</option>
                            <option>Бойлеры косвенного нагрева</option>
                            <option>Проточные водонагриватели</option>
                            <option>Аксессуары</option>
                        </select>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>1122</th>
                    <th><a href="#" class="product-link">
                            <div class="product-img"><img src="../../public/images/term.jpg" alt="product"></div>
                            <div class="product-text">Терморегулятор IQ Electronics COD 22342<span class="blue-text">IQ Electronics</span>
                            </div>
                        </a></th>
                    <th>Терморегуляторы</th>
                    <th>5</th>
                    <th><label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label></th>
                    <th><input class="input-price" title="price" type="text" value="1332">
                        <div class="input-buffer"></div>
                        <span>грн</span>
                        <button type="" class="btn bg-teal-400"><span title="save"
                                                                      class="	glyphicon glyphicon-floppy-disk"></span>
                        </button>
                    </th>
                    <th>
                        <form class="products-search-btn" method="" action="" enctype="multipart/form-data">
                            <input name="id" type="hidden" value=''>
                            <button type="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                            </button>
                            <button type="" class="btn bg-teal-400"><span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </form>
                    </th>
                </tr>

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
