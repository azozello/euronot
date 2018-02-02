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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Карта товара</span>
                </h4>
            </div>
            <button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>

        </div>

    </div>
    <div class="content">


        <form role="form" method="post" action="{{route('product_card_add')}}" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <div class="form-button">
                <button type="submit" class="btn bg-teal-400">Обновить</button>
            </div>
            <!-- CKEditor default -->
            <ul class="nav nav-tabs nav-tabs-product" role="tablist">
                <li role="presentation"><a href="#common" aria-controls="common" role="tab"
                                           data-toggle="tab">Общее</a></li>
                <li role="presentation"><a href="#communications" aria-controls="" role="tab"
                                           data-toggle="tab">Связи</a></li>
                <li role="presentation" class="active"><a href="#characteristics" aria-controls="" role="tab"
                                                          data-toggle="tab">Характеристики</a></li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="common tab-pane fade " id="common">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>{{$errors->first()}}</strong>
                        </div>
                    @endif
                    <div class="panel panel-flat">
                        <div class="product-content">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">

                                @if(isset($languages[0]))
                                    <li role="presentation" class="active"><a href="#{{$languages[0]->language_url}}" aria-controls="{{$languages[0]->language_url}}" role="tab"
                                                                              data-toggle="tab">{{$languages[0]->language_name}}</a></li>
                                @endif
                                @if(isset($languages[1]))
                                    <li role="presentation"><a href="#{{$languages[1]->language_url}}" aria-controls="{{$languages[1]->language_url}}" role="tab"
                                                               data-toggle="tab">{{$languages[1]->language_name}}</a></li>
                                @endif
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                @if(isset($languages[0]))
                                    <div role="tabpanel" class="tab-pane fade in active " id="{{$languages[0]->language_url}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-content" style="padding-left: 50px;">
                                                    <input name="language_id[0]" type="hidden" value="{{$languages[0]->id}}">
                                                    <h5 class="content-group text-semibold">
                                                        <label>Название*</label>
                                                        <input type="text" name="name[0]"
                                                               value=""
                                                               placeholder="{{$languages[0]->name_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Артикул*</label>
                                                        <input type="text" name="article[0]"
                                                               value=""
                                                               placeholder="{{$languages[0]->article_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>URL*</label>
                                                        <input type="text" name="url[0]"
                                                               value=""
                                                               placeholder="{{$languages[0]->url_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Title*</label>
                                                        <input type="text" name="title[0]"
                                                               value=""
                                                               placeholder="{{$languages[0]->title_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Description*</label>
                                                        <textarea placeholder="{{$languages[0]->description_placeholder}}" name="description[0]"
                                                                  id=""></textarea>
                                                    </h5>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="editor[0]" id="editor1"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                                @if(isset($languages[1]))
                                    <div role="tabpanel" class="tab-pane fade" id="{{$languages[1]->language_url}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-content" style="padding-left: 50px;">
                                                    <input name="language_id[1]" type="hidden" value="{{$languages[1]->id}}">
                                                    <h5 class="content-group text-semibold">
                                                        <label>Название*</label>
                                                        <input type="text" name="name[1]"
                                                               value=""
                                                               placeholder="{{$languages[1]->name_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Артикул*</label>
                                                        <input type="text" name="article[1]"
                                                               value=""
                                                               placeholder="{{$languages[1]->article_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>URL*</label>
                                                        <input type="text" name="url[1]"
                                                               value=""
                                                               placeholder="{{$languages[1]->url_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Title*</label>
                                                        <input type="text" name="title[1]"
                                                               value=""
                                                               placeholder="{{$languages[1]->title_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Description*</label>
                                                        <textarea placeholder="{{$languages[1]->description_placeholder}}" name="description[1]"
                                                                  id=""></textarea>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="editor[1]" id="editor2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="common-right">
                                    <div class="form-content" style="padding-left: 50px;">
                                        <h5>Поставщик</h5>
                                        <select class="selectpicker" name="product_provider">
                                            @foreach($suppliers as $supplier)
                                                <option>{{$supplier->traders_name}}</option>
                                            @endforeach
                                        </select>
                                        <h5>Задержка поставки</h5>
                                        <select class="selectpicker" name="product_delay_in_delivery">
                                            <option selected>0 дней 	получение сегодня на сегодня
                                            </option>
                                            <option>1 день		получение сегодня на завтра
                                            </option>
                                            <option>2 дня		получение сегодня на послезавтра
                                            </option>
                                        </select>
                                        <h5 class="content-group text-semibold">
                                            <label>Крайнее время заказа товара поставщику</label>
                                            <input type="text" name="product_deadline_to_arrive"
                                                   value=""
                                                   placeholder="Введите крайнее время*">
                                        </h5>
                                        <h5 class="content-group text-semibold">
                                            <label>Оптимальный остаток товара на складе</label>
                                            <input type="text" name="product_optimal_quantity"
                                                   value=""
                                                   placeholder="Введите оптимальный остаток*">
                                        </h5>
                                        <h5 class="content-group text-semibold">
                                            <label>Признак наличия товара у поставщика
                                            </label>
                                            <input type="text" name="product_availability"
                                                   value=""
                                                   placeholder="Введите признак наличия*">
                                        </h5>
                                        <h5 class="content-group text-semibold">
                                            <label>Цена*</label>
                                            <input type="text" name="price"
                                                   value=""
                                                   placeholder="Введите цену*">
                                        </h5>
                                        <h5 class="content-group text-semibold">
                                            <label>Цена закупки*</label>
                                            <input type="text" name="supplier_price"
                                                   value=""
                                                   placeholder="Введите цену*">
                                        </h5>
                                        <h5 class="content-group text-semibold">
                                            <label>Количество*</label>
                                            <input type="text" name="quantity"
                                                   value=""
                                                   placeholder="Введите количество*">
                                        </h5>
                                        <h5 class="content-group text-semibold">
                                            <label>% Арабики в кофе</label>
                                            <p><input type="number" size="3" name="coffee_type" min="0" max="100"></p>
                                        </h5>
                                        <div class="upload-photos">
                                            <div class="input-file-row-1">

                                                <div class="upload-file-container">
                                                    <img id="image" src="#" alt=""/>
                                                    <div class="upload-file-container-text">
                                                        <button type="" class="upload-single-photo btn bg-teal-400">
                                                            Обновить
                                                        </button>
                                                        <input type="file" name="pic[]" class="photo"
                                                               id="imgInput"/>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="demo-section k-content">
                                                <input name="files[]" id="files" type="file"/>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Связи  -->
                <div role="tabpanel" class="communications tab-pane fade  " id="communications">
                    <div class="panel panel-flat">
                        <div class="product-content">

                            <!-- Nav tabs -->

                            <!-- Tab panes -->
                            <div role="tabpanel" class="tab-pane fade in active" id="ru2">
                                <table class=" products-table-list no-chess table-lang table-lg table-striped"
                                       id="table-collapsed_55">
                                    <thead>
                                    <tr>
                                        <th><span class="checkall"></span></th>
                                        <th>Категории</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        @if(!is_null($category->parent_category_id))
                                            <tr data-node="treetable-{{$category->category_id}}" data-pnode="treetable-parent-{{$category->parent_category_id}}">
                                        @else
                                            <tr data-node="treetable-{{$category->category_id}}" data-pnode="">
                                                @endif
                                                <th>
                                                    <input name="category[{{$category->category_id}}]" type="checkbox">
                                                </th>
                                                <td>{{$category->name}}</td>

                                            </tr>
                                            @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>

                </div>
                <div role="tabpanel" class="characteristics tab-pane fade " id="characteristics">
                    <div class="panel panel-flat">
                        <div class="product-content">

                            <!-- Nav tabs -->

                            <div class="tab-content tab-flex">
                                <div role="tabpanel" class="tab-pane fade in active" id="ru3">
                                    <table class="no-chess table-lang table-lg table-striped"
                                           style="" id="table-collapsed_5">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Фильтры</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($filters as $k=>$filter)
                                            <tr data-node="treetable-{{$filter->filter_id}}" data-pnode="">

                                                <th></th>
                                                <td>{{$filter->name}}</td>
                                            </tr>
                                        @endforeach
                                        @foreach($attributes as $k=>$attribute)
                                            <tr data-node="treetable_а-{{$attribute->attributes_id}}" data-pnode="treetable-parent-{{$attribute->attributes_parent_filter}}">

                                                <th>
                                                    <input type="checkbox" id="filter-{{$k}}" name="attribute[{{$attribute->attributes_id}}]">
                                                </th>
                                                <td>{{$attribute->attributes_name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- /CKEditor default -->

        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017. by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
        </div>
        <!-- /footer -->
        <script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace('editor1');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor2');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>

        <script>
            jQuery(document).ready(function () {
                jQuery("#files").kendoUpload({
                    async: {
                        saveUrl: "save",
                        removeUrl: "remove",
                        autoUpload: true
                    }
                });
                jQuery("#table-collapsed_1").treeFy({
                    treeColumn: 0
                });
                jQuery("#table-collapsed_2").treeFy({
                    treeColumn: 0
                });
                jQuery("#table-collapsed_3").treeFy({
                    treeColumn: 0
                });
                jQuery("#table-collapsed_4").treeFy({
                    treeColumn: 0
                });
                jQuery("#table-collapsed_5").treeFy({
                    treeColumn: 0
                });
                jQuery("#table-collapsed_6").treeFy({
                    treeColumn: 0
                });

                jQuery("#table-collapsed_55").treeFy({
                    treeColumn: 0
                });

                $('#addTr').click(function () {
                    var a = $('#small-dialog input[type="checkbox"]:checked');
                    $('.mfp-close').click();

                    $.ajax({
                        url: "/product_card_filters_add",
                        contentType: 'application/json',
                        data: a,
                        type: 'POST',
                        success: function (data) {
                            alert(data[0])
                        },
                        error: function (xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseText);
                        }
                    });
                });
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
