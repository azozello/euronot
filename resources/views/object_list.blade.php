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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Список акций</span></h4>
            </div>
            <!--<button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>-->
            <form role="form" method="get" action="{{ route('object_editor_vent') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <button type="" class="btn bg-teal-600 page-header-btn-right">Создать</button>
            </form>
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
        </div>

    </div>


    <!-- Content area -->
    <div class="content">
        <form class="form-search" role="form" method="get" action="{{ route('search_objects') }}" enctype="multipart/form-data">
            <div class="form-group">
                <h6 class="content-group text-semibold">Название акций
                    <small class="display-block">Впишите название</small>
                </h6>
                <input type="text" name="name" class="form-control" id="name_search" placeholder="">
            </div>


            <button type="submit" class="btn btn-success">Поиск</button>
        </form>

        <h6 class="content-group text-semibold">
            Список акций
            <small class="display-block">Список акций</small>
        </h6>
        <div class="list-page">
            @if(isset($objects))
                @foreach($objects as $k=>$object)

                        <div class="panel panel-flat">
                            <div class="panel-img-preview">
                                <span>
                                    @if(isset($images[0]))
                                        {!!  Html::image('images/image/'.$images[$k],'pic',array('height'=>'150px', 'width'=>'150px'))  !!}
                                    @endif
										</span>
                            </div>
                            <a href="admin/article/{{$object->url}}"> <div style="display:block;" class="panel-heading panel-heading-title">

                                <h6 class="panel-title text-semibold">{{$object->name}}</h6>

                            </div></a>


                            <div class="row">
                                <div class="panel-body">
                                    {{$object->created_at}}
                                </div>
                                <div class="navbar-button">
                                    <div class="navbar-edit">
                                        <form role="form" method="get" action="{{ route('edit_object_show') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="hidden" name="id" class="form-control" id="id" value="{{$object->id}}">
                                                <input type="hidden" name="object_id" class="form-control" id="obj_id" value="{{$object->object_id}}">
                                            </div>
                                            <button type="submit" class="btn btn-success">Редактировать</button>
                                        </form>
                                    </div>
                                    <div  class="navbar-trash">
                                        <form role="form" method="post" action="{{ route('delete_object') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <input type="hidden" name="object_id" class="form-control" id="object_id" value="{{$object->object_id}}">
                                            </div>
                                            <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div id="detail1" style="display: none;">{{$num++}}}</div>
                    @if($num > 2)


            <div id="detail1" style="display: none;">{{$num = 0}}}</div>
            @endif
            @endforeach
    {{$objects->links()}}
    @endif
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