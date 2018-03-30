<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Обратная связь</span>
                </h4>
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
        <div class="row">
            <div class="col-md-6">
                <h6 class="content-group text-semibold">
                    Обратная связь
                </h6>
                <div class="form-content">
                    <form method="post" action="{{ route('feedback_name') }}" enctype="multipart/form-data">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <h6 class="content-group text-semibold">
                            <label>Имя</label>
                            <input type="text" name="name"
                                   value="@if(isset($feedback[0])){{$feedback[0]->name_form}}@endif"
                                   placeholder="Введите имя*">
                        </h6>
                        <h6 class="content-group text-semibold">
                            <label>Фамилия</label>
                            <input type="text" name="second_name"
                                   value="@if(isset($feedback[0])){{$feedback[0]->name_form}}@endif"
                                   placeholder="Введите фамилию*">
                        </h6>
                        <h6 class="content-group text-semibold">
                            <label>Телефон</label>
                            <input type="text" name="phone_number"
                                   value="@if(isset($feedback[0])){{$feedback[0]->phone_form}}@endif"
                                   placeholder="Введите номер телефона*">
                        </h6>
                        <h6 class="content-group text-semibold">
                            <label>Email</label>
                            <input type="text" name="email"
                                   value="@if(isset($feedback[0])){{$feedback[0]->email_form}}@endif"
                                   placeholder="Введите почту*">
                        </h6>
                        <h6 class="content-group text-semibold">
                            <label>Коментарий</label>
                            <input type="text" name="comment"
                                   value="@if(isset($feedback[0])){{$feedback[0]->comment_form}}@endif"
                                   placeholder="Введите комментарий">
                        </h6>

                        <button type="submit" class="btn btn-success">Обновить</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <form method="post" action="{{ route('feedback_mail') }}" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <h6 class="content-group text-semibold">
                        <input type="text" name="title" value="@if(isset($feedback[0])){{$feedback[0]->title}}@endif"
                               placeholder="Введите title*">
                    </h6>
                    <textarea name="text" id="editor1">
            @if(isset($feedback[0])){{$feedback[0]->text}}@endif
                           </textarea>
                    <h6 class="content-group text-semibold">
                        <input type="text" name="email" value="
@if(isset($feedback[0])){{$feedback[0]->email}}@endif"
                               placeholder="Введите почту*">
                    </h6>
                    <button type="submit" class="btn btn-success">Обновить</button>
                </form>
            </div>
        <!--
            <div class="col-md-6">
                <form method="post" class="send-test-mail" action="{{ route('mail') }}" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-success">Отправить тестовый email</button>
                </form>
            </div>
            -->
        </div>
        <script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace('editor1');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
        </script>
        <!-- /panel heading options --

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
