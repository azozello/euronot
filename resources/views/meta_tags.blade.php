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
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Мета-теги</span></h4>
			</div>
			<!--<div class="view_page"><button class="btn btn-primary" onclick="window.open('http://restoran-elit.com.ua/galereya')">Подивитись сторінку</button></div>
-->

		</div>
	</div>
	<div class="content meta-tags">

		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="products">
			<div class="col-md-6">
				<h2>Для товаров</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input style="width: 350px;" type="text" name="title"
						   value="@if(isset($products[0])){{$products[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<textarea style="width: 350px;height: 150px;resize: none;border: 1px solid;	border-color: rgb(169, 169, 169);	padding: 7px 12px;	font-size: 13px;" type="text" name="description"
							  placeholder="">@if(isset($products[0])){{$products[0]->description}}@endif</textarea>
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="news">
			<div class="col-md-6">
				<h2>Для новостей</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input style="width: 350px;" type="text" name="title"
						   value="@if(isset($news[0])){{$news[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<textarea style="width: 350px;height: 150px;resize: none;border: 1px solid;	border-color: rgb(169, 169, 169);	padding: 7px 12px;	font-size: 13px;" type="text" name="description"
							  placeholder="">@if(isset($news[0])){{$news[0]->description}}@endif</textarea>
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>

		<h6 class="content-group text-semibold">
			Мета-теги основных страниц
		</h6>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">

			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="main_page">

			<div class="col-md-4">
				<h2>Главная страница</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($main_page[0])){{$main_page[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($main_page[0])){{$main_page[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="about_company">
			<div class="col-md-4">
				<h2>О кампании</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($about_company[0])){{$about_company[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($about_company[0])){{$about_company[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="warranty">
			<div class="col-md-4">
				<h2>Гарантия</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($warranty[0])){{$warranty[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($warranty[0])){{$warranty[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="dostavka">
			<div class="col-md-4">
				<h2>Доставка</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($dostavka[0])){{$dostavka[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($dostavka[0])){{$dostavka[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="service">
			<div class="col-md-4">
				<h2>Сервис</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($service[0])){{$service[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($service[0])){{$service[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="news_list">
			<div class="col-md-4">
				<h2>Список новостей</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($news_list[0])){{$news_list[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($news_list[0])){{$news_list[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_1">
			<div class="col-md-4">
				<h2>Ноутбуки б/у</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_1[0])){{$cat_1[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_1[0])){{$cat_1[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_2">
			<div class="col-md-4">
				<h2>Системные блоки б/у</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_2[0])){{$cat_2[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_2[0])){{$cat_2[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_3">
			<div class="col-md-4">
				<h2>Мониторы б/у</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_3[0])){{$cat_3[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_3[0])){{$cat_3[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_4">
			<div class="col-md-4">
				<h2>Принтеры</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_4[0])){{$cat_4[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_4[0])){{$cat_4[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_5">
			<div class="col-md-4">
				<h2>Док станции</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_5[0])){{$cat_5[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_5[0])){{$cat_5[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_6">
			<div class="col-md-4">
				<h2>Игровые системники</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_6[0])){{$cat_6[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_6[0])){{$cat_6[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_7">
			<div class="col-md-4">
				<h2>Для навчання</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_7[0])){{$cat_7[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_7[0])){{$cat_7[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_8">
			<div class="col-md-4">
				<h2>Для роботи</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_8[0])){{$cat_8[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_8[0])){{$cat_8[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_9">
			<div class="col-md-4">
				<h2>Для игр</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_9[0])){{$cat_9[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_9[0])){{$cat_9[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="cat_10">
			<div class="col-md-4">
				<h2>Для домашнего использования</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($cat_10[0])){{$cat_10[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($cat_10[0])){{$cat_10[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<div class="footer text-muted">
			&copy; 2017. by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
		</div>
	</div>
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
