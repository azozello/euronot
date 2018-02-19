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

		<div>
			<form method="get" action="{{ route('config') }}" enctype="multipart/form-data">
				<input name="_token" type="hidden" value="{{ csrf_token() }}">
				<div class="form-inline">
					<div class="form-group">
						<label>Ширина</label>
						<input name="width" type="text" id="width" @if(isset($config[0]->width))value="{{$config[0]->width}}"@endif placeholder="Введите ширину" >
					</div>
					<div class="form-group ">
						<label>Высота</label>
						<input name="hight" type="text" id="hight" @if(isset($config[0]->hight))value="{{$config[0]->hight}}"@endif placeholder="Введите высоту">
					</div>
					<div class="form-group">
						<button type="submit" class="btn bg-teal-400">Ввести <i class="icon-arrow-right14 position-right"></i></button>
					</div>
				</div>
			</form>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="">
						<div style="display: inline-block;" class="panel-heading">
							

								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<div class="btn bg-teal-400 file_upload">Фото<input type="file" multiple name="file[]"></div>
								<!--
                                <div>
                                    <button type="submit" class="btn btn-primary">Завантажити</button>
                                </div>
                                -->
								<button class="btn bg-teal-400" type="submit">Загрузить</button>

						</div>
					</div>
				</div>
			</div>
			@if(isset($images))
				<div class="card-row clearfix">
					@foreach($images as $image)
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="thumbnail">
								<div class="thumb">

										<span>
											{!!  Html::image('gallery/'.$image->name,'pic',array('height'=>'400px', 'width'=>'400px'))  !!}
										</span>
									<form method="post" action="{{ route('delete_gallery_images') }}" enctype="multipart/form-data">
										<input name="_token" type="hidden" value="{{ csrf_token() }}">
										<input name="name" type="hidden" value="{{$image->name}}">
										<button type="submit" style="width: 100%;">Удалить</button>
									</form>
								</div>
							</div>
						</div>
						<div id="detail1" style="display: none;">{{$num++}}}</div>
						@if($num > 5)
				</div>
				<div class="card-row clearfix">
					<div id="detail1" style="display: none;">{{$num = 0}}}</div>
					@endif
					@endforeach
				</div>
				{{$images->links()}}
			@endif
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
