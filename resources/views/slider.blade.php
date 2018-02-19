<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

@include('layouts.styles_light')
<!-- Main navbar -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Cлайдеры</span></h4>
			</div>
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
		@if($errors->any())
			<div class="alert alert-danger">
				<strong>{{$errors->first()}}</strong>
			</div>
	@endif
	<!-- Detached content -->
		<div class="container-detached">

			<div class="col-md-10">
				<h6 class="panel-title text-semibold">Параметры слайдеров</h6>
			</div>
			<form method="get" action="{{route('add_slider')}}" enctype="multipart/form-data">
				<button type="submit" class="btn bg-teal-400 upload">Добавить слайдер</button>
			</form>

			@foreach($blocks as $k=>$block)
				<div class="panel-body">


						<input name="id" type="hidden" value="{{$block->id}}">
						<div class="panel panel-reviews panel-flat" style="position: relative;">
							<div class="main-text-block">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<div class="btn bg-teal-400 file_upload">Выбрать фото<input type="file" multiple
																							name="image"></div>
								<div>
									<input type="text" name="text" placeholder="Текст"
										   value="{{$block->text}}">
								</div>
							</div>
							<span>
															@if($block->image != '' && $block->image != null)
									<div class="thumbnail">
							                          <div class="thumb slider-thumb">

										                <span>
										                     	{!!  Html::image('slider/'.$block->image,'pic',array('height'=>'400px', 'width'=>'400px'))  !!}
										                </span>
							                           </div>
					                                     	</div>

								@endif
									                 	</span>
							<div class="panel-heading">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">

							</div>
							<button type="submit" class="btn bg-teal-400 upload">Обновить</button>
							<div class="panel-reviews-trash" style="right: 5px;">
								<form method="post" action="{{ route('delete_slider') }}" enctype="multipart/form-data">
									<input name="_token" type="hidden" value="{{ csrf_token() }}">
									<div class="panel-footer panel-footer-condensed">

										<input name="id" type="hidden" value="{{$block->id}}">
										<button type="submit" class="btn btn-danger upload"><span class="glyphicon glyphicon-trash"></span></button>

									</div>
								</form>
							</div>
						</div>


				</div>



				<div id="detail1" style="display: none;">{{$num++}}}</div>
				@if($num>1)

					<div id="detail1" style="display: none;">{{$num = 0}}}</div>

				@endif
			@endforeach

			{{$blocks->links()}}
			<script>
						{{--@foreach($blocks as $k=>$block)--}}
                {{--var editor = CKEDITOR.replace('editor{{$k}}');--}}
				{{--@endforeach--}}


			</script>
			<!-- Footer -->
			<div class="footer text-muted">
				&copy; 2017. by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
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
