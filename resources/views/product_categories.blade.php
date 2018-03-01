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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Категории товаров</span>
                </h4>
                <button type="" class="btn bg-teal-400" style="margin-left: 30px">Создать товар</button>
            </div>
            <form method="post" action="{{ route('categories_active') }}" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">

                    @foreach($categories_1 as $k=>$category)
                        <input type="checkbox" name="ru[{{$category->category_id}}]" data-name='ru_{{$category->category_id}}'hidden>
                    @endforeach



            </form>
        </div>
    </div>
    <div class="content">



        <!-- CKEditor default -->
        <div class="panel panel-flat">
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
            <div class="tab-content" style="padding:0 50px;">
                <div role="tabpanel" class="tab-pane fade in active" id="{{$languages[0]->language_url}}">
                    <table class="table-full-width table-category table-lang table-lg table-striped" id="table-collapsed_1">
                        <thead>
                        <tr >
                            <th>Название</th>
                            <th>URL</th>
                            <!--
                            <th>Количество</th>
                            <th>Вкл/Выкл</th>
                            -->
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>     <!-- Разобраться как добыть идентификатор для определения родительской категории -->
                        @foreach($categories_1 as $categories)
                            @if(!is_null($categories->parent_category_id))
                                <tr data-node="treetable-{{$categories->category_id}}" data-pnode="treetable-parent-{{$categories->parent_category_id}}">
                            @else
                        <tr data-node="treetable-{{$categories->category_id}}" data-pnode="">
                            @endif
                            <td>{{$categories->name}}</td>
                            <td>{{$categories->url}}</td>
                            <!--
                            <td>
                                @php
                                $categories_quantity = explode(' ',$categories->products_id);
                                array_pop($categories_quantity);
                                echo(count($categories_quantity))
                                @endphp
                            </td>
                            <td><label class="switch">
                                    <input type="checkbox" @if($categories->is_active == 1) checked @endif data-name="ru_{{$categories->category_id}}">
                                    <span class="slider"></span>
                                </label></td>
                                -->
                            <td>

                                <div class="btn-table-wrap">
                                <form method="get" action="{{ route('categories_delete') }}" enctype="multipart/form-data">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input name="category_id" type="hidden" value='{{$categories->category_id}}'>
                                    <button type="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                                <form method="post" action="{{ route('categories_edit_show') }}" enctype="multipart/form-data">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input name="category_id" type="hidden" value='{{$categories->category_id}}'>
                                    <button type="" class="btn bg-teal-400"><span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>


        </div>


        <!-- /CKEditor default -->

        <!-- Footer -->
        <div class="footer text-muted">

        </div>
        <!-- /footer -->
        <script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace('editor1');
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor1
			});


        </script>
        <script>
	        jQuery("#table-collapsed_1").treeFy({
		        treeColumn: 0
	        });
	        jQuery("#table-collapsed_2").treeFy({
		        treeColumn: 0
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
