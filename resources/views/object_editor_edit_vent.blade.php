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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Создание объекта</span>
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
    <form method="post" action="{{route('edit_object')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="content page-str">
        <div class="form-button">
            <button type="submit" class="btn bg-teal-400">Обновить</button>
        </div>
        <h5 class="panel-title">Редактор</h5>
        <!-- CKEditor default -->
        <div class="panel panel-flat">
            <div class="product-content">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="ru">
                            <input name="object_id" type="hidden" value="{{$object[0]->object_id}}">
                            <input name="number" type="hidden" value="">
                            <div class="panel-heading">

                                <div class="form-inline">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <strong>{{$errors->first()}}</strong>
                                                </div>
                                            @endif
                                                {{--@foreach($object_images as $image)--}}
                                                    {{--<span>--}}
                        {{--{!!  Html::image('objects/'.$image->name,'pic',array('height'=>'400px', 'width'=>'400px'))  !!}--}}
                    {{--</span>--}}
                                                {{--@endforeach--}}
                                                <label for="input-25"><h5>Загрузить фото</h5></label>
                                                <div class="file-loading">
                                                    <input id="input-25" name="input25[]" type="file" multiple>
                                                </div>
                                                <div class="form-button">
                                                    <button type="submit" name="images" class="btn bg-teal-400">Загрузить</button>
                                                </div>

                                        </div>
                                        @if( isset($object_images) )
                                            @foreach( $object_images as $k=>$images)
                                                <span>
											{!!  Html::image('images/image/'.$images->images_name,'pic')  !!}
                                                    <input name="image_id[{{$k}}]" type="hidden" value="{{$images->id}}">
                                                    <input name="imag[{{$k}}]" type="hidden" value="{{$images->images_name}}">
                                                    <button type="submit" name="imag{{$k}}" class="btn bg-teal-400">Удалить</button>
										</span>
                                            @endforeach
                                        @endif
                                        @if( Session::has('images') )
                                            @foreach( Session::get('images') as $k=>$image)
                                                <span>
											{!!  Html::image('images/image/'.$image,'pic')  !!}
                                                    <input name="image[{{$k}}]" type="hidden" value="{{$image}}">
                                                    <button type="submit" name="image{{$k}}" class="btn bg-teal-400">Удалить</button>
										</span>
                                            @endforeach
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-content" style="margin-top: 25px">
                                                <h5 class="content-group text-semibold">
                                                    <label>Название*</label>
                                                    <input type="text" name="name"
                                                           value="@if( Session::has('name') ){{ Session::get('name') }} @else @if(isset($object[0]->name)) {{$object[0]->name}} @endif @endif"
                                                           placeholder="Введите название*">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>URL*</label>
                                                    <input type="text" name="url"
                                                           value="@if( Session::has('url') ){{ Session::get('url') }} @else @if(isset($object[0]->url)) {{$object[0]->url}} @endif @endif"
                                                           placeholder="Введите URL*">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Title*</label>
                                                    <input type="text" name="title"
                                                           value="@if( Session::has('title') ){{ Session::get('title') }} @else @if(isset($object[0]->title)) {{$object[0]->title}} @endif @endif"
                                                           placeholder="Введите title">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label style="vertical-align: top">Description*</label>
                                                    <textarea placeholder="Введите description" name="description"
                                                              id="">@if( Session::has('description') ){{ Session::get('description') }} @else @if(isset($object[0]->description)) {{$object[0]->description}} @endif @endif</textarea>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="editor1" id="editor1">@if( Session::has('editor1') ){{ Session::get('editor1') }} @else @if(isset($object[0]->text)) {{$object[0]->text}} @endif @endif</textarea>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>


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
			})

			$("#myDropzone").dropzone({url: "/file/post"});
			$(document).on('ready', function () {
			    @foreach($object_images as $k=>$img)
				var url{{$k+1}} = '../../public/objects/{{$img->images_name}}';
				@endforeach
				$("#input-25").fileinput({
					initialPreview: [url1400 @foreach($object_images as $k=>$i) , url{{$k+1}} @endforeach ],
					initialPreviewAsData: true,
					initialPreviewConfig: [
					    @foreach($object_images as $k=>$images)
						{
							caption: "{{$images->image}}",
							filename: "{{$images->image}}",
							downloadUrl: url{{$k+1}},
							showDelete: true,
							width: "120px",
							key: 1
						},
                        @endforeach

					],
					deleteUrl: "http://client1.itfoxy.com/admin/page/object_image_delete",
					overwriteInitial: false,
					maxFileSize: 10000
				});
				$('.file-input').prepend($('.file-caption-main'));
				$('.file-caption-main .file-caption').css('display','none');
				$('.input-group-btn .btn-file').addClass('bg-teal-400').removeClass('btn-primary');
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
