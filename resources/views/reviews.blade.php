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
                <form method="get" action="{{route('make_new')}}" enctype="multipart/form-data" style="height: 40px;">
                    <button type="" class="btn bg-teal-400 ">Сохранить</button>
                <div class="panel panel-padding panel-flat">
                    <table class="table table-lang table-lg">
                        <thead>
                        <tr>
                            <th>Продукт</th>
                            <th>Комментарий</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Время</th>
                            <th>Дата</th>
                            <th>Состояние</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blocks as $k => $block)
                            <tr>
                                <th class="text-center">{{$block->name}}</th>
                                <th class="text-center">{!!  $block->comment  !!}</th>
                                <th>{{$block->comment_name}}</th>
                                <th>{{$block->comment_email}}</th>
                                <th>{{$block->comment_time}}</th>
                                <th>{{$block->comment_date}}</th>
                                <th><input type="text" class="req" name="is_active[{{$block->product_comment_id}}]" title="Имя" placeholder="Имя" value="{{$is_active_block[$k]->is_active}}"/></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
                </form>

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
