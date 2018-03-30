<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

@include('layouts.styles')
<!-- Main navbar -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Отзывы</span></h4>
            </div>

            <div class="page-header-btn-right">
                <form method="post" action="{{route('make_new_contact')}}" enctype="multipart/form-data" style="height: 40px;">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <button type="submit" class="btn bg-teal-400 upload page-header-btn-right" style="">Добавить блок</button>

                </form>
            </div>

        </div>

    </div>
    <!-- Content area -->
    <div class="content">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
            </div>
    @endif
    <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">



                @foreach($blocks as $k=>$block)

                    <div class="col-md-6 panel-body-reviews">

                        <div class="panel-body " style="padding: 0;">
                            <form method="post" action="{{ route('contact_update') }}" enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{$block->id}}">

                                <div class="panel panel-flat panel-reviews" style="margin: 0;">
                                    <div class="main-text-block">
                                        <div class="btn bg-teal-400 file_upload">Выбрать фото <input type="file" name="image"></div>
                                    </div>
                                    <span>
											{!!  Html::image('images/'.$block->image_block,'pic',array('height'=>'400px', 'width'=>'400px'))  !!}
										</span>

                                    <div class="panel-heading">
                                        <input name="name" type="hidden" value="img1">
                                        <textarea name="text_block_1" id="editor{{$k+1}}">{!! $block->text_block_1 !!}</textarea>
                                        <textarea name="text_block_2" id="editor{{$k+2}}">{!! $block->text_block_2 !!}</textarea>
                                    </div>
                                    <button type="submit" class="btn bg-teal-400 upload" >Обновить</button>
                                </div>
                            </form>
                        </div>

                        <form class="panel-reviews-trash" method="post" action="{{ route('contact_delete') }}" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <div class="panel-footer panel-footer-condensed">

                                <input name="id" type="hidden" value="{{$block->id}}">
                                <button type="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>

                            </div>
                        </form>
                    </div>

                    <div id="detail1" style="display: none;">{{$num++}}}</div>
                    @if($num>1)

                        <div id="detail1" style="display: none;">{{$num = 0}}}</div>

                    @endif
                @endforeach

            </div>
        <!-- Footer -->

            <div class="footer text-muted">
                &copy; 2017.  by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
            </div>
            <!-- /footer -->
        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->


    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->

    </body>
</html>
