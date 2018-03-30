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
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Организация</span></h4>
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
	<div class="content">
		<h6 class="content-group text-semibold">
			Параметры организации
		</h6>
		<div class="form-content">
			<form method="post" action="{{ route('upload_organization') }}" enctype="multipart/form-data">
				<input name="_token" type="hidden" value="{{ csrf_token() }}">
				<h6 class="content-group text-semibold">
					<label>Название</label>
					<input type="text" name="name" placeholder="Введите название*" value="@if(isset($org[0])){{$org[0]->name}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Улица</label>
					<input type="text" name="street_address" placeholder="Введите улицу*" value="@if(isset($org[0])){{$org[0]->street_address}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Почтовый код</label>
					<input type="text" name="postal_code" placeholder="Введите код*" value="@if(isset($org[0])){{$org[0]->postal_code}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Город,страна</label>
					<input type="text" name="address_locality" placeholder="Введите город/страну*" value="@if(isset($org[0])){{$org[0]->address_locality}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Email</label>
					<input type="text" name="email" placeholder="Введите Email*" value="@if(isset($org[0])){{$org[0]->email}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Номер факса</label>
					<input type="text" name="phone_number_1" placeholder="Введите телефон*" value="@if(isset($org[0])){{$org[0]->phone_number_1}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Номер телефона</label>
					<input type="text" name="phone_number_2" placeholder="Введите телефон*" value="@if(isset($org[0])){{$org[0]->phone_number_2}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Номер телефона</label>
					<input type="text" name="phone_number_3" placeholder="Введите телефон*" value="@if(isset($org[0])){{$org[0]->phone_number_3}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>Номер телефона</label>
					<input type="text" name="phone_number_4" placeholder="Введите телефон*" value="@if(isset($org[0])){{$org[0]->phone_number_4}}@endif">
				</h6>
				<h6 class="content-group text-semibold">
					<label>URL</label>
					<input type="text" name="url" placeholder="Введите URL*"
						   value="@if(isset($org[0])){{$org[0]->url}}@endif">
				</h6>

				<button type="submit" class="btn btn-success">Обновить</button>
			</form>
		</div>

	</div>
	</div>
	<script>
        var editor = CKEDITOR.replace('editor1');
	</script>
	<!-- /panel heading options --

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
