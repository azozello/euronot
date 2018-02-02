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
        <form method="get" action="{{route('change_product_active')}}" enctype="multipart/form-data">
            <div class="form-button">
                @foreach($products as $product)
                                <input data-name='{{$product->product_id}}' name="product_id[{{$product->product_id}}]" @if($product->is_active == 1) checked @endif type="checkbox" hidden>
                    <input name="all_product_id[]" type="hidden" value="{{$product->product_id}}">
        @endforeach
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
                    <th>Категории</th>
                    <th>Количество</th>
                    <th>Вкл/Выкл</th>
                    <th>Цена</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>
                        <form method="get" action="{{route('search_by_article')}}" enctype="multipart/form-data">
                            <div class="input-group">
                                <input type="text" name="article" class="form-control" placeholder=".....">
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span
                                                    class="glyphicon glyphicon-search"
                                                    aria-hidden="true"></span></button>
                                    </span>
                            </div>
                        </form>
                    </th>
                    <th>
                        <form method="get" action="{{route('search_by_name')}}" enctype="multipart/form-data">
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
                        <form method="get" action="{{route('search_by_category')}}" enctype="multipart/form-data">
                            <select class="selectpicker" name="category" data-show-subtext="true" data-live-search="true">
                                <option>Все</option>
                                @foreach($categories as $category)
                                <option>{{$category->name}}</option>
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
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <th>{{$product->article}}</th>
                    <th><a href="#" class="product-link">
                            <div class="product-img">{!!  Html::image('product_images/'.$product->image) !!}</div>
                            <div class="product-text">{{$product->name}}
                            </div>
                        </a></th>
                    <th>
                        @foreach($categories_list[$product->product_id] as $list)
                            @if(isset($list)){{$list}}@endif
                        @endforeach
                    </th>
                    <th>{{$product->quantity}}</th>
                    <th><label class="switch">
                            <input data-name='{{$product->product_id}}' @if($product->is_active == 1) checked @endif type="checkbox">
                            <span class="slider"></span>
                        </label></th>
                    <th>
                        <div class="flex-inline">
                            <form method="get" action="{{route('change_price')}}" enctype="multipart/form-data">
                            <div class="input-group">
                                <input class="input-price" name="price" title="price" type="text" value="{{$product->price}}">
                                <input name="product_id" type="hidden" value="{{$product->product_id}}">
                                <div class="input-group-addon">грн

                                    <button type="" class="btn bg-teal-400"><span title="save"
                                                                                  class="	glyphicon glyphicon-floppy-disk"></span>
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </th>
                    <th>
                        <form method="get" action="{{route('delete_product')}}" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="product_id" type="hidden" value='{{$product->product_id}}'>
                            <button type="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </form>
                        <form method="get" action="{{route('edit_product_show')}}" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="product_id" type="hidden" value='{{$product->product_id}}'>
                            <button type="" class="btn bg-teal-400"><span class="glyphicon glyphicon-pencil"></span>
                            </button>
                        </form>
                    </th>
                </tr>
                    </form>
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
