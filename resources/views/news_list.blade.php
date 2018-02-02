<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

@include('layouts.styles')

<!-- Main navbar -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i><span class="text-semibold">Список новостей</span></h4>
            </div>
            <!--<button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>-->
            <div class="page-header-btn-right">
                <form  role="form" method="get" action="" enctype="multipart/form-data">
                    <button type="" class="btn bg-teal-600 ">Создать</button>
                </form>
                <form  role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </form>
            </div>
        </div>

    </div>


    <!-- Content area -->
    <div class="content">
        <form class="form-search" role="form" method="get" action="{{ route('search_news') }}" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="content-group text-semibold">Название новости
                    <small class="display-block">Впишите название</small>
                </h6>
                <input type="text" name="name" class="form-control" id="name_search" placeholder="">
            </div>


            <button type="submit" class="btn btn-success">Поиск</button>
        </form>

        <h6 class="content-group text-semibold">
            Список новостей
            <small class="display-block">Список новостей</small>
        </h6>
        <div class="list-page">
            @if(isset($news_arr))
                @foreach($news_arr as $news)

                    <div class="panel panel-flat">
                        <div style="display: inline-block;" class="panel-heading">

                            <p><a href="admin/article/{{$news->url}}"><h6 class="panel-title text-semibold">{{$news->name}}</h6></a></p>

                        </div>
                        <div class="line"></div>


                        <div class="panel-body">
                            {{$news->created_at}}
                        </div>
                        <div class="navbar-button">
                            <div class="navbar-edit">
                                <form role="form" method="get" action="{{ route('edit_news_show') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="id" class="form-control" id="id" value="{{$news->id}}">
                                        <input type="hidden" name="page_id" class="form-control" id="page_id" value="{{$news->page_id}}">
                                        <input type="hidden" name="page_language" class="form-control" id="page_id" value="{{$news->page_id}}">
                                    </div>
                                    <button type="submit" class="btn btn-success">Редактировать</button>
                                </form>
                            </div>
                            <div  class="navbar-trash">
                                <form role="form" method="post" action="{{ route('delete_news') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="hidden" name="id" class="form-control" id="id" value="{{$news->id}}">
                                    </div>
                                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div id="detail1" style="display: none;">{{$num++}}}</div>
                    @if($num > 2)


                        <div id="detail1" style="display: none;">{{$num = 0}}}</div>
                @endif
            @endforeach
            {{$news_arr->links()}}
        @endif
        <!-- /panel heading options --

					<!-- Footer -->
            <div class="footer text-muted">
                &copy; 2017.  by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
            </div>
            <script>
                $(window).ready(function(){
                    var max = 0;
                    $(".panel-heading").each(function () {
                        if ($(this).height() > max)
                            max = $(this).height();
                    }).height(max+5);
                });
            </script>
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