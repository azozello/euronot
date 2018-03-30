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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Редактирование страниц</span></h4>
            </div>
        </div>

    </div>
    <div class="content">
        <h5 class="panel-title">Редактор</h5>
        <!-- CKEditor default -->
        <div class="panel panel-flat">
            <div>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    @if(isset($pages[0]))
                        <li role="presentation" class="active"><a href="#{{$pages[0]->language_url}}" aria-controls="{{$pages[0]->language_url}}" role="tab"
                                                                  data-toggle="tab">{{$pages[0]->language_name}}</a></li>
                    @endif
                    @if(isset($pages[1]))
                        <li role="presentation"><a href="#{{$pages[1]->language_url}}" aria-controls="{{$pages[1]->language_url}}" role="tab"
                                                   data-toggle="tab">{{$pages[1]->language_name}}</a></li>
                    @endif
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>{{$errors->first()}}</strong>
                        </div>
                    @endif
                        @if(isset($pages[0]))
                            <form method="post" action="{{ route('edit_page') }}" enctype="multipart/form-data">
                        <div role="tabpanel" class="tab-pane fade in active" id="{{$pages[0]->language_url}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="page_id" type="hidden" value="{{$pages[0]->page_id}}">
                                <input name="page_lang[0]" type="hidden" value="{{$pages[0]->page_lang}}">
                                <div class="panel-heading">
                                    <div class="form-inline">
                                        <div class="form-button">
                                            <button type="submit" class="btn bg-teal-400">{{$pages[0]->upload_button_name}}</button>
                                        </div>
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input name="name[0]" type="text" id="name" placeholder="{{$pages[0]->name_placeholder}}" value="{{$pages[0]->page_name}}">
                                        </div>
                                        <div class="form-group ">
                                            <label>URL*</label>
                                            <input name="url[0]" type="text" id="url" placeholder="{{$pages[0]->url_placeholder}}" value="{{$pages[0]->page_url}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Title*</label>
                                            <input name="title[0]" type="text" id="title" placeholder="{{$pages[0]->title_placeholder}}" value="{{$pages[0]->page_title}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description*</label>
                                            <input name="description[0]" type="text" id="description"
                                                   placeholder="{{$pages[0]->description_placeholder}}" value="{{$pages[0]->page_description}}">
                                        </div>
                                        <textarea name="editor[0]" id="editor0">
                                   {{$pages[0]->page_text}}
                           </textarea>

                                    </div>
                                </div>
                        </div>
                        @endif
                            @if(isset($pages[1]))
                            <div role="tabpanel" class="tab-pane fade " id="{{$pages[1]->language_url}}">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input name="page_lang[1]" type="hidden" value="{{$pages[1]->page_lang}}">
                                    <div class="panel-heading">
                                        <div class="form-inline">
                                            <div class="form-button">
                                                <button type="submit" class="btn bg-teal-400">{{$pages[1]->upload_button_name}}</button>
                                            </div>
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input name="name[1]" type="text" id="name" placeholder="{{$pages[1]->name_placeholder}}" value="{{$pages[1]->page_name}}">
                                            </div>
                                            <div class="form-group ">
                                                <label>URL*</label>
                                                <input name="url[1]" type="text" id="url" placeholder="{{$pages[1]->url_placeholder}}" value="{{$pages[1]->page_url}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Title*</label>
                                                <input name="title[1]" type="text" id="title" placeholder="{{$pages[1]->title_placeholder}}" value="{{$pages[1]->page_title}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Description*</label>
                                                <input name="description[1]" type="text" id="description"
                                                       placeholder="{{$pages[1]->description_placeholder}}" value="{{$pages[1]->page_description}}">
                                            </div>
                                            <textarea name="editor[1]" id="editor1">
                                   {{$pages[1]->page_text}}
                           </textarea>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endif

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
                    @foreach($pages as $k=>$page)
            var ckeditor1 = CKEDITOR.replace('editor{{$k}}');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
            @endforeach
        </script>


    </div>
    <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->
