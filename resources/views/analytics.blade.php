<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

@include('layouts.styles')
<!-- Main navbar -->
    <!-- /page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Аналитика</span></h4>
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
    <form role="form" method="post" action="{{ route('analytics_change') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <button type="submit" class="btn btn-success" style="float: right;margin-right: 20px;">Обновить</button>
    <div class="clearfix"></div>
    <div class="content meta-tags">
        <div class="analytics__item">
                <input name="type" type="hidden" value="pages">
                <div class="">
                    <h2>Google Analytics</h2>
                    <h6 class="content-group text-semibold">
                    <textarea
                            style="width: 350px;height: 150px;resize: none;border: 1px solid;	border-color: rgb(169, 169, 169);	padding: 7px 12px;	font-size: 13px;"
                            name="analytics_text[0]" placeholder="Google Analytics">@if(isset($data->analytics_text_1)){{$data->analytics_text_1}}@endif</textarea>
                    </h6>
                </div>
        </div>
        <div class="analytics__item">
                <input name="type" type="hidden" value="objects">
                <div class="">
                    <h2>Yandex Metrika</h2>
                    <h6 class="content-group text-semibold">
                    <textarea
                            style="width: 350px;height: 150px;resize: none;border: 1px solid;	border-color: rgb(169, 169, 169);	padding: 7px 12px;	font-size: 13px;"
                            type="text" name="analytics_text[1]"
                            placeholder="Yandex Metrika">@if(isset($data->analytics_text_2)){{$data->analytics_text_2}}@endif</textarea>
                    </h6>

                </div>
        </div>
        <br>
        <div class="analytics__item">
                <input name="type" type="hidden" value="news">
                <div class="">
                    <h2>yandex web master</h2>
                    <h6 class="content-group text-semibold">
                        <input style="width: 350px;" type="text" name="analytics_text[2]"
                               value="@if(isset($data->analytics_text_3)){{$data->analytics_text_3}}@endif">

                    </h6>
                </div>
        </div>
        <div class="analytics__item">
                <input name="type" type="hidden" value="news">
                <div class="">
                    <h2>google web master</h2>
                    <h6 class="content-group text-semibold">
                        <input style="width: 350px;" type="text" name="analytics_text[3]"
                               value="@if(isset($data->analytics_text_4)){{$data->analytics_text_4}}@endif">

                    </h6>
                </div>
        </div>
        <div class="analytics__item">
                <input name="type" type="hidden" value="news">
                <div class="">
                    <h2>bing web master</h2>
                    <h6 class="content-group text-semibold">
                        <input style="width: 350px;" type="text" name="analytics_text[4]"
                               value="@if(isset($data->analytics_text_5)){{$data->analytics_text_5}}@endif">

                    </h6>
                </div>
        </div>
        <div class="analytics__item">
                <input name="type" type="hidden" value="news">
                <div class="">
                    <h2>mail web master</h2>
                    <h6 class="content-group text-semibold">
                        <input style="width: 350px;" type="text" name="analytics_text[5]"
                               value="@if(isset($data->analytics_text_6)){{$data->analytics_text_6}}@endif">

                    </h6>
                </div>
        </div>


        <div class="footer text-muted">
            &copy; 2017. by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
        </div>
    </div>
    </form>
    </div>
    <script>
		var editor = CKEDITOR.replace('editor1');
    </script>

    <!-- Footer -->

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
