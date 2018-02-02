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
			<form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="page-header-btn-right">
					<button type="" class="btn bg-teal-400 ">Выход</button>
				</div>
			</form>
		</div>
	</div>
	<div class="content meta-tags">
		<h6 class="content-group text-semibold">
			Мета-теги
		</h6>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="ur">
			<div class="col-md-6">
				<h2>Для Юр.Услуг</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input style="width: 350px;" type="text" name="title"
						   value="@if(isset($pages[0])){{$pages[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<textarea style="width: 350px;height: 150px;resize: none;border: 1px solid;	border-color: rgb(169, 169, 169);	padding: 7px 12px;	font-size: 13px;" name="description" placeholder="">@if(isset($pages[0])){{$pages[0]->description}}@endif</textarea>
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="buh">
			<div class="col-md-6">
				<h2>Для Бух.Услуг</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input style="width: 350px;" type="text" name="title"
						   value="@if(isset($objects[0])){{$objects[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<textarea style="width: 350px;height: 150px;resize: none;border: 1px solid;	border-color: rgb(169, 169, 169);	padding: 7px 12px;	font-size: 13px;" type="text" name="description"
							  placeholder="">@if(isset($objects[0])){{$objects[0]->description}}@endif</textarea>
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
			<input name="type" type="hidden" value="reviews">
			<div class="col-md-4">
				<h2>О кампании</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($reviews[0])){{$reviews[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($reviews[0])){{$reviews[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="contacts">
			<div class="col-md-4">
				<h2>Контакты</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($contacts[0])){{$contacts[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($contacts[0])){{$contacts[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="news_list">
			<div class="col-md-4">
				<h2>Тарифы</h2>
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
			<input name="type" type="hidden" value="object_list">
			<div class="col-md-4">
				<h2>Акции</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($object_list[0])){{$object_list[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($object_list[0])){{$object_list[0]->description}}@endif">
				</h6>
				<button type="submit" class="btn btn-success">Обновить</button>
			</div>
		</form>
		<form method="post" action="{{ route('default_meta_tags') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<input name="type" type="hidden" value="real_news_list">
			<div class="col-md-4">
				<h2>Список новостей</h2>
				<h6 class="content-group text-semibold">
					<label for="">Title</label>
					<input type="text" name="title" value="@if(isset($real_news_list[0])){{$real_news_list[0]->title}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label for="">Description</label>
					<input type="text" name="description"
						   value="@if(isset($real_news_list[0])){{$real_news_list[0]->description}}@endif">
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
