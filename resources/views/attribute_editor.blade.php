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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Редактор атрибутов</span>
                </h4>
            </div>
            <button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>
        </div>

    </div>
    <div class="content">
        <h5 class="panel-title">Редактор атрибутов</h5>
        <form role="form" method="post" action="{{ route('attributes_make') }}" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input name="number" type="hidden" value="{{$number}}">
            <div class="form-button">
                <button type="submit" class="btn bg-teal-400">Обновить</button>
            </div>

            <!-- CKEditor default -->
            <div class="panel panel-flat">
                <div class="product-content">
                    <div class="common">
                        <table class="products-table-list no-chess table-lang table-lg table-striped" style="width: 100%;" id="table-collapsed_1">
                            <thead>
                            <tr>
                                <th><span class="checkall"></span></th>
                                <th >Фильтры</th>
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

                        </table>
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
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first()}}</strong>
                                </div>
                            @endif
                            @if(isset($languages[0]))
                                <div role="tabpanel" class="tab-pane fade in active" id="{{$languages[0]->language_url}}">
                                    <input name="lang_id[0]" type="hidden" value="{{$languages[0]->id}}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-content" style="padding-left: 50px;">

                                                <h5 class="content-group text-semibold">
                                                    <label>Название*</label>
                                                    <input name="name[0]" type="text" id="name[0]" placeholder="{{$languages[0]->name_placeholder}}">
                                                </h5>

                                                <h5 class="content-group text-semibold">
                                                    <label>URL*</label>
                                                    <input name="url[0]" type="text" id="url[0]" placeholder="{{$languages[0]->url_placeholder}}">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Title*</label>
                                                    <input name="title[0]" type="text" id="title[0]" placeholder="{{$languages[0]->title_placeholder}}">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Description*</label>
                                                    <textarea name="description[0]" placeholder="{{$languages[0]->description_placeholder}}"
                                                              id="description[0]"></textarea>
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-12">
                                      <textarea name="editor[0]" id="editor[0]">

                           </textarea>
                                        </div>
                                    </div>

                                </div>
                            @endif
                            @if(isset($languages[0]))
                                <div role="tabpanel" class="tab-pane fade" id="{{$languages[1]->language_url}}">
                                    <input name="lang_id[1]" type="hidden" value="{{$languages[1]->id}}">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-content" style="padding-left: 50px;">

                                                <h5 class="content-group text-semibold">
                                                    <label>Название*</label>
                                                    <input name="name[1]" type="text" id="name[1]" placeholder="{{$languages[1]->name_placeholder}}">
                                                </h5>

                                                <h5 class="content-group text-semibold">
                                                    <label>URL*</label>
                                                    <input name="url[1]" type="text" id="url[1]" placeholder="{{$languages[1]->url_placeholder}}">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Title*</label>
                                                    <input name="title[1]" type="text" id="title[1]" placeholder="{{$languages[1]->title_placeholder}}">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Description*</label>
                                                    <textarea name="description[1]" placeholder="{{$languages[1]->description_placeholder}}"
                                                              id="description[1]"></textarea>
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-12">
                                      <textarea name="editor[1]" id="editor[1]">

                           </textarea>
                                        </div>
                                    </div>

                                </div>
                            @endif

                        </div>
                        <div class="common-right">
                            <div>
                                <div class="upload-file-container-text">

                                    <input type="file" name="file[]" multiple
                                           class="uploadFileImgInput photo"/>
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

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->