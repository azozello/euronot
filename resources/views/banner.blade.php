<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

    @include('layouts.styles')

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Галерея</span></h4>
            </div>
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
            <!--<div class="view_page"><button class="btn btn-primary" onclick="window.open('http://restoran-elit.com.ua/galereya')">Подивитись сторінку</button></div>
-->
        </div>
    </div>
    <div class="content">

        <div><form role="form" method="post" action="{{ route('banner_edit') }}" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <div class="card-row clearfix">
                    <div class="upload-block__item">
                        <div class="upload-block__title">Баннер</div>
                        <div class="upload-block__photo">
                            <div class="input-file-row-1">
                                <div class="upload-file-container">
                                    @if(isset($banner))
                                    {!!  Html::image('images/'.$banner,'',array('class'=>'upload-file-img'))  !!}
                                    @endif
                                    <div class="upload-file-container-text">
                                        <input type="file" name="pic"
                                               class="uploadFileImgInput photo"/>
                                    </div>
                                </div>
                            </div>
                            <button type="" class="btn bg-teal-400 ">Загрузить</button>
                        </div>
                    </div>
                </div>
                </form>
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
