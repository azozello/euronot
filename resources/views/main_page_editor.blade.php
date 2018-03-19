<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    @include('layouts.styles')
    <form method="post" action="{{ route('main_page_edit') }}" enctype="multipart/form-data">
        <input name="page_id" type="hidden" value="2">
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Создание страниц</span></h4>
                </div>
                <button type="submit" class="btn bg-teal-400 page-header-btn-right">Обновить</button>
            </div>

        </div>
        <div class="content">
            <div class="panel panel-flat">
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
                        @if(isset($languages[2]))
                            <li role="presentation"><a href="#{{$languages[2]->language_url}}" aria-controls="{{$languages[2]->language_url}}" role="tab"
                                                       data-toggle="tab">{{$languages[2]->language_name}}</a></li>
                        @endif
                        @if(isset($languages[3]))
                            <li role="presentation"><a href="#{{$languages[3]->language_url}}" aria-controls="{{$languages[3]->language_url}}" role="tab"
                                                       data-toggle="tab">{{$languages[3]->language_name}}</a></li>
                        @endif
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>{{$errors->first()}}</strong>
                            </div>
                        @endif
                        <div class="upload-block">
                            <div class="upload-block__item-wrap">
                                <div class="upload-block__item">
                                    <div class="upload-block__title">Слайдер 1</div>
                                    <div class="upload-block__photo">
                                        <div class="input-file-row-1">
                                            <div class="upload-file-container">
                                                {!!  Html::image('images/'.$main_page[0]->img_0,'',array('class'=>'upload-file-img'))  !!}
                                                <div class="upload-file-container-text">
                                                    <input type="file" name="pic[0]"
                                                           class="uploadFileImgInput photo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <label>URL 1</label>
                                        <input name="url_0" type="text" size="35" value="{{$main_page[0]->img_url_0}}">
                                        <div class="uploadFileImgButton btn photo__btn-upload bg-teal-700">
                                            Загрузить
                                        </div>
                                    </div>
                                </div>
                                <div class="upload-block__item">
                                    <div class="upload-block__title">Слайдер 2</div>
                                    <div class="upload-block__photo">
                                        <div class="input-file-row-1">
                                            <div class="upload-file-container">
                                                {!!  Html::image('images/'.$main_page[0]->img_1,'',array('class'=>'upload-file-img'))  !!}
                                                <div class="upload-file-container-text">
                                                    <input type="file" name="pic[1]"
                                                           class="uploadFileImgInput photo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <label>URL 2</label>
                                        <input name="url_1" type="text" size="35" value="{{$main_page[0]->img_url_1}}">
                                        <div class="uploadFileImgButton btn photo__btn-upload bg-teal-700">
                                            Загрузить
                                        </div>
                                    </div>
                                </div>
                                <div class="upload-block__item">
                                    <div class="upload-block__title">Слайдер 3</div>
                                    <div class="upload-block__photo">
                                        <div class="input-file-row-1">
                                            <div class="upload-file-container">
                                                {!!  Html::image('images/'.$main_page[0]->img_2,'',array('class'=>'upload-file-img'))  !!}
                                                <div class="upload-file-container-text">
                                                    <input type="file" name="pic[2]"
                                                           class="uploadFileImgInput photo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <label>URL 3</label>
                                        <input name="url_2" type="text" size="35" value="{{$main_page[0]->img_url_2}}">
                                        <div class="uploadFileImgButton btn photo__btn-upload bg-teal-700">
                                            Загрузить
                                        </div>
                                    </div>
                                </div>
                                <div class="upload-block__item">
                                    <div class="upload-block__title">Слайдер 4</div>
                                    <div class="upload-block__photo">
                                        <div class="input-file-row-1">
                                            <div class="upload-file-container">
                                                {!!  Html::image('images/'.$main_page[0]->img_3,'',array('class'=>'upload-file-img'))  !!}
                                                <div class="upload-file-container-text">
                                                    <input type="file" name="pic[3]"
                                                           class="uploadFileImgInput photo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <label>URL 4</label>
                                        <input name="url_3" type="text" size="35" value="{{$main_page[0]->img_url_3}}">
                                        <div class="uploadFileImgButton btn photo__btn-upload bg-teal-700">
                                            Загрузить
                                        </div>
                                    </div>
                                </div>
                                <div class="upload-block__item">
                                    <div class="upload-block__title">Слайдер 5</div>
                                    <div class="upload-block__photo">
                                        <div class="input-file-row-1">
                                            <div class="upload-file-container">
                                                {!!  Html::image('images/'.$main_page[0]->img_4,'',array('class'=>'upload-file-img'))  !!}
                                                <div class="upload-file-container-text">
                                                    <input type="file" name="pic[4]"
                                                           class="uploadFileImgInput photo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <label>URL 5</label>
                                        <input name="url_4" type="text" size="35" value="{{$main_page[0]->img_url_4}}">
                                        <div class="uploadFileImgButton btn photo__btn-upload bg-teal-700">
                                            Загрузить
                                        </div>
                                    </div>
                                </div>
                                <div class="upload-block__item">
                                    <div class="upload-block__title">Слайдер 6</div>
                                    <div class="upload-block__photo">
                                        <div class="input-file-row-1">
                                            <div class="upload-file-container">
                                                {!!  Html::image('images/'.$main_page[0]->img_5,'',array('class'=>'upload-file-img'))  !!}
                                                <div class="upload-file-container-text">
                                                    <input type="file" name="pic[5]"
                                                           class="uploadFileImgInput photo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <label>URL 6</label>
                                        <input name="url_5" type="text" size="35" value="{{$main_page[0]->img_url_5}}">
                                        <div class="uploadFileImgButton btn photo__btn-upload bg-teal-700">
                                            Загрузить
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($languages[0]))

                            <div role="tabpanel" class="tab-pane fade in active" id="{{$languages[0]->language_url}}">
                                <input name="page_lang[0]" type="hidden" value="{{$languages[0]->id}}">
                                <div class="panel-heading">
                                    <div class="form-inline">
                                        <textarea rows="10" name="editor0" id="editor0">{!! $main_page[0]->text_block_0  !!}</textarea>
                                        <textarea rows="10" name="editor1" id="editor1">{!! $main_page[0]->text_block_1  !!}</textarea>
                                        <textarea rows="10" name="editor2" id="editor2">{!! $main_page[0]->text_block_2  !!}</textarea>
                                        <textarea rows="10" name="editor3" id="editor3">{!! $main_page[0]->text_block_3  !!}</textarea>
                                        <textarea rows="10" name="editor4" id="editor4">{!! $main_page[0]->text_block_4  !!}</textarea>
                                        <textarea rows="10" name="editor5" id="editor5">{!! $main_page[0]->text_block_5  !!}</textarea>
                                        <textarea rows="10" name="editor6" id="editor6">{!! $main_page[0]->text_block_6  !!}</textarea>
                                        <textarea rows="10" name="editor7" id="editor7">{!! $main_page[0]->text_block_7  !!}</textarea>
                                    </div>
                                </div>
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
         /footer
            <script type="text/javascript">
                        @for($i=0;$i<100;$i++)
            CKEDITOR.config.autoParagraph = false;
var ckeditor1 = CKEDITOR.replace('editor{{$i}}');
                AjexFileManager.init({
                    returnTo: 'ckeditor',
                    editor: ckeditor1
                });
                @endfor
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
