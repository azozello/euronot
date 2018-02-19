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
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Сжатие изображений</span></h4>
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
		<h6 class="content-group text-semibold">Параметры изображений</h6>
		@if($errors->any())
			<div class="alert alert-danger">
				<strong>{{$errors->first()}}</strong>
			</div>
		@endif


		<div class="row">

			<form class="img-zip-form" method="post" action="{{ route('images_zip') }}" enctype="multipart/form-data">

				<div class="img-zip">
					<div class="panel panel-flat">
						<div class="main-text-block">
							<h3>Изображение Юр.Услуг</h3>
						</div>
						<div class="panel-heading">
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input name="name" type="hidden" value="ur_pages_images">
							<div class="form-horizontal">
								<div class="form-group">
									<div class="form-group">
										<label>Ширина</label>
										<input name="width" type="text" id="width" @if(isset($config[0]->width))value="{{$config[0]->width}}"@endif placeholder="Введите ширину" >
									</div>
									<div class="form-group ">
										<label>Высота</label>
										<input name="hight" type="text" id="hight" @if(isset($config[0]->hight))value="{{$config[0]->hight}}"@endif placeholder="Введите высоту">
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn bg-teal-400 upload" >Оновити</button>
					</div>
				</div>
			</form>


			<form class="img-zip-form" method="post" action="{{ route('images_zip') }}" enctype="multipart/form-data">

				<div class="img-zip">
					<div class="panel panel-flat">
						<div class="main-text-block">
							<h3>Изображение новостей</h3>
						</div>
						<div class="panel-heading">
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input name="name" type="hidden" value="news_images">
							<div class="form-horizontal">
								<div class="form-group">
									<div class="form-group">
										<label>Ширина</label>
										<input name="width" type="text" id="width" @if(isset($config[0]->width))value="{{$config[0]->width}}"@endif placeholder="Введите ширину" >
									</div>
									<div class="form-group ">
										<label>Высота</label>
										<input name="hight" type="text" id="hight" @if(isset($config[0]->hight))value="{{$config[0]->hight}}"@endif placeholder="Введите высоту">
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn bg-teal-400 upload" >Оновити</button>
					</div>
				</div>
			</form>

			<form class="img-zip-form" method="post" action="{{ route('images_zip') }}" enctype="multipart/form-data">

				<div class="img-zip">
					<div class="panel panel-flat">
						<div class="main-text-block">
							<h3>Изображение Бух.Услуг</h3>
						</div>
						<div class="panel-heading">
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input name="name" type="hidden" value="buh_pages_images">
							<div class="form-horizontal">
								<div class="form-group">
									<div class="form-group">
										<label>Ширина</label>
										<input name="width" type="text" id="width" @if(isset($config[0]->width))value="{{$config[0]->width}}"@endif placeholder="Введите ширину" >
									</div>
									<div class="form-group ">
										<label>Высота</label>
										<input name="hight" type="text" id="hight" @if(isset($config[0]->hight))value="{{$config[0]->hight}}"@endif placeholder="Введите высоту">
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn bg-teal-400 upload" >Оновити</button>
					</div>
				</div>
			</form>
			<form class="img-zip-form" method="post" action="{{ route('images_zip') }}" enctype="multipart/form-data">

				<div class="img-zip">
					<div class="panel panel-flat">
						<div class="main-text-block">
							<h3>Изображения Акций</h3>
						</div>
						<div class="panel-heading">
							<input name="_token" type="hidden" value="{{ csrf_token() }}">
							<input name="name" type="hidden" value="promotion_images">
							<div class="form-horizontal">
								<div class="form-group">
									<div class="form-group">
										<label>Ширина</label>
										<input name="width" type="text" id="width" @if(isset($config[0]->width))value="{{$config[0]->width}}"@endif placeholder="Введите ширину" >
									</div>
									<div class="form-group ">
										<label>Высота</label>
										<input name="hight" type="text" id="hight" @if(isset($config[0]->hight))value="{{$config[0]->hight}}"@endif placeholder="Введите высоту">
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn bg-teal-400 upload" >Оновити</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	</div>

	<!-- /page header -->



	<!-- /panel heading options --


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