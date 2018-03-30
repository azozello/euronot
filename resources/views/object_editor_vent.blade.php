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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Создание акций</span>
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
    <form style="position: relative;" method="post" action="{{ route('add_promotion') }}" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="content page-str">
            <div class="form-button">
                <button type="submit" name="edit" class="btn bg-teal-400">Обновить</button>
            </div>
            <h5 class="panel-title">Редактор</h5>
            <!-- CKEditor default -->
            <div class="panel panel-flat">
                <div class="product-content">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="ru">
                            <input name="id" type="hidden" value="">
                            <input name="number" type="hidden" value="">
                            <div class="panel-heading">

                                <div class="form-inline">
                                    <div class="row">
                                        <div class="col-md-12">
                                                    <button type="submit" name="add" class="btn bg-teal-400" style="float: right;">Добавить</button>

                                        </div>
                                        @foreach($promotions as $promotion)
                                                <input name="id[]" type="hidden" value="{{ $promotion->id }}">
                                        <div class="col-md-6">
                                            <div class="upload-block" style="margin: 25px 0;">

                                                <div class="upload-block__item-wrap">
                                                    <div class="upload-block__item upload-block__item--big" style="margin: 0;">
                                                        <div class="upload-block__photo upload-block__photo--big" style="width: 100%;">
                                                            <div class="input-file-row-1">

                                                                <div class="upload-file-container upload-file-container--big">
                                                                    @if(isset($promotion->promotion_image))
                                                                        {!!  Html::image('promotion_images/image/'.$promotion->promotion_image,'pic',array('class' => 'upload-file-img'))  !!}
                                                                    @endif
                                                                    <div class="upload-file-container-text">

                                                                        <input type="file" name="file[]" multiple
                                                                               class="uploadFileImgInput photo"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input style="width: 50%;" type="text" name="name[]"
                                                                   value="{{$promotion->promotion_name}}"
                                                                   placeholder="Введите название*">
                                                            <button type="submit" name="delete{{ $promotion->id }}" class="btn bg-teal-400" style="float: right;">Удалить</button>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- /CKEditor default -->

                <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2017. by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
                </div>
                <!-- /footer -->

                <script type="text/javascript">
//					var ckeditor1 = CKEDITOR.replace('editor1');
//					AjexFileManager.init({
//						returnTo: 'ckeditor',
//						editor: ckeditor1
//					});
                </script>


            </div>
            <!-- /content area -->

        </div>
    </form>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->
