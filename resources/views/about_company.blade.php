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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">О компании</span>
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
    <form style="position: relative;" method="post" action="{{ route('about_company_edit') }}" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <button style="position: absolute; right: 25px;" type="submit" class="btn bg-teal-400">Обновить</button>
        <h5 class="panel-title" style="padding-left: 30px;">Редактор</h5>
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
                                        <div class="col-md-6">
                                            <div class="form-content">


                                                <h5 class="content-group text-semibold">
                                                    <label>Название*</label>
                                                    <input type="text" name="name"
                                                           value="@if(isset($about_company[0]->about_company_name )){{$about_company[0]->about_company_name }}@endif"
                                                           placeholder="Введите название*">
                                                </h5>

                                                <h5 class="content-group text-semibold">
                                                    <label>URL*</label>
                                                    <input type="text" name="url"
                                                           value="@if(isset($about_company[0]->about_company_url )){{$about_company[0]->about_company_url }}@endif"
                                                           placeholder="Введите URL*">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Title*</label>
                                                    <input type="text" name="title"
                                                           value="@if(isset($about_company[0]->about_company_title )){{$about_company[0]->about_company_title }}@endif"
                                                           placeholder="Введите title">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label style="vertical-align: top">Description*</label>
                                                    <textarea placeholder="Введите description" name="description"
                                                              id="">@if(isset($about_company[0]->about_company_description)){{$about_company[0]->about_company_description}}@endif</textarea>
                                                </h5>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="editor1" id="editor1">@if(isset($about_company[0]->about_company_text)){{$about_company[0]->about_company_text}}@endif</textarea>
                                        </div>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form method="post" action="{{route('upload_pdf')}}" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <input type="file" name="file" id="file_pdf">
        <input type="submit" value="Обновить партнёрские цены">
    </form>
        <!-- /CKEditor default -->

        <!-- Footer -->
    <div class="footer text-muted">
        &copy; 2017.  by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
    </div>
        <!-- /footer -->
        <script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace('editor1');
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor1
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
