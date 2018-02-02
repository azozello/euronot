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
        </div>

    </div>
    <!-- Content area -->
    <div class="content">
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>{{$errors->first()}}</strong>
            </div>
    @endif
    <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">
                    @foreach($blocks as $k=>$block)
                        <div class="col-md-6">
                            <div class="panel ">
                                <div class="panel-body">
                                    <div class="row">
                                        {{$block->text_block_name}} - {{$block->language_name}}
                                        <form method="post" action="{{ route('text_blocks_update') }}" enctype="multipart/form-data">
                                            <input name="id" type="hidden" value="{{$block->id}}">
                                            <div class="col-md-12">
                                                <div class="panel panel-flat">
                                                    <div class="main-text-block">
                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                        <div class="btn btn-primary file_upload">Фото возле текста <input type="file" multiple name="image"></div>
                                                        <div>
                                                            <input type="text" name="title" placeholder="Заголовок" value="{{$block->title}}">
                                                        </div>
                                                    </div>

                                                    <div class="panel-heading">
                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                        <input name="name" type="hidden" value="img1">
                                                        <textarea name="text" id="editor{{$k}}">{{$block->text}}</textarea>

                                                    </div>
                                                    <button type="submit" class="btn btn-primary upload" >Обновить</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>
                @endforeach
            </div>
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
