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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Категории</span></h4>
            </div>
        </div>

    </div>
    <div class="content">
        <h5 class="panel-title">Редактор</h5>
        <form method="post" action="{{route('categories_make')}}" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <!-- CKEditor default -->
        <div class="panel panel-flat">
            <div class="form-button">
                <button type="submit" class="btn bg-teal-400">{{$languages[0]->upload_button_name}}</button>
            </div>
            <div class="select-category">
            <span>Выберите категорию:</span>
            <select class="selectpicker" name="parent_category">
                <option selected></option>
                @foreach($categories as $category)
                    <option>{{$category->name}}</option>
                @endforeach
            </select>
            </div>
            <div>

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
        </script>


    </div>
    <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->
