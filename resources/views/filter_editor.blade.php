<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    @include('layouts.styles')
    <form role="form" method="post" action="{{ route('add_filter') }}" enctype="multipart/form-data">
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Редактор фильтров</span>
                </h4>

            </div>
            <div class="form-button page-header-btn-right">
                <label class="labelIgnore" for="" style="font-weight: bold;">Показать в фильтре</label>
                <label class="switch">
                    <input type="checkbox" name="is_view">
                    <span class="slider"></span>
                </label>
                <button type="submit" class="btn bg-teal-400">Обновить</button>
            </div>

        </div>

    </div>
    <div class="content">
        <h5 class="panel-title">Редактор фильтров</h5>

            <input name="_token" type="hidden" value="{{ csrf_token() }}">



        <!-- CKEditor default -->
            <div class="panel panel-flat">
                <div class="product-content">
                <div class="common">
                    <div class="col-md-6">
                        <table class=" products-table-list no-chess table-lang table-lg table-striped" id="table-collapsed_2">
                            <thead>
                            <tr>
                                <th><span class="checkall"></span></th>
                                <th>Фильтры</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($filters as $filter)
                                @if(!is_null($filter->parent_filter))
                                    <tr data-node="treetable-{{$filter->filter_id}}" data-pnode="treetable-parent-{{$filter->parent_filter}}">
                                @else
                                    <tr data-node="treetable-{{$filter->filter_id}}" data-pnode="">
                                @endif
                                    <th>
                                        <input type="checkbox" name="parent_filter[{{$filter->filter_id}}]">
                                    </th>
                                    <td>{{$filter->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <select class="selectpicker" name="filter_type">
                                <option selected>Чекбокс</option>
                                <option>Ползунок</option>
                                <option>Картинка</option>
                            </select>

                        </table>
                    </div>
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

                    <div class="tab-content">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>{{$errors->first()}}</strong>
                            </div>
                        @endif
                        <input name="number" type="hidden" value="{{$number}}">
                        @if(isset($languages[0]))
                            <div role="tabpanel" class="tab-pane fade in active" id="{{$languages[0]->language_url}}">
                                <input name="lang_id[0]" type="hidden" value="{{$languages[0]->id}}">
                                <div class="panel-heading">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input name="name[0]" type="text" id="name[0]" placeholder="{{$languages[0]->name_placeholder}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>URL*</label>
                                            <input name="url[0]" type="text" id="url[0]" placeholder="{{$languages[0]->url_placeholder}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Title*</label>
                                            <input name="title[0]" type="text" id="title[0]" placeholder="{{$languages[0]->title_placeholder}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description*</label>
                                            <input name="description[0]" type="text" id="description[0]"
                                                   placeholder="{{$languages[0]->description_placeholder}}">
                                        </div>
                                        <textarea name="editor[0]" id="editor[0]">

                           </textarea>

                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($languages[1]))
                            <div role="tabpanel" class="tab-pane fade" id="{{$languages[1]->language_url}}">
                                <input name="lang_id[1]" type="hidden" value="{{$languages[1]->id}}">
                                <div class="panel-heading">
                                    <div class="form-inline">
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input name="name[1]" type="text" id="name[1]" placeholder="{{$languages[1]->name_placeholder}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>URL*</label>
                                            <input name="url[1]" type="text" id="url[1]" placeholder="{{$languages[1]->url_placeholder}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Title*</label>
                                            <input name="title[1]" type="text" id="title[1]" placeholder="{{$languages[1]->title_placeholder}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description*</label>
                                            <input name="description[1]" type="text" id="description[1]"
                                                   placeholder="{{$languages[1]->description_placeholder}}">
                                        </div>
                                        <textarea name="editor[1]" id="editor[1]">

                           </textarea>

                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                </div>

            </div>



        <!-- /CKEditor default -->

        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov"
                                                                     target="_blank">Eugene Kopyov</a>
        </div>
        <!-- /footer -->
        <script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace('editor[0]');
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor1
			});

			var ckeditor2 = CKEDITOR.replace('editor[1]');
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor2
			});

			jQuery("#table-collapsed_1").treeFy({
				treeColumn: 0
			});
			jQuery("#table-collapsed_2").treeFy({
				treeColumn: 0
			});
        </script>


    </div>
    <!-- /content area -->
    </form>

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->
