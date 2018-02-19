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
            <form method="get" action="{{route('make_new')}}" enctype="multipart/form-data" style="height: 40px;">

                <button type="submit" class="btn bg-teal-400 upload page-header-btn-right" style="">Добавить отзыв</button>

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
                            <form method="post" action="{{ route('reviews_update') }}" enctype="multipart/form-data">
                                <input name="id" type="hidden" value="{{$block->id}}">

                                <div class="panel panel-flat panel-reviews" style="margin: 0;">
                                    <div class="main-text-block">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <div class="btn bg-teal-400 file_upload">Выбрать фото <input type="file" multiple name="image"></div>
                                        <div>
                                            <input type="text" name="title" placeholder="Заголовок" value="{{$block->title}}">
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <input name="name" type="hidden" value="img1">
                                        <textarea name="text" id="editor{{$k}}">{{$block->text}}</textarea>

                                    </div>
                                    <button type="submit" class="btn bg-teal-400 upload" >Обновить</button>
                                </div>
                            </form>
                        </div>

                        <form class="panel-reviews-trash" method="post" action="{{ route('reviews_delete') }}" enctype="multipart/form-data">
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
        {{$blocks->links()}}
        <!-- Footer -->
            @foreach($blocks as $k=>$block)
                <script type="text/javascript">

                    var ckeditor1 = CKEDITOR.replace('editor{{$k}}');
                    AjexFileManager.init({
                        returnTo: 'ckeditor',
                        editor: ckeditor1
                    });
                </script>
            @endforeach
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
